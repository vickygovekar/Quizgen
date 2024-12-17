<?php
// Connect the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizgen";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

// Get the ID of the query to be deleted
$id = $_GET["id"];

// Delete the query from the contact table
$sql = "DELETE FROM contact WHERE id = $id";
if (mysqli_query($conn, $sql)) {
// Redirect the user back to the view queries page
header("Location: view_queries.php");
exit();
} else {
echo "Error deleting query: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
