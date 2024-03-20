
<?php
session_start();


$customerID = $_SESSION["CustomerID"];
$customerName = $_SESSION['FirstName'];



function Logout(){
    session_destroy();
    header("Location: ../HTML/Login.php");
    exit();

}

?>


<?php
// Your database connection code here
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







// last transaction



$customerID = $_SESSION["CustomerID"];


$sql = "SELECT TransactionID, ItemNumber, Quantity, Cartstatus
        FROM `Carts`
        WHERE CustomerID = '$customerID' and TransactionID = (
            SELECT TransactionID
            FROM `Carts` 
            WHERE CustomerID = '$customerID'
            ORDER BY TransactionID DESC
            LIMIT 1
        )";

$result = $conn->query($sql);
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
    table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #loginbtn, #logoutbtn{
            font-weight:bold;
        text-decoration:none;
        border:1px solid blue;
        padding: 3%;
        color:white;
        background-color:blue;
        border-radius:5px;
        position: relative;
        margin-top:100%;
        
        margin-left:40%;
        }

        .latestrecords{
            /* border:1px solid red; */
            width:100%;
            padding-top:10%;
        }

        .cancelorderbtn {
  /* Set background color */
  background-color: #e74c3c; /* You can change this color */

  /* Set text color */
  color: #fff; /* You can change this color */

  /* Add padding and margin for spacing */
  padding: 10px 20px;
  margin: 5px;

  /* Set border and border-radius for a rounded button */
  border: 1px solid #c0392b; /* You can change this color */
  border-radius: 5px;

  /* Add hover effect */
  cursor: pointer;
  transition: background-color 0.3s ease;

  /* Optional: Remove default button styles */
  border: none;
  outline: none;
}

.cancelorderbtn:hover {
  background-color: #c0392b; /* Change to a darker shade on hover */
}










form {
    margin-top:2%;
    /* padding:2%; */
    /* border:1px solid red; */
    width:30%;
    margin-left:35%;
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
}

select, input[type="text"] {
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
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
<div class="navigationbar">
<a href="../HTML/FreshProducts.php">Fresh Products</a>
    <a href="../HTML/FrozenProducts.php">Frozen</a>
    <a href="../HTML/Pantry.php">Pantry</a>
    <a href="../HTML/Breakfast.php">Breakfast & Cereal</a>
    <a href="../HTML/Baking.php">Baking</a>
    <a href="../HTML/Snacks.php">Snacks</a>
    <a href="../HTML/Candy.php">Candy</a>
    <a href="../HTML/SpecialtyShops.php">Speacialty Shops</a>
    <a href="../HTML/Deals.php">Deals</a>
    <a href="../HTML/MyAccount.php">My Account</a>
    <a href="../HTML/AboutUs.php">About US</a>
    <a href="../HTML/ContactUs.php">Contact US</a>
    <a href="../HTML/Cart.php">Cart</a>

</div>

<div class="container">
    <div class="side" style="background-color: #FFA726;">
    
        <h2>My Account</h2>

        <?php
// Check if the user is logged in
if (isset($_SESSION["CustomerID"])) {
    // The user is logged in
    $username = $_SESSION["FirstName"];
    echo "<h4>Welcome, $username! </h4>";
    echo "<a id='logoutbtn' href='../HTML/MyAccount.php?action=Logout'>Logout</a>";
    if (isset($_GET["action"]) && $_GET["action"] == "cancelShop") {
        cancelShop();
    }

    if (isset($_GET["action"]) && $_GET["action"] == "Logout") {
        Logout();
    }
} else {
    // The user is not logged in
    echo "<p><a id='loginbtn' href='../HTML/Login.php'>Login</a></p>";
}
?>

    </div>
    
   <div class="latestrecords">
    <h3 style="text-align:center;">Transaction</h3>
    <?php
if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>TransactionID</th>
        <th>ItemNumber</th>
        <th>Quantity</th>
        <th>Cartstatus</th>
    </tr>";

while ($row = $result->fetch_assoc()) {
echo "<tr>
        <td>" . $row['TransactionID'] . "</td>
        <td>" . $row['ItemNumber'] . "</td>
        <td>" . $row['Quantity'] . "</td>
        <td>" . $row['Cartstatus'] . "</td>
      </tr>";
}

    echo "</table>";
} else {
    echo "No records found";
}

?>

<button class="cancelorderbtn" onclick='cancelShop()'>Cancel</button>

<script src="../JS/MyAccount.js"></script>

<div class="specificdate">    
    <h4 style="text-align:center;">Apply Filter</h4>
    <form action="" method="post">
    <!-- <label for="selectedOption">Select Filter Option:</label> -->
    <select id="selectedOption" name="selectedOption" required>
        <option value="specificMonth">Specific Month</option>
        <option value="last3Months">Last 3 Months</option>
        <option value="specificYear">Specific Year</option>
    </select>

    <!-- <label for="selectedValue">Enter Month/Year:</label> -->
    <input type="text" id="selectedValue" name="selectedValue" placeholder="Enter Month or Year" >

    <input type="submit" value="Get Data">
</form>
</div>



<div>
<div class="latestrecords">
    <h3 style="text-align:center;">Filtered Data</h3>
    <?php
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


// last 3 month, specified year and month
$selectedOption = "";
$selectedValue = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $selectedOption = $_POST['selectedOption'];
    $selectedValue = $_POST['selectedValue'];
}


$sqlSwitch = "";

switch ($selectedOption) {
    case 'specificMonth':
        // Show transactions in a specific month
        $sqlSwitch = "SELECT t.TransactionID as ID, t.TransactionDate AS TDATE,t.TransactionID as TID, t.TransactionStatus AS STATUS, t.Totalprice AS PRICE
        FROM Transactions t
        JOIN Carts c ON c.TransactionID = t.TransactionID
        WHERE CustomerID = '$customerID'
          AND MONTH(t.TransactionDate) = '$selectedValue'
          GROUP BY t.TransactionID";
        break;
    case 'last3Months':
        // Show transactions in the last 3 months
        $sqlSwitch = "SELECT t.TransactionID as ID, t.TransactionDate AS TDATE, t.TransactionStatus AS STATUS, t.Totalprice AS PRICE
        FROM Transactions t
        JOIN Carts c ON c.TransactionID = t.TransactionID
        WHERE CustomerID = '$customerID'
          AND t.TransactionDate >= CURDATE() - INTERVAL 3 MONTH
          GROUP BY t.TransactionID";
        break;
    case 'specificYear':
        // Show transactions in a specific year
        $sqlSwitch = "SELECT t.TransactionID as ID, t.TransactionDate AS TDATE, t.TransactionStatus AS STATUS, t.Totalprice AS PRICE
        FROM Transactions t
        JOIN Carts c ON c.TransactionID = t.TransactionID
        WHERE CustomerID = '$customerID'
          AND YEAR(t.TransactionDate) = '$selectedValue'
          GROUP BY t.TransactionID";
        break;
    default:
        // No specific option selected
        // You can handle this case based on your requirements
        break;
}

$resultSwitch = $conn->query($sqlSwitch);

// Check if the query was successful
if ($resultSwitch === false) {
    die("Error executing the query: " . $conn->error);
}





if ($resultSwitch->num_rows > 0) {
    echo "<table border='1'>
    <tr>
        <th>TransactionID</th>
        <th>Date</th>
        <th>Status</th>
        <th>Price</p>
    </tr>";

while ($row = $resultSwitch->fetch_assoc()) {
echo "<tr>

        <td>" . $row['ID'] . "</td>
        <td>" . $row['TDATE'] . "</td>
        <td>" . $row['STATUS'] . "</td>
        <td>" . $row['PRICE'] . "</td>
      </tr>";
}

    echo "</table>";
} else {
    echo "No records found";
}

// Close your database connection here
// $conn->close();
// echo "<a id='logoutbtn' href='../HTML/MyAccount.php?action=cancelShop'>cancel</a>";
?>
</div>


</div>





</div>






<!-- Footer part -->
<!-- <footer>

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
    
</div>

</footer> -->
<script src="../JS/MyAccount.js"></script>
</body>

</html>