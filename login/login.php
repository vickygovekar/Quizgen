<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		body {
			background-color: #f1f1f1;
			font-family: sans-serif;
			margin: 0;
			padding: 0;
		}
		.container {
			background-color: #ffffff;
			border-radius: 25px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
			margin: 100px auto;
			padding: 20px;
			width: 350px;
		}
	
		input[type=text], input[type=password] {
			border-radius: 25px;
			padding: 10px;
			width: 95%;
			border: none;
			margin-top: 5px;
			margin-bottom: 15px;
		}
	
	input[type=submit] {
		background-color: #4CAF50;
		border: none;
		border-radius: 25px;
		color: white;
		cursor: pointer;
		margin-top: 10px;
		padding: 10px;
		width: 100%;
		transition: all 0.3s ease-in-out;
	}
	
	input[type=submit]:hover {
		background-color: #45a049;
	}

	.show-password-label {
		display: block;
		margin-top: 10px;
		color: #333;
		font-size: 14px;
		cursor: pointer;
	}

	label {
		display: block;
		color: #333;
		font-size: 16px;
		font-weight: bold;
		margin-bottom: 5px;
	}

	.checkbox-container {
		display: flex;
		align-items: center;
	}

	.checkbox-container input[type="checkbox"] {
		margin-right: 5px;
	}
</style>
</head>
<body>
	<div class="container">
	<div style="text-align: center;">
		<img src="https://i.postimg.cc/sDMgBwRV/logo-text-linear.png" alt="Logo" class="logo" style="width: 300px; height: 90px;">
	</div>
		<h2>Login</h2>
		<form method="post" action="verify.php">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password:</label>
			<div class="password-container">
				<input type="password" id="password" name="password" required>
				<div class="checkbox-container">
					<input type="checkbox" id="show-password-checkbox" class="show-password-checkbox">
					<label for="show-password-checkbox" class="show-password-label">Show password</label>
				</div>
			</div>
			<input type="submit" value="Login">
		</form>
	</div>
	<script>
		const passwordInput = document.getElementById("password");
		const showPasswordCheckbox = document.getElementById("show-password-checkbox");
		showPasswordCheckbox.addEventListener("change", function() {
			if (this.checked) {
				passwordInput.type = "text";
			} else {
				passwordInput.type = "password";
			}
		});
	</script>
</body>
</html>