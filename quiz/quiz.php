<?php
// Start or resume the session
session_start();
?>

<!DOCTYPE html>
<html<head>
<title>QuizGen - Quiz</title>
<link rel="stylesheet" type="text/css" href="navbar.css">
<style>
body {
background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "black" : "#fff"; ?>;
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
font-family: Arial, Helvetica, sans-serif;
}

/* Styles for the intro boxes */
.intro-wrapper {
display: flex;
justify-content: space-between;
flex-wrap: wrap;
margin: 0 20px;
padding-top: 20px;
box-sizing: border-box;
}

.intro {
flex-basis: calc((100% - 80px)/3);
height: 200px;
border: 1px solid <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "black"; ?>;
border-radius: 20px;
text-align: center;
padding: 20px;
box-sizing: border-box;
background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#1d1d1d" : "#edf2fc"; ?>;
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "" ? "#fff" : "#333"; ?>;
}

/* Styles for the intro text */
.intro-text {
background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#555c79" : "#edf2fc"; ?>;
padding: 20px;
margin-top: 20px;
margin-left: 20px;
margin-right: 20px;
box-sizing: border-box;
font-family: sans-serif;
text-align: center;
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
box-shadow: 0px 10px 20px rgba(0, 0, 0 0.1);
border-radius: 25px;
}

.intro-header {
font-weight: bold;
}

.intro-paragraph {
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#ddd" : "#333"; ?>;
}

.container {
display: flex;
justify-content: center;
align-items: center;
height: 60vh;
}

.option-box {
background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#1d1d1d" : "#edf2fc"; ?>;
padding: 40px;
border-radius: 25px;
box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
margin: 20px;
text-align: center;
width: 40%;
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
}

.option-box h2 {
margin-bottom: 20px;
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
}

.option-box p {
margin-bottom: 30px;
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#ddd" : "#666"; ?>;
}

.button a {
text-decoration: none; /* remove underline */
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#fff"; ?>; /* set color to white */
}

h2{
font-family: sans-serif;
}

p{
font-family: sans-serif;
}

.button {
    background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#333" : "black"; ?>;
    color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "white"; ?>;
    border: none;
    padding: 10px 20px;
    border-radius: 25px;
    cursor: pointer;
    transition: 0.3s;
}

.button:hover {
    background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
    color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#333" : "#fff"; ?>;
}

.button a {
    color: inherit;
    text-decoration: none;
}

.button:hover a {
    color: inherit;
}

</style>
</head>
<body>
<?php 
  $active_page = "quiz"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>

<div class="container">
<div class="option-box">
<h2>Take a Quiz</h2>
<p>Test your knowledge with a quick quiz.</p>
<button class="button"><a href="../quiz/simpletest/quiz.php">Start Quiz</a></button>
</div>
<div class="option-box">
<h2>Generate a Paper</h2>
<p>Get a Random paper and Answer it</p>
<button class="button"><a href="../quiz/paper_generator/quizmcq.php">Get Started</a></button>
</div>
</div>
</body>
</html>
