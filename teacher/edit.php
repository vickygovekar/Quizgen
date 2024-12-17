<?php 
  $active_page = "teacher"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>

<!DOCTYPE html>
<html>
<head>
  <title>QuizGen - Edit/View Question</title>
  <link rel="stylesheet" type="text/css" href="navbar.css">
  <style>
body {
  background-color: white;
}

#wrapper {
  width: 800px;
  margin: 20px auto;
  background-color: #ffffff;
  box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
  border-radius: 15px;
  padding: 20px;
  font-family: sans-serif;
}

h1 {
  text-align: center;
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 20px;
  color: #000000;
  font-family: sans-serif;
}

table {
  border-collapse: collapse;
  width: 90%;
  margin: 20px auto;
  background-color: white;

}

th,
td {
  text-align: left;
  padding: 12px;
  border-bottom: px solid #ddd;
  font-weight: 500;
  font-family: sans-serif;
}

th:first-child {
  border-top-left-radius: 25px;
  border-bottom-left-radius: 25px;
}

th:last-child {
  border-top-right-radius: 25px;
  border-bottom-right-radius: 25px;
}

th {
  background-color: #000000;
  color: #ffffff;
  text-align: left;
  padding: 12px;
  font-weight: 500;
}

tr:hover {
  background-color: #f5f5f5;
}

select {
  font-size: 16px;
  padding: 5px;
  border-radius: 25px;
  margin-right: 10px;
  color: black !important;
  background-color: white !important; /* Change the background color to white */
}

#filter-form {
  margin: 0 auto;
  max-width: 700px;
  text-align: center;
}

select,
input[type=submit] {
  border-radius: 25px;
  border: none;
  padding: 8px 15px;
  background-color: #555;
  color: white;
  cursor: pointer;
}

select {
  outline: 2px solid #555;
}

input[type=submit]:hover {
  background-color: #777;
}

form {
  background-color: #edf2fc;
  width: 700px;
  height: 50px;
  border-radius: 25px;
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

input[type="submit"] {
  border-radius: 25px;
  padding: 15px 20px;
  font-family: sans-serif;
  font-weight: 500;
  font-size: 16px;
  color: white;
  background-color: #000000;
}

button {
  padding: 8px 15px;
  background-color: #000000;
  color: #ffffff;
  border-radius: 20px;
  text-decoration: none;
  display: inline-block;
  margin: 4px;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #707070;
}

button.delete {
  background-color: maroon;
}

button.delete:hover {
  background-color: red;
}
</style>
<body>
<h1>Questions</h1>
<form id="filter-form" method="get">
  <label for="subject">Subject:</label>
  <select name="subject" id="subject">
    <option value="">All</option>
    <option value="java">Java</option>
    <option value="python">Python</option>
    <option value="php">PHP</option>
  </select>
  <label for="type">Type:</label>
  <select name="type" id="type">
    <option value="">All</option>
    <option value="multiple-choice">Multiple Choice</option>
    <option value="true-false">True/False</option>
    <option value="short-answer">Short Answer</option>
  </select>
  <input type="submit" value="Filter">
</form>
<table>
  <tr>
    <th>ID</th>
    <th>Subject</th>
    <th>Type</th>
    <th>Question</th>
    <th>Answer</th>
    <th>Dummy 1</th>
    <th>Dummy 2</th>
    <th>Dummy 3</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php
  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "quizgen");
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Initialize variables
  $where = "";
  $subject = "";
  $type = "";

  // Check if filter was submitted
  if (isset($_GET['subject']) || isset($_GET['type'])) {
    // Filter by subject
    if (!empty($_GET['subject'])) {
      $subject = mysqli_real_escape_string($conn, $_GET['subject']);
      $where .= " WHERE subject='$subject'";
    }
    // Filter by type
    if (!empty($_GET['type'])) {
      $type = mysqli_real_escape_string($conn, $_GET['type']);
      if (!empty($where)) {
        $where .= " AND type='$type'";
      } else {
        $where .= " WHERE type='$type'";
      }
    }
  }

  // Query the database for questions
  $sql = "SELECT * FROM questions" . $where;
  $result = mysqli_query($conn, $sql);

  // Display each question in a table row
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["subject"] . "</td>";
    echo "<td>" . $row["type"] . "</td>";
    echo "<td>" . $row["question"] . "</td>";
    echo "<td>" . $row["answer"] . "</td>";
    echo "<td>" . $row["dummy1"] . "</td>";
    echo "<td>" . $row["dummy2"] . "</td>";
    echo "<td>" . $row["dummy3"] . "</td>";
    echo "<td><button onclick='editQuestion(" . $row["id"] . ")'>Edit</button></td>";
    echo "<td><button onclick='deleteQuestion(" . $row["id"] . ")' class='delete'>Delete</button></td>";
    echo "</tr>";
  }

  // Close the database connection
  mysqli_close($conn);
  ?>
</table>

<script>
  function editQuestion(id) {
    window.location.href = "edit_question.php?id=" + id;
  }

  function deleteQuestion(id) {
    if (confirm("Are you sure you want to delete this question?")) {
      window.location.href = "delete_question.php?id=" + id;
    }
  }
</script>

</body>
</html>
