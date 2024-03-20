
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


<!-- External Style Sheet -->
<link rel="stylesheet" href="../CSS/mystyle.css">
<style>

.formcontainer{
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    width:50%;
    margin-top:2%;
    margin-left:25%;
    margin-right:25%;
    /* border: 1px solid black; */
    padding-top: 5px;
    padding-left: 5px;
    padding-right: 5px;
    padding-bottom: 5px;
    
}

#gender{
    width: 50%;
    margin-left: 25%;
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
    
        <h2>Contact Us</h2>
        
    </div>
    <div class="maincontent">

       
            <form id="contactusform" onsubmit="jsValidations(event)">
                <h2 style="text-align: center;">Contact US</h2>
                <input type="text" id="firstName" name="firstName" placeholder="First Name" required><br>
        
                
                <input type="text" id="lastName" name="lastName" placeholder="Last Name" required><br>
        
                <div id="gender">
                <label>Gender:</label>
                <input type="radio" id="male" name="gender" value="Male"> Male
                <input type="radio" id="female" name="gender" value="Female"> Female
            </div>
                <br>
        
                
                <input type="text" id="phoneNumber" name="phoneNumber" placeholder="(999)999-9999" maxlength="14" required><br>
        
               
                <input type="email" id="email" name="email" placeholder="Email" required><br>
        
                
                <textarea id="comment" name="comment" placeholder="your comments" rows="4" required></textarea><br>
        
                <input type="submit" value="Submit">
            </form>
        

            <p style="color: red;" id="errors"></p>

      

        

        
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


<script src="../Js/Validations.js"></script>

</body>
</html>