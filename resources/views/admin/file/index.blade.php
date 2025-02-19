<x-app-layout>
    <div class="container">
        <h1>file</h1>
        <a href="{{ route('file.create') }}" class="btn btn-primary">Upload File</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>{{ $file->file_name }}</td>
                        <td>{{ $file->location }}</td>
                        <td>{{ ucfirst($file->status) }}</td>
                        <td>
                            <a href="{{ route('file.show', $file->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('file.edit', $file->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('file.destroy', $file->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</x-app-layout>
