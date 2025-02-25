<x-app-layout>
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

        <!-- Data Table -->
        <div class="table-responsive">
            <table id="filesTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Process</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr class="file-row">
                            <td>{{ $file->file_name }}</td>
                            <td>{{ $file->description }}</td>
                            <td>{{ $file->location }}</td>
                            <td class="file-status">{{ $file->status }}</td>
                            <td>
                                <a href="{{ route('all-file.view', $file->id) }}" class="btn btn-primary">View</a>
                            </td>
                            <td>
                                <form action="{{ route('file.update-status', $file->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <select name="status" class="form-select" onchange="this.form.submit()">
                                        <option value="pending" {{ $file->status == 'Pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="rejected" {{ $file->status == 'rejected' ? 'selected' : '' }}>
                                            Rejected</option>
                                        <option value="approved" {{ $file->status == 'approved' ? 'selected' : '' }}>
                                            Approved</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button onclick="goBack()" class="btn btn-secondary mt-3">Go Back</button>
    </div>

    <!-- Include DataTables CSS -->
    @section('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    @stop
    <!-- Include jQuery and DataTables JS -->
    @section('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                // Initialize DataTable
                var table = $('#filesTable').DataTable({
                    responsive: true,
                    searching: true, // Enable the search feature
                    ordering: true, // Enable column sorting
                    pageLength: 10, // Set default page length
                });

                // Filter by status and search input
                $('#statusFilter').on('change', function() {
                    table.column(3).search(this.value).draw(); // Column index 3 is the "Status" column
                });

                $('#searchInput').on('keyup', function() {
                    table.search(this.value).draw(); // Global search for all columns
                });
            });

            // Go back function
            function goBack() {
                window.history.back();
            }
        </script>
    @stop


</x-app-layout>
