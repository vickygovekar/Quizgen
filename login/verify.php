<?php
session_start();

// Get the submitted login credentials
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to the database
$db = new mysqli('localhost', 'root', '', 'quizgen');

// Check for errors
if ($db->connect_errno) {
    die("Failed to connect to the database: " . $db->connect_error);
}

// Prepare the query
$stmt = $db->prepare("SELECT id, role, name, profile, theme, batch FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

// Check if the login was successful
$stmt->store_result();
if ($stmt->num_rows == 1) {
    // Get the user's ID, role, name, profile, and batch
    $stmt->bind_result($id, $role, $name, $profile,$theme, $batch);
    $stmt->fetch();

    // Set the session variables for the logged in user
    $_SESSION['user_id'] = $id;
    $_SESSION['user_role'] = $role;
    $_SESSION['name'] = $name;
    $_SESSION['profile'] = $profile;
    $_SESSION['theme'] = $theme;
    $_SESSION['batch'] = $batch; // Store the batch in the session

    // Redirect to the home page
    header("Location: ../common/home.php");
    exit();
} else {
    // Login failed, show an error message
    echo "Invalid login credentials.";
}

// Clean up
$stmt->close();
$db->close();
?>