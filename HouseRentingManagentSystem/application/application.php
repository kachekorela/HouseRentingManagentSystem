<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .main-application {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .main-application-heading {
            font-size: 1.5em;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, select {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            padding: 0;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="main-application">
        <div class="main-application-heading">
            House Application
        </div>
        <form action="../backend/house-application.php" method="POST" enctype="multipart/form-data">
            <?php
            // Capture the house_id from the URL
            $house_id = isset($_GET['house_id']) ? htmlspecialchars($_GET['house_id']) : '';
            ?>
            <!-- Hidden input to hold house_id -->
            <input type="hidden" name="house_id" value="<?php echo $house_id; ?>">

            <label for="FullName">Enter Your Full Name</label>
            <input type="text" name="FullName" id="FullName" placeholder="John Doe" required>

            <label for="PhoneNumber">Enter Your Phone Number</label>
            <input type="tel" name="PhoneNumber" id="PhoneNumber" placeholder="123-456-7890" required>

            <label for="Email">Enter Your Email</label>
            <input type="email" name="Email" id="Email" placeholder="john.doe@example.com" required>

            <label for="Gender">Select Your Gender</label>
            <select name="Gender" id="Gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="RelationStatus">Enter Your Relation Status</label>
            <input type="text" name="RelationStatus" id="RelationStatus" placeholder="Single/Married/etc." required>

            <label for="Occupation">Enter Your Occupation</label>
            <input type="text" name="Occupation" id="Occupation" placeholder="Your occupation" required>

            <label for="Letter">Upload Your Application Letter</label>
            <input type="file" name="Letter" id="Letter" required>

            <button type="submit" name="submit">Submit Application</button>
        </form>
    </div>
</body>
</html>
