<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Login</title>
  
        <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/signin.css">
        <script type ="text/javascript" src="./assets/js/jquery-3.4.1.slim.min.js"></script>
        <script type ="text/javascript" src="./assets/js/popper.min.js"></script>
        <script type ="text/javascript" src="./assets/js/bootstrap.min.js"></script>

    </head>
    <body class="text-center">
        <form class = "form-signin" method="POST">
        <img class="mb-4" src="./assets/brand/logo-motor.png" alt="" width="102" height="87">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; Booking Service Motor - 2021</p>
            <?php
            
			session_start();
			if(isset($_SESSION['username'])){
				header("Location: http://localhost/Project PWL/index.php");
			}
			if(isset($_POST['username']) && isset($_POST['password'])) {
				require 'koneksi.php';
				
				$conn = open_connection();
				
				$query = "SELECT *FROM admin WHERE username = '$_POST[username]' AND password_hash = MD5('$_POST[password]')";
				
				$hasil = mysqli_query($conn, $query);
				
				if($isi = mysqli_fetch_assoc($hasil)){
					$_SESSION['username'] = $isi['username'];
					header("Location: http://localhost/Project PWL/index.php");
				} else {
					echo '<div class = "alert alert-danger" role="alert">Username dan Password tidak valid</div>';
				}
			}
		?>

            
        </form>
    </body>
</html>