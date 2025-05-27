@extends('layout.public')
@section('title')
    {{ $horse->name }}
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <img class="img-responsive" alt="" src="{{ asset($horse->image) }}">
        </div>
        <div class="col-xs-12 col-md-6">
            <h1>{{ $horse->name }}</h1>
            <h3 style="color: #28a745; font-weight: bold; font-size: 1.5em; margin-top: 10px;">
                Top Bid: {{ $horse->price . '$' }}
            </h3>
            <p><b>{{ $horse->description }}</b></p>
            <p style="margin: 0;"><b>Gender:</b> {{ $horse->gender }}</p>
            <p style="margin: 0;"><b>Age:</b> {{ $horse->age }}</p>
            <p><b>Breed:</b> {{ $horse->breed }}</p>
            @if (Auth::user()->role_id == 2)
                <a href="{{ route('bid.create', $horse->id) }}" class="btn btn-primary" title="">Place your bid</a>
            @endif
        </div>
    </div>
@endsection
