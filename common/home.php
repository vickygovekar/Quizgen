<?php
// Start or resume the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="../graphics/logo-icon.ico" type="image/ico">
<title>QuizGen - Home</title>
<link rel="stylesheet" type="text/css" href="navbar.css">
<style>

body{
background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#000000" : "#FFFFFF"; ?>;
}

.intro-wrapper {
display: flex;
justify-content: space-between;
flex-wrap: wrap;
margin: 0 20px;
padding-top: 20px;
box-sizing: border-box;
font-family: sans-serif;
}

/* the 3 intro boxes */
.intro {
flex-basis: calc((100% - 80px)/3);
height: 200px;
box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
border-radius: 25px;
text-align:;
margin-top: 30px;
background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#1d1d1d" : "#fff"; ?>;
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
padding: 20px;
box-sizing: border-box;
}
/* box-shadow: 0px 5px 20px rgba(255, 255, 255, 0.1); */

/* Styles for the main intro */
.intro-text {
background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#555c79" : "#edf2fc"; ?>;
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
padding: 20px;
margin-top: 30px;
border-radius: 25px;
margin-left: 20px;
margin-right: 20px;
box-sizing: border-box;
font-family: sans-serif;
text-align: center;
}

.intro-header {
font-weight: bold;
}

.intro-wrapper p{
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#ddd" : "#333"; ?>:
}

.intro-paragraph {
color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#ddd" : "#333"; ?>;
}
</style>
</head>
<body>
<?php 
$active_page = "home"; // Define the active page variable
include '../navigation-bar/nav.php'; // Include the navigation bar file
?>
<body onload="displayGreeting()">
<div class="intro-text">
<h1 id="greeting"></h1><h1>Welcome back to Quiz Gen, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></h1>
<p>Test your knowledge and skills here</p>
</div>

<div class="intro-wrapper">
<div class="intro">
<h2>Customizable Quizzes</h2>
<p>Our quiz generator allows you to create customized quizzes to fit your specific needs. Choose from a variety of question types, difficulty levels, and topics to create the perfect quiz for your audience.</p>
</div>

<div class="intro">
<h2>Automated Scoring</h2>
<p>Our quiz generator automatically scores each quiz, saving you time and hassle. Simply input the correct answers and our system will do the rest, providing you with instant feedback on your quiz takers' performance.</p>
</div>

<div class="intro">
<h2>User-friendly Interface</h2>
<p>Our quiz generator features a clean and intuitive interface that makes it easy to create and customize your quizzes. Whether you're a student or a teacher, our platform is designed to help you succeed.</p>
</div>
</div>
</body>
<script>
        function displayGreeting() {
            var currentTime = new Date();
            var currentHour = currentTime.getHours();
            var greeting;

            if (currentHour < 12) {
                greeting = 'Good morning!';
            } else if (currentHour < 17) {
                greeting = 'Good afternoon!';
            } else if (currentHour < 20) {
                greeting = 'Good evening!';
            } else {
                greeting = 'Pleasant night!';
            }

            document.getElementById('greeting').innerHTML = greeting;
        }
    </script>
</html>
