@extends('layout.public')
@section('title')
    Home
@endsection
@section('content')
    <!-- Add your site or app content here -->

    <div class="hero-full-wrapper">
        <h2>Top Horses</h2>
        <br>
        <div class="grid">
            <div class="gutter-sizer"></div>
            <div class="grid-sizer"></div>

            @if (count($horses) > 0)
                @foreach ($horses as $horse)
                    <div class="grid-item">
                        <img class="img-responsive" alt="" src="{{ asset($horse->image) }}">
                        <a href="{{ route('horse.one', $horse->id) }}" class="project-description">
                            <div class="project-text-holder">
                                <div class="project-text-inner">
                                    <h3>{{ $horse->name }}</h3>
                                    <p>Discover more</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-xs-12 section-container-spacer">
                    <h2>No horses available for auction :</h2>
                    <p>We currently do not have any horses available for auction. Please check back later.</p>
                </div>
            @endif

        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            masonryBuild();
        });
    </script>
@endsection
