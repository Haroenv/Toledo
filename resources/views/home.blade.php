@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- todo: add search -->
            @forelse ($courses as $course)
            <a href="{{ url('/course/'.$course->code) }}" class="nolink">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$course->name}}</div>
                    <div class="panel-body">
                        <p>(id: {{$course->id}})</p>
                        <p>name: {{$course->fullname}}</p>
                        <p>code: {{$course->code}}</p>
                    </div>
                </div>
            </a>
            @empty
            <div class="panel panel-default">
                <div class="panel-heading">Logged in</div>

                <div class="panel-body">
                    <p>You can now add courses in your <a href="{{ url('user') }}">user</a> menu</p>
                </div>
            </div>
            @endforelse

        </div>
    </div>
</div>
@endsection
