<!DOCTYPE html>
<html>
<head>
	<title>Aadhar</title>
</head>
<link rel="stylesheet" type="text/css" href="css/aadhar.css">
<div class="block"></div>
<style type="text/css">
	.log{
	position: fixed;
	margin-left: 1300px;
	margin-top: 15px;
	color: white;
}
.sex_show{
	position: relative;
	margin-left: 312px;
	margin-top: -13px;
}
.sex_show1{
	position: relative;
	margin-left: 362px;
	margin-top: -36px;
}
.aadhar_front1 {
	position: relative;
	margin-top: 52px;
	margin-left: 100px;
}
.addar_num_show1{
	position: relative;
	margin-left: 830px;
	margin-top: 10px;
}
.address_show{
	position: relative;
	margin-left: 690px;
	margin-top: -116px;
}
.address_show1{
	position: relative;
	margin-left: 690px;
	margin-top: 3px;
}
.img_show {
	position: relative;
	margin-top: -265px;
	margin-left: 200px;
}
.name_show{
	position: relative;
	margin-left: 312px;
	margin-top: -115px;
}
.name_show1{
	position: relative;
	margin-left: 312px;
	margin-top: -16px;
}
.date_show{
	position: relative;
	margin-left: 312px;
	margin-top: -17px;
}
.date_show1{
	position: relative;
	margin-left: 362px;
	margin-top: -37px;
}
</style>
<a href="logout.php" class="log">logout</a>
<body background="img\backusersign.png"><br><br><br><br><br><br><br>
	<?php 
	session_start();
	if(isset($_SESSION['phnum']) && $_SESSION['port']==$_SERVER['SERVER_PORT']){
	$lines = file('text/aadhaar_data.txt');
	$ph_num = $_SESSION['phnum'];
    $y = '/'.$ph_num.'/';
    $matches = preg_grep($y, $lines);
    foreach ($matches as $line => $contents) {
    	$text_line = explode(":",$contents);
    	$addar_num = $text_line[0];
    	$a = floor($text_line[2]/1000000);
    	if(strlen($a)==1)
    		$a = "0".$a;
    	$text_line[2] = $text_line[2]%1000000;
    	$b = floor($text_line[2]/10000);
    	if(strlen($b)==1)
    		$b = "0".$b;
    	$c = $text_line[2]%10000;
    	$final_date = $a." / ".$b." / ".$c; 
	?>
<div align="center"><img src="img\aadharimg.png"></div>
<div class="img_show" ><img src="img_aadhar\<?php echo htmlspecialchars($text_line[5]); ?>" height="120px" width="100px"></div>
<div class="name_show"><h3><b>Name</b></h3></div><div class="name_show1"><?php echo $text_line[1]; ?></div>
<div class="date_show"><h3><b>Date</b></h3></div><div class="date_show1"><?php echo $final_date;?></div>
<div class="sex_show"><h3><b>Sex</b></h3></div><div class="sex_show1"><?php echo $text_line[3]; ?></div>
<div class="address_show"><h3><b>Address</b></h3></div><div class="address_show1">
	<?php 
	$str = $text_line[4];
		if(strlen($str)>20){
		for($i = 0; $i<strlen($str); $i++){
			if($i >=10 && $str[$i]==","){
				echo $str[$i]."<br>";
			}else{
				echo $str[$i];
			}
		}
	} 
	?></div>
	<div class="addar_num_show1"><h2><b><?php
	for($i = 0; $i<strlen($addar_num); $i++){
			if(($i%4)==3){
				echo $addar_num[$i]."    ";
			}else{
				echo $addar_num[$i];
			}
		}
		?></b></h2></div>
<br><br><br>
<?php 
} ?>
<?php }else{
	header('location: user_signup.php');
}?>
</body>
</html>