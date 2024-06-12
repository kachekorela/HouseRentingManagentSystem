<?php
include'../db/db.php';
if(isset($_POST['submit'])){
    $fullname=$_POST['fullname'];
    $phonenumber=$_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try{
        $sql="insert into landlords(FullName,PhoneNumber,Email,password) values ('$fullname','$phonenumber','$email','$password')";
        $conn->exec($sql);
        header('location:../landlord/landlord_login.php');
    }
    catch(PDOException $e){
        echo"Something wrong with registration".$e->getMessage();
    }
}else{
    print"not submitted";
}
?>