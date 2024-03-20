<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Store</title>


<!-- External Style Sheet -->
<link rel="stylesheet" href="../CSS/mystyle.css">

<style>
   body{
    background-image: url(../Assets/deals/Deal.png);
    background-repeat: round;
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
    <div class="side" style="background-color: #FFA726; opacity:0.9;">
    
        <h1 style="color: white;" class="funfact">Fun <span>2</span> Fact</h1>
        <p style="color: white;">Black Friday, originally a term used to describe post-Thanksgiving shopping chaos, has evolved into a major retail event known for its massive discounts and the start of the holiday shopping season.</p>
        <p style="color: white;">Deals, often associated with discounts or special offers, are arrangements in which products or services are sold at reduced prices or with added benefits. They are a common marketing strategy used by businesses to attract customers and boost sales.</p>
    </div>
    <div class="maincontent dealsmc">
        <div class="allmc">
            <h1 class="allheading" style="border-color: #FFA726;">Deals</h1>
            <img id="dealsimg" src="../Assets/deals/Deal.png" alt="deals" width="50" height="50" >
            <!-- <p>For Fresh Product Deals <a href="FreshProducts.html" class="dealtags">Click here</a></p>
            <p>For Candy Deals <a href="Candy.html" class="dealtags">Click here</a></p>
            <p>For Snacks Deals <a href="Snacks.html" class="dealtags">Click here</a></p>
            <p>For Snacks Deals <a href="Breakfast.html" class="dealtags">Click here</a></p> -->
        </div>


        <ul class="dealtags1">
            <li>For Fresh Product Deals</li>
            <li><a href="../HTML/FreshProducts.php" class="dealtags">Click here</a></li>
        </ul>

        <ul class="dealtags1">
            <li>For Snacks Deals</li>
            <li><a href="../HTML/Snacks.php" class="dealtags">Click here</a></li>
        </ul>

        <ul class="dealtags1">
            <li>For Candy Deals</li>
            <li><a href="../HTML/Candy.php" class="dealtags">Click here</a></li>
        </ul>


        
    <h1 class="moredeals">More deals soon......</h1>
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

</body>
</html>