<!DOCTYPE html>
<html>
<head>
	<title>MCQ QUESTIONS</title>
    <link rel="stylesheet" type="text/css" href="navbar.css">    
</head>
<style>
    body {
	margin: 0;
	padding: 0;
	font-family: Arial, sans-serif;
}

header {
	background-color: #333;
	color: #fff;
	padding: 20px;
}

nav ul {
	list-style: none;
	margin: 0;
	padding: 0;
	display: flex;
}

nav li {
	margin-right: 20px;
}

nav a {
	color: #fff;
	text-decoration: none;
}

main {
	max-width: 800px;
	margin: 0 auto;
	padding: 50px;
	text-align: center;
}

h1 {
	font-size: 36px;
	margin-bottom: 30px;
}

form {
	margin-bottom: 30px;
}

form label {
	display: block;
	margin-bottom: 10px;
}

form select {
	padding: 5px;
	border-radius: 5px;
	border: none;
	margin-right: 20px;
}

form button {
	padding: 10px 20px;
	background-color: #333;
	color: #fff;
	border: none;
	border-radius: 5px;
	cursor: pointer;
}

#question-paper {
	border: 1px solid #ccc;
	padding: 20px;
}
/*button styles*/
.subjects-container {
  background-color: #f7f9fc;
  padding: 150px;
  height: 150px;
  border-radius: 40px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
  display: flex;
  justify-content: center;
}

.subjects {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}

.subjects a {
  background-color: rgb(0, 0, 0);
  color: white;
  padding: 20px;
  margin: 20px;
  font-size: 18px;
  text-decoration: none;
  border-radius: 20px;
  transition: transform 0.5s;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
}

.subjects a:hover {
  transform: scale(1.1);
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
}

</style>
<body>
    <div style="text-align: center;">
		<img src="https://i.postimg.cc/sDMgBwRV/logo-text-linear.png" alt="Logo" class="logo" style="width: 400px; height: 120px;">
	  </div>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li class="active"><a href="quiz.html">Quiz</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li class="right"><a href="Settings.html">Settings</a></li>
            </ul>
        </nav>
	<main>
		<h1>Select a subject</h1>
        <h3>And it will generate random MCQ questions for you</h3>

        <div class="subjects-container">
            <div class="subjects">
              <a href="#">PHP</a>
              <a href="#">PYTHON</a>
              <a href="#">JAVA</a>
            </div>
          </div>
	</main>
</body>
</html>
