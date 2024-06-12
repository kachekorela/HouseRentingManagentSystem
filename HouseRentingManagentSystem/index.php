<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMS Navigation</title>
    <style>
        /* CSS for navigation bar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .dropdown {
            float: left;
            overflow: hidden;
        }
        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 20px;
            background-color: inherit;
            margin: 0;
        }
        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: #ddd;
            color: black;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 160px;
            z-index: 1;
        }
        .dropdown-content a {
            float: none;
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="#">HRMS</a>
    <div class="dropdown">
        <button class="dropbtn">Login</button>
        <div class="dropdown-content">
            <a href="landlord/landlord_login.php">Landlord</a>
            <a href="tenant/tenant_login.php">Tenant</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Register</button>
        <div class="dropdown-content">
            <a href="landlord/landlord_registration.php">Landlord</a>
            <a href="tenant/tenant_registration.php">Tenant</a>
        </div>
    </div>
</div>

</body>
</html>
