<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Course,
    Category,
    InstructionLevel,
    UserSubscribedPlan,
    Subscription,
    CoachPrice
};
use App\Models\TextContent;
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
                    ->orWhere('is_active', 1)
                    ->paginate($paginate_count);
        } else {
            $courses = Course::with(['course_videos', 'categories'])->where('is_active', 1)->get();
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
        //dd($courses);
        return view('home', compact('courses'));
    }

    public function courseLesson($id, $lesson_id='') {

        $course = Course::join('admins','instructor_id','admins.id')->where('courses.id',$id)->select('courses.*','admins.name')->first();
        $user_id = 1;
        $coursecurriculum = Course::getcurriculuminfo($id, $user_id);
        $data['course'] = $course;
        $data['course_video'] = Course::get_course_video($id);//->course_videos();
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
        $data['lecturesnotes'] = $coursecurriculum['lecturesnotes'];
        //dd($coursecurriculum['lecturesnotescompleted']);
        $data['completed_lesson_count'] = Course::join('curriculum_sections','curriculum_sections.course_id','courses.id')->join('curriculum_lectures_quiz','curriculum_lectures_quiz.section_id','curriculum_sections.section_id')->join('user_notes','curriculum_lectures_quiz.lecture_quiz_id','user_notes.lesson_id')->where('courses.id',$id)->where('user_notes.user_id',\Auth::user()->id)->where('completed',1)->count();
        
        $data['totalquiz'] = $coursecurriculum['totallectures'];

        $segments = request()->segments();
        //$last = request()->segment(2);
        //$lesson_id = request()->segment(3);
        $last = $id;
        if ($lesson_id == null) {
            $lesson = Course::get_lesson_id($last);
            $lesson_id = $lesson->lecture_quiz_id;
            $data['slectedsessionid'] = $lesson->section_id;
        }
        else{
            $lesson = Course::get_lesson_section_id($lesson_id);
            $data['slectedsessionid'] = $lesson->section_id;

        }
        $data['first_video'] = DB::table('course_videos')->where('course_id', $id)->get()->toArray()[0];
        $data['notes'] = DB::table('user_notes')->where('lesson_id', $lesson_id)->first();
      
        if (isset($data['lecturesquiz'][$last]) && !empty($data['lecturesquiz'])) {
            $intro = DB::table('course_videos')->where('id', $data['lecturesquiz'][$last][0]->media)->get()->toArray();
            $data['quiz_description'] = $data['lecturesquiz'][$last][0]->description;
            $data['slectedsessionid'] = $data['lecturesquiz'][$last][0]->section_id;
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
                $data['slectedsessionid'] = $lection_quiz->section_id;

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
            $data['selectedlesson'] = $lesson_id;
            $data['subscriptionPlanMonthly'] = Subscription::where('plans', 'monthly')->first();
            $data['subscriptionPlanAnually'] = Subscription::Where('plans', 'yearly')->first();
            return view('lesson', $data);
        } else {
           
                
            $access['user_id'] = Auth::user()->id;
            $access['course_id'] = $id;
            $access['created_at'] = date('Y-m-d H:i:s');
            $access['updated_at'] = date('Y-m-d H:i:s');
            \DB::table( 'free_user_course_access')->insertGetId($access);
            return redirect()->route('membershipPlans')->with($data);
        }
    }
    
    public function courseLessonDetail($id, $lesson_id='') {

        
        $course = Course::join('admins','instructor_id','admins.id')->where('courses.id',$id)->select('courses.*','admins.name')->first();
        $lesson = DB::table('curriculum_lectures_quiz')->where('lecture_quiz_id', $lesson_id)->first();
        $notes = DB::table('user_notes')->where('lesson_id', $lesson_id)->where('user_id',Auth::user()->id)->first();
        if($notes == NULL){ # to maintain when the lesson put in progress
            $note['created_at'] = date("Y-m-d H:i:s");
            $note['last_played'] = date("Y-m-d H:i:s");     
            $note['user_id'] = Auth::user()->id;
            $note['lesson_id'] = $lesson_id;
            \DB::table( 'user_notes')->insertGetId($note);
        }else{
            DB::table('user_notes')->where('lesson_id', $lesson_id)->where('user_id',Auth::user()->id)->update(['last_played'=>date("Y-m-d H:i:s")]);

        }
        $data['desc'] = "";
        $data['notes'] = "";
        $data['completed'] = 0;
        if($course != NULL){
            $data['desc'] = trim($lesson->description);
        }
        if($notes != NULL){
            $data['notes'] = trim($notes->notes);
            $data['completed'] = $notes->completed;
        }
        return response()->json($data);
        
       
        
    }

    public function calendly() {

        $id = Auth::user()->id;
        //dd($id);
        $availableCount = \App\Models\AvailableBookingCount::where('user_id', $id)->first();
        $price = \App\Models\GeneralSetting::where('key','booking_credits_price')->pluck('value')->first();
        $count = !empty($availableCount) ? $availableCount->booking_count : 0;
        return view('calendly', compact('count','price'));
    }

    public function practise() {

         return view('yoodli');
    }

    public function saveLessonNotes() {
        $notes = trim($_GET['notes']);
        $lesson_id = $_GET['lesson_id'];
        $completed = isset($_GET['is_completed'])?$_GET['is_completed']:0;
        $completed_at = (isset($_GET['is_completed']) && $_GET['is_completed'] ==1)?date('Y-m-d H:i:s'):null;

        //dd($_GET);
        if ($lesson_id == 'undefined') {
            $lesson = Course::get_lesson_id($_GET['course_id']);
            $lesson_id = $lesson->lecture_quiz_id;
        }
        $lesson = DB::table('user_notes')->where('lesson_id', $lesson_id)->first();
        if (isset($lesson->id)) {
            DB::table('user_notes')->where('lesson_id', $lesson_id)->update(['notes' => $notes,'completed'=>$completed,'completed_at'=>$completed_at]);
        } else {

            DB::table('user_notes')->Insert(['user_id' => auth()->user()->id, 'notes' => $notes, 'lesson_id' => $lesson_id,'completed'=>$completed]);
        }

        echo json_encode(['success' => true]);
        exit;
    }
    public function termofservice(Request $request){
        $content = TextContent::where('type','TC')->first();
        return view('content',compact('content'));
    }
    public function cookiepolicy(Request $request){
        $content = TextContent::where('type','CP')->first();
        return view('content',compact('content'));
    }
    public function privacypolicy(Request $request){
        $content = TextContent::where('type','PP')->first();
        return view('content',compact('content'));
    }

}
