<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validate inputs
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $dob = trim($_POST['dob']);
    $phonenumber = trim($_POST['phonenumber']);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $address = trim($_POST['address']);


    

    if (TRUE) {
        // Database connection details
        $host = 'localhost';
        $dbusername = 'root';
        $dbpassword = '';
        $database = 'HW5';

        // Create database connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            
        }


        $customerId = uniqid();
        $customerInsertQuery = "INSERT INTO `Customers` (`CustomerID`, `FirstName`, `LastName`, `PhoneNumber`, `Email`, `MyAddress`, `DOB`) 
                       VALUES ('$customerId', '$firstname', '$lastname','$phonenumber', '$email', '$address','$dob')";
        $conn->query($customerInsertQuery);
        



        // Insert data into user table
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userInsertQuery = "INSERT INTO Users (CustomerID, Username, Passwords) VALUES ('$customerId','$username', '$password')";
        $conn->query($userInsertQuery);

        // Get the user ID
        $userId = $conn->insert_id;

        $conn->close();

        // Redirect to a success page or do something else
        header('Location: test2.html');
        exit();
    }
    else{
        $message = "Registration Failed";
        header('Location: Registration.php');
    }
}
?>
