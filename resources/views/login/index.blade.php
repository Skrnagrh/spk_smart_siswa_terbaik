<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/logo/PT-Samudra-marine-Indonesia.png" rel="icon">
    <title>Siswa Terbaik | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/login/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/login/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/login/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="hold-transition login-page bg-primary">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <a href="/">
                        <font color="blue">
                            <strong>SPK Siswa Terbaik </strong>
                        </font>
                    </a>
                </div>
                <center>
                    <img src="/beranda/gambar/logo.jpeg" width=180px />
                    <h1>Login</h1>
                    <br>
                </center>
                <form action="/login" method="post">
                    @csrf
                    <label>Alamat Email</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Alamat Email"
                            value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <label>Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="passwordInput"
                            placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span id="togglePassword" class="fas fa-eye-slash"
                                    onclick="togglePasswordVisibility()"></span>
                                <span class="fas fa-lock" style="margin-left: 5px;"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <a href="/" class="btn btn-danger btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
                                <b> Batal</b>
                            </a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" name="btnLogin"
                                title="Masuk Sistem">
                                <b> Masuk</b>
                            </button>
                        </div>
                </form>

            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    <script src="/login/plugins/jquery/jquery.min.js"></script>
    <script src="/login/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/login/dist/js/adminlte.min.js"></script>
    <script src="/login/plugins/alert.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("passwordInput");
            var togglePassword = document.getElementById("togglePassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePassword.classList.remove("fa-eye-slash");
                togglePassword.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                togglePassword.classList.remove("fa-eye");
                togglePassword.classList.add("fa-eye-slash");
            }
        }
    </script>

</body>

</html>