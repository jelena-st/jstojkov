@extends('layout.public')
@section('title')
    Edit horse
@endsection
@section('content')
    <div class="row">
        <div class="section-container-spacer">
            <form action="" class="reveal-content" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="section-title">Edit horse</h2>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1"
                                {{ $horse->featured == 1 ? 'checked' : '' }}>
                            <label for="featured">Featured</label>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $horse->name }}">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="" disabled>Select gender</option>
                                <option value="1" {{ $horse->gender == 1 ? 'selected' : '' }}>Mare</option>
                                <option value="2" {{ $horse->gender == 2 ? 'selected' : '' }}>Stallion</option>
                                <option value="3" {{ $horse->gender == 3 ? 'selected' : '' }}>Gelding</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" placeholder="Age" name="age" id="age" value="{{ $horse->age }}">
                        </div>
                        <div class="form-group">
                            <label for="breed">Breed</label>
                            <input type="text" class="form-control" id="breed" placeholder="Breed" name="breed" value="{{ $horse->breed }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" placeholder="Price" name="price" id="price" value="{{ $horse->price }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Enter description" name="description">{{ $horse->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
