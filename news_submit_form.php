<link rel="stylesheet" type="text/css" href="css/pan.css">
<link rel="stylesheet" type="text/css" href="css/dp1.css">
<div class="block"></div>
<?php
session_start();
ob_start(); 
if(isset($_SESSION['phnum'])){
$ph_num = $_SESSION['phnum'];
$_SESSION['ph']=$ph_num;
 ?>
 <a href="logout.php" class="log">logout</a><br><br><br><br>
<!DOCTYPE html>
<html>
	<title>Submission Forum</title>
<body>
	<form action="#" method="POST">
		Phone number : <?php echo $ph_num;?><br><br>
		Title : <input type="text" name="title" required="Title" class="brrm"><br><br>
		Issue Faced : <input type="text" name="news" required="News" class="brrm1"><br><br>
		Image URL : <input type="text" name="img_url" required="Image_URL" class="brrm"><br><br>
		Remarks : <input type="text" name="remark" class="brrm"><br><br>
		Type :
		<select name="sub">
			<option>-</option>
		<option value="Crimebranch">Crime</option>
		<option value="Muncipalitybranch">Muncipality</option>
	    </select><br>
	    <br>Pin-Code : <input type="text" name="pincode" class="brrm" required="PinCode"><br><br>
		<?php $date = date_default_timezone_set('Asia/Kolkata');
        $x = date("HidmY");
        $display_time = date("H : i : s a");
        $display_date = date("d / m / Y");
        echo "Current Time :  ";?><input type="text" name="t_ime" class="brrm" value="<?php echo $display_time; ?>" required="T_ime"><br><br><?php
        echo "Current Date : ";?><input type="text" name="d_ate" class="brrm" value="<?php echo $display_date; ?>" required="D_ate"><br><br><?php
        echo "Completion Date : ";?><input type="text" name="finaldate" class="brrm" placeholder="YYYYMMDD"><br><br>
		<input type="submit" value="proceed" class="btn_s" />
	</form>
</body>
</html>
<?php 
if(isset($_POST['title'])!=NULL && isset($_POST['news']) && isset($_POST['img_url']) && isset($_POST['remark']) && isset($_POST['t_ime']) && isset($_POST['d_ate'])){ ob_end_clean(); ?><br><br><br><br><form action="news_submit_form_finalized.php" method="POST">
	    Registered Contact Number :<?php echo " ".$_SESSION['ph']; ?><br><br>
		Title : <input type="text" name="title" class="brrm" value="<?php echo $_POST['title']; ?>" required="Title"><br><br>
		Issue Faced : <input type="text" name="news" class="brrm1" value="<?php echo $_POST['news']; ?>" required="News"><br><br>
		Image URL : <input type="text" name="img_url" class="brrm" value="<?php echo $_POST['img_url']; ?>" required="Image_URL"><br><br>
		Remarks : <input type="text" name="remark" class="brrm" value="<?php echo $_POST['remark']; ?>" required="Remark"><br><br>
		Pin-Code : <input type="text" name="pincode" class="brrm" value="<?php echo $_POST['pincode']; ?>" required="PinCode"><br><br>
		Type : <input type="text" name="sub" class="brrm" value="<?php echo $_POST['sub']; ?>" required="Subject"><br><br><?php
		echo "Timed : ";?><input type="text" name="t_ime" class="brrm" value="<?php echo date("H:i a"); ?>" required="T_ime"><br><br><?php
        echo "Dated : ";?><input type="text" name="d_ate" class="brrm" value="<?php echo $_POST['d_ate']; ?>" required="D_ate"><br><br><?php
		echo "Final Date : ";?><input type="text" name="finaldate"  class="brrm" value="<?php echo $_POST['finaldate'];?>"><br><br>
		<input type="submit" class="btn_s" /></form>
	<?php
}else{
	echo "Enter Submit to print for confirmation";
}
}else{
	echo "restricted gateway";
}
?>