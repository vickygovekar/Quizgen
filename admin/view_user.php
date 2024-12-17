<!DOCTYPE html>
<html>
<head>
  <title>QuizGen - View Users</title>
  <style>
table {
  border-collapse: collapse;
  width: 100%;
  table-layout: fixed;
  margin-top: 20px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
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
  
/* Adjust the width of the ID column */
th:first-child,
td:first-child {
  width: 1.5%;
}

/* Adjust the width of columns */

/* username */
th:nth-child(2),
td:nth-child(2) {
  width: 5%;
}
/* name */
th:nth-child(3),
td:nth-child(3) {
  width: 5%;
}
/* sname */
th:nth-child(4),
td:nth-child(4) {
  width: 5%;
}
/* rollno */
th:nth-child(5),
td:nth-child(5) {
  width: 6%;
}
/* role */
th:nth-child(6),
td:nth-child(6) {
  width: 5%;
}
/* phone */
th:nth-child(7),
td:nth-child(7) {
  width: 5%;
}
/* email */
th:nth-child(8),
td:nth-child(8) {
  width: 15%;
}
/* DOB */
th:nth-child(9),
td:nth-child(9) {
  width: 8%;
}
/* edit */
th:nth-child(10),
td:nth-child(10) {
  width: 5%;
}
/* delete */
th:nth-child(11),
td:nth-child(11) {
  width: 5%;
}

    select, input[type="submit"] {
      font-size: 16px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-right: 10px;
      color: #000000;
      background-color: #edf2fc;
      cursor: pointer;
    }
    #filter-form {
      margin: 40px auto 20px;
      width: 700px;
      height: 35px;
      border-radius: 25px;
      padding: 20px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      background-color: #edf2fc;
      text-align: center;
    }
    #filter-form select, #filter-form input[type="submit"] {
      font-size: 16px;
      padding: 5px;
      border: 2px solid #ccc;
      border-radius: 25px;
      margin-right: 10px;
      color: #000000;
      background-color: #edf2fc;
      cursor: pointer;
    }
    #filter-form input[type="submit"] {
      background-color: black;
      color: #ffffff;
      border-radius: 25px;
      border: none;
      padding: 8px 15px;
    }
    #filter-form input[type="submit"]:hover {
      background-color: #777;
    }
    label {
      display: inline-block;
      margin-bottom: 20px;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: 500;
      font-size: 16px;
    }
    #filter-form label,
    #filter-form select {
      display: inline-block;
      margin-right: 10px;
      margin-bottom: 20px;
    }
    .edit-button, .delete-button {
      border-radius: 25px;
      border: none;
      padding: 8px 15px;
      background-color: #555;
      color: #ffffff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .edit-button:hover, .delete-button:hover {
      background-color: #777;
    }
    .edit-button {
      margin-right: 10px;
    }
    .delete-button {
      margin-right: 10px;
      background-color: #ff0000;
    }
  </style>
</head>
<?php  $active_page = "admin"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file?>
<body>
  <form id="filter-form" action="" method="get" style="text-align: center;">
    <label for="role">Filter by Role:</label>
    <select id="role" name="role">
      <option value="">All</option>
      <option value="teacher">Teacher</option>
      <option value="student">Student</option>
      <option value="admin">Admin</option>
    </select>
    <input type="submit" value="Filter">
  </form>

  <?php
  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "quizgen");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Set default values for the filters
  $roleFilter = "";

  // Check if role filter was selected
  if (isset($_GET["role"]) && !empty($_GET["role"])) {
    $roleFilter = "WHERE role='" . $_GET["role"] . "'";
  }

  // Define the SQL query
  $sql = "SELECT id, username, name, s_name, roll_number, role, phone, email_id, dob FROM users " . $roleFilter;

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Check if any rows were returned
  if (mysqli_num_rows($result) > 0) {
    // Display the table headers
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>Name</th><th>Surname</th><th>Roll Number</th><th>Role</th><th>Phone</th><th>Email ID</th><th>Date of Birth</th><th>Edit</th><th>Delete</th></tr>";

    // Loop through each row of the result set and display the data in the table
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["id"] . "</td>";
      echo "<td>" . $row["username"] . "</td>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["s_name"] . "</td>";
      echo "<td>" . $row["roll_number"] . "</td>";
      echo "<td>" . $row["role"] . "</td>";
      echo "<td>" . $row["phone"] . "</td>";
      echo "<td>" . $row["email_id"] . "</td>";
      echo "<td>" . $row["dob"] . "</td>";
      echo "<td><a href=\"edit_user.php?id=" . $row["id"] . "\"><button class=\"edit-button\">Edit</button></a></td>";
      echo "<td><a href=\"javascript:confirmDelete(" . $row["id"] . ")\"><button class=\"delete-button\">Delete</button></a></td>";
      echo "</tr>";
    }

    // Close the table
    echo "</table>";
  } else {
    echo "No users found.";
  }

  // Close the database connection
  mysqli_close($conn);
  ?>

  <script>
    function confirmDelete(id) {
      if (confirm("Are you sure you want to delete this user?")) {
        const deleteUrl = new URL(window.location.origin + "/QuizGen/admin/delete_user.php");
        deleteUrl.searchParams.append("id", id);
        window.location.href = deleteUrl.toString();
      }
    }
  </script>
</body>
</html>