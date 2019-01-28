<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function myFunction(){
			alert("Continue ???");
		}
	</script>
</head>
<link rel="stylesheet" type="text/css" href="css/usersign.css">
<body background="img/backusersign.png">
	<b>*NOTE </b>:be a registered user 
	<form action="#" method="POST">
		<br><div class="form1"><input class="txtbox1" type="text" name="ph_num" required="Phone Number" placeholder="Enter Your Phone Number ....."></div>
		<input class= "btn" type="submit" value="GO" onclick="myFunction()" />
	</form>
</body>
</html>
<?php 
session_start();
if(isset($_POST["ph_num"])){
	$lines = file('text/register.txt');
	$x = $_POST['ph_num'];
    $y = '/'.$x.'/';
    $matches = preg_grep($y, $lines);
    if(count($matches)==0){
    	header('location: user_signup.php');
    }
    $_SESSION["ph_num"]=$_POST['ph_num'];
    header('location: otp_access.php');
}
?>