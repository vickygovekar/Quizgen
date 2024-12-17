<!DOCTYPE html>
<html>
<head>

	<title>Notification Page</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			margin-top: 50px;
		}

		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
h1{
	font-family: sans-serif ;
align: center;
}
		th {
			font-family: sans-serif ;
			background-color: black;
			color: white;
		}

		th:first-child {
			border-top-left-radius: 25px;
			border-bottom-left-radius: 25px;
		}

		th:last-child {
			border-top-right-radius: 25px;
			border-bottom-right-radius: 25px;
		}

		tr:hover {
			background-color: #f5f5f5;
		}
	</style>
</head>
<body>
<?php 
  $active_page = "notification"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>
<link rel="icon" href="../graphics/logo-icon.ico" type="image/ico">

<h1>Notifications</h1>

<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizgen";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the tests that match the batch stored in the session
$batch = $_SESSION['batch'];
$sql = "SELECT * FROM tests WHERE batch = '$batch'";
$result = $conn->query($sql);

// Display the tests in a table
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Test ID</th><th>Name</th><th>Subject</th><th>Batch</th><th>Number of Questions</th><th>Score</th></tr>";
    while($row = $result->fetch_assoc()) {
        $test_id = $row["test_id"];
        $user_id = $_SESSION['user_id'];
        $score_sql = "SELECT * FROM scores WHERE user_id = '$user_id' AND test_id = '$test_id'";
        $score_result = $conn->query($score_sql);
        if ($score_result->num_rows > 0) {
            $score_row = $score_result->fetch_assoc();
            $score = $score_row["score"];
            echo "<tr><td>".$row["test_id"]."</td><td>".$row["name"]."</td><td>".$row["subject"]."</td><td>".$row["batch"]."</td><td>".$row["number_of_questions"]."</td><td>".$score."</td></tr>";
        } else {
            echo "<tr><td>".$row["test_id"]."</td><td>".$row["name"]."</td><td>".$row["subject"]."</td><td>".$row["batch"]."</td><td>".$row["number_of_questions"]."</td><td><a href='../quiz/quizpro/mcq_test.php?test_id=".$row["test_id"]."&user_id=".$user_id."&number_of_questions=".$row["number_of_questions"]."&subject=".$row["subject"]."'>Answer Now</a></td></tr>";
        }
    }
    echo "</table>";
} else {
    echo "No tests found.";
}

$conn->close();
?>

</body>
</html>