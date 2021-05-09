<?php
	$connection = mysqli_connect('localhost', 'root', '', 'company') or die(mysqli_error(connection));
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="css/login.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<div class="content top centered">
		<div class="container">
				<div class="col-xs-4 col-xs-offset-4">
					<div class="panel panel-default">
						<div class="panel-heading">LOGIN</div>
						<div class="panel-body">
							<form action="login_submit.php" method="POST">
								<div class="form-group">
									<label for="name">Enter Employee Name:</label>
									<input type="text" class="form-control" name="name" placeholder="User Name" required="true" >
								</div>
								<div class="form-group">
									<label for="password">Enter Password:</label>
									<input type="password" class="form-control" name="password" placeholder="Password" required="true">
								</div>
								<button class="btn btn-primary btn-block">Login</button><br><br><br>
							</form>
						</div>
					</div>
				</div>
		</div>
		</div>
	</body>
</html>