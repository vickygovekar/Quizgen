<!DOCTYPE html>
<html>
<head>
<?php 
  $active_page = "teacher"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>
<link rel="icon" href="../graphics/logo-icon.ico" type="image/ico">

<title>QuizGen - View Tests</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
table {
border-collapse: collapse;
width: 100%;
}

th, td {
text-align: left;
padding: 8px;
border-bottom: 1px solid #ddd;
}

tr:hover {
background-color: #f5f5f5;
}

input[type=text], select {
padding: 6px;
border: 1px solid #ccc;
border-radius: 25px;
box-sizing: border-box;
}

input[type=submit] {
background-color: #4CAF50;
color: white;
padding: 8px 16px;
border: none;
border-radius: 25px;
cursor: pointer;
}

input[type=submit]:hover {
background-color: #45a049;
}

.delete-button {
		background-color: maroon;
		color: white;
		padding: 8px 16px;
		border: none;
		border-radius: 25px;
		cursor: pointer;
	}

	.delete-button:hover {
		background-color: red;
	}

</style>
</head>
<body>
<h1>Tests</h1>
<form method="get">
<label for="course">Course:</label>
<select id="course" name="course" onchange="updateSubjects()">
<option value="">Select Course</option>
<option value="2020CE">2020CE</option>
<option value="2020MH">2020MH</option>
</select>
<label for="subject">Subject:</label>
<select id="subject" name="subject">
<option value="">All</option>
</select>
<input type="submit" value="Filter">
</form>
<br>
<table>
<thead>
<tr>
<th>Test ID</th>
<th>Name</th>
<th>Subject</th>
<th>Number of Questions</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
// Connect to the database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'quizgen';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
die('Could not connect: ' . mysqli_error());
}

// Prepare the SQL statement
$sql = 'SELECT * FROM tests';
if (isset($_GET['subject']) && $_GET['subject'] != '') {
$subject = mysqli_real_escape_string($conn, $_GET['subject']);
$sql .= " WHERE subject='$subject'";
}
$result = mysqli_query($conn, $sql);

// Display the results
while ($row = mysqli_fetch_assoc($result)) {
echo '<tr>';
echo '<td>' . $row['test_id'] . '</td>';
echo '<td>' . $row['name'] . '</td>';
echo '<td>' . $row['subject'] . '</td>';
echo '<td>' . $row['number_of_questions'] . '</td>';
echo '<td><button class="delete-button" onclick="confirmDelete(' . $row['test_id'] . ')">Delete</button></td>';
echo '</tr>';
}

// Close the database connection
mysqli_close($conn);
?>
</tbody>
</table>
<script>
function updateSubjects() {
var course = document.getElementById("course").value;
var subjectDropdown = document.getElementById("subject");
subjectDropdown.innerHTML = "";
if (course === "2020CE") {
var javaOption = document.createElement("option");
javaOption.text = "Java";
subjectDropdown.add(javaOption);
var phpOption = document.createElement("option");
phpOption.text = "PHP";
subjectDropdown.add(phpOption);
var pythonOption = document.createElement("option");
pythonOption.text = "Python";
subjectDropdown.add(pythonOption);
} else if (course === "2020MH") {
var mech1Option = document.createElement("option");
mech1Option.text = "Mech1";
subjectDropdown.add(mech1Option);
var mech2Option = document.createElement("option");
mech2Option.text = "Mech2";
subjectDropdown.add(mech2Option);
var mech3Option = document.createElement("option");
mech3Option.text = "Mech3";
subjectDropdown.add(mech3Option);
}
}

function confirmDelete(testId) {
if (confirm("Are you sure you want to delete this test?")) {
deleteTest(testId);
}
}

function deleteTest(testId) {
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
location.reload(); // Refresh the page after deletion
}
};
xhttp.open("GET", "delete-test.php?test_id=" + testId, true);
xhttp.send();
}
</script>
</body>
</html>
