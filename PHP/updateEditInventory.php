<?php

$productId = isset($_POST['productId']) ? $_POST['productId'] : '';
$newInventory = isset($_POST['newInventory']) ? $_POST['newInventory'] : '';
$newPrice = isset($_POST['newPrice']) ? $_POST['newPrice'] : '';


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
    $updateSql = "UPDATE `Inventory` SET `Quantity` = '$newInventory', `Price` = '$newPrice' WHERE `ItemNumber` = '$productId'";
    // $updateResult = $conn->query($updateSql);

    if ($conn->query($updateSql) === TRUE) {
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
