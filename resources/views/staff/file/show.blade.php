<x-staff-layout>
    <div class="container">
        <h2>Files in Category: {{ $category->name }}</h2>

        <!-- Status Filter and Search Input on the Same Line -->
        <div class="row mb-2">
            <div class="col-md-6">
                <label for="statusFilter" class="form-label">Filter by Status:</label>
                <select id="statusFilter" class="form-select">
                    <option value="">All</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="searchInput" class="form-label">Search:</label>
                <input type="text" id="searchInput" class="form-control" placeholder="Search files...">
            </div>
        </div>

        <table id="filesTable" class="table table-bordered">
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
        <button onclick="goBack()" class="btn btn-secondary mt-3">Go Back</button>
    </div>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Initialize DataTable and Filter -->
    <script>
        $(document).ready(function() {
            var table = $('#filesTable').DataTable();

            $('#statusFilter').on('change', function() {
                var selectedStatus = $(this).val();
                if (selectedStatus) {
                    table.column(3).search('^' + selectedStatus + '$', true, false).draw();
                } else {
                    table.column(3).search('').draw();
                }
            });

            $('#searchInput').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
</x-staff-layout>
