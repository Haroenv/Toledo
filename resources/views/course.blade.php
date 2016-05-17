@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>{{$course->fullname}} ({{$course->code}})</h1>
            {{$course}}
            @foreach ($notifications as $notification)
                {{$notification}}
            <div class="panel panel-default">
                <div class="panel-heading">{{$notification->title}}</div>

                <div class="panel-body">
                    {{$notification->content}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
