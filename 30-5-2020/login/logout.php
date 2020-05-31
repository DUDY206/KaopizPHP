<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
			if(isset($_SESSION['userName'])){
				unset($_SESSION['userName']);
			}

			session_destroy();
			header('Location: login.php');

		 ?>
	</body>
</html>
