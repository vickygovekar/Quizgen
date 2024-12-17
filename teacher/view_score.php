<?php 
  $active_page = "teacher"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../graphics/logo-icon.ico" type="image/ico">
  <title>Marksheet Table</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
      box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
    }

    th, td {
      text-align: center;
      padding: 8px;
      border: 1px solid #dddddd;
    }

    th {
      color: #ffffff;
      background-color: #333333;
      position: sticky;
      top: 0;
      z-index: 1;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .container {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .filter-box {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .filter-box label {
      margin-right: 10px;
    }

    .filter-box select {
      padding: 5px;
      border-radius: 25px;
      border: 1px solid black;
    }

    .vertical {
      writing-mode: vertical-rl;
      transform: rotate(180deg);
      text-align: center;
      padding: 0;
      height: 80px;
      width: 20px;
      border: none;
    }

    .thin {
      width: 30px;
    }

    th.id {
      width: 10px;
    }

   .name {
      width: 150px;
    }

    th.subject {
      width: 50px;
    }

    th.score {
      width: 30px;
    }
  </style>
</head>
<body>
  <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quizgen";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Get the selected batch from the filter box
    if (isset($_POST['batch'])) {
      $batch = $_POST['batch'];
    } else {
      $batch = '2020CE'; // Default batch
    }

    // Get the list of roll numbers for the selected batch
    $roll_numbers_query = "SELECT roll_number FROM users WHERE batch = '$batch' ORDER BY roll_number ASC";
    $roll_numbers_result = mysqli_query($conn, $roll_numbers_query);

    // Get the list of tests for the selected batch
    $tests_query = "SELECT * FROM tests WHERE batch = '$batch'";
    $tests_result = mysqli_query($conn, $tests_query);

    // Create the marksheet table
    echo '<div class="container">';
    echo '<h1>Marksheet Table</h1>';
    echo '<div class="filter-box">';
    echo '<label for="batch">Select Batch:</label>';
    echo '<form method="post">';
    echo '<select name="batch" id="batch" onchange="this.form.submit()">';
    echo '<option value="2020CE" ' . (($batch == '2020CE') ? 'selected' : '') . '>2020CE</option>';
    echo '<option value="2020MH" ' . (($batch == '2020MH') ? 'selected' : '') . '>2020MH</option>';
    echo '</select>';
    echo '</form>';
    echo '</div>';
    echo '<table>';
    echo '<tr>';
 echo '<th class="thin id">ID</th>';
    echo '<th class="thin name">Name</th>';
    echo '<th class="thin subject">Subject</th>';
    while ($roll_number_row = mysqli_fetch_assoc($roll_numbers_result)) {
      echo '<th class="vertical">' . $roll_number_row['roll_number'] . '</th>';
    }
    echo '</tr>';
    while ($test_row = mysqli_fetch_assoc($tests_result)) {
      echo '<tr>';
      echo '<td>' . $test_row['test_id'] . '</td>';
      echo '<td>' . $test_row['name'] . '</td>';
      echo '<td>' . $test_row['subject'] . '</td>';
      $test_id = $test_row['test_id'];
      $roll_numbers_query = "SELECT roll_number FROM users WHERE batch = '$batch' ORDER BY roll_number ASC";
      $roll_numbers_result2 = mysqli_query($conn, $roll_numbers_query);
      while ($roll_number_row = mysqli_fetch_assoc($roll_numbers_result2)) {
        $roll_number = $roll_number_row['roll_number'];
        $score_query = "SELECT * FROM scores WHERE test_id = '$test_id' AND user_id IN (SELECT ID FROM users WHERE roll_number = '$roll_number')";
        $score_result = mysqli_query($conn, $score_query);
        if (mysqli_num_rows($score_result) > 0) {
          $score_row = mysqli_fetch_assoc($score_result);
          $percentage = round(($score_row['score'] / $test_row['number_of_questions']) * 100, 2);
          echo '<td>' . $percentage . '%</td>';
        } else {
          echo '<td>N/A</td>';
        }
      }
      echo '</tr>';
      mysqli_data_seek($roll_numbers_result2, 0); // Reset the roll numbers result pointer
    }
    echo '</table>';
    echo '</div>';

    // Close the database connection
    mysqli_close($conn);
  ?>
</body>
</html>