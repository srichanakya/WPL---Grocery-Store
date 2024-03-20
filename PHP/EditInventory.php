<?php
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

function fetchProducts($conn, $category) {
    // Implement your logic to fetch products from the database based on the category
    // Return the data as JSON
    // Example: Fetch products from a table named 'Inventory'
    $sql = "SELECT * FROM Inventory WHERE ItemNumber = '$category'";
    $result = $conn->query($sql);

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
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        echo fetchProducts($conn, $category);
        exit;
    }
}

// Close the database connection
$conn->close();
?>
<!-- Rest of your HTML content -->
