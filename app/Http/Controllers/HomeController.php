<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        return view('welcome', compact('courses'));
    }

    public function about_us()
    {
        return view('layout.about');
    }

    public function contact()
    {
        return view('layout.contact');
    }

}
