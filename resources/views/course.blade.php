@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-12 clearfix">
                    <h1 class="pull-left">{{$course->fullname}} ({{$course->code}})</h1>
                    @if (Auth::user()->isAdmin())
                    <a href="{{ url('/course/'.$course->code.'/edit/') }}" class="btn btn-primary pull-right"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-primary pull-right" href="{{ url('/course/'.$course->code.'/notify/') }}"><i class="fa fa-plus"></i></a>
                    @endif
                </div>
            </div>

            <!-- todo: add search -->

            @foreach ($notifications as $notification)
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$notification->title}}
                    @if (Auth::user()->isAdmin())
                    <a href="{{ url('/course/'.$course->code.'/n/'.$notification->id.'/') }}" class="pull-right"><i class="fa fa-edit"></i></a>
                    @endif
                </div>

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
