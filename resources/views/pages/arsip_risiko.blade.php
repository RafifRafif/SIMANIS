@extends('layouts.pengguna')

@section('title', 'Arsip Risiko')

@section('content')
    {{-- Card Arsip CSS --}}
    <link rel="stylesheet" href="{{ asset('css/arsip_risiko.css') }}">
    <!-- Konten -->
    <h3 class="mt-3 mb-4">Arsip Risiko</h3>
    <div class="d-flex justify-content-evenly align-items-stretch flex-wrap">
        @include('components.arsip_risiko', [
            'color' => '#57C9E8',
            'number' => 42,
            'text' => 'Total Status Open',
            'icon' => 'fa-solid fa-file',
            'link' => '#'
        ])

        @include('components.arsip_risiko', [
            'color' => '#F2682A',
            'number' => 26,
            'text' => 'Total Status Closed',
            'icon' => 'fa-solid fa-file',
            'link' => '#'
        ])
    </div>
@endsection
