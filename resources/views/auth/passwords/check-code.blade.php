<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SPP | Forgot Password</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h3"><b>Sistem Pembayaran Sekolah </b>Yayasan Pendidikan Nurul Ilma</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masukkan Kode Unik Anda untuk mereset password</p>

      @if (session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
      @endif

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <form action="{{ route('password.validate') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="unique_code" placeholder="Kode Unik" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
        <small class="text-muted">Kode unik ini digunakan untuk reset password jika Anda lupa.</small>
        <button type="submit" class="btn btn-primary btn-block mt-3">Validasi Kode</button>
      </form>

      <p class="mt-3 mb-1">
        <a href="{{ route('login') }}">Kembali ke Login</a>
      </p>
    </div>
  </div>
</div>

<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
