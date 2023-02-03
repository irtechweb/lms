<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        // dd(auth()->user());
        $data['students'] =  User::where('is_active','1')->count();
        return view('admin.index',compact('data'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
}
