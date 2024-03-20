



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
    <ul>
        <li>Frozen items can help reduce food waste since they have a longer shelf life than their fresh counterpart</li>
        <br/>
        <li> Because freezing is a natural preservation method, many frozen pantry items do not require the addition of artificial preservatives. They maintain their quality and nutritional value without the need for chemicals</li>
    </ul>
    
    </div>
    <div class="maincontent">

        <div class="allmc">
            <h1 class="allheading" style="border-color: #F8BBD0;">Frozen Products</h1>
            <select id="category-dropdown" onchange="onCategoryChange()">
                <option value="frozen">Shop All</option>
                <option value="breakfast-frozen">Frozen Breakfast</option>
                <option value="dessert-frozen">Frozen Dessert</option>
                <option value="meals-frozen">Frozen Meals</option>
                <option value="pizza-frozen">Frozen Pizza</option>
                <option value="meat-frozen">Frozen Meat</option>
                <option value="snacks-frozen">Frozen Snacks</option>
                <option value="rollbacks-frozen">Rollbacks</option>
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
<!-- <script src="../Js/Products.js"></script> -->
<!-- <script src="../Js/Cart.js"></script> -->
<!-- <script src="../Js/FrozenProducts.js"></script> -->
<script src="../JS/FreshProducts.js"></script>
</body>
</html>