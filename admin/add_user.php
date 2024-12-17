<!DOCTYPE html>
<html>
<head>
<title>Add Data</title>
<style>
body {
font-family: sans-serif;
margin: 0padding: 0;
}
form {
display: flex;
flex-direction: column;
align-items: center;
background-color: #f2f2f2;
padding: 20px;
border-radius: 25px;
box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
width: 50%;
margin: 50px auto 50px;
}
h1 {
text-align: center;
margin-top:20px;
: 10px;
font-family: sans-serif;
color: #4CAF50;
}
label {
margin-bottom: 0px;
margin-top: 2px;
font-weight: bold;
font-family: sans-serif;
}
input[type="text"], input[type="password"], input[type="date"], select {
padding: 10px;
border-radius: 25px;
border: none;
margin: 20px;
width: 100%;
box-sizing: border-boxfont-family: sans-serif;
}
input[type="submit"] {
margin-top: 20px;
background-color: black;
color: white;
padding: 10px 20px;
border: none;
border-radius: 25px;
cursor: pointer;
font-size: 16px;
transition: background-color 0.3s ease;
font-family: sans-serif;
}
input[type="submit"]:hover {
background-color: grey;
}
.success {
background-color: #d4edda;
color: #155724;
border: 1px solid #c3e6cb;
padding: 10px;
margin-top: 20px;
border-radius: 25px;
text-align: center;
font-family: sans-serif;
}
</style>
</head>
<?php 
  $active_page = "admin"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>
<body>
<form method="post" autocomplete="off">
<h1>Add User</h1>
<label for="username">Username:</label>
<input type="text" name="username" id="username" required value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"><br>

<label for="name">Name:</label>
<input type="text" name="name" id="name" required value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"><br>

<label for="s_name">Surname:</label>
<input type="text" name="s_name" id="s_name" required value="<?php echo isset($_POST['s_name']) ? $_POST['s_name'] : ''; ?>"><br>

<label for="roll_number">Roll Number:</label>
<input type="text" name="roll_number" id="roll_number" required maxlength="6" value="<?php echo isset($_POST['roll_number']) ? $_POST['roll_number'] : ''; ?>"><br>


<label for="role">Role:</label>
<select name="role" id="role" required>
<option value="">Select Role</option>
<option value="teacher" <?php if(isset($_POST['role']) && $_POST['role'] == 'teacher') echo 'selected'; ?>>Teacher</option>
<option value="admin" <?php if(isset($_POST['role']) && $_POST['role'] == 'admin') echo 'selected'; ?>>Admin</option>
<option value="student" <?php if(isset($_POST['']) && $_POST['role'] == 'student') echo 'selected'; ?>>Student</option>
</select><br>

<label for="phone">Phone:</label>
<input type="text" name="phone" id="phone" required value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>"><br>

<label for="password">Password:</label>
<input type="password" name="password" id="password" required><br>

<label for="password_hint">Password Hint:</label>
<input type="text" name="password_hint" id="password_hint" required value="<?php echo isset($_POST['password_hint']) ? $_POST['password_hint'] : ''; ?>"><br>

<label for="email_id">Email ID:</label>
<input type="text" name="email_id" id="email_id" required value="<?php echo isset($_POST['email_id']) ? $_POST['email_id'] : ''; ?>"><br>

<label for="dob">Date of Birth:</label>
<input type="date" name="dob" id="dob" required value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : ''; ?>"><br>

<label for="profile">Profile:</label>
<input type="text" name="profile" id="profile" required value="<?php echo isset($_POST['profile']) ? $_POST['profile'] : ''; ?>"><br>

<input type="submit" value="Submit">
</form>
<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Get the values from the form
$username = $_POST['username'];
$name = $_POST['name'];
$s_name = $_POST['s_name'];
$roll_number = $_POST['roll_number'];
$role = $_POST['role'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$password_hint = $_POST['password_hint'];
$email_id = $_POST['email_id'];
$dob = $_POST['dob'];
$profile = $_POST['profile'];

// Connect to the database
$servername = "localhost";
$username = "root";
$db_password = "";
$dbname = "quizgen";

$conn = new mysqli($servername, $username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Insert the data into the table
$sql = "INSERT INTO users (username, name, s_name, roll_number, role, phone, password, password_hint, email_id, dob, profile) 
VALUES ('$username', '$name', '$s_name', '$roll_number', '$role', '$phone', '$password', '$password_hint', '$email_id', '$dob', '$profile')";

if ($conn->query($sql) === TRUE) {
echo "<div class='success'>New record created successfully</div>";
// Clear the form
echo "<script>document.getElementById('username').value = ''; document.getElementById('name').value = ''; document.getElementById('s_name').value = ''; document.getElementById('roll_number').value = ''; document.getElementById('role').value = ''; document.getElementById('phone').value = ''; document.getElementById('password').value = ''; document.getElementById('password_hint').value = ''; document.getElementById('email_id').value = ''; document.getElementById('dob').value = ''; document.getElementById('profile').value = '';</script>";
} else {
echo "Error " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
</body>
</html>
