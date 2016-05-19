<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Redirect;
use Auth;
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
      //var_dump(Auth::user()->courses()->get());
      //todo: courses
      $message = $request->session()->get('message');
      return view('user', [
        'user' => Auth::user(),
        'message' => $message,
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
  }
