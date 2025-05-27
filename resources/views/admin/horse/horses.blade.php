<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Horses') }}
        </h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <a href="{{ route('horse.admin.create') }}" class="btn btn-primary mb-3">Add Horse</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Breed</th>
                            <th>Gender</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Featured</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horses as $horse)
                            <tr>
                                <td>{{ $horse->id }}</td>
                                <td>{{ $horse->name }}</td>
                                <td>{{ $horse->age }}</td>
                                <td>{{ $horse->breed }}</td>
                                <td>{{ $horse->gender }}</td>
                                <td>{{ $horse->price }}</td>
                                <td>{{ $horse->description }}</td>
                                <td>
                                    <img src="{{ asset($horse->image) }}" alt="horse"
                                        class="w-20 h-20 object-cover">
                                </td>
                                <td>{{ $horse->featured ? 'Yes' : 'No' }}</td>
                                <td>{{ $horse->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $horse->updated_at->format('Y-m-d H:i:s') }}</td>
                                <td><a href=""
                                        class="btn btn-primary">Edit</a></td>
                                <td><a href="{{ route('horse.admin.delete', $horse->id) }}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        @if ($horses->isEmpty())
                            <tr>
                                <td colspan="11" class="text-center">No horses found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</x-app-layout>
