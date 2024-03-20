
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

#quiz {
            visibility: hidden;
        }
       
    .questioncontainer{
        text-align: center;
    }
    .card {
            width: 30%;
            height: 60vh;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
             display: flex;
            flex-direction: column;
            align-items: center; /* Center horizontally */
            justify-content: center;
    }

    .card img {
            max-width: 100%;
            height: auto;
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
    <h1 class="funfact">Fun Fact</h1>
    <p>Specialty shops are retail stores that specialize in offering a narrow and specific range of products within a particular niche or category. They are known for their expertise, personalized service, and focus on unique, high-quality, or hard-to-find items related to their chosen specialty. These shops cater to customers with specific interests and passions, providing a curated and often exceptional shopping experience.</p>
    </div>
    <div class="maincontent">
        <div class="allmc">
            <h1 class="allheading" style="border-color: #FFA726;">Speacialty Shops</h1>
    
        <div class="questioncontainer">
            <button id="start" onclick="startTimer()">Special Offer!!!</button>
        <div id="quiz">

            <h2>Special Offer Questions</h2>
            <div id="quizarea">
                <p id="question">Are you 18 years old?</p>
                <input type="radio" name="age" value="Yes" id="yes"> Yes
                <input type="radio" name="age" value="No" id="no"> No
                <br>
                <button id="next" onclick="nextQuestion()">Next</button>
                <button id="skip" onclick="nextQuestion()">Skip</button>
            </div>
            <br>
            <p id="qualification"></p>
            <p id="offerAmount"></p>
            <p id="reason"></p>
            <p id="total-time"></p>
        </div>
              
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
<script src="../JS/SpecialityShop.js"></script>
</body>
</html>