<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<form action="login.php" method="post" onsubmit="return validate()">
		UserName: <input type="text" name="userName"><br>
		Password  :  <input type="password" name="passWord"><br>

			<input type="submit" name="submit">
			</form>

		<?php

			if(isset($_SESSION['userName'])){
				header('Location:index.php');
			}
			if(isset($_POST['submit'])){
				$userName = $_POST['userName'];
				$passWord = $_POST['passWord'];

				$userInfos = array(
					array('userName' => 'a','passWord'=>'a' ),
					array('userName' => 'b','passWord'=>'b' ),
					array('userName' => 'c','passWord'=>'c' ),

				);

				foreach ($userInfos as  $userInfo) {
					if($userName == $userInfo['userName'] && $passWord == $userInfo['passWord']){
						setcookie('userName',$userName,time()+3600);
						$_SESSION['userName'] = $userName;
						header('Location:index.php');
					}
				}
				// if($userName == 'a' && $passWord == 'a'){
				// 	setcookie('userName',$userName,time()+3600);
				// 	$_SESSION['userName'] = $userName;
				// 	header('Location:index.php');
				// }
			}
		 ?>
		 <script type="text/javascript">
		 	function validate(){
				var userName = document.forms[0]['userName'].value;
				var passWord = document.forms[0]['passWord'].value;

				if(userName == ''&& passWord == ''){
					alert('Required UserName and Password');
				}
			}

		 </script>
	</body>

</html>
