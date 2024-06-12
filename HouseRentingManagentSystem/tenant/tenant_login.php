<?php
include'../backend/tenant-login.php';
?>
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
        text-decoration: none;
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
        width: 80%;
        padding: 2rem; /* Optional: Add padding for better visual appearance */
        border: 1px solid #ccc; /* Optional: Add border for better visual separation */
        border-radius: 8px; /* Optional: Add border-radius for rounded corners */
        background-color: #f9f9f9; /* Optional: Add background color for better contrast */
    }
    input{
        padding: 5px 5px 5px 5px;
    }
    form a{
        text-decoration: none;
    }
    .failure{
        color: red;
    }
    .text-center{
        text-align: center;
    }
    </style>
</head>
<body>
<div class="from-body">
    <form action="../backend/tenant-login.php" method="post" > 
        <h2 class="text-center">SIGN IN</h2>
        <br>
        <?php
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>     
        <label for="email">Enter your email</label>
        <input type="email" name="email" id="email" placeholder="youremail.com">

        <label for="password">Enter your password</label>
        <input type="password" name="password" id="password" placeholder="@@@@@@@@">

        <input type="submit" name="submit" value="Login">

        <p>Don't have an account ? <a href="tenant_registration.php">Sign up</a></p>

    </form>
</div>
</body>
</html>