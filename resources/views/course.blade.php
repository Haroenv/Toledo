@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 clearfix">
                    <h1 class="pull-left">{{$course->fullname}} ({{$course->code}})</h1>
                    @if (Auth::user()->isAdmin())
                    <a class="btn btn-primary pull-right" href="{{ url('/course/'.$course->code.'/notify/') }}"><i class="fa fa-plus"></i></a>
                    @endif
                </div>
            </div>

            @foreach ($notifications as $notification)
            <div class="panel panel-default">
                <div class="panel-heading">{{$notification->title}}</div>

                <div class="panel-body">
                    {{$notification->content}}
                    <p>created: {{$notification->created_at}}</p>
                    <p>updated: {{$notification->updated_at}}</p>
                    @if (Auth::user()->isAdmin())
                    <p><a href="{{ url('/course/'.$course->code.'/n/'.$notification->id.'/') }}">edit</a></p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
