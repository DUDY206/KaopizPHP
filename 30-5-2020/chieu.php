<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		
		<?php
		session_start();
		// setcookie('user','HUNG',time()+3600);
		// setcookie('user','HUNG',time()-3600);

		// $value = $_COOKIE['user'];
		// echo $value;
		// echo Date("y:m:d h:m:s");

		$_SESSION['favcolor'] = 'GREEN';
		$_SESSION['favcolor1'] = 'GREEN1';

		$favcolor = $_SESSION['favcolor'];
		echo $favcolor;

		unset($_SESSION['favcolor']);
		echo "<br>";
		foreach ($_SESSION as $key => $value) {
			echo $key.":".$value."<br>";
		}

		// session_unset();
		// echo "<br> Sau xoa fav1:<br>";
		//
		// foreach ($_SESSION as $key => $value) {
		// 	echo $key.":".$value."<br>";
		// }

		session_destroy();
		if(isset($_SESSION)){
			print_r($_SESSION);
		}else{
			print_r($_SESSION);

		}
		$_SESSION['favcolor2'] = 'GREEN2';
		print_r($_SESSION);

		session_start();
		// session_start();
		print_r($_SESSION);
		print_r($_COOKIE['PHPSESSID']);
		//

		// echo $_SESSION;
		 ?>
	</body>
</html>
