<?php
session_start();

$customerID = $_SESSION["CustomerID"];
$productId = isset($_POST['productId']) ? $_POST['productId'] : '';
$newInventory = isset($_POST['newInventory']) ? $_POST['newInventory'] : '';

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

// Update the inventory table

$checkIfExistsSql = "
    SELECT COUNT(*) AS count
    FROM `Carts`
    WHERE `CustomerID` = '$customerID'
    AND `ItemNumber` = '$productId'
    AND `Cartstatus` = 'InCart'
";

$checkIfExistsResult = $conn->query($checkIfExistsSql);

if ($checkIfExistsResult === FALSE) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to check if record exists']);
} else {
    $row = $checkIfExistsResult->fetch_assoc();
    $recordCount = $row['count'];

    if ($recordCount > 0) {
        // Item exists, update the quantity
        $updateSql = "
            UPDATE `Carts`
            SET `Quantity` = `Quantity` + '$newInventory'
            WHERE `CustomerID` = '$customerID'
            AND `ItemNumber` = '$productId'
            AND `Cartstatus` = 'InCart'
        ";
    } else {
        $checkIfExistsSql2 = "
            SELECT COUNT(*) AS count, TransactionID
            FROM `Carts`
            WHERE `CustomerID` = '$customerID'
            AND `Cartstatus` = 'InCart'
        ";
        $checkIfExistsResult2 = $conn->query($checkIfExistsSql2);

        if ($checkIfExistsResult2 === FALSE) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to check if record exists']);
        }
        else{
            $row = $checkIfExistsResult2->fetch_assoc();
            $recordCount = $row['count'];
            echo "<script> console.log(recordCount);</script>";

            if ($recordCount > 0) {
                $TransactionID = $row['TransactionID'];
                // Customer has items in cart but not this item, add it
            } else{
                $TransactionID = uniqid();
            }
            $updateSql = "
                INSERT INTO `Carts` (`CustomerID`, `TransactionID`, `ItemNumber`, `Quantity`, `Cartstatus`)
                VALUES ('$customerID', '$TransactionID', '$productId', '$newInventory', 'InCart');
                ";
            
        }
        // Item doesn't exist, insert a new row
        
    }

    if ($conn->query($updateSql) === TRUE) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
    }
}

// Close the database connection
$conn->close();
?>
