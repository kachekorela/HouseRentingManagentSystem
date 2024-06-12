
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #222;
        padding-top: 20px;
        }

        .sidebar h2 {
        color: #fff;
        text-align: center;
        }

        .sidebar ul {
        list-style-type: none;
        padding: 0;
        }

        .sidebar ul li {
        padding: 10px;
        }

        .sidebar ul li a {
        color: #fff;
        text-decoration: none;
        display: block;
        }

        .sidebar ul li a:hover {
        background-color: #555;
        }

        .content {
        margin-left: 250px;
        padding: 20px;
        }
        .success{
          color: green;
        }

        /* Dropdown Button */
        .dropbtn {
          color: white;
          padding: 10px;
          font-size: 16px;
          border: none;
          cursor: pointer;
          width: 100%;
          text-align: left;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
          display: block;
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
    .success{
      color: green;

    }
    .failure{
      color: red;
    }
        
    </style>
</head>
<body>
    <div class="dashboard-main">
    </div>
    <div class="sidebar">
    <h2>Dashboard</h2>
    <ul>
      <li><a href="landlord_dashboard.php" class="active">Home</a></li>
      <li><a href="#">Profile</a></li>
      <li class="dropdown">
        <a href="#" class="dropbtn">Create</a>
        <div id="myDropdown" class="dropdown-content">
          <a href="house_registration.php">House Registration</a>
          <a href="#">STMP Settings</a>
        </div>
      </li>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Records</a></li>
      <li><a href="../backend/logout.php">Logout</a></li>
    </ul>
  </div>

  <div class="content">
    <h2>House Registration</h2>
    <div class="redirect-meassages text-center">
      <?php
      if(isset($_SESSION['registered'])){
        echo $_SESSION['registered'];
        unset($_SESSION['registered']);
      }
      ?>
    </div>
    <div class="from-body">
    <form action="../backend/house-registration.php" method="post" enctype="multipart/form-data">
    <h2 class="text-center">Register Your House</h2>
    <label for="NumberRooms">Enter The Number Of Rooms</label>
    <input type="text" name="NumberRooms" id="NumberRooms" placeholder="10" autofocus>

    <label for="Address">Enter Your House's Address</label>
    <input type="text" name="Address" id="Address" placeholder="Tabata , Ilala">

    <label for="District">Enter The House's District</label>
    <input type="text" name="District" id="District" placeholder="Ilala">

    <label for="HouseImage">Upload an Image of Your House</label>
    <input type="file" name="HouseImage" id="HouseImage">

    <input type="submit" name="submit" value="Register House">
</form>

</div>
  </div>

  <script src="../js/main.js"></script>
</body>
</html>
