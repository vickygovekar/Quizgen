<?php
// Get the question ID from the URL parameter
$id = $_GET["id"];

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "quizgen");

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Delete the question from the database
$sql = "DELETE FROM questions WHERE id = $id";

if (mysqli_query($conn, $sql)) {
	echo "Question deleted successfully.";
} else {
	echo "Error deleting question: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

// Redirect back to the display questions page
header("Location: edit.php");
exit();
?>
