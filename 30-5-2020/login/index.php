<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<a href="logout.php">Log out</a>
		<?php
		// print_r($_SESSION);
			if(isset($_SESSION['userName'])){
				echo "Hello ".$_SESSION['userName'];
			}else{
				echo "None";
			}
		 ?>
	</body>
</html>
