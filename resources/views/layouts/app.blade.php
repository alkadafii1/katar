<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* body */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        /* Membuat konten utama mengisi ruang yang tersedia */
        .content {
            flex-grow: 1;
        }

        /* footer */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">Kasir Pintar</a>
        <!-- Menu lainnya -->
    </nav>

    <div class="container">
        <!-- Tempat untuk konten halaman spesifik -->
        @yield('content') 
    </div>

    <footer>
        <p>&copy; Katar 2024</p>
    </footer>
</body>
</html>
