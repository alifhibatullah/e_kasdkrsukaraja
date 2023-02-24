<?php 
  require 'connection.php';
  checkdaftarAtdaftar();

  if (isset($_POST['btndaftar'])) {
  	$username = htmlspecialchars($_POST['username']);
  	$password = htmlspecialchars($_POST['password']);

  	$checkUsername = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  	if ($data = mysqli_fetch_assoc($checkUsername)) {
  		if (password_verify($password, $data['password'])) {
  			$_SESSION = [
  				'id_user' => $data['id_user'],
                'nama' => $data['nama_siswa'],
  				'username' => $data['username'],
                'email' =>['email'],
  				'id_jabatan' => $data['id_jabatan']
  			];
  			header("Location: login.php");
  		} else {
			setAlert("Password your insert is false!", "Check your Password BACK!", "error");
			header("Location: daftar.php");
	  	}
  	} else {
		setAlert("Username is not registered!", "Check your Username BACK!", "error");
		header("Location: daftar.php");
  	}
  }
?>

<!DOCTYPE html>
<html>
<head>
  <?php include 'include/css.php'; ?>
  <title>Daftar</title>
  <style>
	* {
	    margin: 0;
	    padding: 0;
	    box-sizing: border-box;
	}

  	body {
	    min-height: 100vh;
	    background-size: cover;
	    background-repeat: no-repeat;
	    background-image: url(assets/img/img_properties/bg-login.jpg);
	}
	
  	.container {
	    position: absolute;
	    left: 50%;
	    top: 50%;
	    transform: translate(-50%, -55%);
	}
</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4 mx-5 py-4 px-5 text-dark rounded border border-dark" style="background-color: rgba(180,190,196,.6);">
				<h3 class="text-center">Daftar</h3>
				<form method="post">
                    <div class="form-group">
						<label for="username"><i class="fas fa-fw fa-user"></i> Nama Lengkap</label>
						<input required class="form-control rounded-pill" type="text" name="Nama" id="Nama">
					</div>
					<div class="form-group">
						<label for="username"><i class="fas fa-fw fa-user"></i> Username</label>
						<input required class="form-control rounded-pill" type="text" name="username" id="username">
					</div>
                    <div class="form-group">
						<label for="username"><i class="fas fa-fw fa-user"></i> Email</label>
						<input required class="form-control rounded-pill" type="text" name="email" id="email">
					</div>
					<div class="form-group">
						<label for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
						<input required class="form-control rounded-pill" type="password" name="password" id="password">
					</div>
					<div class="form-group text-right">
						<button class="btn btn-success rounded-pill" type="submit" name="btndaftar"><i class="fas fa-fw fa-sign-in-alt"></i> Daftar</button>
					</div>
				</form>