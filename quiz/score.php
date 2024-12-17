<?php
// Start the session
session_start();

// Check if the session variable for the score exists
if (!isset($_SESSION['score'])) {
  $_SESSION['score'] = 0;
}

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "quizgen");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the answers from the database
$sql = "SELECT * FROM questions WHERE subject='" . $_SESSION['subject'] . "'";
$result = mysqli_query($conn, $sql);

// Check if there are any questions for the selected subject
if (mysqli_num_rows($result) == 0) {
  echo "No questions found for " . $_SESSION['subject'];
} else {
  $answers = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $answers[$row['id']] = $row['answer'];
  }

  // Calculate the score
  $score = 0;
  foreach ($_SESSION['answers'] as $id => $answer) {
    if ($answer == $answers[$id]) {
      $score++;
    }
  }

  // Update the session variable for the score
  $_SESSION['score'] += $score;

  // Display the quiz results
  echo "<h1>Quiz Results</h1>";
  echo "<p>Your score for the " . $_SESSION['subject'] . " quiz is " . $score . " out of " . count($_SESSION['answers']) . ".</p>";
  echo "<p>Your total score is now " . $_SESSION['score'] . ".</p>";

  // Display the correct answers
  echo "<h2>Correct Answers:</h2>";
  foreach ($answers as $id => $answer) {
    echo "<p><strong>Question " . $id . ":</strong> " . $answer . "</p>";
  }

  // Clear the session variables for the answers and subject
  unset($_SESSION['answers']);
  unset($_SESSION['subject']);
}

// Close the database connection
mysqli_close($conn);
?>
