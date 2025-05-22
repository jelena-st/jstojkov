@extends('layout.public')
@section("title")
    {{ $horse->name }}
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <img class="img-responsive" alt="" src="./assets/images/img-10.jpg">
        </div>
        <div class="col-xs-12 col-md-6">
            <h1>{{ $horse->name }}</h1>
            <p><b>{{ $horse->description }}</b></p>
            <p style="margin: 0;"><b>Gender:</b> {{ $horse->gender }}</p>
            <p style="margin: 0;"><b>Age:</b> {{ $horse->age }}</p>
            <p><b>Breed:</b> {{ $horse->breed }}</p>
            <a href="contact.html" class="btn btn-primary" title="">Place your bid</a>
        </div>
    </div>
@endsection
