<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<form action="bai4.php" method="post">
			So: <input type="text" name="name"><br>
			<!-- So2: <input type="text" name="so2"><br>
			So3: <input type="text" name="so3"><br> -->

			<input type="submit" name="submit">
			</form>
		<?php

		if (isset($_POST["submit"]) ){
			$i = $_POST["name"];
			$ans = 0;
			if($i<=100){
				$ans = $i*450;
			}elseif ($i<=200) {
				$ans = 100*450 + ($i-100)*600;
			}elseif ($i<=300) {
				$ans = 100*450 + 100*600 + ($i-200)*750;
			}elseif ($i<=500) {
				$ans = 100*450 + 100*600 + 100*750 + ($i-300)*900;
			}elseif ($i<=1000) {
				$ans = 100*450 + 100*600 + 100*750 + 200*900+($i-500)*1000;
			}else{
				$ans = 100*450 + 100*600 + 100*750 + 200*900+500*1000+($i-1000)*1200;
			}


			
			echo "Tien phai nop truoc thue:".($ans)."<br>";

			echo "Tien phai nop sau thue:".($ans*1.1)."<br>";
			echo "Tien phai nop truoc thue:".($t)."<br>";

			echo "Tien phai nop sau thue:".($t*1.1)."<br>";
		}

		?>

	</body>
</html>
