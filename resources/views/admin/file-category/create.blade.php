<x-app-layout>
    <h1>Add File Category</h1>
    <form action="{{ route('file-category.store') }}" method="POST" enctype="multipart/form-data" class="container mt-5">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</x-app-layout>
