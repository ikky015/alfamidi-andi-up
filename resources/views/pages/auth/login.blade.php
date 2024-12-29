<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login | DC Alfamidi Palu</title>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{ asset('templates/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('templates/dist/css/adminlte.min.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
    <body class="hold-transition login-page">
        <div class="login-box">
            @if (session('error-unathorized'))
                <script>
                Swal.fire({
                    title: "Terjadi Kesalahan",
                    text: "{{ session('error-unathorized') }}",
                    icon: "erorr"
                    });
                </script>
            @endif
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Masuk Untuk Memulai</p>
                    <div class="login-logo">
                        <link href="text">
                            <img src="{{ asset('templates/img/logo.png') }}" alt="Logo" style="max-width: 150px; margin-bottom: 10px;">
                            <br>DC Alfamidi Palu
                        </link>
                    </div>
                    <form action="/login" method="post">
                        @csrf
                        @method('POST')
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="{{ asset('templates/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('templates/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('templates/dist/js/adminlte.min.js') }}"></script>
    </body>
</html>
