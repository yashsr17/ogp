<link rel="stylesheet" type="text/css" href="css/pan.css">
<div class="block"></div>
<a href="logout.php" class="log">logout</a>
<?php session_start(); if(isset($_SESSION['phnum'])) {?>
<html>
    <head>
        <title></title>
    </head>
    <link rel="stylesheet" type="text/css" href="css/commom.css">
    <body background="img\backusersign.png">
        <br><br><br><br><br><br>
    	<?php $lines = file('text/discussiondata.txt');
        $matches = preg_grep('//', $lines);
        foreach ($matches as $line => $contents) {
        $text_line = explode(":",$contents);?>
        <a href="discussion_form.php?form_id=<?php echo $text_line[1] ?>&&title=<?php echo $text_line[0] ?>" ><?php echo "<li>".$text_line[0]."</li>";?></a><br>
    <?php } 
}else{
    echo "Error";
}?>
</body>
</html>