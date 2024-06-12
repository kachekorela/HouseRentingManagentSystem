<?php
// Include your database connection file
session_start();
include '../db/db.php';  // Adjust the path as needed

if (isset($_POST['submit'])) {
    $house_id = $_POST['house_id'];
    $full_name = $_POST['FullName'];
    $phone_number = $_POST['PhoneNumber'];
    $email = $_POST['Email'];
    $gender = $_POST['Gender'];
    $relation_status = $_POST['RelationStatus'];
    $occupation = $_POST['Occupation'];
    $letter = $_FILES['Letter'];

    // Validate and process the form data as needed
    // Save the uploaded file to the ../ApplicationFiles directory
    $upload_dir = '../ApplicationFiles/';
    $upload_file = $upload_dir . basename($letter['name']);
    
    if (move_uploaded_file($letter['tmp_name'], $upload_file)) {
        try {
            // Start a transaction
            $conn->beginTransaction();

            // Insert into houseApplications table
            $stmt1 = $conn->prepare("INSERT INTO houseApplications (FullName, PhoneNumber, Email, gender, relation_status, occupation, applicationLetter) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt1->execute([$full_name, $phone_number, $email, $gender, $relation_status, $occupation, $upload_file]);
            $house_application_id = $conn->lastInsertId();

            // Assuming you have tenant ID from session or another source
            $tenant_id = $_SESSION['tenant-id']; // Example, adjust as needed

            // Insert into houseTenants table
            $stmt2 = $conn->prepare("INSERT INTO lat (houseID, ApplicationID, TenantID) VALUES (?, ?, ?)");
            $stmt2->execute([$house_id, $house_application_id, $tenant_id]);

            // Commit the transaction
            $conn->commit();

            echo "Application submitted successfully!";
        } catch (PDOException $e) {
            // Rollback the transaction if something failed
            $conn->rollBack();
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Failed to upload the application letter.";
    }
}
?>
