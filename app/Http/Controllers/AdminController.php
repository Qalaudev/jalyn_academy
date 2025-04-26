<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function users()
    {
        $users = User::all();
        return view('admin.users.users',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function courses()
    {
        $courses = Course::all();
        return view('admin.courses.courses',compact('courses'));
    }
}
