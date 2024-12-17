<!DOCTYPE html>
<html>
<head>
<title>Quiz Result</title>
</head>
<body>
<h1>Quiz Result</h1>
<?php
// Retrieve selected options and answers from form
$num_questions = $_POST['num_questions'];
$batch = $_POST['batch'];
$subject = $_POST['subject'];
$score = 0;

// Check answers and calculate score
for ($i = 1; $i <= $num_questions; $i++) {
$question_id = $_POST['question' . $i . '_id'];
$answer = $_POST['question' . $i . '_answer'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizgen";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM questions WHERE id='$question_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
if ($answer == 4) {
$score++;
}
}

$conn->close();
}

// Display score and percentage
$percentage = ($score / $num_questions) * 100;
echo '<p>You scored ' . $score . ' out of ' . $num_questions . ' (' . $percentage . '%).</p>';

// Store test results in database
session_start();
$user_id = $_SESSION['user_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizgen";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO student_test (user_id, subject, num_questions, score, percentage) VALUES ('$user_id', '$subject', '$num_questions', '$score', '$percentage')";
$conn->query($sql);

$conn->close();
?>
</body>
</html>
