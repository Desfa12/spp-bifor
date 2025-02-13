<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Sistem Pembayaran Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0; /* Menghilangkan margin default */
            height: 100vh; /* Mengatur tinggi body */
            overflow: hidden; /* Menghindari scroll */
        }
        .background {
            background-image: url('https://storage.googleapis.com/a1aa/image/9l1Y88BukuEAxbioQH8-Cv6hWcG4GPdqPQVm9bYYgRc.jpg');
            background-size: cover; /* Menyesuaikan gambar dengan ukuran elemen */
            background-position: center; /* Memusatkan gambar */
            background-repeat: no-repeat; /* Menghindari pengulangan gambar */
            height: 100vh; /* Mengatur tinggi elemen latar belakang */
            position: relative; /* Memungkinkan elemen anak untuk diposisikan relatif */
        }
    </style>
</head>
<body class="text-white">
    <div class="background">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center p-6">
            <div class="flex space-x-4 mb-4 md:mb-0"> <!-- Kontainer untuk kedua logo -->
                <img alt="Logo of Yayasan Pendidikan Nurul Ilma" class="h-16 md:h-20 w-auto object-contain" src="{{ asset('images/logoy.png') }}" />
                <img alt="Logo of Bina Informatika" class="h-16 md:h-20 w-auto object-contain" src="{{ asset('images/logob.png') }}" />
            </div>
            <div class="flex space-x-4">
                <!-- Mengarahkan ke halaman login dan register Laravel -->
                <a href="{{ route('login') }}" class="text-white border border-white py-2 px-4 rounded transition duration-200 hover:bg-white hover:text-black">Log In</a>
                <a href="{{ route('register') }}" class="text-white border border-white py-2 px-4 rounded transition duration-200 hover:bg-white hover:text-black">Sign Up</a>
            </div>
        </div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center">
            <h1 class="text-4xl md:text-5xl font-bold">Sistem Pembayaran Sekolah</h1>
            <p class="text-xl md:text-2xl mt-4">YAYASAN PENDIDIKAN NURUL ILMA</p>
        </div>
    </div>
</body>
</html>