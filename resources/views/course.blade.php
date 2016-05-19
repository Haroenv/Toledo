@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>{{$course->fullname}} ({{$course->code}})</h1>
            <a href="{{ url('/course/'.$course->code.'/n/add') }}">+</a>
            @foreach ($notifications as $notification)
            <div class="panel panel-default">
                <div class="panel-heading">{{$notification->title}}</div>

                <div class="panel-body">
                    {{$notification->content}}
                    <p>created: {{$notification->created_at}}</p>
                    <p>updated: {{$notification->updated_at}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
