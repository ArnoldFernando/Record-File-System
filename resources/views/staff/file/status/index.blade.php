<x-staff-layout>

    <div class="container">
        <h1 class="mb-4 text-center"> {{ ucfirst($status) }}</h1>

        @forelse($files as $category => $categoryFiles)
            <h2 class="mt-3">Category: {{ $category }}</h2>
            <div class="row">
                @foreach ($categoryFiles as $file)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{ $file->file_name }}</strong></h5>
                                <p class="card-text">Description: {{ $file->description }}</p>
                                <p class="card-text">Civil Case Number: {{ $file->civil_case_number }}</p>
                                <p class="card-text">Lot Number: {{ $file->lot_number }}</p>
                                <p class="card-text">Status: <span class="badge bg-info">{{ $file->status }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <p>No files found for this status.</p>
        @endforelse
    </div>

    <button onclick="goBack()" class="btn btn-secondary mt-3">Go Back</button>
</x-staff-layout>
