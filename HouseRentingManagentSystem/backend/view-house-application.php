<?php
// fetch-applications.php

session_start();
include '../db/db.php';

// Check if landlord is logged in
if (!isset($_SESSION['landlord-id'])) {
    header("Location:../landlord/landlord_login.php"); // Redirect to login page if not logged in
    exit();
}

$landlord_id = $_SESSION['landlord-id'];

// Fetch applications for houses owned by the landlord
$sql = "
    SELECT ha.id AS ApplicationID, ha.FullName, ha.Email, ha.gender, ha.relation_status, ha.occupation, ha.TenantResponse
    FROM houseapplications ha
    JOIN lat ON ha.id = lat.ApplicationID
    JOIN houses h ON lat.id = h.id
    WHERE h.landlordID = :landlord_id
";

$stmt = $conn->prepare($sql); // Assuming $conn is your database connection variable
$stmt->execute(['landlord_id' => $landlord_id]);
$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Pass the applications data to the presentation layer via session
$_SESSION['applications'] = $applications;

// Redirect to the view page
header("Location:../landlord/view_house_application.php");
exit();
?>
