<?php
// Start the session
session_start();

include '../db/db.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $sql = "SELECT * FROM landlords WHERE Email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $landlord =$stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            $_SESSION['landlord-id']=$landlord['id'];
            $_SESSION['landlord-name']=$landlord['FullName'];
            $_SESSION['landlord-Email']=$landlord['Email'];
            $_SESSION['landlord-PhoneNumber']=$landlord['PhoneNumber'];

            header('location:../landlord/landlord_dashboard.php');
            exit();
            
        } else {
            // User with the provided email does not exist
            $_SESSION['login']="<div class='failure'>Invalid Email or Password</div>";
            header('location:../landlord/landlord_login.php');
            // echo "Invalid email or password";
        }
    } catch (PDOException $e) {
        // Log the error or handle it appropriately
        echo "Error: Something went wrong with the login.";
    }
}
?>
