<body background="img/backusersign.png">
<?php 
session_start();
ob_start();
if(isset($_POST['ph']) && isset($_POST['otp']))
include('admin_server.php');
$SESSION = $_POST['ph'];
$POST = $_POST['otp'];
$sql = mysqli_query($link,"SELECT * FROM otp WHERE Phone_no=$SESSION AND otp_no=$POST");
if($sql){
ob_end_clean();
if(mysqli_num_rows($sql)>0){
	echo "Present";
	$_SESSION['phnum']=$_POST['ph'];
	$_SESSION['otp']=$_POST['otp'];
	$_SESSION['otpserverdata']=rand(1000000,9999999).rand(1000000,9999999).rand(1000000,9999999).rand(1000000,9999999);
	$x = $_SESSION['phnum'];
	$y = $_SESSION['otpserverdata'];
	$z = $_SERVER['SERVER_PORT'];
	$_SESSION['port'] = $_SERVER['SERVER_PORT'];
	$fp = fopen("text\otp_server_data.txt", "a");
	$_SESSION['car']=1;
	fwrite($fp, "$x:$y:$z\n");
	header('location: password_entry.php');
}else{
	echo "<b>"."<h1>"."Pls enter valid OTP number to access it !!!!.....ERORR...."."</h1>"."</b>"."<br>"."<br>"."<br>"."Sign up again for authorised access";
}
ob_start();
unset($SESSION);
unset($POST);
unset($_POST['ph']);

}else{
	ob_end_clean();
	echo "<br><br><br>"."<h1>"."Pls enter phone number to access it !!!!.....ERORR...."."</h1>"."<br>"."<b>"."Under Goverment Rule and Regulations to be an Authorised User for this application "."</b>";
	header('location : user_signup.php');
ob_start();
}
unset($_POST['ph']);
unset($_POST['otp']);
unset($_SESSION['otp']);
ob_end_clean();
?>
</body>