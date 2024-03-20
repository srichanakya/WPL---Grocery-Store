<?php

session_start();

$admins = $_SESSION['FirstName'];

if ($admins !== "chanakyaadmin") {
    header("Location: ../HTML/Login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HW5";
$table = "Inventory"; // Replace with your actual table name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize $TDate to an empty string
$TDate = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected date from the form
    $TDate = $_POST['transactionDate'];
}

// SQL query to retrieve data for the selected date
$sql = "SELECT cu.CustomerID as CID, cu.FirstName as FN, t.TransactionDate as TD, COUNT(t.TransactionID) as TC
        FROM Carts c
        JOIN Transactions t ON c.TransactionID = t.TransactionID
        JOIN Customers cu ON c.CustomerID = cu.CustomerID
        WHERE t.TransactionDate = '$TDate'
        GROUP BY cu.CustomerID, cu.FirstName, t.TransactionDate
        HAVING TC > 2";

$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

// Close the connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Store</title>

    <!-- External Style Sheet -->
    <link rel="stylesheet" href="../CSS/mystyle.css">
    <style>
        /* Your existing styles */
    </style>
</head>
<body>
    <!-- Header part -->
    <header>
        <img class="logo" src="../Assets/storelogo.png" alt="logo">
    </header>

    <!-- Navigation part -->

    <div class="container">
        <?php
        echo "<h1 id='loginuser'>Login as: $admins</h1>";
        ?>
        <a id='dashboard' href='../HTML/Dashboard.php'>Dashboard</a>

        <!-- Add a form to take the input date -->
        <form action="" method="post">
            <label for="transactionDate">Select Date:</label>
            <input type="date" id="transactionDate" name="transactionDate" required>
            <input type="submit" value="Submit">
        </form>

        <div id="tablecontainer">
            <?php
            // Display the inventory data
            echo "<h2>Inventory Data for Date: $TDate</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>CustomerID</th>
                        <th>Customer Name</th>
                        <th>Date</th>
                        <th>Transaction Count</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['CID']}</td>
                        <td>{$row['FN']}</td>
                        <td>{$row['TD']}</td>
                        <td>{$row['TC']}</td>
                    </tr>";
            }

            echo "</table>";
            ?>
        </div>

        <!-- Your existing HTML content -->
        <!-- <form action="../PHP/AddInventory.php" method="post" enctype="multipart/form-data">
            <h2>Add Inventory</h2>
            <label for="file">Choose File:</label>
            <input type="file" name="file" accept=".xml, .json" required>
            <br>
            <input type="submit" value="Upload">
        </form> -->
    </div>

    <!-- Footer part -->
    <footer>
        <!-- Your existing footer content -->
    </footer>

</body>
</html>
