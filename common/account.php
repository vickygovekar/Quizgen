<?php
    // Check if session is not already active
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to login page
        header("Location: login.php");
        exit();
    }

    // Database credentials
    $db_host = "localhost";
    $db_name = "quizgen";
    $db_user = "root";
    $db_pass = "";

    // Establish database connection
    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
    }

    // Retrieve user ID from session
    $user_id = $_SESSION['user_id'];

    // Retrieve user data from database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        body {
            display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#000000" : "#FFFFFF"; ?>;
        }

        nav {
            width: 100%;
  max-width: 1500px;
  margin: 0 auto;
  padding: 0 20px;
}
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
        }

        .navbar img {
            width: 50px;
            height: auto;
        }

        .box {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 500px;
            max-width: 90%;
            height: auto;
            color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;

            max-height: 80%;
            border-radius: 25px;
            padding: 20px;
            background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#1d1d1d" : "#edf2fc"; ?>;
            position: relative;
            margin-top: 80px; 
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .box img {
            position: absolute;
            top: -30px;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            border: 2px solid #fff;
        }

        p {
            font-size: 18px;
  margin: 10px 0;
  line-height: 1.5;
  text-align: center;
  font-family: sans-serif;

        }

        label {
            display: inline-block;
  width: 120px;
  font-weight: bold;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <?php 
        $active_page = ""; // Define the active page variable
        include '../navigation-bar/nav.php'; // Include the navigation bar file
    ?>

    <div class="box">
        <?php
            // Display user data in a clean UI
            echo "<img src='" . $user_data['profile'] . "' alt='Profile picture'>";
            echo "<br>";
            echo "<p><label>Username</label><br>" .$user_data['username']. "</p>";
            echo "<p><label>Name</label><br>" . $user_data['name'] ." " ;
            echo $user_data['s_name'] . "</p>";
            echo "<p><label>Roll number</label><br>" . $user_data['roll_number'] . "</p>";
            echo "<p><label>Email</label><br>" . $user_data['email_id'] . "</p>";
        ?>
        
    </div>

    <script src="../js/main.js"></script>
</body>
</html>
