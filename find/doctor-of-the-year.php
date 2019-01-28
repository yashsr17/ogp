<link rel="stylesheet" type="text/css" href="css/find.css">
<div class="block"></div>
<div class="search"><form action="#" method="POST">
    <input type="text" name="name">
    <input type="submit" value="Search" class="btn_s" />
</form></div>
<br><br><br><br><br>
<body>
<?php 
    session_start();
if(isset($_POST['name'])){
    $x = $_POST['name'];
        if(isset($_SESSION['phnum']) && $_SESSION['port']==$_SERVER['SERVER_PORT']){
            $lines = file('text/doctoralone.txt');
                $y = '/'.$x.'/';
                $matches = preg_grep($y, $lines);
            foreach($matches as $line => $contents){
                $c =0;
                $total = 0;
                $lines1 = file('text/doctorlist.txt');
                $text = explode(":",$contents);
                $y1 = '/'.$text[0].'/';
                $matches1 = preg_grep($y1, $lines1);
                echo "for ".$text[0]." : <br><br>";
            foreach ($matches1 as $line => $contents) {
                $text_line = explode(":",$contents);
                if($text[0]==$text_line[0] and $text[1]==$text_line[1]){
                    $total += $text_line[3];
                    $c++;
                }
            }
            if($c!=0){
                echo "<img src='doctimg.png' height='100' width='100'><div class='percent'><b>".round(($total/$c)*100)." %</b> is success in ".$text[1]."<br><b>Totally solved is :</b> ".$c."<br>Total experience of <b>".$text[4]."</b> years<br><b>Contact Number :</b> ".$text[3]."<br>From : <b>".$text[5]."</b></div>";
            }else{
                echo "<img src='doctimg.png' height='100' width='100'><div class='percent1'>* yet to start we will be adding persons progress as soon as done<br><b>Contact Number :</b> ".$text[3]."<br>From : <b>".$text[5]."</b></div>";
            }
            $total=0;
            // for($i=0;$i<250;$i++){ echo "-"; }
            echo "<br><br><div class='borderma'></div><br><br>";
        }
    }
}
?>
</body>