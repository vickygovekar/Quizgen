<?php
// Start or resume the session
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>QuizGen - Admin</title>
<link rel="stylesheet" type="text/css" href="navbar.css">
	<style>

body{
background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#000000" : "#FFFFFF"; ?>;
}
		/* Styles for the intro boxes */
		.intro-wrapper {
			display: flex;
			justify-content: space-between;
			flex-wrap: wrap;
			margin: 0 20px;
			padding-top: 20px;
			box-sizing: border-box;
			font-family: Arial, Helvetica, sans-serif;
		}

		.intro {
			flex-basis: calc((100% - 80px)/3);
			height: 200px;
			border: 1px solid black;
			border-radius: 20px;
			text-align: center;
			padding: 20px;
			box-sizing: border-box;
		}

		/* Styles for the intro text */
		.intro-text {
			background-color: #edf2fc;
			padding: 20px;
			margin-top: 20px;
			margin-left: 20px;
			margin-right: 20px;
			box-sizing: border-box;
			font-family: sans-serif;
			text-align: center;
		}

		.intro-header {
			font-weight: bold;
		}

		.intro-paragraph {
			color: #333;
		}

		.container {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 60vh;
			font-family: sans-serif;
		}
		.container h3{
			color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
		}
		.option-box {
			background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#1d1d1d" : "#edf2fc"; ?>;
			padding: 40px;
			border-radius: 10px;
			box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
			margin: 20px;
			text-align: center;
			width: 40%;
		}

		.option-box h2 {
			margin-bottom: 20px;
			color: #333;
		}

		.option-box p {
			margin-bottom: 30px;
			color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#ddd" : "#333"; ?>;
		}

		.button a {
			text-decoration: none; /* remove underline */
			color: #fff; /* set color to white */
		}

		.button a:hover {
			text-decoration: none; /* remove underline on hover */
			color: #fff; /* set color to white on hover */
		}

		.button {
			background-color: #333;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 25px;
			cursor: pointer;
			transition: 0.3s;
			background-color:  ease;
		}
		.logo-img {
 			width: 40px; /* set the width to 100 pixels */
  			height: auto; /* maintain the aspect ratio */
			filter: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "invert(100%)" : "none"; ?>;
		}
	</style>
</head>
<body>
<?php 
  $active_page = "admin"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>

<div class="container">
	<div class="option-box">
	<img src="../graphics/icons/view-user.png" alt="QuizGen Logo" class="logo logo-img">
		<h3>View Users</h3>
		<p>Easily display users with filters</p>
		<button class="button"><a href="view_user.php">Open</a></button>
	</div>
	<div class="option-box">
		<img src="../graphics/icons/add-user.png" alt="QuizGen Logo" class="logo logo-img">
		<h3>Add Users</h3>
		<p>Easily add users</p>
		<button class="button"><a href="add_user.php">Open</a></button>
	</div>
	<div class="option-box">
	<img src="../graphics/icons/search.png" alt="QuizGen Logo" class="logo logo-img">
		<h3>View Queries</h3>
		<p>Easily view user queries</p>
		<button class="button"><a href="view_queries.php">Open</a></button>
	</div>
</div>
</body>
</html>
