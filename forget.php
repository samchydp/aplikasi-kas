<?php
if (isset($_POST['simpan'])) {
include('koneksi.php');
    $username= $_POST['user'];
    // $old_password = md5($_POST['old_password']);
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    $sql = $koneksi->query("select * from user where username = '$username' or email = '$username'");
    if ($sql->num_rows > 0) {
    	if($new_password != $confirm_new_password) {
				echo '<script type="text/javascript">
                alert("confirm password doesnt match!");
                window.location.href="forget.php";
            </script>';    		
    	} else {
		    $sql = $koneksi->query("update user set password = '$new_password' where username = '$username' or email = '$username'");

        ?> 
            <script type="text/javascript">
                alert("Password berhasil diubah!");
                window.location.href="login.php";
            </script>
        <?php 
    		}

    } else {

    	echo '<script type="text/javascript">
                alert("Username / Password Salah!");
                window.location.href="forget.php";
            </script>';
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>RESET PASSWORD</title>
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
					<h2 class="heading-section">Reset Password</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/bg_1.png);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">RESET PASSWORD</h3>
			      		</div>
			      	</div>
							<form action="#" class="signin-form" method="post">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username / Email</label>
			      			<input name="user" autocomplete="off" class="form-control" value="" placeholder="Username" required>
			      		</div>
		            <!-- <div class="form-group mb-3">
		            	<label class="label" for="password">Old Password</label>
		              <input type="password" class="form-control" name="old_password" placeholder="Password" required>
		            </div> -->
		            <div class="form-group mb-3">
		            	<label class="label" for="password">New Password</label>
		              <input type="password" class="form-control" name="new_password" placeholder="Password" required>
		            </div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Confrim Password</label>
		              <input type="password" class="form-control" name="confirm_new_password" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="simpan" class="form-control btn btn-primary rounded submit px-3">Reset</button>
		            </div>
		          </form>
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