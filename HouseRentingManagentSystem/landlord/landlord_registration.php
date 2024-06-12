<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        display: flex;
        justify-content: center; /* Horizontally center the content */
        align-items: center; /* Vertically center the content */
        height: 100vh; /* Ensure the body covers the entire viewport height */
    }

    .form-body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 90%;
        padding: 2rem; /* Optional: Add padding for better visual appearance */
        border: 1px solid #ccc; /* Optional: Add border for better visual separation */
        border-radius: 8px; /* Optional: Add border-radius for rounded corners */
        background-color: #f9f9f9; /* Optional: Add background color for better contrast */
    }
    input{
        padding: 5px 5px 5px 5px;
    }
    .text-center{
        text-align: center;
    }
    </style>
</head>
<body>
<div class="from-body">
    <form action="../backend/landlord-registration.php" method="post" onsubmit="return ValidateForm()" >
        <h2 class="text-center">LandLord Registration</h2>
        <label for="fullname">Enter you full name</label>
        <input type="text" name="fullname" id="fullname" placeholder="John Doe" autofocus>

        <label for="phonenumber">Enter your phone number</label>
        <input type="tel" name="phonenumber" id="phonenumber" placeholder="+255 628 152 209">

        <label for="email">Enter your email</label>
        <input type="email" name="email" id="email" placeholder="youremail.com">

        <label for="password">Enter your password</label>
        <input type="password" name="password" id="password" placeholder="@@@@@@@@">
        <span id="error-password" class="error"></span>

        <label for="cpassword">Confirm password</label>
        <input type="password" placeholder="@@@@@@@@">
        <span id="error-cpassword" class="error"></span>

        <input type="submit" name="submit" value="Register">

    </form>
</div>

<script>
    function ValidateForm(){
        document.getElementById('error-password').innerHTML="";
        document.getElementById('error-cpassword').innerHTML="";

        var passwrod = document.getElementById('password').value;
        var cpassword = document.getElementById('cpassword').value;

        if(password !== cpassword){
            document.getElementById('error-cpassword').innerHTML="Password did not match";
        }
    }
</script>
</body>
</html>