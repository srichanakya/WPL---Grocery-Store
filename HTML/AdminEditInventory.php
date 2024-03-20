<?php

session_start();

$admins = $_SESSION['FirstName'];

if($admins !== "chanakyaadmin"){
    header("Location: ../HTML/Login.php");
    exit();
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
<link rel="stylesheet" href="../CSS/edit.css">
<style>
  
  .container{
    width:100%;
    height:100vh;
    /* border:1px solid red; */
    display:flex;
    flex-direction:column;
    /* justify-content:space-evenly; */
   
  }

    

    #loginuser{
        font-size:16px;
        width:80%;
        margin-left:10%;
        text-align:right;
        /* border:1px solid red; */
    }

    #dashboard {
        display: block;
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


    .getform{
       
        width:80%;
        height:20vh;
        margin-left:10%;
        margin-top:5%;
        /* border:1px solid red; */
    }
    #itemsear{
        color:black;
    }

    .displayform{
        padding-top:2%;
        width:20%;
        height:30vh;
        margin-left:40%;
        /* margin-top:5%; */
        /* border:1px solid red; */
    }

    .display1{
        /* border:3px solid red; */
        width:20vw;
        margin-left:40%;
        border-radius:10px;
    }
#updatebtn{
  
   width:40%;
   height:4vh;
   font-weight:bold;
   border: 1px solid #50C878;
   border-radius:10px;
    margin-top:3%;
    margin-left:30%;
   background-color:#50C878;
   transition:0.2s
}
#updatebtn:hover{
    border: 1px solid #50C878;
    background-color:transparent;
}

   
</style>
</head>
<body>
    <!-- Header part -->
    <header>
        <img class="logo" src="../Assets/storelogo.png" alt="logo">
    </header>


    <!-- Navigation part -->

    <?php
echo "<h1 id='loginuser'>Login as: $admins</h1>";

?>
<a id='dashboard' href='../HTML/Dashboard.php'>Dashboard</a>
<div class="container">
   

    
   
<div class="getform">
<div class="form__group field">
    <input type="input" class="form__field" placeholder="Name" required="" id="itemsear" value="">
    <label for="name" class="form__label">Item Number</label>
</div>
<button class="cta" onclick="getData()">
    <span class="hover-underline-animation"> Get Data </span>
    <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
        <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
    </svg>
</button>
</div>


       

        <div class="displayform">
            <input class="display1" id="productitem" placeholder="Item Number" type="text" value="" disabled>
            <input class="display1" id="productname" placeholder="Item Name" type="text" value="" disabled>
            <input class="display1" id="productprice" placeholder="Item Price" type="text" value="">
            <input class="display1" id="productquantity" placeholder="Item Quantity" type="text" value="">
            <button onclick="updateInventory()" id="updatebtn">Update</button>
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


<script src="../JS/EditInventory.js"></script>


</body>
</html>
































