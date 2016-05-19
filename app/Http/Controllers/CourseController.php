<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use Redirect;
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
    public function single(Request $request, $item) {
        // todo: order
        $course = Course::where('code',$item)->first();
        $notifications = $course->notifications()->get();
        $message = $request->session()->get('message');
        return view('course',[
            'course' => $course,
            'notifications' => $notifications,
            'message' => $message,
        ]);
    }

    public function showAddNotification(Request $request) {
        $message = $request->session()->get('message');
        return view('notification',[
            'title' => '',
            'content' => '',
            'message' => $message,
        ]);
    }

    public function showEditNotification(Request $request, $id, $notification) {
        $notif = Notification::where('id',$notification)->first();
        $message = $request->session()->get('message');
        return view('notification',[
            'title' => $notif->title,
            'content' => $notif->content,
            'message' => $message,
        ]);
    }

    public function executeAddNotification(Request $request, $id) {
        $notification = new Notification;
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $notification->title = $request->title;
        $notification->content = $request->content;
        $notification->course_id = Course::where('code',$id)->first()->id;
        $notification->save();
        return Redirect::to('course/'.$id)->with('message', 'Notification added');
  }

  public function executeEditNotification(Request $request,$id,$notification) {
    $this->validate($request, [
        'title' => 'required|max:255',
        'content' => 'required',
    ]);
    Notification::where('id',$notification)->first()->update(['title'=>Input::get('title'),'content'=>Input::get('content')]);
    return Redirect::to('course/'.$id)->with('message', 'Notification edited');
  }
}
