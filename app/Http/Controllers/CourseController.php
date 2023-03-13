<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller {

    public function couseView() {
        return view('course');
    }

    public function viewAllCourses() {
        $userId = Auth::user()->id;
        
        $courses = Course::with(['course_videos', 'categories'])->whereDoesntHave('users', function ($query) use ($userId) {
            $query->where('users.id', $userId);
        })->where('is_active', 1)->get();

        $upcomingCourses = $courses->where('is_locked', 1);

        $userCourses = Auth::user()->courses()->with(['course_videos', 'categories'])->where('is_active', 1)->orderBy('course_user.id', 'desc')->get();

        $currentCourses = $userCourses->concat($courses->where('is_locked', 0));

        return view('admin.course.all_courses', compact('currentCourses', 'upcomingCourses'));
    }
}
