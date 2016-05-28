@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-12 clearfix">
                    <h1 class="pull-left">{{$course->fullname}} ({{$course->code}})</h1>
                    @if (Auth::user()->isAdmin())
                    <ul class="list-inline pull-right">
                        <li>
                           <a href="{{ url('/course/'.$course->code.'/edit/') }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="{{ url('/course/'.$course->code.'/notify/') }}"><i class="fa fa-plus"></i></a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>

            <!-- todo: add search -->

            @foreach ($notifications as $notification)
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$notification->title}}
                    @if (Auth::user()->isAdmin())
                    <ul class="list-inline pull-right">
                        <li>
                            <a href="{{ url('/course/'.$course->code.'/d/'.$notification->id.'/') }}"><i class="text-danger fa fa-remove" onclick="return confirm('Are you sure you want to remove {{$notification->title}}?');"></i></a>
                        </li>
                        <li>
                            <a href="{{ url('/course/'.$course->code.'/n/'.$notification->id.'/') }}"><i class="fa fa-edit"></i></a>
                        </li>
                    </ul>
                    @endif
                </div>

                <div class="panel-body">
                    {{$notification->content}}
                    @if ($notification->file)
                        <p><a href="{{ url('uploads/'.$notification->file) }}">{{$notification->file}}</a></p>
                    @endif
                    <p>created: {{$notification->created_at}}</p>
                    <p>updated: {{$notification->updated_at}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
