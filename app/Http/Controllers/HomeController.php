<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Course,
    Category,
    InstructionLevel,
    UserSubscribedPlan,
    Subscription
};
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller {

    //

    public function home(Request $request) {
        $paginate_count = 10;

        // dd(\Auth::user());
        // $instructor_id = \Auth::user()->id;
        if ($request->has('search')) {
            $search = $request->input('search');

            $courses = DB::table('courses')
                    ->select('courses.*', 'course_videos.*', 'categories.name as category_name')
                    ->leftJoin('categories', 'categories.id', '=', 'courses.category_id')
                    ->leftJoin('course_videos', 'course_videos.id', '=', 'courses.id')
                    // ->where('courses.instructor_id', $instructor_id)
                    ->where('courses.course_title', 'LIKE', '%' . $search . '%')
                    ->orWhere('courses.course_slug', 'LIKE', '%' . $search . '%')
                    ->orWhere('categories.name', 'LIKE', '%' . $search . '%')
                    ->paginate($paginate_count);
        } else {
            $courses = Course::with(['course_videos', 'categories'])->get();
            // dd($courses);
            // $courses = DB::table('courses')
            //             ->select('courses.*','courses.id as course_id','course_videos.*')
            //             // ->rightJoin('categories', 'categories.id', '=', 'courses.category_id')
            //             ->rightJoin('course_videos', 'course_videos.course_id', '=', 'courses.id')
            //             // ->groupBy('courses.id')
            //             // ->where('courses.instructor_id', $instructor_id)
            //             ->paginate($paginate_count);
        }
//        $courses = $courses->toArray();
        return view('home', compact('courses'));
    }

    public function courseLesson($id, $lesson_id = '') {
        $course = Course::find($id);

        $user_id = '1';
        $coursecurriculum = Course::getcurriculuminfo($id, $user_id);
        // echo "<pre>";
        // print_r($coursecurriculum);
        // exit;
        // $data['chapters'] = Course::where('id',$id)->with('lectures_media')->get();
        // dd( $data['chapters']);
        $data['course'] = $course;
        $data['sections'] = $coursecurriculum['sections'];
        $data['lecturesquiz'] = $coursecurriculum['lecturesquiz'];
        $data['lecturesquizquestions'] = $coursecurriculum['lecturesquizquestions'];
        $data['lecturesmedia'] = $coursecurriculum['lecturesmedia'];
        $data['lecturesresources'] = $coursecurriculum['lecturesresources'];
        $data['uservideos'] = $coursecurriculum['uservideos'];
        $data['useraudios'] = $coursecurriculum['useraudios'];
        $data['userpresentation'] = $coursecurriculum['userpresentation'];
        $data['userdocuments'] = $coursecurriculum['userdocuments'];
        $data['userresources'] = $coursecurriculum['userresources'];
        $segments = request()->segments();
        $last = request()->segment(2);
        $lesson_id = request()->segment(3);
        if ($lesson_id == null) {
            $lesson = Course::get_lesson_id($last);
            $lesson_id = $lesson->lecture_quiz_id;
        }
        $data['notes'] = DB::table('user_notes')->where('lesson_id', $lesson_id)->first();

        if (isset($data['lecturesquiz'][$last]) && !empty($data['lecturesquiz'])) {
            $intro = DB::table('course_videos')->where('id', $data['lecturesquiz'][$last][0]->media)->get()->toArray();
            $data['quiz_description'] = $data['lecturesquiz'][$last][0]->description;
            $data['first_video'] = isset($intro[0]) ? $intro[0] : array();
            $data['subscriptionPlanMonthly'] = Subscription::where('plans', 'monthly')->first();
            $data['subscriptionPlanAnually'] = Subscription::Where('plans', 'yearly')->first();
            $data['subscriptionPlans'] = array();
            $data['access'] = 'true';

            if (!empty($lesson_id)) {
                $lection_quiz = DB::table('curriculum_lectures_quiz')->where('lecture_quiz_id', $lesson_id)->first();
                $data['quiz_description'] = $lection_quiz->description;
                $intro = DB::table('course_videos')->where('id', $lection_quiz->media)->get()->toArray();
                $data['first_video'] = isset($intro[0]) ? $intro[0] : array();
                $userSubscriptionPlan = UserSubscribedPlan::where('user_id', auth()->user()->id)->first();
                // dd($userSubscriptionPlan,auth()->user());
                $data['subscriptionPlanMonthly'] = Subscription::where('plans', 'monthly')->first();
                $data['subscriptionPlanAnually'] = Subscription::Where('plans', 'yearly')->first();
                if (isset($userSubscriptionPlan->id)) {
                    $data['access'] = 'true';
                } else {
                    $data['access'] = 'false';
                }
            }
        }
        $userSubscriptionPlan = UserSubscribedPlan::where('user_id', auth()->user()->id)->first();
        if (isset($userSubscriptionPlan->id)) {
            $data['access'] = 'true';
        } else {
            $data['access'] = 'false';
        }

        //    dd($data);
        return view('lesson', $data);
    }

    public function calendly() {
        $id = Auth::user()->id;
        $availableCount = \App\Models\AvailableBookingCount::where('user_id', $id)->first();
        $count = !empty($availableCount) ? $availableCount->booking_count : 0;
        return view('calendly', compact('count'));
    }

    public function saveLessonNotes() {
        $notes = $_GET['notes'];
        $lesson_id = $_GET['lesson_id'];
        if ($lesson_id == 'undefined') {
            $lesson = Course::get_lesson_id($_GET['course_id']);
            $lesson_id = $lesson->lecture_quiz_id;
        }
        $lesson = DB::table('user_notes')->where('lesson_id', $lesson_id)->first();
        if (isset($lesson->id)) {
            DB::table('user_notes')->where('lesson_id', $lesson_id)->update(['notes' => $notes]);
        } else {
            DB::table('user_notes')->Insert(['user_id' => auth()->user()->id, 'notes' => $notes, 'lesson_id' => $lesson_id]);
        }

        echo json_encode(['success' => true]);
        exit;
    }

}
