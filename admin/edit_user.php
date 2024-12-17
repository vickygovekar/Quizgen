<!DOCTYPE html>
<html>
<head>
  <title>QuizGen - Edit User</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #edf2fc;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
      border-radius: 25px;
    }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: 500;
      font-size: 16px;
    }
    input[type="text"], select {
      font-size: 16px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 25px;
      margin-bottom: 20px;
      width: 100%;
    }
    input[type="submit"] {
      font-size: 16px;
      padding: 8px 30px;
      border: none;
      border-radius: 25px;
      background-color: black;
      color: #ffffff;
      cursor: pointer;
      float: left;
      margin-right: 10px;
    }
    input[type="submit"]:hover {
      background-color: #777;
    }
    .back-button {
  font-size: 16px;
  padding: 8px 30px;
  border: none;
  border-radius: 25px;
  background-color: black;
  color: #ffffff;
  cursor: pointer;
  transition: 0.3s ease;
  float: right;
  margin-top: -34px;
  margin-right: 485px;
}

@media only screen and (max-width: 768px) {
  .back-button {
    float: none;
    margin: 10px auto 0;
    display: block;
  }
}
    .back-button:hover {
      background-color: #777;
    }
    .success-box {
      margin-bottom: 35px;
      padding: 10px;
      background-color: #d4edda;
      border: 1px solid #c3e6cb;
      border-radius: 25px;
      color: #155724;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "quizgen");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get the form data
      $id = $_POST["id"];
      $username = $_POST["username"];
      $name = $_POST["name"];
      $s_name = $_POST["s_name"];
      $roll_number = $_POST["roll_number"];
      $role = $_POST["role"];
      $phone = $_POST["phone"];
      $email_id = $_POST["email_id"];
      $dob = $_POST["dob"];

      // Update the user in the database
      $sql = "UPDATE users SET username='$username', name='$name', s_name='$s_name', roll_number='$roll_number', role='$role', phone='$phone', email_id='$email_id', dob='$dob' WHERE id=$id";

      if (mysqli_query($conn, $sql)) {
        echo "<div class=\"success-box\">User updated successfully.</div>";
      } else {
        echo "<p>Error updating user: " . mysqli_error($conn) . "</p>";
      }
    }

    // Get the user ID from the URL parameter
    $id = $_GET["id"];

    // Define the SQL query
    $sql = "SELECT id, username, name, s_name, roll_number, role, phone, email_id, dob FROM users WHERE id=$id";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
      // Get the user data
      $row = mysqli_fetch_assoc($result);
      $username = $row["username"];
      $name = $row["name"];
      $s_name = $row["s_name"];
      $roll_number = $row["roll_number"];
      $role = $row["role"];
      $phone = $row["phone"];
      $email_id = $row["email_id"];
      $dob = $row["dob"];

      // Display the edit form
      echo "<form method=\"post\">";
      echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
      echo "<label for=\"username\">Username:</label>";
      echo "<input type=\"text\" id=\"username\" name=\"username\" value=\"$username\">";
      echo "<label for=\"name\">Name:</label>";
      echo "<input type=\"text\" id=\"name\" name=\"name\" value=\"$name\">";
      echo "<label for=\"s_name\">Surname:</label>";
      echo "<input type=\"text\" id=\"s_name\" name=\"s_name\" value=\"$s_name\">";
      echo "<label for=\"roll_number\">Roll Number:</label>";
      echo "<input type=\"text\" id=\"roll_number\" name=\"roll_number\" value=\"$roll_number\">";
      echo "<label for=\"role\">Role:</label>";
      echo "<select id=\"role\" name=\"role\">";
      echo "<option value=\"teacher\"" . ($role == "teacher" ? " selected" : "") . ">Teacher</option>";
      echo "<option value=\"student\"" . ($role == "student" ? " selected" : "") . ">Student</option>";
      echo "<option value=\"admin\"" . ($role == "admin" ? " selected" : "") . ">Admin</option>";
      echo "</select>";
      echo "<label for=\"phone\">Phone:</label>";
      echo "<input type=\"text\" id=\"phone\" name=\"phone\" value=\"$phone\">";
      echo "<label for=\"email_id\">Email ID:</label>";
      echo "<input type=\"text\" id=\"email_id\" name=\"email_id\" value=\"$email_id\">";
      echo "<label for=\"dob\">Date of Birth:</label>";
      echo "<input type=\"text\" id=\"dob\" name=\"dob\" value=\"$dob\">";
      echo "<div style=\"overflow: auto;\">";
      echo "<input type=\"submit\" value=\"Save\">";
      echo "</div>";
      echo "</form>";
    } else {
      echo "<p>User not found.</p>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    <button class="back-button" onclick="window.location.href='view_user.php'">Back to View Users</button>
  </div>
</body>
</html>