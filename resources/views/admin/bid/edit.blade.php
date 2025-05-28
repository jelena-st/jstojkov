<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add bid') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="row">
                    <div class="section-container-spacer">
                        <form action="" class="reveal-content" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h2 class="section-title mb-4 text-center">Edit Horse</h2>
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="horse" class="form-label">Horse</label>
                                        <select class="form-select" id="horse" name="horse" required>
                                            <option value="" disabled
                                                {{ !isset($bid->horse_id) ? 'selected' : '' }}>Select horse</option>
                                            @foreach ($horses as $horse)
                                                <option value="{{ $horse->id }}"
                                                    {{ isset($bid->horse_id) && $bid->horse_id == $horse->id ? 'selected' : '' }}>
                                                    {{ $horse->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user" class="form-label">User</label>
                                        <select class="form-select" id="user" name="user" required>
                                            <option value="" disabled
                                                {{ !isset($bid->user_id) ? 'selected' : '' }}>Select user</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ isset($bid->user_id) && $bid->user_id == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="number" class="form-control" placeholder="Amount" name="amount"
                                            id="amount" value="{{ $bid->amount }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</x-app-layout>
