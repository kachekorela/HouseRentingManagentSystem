<?php
// Start the session
session_start();

include '../db/db.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $sql = "SELECT * FROM tenants WHERE Email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $tenant =$stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            $_SESSION['tenant-id']=$tenant['id'];
            $_SESSION['tenant-name']=$tenant['FullName'];
            $_SESSION['tenant-Email']=$tenant['Email'];
            $_SESSION['tenant-PhoneNumber']=$tenant['PhoneNumber'];

            header('location:../tenant/tenant_dashboard.php');
            exit();
            
        } else {
            // User with the provided email does not exist
            $_SESSION['login']="<div class='failure'>Invalid Email or Password</div>";
            header('location:../tenant/tenant_login.php');
            // echo "Invalid email or password";
        }
    } catch (PDOException $e) {
        // Log the error or handle it appropriately
        echo "Error: Something went wrong with the login.";
    }
}
?>
