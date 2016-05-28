<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Redirect;
use Auth;
use App\Course;
use Illuminate\Support\Facades\Input;

class UserController extends Controller {
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
   * Show the user page
   *
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request) {
    return view('user', [
      'user' => Auth::user(),
      'courses' => Course::all()->sortByDesc('id'),
    ]);
  }

  /**
   * Update the info of a user
   *
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request) {
    $this->validate($request, [
      'name' => 'required',
    ]);
    Auth::user()->update(['name'=>Input::get('name')]);
    return Redirect::to('home');
  }

  public function addCourse(Request $request) {
    $this->validate($request, [
      'add' => 'required',
    ]);
    Auth::user()->courses()->attach(Input::get('add'));
    return Redirect::to('user')->with('message', 'Course added');
  }

  public function deleteCourse($id) {
    Auth::user()->courses()->detach($id);
    return Redirect::to('user')->with('message', 'Course removed');
  }
}
