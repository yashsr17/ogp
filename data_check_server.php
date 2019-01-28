<?php 
$link = mysqli_connect("localhost","root","","admin");
$sql1 = mysqli_query($link,"SELECT * FROM user_data WHERE phone = '9962262751'");
$sql2 = mysqli_query($link,"SELECT * FROM user_data WHERE email = 'yashpanchal.61@gmail.com'");
$c=$d=0;
if(mysqli_num_rows($sql1)>0){
	echo "***phone aldready exists";
	$c++;
}
if(mysqli_num_rows($sql2)>0){
	echo "***email aldready exists";
	$d++;
}
?>