<?php
session_start();

$customerID = $_SESSION["CustomerID"];

echo "Customer ID from session: " . $_SESSION["CustomerID"];

// Include your database connection logic here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HW5";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function fetchProducts($conn) {
    $customerID = $_SESSION["CustomerID"];

    // Implement your logic to fetch products from the database based on the category
    // Return the data as JSON
    // Example: Fetch products from a table named 'Inventory'
    $sql = "SELECT
        c.CustomerID,
        c.TransactionID,
        c.ItemNumber,
        c.Quantity,
        c.Cartstatus,
        i.Name,
        i.Price,
        i.Category,
        i.Subcategory,
        i.Quantity AS InventoryQuantity
    FROM
        Carts c
    JOIN
        Inventory i ON c.ItemNumber = i.ItemNumber
    WHERE
        c.Cartstatus = 'InCart' AND c.CustomerID = '$customerID' ";
    $result = $conn->query($sql);

    echo "SQL Query: $sql";

    if (!$result) {
        die("Error executing the query: " . $conn->error);
    }

    $products = array();

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return json_encode($products);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $fetchedProducts = fetchProducts($conn);
    // You can print customerID here or in any part of your HTML content

    // Print customerID in HTML content
    echo "<html>";
    echo "<head><title>Your Page Title</title></head>";
    echo "<body>";
    echo "<p>Customer ID: $customerID</p>";

    // Rest of your HTML content
    echo "<div id='Container'>$fetchedProducts</div>";

    echo "</body>";
    echo "</html>";
    
    exit;
}

// Close the database connection
$conn->close();
?>
