<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Your database connection code goes here
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "HW5";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to check if the username and password match
    $query = "SELECT CustomerID FROM Users WHERE Username = '$username' AND Passwords = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User is authenticated, set session variables
        $row = $result->fetch_assoc();
        $_SESSION["CustomerID"] = $row["CustomerID"];

        // Redirect to a secure page
        header("Location: MyAccount.php");
        exit();
    } else {
        // Invalid username or password

        header("Location: Login.html");
    }

    // Close the database connection
    $conn->close();
}
?>
