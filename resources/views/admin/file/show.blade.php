<x-app-layout>

    <div class="container">
        <h1>File Details</h1>

        <a href="{{ route('file.index') }}" class="btn btn-secondary mb-3">Back to file</a>

        <div class="card">
            <div class="card-body">
                <p class="card-text"><strong>Name:</strong> {{ $file->file_name }}</p>

                <p class="card-text"><strong>Location:</strong> {{ $file->location }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $file->description }}</p>
                <p class="card-text"><strong>Civil Case Number:</strong> {{ $file->civil_case_number }}</p>
                <p class="card-text"><strong>Lot Number:</strong> {{ $file->lot_number }}</p>
                <p class="card-text"><strong>Status:</strong> <span
                        class="badge bg-primary">{{ ucfirst($file->status) }}</span></p>
                <p class="card-text"><strong>Uploaded By:</strong> {{ $file->user->name }}</p>
                <p class="card-text"><strong>Category:</strong> {{ $file->category->name }}</p>
                <p class="card-text"><strong>Uploaded At:</strong> {{ $file->created_at->format('F d, Y h:i A') }}</p>

                @if ($file->file)
                    <span><strong>File:</strong></span>
                    <a href="{{ route('files.download', $file->id) }}" class="btn btn-success">Download</a>
                @endif

                <a href="{{ route('file.edit', $file->id) }}" class="btn btn-warning ">Edit</a>

                <form action="{{ route('file.destroy', $file->id) }}" method="POST" class="d-inline-block mt-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>
