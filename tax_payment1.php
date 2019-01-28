<?php 
session_start();
$les=0;
if(isset($_SESSION['phnum']) && isset($_SESSION['otpserverdata'])) {?>
<!DOCTYPE html>
<html>
<head>
	<title>Tax</title>
<style type="text/css">
.align1{
	position: fixed;
	margin-top: 0px;
	margin-left: 450px;
}
.submit1{
	position: fixed;
	margin-left: 640px;
	margin-top: 150px;
}
</style>
</head>
<body background="img/backusersign.png">
	<?php
	$t1=0;
	$sal=0;
	$cal1=0;
	$cal11=0;
	$ph=$_SESSION['phnum'];
	$a1 = $b1 = $c1 = $cid1 = "";
	$d1=0;
	include 'admin_server.php';
	$sql = "SELECT phonenum, name, salary, type, namecomp, cid FROM icici WHERE phonenum='$ph' and type='company'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
    	$a1 = $row['name'];
    	$b1 = $row['namecomp'];
    	$c1 = $row['type'];
    	$d1 = $row['salary'];
    	$cid1 = $row['cid'];
    	$sal = $d1;
    	 ?>
<center><table width="450" height="400" border="1">
	<tr>
		<td width="450">Name</td>
		<td width="450"><center><b><?php echo $row['name']; ?></b></center></td>
	</tr>
	<tr>
		<td width="450">Company</td>
		<td width="450"><center><b><?php echo $row['namecomp']; ?></b></center></td>
	</tr>
	<tr>
		<td width="450">Account - Type</td>
		<td width="450"><center><b><?php echo "from ".$row['type']; ?></b></center></td>
	</tr>
	<tr>
		<td width="450">Salary</td>
		<td width="450"><center><?php echo "Rs. ".$row['salary']; ?></center></td>
	</tr>
	<tr>
		<td width="450">Tax</td>
		<td width="450"><center><?php if($row['salary']>=500000){ $cal1 = (30/100)*$row['salary']; echo "- Rs. ".$cal1; $sal = $sal-(30/100)*$row['salary']; $cal11 = (30/100)*$row['salary'];}else{ $les = $row['salary']; echo "Rs. "."0"; }?></center></td>
	</tr>
		<tr>
		<td width="450">Amount that will come in hand</td>
		<td width="450"><center><?php if($row['salary']>=500000){ $cal1 = (70/100)*$row['salary']; echo "Rs. ".$cal1; }else{ $les = $row['salary']; echo "Rs. ".$row['salary']; } ?></center></td>
	</tr>
</table></center>
</body>
<center>
<form method="POST" action="#">
	<div class="submit1"><input type="submit" name="submit" value="submit"></div>
</form>
</center>
<?php $t1=1; } 
} else{
	$t1=0;
	echo "**no tax pending"."<br>";
}
$t2=0;
$sql1 = "SELECT phonenum, name, salary, type, namecomp, cid FROM icici WHERE phonenum='$ph' and type='personal'";
    $result1 = mysqli_query($link, $sql1);
    if (mysqli_num_rows($result1) > 0) {
    	$t2=1;
    	while($row1 = mysqli_fetch_assoc($result1)) {?>	
    		<div class="align1"><center><table width="450" height="100" border="1">
    		<tr>
    			<td width="450">Bank Name</td>
    			<td width="450"><center><?php echo "ICICI BANK";?></center></td>
    		</tr>
    		<tr>
    			<td width="450">Account Type</td>
    			<td width="450"><center><?php echo $row1['type'];?></center></td>
    		</tr>
    		<tr>
    			<td width="450">Bank ID</td>
    			<td width="450"><center><?php echo $row1['cid'];?></center></td>
    		</tr>
    		<tr>
    			<td width="450">Amount in your account</td>
    			<td width="450"><center><?php 
    			if($t1==1 && $t2==1) {
    				echo "Rs. ".($row1['salary']);
    				$cal1 += (int) $row1['salary'];
    			}
    			if($t1==0 && $t2==1) {
    				$cal1 += (int) $row1['salary'];
    				echo "Rs. ".($row1['salary']); 
    			}
    			?></center></td>
    		</tr>
    		</table></center></div>
    	<?php }
    }else{
    	echo "**no balance for you Available";
    	?>
    	<div class="align1"><center><table width="450" height="100" border="1">
    			<tr>
    			<td width="450">Available in your account</td>
    			<td width="450"><center><center>
    				<?php
    				ob_start(); 
    				if($t1==0 && $t2==0){
    					ob_end_clean();
    					echo "Rs. 0"; 
    				} ?></center></td>
    		</tr>
    		</table></center></div>
    	<?php }
    		if($les<500000){
    			$cal1 +=$les;
    		}
    	?>	
</html>
<?php 
if(isset($_POST['submit'])){
	$tz=0;
	$sql2 = "SELECT phonenum, name, salary, type, namecomp, cid FROM icici WHERE phonenum='$ph' and type='personal'";
	$result2 = mysqli_query($link, $sql2);
	if (mysqli_num_rows($result2) > 0) {
		$tz=1;
		$sql3 = "UPDATE icici SET salary=$cal1 WHERE phonenum='$ph' and type='personal'";
		if(mysqli_query($link, $sql3)){
			echo "";
		}else{
			echo "Record not updated";
		}
	date_default_timezone_set('Asia/Kolkata');
	$date = date('Y-m-d H:i:s');
	if($cal11!=0){
	$sql41 = "INSERT INTO govbank (phone_num, name, amount, paid_date, bank_name) VALUES ('$ph', '$a1', '$cal11', '$date','icici')";
	if(mysqli_query($link, $sql41)){
		echo "";
	}
	}
	}
	if($tz==0){
		$cn = $b1;
		$cid = $cid1; 
		$type = $c1;
	$sql4 = "INSERT INTO icici (phonenum, name, salary, type, namecomp, cid) VALUES ('$ph', '$a1', '$cal1', 'personal','$b1', 
	'$cid1')";
		if(mysqli_query($link, $sql4)){
			echo "";
		}else{
			echo "Record not added";
		}
	date_default_timezone_set('Asia/Kolkata');
	$date = date('Y-m-d H:i:s');
	if($cal11!=0){
	$sql42 = "INSERT INTO govbank (phone_num, name, amount, paid_date, bank_name) VALUES ('$ph', '$a1', '$cal11', '$date','icici')";
	if(mysqli_query($link, $sql42)){
		echo "";
	}
	}
	}
	$tz=0;
	$sql5 = "DELETE FROM icici WHERE phonenum='$ph' and type='company'";
	if(mysqli_query($link, $sql5)){
			echo "Tax submitted";
		}else{
			echo "Record not Deleted";
		}
}else{
	echo "";
}
$t1=0;
$t2=0;
}
?>
<br><br><br><br><br><br><br><br><a href="logout.php">logout</a>