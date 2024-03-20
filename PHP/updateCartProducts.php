<?php
// include 'inCartTotal.php';

session_start();

$customerID = $_SESSION["CustomerID"];
$productId = isset($_POST['productId']) ? $_POST['productId'] : '';
$newInventory = 1;


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
        if ($conn->query($updateSql) === TRUE) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
        }
        $sumSql = "SELECT SUM(i.Price * c.Quantity) AS totalAmount, c.TransactionID
        FROM Carts c
        JOIN Inventory i ON c.ItemNumber = i.ItemNumber
        WHERE c.Cartstatus = 'InCart' AND CustomerID = '$customerID';
        ";

        $sumResult = $conn->query($sumSql);
        $sumRow = $sumResult->fetch_assoc();
        $totalAmount = $sumRow['totalAmount'];
        $TransactionID = $sumRow['TransactionID'];
        $today = date("Y-m-d");
        
        $updateTransactionSql = "UPDATE Transactions SET TransactionDate = '$today', Totalprice = '$totalAmount' WHERE TransactionID = '$TransactionID'";
        if ($conn->query($updateTransactionSql) === TRUE) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
        }
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
                $updateSql = "INSERT INTO `Carts` (`CustomerID`, `TransactionID`, `ItemNumber`, `Quantity`, `Cartstatus`)
                VALUES ('$customerID', '$TransactionID', '$productId', '$newInventory', 'InCart');
                ";
                if ($conn->query($updateSql) === TRUE) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
                }
                $sumSql = "SELECT SUM(i.Price * c.Quantity) AS totalAmount
                FROM Carts c
                JOIN Inventory i ON c.ItemNumber = i.ItemNumber
                WHERE c.Cartstatus = 'InCart' AND CustomerID = '$customerID';
                ";

                $sumResult = $conn->query($sumSql);
                $sumRow = $sumResult->fetch_assoc();
                $totalAmount = $sumRow['totalAmount'];
                $today = date("Y-m-d");
                $updateTransactionSql = "UPDATE Transactions SET TransactionDate = '$today', Totalprice = '$totalAmount' WHERE TransactionID = '$TransactionID'";
                if ($conn->query($updateTransactionSql) === TRUE) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
                }
                
                
                // Customer has items in cart but not this item, add it
            } else{
                $TransactionID = uniqid();
                $updateSql = "INSERT INTO `Carts` (`CustomerID`, `TransactionID`, `ItemNumber`, `Quantity`, `Cartstatus`)
                VALUES ('$customerID', '$TransactionID', '$productId', '$newInventory', 'InCart');
                ";
                if ($conn->query($updateSql) === TRUE) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
                }

                $sumSql = "SELECT SUM(i.Price * c.Quantity) AS totalAmount
                FROM Carts c
                JOIN Inventory i ON c.ItemNumber = i.ItemNumber
                WHERE c.Cartstatus = 'InCart' AND CustomerID = '$customerID';
                ";

                $sumResult = $conn->query($sumSql);
                $sumRow = $sumResult->fetch_assoc();
                $totalAmount = $sumRow['totalAmount'];
                $today = date("Y-m-d");
                $insertTransactionSql = "INSERT INTO `Transactions` (`TransactionID`, `Transactionstatus`, `TransactionDate`, `Totalprice`)
                    VALUES ('$TransactionID', 'InCart', '$today', '$totalAmount')
                ";
                if ($conn->query($insertTransactionSql) === TRUE) {
                    echo json_encode(['status' => 'success']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Failed to update inventory table']);
                }
                
            }
            
            
            
        }
        // Item doesn't exist, insert a new row
        
    }

    
    
}

// Close the database connection
$conn->close();
?>
