<?php
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
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

  // Get the ID parameter
  $id = $_GET["id"];

  // Construct the SQL query to delete the question
  $sql = "DELETE FROM users WHERE id=$id";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Close the database connection
  mysqli_close($conn);

  // Return a success response
  http_response_code(204);
} else {
  // Return a bad request response
  http_response_code(400);
}
