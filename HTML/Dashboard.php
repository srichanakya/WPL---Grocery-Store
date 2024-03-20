<?php
session_start();

$adminname = $_SESSION['FirstName'];

if($adminname !== 'chanakyaadmin'){
    header("Location: ../HTML/Login.php");
}

function Logout(){
    session_destroy();
    header("Location: ../HTML/Login.php");
    exit();

}


?>


<?php



if (isset($_GET["action"]) && $_GET["action"] == "Logout") {
    Logout();
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

    .side{
        width:15%;
        height:80vh;
    }
    .maincontent{
        /* border:5px solid red; */
        height:80vh;
        width:100%;
    }
    .navigationbar{
        height:8vh;
        /* float:right; */
        text-align:right;
        margin-right:5%;
    }

    #welcomemsg{
        text-align:center;
        margin-top:10%;
    }
    
    #btncontainer{
        width:80%;
        /* border: 2px solid green; */
        height:50vh;
        margin-left:10%;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .dashboardbtns{
        text-decoration:none;
    }
    
    

    h4{
        margin-left:2.5%;
        width:95%;
        /* border:1px solid green; */
    }
    a {
        background-color:#446cb3;
        color: white;
        text-decoration: none;
        padding: 5px;
        margin: 5px;
        border: 1px solid #446cb3;
        border-radius: 4px;
        display: inline-block;
        transition: background-color 0.3s, color 0.3s;
    }

    a:hover {
        background-color: transparent;
        color: #446cb3;
    }

    #logoutbtn{
        background-color:red;
        border:1px solid red;
    }
    #logoutbtn:hover{
        background-color:transparent;
        color:red;
    }
    /* .dashboardbtns {
        background-color: #446cb3;
        color: white;
    }

    .dashboardbtns:hover {
        background-color: transparent;
        color: #fff;
    } */

    #addinventorybtn,
    #viewinventorybtn,
    #viewlowinventorybtn,
    #logoutbtn {
        display: block;
        margin-bottom: 10px;
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
   

    <?php
echo "<h4>Login as : $adminname</h4>"
?>
</div>

<div class="container">
    
    <div class="maincontent">
        <h3 style="margin-left:5%;">Admin Dashboard</h3>
 <?php

echo "<h1 id='welcomemsg' >Welcome $adminname</h1>";

?>
<div id="btncontainer">
<?php
echo "<a id='addinventorybtn' class='dashboardbtns' href='../HTML/AdminAddInventory.php'>Add Inventory</a><br>";
echo "<a id='viewinventorybtn' class='dashboardbtns' href='../HTML/AdminViewInventory.php'>View Inventory</a><br>";
echo "<a id='viewlowinventorybtn' class='dashboardbtns' href='../HTML/AdminViewLowInventory.php'>Low Inventory Items</a><br>";
echo "<a id='viewlowinventorybtn' class='dashboardbtns' href='../HTML/AdminViewAgeTransactions.php'>View customers age above 20</a><br>";
echo "<a id='viewlowinventorybtn' class='dashboardbtns' href='../HTML/AdminEditInventory.php'>Edit Inventory Items</a><br>";
echo "<a id='viewlowinventorybtn' class='dashboardbtns' href='../HTML/AdminTwoTransactions.php'>Customer Transactions</a><br>";
echo "<a id='viewlowinventorybtn' class='dashboardbtns' href='../HTML/AdminZipcode.php'>Search ZipCode</a><br>";
echo "<a id='logoutbtn' class='dashboardbtns' href='../HTML/Dashboard.php?action=Logout'>Logout</a>";

 ?>
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
    
    

</footer> -->

</body>
</html>


















