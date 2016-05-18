<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Course;
use App\Notification;
use Auth;

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
        //var_dump(Auth::user()->courses()->get());
        $course = Course::where('code',$item)->first();
        $notifications = $course->notifications()->get();
        return view('course',[
            'course' => $course,
            'notifications' => $notifications,
        ]);
    }
}
