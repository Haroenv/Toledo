<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use Redirect;
use Auth;
use App\Course;
use Validator;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller {
    /**
     * place to add new courses or delete courses
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
      $message = $request->session()->get('message');
      return view('admin',[
        'message'=>$message,
        'edit'=>false,
      ]);
    }

    /**
     * add a new course
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
      $course = new Course;
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
      $course->name = $request->name;
      $course->fullname = $request->fullname;
      $course->code = $request->code;
      $course->save();
      return Redirect::route('dashboard')->with('message', 'Course added');
    }

    // todo: change things of course
  }
