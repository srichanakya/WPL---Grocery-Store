
<?php
session_start();


$customerID = $_SESSION["CustomerID"];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This is sample <?php echo $customerID; ?></h1>

    <?php
// Check if the user is logged in
if (isset($_SESSION["CustomerID"])) {
    // The user is logged in
    $username = $_SESSION["CustomerID"];
    echo "<p>Welcome, $username! <a href='Logout.php'>Logout</a></p>";
} else {
    // The user is not logged in
    echo "<p><a href='Login.html'>Login</a></p>";
}
?>

    <a href="sample.php">Sample </a>
    <a href="sample2.php">Sample 2 </a>
    <a href="MyAccount.php">My Account </a>

</body>
</html>