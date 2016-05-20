@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">Making an account</div>
                <div class="panel-body">
                    <ul>
                        <li>Make sure that you have a proper <code>r-number</code> or <code>u-number</code></li>
                        <li>Use the <code>r-number@student.kuleuven.be</code> or <code>u-number@kuleuven.be</code></li>
                        <li>Make sure you have your invitation code on the card you got with your inscription.</li>
                    </ul>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Questions</div>
                <div class="panel-body">
                    <p>First of all: this isn’t the real <a href="http://toledo.kuleuven.be/english/">Toledo</a> site.</p>
                    <p>If you still have questions; send an email to <a href="mailto:Haroen Viaene <studie@haroen.me>?Subject=%5BToledo%5D">studie@haroen.me</a></p>
                    <p>If you have complaints; send an email to <a href="mailto:Haroen Viaene <spam@haroen.me>?Subject=%5BToledo complaint%5D">spam@haroen.me</a></p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
