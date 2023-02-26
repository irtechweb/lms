<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentController extends Controller {

    public function index(UsersDataTable $datatable)
    {
        return $datatable->render('admin.student.index');
    }

    public function edit($id) {
        $data = User::getstudent($id);
        return view('admin.student.edit-student', compact('data'));
    }

    public function update(Request $request) {
        $data = self::prepareData($request);
        $data['id'] = $request->id;
        $save = User::updateData($data);
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

        return $inputs;
    }

}
