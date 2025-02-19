<x-app-layout>

    <div class="container">
        <h1>Upload File</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="file_name" class="form-label">File Name</label>
                <input type="text" name="file_name" id="file_name" class="form-control" value="{{ old('file_name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="civil_case_number" class="form-label">Civil Case Number</label>
                <input type="text" name="civil_case_number" id="civil_case_number" class="form-control"
                    value="{{ old('civil_case_number') }}" required>
            </div>

            <div class="mb-3">
                <label for="lot_number" class="form-label">Lot Number</label>
                <input type="text" name="lot_number" id="lot_number" class="form-control"
                    value="{{ old('lot_number') }}" required>
            </div>

            <div class="mb-3">
                <label for="path" class="form-label">Path</label>
                <input type="text" name="path" id="path" class="form-control" value="{{ old('path') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" selected>Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                    <option value="deleted">Deleted</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="file_category_id" class="form-label">File Category</label>
                <select name="file_category_id" id="file_category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-success">Upload File</button>
            <a href="{{ route('file.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>


</x-app-layout>
