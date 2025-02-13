<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
 <!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <form id="logout-form" action="/logout" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn-logout" onclick="confirmLogout(event)">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</ul>

<script>
function confirmLogout(event) {
    if (confirm("Yakin mau keluar dari halaman ini?")) {
        // Mencegah form dari pengiriman otomatis
        event.preventDefault();
        // Mengirimkan form logout setelah konfirmasi
        document.getElementById('logout-form').submit();
    }
}
</script>


<style>
.btn-logout {
    color: gray; /* Warna teks */
    outline: none; /* Menghilangkan outline */
    box-shadow: none; /* Menghilangkan bayangan */
    background: none; /* Menghilangkan latar belakang */
    border: none; /* Menghilangkan border */
    cursor: pointer; /* Menjadikan kursor pointer saat hover */
    font-size: 16px; /* Ukuran font */
    display: flex; /* Menjadikan elemen flex untuk ikon dan teks */
    align-items: center; /* Menyelaraskan ikon dan teks secara vertikal */
}

/* Efek hover */
.btn-logout:hover {
    color: black; /* Ubah warna teks saat hover */
}

/* Menghilangkan efek saat tombol ditekan */
.btn-logout:focus,
.btn-logout:active {
    outline: none; /* Menghilangkan outline saat fokus */
    background: none; /* Menghilangkan latar belakang saat ditekan */
    color: black; /* Tetap menjaga warna teks saat ditekan */
}
</style>


</nav>