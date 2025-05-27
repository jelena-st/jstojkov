@extends('layout.public')
@section('title')
    Add bid
@endsection
@section('content')
    <div class="row">
        <div class="section-container-spacer">
            <form action="" class="reveal-content" method="POST">
                @csrf
                <h2 class="section-title">Bid now for champion <span
                        style="color:rgb(251, 88, 88);">{{ $horse->name }}</span> and elevate to the elite!</h2>
                <h3 style="color: #28a745; font-weight: bold; font-size: 1.5em; margin-top: 10px;">
                    highest bid: {{ $horse->price . '$' }}
                </h3>
                <hr>
                <p><b>1. Enter Your Bid:</b> Type in the amount you're willing to bid.</p>
                <p><b>2. Review:</b> Double-check the horse's details and your bid.</p>
                <p><b>3. Submit:</b> Confirm and place your bid.</p>
                <p><b>4. Monitor:</b> Watch the auction for outbid notifications.</p>
                <p><b>5. Winning:</b> If you're the highest bidder at the end, you win!</p>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="amount">Bid amount</label>
                            <input type="number" class="form-control" min="{{$horse->price + 1}}" placeholder="min {{$horse->price + 1}}$" name="amount"
                                id="amount" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Place a Bid</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
