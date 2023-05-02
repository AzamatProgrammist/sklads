<!DOCTYPE html>
<html lang="en">

<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="/public/assets/css/app.min.css">
  <link rel="stylesheet" href="/public/assets/bundles/jquery-selectric/selectric.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="/public/assets/css/style.css">
  <link rel="stylesheet" href="/public/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="/public/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='/public/assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="">
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="name">Name</label>
                      <input id="name" type="text" class="form-control" name="name" autofocus>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control" name="email">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <button type="submit" name="btn" class="btn btn-primary btn-lg btn-block">
                        Register
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="/login">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="/public/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="/public/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="/public/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="/public/assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="/public/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="/public/assets/js/custom.js"></script>
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>
<?php 
ob_start();
include 'config.php';
if (isset($_POST['btn'])) {
  
  $name = $_POST['name'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];
  $role_id = 2;
  $result = $user->store($name, $password, $email, $role_id);
  if ($result) {
          $_SESSION['password'] = $password;
          $_SESSION['email'] = $email;
          header("Location: /");
          ob_end_fluch();
        }else{
          header("Location: /register");
          ob_end_fluch();
        }
}

?>