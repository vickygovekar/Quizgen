<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Example code to check for notifications
$notification = 'yes';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../graphics/logo-icon.ico" type="image/ico">
    <meta charset="UTF-8">
    <title>Navigation Bar</title>
</head>
<style>
    nav {
        background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#413f63" : "#f7f9fc"; ?>;
        
        border-radius: 25px;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);

        padding: 10px;
        position: relative; /* Make the nav container a positioning context */
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        display: flex;
        justify-content: center; /* Center the list items horizontally */
        align-items: center; /* Center the list items vertically */
    }
    
    nav li {
        margin-right: 10px;
    }
    
    nav li a {
        display: block;
        
        color:<?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?> ;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        border-radius: 20px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 500;
    }
    
    nav li.active a {
        background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "black" : "black"; ?>;
        color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#f7f9fc"; ?>;
    }
    
    nav li a:hover {
        background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#201f31" : "#c7c7c7"; ?>;
        transition: 0.3s ease;
    }

    nav .icon {
        display: flex;
        align-items: center;
        margin-left: 10px;
    }

    nav .icon img {
        width: 20px;
        height: 20px;
        margin-right: 5px;
    }

    nav .icon a {
        display: flex;
        align-items: center;
    }

    nav li.right {
        margin-left: auto;
    }

    nav li.right a {
        display: flex;
        align-items: center;
    }

    nav li.right a span {
        display: none;
    }

    nav li.right a img {
        margin-right: 5px;
    }

    nav li.right:hover a span {
        display: block;
        margin-left: 5px;
    }

    nav li.right:hover a img {
        display: none;
    }



    .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  z-index: 1;
  background-color: #f7f9fc;
  border-radius: 25px;
  min-width: 160px;
  padding: 10px;
  top: 100%;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown-content a {
  display: block;
  color: #333;
  padding: 6px 8px;
  text-decoration: none;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: 500;
}

.dropdown-content a:hover {
  background-color: #c7c7c7;
  transition: 0.3s ease;
}

.logo-imgg {
    filter: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "invert(100%)" : "none"; ?>;
}
    </style>
<body>
    <div style="text-align: center;">
        <!-- <img src="https://i.postimg.cc/sDMgBwRV/logo-text-linear.png" alt="Logo" class="logo" style="width: 400px; height: 120px;"> -->
        <img src=<?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "https://i.postimg.cc/8zBCGHR3/logo-text-linear.png" : "https://i.postimg.cc/sDMgBwRV/logo-text-linear.png"; ?> alt="Logo" class="logo" style="width: 400px; height: 120px;">

        
        
    </div>

    <?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Example code to check for notifications
$notification = 'yes';

// Check if user is logged in and has role of student
if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'student') {
    // Get the batch from the session
    $batch = $_SESSION['batch'];

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "quizgen");

    // Check if there is any test for the batch in the test table
    $test_query = "SELECT * FROM tests WHERE batch = '$batch'";
    $test_result = mysqli_query($conn, $test_query);

    // Check if there are any unanswered tests
    $unanswered_test = 'no';
    while($test_row = mysqli_fetch_assoc($test_result)) {
        $test_id = $test_row['test_id'];
        $user_id = $_SESSION['user_id'];

        // Check if the user has answered the test
        $score_query = "SELECT * FROM scores WHERE user_id = '$user_id' AND test_id = '$test_id'";
        $score_result = mysqli_query($conn, $score_query);

        if(mysqli_num_rows($score_result) == 0) {
            $unanswered_test = 'yes';
            break;
        }
    }

    // Set the notification variable based on whether there are any unanswered tests
    if($unanswered_test == 'yes') {
        $notification = 'yes';
    } else {
        $notification = 'no';
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<nav>
    <ul>
        <li class="<?php echo ($active_page == 'home') ? 'active' : ''; ?>"><a href="../common/home.php">Home</a></li>
        <li class="<?php echo ($active_page == 'quiz') ? 'active' : ''; ?>"><a href="../quiz/quiz.php">Quiz</a></li>
        <li class="<?php echo ($active_page == 'contact') ? 'active' : ''; ?>"><a href="../common/contact.php">Contact</a></li>
        
        <?php 
        if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'admin'): // check if user is logged in and has role of admin
        ?>
            <li class="<?php echo ($active_page == 'admin') ? 'active' : ''; ?>"><a href="../admin/admin.php">Admin</a></li>

        <?php endif; ?>

        <?php 
        if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'teacher'): // check if user is logged in and has role of teacher
        ?>

            <li class="<?php echo ($active_page == 'teacher') ? 'active' : ''; ?>"><a href="../teacher/teacher.php">Teacher</a></li>

        <?php endif; ?>

        <?php 
        if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'student'): // check if user is logged in and has role of teacher
        ?>

            <li class="<?php echo ($active_page == 'student') ? 'active' : ''; ?>"><a href="../student/student.php">Student</a></li>

        <?php endif; ?>

        <li style="margin-left: auto;"><a href="../common/settings.php"><img src="../graphics/settings-icon.png" alt="Settings" class="logo-imgg"></a></li>
        <?php 
        if(isset($_SESSION['user_id']) && $_SESSION['user_role'] == 'student'): // check if user is logged in and has role of student
        ?>
            <li>
                <div class="icon">
                    <?php 
                    if($notification == 'yes'): // check if there is a notification
                    ?>
                        <a href="../student/notification.php"><img src="../graphics/notification-icon-yes.png" alt="Notification"></a>
                    <?php else: ?>
                        <a href="../student/notification.php"><img src="../graphics/notification-icon-no.png" alt="Notification"></a>
                    <?php endif; ?>
                </div>
            </li>
        <?php endif; ?>
        
        <li style="margin-right: 10px;"><a href="../common/account.php"><img src="../graphics/account-icon.png" alt="Account" class="logo-imgg"></a></li>
    </ul>
</nav>
</body>
</html>