@extends('layout.public')
@section("title")
    Horses auction
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 section-container-spacer">
            <h1>Horses Auction</h1>
        </div>

        @foreach ($horses as $horse)
            <div class="col-xs-12 col-md-4 section-container-spacer">
                <img class="img-responsive" alt="" src="./assets/images/img-12.jpg">
                <h2>{{ $horse->name }}</h2>
                <p style="margin: 0;"><b>Gender:</b> {{ $horse->gender }}</p>
                <p style="margin: 0;"><b>Age:</b> {{ $horse->age }}</p>
                <p style="margin: 0;"><b>Breed:</b> {{ $horse->breed }}</p>
                <br />
                <a href="./contact.html" class="btn btn-primary" title="">Take a look</a>
            </div>
        @endforeach
    </div>
@endsection
