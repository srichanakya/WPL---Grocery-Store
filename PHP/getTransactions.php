<?php
// Replace these credentials with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HW5";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch transactions based on the selected criteria
function getTransactions($conn, $selectedOption, $selectedValue) {
    switch ($selectedOption) {
        case 'specificMonth':
            $sql = "SELECT * FROM Transactions WHERE MONTH(date) = MONTH('$selectedValue') AND YEAR(date) = YEAR('$selectedValue')";
            break;

        case 'lastThreeMonths':
            $sql = "SELECT * FROM Transactions WHERE date >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)";
            break;

        case 'specificYear':
            $sql = "SELECT * FROM Transactions WHERE YEAR(date) = '$selectedValue'";
            break;

        default:
            return [];
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $transactions = [];
        while ($row = $result->fetch_assoc()) {
            $transactions[] = $row;
        }
        return $transactions;
    } else {
        return [];
    }
}

// Get selected option and value from POST request
$selectedOption = $_POST['option'];
$selectedValue = $_POST['value'];

// Get transactions based on the selected criteria
$transactions = getTransactions($conn, $selectedOption, $selectedValue);

// Display the result (customize this based on your needs)
if (!empty($transactions)) {
    foreach ($transactions as $transaction) {
        echo "Transaction ID: {$transaction['id']}, Date: {$transaction['date']}, Amount: {$transaction['amount']}<br>";
    }
} else {
    echo "No transactions found.";
}

// Close the connection
$conn->close();
?>
