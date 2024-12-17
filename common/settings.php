<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../graphics/logo-icon.ico" type="image/ico">
	<title>QuizGen - Settings</title>
	<style>
		/* General styles */
		body {
			background-color: white;
			font-family: sans-serif;
		}

		.container {
			background-color: #edf2fc;
			border-radius: 25px;
			box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
			margin: 150px auto 0;			
			padding: 20px;
			text-align: center;
			width: 500px;
		}

		/* Logo styles */
		.logo {
			margin-bottom: 20px;
		}

		.logo img {
			height: 100px;
			cursor: pointer;
		}

		.logo p {
			font-size: 12px;
			color: #888;
			margin: 5px 0 0;
		}

		/* Sessions styles */
		.sessions {
			margin-top: 20px;
		}

		.sessions h2 {
			margin-bottom: 10px;
		}

		.sessions ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			text-align: left;
		}

		.sessions li {
			margin-bottom: 5px;
		}

		/* Logout button styles */
		.logout {
			margin-top: 20px;
		}

		.logout input[type="submit"] {
			background-color: #000000;
			border-radius: 25px;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			padding: 10px 20px;
			transition: background-color 0.3s ease;
		}

		.logout input[type="submit"]:hover {
			background-color: #cc0000;
		}
	</style>
</head>
<body>
	<center><div class="logo">
		<img src="https://i.postimg.cc/sDMgBwRV/logo-text-linear.png" alt="Logo" onclick="location.href='home.php';">
		<p>Click logo to go home</p>
	</div></center>
	<div class="container">
		<?php
			session_start();
			if(isset($_POST['clear_sessions'])) {
				session_unset();
				session_destroy();
				header('Location: ../login/login.php');
				exit();
			}
			if(!empty($_SESSION)) {
				echo "<div class=\"sessions\">";
				echo "<h2>Active Sessions:</h2>";
				echo "<ul>";
				foreach($_SESSION as $key => $value) {
					echo "<li>$key: $value</li>";
				}
				echo "</ul>";
				echo "</div>";
			} else {
				echo "<p>No active sessions.</p>";
			}
		?>
		<div class="logout">
			<form method="post">
				<input type="submit" name="clear_sessions" value="Logout">
			</form>
		</div>
	</div>
</body>
</html>
