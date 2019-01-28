<!DOCTYPE html>

<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/otpaccess.css">
<body background=""><?php 
ob_start();
require_once('user_check.php');
ob_end_clean();
if(isset($_SESSION["ph_num"])!=" "){
	header('location : user_signup.php');
}else{
$_SESSION["setotp"]=rand(10000,99999);
	include('insert_otp_server.php');
if(isset($_SESSION['setotp'])){
	?><form action="otp_access_server.php" method="POST">
		<div class="oinphn"><b>Phone :</b></div><input class="oinph" type="text" name="ph" value="<?php echo $_SESSION["ph_num"]; ?>" required="phone"><br><br>
		<div class="oinphn"><b>OTP :</b></div><input type="oinpo" class="oinpo" name="otp" required="otp"><br>
		<input type="submit" class="btn" />
	</form>
	<?php
		echo $_SESSION['setotp'];
	unset($_SESSION["setotp"]);
}
}?>
</body>
</html>
<br><b>* NOTE: </b>don't refresh or else you will have break the access to it..