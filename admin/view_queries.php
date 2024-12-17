<!DOCTYPE html>
<html>
<head>
<title>View Queries</title>
<style>
table {
border-collapse: separate;
border-spacing: 0;
width: 100%;
}
th, td {
text-align: left;
padding: 8px;
border-bottom: 1px solid #ddd;
}


tr:first-child {
  background-color: black;
  color: white;
  border-radius: 8px 8px 0 0;
}

tr:first-child th:first-child {
  border-top-left-radius: 25px;
  border-bottom-left-radius: 25px;
}

tr:first-child th:last-child {
  border-top-right-radius: 25px;
  border-bottom-right-radius: 25px;
}

.delete-button, .respond-button {
background-color: maroon;
color: white;
padding: 8px 16px;
border: none;
border-radius: 25px;
cursor: pointer;
margin-right: 4px;
}
.delete-button:hover {
background-color: red;
}
.respond-button:hover {
background-color: #06af00;
}
.respond-button {
background-color: #035500;
}
</style>
<?php 
$active_page = "admin"; // Define the active page variable
include '../navigation-bar/nav.php'; // Include the navigation bar file
?>
</head>
<body>
<h1>Queries</h1>
<table>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Roll No</th>
<th>Query</th>
<th>Action</th>
</tr>
<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quizgen";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the contact table
$sql = "SELECT * FROM contact";
$result = mysqli_query($conn, $sql);

// Display data in a table
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td>" . $row["id"] . "</td>";
echo "<td>" . $row["first_name"] . "</td>";
echo "<td>" . $row["last_name"] . "</td>";
echo "<td>" . $row["email"] . "</td>";
echo "<td>" . $row["roll_no"] . "</td>";
echo "<td>" . $row["query"] . "</td>";
echo "<td><a href='delete_query.php?id=" . $row["id"] . "' class='delete-button' onclick='return confirm(\"Are you sure you want to delete this query?\")'>Delete</a> <a href='mailto:" . $row["email"] . "?subject=Response to your query&body=Hi, this is a response to your query:%0D%0A%0D%0A" . $row["query"] . "' class='respond-button'>Respond</a></td>";
echo "</tr>";
}
} else {
echo "<tr><td colspan='7'>No queries found.</td></tr>";
}

// Close the database connection
mysqli_close($conn);
?>
</table>
</body>
</html>
