<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
      //todo: only allow admins
      $this->middleware('auth');
    }

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
    public function add() {
      if (Input::has('name') && Input::has('fullname') && Input::has('id')) {
        // todo: put in Course
        return Input::all();
        // Course::add();
      }
      return Redirect::to('home');
    }
}
