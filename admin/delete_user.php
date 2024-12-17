<!DOCTYPE html>
<html>
<head>
  <title>Delete User</title>
</head>
<body>

<?php
// Check if the user ID is provided
if (isset($_GET["id"]) && !empty($_GET["id"])) {
  // Connect to the database
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "quizgen";
  $conn = mysqli_connect($host, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Define the SQL query to delete the user
  $sql = "DELETE FROM users WHERE id=" . $_GET["id"];

  // Execute the query
  if (mysqli_query($conn, $sql)) {
    echo "User deleted successfully.";
  } else {
    echo "Error deleting user: " . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
} else {
  echo "No user ID provided.";
}
?>

<p><a href="view_user.php">Back to View Users</a></p>

</body>
</html>