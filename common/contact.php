<!DOCTYPE html>

<?php 
  $active_page = "contact"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>

<html>
<head>
<link rel="icon" href="../graphics/logo-icon.ico" type="image/ico">

    <title>Contact Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "black" : "#fff"; ?>;        }
        
        .container {
            display: flex;
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        
        .form-container {
            flex: 0 0 80%;
            margin-right: 20px;
            background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#1d1d1d" : "#edf2fc"; ?>;
            border: 0px solid #ccc;
			box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 25px;

        }
        
        h2 {
            text-align: center;
            color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#333" : "#fff"; ?>;
            color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
            font-size: 14px;
            border: 0px solid #ccc;
            border-radius: 25px;
            box-sizing: border-box;
        }
        
        textarea {
            resize: vertical;
            height: 100px;
            background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#333" : "#fff"; ?>;
            color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#fff" : "#333"; ?>;
            max-height: 200px;
        }
        
        input[type="submit"] {
            background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#204d22" : "#4CAF50"; ?>;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 25px;
        }
        
        .message {
    color: #155724;
    padding: 10px;
    border-radius: 25px;
    margin-bottom: 20px;
        }
        
        .social-media-container {
            flex: 0 0 20%;
            background-color: <?php echo isset($_SESSION['theme']) && $_SESSION['theme'] == "1" ? "#1d1d1d" : "#edf2fc"; ?>;
            border: 0px solid #ccc;
			box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 25px;

        }
        
        .social-media {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        
        .social-media img {
            width: 30px;
            height: 30px;
            margin-bottom: 10px;
        }
        
        .confirmation-message {
            height: 50px;
        }
        
        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .form-container,
            .social-media-container {
                margin-right: 0;
            }
            
            .form-container {
                flex: 1;
            }
            
            .social-media-container {
                flex: 1;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <?php
    // Database configuration
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'quizgen';
    
    // Create a new database connection
    $conn = mysqli_connect($host, $username, $password, $database);
    
    // Check if the connection was successful
    if (!$conn) {
        die('Database connection error: ' . mysqli_connect_error());
    }
    
    // Initialize variables to store form data
    $firstName = '';
    $lastName = '';
    $email = '';
    $rollNo = '';
    $query = '';
    $message = '';
    
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $rollNo = $_POST['roll_no'];
        $query = $_POST['query'];
        
        // Prepare and execute the SQL query to insert data into the database
        $sql = "INSERT INTO contact (first_name, last_name, email, roll_no, query) VALUES ('$firstName', '$lastName', '$email', '$rollNo', '$query')";
        if (mysqli_query($conn, $sql)) {
            // Query submitted successfully
            $message = "Query submitted successfully. Expect a reply within 7 days.";
            
            // Clear form data
            $firstName = '';
            $lastName = '';
            $email = '';
            $rollNo = '';
            $query = '';
        } else {
            // Error occurred while submitting the query
            $message = "Error: " . mysqli_error($conn);
        }
        
        // Close the database connection
        mysqli_close($conn);
    }
    ?>
    <div class="container">
        <div class="form-container">
            <div class="title-container">
                <h2 class="title">Contact Us</h2>
            </div>
            <div class="message-container">
                <p class="message"><?php echo $message; ?></p>
            </div>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" value="<?php echo $firstName; ?>" required>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" value="<?php echo $lastName; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>
                </div>

                <div class="form-group">
                    <label for="roll_no">Roll No:</label>
                    <input type="text" name="roll_no" id="roll_no" value="<?php echo $rollNo; ?>" required>
                </div>

                <div class="form-group">
                    <label for="query">Query:</label>
                    <textarea name="query" id="query" rows="4" cols="50" required><?php echo $query; ?></textarea>
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>
        
        <div class="social-media-container">
            <h2>Follow Us</h2>
            <div class="social-media">
    <a href="https://www.facebook.com"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2169/24/social_media_social_media_logo_facebook-512.png" alt="Facebook"></a>
    <a href="https://twitter.com"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2169/24/social_media_social_media_logo_twitter-512.png" alt="Twitter"></a>
    <a href="https://www.instagram.com"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2169/24/social_media_social_media_logo_instagram-512.png" alt="Instagram"></a>
    <a href="https://www.youtube.com"><img src="https://cdn3.iconfinder.com/data/icons/social-media-2169/24/social_media_social_media_logo_youtube-512.png" alt="YouTube"></a>
</div>

        </div>
    </div>
    
    <div class="confirmation-message"></div>
    
    <script>
        // Auto-hide the message container after 5 seconds
        setTimeout(function() {
            var messageContainer = document.querySelector('.message-container');
            if (messageContainer) {
                messageContainer.style.display = 'none';
            }
        }, 5000);
    </script>
</body>
</html>
