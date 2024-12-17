<!DOCTYPE html>
<html>
<head>
  <title>QuizGen - Multiple Choice Test</title>
  <style>
  /* Reset styles */
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  /* Style the container */
  .container {
    max-width: 800px;
    margin: 0 auto;
    font-family: sans-serif;
    background-color: #f2f2f2;
    border-radius: 25px;
    padding: 20px 20px; /* Add 50px padding to top and bottom */
    margin-top: 20px;
    margin-bottom: 20px;
  }

  /* Style the heading */
  h1 {
    text-align: center;
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #000000;
  }

  /* Style the questions */
  p {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  /* Style the answer choices */
  input[type="radio"] {
    margin-bottom: 10px;
  }

  label {
    display: block;
    margin-bottom: 10px;
    padding-left: 30px; /* Add 30px padding to the left */
    position: relative;
  }

  label input[type="radio"] {
    position: absolute;
    left: 0;
    top: 2px;
  }

  /* Style the submit button */
  input[type="submit"] {
    display: block;
    margin-top: 20px;
    padding: 10px 20px;
    margin: 0 auto; /* Center the submit button */
    font-size: 18px;
    font-weight: bold;
    color: #ffffff;
    background-color: black;
    border: none;
    border-radius: 25px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #3e8e41;
  }
</style>
</head>
<body>
  <div class="container">
    <h1>Quiz</h1>
    <hr><br>
    <?php
    // Get the test ID, user ID, and number of questions from the URL
    $test_id = $_GET['test_id'];
    $user_id = $_GET['user_id'];
    $num_questions = $_GET['number_of_questions'];

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

    // Get the questions from the database based on the subject and type
    $subject = $_GET['subject'];
    $type = "multiple-choice";

    $sql = "SELECT * FROM questions WHERE subject='$subject' AND type='$type' ORDER BY RAND() LIMIT $num_questions";
    $result = $conn->query($sql);

    // Display the questions as a multiple-choice test
    if ($result->num_rows > 0) {
      echo "<form method='post' action='result.php?test_id=$test_id&user_id=$user_id'>";
      while($row = $result->fetch_assoc()) {
        echo "<p>" . $row['question'] . "</p>";
        echo "<label><input type='radio' name='q" . $row['id'] . "' value='" . $row['dummy1'] . "'>" . $row['dummy1'] . "</label>";
        echo "<label><input type='radio' name='q" . $row['id'] . "' value='" . $row['dummy2'] . "'>" . $row['dummy2'] . "</label>";
        echo "<label><input type='radio' name='q" . $row['id'] . "' value='" . $row['dummy3'] . "'>" . $row['dummy3'] . "</label>";
        echo "<label><input type='radio' name='q" . $row['id'] . "' value='" . $row['answer'] . "'>" . $row['answer'] . "</label>";
      }
      echo "<input type='submit' value='Submit'>";
      echo "</form>";
    } else {
      echo "<p>No questions found.</p>";
    }

    $conn->close();
    ?>
  </div>
</body>
</html>