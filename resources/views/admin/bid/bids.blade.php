<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bids') }}
        </h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <a href="{{ route('bid.admin.create') }}" class="btn btn-primary mb-3">Add Bid</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Horse</th>
                            <th>User</th>
                            <th>Amount</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bids as $bid)
                            <tr>
                                <td>{{ $bid->id }}</td>
                                <td>{{ $bid->horse->name }}</td>
                                <td>{{ $bid->user->name }}</td>
                                <td>{{ $bid->amount }}</td>
                                <td>{{ $bid->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $bid->updated_at->format('Y-m-d H:i:s') }}</td>
                                <td><a href="" class="btn btn-primary">Edit</a></td>
                                <td><a href="" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        @if ($bids->isEmpty())
                            <tr>
                                <td colspan="11" class="text-center">No bids found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
