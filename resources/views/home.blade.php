@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach ($courses as $course)
            <a href="{{ url('/course/'.$course->id) }}" class="nolink">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$course->name}}</div>

                    <div class="panel-body">
                        <p>id: {{$course->id}}</p>
                        <p>name: {{$course->fullname}}</p>
                        <p>code: {{$course->code}}</p>
                    </div>
                </div>
            </a>
            @endforeach
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
