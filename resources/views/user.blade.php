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

                        @if (strpos($user->email, 'student'))
                            <div class="form-group{{ $errors->has('inscriptions') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Inscriptions</label>

                                <div class="col-md-6">
                                    <!-- todo: add inscriptions -->
                                    <input type="text" class="form-control" name="inscriptions" value="TO DO!!">

                                    @if ($errors->has('inscriptions'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('inscriptions') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="form-group{{ $errors->has('classes') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Classes</label>

                                <div class="col-md-6">
                                    <!-- todo: add classes -->
                                    <input type="text" class="form-control" name="classes" value="TO DO!!">

                                    @if ($errors->has('classes'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('classes') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Submit
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
