<!DOCTYPE html>
<html>
<head>
<title>Quiz Form</title>
</head>
<body>
<h1>Quiz Form</h1>
<form action="quiz.php" method="post">
<label for="num_questions">Number of Questions:</label>
<select id="num_questions" name="num_questions">
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option="20">20</option>
</select>
<br><br>
<label for="subject">Subject:</label>
<select id="subject" name="subject">
<option value="php">PHP</option>
<option value="java">Java</option>
<option value="python">Python</option>
<option value="mech1">Mech1</option>
<option value="mech2">Mech2</option>
<option value="mech3">Mech3</option>
</select>
<br><br>
<input type="submit" value="Start Quiz">
</form>
</body>
</html>
