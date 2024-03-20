

<?php


session_start();



if(!isset($_SESSION['FirstName'])){
    header("Location: ../HTML/Login.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Products</title>


<!-- External Style Sheet -->
<link rel="stylesheet" href="../CSS/mystyle.css">
<link rel="stylesheet" href="../CSS/cardstyle.css">
<style>

/* Add this CSS to your stylesheet or in a <style> tag in your HTML */
#Container {
    margin-top: 20px;
}

table {
    border-collapse: collapse;
    width: 100%;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}


    </style>


</head>
<body onload="myfunction1()">
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
    <div class="side">
        <h1 class="funfact">Fun Fact</h1>
        <!-- <img src="../Assets/freshproducts.jpg" alt="strawberry"> -->
        
    
<h4 id="currentdatetime"></h4>
</div>
    <div class="maincontent">
    <div class="allmc">
        <h1 class="allheading">Cart</h1>
        
    <div id="TransactionID">
    
    </div>

    <div id="Container">
    
    </div>
    

   
    </div>

    </div>

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

<script src="../JS/datetime.js"></script>
<script src="../JS/Cart.js"></script>
<!-- <script src="../Js/Cart.js"></script> -->

</body>
</html>