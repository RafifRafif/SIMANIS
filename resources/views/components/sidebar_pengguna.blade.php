{{-- Sidebar App CSS --}}
<link rel="stylesheet" href="{{ asset('css/sidebar_pengguna.css') }}">

@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    $roleString = $user->role ?? '';
    $userRoles = array_map('trim', explode(',', $roleString));
    $unit = strtolower($user->unitKerja->nama_unit ?? '');

    $isP4M = str_contains($unit, 'p4m');
    $isManajemen = str_contains($unit, 'manajemen');
    $isUnitNormal = $unit && !$isP4M && !$isManajemen;

    $isKepalaUnit = in_array('kepala_unit', $userRoles);
    $isAuditor = in_array('auditor', $userRoles);
    $isP4mRole = in_array('p4m', $userRoles);
@endphp

<div class="sidebar" id="sidebar">
    {{-- MENU UTAMA --}}
    <p class="px-3 text-uppercase small mb-2">Menu Utama</p>
    <a href="{{ route('beranda') }}"><i class="fa-solid fa-house"></i> Beranda</a>
    <a href="{{ route('arsip_risiko') }}"><i class="fa-solid fa-box-archive"></i> Arsip Risiko</a>

    {{-- MENU KEPALA UNIT --}}
    @if($isKepalaUnit || ($isAuditor && $isUnitNormal) || $isP4mRole)
        <p class="px-3 text-uppercase small mt-3 mb-2">Menu Kepala Unit</p>
        <a href="{{ route('registrasi.index') }}"><i class="fa-solid fa-pen-to-square"></i> Registrasi dan Mitigasi
            Risiko</a>
    @endif

    {{-- MENU KHUSUS P4M --}}
    @if($isP4mRole)
        <p class="px-3 text-uppercase small mt-3 mb-2">Menu P4M</p>
        <a href="{{ route('verifikasi_risiko') }}"><i class="fa-solid fa-circle-check"></i> Verifikasi Risiko</a>
        <a href="{{ route('kelola_beranda') }}"><i class="fa-solid fa-gear"></i> Kelola Beranda</a>
        <a href="{{ route('kelola_regis') }}"><i class="fa-solid fa-folder"></i> Kelola Form Regis</a>
        <a href="{{ route('kelola_pengguna') }}"><i class="fa-solid fa-users"></i> Kelola Pengguna</a>
    @endif

    {{-- MENU AUDITOR --}}
    @if($isAuditor || $isP4mRole || ($isKepalaUnit && $isUnitNormal && str_contains($unit, 'auditor')))
        <p class="px-3 text-uppercase small mt-3 mb-2">Menu Auditor</p>
        <a href="{{ route('penilaian') }}"><i class="fa-solid fa-list-check"></i> Review Auditor</a>
    @endif
</div>