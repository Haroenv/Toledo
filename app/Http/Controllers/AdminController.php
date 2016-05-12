<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use Redirect;
use Auth;
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
      $this->validate($request, [
        'name' => 'required|max:255',
        'fullname' =>  array(
          'required',
          'max:255',
          ),
        'id' => array(
          'required',
          'max:20',
          // todo: find out how to make unique
          // 'unique:courses',
          ),
        ]);
      // todo: add in db
      return Redirect::to('home');
    }
  }
