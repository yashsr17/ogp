<link rel="stylesheet" type="text/css" href="css\user_signup.css">
<body background="img/backusersign.png">
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
</body>