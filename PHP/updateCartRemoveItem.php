<?php
session_start();

$customerID = $_SESSION["CustomerID"];

$productId = isset($_POST['productId']) ? $_POST['productId'] : '';


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
$transidSql = "SELECT TransactionID from Carts WHERE CustomerID = '$customerID' AND Cartstatus = 'InCart'";
$transidResult = $conn->query($transidSql);
$transidRow = $transidResult->fetch_assoc();
$TransactionID = $transidRow['TransactionID']; 


    // Update the inventory table
    $updateSql = "UPDATE `Carts` SET `CartStatus` = 'Cancelled' WHERE `ItemNumber` = '$productId' AND `CartStatus` = 'InCart' AND `CustomerID` = '$customerID'";
    if ($conn->query($updateSql) === TRUE) {
        header('Location: ../test/index.html');
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
    }

    $sumSql = "SELECT SUM(i.Price * c.Quantity) AS totalAmount
    FROM Carts c
    JOIN Inventory i ON c.ItemNumber = i.ItemNumber
    WHERE c.Cartstatus = 'InCart' AND c.CustomerID = '$customerID';
    ";
    $sumResult = $conn->query($sumSql);

    $sumRow = $sumResult->fetch_assoc();

    $today = date("Y-m-d");
    if ($sumRow['totalAmount'] > 0 ) {
        // Fetch the result
        // $sumRow = $sumResult->fetch_assoc();
        $totalAmount = $sumRow['totalAmount'];
        $updateTransactionSql = "UPDATE Transactions SET TransactionDate = '$today', Totalprice = '$totalAmount' WHERE TransactionID = '$TransactionID'";
        
        if ($conn->query($updateTransactionSql) === TRUE) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
        }
        
    } else{
        // No items in the cart, set total amount to 0
        $totalAmount1 = 0;
        $updateTransactionSql = "UPDATE Transactions SET TransactionDate = '$today', Totalprice = '$totalAmount1', TransactionStatus = 'Cancelled' WHERE TransactionID = '$TransactionID'";
        
        if ($conn->query($updateTransactionSql) === TRUE) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
        }
        // You may also want to set $TransactionID and $today to appropriate values or leave them as needed
    }

    
    // $sumRow = $sumResult->fetch_assoc();
    // $totalAmount = $sumRow['totalAmount'];
    
    
    // $TransactionID = $sumRow['TransactionID'];
    
    
    
    // $updateResult = $conn->query($updateSql);

    

    // Close the database connection
    $conn->close();
//  else {
//     echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
// }
?>
