

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
    <title>Grocery Store</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
    <div class="side" style="background-color: #FFA726;">
    <h1 class="funfact">Fun Facts</h1>
    <p>Breakfast is a diverse and culturally rich meal enjoyed worldwide. It encompasses a wide range of dishes and traditions, from the hearty Full English Breakfast in the UK to the delicate pastries of a Continental Breakfast in Europe, and the savory flavors of Japanese miso soup and grilled fish. Each culture and region brings its unique flavors and ingredients to the breakfast table, making it a fascinating and delicious aspect of global cuisine.</p>
    <h4 id="currentdatetime"></h4>   
</div>
    <div class="maincontent">
        <div class="allmc">
            <h1 class="allheading" style="border-color: #FFA726;">Breakfast & Cereal</h1>
            <select id="category-dropdown" onchange="onCategoryChange()">
                <option value="breakfast">Shop All</option>
                <option value="cereal-breakfast">The Cereal Shop</option>
                <option value="pancake-breakfast">Pancake & Waffles</option>
                <option value="bread-breakfast">Breakfast Bread</option>
                <option value="oatmeal-breakfast">Oatmeal & Grits</option>
                <option value="rollbacks-breakfast">Rollbacks</option>
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
<!-- <script src="../Js/Breakfast.js"></script> -->
<!-- <script src="../Js/Products.js"></script>
<script src="../Js/Cart.js"></script> -->
<!-- <script src="../Js/breakfast_cereal.js"></script> -->
</body>
</html>