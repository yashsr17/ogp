<!DOCTYPE html>
<html>
<head>
	<title>Pan</title>
<link rel="stylesheet" type="text/css" href="css/pan.css">
<div class="block"></div>
<a href="logout.php" class="log">logout</a></head>
<body background="img\backusersign.png">
	<?php 
	session_start();
	if(isset($_SESSION['phnum']) && $_SESSION['port'] == $_SERVER['SERVER_PORT']){
	$lines = file('text/pan_data.txt');
	$ph_num = $_SESSION['phnum'];
    $y = '/'.$ph_num.'/';
    $matches = preg_grep($y, $lines);
        echo count($matches)." found.\n";
    foreach ($matches as $line => $contents) {
    	$text_line = explode(":",$contents);
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
	<div class="align_img1"><img src="img\pan_background.png" width="400"></div>
	<div class="align_name"><b><?php echo $text_line[1]; ?></b></div>
	<div class="align_fname"><b><?php echo $text_line[3]; ?></b></div>
	<div class="align_date"><b><?php echo $final_date; ?></b></div>
	<div class="align_pan"><b><?php echo $text_line[4]; ?></b></div>
	<div class="align_img2"><img src="img\<?php echo htmlspecialchars($text_line[5]) ?>" width="100"></div>
	<div class="align_img3"><img src="img_pan\<?php echo htmlspecialchars($text_line[6]) ?>" width="96" height="90"></div>
</body>
</html>
<a href="logout.php">logout</a>
<?php } }else{
	header('location: user_signup.php');
} ?>