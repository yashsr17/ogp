<link rel="stylesheet" type="text/css" href="css/pan.css">
<link rel="stylesheet" type="text/css" href="css/commom.css">
<link rel="stylesheet" type="text/css" href="css/discussionpage.css">
<div class="block"></div>
<a href="logout.php" class="log">logout</a>
<br><br><br><br><br><br><br>
<?php 
session_start();
if(isset($_SESSION['phnum'])!=""){
echo "hi..  <b>".$_SESSION['phnum']."</b><br>" ;
echo $_GET['title'];
?>
<form method="POST" action="#">
	<div class="alignusername">Username : <input type="text" name="username" required="username" class="brrm"><?php echo "\n";?>
	Comment : <input type="text" name="text1" required="text" class="brrm">
	<input type="submit" placeholder="Submit" class="btn_s"></div>
</form>
<?php 
$lines = file('data/'.$_GET['form_id'].'.txt');
$matches = preg_grep('//', $lines);
foreach ($matches as $line => $contents) {
	$text_line = explode(":",$contents);
	echo "<br>".$text_line[0]." - ".$text_line[2];
}
echo "<br><br><br><br><br><br><br>";
?>
<?php 
ob_start();
if(isset($_POST['username'])!=""){
$fp = fopen('data/'.$_GET['form_id'].'.txt','a');
$v = $_POST['username'];
$u = $_SESSION['phnum'];
$w = $_POST['text1'];
fwrite($fp, "$v:$u:$w\n");
fclose($fp);
ob_end_clean();
header('location:discussion_form.php?form_id='.$_GET['form_id'].'&&title='.$_GET['title']);
}
}else{
	echo "Error";
}
?>