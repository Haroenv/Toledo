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
        $course = Course::where('code',$item)->first();
        $notifications = $course->notifications()->get()->sortByDesc('updated_at');
        return view('course',[
            'course' => $course,
            'notifications' => $notifications,
        ]);
    }

    /**
     * show the add notification screen
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddNotification(Request $request) {
        return view('notification');
    }

    /**
     * show the edit notification screen
     *
     * @return \Illuminate\Http\Response
     */
    public function showEditNotification(Request $request, $id, $notification) {
        $notif = Notification::where('id',$notification)->first();
        return view('notification',[
            'title' => $notif->title,
            'content' => $notif->content,
            'file' => $notif->file,
        ]);
    }

    /**
    * execute the addition of a new notification
    *
    * @return \Illuminate\Http\Response
    */
    public function executeAddNotification(Request $request, $id) {
        $notification = new Notification;
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $notification->title = $request->title;
        $notification->content = $request->content;
        $notification->course_id = Course::where('code',$id)->first()->id;
        if (Input::hasFile('file') && Input::file('file')->isValid()) {
            $destinationPath = 'uploads';
            $extension = Input::file('file')->getClientOriginalExtension();
            $name = pathinfo(Input::file('file')->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $name.'-'.rand(100,999).'.'.$extension;
            Input::file('file')->move($destinationPath, $fileName);
            $notification->file = $fileName;
        }
        $notification->save();
        return Redirect::to('course/'.$id)->with('message', 'Notification added');
    }

    /**
    * execute the edit of a notification
    *
    * @return \Illuminate\Http\Response
    */
    public function executeEditNotification(Request $request,$id,$notification) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        Notification::where('id',$notification)
            ->first()
            ->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        if (Input::hasFile('file') && Input::file('file')->isValid()) {
            $destinationPath = 'uploads';
            $extension = Input::file('file')->getClientOriginalExtension();
            $name = pathinfo(Input::file('file')->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $name.'-'.rand(100,999).'.'.$extension;
            Input::file('file')->move($destinationPath, $fileName);
            Notification::where('id',$notification)
                ->first()
                ->update([
                    //todo: figure out why it doesn't update
                    'file' => $fileName,
                ]);
        }
        return Redirect::to('course/'.$id)->with('message', 'Notification edited');
    }

    /**
     * show the edit course screen
     *
     * @return \Illuminate\Http\Response
     */
    public function showEditCourse(Request $request,$id) {
        $course = Course::where('code',$id)->first();
        return view('admin',[
            'name'=>$course->name,
            'fullname'=>$course->fullname,
            'code'=>$course->code,
            'edit'=>true,
        ]);
    }

    /**
    * execute the edit of a course
    *
    * @return \Illuminate\Http\Response
    */
    public function executeEditCourse(Request $request,$id) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'fullname' =>  [
                'required',
                'max:255',
            ],
            'code' => [
                'required',
                'max:20',
            ],
        ]);
        Course::where('code',$id)
            ->first()
            ->update([
                'name' => Input::get('name'),
                'fullname' => Input::get('fullname'),
                'code' => Input::get('code'),
            ]);
        return Redirect::to('course/'.Input::get('code'))->with('message', 'Details edited');
    }

    /**
     * delete a notification
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteNotification($id,$notification) {
        Notification::find($notification)->delete();
        return Redirect::to('course/'.$id)->with([
            'message'=>'Notification deleted.',
            'action'=>'/course/'.$id.'/r/'.$notification,
            'cta'=>'undo',
        ]);
    }

    /**
     * restore a notification
     *
     * @return \Illuminate\Http\Response
     */
    public function restoreNotification($id,$notification) {
        // undoing would be done via
        Notification::withTrashed()->find($notification)->restore();
        // but I don't know how to trigger that function
        return Redirect::to('course/'.$id)->with('message','Notification restored.');
    }
}
