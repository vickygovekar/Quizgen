<!DOCTYPE html>
<html>
<head>
    <title>QuizGen - Quick test result</title>
    <style>
        .container {
            padding: 20px;
            margin: 20px auto;
            border-radius: 25px;
            max-width: 600px;
            background-color: #edf2fc;
			box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Quiz Result</h1>
        <?php
            // Check if the answers are submitted and not empty
            if (isset($_POST['answer']) && !empty($_POST['answer'])) {
                $subject = $_POST['subject'];
                $answers = $_POST['answer'];
                $score = 0;
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

            // Query the database to fetch the correct answers for the selected subject
            $query = "SELECT * FROM questions WHERE subject='$subject'";
            $result = mysqli_query($conn, $query);
            $correct_answers = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $correct_answers[$row['id']] = $row['answer'];
            }

            // Calculate the score
            foreach ($answers as $id => $answer) {
                if ($answer == $correct_answers[$id]) {
                    $score++;
                }
            }

            // Display the score
            echo "<p>Your score is: " . $score . "</p>";
        } else {
            // Redirect to the index page if the answers are not submitted
            header("Location: quiz.php");
            exit();
        }
    ?>
</div>
<CENTER><button onclick="history.go(-1)">Go Back</button></center>

</body>
</html>