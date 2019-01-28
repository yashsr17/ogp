<?php 
session_start();
if(file_exists('text/state/'.$_POST['pincode'].'.txt')){
if(isset($_SESSION['phnum'])){?>
<link rel="stylesheet" type="text/css" href="find/css/find.css">
<div class="block"></div>
<a href="logout.php" class="log">logout</a><br><br><br><br><br>
	<?php
$date = date_default_timezone_set('Asia/Kolkata');
    echo "Type : ".$_POST['sub']."<br>";
    echo "Title : ".$_POST['title']."<br>";
	echo "Issue : ".$_POST['news']."<br>";
	echo "Remarks : ".$_POST['remark']."<br>";
	echo "Time : ".$_POST['t_ime']."<br>";
	echo "Date : ".$_POST['d_ate']."<br>";
	echo "Registered using : <b>".$_SESSION['ph']."</b> number"."<br>";
if(isset($_POST['title']) && isset($_POST['news']) && isset($_POST['img_url']) && isset($_POST['remark']) && isset($_POST['t_ime']) && isset($_POST['d_ate'])){
	$s = "Extra/".$_POST['sub'].".txt";
$fp = fopen($s, "a");
$fp1 = fopen("text/govdata.txt", "a");
$p = $_SESSION['ph'];
$u = $_POST['sub'];
$v = $_POST['title'];
$w = $_POST['news'];
$x = $_POST['img_url'];
$y = $_POST['remark'];
$pin = $_POST['pincode'];
$fd = "0";
$z1 = date("Y");
$z2 = date("m");
$z3 = date("d");
if(strlen($z2)==1){
	$z2 ="0".$z2;
}
if(strlen($z3)==1){
	$z3 ="0".$z3;
}
$z=$z1.$z2.$z3;
$a1="0";
$a2="0";
$a3="0";
$a4="0";	
$time3=$fd;
if($time3==""){
	$time3="0";
}
$fpp = fopen("text/state/".$_SESSION['pincode'].".txt", "a");
$_SESSION['pincode']=$_POST['pincode'];
$_SESSION['branch']=$_POST['sub'];
$_SESSION['issue']=$_POST['news'];
$_SESSION['dated']=$z3."/".$z2."/".$z1;
ob_start();
$_SESSION['dated1']=$_POST['pincode'].$_POST['dated'].$z3.$z2.$z1.date("Hi");
ob_end_clean();	
$invoice = $_SESSION['dated1'];
fwrite($fp1, "$invoice:$p:$u:$v:$w:$x:$y:$pin:$z:$a1:$a2:$a3:$a4:$time3\n");
fwrite($fpp, "$invoice:$p:$u:$v:$w:$x:$y:$z:$a1:$a2:$a3:$a4:$time3\n");
fwrite($fp, "$invoice:$p:$v:$w:$x:$y:$pin:$z:$a1:$a2:$a3:$a4:$time3\n");
print "<br><br><b>***entry made you can go to ur history page to view ur complain number thank you for registering we will resolve ur issue as soon as possible</b>";
fclose($fp);
fclose($fp1);
?>
<?php 
}else{
	echo "Error!!";
}
}else{
	echo "Not allowed";
}
}else{
	echo "your requested pin code doesnot exists please enter to the nearest pi code if possible";
}
?>