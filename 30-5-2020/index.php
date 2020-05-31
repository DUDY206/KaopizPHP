<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<form action="index.php" method="post">
			So: <input type="text" name="name"><br>
			<!-- So2: <input type="text" name="so2"><br>
			So3: <input type="text" name="so3"><br> -->

			<input type="submit" name="submit">
			</form>
		<?php
		
		if (isset($_POST["submit"]) ){
			$i = $_POST["name"];
			switch ($i) {
				case 1:
					echo "thu 2";
					break;
				case 2:
					echo "thu 3";
					break;
				case 3:
					echo "thu 4";
					break;
				case 4:
					echo "thu 5";
					break;
				case 5:
					echo "thu 6";
					break;
				case 6:
					echo "thu 7";
					break;
				case 7:
					echo "Chu nhat ";
					break;
				default:
					echo "Khong hop le";
					break;
			}
		}
		?>

	</body>
</html>
