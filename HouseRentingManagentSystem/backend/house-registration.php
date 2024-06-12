<?php
// Include the database connection file
require_once('../db/db.php');

// Start the session
session_start();

// Check if landlord's ID is set in the session
if(isset($_SESSION['landlord-id'])) {
    // Retrieve landlord's ID from the session
    $landlordID = $_SESSION['landlord-id'];

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $numberRooms = $_POST['NumberRooms'];
        $address = $_POST['Address'];
        $district = $_POST['District'];

        // File upload handling
        $targetDirectory = "../HouseImage_uploads/"; // Directory where the file will be saved
        $targetFile = $targetDirectory . basename($_FILES["HouseImage"]["name"]); // Full path to the uploaded file
        $uploadOk = 1; // Flag to indicate if the upload is successful

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["HouseImage"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["HouseImage"]["size"] > 5000000) { // 5MB limit
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["HouseImage"]["tmp_name"], $targetFile)) {
                // Prepare the SQL statement
                $stmt = $conn->prepare("INSERT INTO houses (landLordID, NumberRooms, HouseAddress, District, HouseImage) VALUES (?, ?, ?, ?, ?)");

                // Bind parameters
                $stmt->bindParam(1, $landlordID);
                $stmt->bindParam(2, $numberRooms);
                $stmt->bindParam(3, $address);
                $stmt->bindParam(4, $district);
                $stmt->bindParam(5, $targetFile); // Save the file path to the database

                // Execute the statement
                $stmt->execute();

                // If insertion is successful, redirect to a success page or do something else
                $_SESSION['registered']="<div class='success'>House registered successfully</div>";
                header("Location:../landlord/house_registration.php");
                exit();
            } else {
                // File upload failed, output the specific error message
                switch ($_FILES["HouseImage"]["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "The uploaded file was only partially uploaded.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "No file was uploaded.";
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        echo "Missing a temporary folder. Check your PHP configuration.";
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        echo "Failed to write file to disk. Check permissions for the upload directory.";
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        echo "A PHP extension stopped the file upload.";
                        break;
                    default:
                        echo "Sorry, there was an error uploading your file.";
                        break;
                }
            }
        }
    }
} else {
    // Landlord ID not set in session, handle this case
    echo "Landlord ID not found in session.";
}
?>
