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
            font-family: Arial, sans-serif;
        }

        /* Variabel untuk warna agar mudah diubah */
        :root {
            --navbar-bg-color: rgb(255, 255, 255);
            --footer-bg-color: rgb(255, 255, 255);
            --content-bg-color: rgba(250, 242, 230);
            --navbar-text-color: #333;
            --footer-text-color: #333;
        }

        /* Navbar styling */
        .navbar {
            background-color: var(--navbar-bg-color);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: var(--navbar-text-color);
        }

        .navbar .navbar-brand:hover,
        .navbar .nav-link:hover {
            color: #0056b3;
        }

        /* Sidebar styling */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px; /* Default sidebar width */
            background-color: #f8f9fa;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Make sure sidebar stays on top */
        }

        #sidebar a {
            display: block;
            color: #333;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
        }

        #sidebar a:hover {
            background-color: #007bff;
            color: white;
        }

        /* Konten utama */
        .content {
            background-color: var(--content-bg-color);
            padding: 20px;
            margin-left: 250px; /* Margin untuk konten utama agar tidak menempel ke sidebar */
            flex-grow: 1;
            min-height: 100vh; /* Membuat konten utama memenuhi tinggi layar */
        }

        /* Footer styling */
        footer {
            background-color: var(--footer-bg-color);
            text-align: center;
            padding: 15px;
            border-top: 1px solid #e9ecef;
            color: var(--footer-text-color);
        }

        footer a {
            color: #0056b3;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Wrapper untuk memastikan konten utama tetap di tengah */
        .container {
            width: 100%;
            max-width: 1200px; /* Membatasi lebar maksimal konten */
            margin: 0 auto; /* Memastikan konten tetap di tengah */
        }

        /* Responsif: Menyembunyikan sidebar dan konten utama saat layar kecil */
        @media (max-width: 768px) {
            #sidebar {
                width: 200px;
            }

            .content {
                margin-left: 200px;
            }
        }

        @media (max-width: 576px) {
            #sidebar {
                width: 0;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Sidebar -->
    <div id="sidebar">
        <a href="{{ url('/home') }}">Dashboard</a>
        <a href="{{ url('/staffs') }}">Staff</a>
        <a href="{{ url('/shifts') }}">Shift</a>
        <a href="{{ url('/barangs') }}">Barang</a>
        <a href="{{ url('/merks') }}">Merk</a>
        <a href="{{ url('/kategoris') }}">Kategori</a>
        <a href="{{ url('/suppliers') }}">Supplier</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container py-4">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; Katar 2024 | <a href="#">Privacy Policy</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
