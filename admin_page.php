<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="#" method="POST">
		Username:<input type="text" name="admin" value="Y@SH17"><br><br>
		Password:<input type="password" name="pass" placeholder="*****"><br><br>
		<input type="submit">
	</form>
	<?php if($_POST['pass']=="12345" && $_POST["admin"]=="Y@SH17"){ ?>
	<b>Search For A The Registered complain using invoice number</b><a href="search.php">Click here</a><br>
	<b>Display All details</b><a href="govdatadisplay.php">Click here</a><br>
	<b>Crime Records</b><a href="crimedatadisplay.php">Click here</a><br>
	<b>Muncipality Records</b><a href="muncipalitydatadisplay.php">Click here</a>
<?php } else{
	echo "Be valid to access it";
}?>
</body>
</html>