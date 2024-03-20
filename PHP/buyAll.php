<?php
    session_start();

    $customerID = $_SESSION["CustomerID"];

    // Include your database connection logic here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HW5";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        header('Location: ../test/error.html');
        die("Connection failed: " . $conn->connect_error);
    }

    $tranSql = "SELECT TransactionID
    FROM Carts
    WHERE Cartstatus = 'InCart' AND CustomerID = '$customerID';
    ";

    $result = $conn->query($tranSql);
    $row = $result->fetch_assoc();
    $TransactionID = $row['TransactionID'];

    // Update the inventory table
    $updateSql = "UPDATE `Carts` SET `CartStatus` = 'Shopped' WHERE `CartStatus` = 'InCart' AND `CustomerID` = '$customerID'";
    $updateTransactionSql = "UPDATE `Transactions` SET `TransactionStatus` = 'Shopped' WHERE `Transactionstatus` = 'InCart' AND `TransactionID` = '$TransactionID' ";
    // $updateResult = $conn->query($updateSql);

    if ($conn->query($updateSql) === TRUE) {
        header('Location: ../test/index.html');
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
    }

    if ($conn->query($updateTransactionSql) === TRUE) {
        header('Location: ../test/index.html');
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
    }

    // Close the database connection
    $conn->close();
//  else {
//     echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
// }
?>
