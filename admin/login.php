<?php
	session_start();
	if (isset($_SESSION['user'])) {
	  header('Location: index.php');
	  exit();
	}
	if (!empty($_POST['login']) && !empty($_POST['pass'])) {
		$login = $_POST['login'];
		$pass = $_POST['pass'];
    require 'db.php';
    $conn = db_connect();
    $stmt = $conn->prepare("SELECT * FROM praktika_kasutajad WHERE Kasutaja = ?");
    $stmt->bind_param('s', $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $kasutaja = $result->fetch_object();

		if ($kasutaja !== false && password_verify($pass, $kasutaja->Parool)) {
			$_SESSION['user'] = $kasutaja;
			header('Location: index.php');
		}
	}
?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admini Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="mx-auto mt-5 d-flex justify-content-center align-items-center">
      <img src="https://hkhk.edu.ee/sites/hkhk.edu.ee/files/hkhk_varviline_logo_valgega_transparent.png" height="80px" />
      <h3 class="text-light">HKHK Praktikaettevõtted</h3>
    </div>

    <div class="card card-login mx-auto mt-3">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" name="login" class="form-control" required="required" autofocus="autofocus">
              <label for="login">kasutajanimi</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="pass" class="form-control" required="required">
              <label for="inputPassword">salasõna</label>
            </div>
          </div>
        <!--  <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div> -->
          <input type="submit" value="Logi sisse" class="btn btn-primary btn-block"> 
        </form> <!--
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div> -->
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
