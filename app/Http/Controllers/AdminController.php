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
    public function show() {
      return view('admin');
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
        'fullname' =>  array(
          'required',
          'max:255',
          ),
        'code' => array(
          'required',
          'max:20',
          ),
        ]);
      $course->name = $request->name;
      $course->fullname = $request->fullname;
      $coourse->code = $request->code;
      $course->save();
      return Redirect::to('home');
    }
  }
