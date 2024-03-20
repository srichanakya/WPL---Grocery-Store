<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = $_POST["username"];
    $password = $_POST["password"];


    $adminusername = "chanakyaadmin";
    $adminpassword = "admin123";
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
if($username == $adminusername && $password == $adminpassword){
    $_SESSION['FirstName'] = $adminusername;
    header("Location: ../HTML/Dashboard.php");
    exit();

}

    elseif ($result->num_rows > 0) {
        // User is authenticated, set session variables
        $row = $result->fetch_assoc();
        $_SESSION["CustomerID"] = $row["CustomerID"];
        $customerID = $_SESSION["CustomerID"];
        $customerQuery = "SELECT FirstName, LastName FROM Customers WHERE CustomerID = '$customerID'";
        $customerResult = $conn->query($customerQuery);

        if ($customerResult->num_rows > 0) {
            $customerData = $customerResult->fetch_assoc();
            $customerFirstName = $customerData["FirstName"];
            
            $_SESSION["FirstName"] = $customerFirstName;}
        // Redirect to a secure page
        header("Location: ../HTML/MyAccount.php");
        exit();
    } else {
        echo "<script>alert('Login failed. Please check your credentials.'); window.location.href='../HTML/Login.php';</script>";
        exit();
    }

  
    $conn->close();
}
?>
