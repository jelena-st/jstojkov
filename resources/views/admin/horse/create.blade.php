<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Horse') }}
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
                            <div class="text-center">
                                <h2 class="section-title mb-4">Add horse</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-6 mx-auto">
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1">
                                        <label class="form-check-label" for="featured">Featured</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="" selected disabled>Select gender</option>
                                            <option value="1">Mare</option>
                                            <option value="2">Stallion</option>
                                            <option value="3">Gelding</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="number" class="form-control" placeholder="Age" name="age" id="age" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="breed" class="form-label">Breed</label>
                                        <input type="text" class="form-control" id="breed" placeholder="Breed" name="breed" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" class="form-control" placeholder="Price" name="price" id="price" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter description" name="description" required></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
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
