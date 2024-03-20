<?php

session_start();

$admins = $_SESSION['FirstName'];

if($admins !== "chanakyaadmin"){
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
$zipCode = "";
$selectedMonth = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $zipCode = $_POST['zipCode'];
    $selectedMonth = $_POST['selectedMonth'];
}
// SQL query to retrieve all records from the inventory table
$sql = "SELECT cu.CustomerID as CID, cu.FirstName as FN, t.TransactionDate as TD, t.TransactionID as TID, COUNT(t.TransactionID) as TC, cu.MyAddress
FROM Carts c
JOIN Transactions t ON c.TransactionID = t.TransactionID
JOIN Customers cu ON c.CustomerID = cu.CustomerID
WHERE cu.MyAddress like '%$zipCode%'
AND MONTH(t.TransactionDate) = '$selectedMonth'
GROUP BY cu.CustomerID, cu.FirstName, t.TransactionDate, t.TransactionID
HAVING TID > 2";
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
    .container {
        height: 100vh;
        /* display: flex; */
        /* border:1px solid red; */
        flex-direction: column;
        /* align-items: center; */
        /* justify-content: center; */
        background-color: #f4f4f4; /* Set your desired background color */
    }
#tablecontainer{
    width:80%;
    margin-left:10%;
    /* border:1px solid red; */
}

h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
   

   
    

    #loginuser{
        font-size:16px;
        width:80%;
        margin-left:10%;
        text-align:right;
        /* border:1px solid red; */
    }

    #dashboard {
        display: inline-block;
        padding: 10px;
        width:5%;
        text-align:center;
        background-color: #2c82c9; /* Red color, you can change it */
        color: white;
        text-decoration: none;
        border-radius: 4px;
        margin-top: 10px;
        margin-left:5%;
        border:1px solid #2c82c9;
        transition:0.3s;
    }

    #dashboard:hover {
        background-color:transparent;
        color:#2c82c9;
         /* Darker red on hover, you can change it */
    }






    form {
        margin-top:5%;
        margin-left:2%;
        width:20%;
            background-color:transparent;
            padding: 20px;
            border-radius: 8px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="date"] {
            width: 80%;
            margin-left:10%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }



   
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
<form action="" method="post">
    <label for="zipCode">Enter Zip Code (5 digits):</label>
    <input type="text" id="zipCode" name="zipCode" pattern="\d{5}"  required>

    <label for="selectedMonth">Select Month:</label>
    <select id="selectedMonth" name="selectedMonth" required>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>

    <input type="submit" value="Submit">
</form>
    
<div id="tablecontainer">
            <?php
            // Display the inventory data
            echo "<h2>Transaction Month: $selectedMonth | Zipcode: $zipCode</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>CustomerID</th>
                        <th>Customer Name</th>
                        <th>TransactionID</th>
                        <th>Date</th>
                        <th>Item Count</th>
                        <th>Address</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['CID']}</td>
                        <td>{$row['FN']}</td>
                        <td>{$row['TID']}</td>
                        <td>{$row['TD']}</td>
                        <td>{$row['TC']}</td>
                        <td>{$row['MyAddress']}</td>
                    </tr>";
            }

            echo "</table>";
            ?>
        </div>
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

    <div class="footer1">
        <h3>Our Locations</h3>
    
        <dl>
            <strong><dt>Texas</dt></strong>
            <dd>
                <ol>
                    <li>Plano</li>
                    <li>Richardson</li>
                    <li>Austin</li>
                </ol>
            </dd>
            <strong><dt>Florida</dt></strong>
            <dd>
                <ol>
                    <li>Miami</li>
                    <li>Tampa</li>
                </ol>
            </dd>
        </dl>
    
      
    </div>
<div class="footer2">
    <h3>My Details</h3>
        <p>First Name : <strong><em>Muppidi Rahul</em></strong></p>
        <p>Last Name : <strong><em>Reddy</em></strong></p>
        <p>NetID: <strong><em>MXR210123</em></strong></p>
        <p>Email: <strong><em>mxr210123@utdallas.edu</em></strong></p>
</div>
<div class="footer3">
    <h3>My Details</h3>
    <p>First Name : <strong><em>Sri Chanakya</em></strong></p>
    <p>Last Name : <strong><em>Yennana</em></strong></p>
    <p>NetID: <strong><em>SXY210038</em></strong></p>
    <p>Email: <strong><em>sxy210038@utdallas.edu</em></strong></p>
    
    

</footer>

</body>
</html>
