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
        .container{
        width:80%;
        margin: 0 auto;
        padding-top:30px;
        }
        .courses__container{
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;    
        }
        *{
          text-decoration: none;
        }
        .btn{
            display: inline-block;
            background: #088178;
            color: var(--color-black);
            padding: 1rem 2rem;
            border: 1px solid transparent;
            font-weight: 500;
            transition: var(--transition);
        }
        .btn-primary{
            background: #088178;
            color: #fff;
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
          <a href="#">Kinondoni</a>
          <a href="#">Ubungo</a>
          <a href="#">Temeke</a>
          <a href="#">Ilala</a>
          <a href="#">Kigamboni</a>
        </div>
      </li>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Records</a></li>
      <li><a href="#">Logout</a></li>
    </ul>
  </div>

  <div class="content">
    <h2>Houses</h2>

    <?php if (!empty($houses)) : ?>
    <div class="courses courses__container">
        <?php foreach ($houses as $house) : ?>
            <article class="course">
                <div class="course__image">
                    <?php if (!empty($house['HouseImage'])) : ?>
                        <img src="<?php echo htmlspecialchars($house['HouseImage']); ?>" alt="House Image" height="200px">
                    <?php else : ?>
                        <img src="path/to/default_image.jpg" alt="No image available">
                    <?php endif; ?>
                </div>
                <div class="course__info">
                    <h4><?php echo htmlspecialchars($house['FullName']); ?></h4>
                    <p>
                        <strong>District:</strong> <?php echo htmlspecialchars($house['District']); ?><br>
                        <strong>Number of Rooms:</strong> <?php echo htmlspecialchars($house['NumberRooms']); ?><br>
                        <strong>Email:</strong> <?php echo htmlspecialchars($house['Email']); ?><br>
                        <strong>Phone Number:</strong> <?php echo htmlspecialchars($house['PhoneNumber']); ?>
                    </p>
                    <a href="../application/application.php?house_id=<?php echo htmlspecialchars($house['id']); ?>" class="btn btn-primary">Apply For House</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <p>No houses found in the specified district.</p>
<?php endif; ?>


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
