<nav class="navbar navbar-expand-lg bg-light shadow-sm fixed-top">
    <div class="container" style="margin-left: 10px">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/polibatam.png') }}" alt="Polibatam" width="40" height="40" class="me-3">
            <img src="{{ asset('images/simanis.png') }}" alt="SiMANiS" width="120" height="35">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Menu tengah -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-4"><a class="nav-link" href="#">Beranda</a></li>
                <li class="nav-item mx-4"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                <li class="nav-item mx-4"><a class="nav-link" href="#kontak">Kontak</a></li>
            </ul>

            <!-- Tombol kanan -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="btn btn-primary" href="/login">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>