<?php 
$lines = file('text/govdata.txt');?>
<link rel="stylesheet" type="text/css" href="find/css/find.css">
<div class="block"></div>
<div class="search"><form action="#" method="POST">
    <input type="text" name="name">
    <input type="submit" value="Search" class="btn_s" />
</form></div>
<br><br><br><br><br>
<?php
if(isset($_POST['name'])){
$x = $_POST['name'];
$y = '/'.$x.'/';
$matches = preg_grep($y, $lines);
echo count($matches)." matches found.\n";?>
<br>
<?php
foreach ($matches as $line => $contents) {
	$text_line = explode(":",$contents);
	echo "<br><br>Invoice Number  : ".$text_line[0]."<br>";
	echo "Contact Number : ".$text_line[1]."<br>";
	echo "Branch / Department : ".$text_line[2]."<br>";
	echo "Title : ".$text_line[3]."<br>";
	echo "Issue : ".$text_line[4]."<br>";
	echo "Remark : ".$text_line[6]."<br>";
	$u = $text_line[13];
	$b1 = floor($text_line[8]/100000000);
            $text_line[8] = $text_line[8]%100000000;
            $c1 = floor($text_line[8]/1000000);
            $text_line[8] = $text_line[8]%1000000;
            $d1 = floor($text_line[8]/10000);
            $text_line[8] = $text_line[8]%10000;
            $e1 = floor($text_line[8]/100);
            $f1 = $text_line[8]%100; 
            if(strlen($e1)==1){
                $e1="0".$e1;
            }
            if(strlen($f1)==1){
                $f1="0".$f1;
            }
            $text_line[8]=$f1."/".$e1."/".$c1.$d1;

            ob_start();
            $text_line[13] = $text_line[13]%100000000;
            $c2 = floor($text_line[13]/1000000);
            ob_end_clean();
            $text_line[13] = $text_line[13]%1000000;
            $d2 = floor($text_line[13]/10000);
            $text_line[13] = $text_line[13]%10000;
            $e2 = floor($text_line[13]/100);
            $f2 = $text_line[13]%100; 
            if(strlen($e2)==1){
                $e2="0".$e2;
            }
            if(strlen($f1)==1){
                $f2="0".$f2;
            }
            $text_line[13]=$f2."/".$e2."/".$c2.$d2;

            $x1 = $f1;
            $x2 = $f2;
            $y1 = $e1;
            $y2 = $e2;
            $z1 = $c1.$d1;
            $z2 = $c2.$d2;
            $date1=date_create($x1."-".$y1."-".$z1);
            $date2=date_create($x2."-".$y2."-".$z2);
            $diff=date_diff($date1,$date2);
            $timediff = $diff->format("%a days");
               if($u==0){
                $text_line[13]='-';
                $timediff='-';
               }
	echo "Pin Code : ".$text_line[7]."<br>";
	echo "Issue Date : ".$text_line[8]."<br>";?>
	<?php 
	if($text_line[9]==0 && $text_line[10]==0 && $text_line[11]==0 && $text_line[12]==0){
            echo "Status : Not Attended till now"."<br>";  } ?>
        <?php if($text_line[9]==1 && $text_line[10]==0 && $text_line[11]==0 && $text_line[12]==0){
            echo "Status : Rejected"."<br>";  } ?>
        <?php if($text_line[9]==0 && $text_line[10]==1 && $text_line[11]==0 && $text_line[12]==0){
            echo "Status : Approved ... Please Keep a regular check!! for on going processs"."<br>";  } ?>
        <?php if($text_line[9]==0 && $text_line[10]==0 && $text_line[11]==1 && $text_line[12]==0){
            echo "Status : In progress"."<br>"; ?>
        <?php if($text_line[9]==0 && $text_line[10]==0 && $text_line[11]==0 && $text_line[12]==1){
            echo "Status : Completed"."<br>"; 
        }?>
        <?php 
	echo "Final Date : ".$text_line[13]."<br>";
	echo "Days of Completion : ".$timediff."<br><br>";
}
}
}
?>