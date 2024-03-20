

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
<style>
    .card{
       width: 20%;
    }
</style>

<!-- External Style Sheet -->
<link rel="stylesheet" href="../CSS/mystyle.css">
<link rel="stylesheet" href="../CSS/cardstyle.css">

</head>
<body onload="myfunction4()">
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
    <h1 class="funfact">Fun Fact</h1>
    <p><strong>World's Oldest Candy:</strong> One of the world's oldest known candies is thought to be licorice, which has been enjoyed for thousands of years. It was discovered in ancient Egyptian tombs, and some sources suggest that licorice roots were found in King Tutankhamun's tomb. This ancient sweet treat has a fascinating history that spans civilizations and centuries.</p>
    </div>
    <div class="maincontent">
        <div class="allmc">
            <h1 class="allheading" style="border-color: #FFA726;">Candies</h1>
           <div class="searchfunction">
            <input type="text" placeholder="search for candy" id="search">
            <input type="submit" value="search" onclick="searchfunction()" id="searchbtn">
        </div>
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


<script src="../JS/searchInventory.js"></script>

<!-- <script src="../Js/Products.js"></script> -->
<!-- <script src="../Js/Candy.js"></script> -->
<!-- <script src="../Js/Cart.js"></script> -->

</body>
</html>