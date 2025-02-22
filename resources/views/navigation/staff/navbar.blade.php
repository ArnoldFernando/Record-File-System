<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top">RFMS</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded {{ Route::is('staff.file.index') ? 'active' : '' }}"
                        href="{{ route('staff.file.index') }}">Files</a>
                </li>
                <li class="nav-item dropdown mx-0 mx-lg-1">
                    <a class="nav-link dropdown-toggle py-3 px-0 px-lg-3 rounded" href="#" id="statusDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                        <li>
                            <a class="dropdown-item {{ request()->is('files/status/pending') ? 'active' : '' }}"
                                href="{{ route('staff.files.status', 'pending') }}">
                                Pending
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->is('files/status/approved') ? 'active' : '' }}"
                                href="{{ route('staff.files.status', 'approved') }}">
                                Approved
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->is('files/status/rejected') ? 'active' : '' }}"
                                href="{{ route('staff.files.status', 'rejected') }}">
                                Rejected
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->is('files/status/deleted') ? 'active' : '' }}"
                                href="{{ route('staff.files.status', 'deleted') }}">
                                Deleted
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link py-3 px-0 px-lg-3 rounded btn btn-link text-danger"
                            style="border: none; background: none; cursor: pointer;">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
