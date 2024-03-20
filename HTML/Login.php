
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f4; */
            background-image: url('../Assets/bg2.jpg');
            background-repeat: no-repeat;
            background-size: cover; 
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #loginbtn{
            font-weight:bold;
        }
        #home{
            font-weight:bold;
            color:white;
        }
        a{
            text-decoration:none;
            color:blue;  
        }
    </style>
</head>
<body>

<button><a id="home" href="../HTML/MyAccount.php">My Account</a></button>
    <div class="container">
        <h2>Login</h2>
        <form action="../PHP/LoginProcess.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button id="loginbtn" type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="../HTML/Registration.php">Register here</a></p>
    </div>

    <?php


?>
</body>
</html>
