<!DOCTYPE html>
<html>
<head>
  <title>Add Test</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    .main-box {
      margin: 50px auto;
      width: 400px;
      background-color: #fff;
      padding: 20px;
      border-radius: 25px;
      box-shadow: 0px 0px 10px #ccc;
    }
    h1 {
      margin-top: 0;
    }
    label {
      display: inline-block;
      width: 150px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    input[type="text"], select, input[type="number"] {
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 25px;
      margin-bottom: 10px;
      width: 200px;
    }
    input[type="submit"] {
      background-color: black;
      color: #ffffff;
      border-radius: 25px;
      border: none;
      padding: 8px 15px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #777;
    }
    .confirmation {
      margin-top: 20px;
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
      border-radius: 25px;
      padding: 10px;
    }
  </style>
</head>
<?php 
  $active_page = "teacher"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>
<body>
  <div class="main-box">
    <h1>Add Test</h1>
    <?php
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Connect to the database
      $conn = mysqli_connect("localhost", "root", "", "quizgen");

      // Check connection
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // Get the values from the form
      $name = $_POST["name"];
      $subject = $_POST["subject"];
      $batch = $_POST["batch"];
      $num_questions = $_POST["num_questions"];

      // Prepare the SQL statement
      $sql = "INSERT INTO tests (name, subject, batch, number_of_questions) VALUES ('$name', '$subject', '$batch', $num_questions)";

      // Execute the SQL statement
      if (mysqli_query($conn, $sql)) {
        echo "<div class='confirmation'>Test added successfully.</div>";
      } else {
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
      }

      // Close the database connection
      mysqli_close($conn);
    }
    ?>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required><br>
      <label for="batch">Batch:</label>
      <select id="batch" name="batch" onchange="updateSubjects()">
        <option value="">Select a batch</option>
        <option value="2020CE">Computer (2020)</option>
        <option value="2020MH">Mechanical (2020)</option>
      </select><br>
      <label for="subject">Subject:</label>
      <select id="subject" name="subject" required>
        <option value="">Select a subject</option>
      </select><br>
      <label for="num_questions">Number of Questions:</label>
      <input type="number" id="num_questions" name="num_questions" min="1" max="100" required><br>
      <input type="submit" value="Add Test">
    </form>
  </div>
  <script>
    function updateSubjects() {
      var batchSelect = document.getElementById("batch");
      var subjectSelect = document.getElementById("subject");
      subjectSelect.innerHTML = "";
      if (batchSelect.value === "2020CE") {
        var pythonOption = document.createElement("option");
        pythonOption.value = "python";
        pythonOption.text = "Python";
        subjectSelect.add(pythonOption);
        var javaOption = document.createElement("option");
        javaOption.value = "java";
        javaOption.text = "Java";
        subjectSelect.add(javaOption);
        var phpOption = document.createElement("option");
        phpOption.value = "php";
        phpOption.text = "PHP";
        subjectSelect.add(phpOption);
      } else if (batchSelect.value === "2020MH") {
        var mech1Option = document.createElement("option");
        mech1Option.value = "mech1";
        mech1Option.text = "Mechanical 1";
        subjectSelect.add(mech1Option);
        var mech2Option = document.createElement("option");
        mech2Option.value = "mech2";
        mech2Option.text = "Mechanical 2";
        subjectSelect.add(mech2Option);
        var mech3Option = document.createElement("option");
        mech3Option.value = "mech3";
        mech3Option.text = "Mechanical 3";
        subjectSelect.add(mech3Option);
      }
    }
  </script>
</body>
</html>