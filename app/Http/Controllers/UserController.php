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
    public function show() {
      return view('user', [
        'user' => Auth::user(),
        ]);
    }

    /**
     * Update the info of a user
     *
     * @return \Illuminate\Http\Response
     */
    public function update() {
      if (Input::has('name')) {
        // todo: find out why it breaks when input doesn't conform to validator
        Auth::user()->update(['name'=>Input::get('name')]);
      }
      return Redirect::to('home');
    }
  }
