<link rel="stylesheet" type="text/css" href="find/css/find.css">
<div class="block"></div>
<?php 
session_start();
if(isset($_SESSION['phnum'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<link rel="stylesheet" type="text/css" href="css/dp.css">
	<a href="logout.php" class="log">logout</a>
<style type="text/css">
	.border_1{
		position: fixed;
		border-style: solid;
		border-width: 5px;
		margin-top: 30px;
		margin-left: 1220px;
	}
	.border_2_1{
		position: fixed;
		margin-top: 170px;
	}
	.border_2_2{
		position: fixed;
		margin-top: 185px;
	}
</style>
</head>
<script type="text/javascript">
	function dicussinfo(){
		var ph_num = "<?php echo $_SESSION['phnum'] ?>";
		var id = "<?php echo $_SESSION['otpserverdata'] ?>";
		var ip = "<?php echo $_SERVER['SERVER_ADDR']?>";
		window.location.href = "page4_2.php?ph_num="+ph_num+" && id ="+id+" && ip="+ip;
	}
	function aadharinfo(){
		var ph_num = "<?php echo $_SESSION['phnum'] ?>";
		var id = "<?php echo $_SESSION['otpserverdata'] ?>";
		var ip = "<?php echo $_SERVER['SERVER_ADDR']?>";
		window.location.href = "aadhar_genrate.php?ph_num="+ph_num+" && id ="+id+" && ip="+ip;
	}
	function searchinfo(){
		var ph_num = "<?php echo $_SESSION['phnum'] ?>";
		var id = "<?php echo $_SESSION['otpserverdata'] ?>";
		var ip = "<?php echo $_SERVER['SERVER_ADDR']?>";
		window.location.href = "search.php?ph_num="+ph_num+" && id ="+id+" && ip="+ip;
	}
	function firsub(){
		window.location.href = "news_submit_form.php";
	}
	function paninfo(){
		var ph_num = "<?php echo $_SESSION['phnum'] ?>";
		var id = "<?php echo $_SESSION['otpserverdata'] ?>";
		var ip = "<?php echo $_SERVER['SERVER_ADDR']?>";
		window.location.href = "pan_generate.php?ph_num="+ph_num+" && id ="+id+" && ip="+ip;
	}
	function taxinfo(){
		var ph_num = "<?php echo $_SESSION['phnum'] ?>";
		var id = "<?php echo $_SESSION['otpserverdata'] ?>";
		var ip = "<?php echo $_SERVER['SERVER_ADDR']?>";
		window.location.href = "tax_payment1.php?ph_num="+ph_num+" && id ="+id+" && ip="+ip;
	}
	function filehistinfo(){
		var ph_num = "<?php echo $_SESSION['phnum'] ?>";
		var id = "<?php echo $_SESSION['otpserverdata'] ?>";
		var ip = "<?php echo $_SERVER['SERVER_ADDR']?>";
		window.location.href = "displaydataforuser.php?ph_num="+ph_num+" && id ="+id+" && ip="+ip;
	}
	function statinfo(){
		window.location.href = "graph.php";
	}
	function resinfo(){
		window.location.href = "find.php";
	}
</script>
<body background="img\backusersign.png">
<?php 
$lines = file('text\otp_server_data.txt');
$x = $_SESSION['otpserverdata'];
$z = $_SESSION['phnum'];
$y = '/'.$x.'/';
$matches = preg_grep($y, $lines);
foreach ($matches as $line => $contents) {
	$text_line = explode(":",$contents);
	if($text_line[0]==$z){
	?>
	<button class="btn_0" onclick="aadharinfo()">AADHAR INFORMATION</button>
	<button class="btn_1" onclick="paninfo()">PAN-CARD INFORMATION</button>
	<button class="btn_2" onclick="taxinfo()">TAX INFORMATION</button>
	<button class="btn_3" onclick="firsub()">FILE A FIR</button>
	<button class="btn_4" onclick="dicussinfo()">DISCUSSION FORUM</button>
	<button class="btn_5" onclick="filehistinfo()">HISTORY INFORMATION</button>
	<button class="btn_6" onclick="statinfo()">OVERALL STASTICAL ANALYSIS</button>
	<button class="btn_7" onclick="resinfo()">RESEARCH</button><br><br><br>
	<button class="btn_9" onclick="searchinfo()">SEARCH</button>
</body>
</html>
<?php 
 }
}
}else{
	echo "error";
}?>