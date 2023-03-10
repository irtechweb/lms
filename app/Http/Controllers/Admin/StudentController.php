<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Mail\NewUserMail;
use Illuminate\Http\Request;
use App\Jobs\SendUserMailJob;
use Illuminate\Http\JsonResponse;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller {

    public function index(UsersDataTable $datatable)
    {
        return $datatable->render('admin.student.index');
    }

    public function create() {
        return view('admin.student.add-student');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|regex:/^[A-Za-z ]+$/',
            'email' => 'required|email|unique:users',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ],[
            'first_name.required' => 'First name is required.',
            'start_date.required' => 'Subscription start date is required.',
            'end_date.required' => 'Subscription end date is required.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            DB::beginTransaction();
            $password = mt_rand(10000000,99999999);
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($password),
                'phone_number' => $request->phone_number,
                'city' => $request->city,
                'status' => $request->status,
            ]);
            $data = [
                'name' => $user->first_name . ' ' . $user->last_name,
                'email' => $user->email,
                'password' => $password,
                'subject' => 'Account Created',
                'message' => 'Your account has been created successfully in Speak2Impact',
                'note' => 'Please update your password as soon as possible.'
            ];
            SendUserMailJob::dispatch($data);
            // 'subscription_start_date' => $request->start_date . ' 23:59:59',
            // 'subscription_end_date' => $request->end_date . ' 23:59:59',
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Student added successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $error->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function edit($id) {
        $user = $results = User::with('availableBookingCounts')->where('id', $id)->first();
        $data = !empty($results) ? $results->toArray() : [];
        return view('admin.student.edit-student', compact('data'));
    }

    public function update(Request $request) {
        $data = self::prepareData($request);
        $data['id'] = $request->id;
        $save = User::updateData($data, true);
        if ($save) {
            return redirect()->route('students.index')->with('Saved Successfully!');
        } else {
            return redirect()->back()->with('Error occurred! please try again');
        }
    }
    
    public function destroy($id)
    {
        try 
        {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->availableBookingCounts()->delete();
            $user->coachPayments()->delete();
            $user->eventBookings()->delete();
            $user->payments()->delete();
            $user->userSubscribedPlans()->delete();
            $user->delete();
            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'User Deleted successfully'
            ], JsonResponse::HTTP_OK);
        } 
        catch (\Exception $exception) 
        {
            DB::rollBack();
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR); 
        }
    }

    public static function prepareData($request)
    {
        $inputs['first_name'] = $request['first_name'];
        $inputs['last_name'] = $request['last_name'];
        $inputs['phone_number'] = $request['phone_number'];
        $inputs['city'] = $request['city'];
        $inputs['status'] = $request['status'];
        $inputs['booking_count'] = $request['booking_count'];

        return $inputs;
    }

    public function getStudentCourses($id) {
        $student = User::findOrFail($id);
        $studentCourses = $student->courses->pluck('id')->toArray();
        $courses = Course::where('is_active', 1)->select('id', 'course_title')->get();
        // dd($courses);
        return view('admin.modals.student_courses_modal', compact('courses', 'studentCourses', 'id'))->render();
    }

    public function saveStudentCourses(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()->first(),
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $student = User::findOrFail($request->user_id);
            // dd($request->all());
            $student->courses()->sync($request->courses);
            // $student->update([
            //     'title' => $request->title,
            //     'value' => $request->value,
            // ]);
            return response()->json([
                'status' => true,
                'message' => 'Student courses Updated Successfully'
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $error) {
            return response()->json([
                'status' => false,
                'message' => $error->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
