<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/graph.css">
	<script type="text/javascript">
		function draw(){
			var n1 = '<?php echo $_SESSION['percent3'].",".$_SESSION['percent4'].",".$_SESSION['dated'].",".$_SESSION['percent6'].",".$_SESSION['percent7']; ?>';
			var graphValues = n1.split(',');
			var canvas = document.getElementById("myCanvas");
			var ctx = canvas.getContext("2d");

			var width = 40;
			var X = 50;
			ctx.fillStyle = 'blue';

			for (var i =0; i<graphValues.length; i++){
				var h = graphValues[i];
				ctx.fillRect(X,canvas.height-h,width,h);
				X += width+15;
			}
		}
	</script>
	<title></title>
</head>
<link rel="stylesheet" type="text/css" href="css/pan.css">
<link rel="stylesheet" type="text/css" href="css/commom.css">
<div class="block"></div>
<body background="img\backusersign.png" align="center" onload="draw()">
<br><br><br><br><br><br><br><br><br>
    <canvas id="myCanvas" width="350" height="200" style="border:1px solid #c3c3c3"></canvas>
<div class="a">Not-Attended</div>
<div class="b">Not-Accepted</div>
<div class="c">Approved</div>
<div class="d">Inprogress</div>
<div class="e">Completed</div>
<div class="a1"><?php echo round($_SESSION['percent3']); ?></div>
<div class="b1"><?php echo round($_SESSION['percent4']); ?></div>
<div class="c1"><?php echo round($_SESSION['dated']); ?></div>
<div class="d1"><?php echo round($_SESSION['percent6']); ?></div>
<div class="e1"><?php echo round($_SESSION['percent7']); ?></div>
</body>
</html>
