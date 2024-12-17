<!DOCTYPE html>
<html>
<head>
  <title>Thank You</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
      text-align: center;
      padding-top: 50px;
    }

    h1 {
      font-size: 36px;
      font-weight: bold;
      color: #333333;
      margin-bottom: 20px;
    }

    p {
      font-size: 24px;
      color: #666666;
      margin-bottom: 40px;
    }
  </style>
</head>
<body>
  <h1>Thank You</h1>
  <p>Your submission has been received.</p>
  <p>You will be redirected to the homepage in 5 seconds.</p>
  <?php
// Get the test ID and user ID from the URL
$test_id = $_GET['test_id'];
$user_id = $_GET['user_id'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizgen";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the questions and answers from the database
$sql = "SELECT * FROM questions WHERE id IN (";
foreach ($_POST as $key => $value) {
  if (substr($key, 0, 1) == "q") {
    $sql .= substr($key, 1) . ",";
  }
}
$sql = rtrim($sql, ",") . ")";
$result = $conn->query($sql);

// Calculate the score
if (!empty($_POST) && $result->num_rows > 0) {
  $score = 0;
  while($row = $result->fetch_assoc()) {
    if ($_POST["q" . $row['id']] == $row['answer']) {
      $score++;
    }
  }
} else {
  $score = 0;
}

// Display the score
echo "<p>Your score is " . $score . " out of " . $result->num_rows . ".</p>";

// Save the score to the database
$sql = "INSERT INTO scores (test_id, user_id, score) VALUES ('$test_id', '$user_id', '$score')";
if ($conn->query($sql) === TRUE) {
  echo "Score saved successfully.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirect to homepage after 5 seconds
header("refresh:5;url=../../student/notification.php");
?>
</body>
</html>