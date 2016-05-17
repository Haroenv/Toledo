<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Course;
use App\Notification;

class CourseController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function single($item) {
        $course = Course::where('code',$item)->first();
        $notifications = Notification::where('course_id',$course->id)->get();
        return view('course',[
            'course' => $course,
            'notifications' => $notifications,
        ]);
    }
}
