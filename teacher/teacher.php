<!DOCTYPE html>
<html>
<head>
	<title>QuizGen - Teacher</title>
	<link rel="icon" href="../graphics/logo-icon.ico" type="image/ico">
<link rel="stylesheet" type="text/css" href="navbar.css">
	<style>
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
			font-family: sans-serif;
			margin-top: 70px;
			margin-bottom: 20px;
		}
		.container2 {
			display: flex;
			justify-content: center;
			align-items: center;
			font-family: sans-serif;
			margin-top: 20px;
			margin-bottom: 20px;
		}

		.option-box {
			background-color: #edf2fc;
			padding: 20px;
			border-radius: 25px;
			box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
			margin: 10px;
			text-align: center;
			width: 40%;
		}

		.option-box h2 {
			margin-bottom: 20px;
			color: #333;
		}

		.option-box p {
			margin-bottom: 30px;
			color: #666;
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

		.logo {
  width: 40px; /* set the width to 100 pixels */
  height: auto; /* maintain the aspect ratio */
}

	</style>
</head>
<body>
<link rel="icon" href="../graphics/logo-icon.ico" type="image/ico">

<?php 
  $active_page = "teacher"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>

<div class="container">
		<div class="option-box">
			<img src="../graphics/icons/edit-questions.png" alt="QuizGen Logo" class="logo">
			<h3>Edit Questions</h3>
			<p>View, Edit or Delete stored questions</p>
			<button class="button"><a href="../teacher/edit.php">Open</a></button>
		</div>

		<div class="option-box">
			<img src="../graphics/icons/add-test.png" alt="QuizGen Logo" class="logo">
			<h3>Create Test</h3>
			<p>Create a test</p>
			<button class="button"><a href="create_test.php">Open</a></button>
		</div>

		<div class="option-box">
			<img src="../graphics/icons/add-questions.png" alt="QuizGen Logo" class="logo">
			<h3>Add Questions</h3>
			<p>Add questions to the question bank</p>
			<button class="button"><a href="../teacher/add.php">Open</a></button>
		</div>

	<div class="option-box">
			<img src="../graphics/icons/search.png" alt="QuizGen Logo" class="logo">
			<h3>View Tests</h3>
			<p>Easily display stored tests with filters</p>
			<button class="button"><a href="../teacher/view_tests.php">Open</a></button>
		</div>

	</div>
</div>
<div class="container2">
	<div class="option-box">
	<img src="../graphics/icons/view-score.png" alt="QuizGen Logo" class="logo">

			<h3>View Scores</h3>
			<p>Easily display stored scores with filters</p>
			<button class="button"><a href="../teacher/view_score.php">Open</a></button>
		</div>


	</div>
</div>	
</body>
</html>