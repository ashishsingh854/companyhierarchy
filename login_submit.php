<?php
	$connection = mysqli_connect('localhost', 'root', '', 'company') or die(mysqli_error(connection));
	session_start();
	
	$name = $_POST['name'];
	$password = $_POST['password'];
	//$regex_email = "/^[_a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	$name = mysqli_real_escape_string($connection, $name);
	$password = mysqli_real_escape_string($connection, $password);
	$password = md5($password);
	$select_id = "select id from employee where name = '$name' AND password = '$password'";
	$select_id_result = mysqli_query($connection, $select_id) or die(mysqli_error($connection));
	if(mysqli_num_rows($select_id_result)==0){
		//header('location: login.php?error=Invalid Credentials');
		echo ("<script>alert('Enter valid user name and password.')</script>");
		echo ("<script>location.href='login.php'</script>");
	}
	else {
		$data = mysqli_fetch_array($select_id_result);
		$_SESSION['id'] = $data['id'];
		header('location: fetch.php');
	}
?>