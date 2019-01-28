<?php 
include 'admin_server.php';
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d H:i:s');
$sql4 = "INSERT INTO govbank (phone_num, name, amount, paid_date) VALUES ('9962262756', 'Yash', '100000', '$date')";
		if(mysqli_query($link, $sql4)){
			echo "";
		}else{
			echo "Error while updating";
		}
?>