<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
	header("Location: dashboard.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['user_id'] = $row['user_id'];
		header("Location: dashboard.php");
	} else {
		echo "<script>alert('Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hi, Welcome to Expense Tracker!</title>
	<style>
		<?php include "css/bootstrap.min.css" ?><?php include "css/login.css" ?>
	</style>
	<script>
		<?php include "js/jquery-3.6.0.min.js" ?>
		<?php include "js/bootstrap.min.js" ?>
	</script>


</head>

<body>
	<div class="container">

		<div class="col-3">
			<div class="position-relative">
				<div class="position-absolute top-50 start-0 translate-middle-y"></div>

				<div class="card">
					<div class="card-body">
						<form action="" method="POST" class="login-email">
							<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
							<div class="input-group">
								<input type="email" placeholder="Enter email address" name="email" value="<?php echo $email; ?>" required>
							</div>
							<div class="input-group">
								<input type="password" placeholder="**********" name="password" value="<?php echo $_POST['password']; ?>" required>
							</div>
							<div class="input-group">
								<button name="submit" class="btn">Login</button>
							</div>
							<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
</body>

</html>