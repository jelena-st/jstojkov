@extends('layout.public')
@section('title')
    Horses auction
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 section-container-spacer">
            <h2>Horses Auction</h2>
        </div>
        @if (count($horses) > 0)
            @foreach ($horses as $horse)
                <div class="col-xs-12 col-md-4 section-container-spacer">
                    <img class="img-responsive" alt="{{ $horse->name }}" src="{{ asset($horse->image) }}">
                    <h3 style="color: #28a745; font-weight: bold; font-size: 1.5em; margin-top: 10px;">
                        Top Bid: {{ $horse->price . '$' }}
                    </h3>
                    <h2>{{ $horse->name }}</h2>
                    <p style="margin: 0;"><b>Gender:</b> {{ $horse->gender }}</p>
                    <p style="margin: 0;"><b>Age:</b> {{ $horse->age }}</p>
                    <p style="margin: 0;"><b>Breed:</b> {{ $horse->breed }}</p>
                    <br />
                    <a href="{{route('horse.one', $horse->id) }}" class="btn btn-primary" title="">Take a look</a>
                </div>
            @endforeach
        @else
            <div class="col-xs-12 section-container-spacer">
                <h2>No horses available for auction!</h2>
                <p>We currently do not have any horses available for auction. Please check back later.</p>
            </div>
        @endif
    </div>
@endsection
