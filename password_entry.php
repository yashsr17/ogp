<body background="img/backusersign.png">
<?php 
session_start();
include('admin_server.php');
if(isset($_SESSION['phnum']) && $_SESSION['car']==1){
	$SESSION = $_SESSION['phnum'];
	$sql = mysqli_query($link,"SELECT * FROM user_data WHERE phone='$SESSION'");
	if($sql){
		if(mysqli_num_rows($sql)>0){
			$_SESSION['car'] = 2;
			echo $SESSION."<form method='POST' action='#'><input type='text' name='pass'/><input type='submit'></form>";
		}
	}
}
if(isset($_POST['pass']) && $_SESSION['car']==2){
	$SESSION = $_SESSION['phnum'];
$POST= $_POST['pass'];
	$sql = mysqli_query($link,"SELECT * FROM user_data WHERE phone='$SESSION' AND pass='$POST'");
	if($sql){
		if(mysqli_num_rows($sql)>0){
			header('location: decision_page.php?ph = '.$_SESSION['phnum'].' && id = '.$_SESSION['otpserverdata']);
		}else{
			include('logout.php');
		}
	}
}
?>
</body>