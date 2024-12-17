<!DOCTYPE html>
<html>
<head>
    <title>Quiz Generator</title>
    <link rel="stylesheet" href="print.css" media="print">
</head>
    <style>
        
.container{
    display: flex;
  flex-direction: column;
  align-items: center;
}


.subject-container {
  width: 40%;
  background-color: #edf2fc;
  padding: 20px;
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
  border: 0px solid #333;
  border-radius: 25px;
  margin-right: 20px;
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 35px;
}

.quiz-container {
  width: 65%;
  background-color: #edf2fc;
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
  padding: 20px;
  border: 0px solid #333;
  border-radius: 25px;
}


        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }
        header {
            background-color: #333;
            color: white;
            padding: 20px;
        }
        h1 {
            margin: 0;
            font-size: 32px;
            font-family: sans-serif;
        }
        form {
            margin: 20px;
        }
        label {
            font-size: 18px;
            font-weight: bold;
            margin-right: 10px;
        }
        select {
            font-size: 18px;
            padding: 5px;
            border-radius: 25px;
        }
        input[type="submit"] {
            font-size: 18px;
            padding: 5px 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }
        h2 {
            font-size: 24px;
            font-weight: bold;
            margin-top: 40px;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        li {
            margin: 10px 0;
            font-size: 18px;
        }
        li input[type="radio"] {
            margin-right: 10px;
        }
        p {
            font-size: 18px;
            margin-top: 40px;
            font-weight: bold;
        }
        .result {
            font-size: 18px;
            margin-top: 40px;
            font-weight: bold;
        }
    

        input[type="submit"], #generate-btn {
    font-size: 18px;
    padding: 5px 10px;
    background-color: black;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 25px;
}


    </style>
<body>

<div style="display:flex; justify-content:center; align-items:center;">
  <a href="../quiz.php" style="display:flex; align-items:center; text-decoration:none;">
    <img src="https://i.postimg.cc/sDMgBwRV/logo-text-linear.png" alt="Logo" style="height:50px;">
    <button style="margin-left:10px; padding:8px 12px; background-color:black; color:#fff; border:none; font-family: sans-serif; border-radius:25px;">Back to Quiz</button>
  </a>
</div>

    <br><br>
    <h1>Question Paper Generator</h1>
    <div class="container">
  <div class="subject-container">
    <form method="POST" action="">
      <label for="subject">Select a subject:</label>
      <select name="subject" id="subject">
        <option value="java">Java</option>
        <option value="python">Python</option>
        <option value="php">PHP</option>
      </select>
      <input type="submit" name="generate" value="Generate">
      <button id="generate-btn" onclick="printQuiz()">Print Quiz</button>
    </form>
  </div>
  <div class="quiz-container" id="quiz-container">
        <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizgen";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the Generate button is clicked and a subject is selected
if (isset($_POST['generate']) && !empty($_POST['subject'])) {
    $subject = $_POST['subject'];

    // Query the database to fetch three random True/False questions and options for the selected subject
    $query = "SELECT * FROM questions WHERE type='true-false' AND subject='$subject' ORDER BY RAND() LIMIT 3";
    $result = mysqli_query($conn, $query);

    // Display the True/False questions and options
    echo "<h2>True/False Questions:</h2>";
    echo "<form method='POST' action=''>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>" . $row['question'] . "</p>"; // Display the question
        echo "<ul>"; // Display the options in an unordered list
        echo "<li><input type='radio' name='answer[" . $row['id'] . "]' value='true'>" . "True" . "</li>";
        echo "<li><input type='radio' name='answer[" . $row['id'] . "]' value='false'>" . "False" . "</li>";
        echo "</ul>";
    }

    // Query the database to fetch three random multiple-choice questions and options for the selected subject
    $query = "SELECT * FROM questions WHERE type='multiple-choice' AND subject='$subject' ORDER BY RAND() LIMIT 3";
    $result = mysqli_query($conn, $query);

    // Display the multiple-choice questions and options
    echo "<h2>Multiple Choice Questions:</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>" . $row['question'] . "</p>"; // Display the question
        echo "<ul>"; // Display the options in an unordered list
        $options = array($row['answer'], $row['dummy1'], $row['dummy2'], $row['dummy3']);
        shuffle($options); // Shuffle the answer options
        foreach ($options as $option) {
            echo "<li><input type='radio' name='answer[" . $row['id'] . "]' value='" . $option . "'>" . $option . "</li>";
        }
        echo "</ul>"; // Close the unordered list for the options
    }
}

if (isset($_POST['submit'])) {
    $answers = $_POST['answer'];
    $score = 0;
    foreach ($answers as $key => $value) {
        // Query the database to fetch the correct answer for the question
        $query = "SELECT answer FROM questions WHERE id='$key'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        // Check if the selected answer is correct
        if ($value == $row['answer']) {
            $score++;
        }
    }

    // Display the score
    $total_questions = 6; // Total number of questions
    $score_percentage = round(($score / $total_questions) * 100); // Calculate the score percentage
    echo "<p class='result'>Score: " . $score . "/" . $total_questions . " (" . $score_percentage . "%)</p>";
}

// Close the database connection
mysqli_close($conn);
?>

<script>
function printQuiz() {
    var quizContainer = document.getElementById("quiz-container");
    var content = quizContainer.innerHTML;
    var css = '<style>' + document.getElementsByTagName('style')[0].innerHTML + '</style>';
    var printWindow = window.open('', '', 'height=500,width=800');
    printWindow.document.write('<html><head><title>Quiz</title>');
    printWindow.document.write(css);
    printWindow.document.write('</head><body>');
    printWindow.document.write(content);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>
