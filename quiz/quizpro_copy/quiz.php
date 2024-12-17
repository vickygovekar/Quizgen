<!DOCTYPE html>
<html>
<head>
<title>MCQ Quiz</title>
<style>
body {
font-family: Arial, sans-serif;
background-color: #f2f2f2;
}

h1 {
text-align: center;
margin-top: 50px;
margin-bottom: 30px;
}

form {
background-color: #fff;
padding: 20px;
border-radius: 10px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
max-width: 600px;
margin: 0 auto;
}

h3 {
margin-top: 0;
}

p {
margin-top: 10px;
margin-bottom: 20px;
}

input[type="radio"] {
margin-right: 10px;
}

input[type="submit"] {
display: block;
margin: 0 auto;
margin-top: 20px;
padding: 10px 20px;
background-color: #4CAF50;
color: #fff;
border: none;
border-radius: 5px;
cursor: pointer;
}

input[type="submit"]:hover {
background-color: #3e8e41;
}

.correct {
background-color: lightgreen;
}

.incorrect {
background-color: red;
}

.explanation {
display: none;
background-color: #fff;
padding: 10px;
border-radius: 5px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
margin: 10px;
}

.next-button {
display: none;
margin-top: 20px;
padding: 10px 20px;
background-color: #4CAF50;
color: #fff;
border: none;
border-radius: 5px;
cursor: pointer;
}

.next-button:hover {
background-color: #3e8e41;
}
</style>
</head>
<body>
<h1>MCQ Quiz</h1>
<?php
// Retrieve selected options from form
$num_questions = $_POST['num_questions'];
$subject = $_POST['subject'];

// Retrieve questions from database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizgen";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM questions WHERE subject='$subject' AND type='multiple-choice' ORDER BY RAND() LIMIT $num_questions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// Display questions
echo '<form action="result.php" method="post">';
$i = 1;
while ($row = $result->fetch_assoc()) {
echo '<div class="question">';
echo '<h3>Question ' . $i . ':</h3>';
echo '<p>' . $row['question'] . '</p>';
echo '<input type="hidden" name="question' . $i . '_id" value="' . $row['id'] . '">';
echo '<input type="radio" name="question' . $i . '_answer" value="1">' . $row['dummy1'] . '<br>';
echo '<input type="radio" name="question' . $i . '_answer" value="2">' . $row['dummy2'] . '<br>';
echo '<input type="radio" name="question' . $i . '_answer" value="3">' . $row['dummy3'] . '<br>';
echo '<input type="radio" name="question' . $i . '_answer" value="4">' . $row['answer'] . '<br>';
echo '<div class="feedback" id="question' . $i . '_feedback"></div>';
echo '<div class="explanation" id="question' . $i . '_explanation">' . $row['explanation'] . '</div>';
echo '<button type="button" class="next-button" id="question' . $i . '_next">Next</button>';
echo '</div>';
$i++;
}
echo '<input type="hidden" name="_questions" value="' . $num_questions . '">';
echo '<input type="hidden" name="subject" value="' . $subject . '">';
echo '<input type="submit" value="Submit Answers">';
echo '</form>';
} else {
echo '<p>No questions found.</p>';
}

$conn->close();
?>
<script>
// Show one question at a time
var questions = document.querySelectorAll('.question');
var currentQuestion = 0;

showQuestion(currentQuestion);

function showQuestion(questionIndex) {
if (questionIndex >= questions.length) {
return;
}

for (var i = 0; i < questions.length; i++) {
questions[i].style.display = 'none';
}

questions[questionIndex].style.display = 'block';

currentQuestion = questionIndex;

var currentRadio = questions[currentQuestion].querySelector('input[type="radio"]:checked');

if (currentRadio) {
currentRadio.checked = false;
}

var feedbackDivs = document.querySelectorAll('[id^="question"] .feedback');

for (var i = 0; i < feedbackDivs.length; i++) {
feedbackDivs[i].style.display = 'none';
}

var explanationDivs = document.querySelectorAll('[id^="question"] .explanation');

for (var i = 0; i < explanationDivs.length; i++) {
explanationDivs[i].style.display = 'none';
}

var nextButtons = document.querySelectorAll('[id^="question"] .next-button');

for (var i = 0; i < nextButtons.length; i++) {
nextButtons[i].style.display = 'none';
}
}

// Highlight selected option and show feedback and explanation after hitting submit
var submitButton = document.querySelector('input[type="submit"]');

submitButton.addEventListener('click', function(event) {
event.preventDefault();

var currentRadio = questions[currentQuestion].querySelector('input[type="radio"]:checked');

if (currentRadio) {
var questionId = currentRadio.name.replace('answer', 'id');
var feedbackDiv = document.getElementById(questionId + '_feedback');
var explanationDiv = document.getElementById(questionId + '_explanation');
var nextButton = document.getElementById(questionId + '_next');

var feedbackDivs = document.querySelectorAll('[id^="question"] .feedback');

for (var i = 0; i < feedbackDivs.length; i++) {
feedbackDivs[i].style.display = 'none';
}

if (currentRadio.value == 4) {
currentRadio.parentNode.classList.add('correct');
feedbackDiv.innerHTML = '<p>Correct!</p>';
nextButton.style.display = 'block';
nextButton.addEventListener('click', function() {
showQuestion(currentQuestion + 1);
});
} else {
currentRadio.parentNode.classList.add('incorrect');
feedbackDiv.innerHTML = '<p>Incorrect. The correct answer is: ' + currentRadio.parentNode.querySelector('input[value="4"]').nextSibling.nodeValue + '</p>';
explanationDiv.style.display = 'block';
nextButton.style.display = 'block';
nextButton.addEventListener('click', function() {
showQuestion(currentQuestion + 1);
});
}

feedbackDiv.style.display = 'block';
submitButton.style.display = 'none';

// Disable submit button after submission
var submitButtons = document.querySelectorAll('input[type="submit"]');

for (var i = 0; i < submitButtons.length; i++) {
submitButtons[i].disabled = true;
}
}
});
</script>
</body>
</html>
