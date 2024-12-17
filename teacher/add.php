
<!DOCTYPE html>
<html>
<head>
  <title>QuizGen - Add Question</title>
  <link rel="stylesheet" type="text/css" href="navbar.css">
  <style>
form {
  background-color: #f7f9fc;
  border-radius: 25px;
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  margin-top: 20px;
  width: 800px;
}
    
label, select {
  display: block;
  width: 100%;
  margin-bottom: 16px;
}

label {
  font-weight: 500;
  font-family:sans-serif;
  font-size: 16px;
}

select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background: url('../graphics/dropdown-arrow.png') no-repeat center right #FFFFFF; /* Add background color */
  background-size: 20px;
  padding: 12px;
  border-radius: 15px;
  border: 1px solid #ccc;
  box-sizing: border-box;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 500;
}
    
input[type=text], textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 15px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
  font-family: sans-serif;

}

input[type=submit] {
  background-color: #000000;
  color: #ffffff;
  border: none;
  border-radius: 20px;
  padding: 12px 20px;
  cursor: pointer;
  font-family: sans-serif;

}

input[type="submit"]:hover {
  background-color: #555555;
  
}
</style>
</head>
<body>
<?php 
  $active_page = "teacher"; // Define the active page variable
  include '../navigation-bar/nav.php'; // Include the navigation bar file
?>
  <br>
  <center>
  <form method="POST" action="../teacher/add.php">
    <label>Subject:</label>
    <select name="subject">
      <option value="python">Python</option>
      <option value="java">Java</option>
      <option value="php">PHP</option>
    </select>
    <br><br>
    <label>Type:</label>
    <select name="type" id="type-select">
      <option value="true-false">True or False</option>
      <option value="multiple-choice">Multiple Choice</option>
      <option value="short-answer">Short Answer</option>
    </select>
    <br><br>
    <label>Question:</label>
    <textarea name="question" rows="5" cols="50"></textarea>
    <br><br>
    <label>Answer:</label>
    <input type="text" name="answer">
    <br><br>
    <div id="dummy-choices" style="display:none">
      <label>Dummy 1:</label>
      <input type="text" name="dummy1">
      <br><br>
      <label>Dummy 2:</label>
      <input type="text" name="dummy2">
      <br><br>
      <label>Dummy 3:</label>
      <input type="text" name="dummy3">
      <br><br>
    </div>
    <input type="submit" value="Submit">
  </form>
</center>
</body>
</html>

<script>
  const typeSelect = document.getElementById("type-select");
  const dummyFields = document.getElementById("dummy-choices");
  typeSelect.addEventListener("change", function() {
    if (typeSelect.value === "multiple-choice") {
      dummyFields.style.display = "block";
    } else {
      dummyFields.style.display = "none";
    }
  });
</script>