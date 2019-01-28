<link rel="stylesheet" type="text/css" href="css/find.css">
<div class="block"></div>
<div class="search"><form action="#" method="POST">
    <input type="text" name="name">
    <input type="submit" value="Search" class="btn_s" />
</form></div>
<br><br><br><br><br>
<?php 
    session_start();
if(isset($_POST['name'])){
    $x = $_POST['name'];
        if(isset($_SESSION['phnum']) && $_SESSION['port']==$_SERVER['SERVER_PORT']){
            $lines = file('text/anti-drug.txt');
                $y = '/'.$x.'/';
                $matches = preg_grep($y, $lines);
            foreach($matches as $line => $contents){
                $text = explode(":",$contents);
                echo "for ".$text[0]." : <br><br>";
           echo "<img src='doctimg.png' height='100' width='100'><div class='percent1'><br><b>Place :</b> ".$text[2]."</div><div class='percent1'><b>Phone number :</b> ".$text[3]."</div><br><br><br><br><div class='borderma'></div><br>";
        }
    }
}
?>