<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SiMANiS')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">

    <style>
        /* FONT STYLING */
        body {
            font-family: 'Roboto', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins', sans-serif;
        }

        /* BACKGROUND STYLING */
        body {
            background: url('{{ asset('images/gu.jpg') }}') no-repeat center center/cover;
        }

        .hero {
            text-align: center;
            padding: 200px 20px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
        }

        .hero p {
            font-family: 'Poppins', sans-serif;
        }

        .navbar-toggler {
            border: none !important;
            box-shadow: none !important;
            transition: transform 0.2s ease, background-color 0.3s ease;
            border-radius: 6px;
            /* biar agak lembut di ujungnya */
        }

        .navbar-toggler:hover {
            background-color: rgba(0, 0, 0, 0.0);
            /* efek warna saat hover */
            transform: scale(1.1);
            /* sedikit membesar */
        }

        .navbar-toggler:focus {
            outline: none !important;
            box-shadow: none !important;
        }

        /* Efek hover pada navbar menu*/
        .nav-link:hover {
            color: #0d6efd !important;
            transition: 0.3s ease;
        }
    </style>
</head>

<body>

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
