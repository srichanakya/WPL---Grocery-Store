




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background-image: url('../Assets/background.jpg');
            background-repeat: no-repeat;
            background-size: cover; 
            height:150vh;
        }

        .container {
            max-width: 50%;
            margin-left:25%;
            margin-top:5%;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1%;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        #registerbtn{
            width:50%;
            margin-left:25%;
            font-weight:bold;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #registerbtn:hover{
            background-color: #45a049;
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
        <h2 style="text-align:center;">Customer Registration Form</h2>
        <form id="registrationForm" onsubmit="return validateForm(event)" action="../PHP/RegistrationProcess.php" method="post">
        <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>

            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" required>
            </div>    
        
            <div class="form-group">
                <label for="dob">Date of Birth (MM/DD/YYYY):</label>
                <input type="text" name="dob" id="dob" placeholder="MM/DD/YYYY" required>
            </div>

        <div class="form-group">
                <label for="username">User Name:</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirmPassword" required>
            </div>

            <div class="form-group">
                <label for="phonenumber">PhoneNumber</label>
                <input type="text" name="phonenumber" id="phonenumber" required>
            </div>
            

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
            </div>

            <div class="form-group">
                <input id="registerbtn" type="submit" value="Register">
            </div>
        </form>

        <p>Already have an account? <a href="Login.php">Login here</a></p>
    </div>


<script>
    function validateForm(event) {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            var firstname = document.getElementById('firstname').value;
            var lastname = document.getElementById('lastname').value;
            var dob = document.getElementById('dob').value;
            var email = document.getElementById('email').value;

            console.log(username+","+password+","+confirmPassword+","+dob)
            var errors = [];

            if (!username || !password || !confirmPassword || !firstname || !lastname || !dob || !email) {
                errors.push('All fields are required');
                alert("All fields are required")
                return false;
               
            }

            if (password !== confirmPassword) {
                errors.push('Passwords do not match');
                alert("Password not matched")
                return false;
            }

            if (password.length < 8) {
                errors.push('Password must be at least 8 characters');
                alert("Password must be at least 8 characters")
                return false;
            }

            if (!/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/.test(dob)) {
                errors.push('Invalid date of birth format');
                alert("Please enter a valid Date of Birth in MM/DD/YYYY format");
                return false;
            }

            if (!/^\S+@\S+\.\S+$/.test(email)) {
                errors.push('Invalid email format');
                alert("Invalid email");
                return false;
            }

            if (errors.length > 110) {

                alert(errors.join('\n'));
                // event.preventDefault()
                return false; // Prevent form submission
            }

            alert("Registered Successfully")
            return true; // Allow form submission
        }
    </script>


</body>
</html>
