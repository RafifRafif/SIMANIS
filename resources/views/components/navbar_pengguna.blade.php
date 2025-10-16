{{-- Navbar App CSS --}}
<link rel="stylesheet" href="{{ asset('css/navbar_pengguna.css') }}">

@push('modals')
    @include('components.titiktiga.modal-ubah-sandi')
    @include('components.titiktiga.modal-keluar')
@endpush

<nav class="navbar navbar-expand-lg bg-light shadow-sm fixed-top">
    <div class="container-fluid px-4 d-flex align-items-center position-relative">

        <!-- Logo kiri -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/polibatam.png') }}" alt="Polibatam" width="40" height="40" class="me-3">
            <img src="{{ asset('images/simanis.png') }}" alt="SiMANiS" width="125" height="35">
        </a>

        <!-- Titik 3 -->
        <div class="dropdown position-absolute end-0 me-2">
            <button class="btn btn-link text-dark" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-ellipsis-vertical fs-6"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li class="dropdown-header fw-bold text-muted">EVALIATA</li>
                <li>
                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ubahSandiModal">
                        <i class="fa-solid fa-key"></i> Ubah Sandi
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#keluarModal">
                        <i class="fa-solid fa-right-from-bracket"></i> Keluar
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
