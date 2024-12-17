

<!DOCTYPE html>
<html>
<head>
<title>Edit Question</title>
<?php 
$active_page = "teacher"; // Define the active page variable
include '../navigation-bar/nav.php'; // Include the navigation bar file
?>
<style>
body {
  background-color: #fff;
  font-family: sans-serif;
  padding: 20px;
}
h1 {
  color: #555;
  text-align: center;
  margin-bottom: 30px;
}
form {
  background-color: #edf2fc;
  padding: 20px;
  border-radius: 25px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
  max-width: 800px;
  margin: 20px auto 0; /* Add 20px margin to the top */
  margin-top: 80px; /* Add margin to the top to create space between the navigation bar and the form */
}

label {
  display: block;
  margin-bottom: 10px;
  color: #555;
}
input[type=text] {
  border-radius: 25px;
  padding: 10px;
  border: none;
  margin-bottom: 10px;
  width: 100%;
  padding-right: 20px;
  box-sizing: border-box; /* Add the box-sizing property */}

input[type=submit] {
  background-color: #555;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 25px;
  cursor: pointer;
  margin-right: 10px;
}
input[type=submit]:hover {
  background-color: #333;
}
a {
  color: #555;
  text-decoration: none;
  padding-bottom: 2px;
  margin-right: 10px;
}
a:hover {
      background-color: #bbb;

}
.button-container {
  display: flex;
  align-items: center;
  margin-top: 20px;
  justify-content: flex-start;
}
.cancel-button {
  background-color: #ccc;
  color: #555;
  padding: 10px 20px;
  border: none;
  border-radius: 25px;
  cursor: pointer;
}
.cancel-button:hover {
  background-color: #bbb;
}
</style>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h1>Edit Question</h1>
<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "quizgen");

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Get the form data
$id = $_POST["id"];
$subject = $_POST["subject"];
$type = $_POST["type"];
$answer = $_["answer"];
$dummy1 = $_POST["dummy1"];
$dummy2 = $_POST["dummy2"];
$dummy3 = $_POST["dummy3"];

// the question in the database
$sql = "UPDATE questions SET subject='$subject', type='$type', answer='$answer', dummy1='$dummy1', dummy2='$dummy2', dummy3='$dummy3' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
echo "Question updated successfully";
} else {
echo "Error updating question: " . mysqli_error($conn);
}
}

// Get the ID of the question to edit from the URL parameter
$id = $_GET["id"];

// Query the database for the question with the given ID
$sql = "SELECT * FROM questions WHERE id = " . $id;
$result = mysqli_query($conn, $sql);

// Get the question data from the result
$row = mysqli_fetch_assoc($result);
?>
<label for="subject">Subject:</label>
<input type="text" name="subject" value="<?php echo $row['subject']; ?>"><br>
<label for="type">Type:</label>
<input type="text" name="type" value="<?php echo $row['type']; ?>"><br>
<label for="answer">Answer:</label>
<input type="text" name="answer" value="<?php echo $row['answer']; ?>"><br>
<label for="dummy1">Dummy 1:</label>
<input type="text" name="dummy1" value="<?php echo $row['dummy1']; ?>"><br>
<label for="dummy2">Dummy 2:</label>
<input type="text" name="dummy2" value="<?php echo $row['dummy2']; ?>"><br>
<label for="dummy3">Dummy 3:</label>
<input type="text" name="dummy3" value="<?php echo $row['dummy3']; ?>"><br>
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<div class="button-container">
<input type="submit" value="Save">
<a href="edit.php" class="cancel-button">Cancel</a>
</div>
</form>
</body>
</html>
