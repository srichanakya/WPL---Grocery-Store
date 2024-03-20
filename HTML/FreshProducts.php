

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
        <p>"
<strong>Fresh products</strong> in grocery stores encompass a wide range of items, including fruits, vegetables, meat, seafood, and more. They are known for their high nutritional value, seasonal variety, and importance in promoting a healthy diet. Grocery stores often prioritize sourcing locally and reducing waste to provide consumers with the freshest and most sustainable options. These products are a cornerstone of the farm-to-table movement, reflecting a growing awareness of the benefits of knowing where our food comes from and supporting local economies."</p>
    
<h4 id="currentdatetime"></h4>
</div>
    <div class="maincontent">
    <div class="allmc">
        <h1 class="allheading">Fresh Products</h1>
        
        <select id="category-dropdown" onchange="onCategoryChange()">
            <option value="freshproducts">Shop All</option>
            <option value="vegetables-fresh">All Vegetables</option>
            <option value="fruits-fresh">All Fruits</option>
            <option value="precut-fresh">Pre-cut Fruits</option>
            <option value="flowers-fresh">Flowers</option>
            <option value="salsaanddips-fresh">Salsa and Dips</option>
            <option value="seasonproduce-fresh">Season Produce</option>
            <option value="newitems-fresh">New Items</option>
            <option value="rollbacks-fresh">Rollbacks</option>
          </select>
        
    <div class="cardcontainer" id="veg">
            

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

<script src="../Js/datetime.js"></script>
<script src="../JS/FreshProducts.js"></script>
<!-- <script src="../Js/Cart.js"></script> -->

</body>
</html>