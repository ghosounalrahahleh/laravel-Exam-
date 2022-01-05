@extends('public-site.layouts.master')
@section('title','Home')
@section('content')
<div id="particles-js"> </div>

<div class="container d-flex  mainContainer">
    <div class="row d-flex ">
        <div class="col-lg-6 col-md-12 d-flex flex-column textColorBlue">
            <h1>Best Online Quiz Platform</h1>
            <p>Hey there!! Welcome to our online quiz website, Here we offer you a hight quality quizes that you can
                take and learn from it
                We have Computer quizes in addition of English Tests and we will add much more in the future stay
                tuned!.
            </p>
            <a href="{{ route('categories.index') }}">
                <button id="buttonStarted"><span>Let's Get Started</span></button>
            </a>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="row">
                <img src="{{ asset('img/3684.png') }}" alt="nothing" width="90%" height="90%">
            </div>
        </div>
    </div>
</div>
@endsection
