<link rel="stylesheet" type="text/css" href="find/css/find.css">
<div class="block"></div>
<div class="search"><form action="#" method="POST">
    <input type="text" name="name">
    <input type="submit" value="Search" class="btn_s" />
</form></div>
<br><br><br><br><br>
<body background="img\backusersign.png">
<?php 
if(isset($_POST['name'])){
$x = $_POST['name'];
session_start();
if(file_exists('text/state/'.$x.'.txt')){
	$co=$co1=$co2=$co3=$co4=$total=0;
	$lines = file('text/state/'.$x.'.txt');
    $y = '/'."".'/';
    $matches = preg_grep($y, $lines);
    foreach ($matches as $line => $contents) {
    	$text_line = explode(":",$contents);
    	if($text_line[8]==0 && $text_line[9]==0 && $text_line[10]==0 && $text_line[11]==0){
            $co++;
        } 
        if($text_line[8]==1){
            $co1++;
        }
        if($text_line[9]==1){
            $co2++;
        }
        if($text_line[10]==1){
            $co2++;
            $co3++;
        }
        if($text_line[11]==1){
            $co2++;
            $co4++;
    }$total++;
    }
    $lines1 = file('find\text\polrec.txt');
    $y1 = '/'.$x.'/';
    $matches = preg_grep($y1, $lines1);
    foreach ($matches as $line => $contents) {
        $text_l = explode(":",$contents);
        if($text_l[2]==1){
            echo "Current Senior Inspector Incharge is <b>".$text_l[0]."</b> for ";
        }
    }
    echo "Pin-code <b>".$x."</b><br>";
    $_SESSION['p3']=$_SESSION['p4']=$_SESSION['d']=$_SESSION['p6']=$_SESSION['p7']=0;
    $_SESSION['p3']=(($co/$total)*100);
    $_SESSION['p4']=(($co1/$total)*100);
    $_SESSION['d']=(($co2/$total)*100);
    $_SESSION['p6']=(($co3/$total)*100);
    $_SESSION['p7']=(($co4/$total)*100);
    include('policeanalysis1.php');
}else{
	echo "please enter a valid pin code that does exist";
}
}else{
	echo "enter a valid pin code";
}
?>
</body>