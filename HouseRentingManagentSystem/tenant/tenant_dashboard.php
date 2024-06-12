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
    </style>
</head>
<body>
    <div class="dashboard-main">
    </div>
    <div class="sidebar">
    <h2>Dashboard</h2>
    <ul>
      <li><a href="#" class="active">Home</a></li>
      <li><a href="#">Profile</a></li>
      <li class="dropdown">
        <a href="#" class="dropbtn">Houses</a>
        <div id="myDropdown" class="dropdown-content">
          <a href="../backend/view-houses.php?house_district=Kinondoni">Kinondoni</a>
          <a href="../backend/view-houses.php?house_district=Ubungo">Ubungo</a>
          <a href="../backend/view-houses.php?house_district=Temeke">Temeke</a>
          <a href="../backend/view-houses.php?house_district=Ilala">Ilala</a>
          <a href="../backend/view-houses.php?house_district=Kigamboni">Kigamboni</a>
        </div>
      </li>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Records</a></li>
      <li><a href="#">Logout</a></li>
    </ul>
  </div>

  <div class="content">
    <h2>Home</h2>
  </div>

  <script src="../js/main.js"></script>
  <script>
    // Toggle function to display dropdown from below
    function toggleDropdown() {
      var dropdownContent = document.getElementById("myDropdown");
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    }
  </script>
</body>
</html>
