<?php
session_start(); ## Start session first
include('mysqli_connect.php'); // Connects database

$username = mysqli_real_escape_string($dbc, trim($_POST['username'])); 
$password = mysqli_real_escape_string($dbc, trim($_POST['password'])); // retrieves the 'username' from the POST data, trims any leading or trailing whitespaces

$query = "SELECT username, firstName, is_admin from users WHERE username = '$username' AND password = SHA2('$password', 256)"; 

$result = mysqli_query($dbc, $query);

$row_count = mysqli_num_rows($result);

if ($row_count == 1) {
    
    $_SESSION['username'] = $username; // Sets a session variable 'username' to store the currently logged-in user's username.

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	if ($row['is_admin'] == 1) { 
	    header("Location: landing_page.php"); // Checks if the user is an admin
	    exit();
	} else {
	    header("Location: landing_page.php"); // Redirects the user to 'secret_page_admin.php' if they are an admin.
	    exit();
	}
	
} else { ## No match
	header("Location:login.php");
	exit();
}

?>