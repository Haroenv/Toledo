@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>

                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ action('UserController@update') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-arrow-circle-right"></i>Submit
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Inscriptions</label>

                            <div class="col-md-6">
                                <form class="clearfix" action="{{action('UserController@addCourse')}}" method="POST">
                                    {!! csrf_field() !!}
                                    <select class="form-control pull-left" style="width:auto;" name="add">
                                    @forelse ($courses as $course)
                                        <option value="{{$course->id}}">{{$course->fullname}} ({{$course->code}})</option>
                                    @empty
                                        <option>there are no courses</option>
                                    @endforelse
                                    </select>
                                    <button class="btn btn-primary pull-right"><i class="fa fa-btn fa-plus"></i> Add</button>
                                </form>

                                @forelse ($user->courses as $course)
                                    <div class="clearfix">
                                        <p class="pull-left">{{$course->fullname}} ({{$course->code}})</p>
                                        <a href="{{ url('/user/delete/'.$course->id) }}"class="btn btn-danger pull-right"><i class="fa fa-btn fa-remove"></i> Delete</a>
                                    </div>
                                @empty
                                    <p> no inscriptions </p>
                                @endforelse

                                @if ($errors->has('inscriptions'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('inscriptions') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
