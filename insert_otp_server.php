<?php 
include('admin_server.php');
$otp = mysqli_real_escape_string($link,$_SESSION["setotp"]);
$ph_num = mysqli_real_escape_string($link,$_SESSION["ph_num"]);
$sql = "INSERT INTO otp (Phone_no, otp_no) VALUES ('$ph_num', '$otp')";
if(mysqli_query($link,$sql)){
	
}else{
	echo "Not added";
}
?>