<?php
// Connect to the database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'quizgen';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}

// Get the test ID from the URL parameter
$testId = mysqli_real_escape_string($conn, $_GET['test_id']);

// Delete the corresponding entry from the database
$sql = "DELETE FROM tests WHERE test_id='$testId'";
mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);
?>
