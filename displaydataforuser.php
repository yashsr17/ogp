<link rel="stylesheet" type="text/css" href="css/pan.css">
<div class="block"></div><br><br><br><br><br><br><br><br>
<body background="img\backusersign.png">
<?php 
	session_start();
	if(isset($_SESSION['phnum']) && $_SESSION['port']==$_SERVER['SERVER_PORT']){
	$lines = file('text\govdata.txt');
	$ph_num = $_SESSION['phnum'];
    $y = '/'.$ph_num.'/';
    $matches = preg_grep($y, $lines);
        echo "<table>";
        echo "<tr><td><b>Invoice Number</b></td><td><b>Branch</b></td><td><b>Title</b></td><td><b>Description</b></td></tr>";?>
        <?php 
    foreach ($matches as $line => $contents) {
    	$text_line = explode(":",$contents);
    	echo "<tr><td>".$text_line[0]."</td><td>".$text_line[2]."</td><td>".$text_line[3]."</td><td>".$text_line[4]."</td></tr>";
    }
}
echo "</table>";
?>
</body>