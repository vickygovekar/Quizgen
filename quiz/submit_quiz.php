<?php
  // Retrieve the answers from the form submission
  $tf_q1 = $_POST['tf_q1'];
  $tf_a1 = $_POST['tf_a1'];
  $tf_q2 = $_POST['tf_q2'];
  $tf_a2 = $_POST['tf_a2'];
  $tf_q3 = $_POST['tf_q3'];
  $tf_a3 = $_POST['tf_a3'];

  $mcq_q1 = $_POST['mcq_q1'];
  $mcq_a1 = $_POST['mcq_a1'];
  $mcq_q2 = $_POST['mcq_q2'];
  $mcq_a2 = $_POST['mcq_a2'];
  $mcq_q3 = $_POST['mcq_q3'];
  $mcq_a3 = $_POST['mcq_a3'];

  $sa_q1 = $_POST['sa_q1'];
  $sa_a1 = $_POST['sa_a1'];
  $sa_q2 = $_POST['sa_q2'];
  $sa_a2 = $_POST['sa_a2'];
  $sa_q3 = $_POST['sa_q3'];
  $sa_a3 = $_POST['sa_a3'];

  // Check the answers and calculate the score
  $score = 0;

  if ($tf_q1 == $tf_a1) {
    $score++;
  }

  if ($tf_q2 == $tf_a2) {
    $score++;
  }

  if ($tf_q3 == $tf_a3) {
    $score++;
  }

  if ($mcq_q1 == $mcq_a1) {
    $score++;
  }

  if ($mcq_q2 == $mcq_a2) {
    $score++;
  }

  if ($mcq_q3 == $mcq_a3) {
    $score++;
  }

  if (strtolower($sa_q1) == strtolower($sa_a1)) {
    $score++;
  }

  if (strtolower($sa_q2) == strtolower($sa_a2)) {
    $score++;
  }

  if (strtolower($sa_q3) == strtolower($sa_a3)) {
    $score++;
  }

  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "quizgen";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Insert the score into the database
  $sql = "INSERT INTO scores (subject, score) VALUES ('$subject', '$score')";
  mysqli_query($conn, $sql);

  // Close the database connection
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Quiz Results</title>
</head>
<body>
  <h1>Quiz Results</h1>
  <p>You scored <?php echo $score; ?>/9</p>
</body>
</html>
