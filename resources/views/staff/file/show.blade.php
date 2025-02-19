<x-staff-layout>
    <div class="container">
        <h2>Files in Category: {{ $category->name }}</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                    <tr>
                        <td>{{ $file->file_name }}</td>
                        <td>{{ $file->description }}</td>
                        <td>{{ $file->location }}</td>
                        <td>{{ $file->status }}</td>
                        <td>
                            <a href="{{ route('staff.file.view', $file->id) }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button onclick="goBack()">Go Back</button>

    </div>


</x-staff-layout>
