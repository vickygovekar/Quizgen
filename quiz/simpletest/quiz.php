<!DOCTYPE html>
<html>
<head>
    <title>QuizGen - Quick test</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .subject-container {
            background-color: #edf2fc;
            padding: 20px;
            border-radius: 25px;
			box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
            width: 800px;
        }

        .quiz-container {
            background-color: white;
            padding: 20px;
            border-radius: 25px;
			box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            width: 600px;
            margin-top: 20px;
            width: 60%;
        }

        label {
            font-size: 16px;
        }

        select, input[type="number"], input[type="submit"] {
            font-size: 16px;
            padding: 5px;
            border-radius: 25px;
            border: 1px;
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: grey;
        }

        p {
            font-size: 18px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        ul {
            list-style: none;
            margin-top: 0;
            margin-bottom: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .subject-container {
            text-align: center;
        }


        .quiz-container h2 {
            margin-top: 0;
        }

        .quiz-container ul {
            list-style-type: none;
            padding: 0;
        }

        .quiz-container li {
            margin: 10px 0;
        }
        
        .options{
            display:flex;
            flex-wrap:wrap;
            justify-content: space-between;
            background-color: #f2f2f2;
            border: 2px solid #ccc;
            border-radius: 25px;
            padding: 20px;
            width: 40%;
        }

        input[type="submit"] {
            font-size: 16px;
            padding: 5px;
            border-radius: 25px;
            border: 1px;
            margin-right: 10px;
            color: #fff;
            background-color: #000;
        }

    </style>
<body>


<div style="display:flex; justify-content:center; align-items:center;">
  <a href="../quiz.php" style="display:flex; align-items:center; text-decoration:none;">
    <img src="https://i.postimg.cc/sDMgBwRV/logo-text-linear.png" alt="Logo" style="height:50px;">
    <button style="margin-left:10px; padding:8px 12px; background-color:black; color:#fff; border:none; font-family: sans-serif; border-radius:25px;">Back to Quiz</button>
  </a>
</div>





    <h1>Quiz Generator</h1>
    <div class="container">
        <div class="subject-container">
            <form method="POST" action="quiz.php">
                <label for="subject">Select a subject:</label>
                <select name="subject" id="subject">
                    <option value="java">Java</option>
                    <option value="python">Python</option>
                    <option value="php">PHP</option>
                </select>
                <label for="num-questions">Number of questions:</label>
                <input type="number" name="num-questions" id="num-questions" min="1" max="50" value="20">
                <input type="submit" name="generate" value="Generate">
            </form>
        </div>
        <div class="quiz-container">
        <?php
            // Check if the Generate button is clicked and a subject is selected
            if (isset($_POST['generate']) && !empty($_POST['subject'])) {
                $subject = $_POST['subject'];
                $num_questions = $_POST['num-questions'];

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

                // Query the database to fetch the requested number of random multiple-choice questions and options for the selected subject
                $query = "SELECT * FROM questions WHERE type='multiple-choice' AND subject='$subject' ORDER BY RAND() LIMIT $num_questions";
                $result = mysqli_query($conn, $query);

                // Display the multiple-choice questions and options
                echo "<h2>Multiple Choice Questions:</h2>";
                echo "<form method='POST' action='result.php'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<p>" . $row['question'] . "</p>"; // Display the question
                    echo "<ul>"; // Display the options in an unordered list
                    $options = array($row['answer'], $row['dummy1'], $row['dummy2'], $row['dummy3']);
                    shuffle($options); // Shuffle the answer options
                    foreach ($options as $option) {
                        echo "<li><input type='radio' name='answer[" . $row['id'] . "]' value='" . $option . "'>" . $option . "</li>";
                    }
                    echo "</ul>";
                }
                echo "<input type='hidden' name='subject' value='" . $subject . "'>";
                echo "<input type='submit' name='submit' value='Submit'>";
                echo "</form>";
            }
        ?>
        </div>
    </div>
</body>
</html>
