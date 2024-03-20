<?php

    session_start();

    $customerID = $_SESSION["CustomerID"];
    // $productId = isset($_POST['productId']) ? $_POST['productId'] : '';
    // $newInventory = 1;


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
    // $customerID = $_SESSION["CustomerID"];
    $transidSql = "SELECT TransactionID from Carts WHERE CustomerID = '$customerID' AND Cartstatus = 'InCart'";
    $transidResult = $conn->query($transidSql);
    $transidRow = $transidResult->fetch_assoc();
    $TransactionID = $transidRow['TransactionID'];

    $cartCancelSql = "UPDATE `Carts` SET `CartStatus` = 'Cancelled' WHERE `CartStatus` = 'InCart' AND `CustomerID` = '$customerID' ";
    if ($conn->query($cartCancelSql) === TRUE) {
        header('Location: ../test/index.html');
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
    }
    $today = date("Y-m-d");
    $updateTransactionSql = "UPDATE Transactions SET TransactionDate = '$today', Totalprice = '0', TransactionStatus = 'Cancelled' WHERE TransactionID = '$TransactionID'";
    if ($conn->query($updateTransactionSql) === TRUE) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
    }
?>