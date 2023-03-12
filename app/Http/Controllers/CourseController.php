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
        
        $lockedCourses = Course::with(['course_videos', 'categories'])->whereDoesntHave('users', function ($query) use ($userId) {
            $query->where('users.id', $userId);
        })->where('is_active', 1)->orderBy('is_locked', 'asc')->get();

        $userCourses = Auth::user()->courses()->with(['course_videos', 'categories'])->where('is_active', 1)->orderBy('course_user.created_at', 'desc')->get();

        $allCourses = $userCourses->concat($lockedCourses);

        $lockedCount = $lockedCourses->where('is_locked', 0)->count() + $userCourses->count();
        return view('admin.course.all_courses', compact('allCourses', 'lockedCount'));
    }
}
