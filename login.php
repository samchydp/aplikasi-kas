<?php
session_start();
include('koneksi.php');
if (isset($_POST['simpan'])) {
    $username= $_POST['user'];

    $password = $_POST['password'];
    // return;
    $user = null;
    $sql = mysqli_query($koneksi,"select * from user where (username = '".$username."' or email = '$username') and password = '".$password."' ");
    	while($row = mysqli_fetch_array($sql)) {
		    $_SESSION['user'] = $row;
		    $user = $row;
    		$sql = mysqli_query($koneksi,"update user set Status = now() where id_user=".$row['id_user']);
    		break;

		  }

    if ($user) {
        ?> 
            <script type="text/javascript">
                window.location.href="index.php";
            </script>
        <?php 
    } else {
        echo '<script type="text/javascript">
                alert("Username / Password Salah!");
                window.location.href="login.php";
            </script>';
        // var_dump($koneksi);
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>MODISTE PUTRI LOGIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">MODISTE PUTRI LOGIN</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10" style="background: transparent;display: flex;">
					
					<div class="wrap d-md-flex" style="background: transparent;">
						<div class="img">
						<img src="images/bg_1.png" style="width: 100%;height: auto;" />
							
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
			      	</div>
							<form action="" method="post" class="signin-form" autocomplete="asdfdsfsdf">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username / Email</label>
			      			<input name="user" autocomplete="off" class="form-control" value="" placeholder="Username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input name="password" autocomplete="off"  class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="simpan">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" id="remember" checked >
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="forget.php" >Forgot Password</a>
									</div>
		            </div>
		          </form>
		          <script>
	            	let u = document.querySelector('input[name="user"]');
	            	let p = document.querySelector('input[name="password"]');
	            	let r = document.querySelector('#remember');
	            	u.value = "";
	            	p.value = "";
	            	if(r.checked) {
	            		p.removeAttribute('autocomplete');
	            		u.removeAttribute('autocomplete');
	            		u.type = 'text';
	            		p.type = 'password';
	            	} else {
	            		u.removeAttribute('autocomplete');
	            		u.type = 'text';
	            		p.removeAttribute('autocomplete');
	            		p.type = 'password';
	            	}
	            </script>
		          <p class="text-center">Not a member? <a href="register.php">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

