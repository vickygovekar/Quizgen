<!DOCTYPE html>
<html>
<head>
  <title>View Questions</title>
  <link rel="stylesheet" type="text/css" href="navbar.css">
  <style>
table {
  border-collapse: collapse;
  width: 800px;
  margin-top: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  border-radius: 25px;
}

    h1 {
  font-family: sans-serif;
  border-radius: 25px;

}

    th, td {
      text-align: left;
      padding: 12px;
      border-bottom: 1px solid #ddd;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: 500;
    }

    th {
      background-color: #000000;
      color: #ffffff;
    }

select {
  font-size: 16px;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-right: 10px;
  color: #000000;
}


    #filter-form {
      margin-bottom: 20px;
    }

    select, input[type=submit] {
      border-radius: 15px;
      border: none;
      padding: 8px 15px;
      background-color: #555;
      color: #ffffff;
      cursor: pointer;
    }

    select {
      margin-right: 10px;
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
      boxm-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    input[type="submit"] {
      border-radius: 25px;
      padding: 15px 20px;
      font-family: sans-serif;
      font-weight: 500;
      font-size: 16px;
      color: white;
      background-color: #000000;
      border: none;
      cursor: pointer;
      transition: 0.3s ease;
}


    select {
      border-radius: 25px;
      padding: 15px 20px;
      font-family: sans-serif;
      font-weight: 500;
      font-size: 16px;
      color: black;
      background-color: #000000;
      border: none;
      cursor: pointer;
      transition: 0.3s ease;
      background-color 
    }

    select {
      display: block;
      margin-bottom: 20px;
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      background: url('../graphics/dropdown-arrow.png') no-repeat center right;
      background-size: 20px;
      padding-right: 30px;
    }

    input[type="submit"]:hover {
      background-color: #555555;
    }

    label {
      display: inline-block;
      margin-bottom: 20px;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: 500;
      font-size: 16px;
    }

    #filter-form label, #filter-form select {
    display: inline-block;
    margin-right: 10px;
    margin-bottom: 20px;
  }

  </style>
</head>
<body>

<?php 
  $active_page = ""; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>

  <br>
  <center>
    <h1>All Questions</h1>
    <form id="filter-form" method="GET">
  <label for="subject-filter">Subject:</label>
  <select name="subject" id="subject-filter">
    <option value="">All</option>
    <option value="python">Python</option>
    <option value="java">Java</option>
    <option value="php">PHP</option>
  </select>
  <label for="type-filter">Type:</label>
  <select name="type" id="type-filter">
  <option value="">All</option>
  <option value="multiple-choice">Multiple Choice</option>
  <option value="true-false">True/False</option>
  <option value="short-answer">Short Answer</option>
</select>
  <input type="submit" value="Filter">
</form>
    <?php
      // Connect to the database
      $host = "localhost";
      $username = "root";
      $password = "";
      $dbname = "quizgen";
      $conn = mysqli_connect($host, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
// Set default values for the filters
$subjectFilter = "";
$typeFilter = "";

// Define the SQL query
$sql = "SELECT * FROM questions";

// Check if subject filter was selected
if (isset($_GET["subject"]) && !empty($_GET["subject"])) {
  $subjectFilter = "WHERE subject='" . $_GET["subject"] . "'";
  $sql .= " $subjectFilter";
}

// Check if type filter was selected
if (isset($_GET['type']) && !empty($_GET['type'])) {
  $type = $_GET['type'];
  if ($subjectFilter != "") {
    $typeFilter = " AND type='" . $type . "'";
  } else {
    $typeFilter = "WHERE type='" . $type . "'";
  }
  $sql .= " $typeFilter";
}

// Retrieve questions from the database based on filters
$result = mysqli_query($conn, $sql);

// Display the questions in a table
if (mysqli_num_rows($result) > 0) {
  echo "<table>";
  echo "<tr><th>ID</th><th>Subject</th><th>Type</th><th>Question</th><th>Answer</th><th>Dummy 1</th><th>Dummy 2</th><th>Dummy 3</th></tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["subject"] . "</td><td>" . $row["type"] . "</td><td>" . $row["question"] . "</td><td>" . $row["answer"] . "</td><td>" . $row["dummy1"] . "</td><td>" . $row["dummy2"] . "</td><td>" . $row["dummy3"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No questions found";
}

// Close the database connection
mysqli_close($conn);
?>
