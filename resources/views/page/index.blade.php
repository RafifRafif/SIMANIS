@extends('layouts.app')

@section('title', 'SiMANiS - Sistem Manajemen Risiko Polibatam')

@section('content')

    <section class="hero d-flex flex-column justify-content-center align-items-center">
    <img src="{{ asset('images/simanis_putih.png') }}" alt="SiMANiS" class="img-fluid mb-0" style="max-width: 450px;">
    <h4 class="fw-bold mt-n2 mb-0">Sistem Manajemen Risiko Polibatam</h4> 
    <p class="lead mt-9 text-center" style="font-family: 'Poppins', sans-serif; max-width: 700px; line-height: 1.6;">
        Platform terpadu untuk registrasi, penilaian, mitigasi, dan pemantauan risiko di Polibatam.
    </p>
</section>



@endsection
