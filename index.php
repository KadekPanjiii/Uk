<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="assets/plugins/fontawesome-free/css/all.min.css"
    />
    <!-- icheck bootstrap -->
    <link
      rel="stylesheet"
      href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css" />
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="assets/index2.html" class="h1"><b>Vo</b> LTE</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Sign in to start your session</p>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="username" placeholder="Username" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input
                type="password"
                class="form-control" id="password"
                placeholder="Password"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="text-danger" id="errorMessage"></div>
            <div class="row">
              <div class="col-8">
                
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block" id="login" onclick="Login()">
                  Login
                </button>
              </div>
              <!-- /.col -->
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>

    <script>
        var upayaLogin = 0

        function Login(){
            var username = document.getElementById("username").value
            var password = document.getElementById("password").value

            if(username === "a" && password === "a"){
                alert("Login berhasil.")
                window.location = "views/home.php"
            } else {
                upayaLogin ++

                if(upayaLogin >= 3){
                    var countdown = 30
                    document.getElementById("errorMessage").innerHTML = "Sisa percobaan Anda telah habis. Silahkan tunggu " + countdown + " detik."
                    document.getElementById("login").disabled = true

                    var countdownInterval = setInterval(  function(){
                        countdown --
                        document.getElementById("errorMessage").innerHTML = "Sisa percobaan Anda telah habis. Silahkan tunggu " + countdown + " detik."

                        if(countdown <= 0){
                            clearInterval(countdownInterval)
                            document.getElementById("errorMessage").innerHTML = ""
                            document.getElementById("login").disabled = false
                            upayaLogin = 0
                        }
                    }, 1000)
                } else {
                    alert("Username atau Password salah. Sisa percobaan Anda " +(3- upayaLogin)+ " kali.")
                }
            }
        }
    </script>
  </body>
</html>
