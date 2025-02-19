<x-staff-layout>
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-3">
                <a href="{{ route('staff.file.show', $category->id) }}" style="text-decoration: none;">

                    <div class="category-item text-center">
                        <div class="icon-with-text">
                            <i class="fa fa-folder fa-8x"></i>
                            <!-- Using Font Awesome icon for folder with even larger size -->
                            <p class="big-icon-text text-center">{{ $category->name }}</p>
                        </div>
                    </div>
                </a>

            </div>
        @endforeach
    </div>
</x-staff-layout>
