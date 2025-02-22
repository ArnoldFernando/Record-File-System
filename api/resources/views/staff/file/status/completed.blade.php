<x-staff-layout>
    <div class="container">
        <h2>File Details</h2>
        <table class="table table-bordered">
            <tr>
                <th>File Name:</th>
                <td>{{ $file->file_name }}</td>
            </tr>
            <tr>
                <th>Description:</th>
                <td>{{ $file->description }}</td>
            </tr>
            <tr>
                <th>Location:</th>
                <td>{{ $file->location }}</td>
            </tr>
            <tr>
                <th>Status:</th>
                <td>{{ $file->status }}</td>
            </tr>
            <tr>
                <th>File:</th>
                <td>
                    @if ($file->path)
                        <a href="{{ route('staff.file.download', $file->id) }}" class="btn btn-success">Download</a>
                </td>
            @else
                No file available
                @endif
                </td>
            </tr>
        </table>

        <button onclick="goBack()" class="btn btn-secondary mt-3">Go Back</button>
</x-staff-layout>
