<?php
session_start(); // Starting Session
$error = '';
echo "Hello"; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['email']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
		echo "If";
	}
	else{
		echo "Else";
		// Define $username and $password
		$username = $_POST['email'];
		$password = $_POST['password'];
		// mysqli_connect() function opens a new connection to the MySQL server.
		$conn = mysqli_connect("localhost", "root", "", "parking");
		// SQL query to fetch information of registerd users and finds user match.
		$query = "SELECT email, password from customer where email=? AND password=? LIMIT 1";
		// To protect MySQL injection for Security purpose
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$stmt->bind_result($username, $password);
		$stmt->store_result();
		if($stmt->fetch()) {//fetching the contents of the row {
			$_SESSION['login_user'] = $username; // Initializing Session
		}
		header("Location: profile.php"); // Redirecting To Profile Page
	}
	mysqli_close($conn); // Closing Connection
}

?>