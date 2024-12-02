<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kasir Pintar')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Reset margin/padding */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        /* Membuat konten utama memenuhi ruang */
        .content {
            flex-grow: 1;
        }

        /* Navbar styling */
        .navbar {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Kasir Pintar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/staffs') }}">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/shifts') }}">Shift</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/barangs') }}">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/merks') }}">Merk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/kategoris') }}">Kategori</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container content py-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; Katar 2024 | <a href="#">Privacy Policy</a></p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
