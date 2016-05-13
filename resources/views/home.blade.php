@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach ($courses as $course)
            <div class="panel panel-default">
                <div class="panel-heading">{{$course->name}}</div>

                <div class="panel-body">
                    {{$course->id}}
                    {{$course}}
                </div>
            </div>
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
