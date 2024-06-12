<?php
// Include your database connection file
include '../db/db.php';  // Adjust the path as needed

// Function to fetch houses and landlord information based on district
function getHousesDistrict($conn, $HouseDistrict) {
    // Initialize an empty array to store the results
    $results = array();

    try {
        // Prepare the SQL statement with a join to include landlord information
        $stmt = $conn->prepare("
            SELECT houses.*, landlords.FullName, landlords.PhoneNumber, landlords.Email 
            FROM houses 
            JOIN landlords ON houses.landlordId = landlords.id 
            WHERE houses.District = :HouseDistrict
        ");

        // Bind the parameter to the placeholder
        $stmt->bindParam(':HouseDistrict', $HouseDistrict, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Fetch the results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle any potential errors
        echo "Error: " . $e->getMessage();
    }

    // Return the results
    return $results;
}

// Retrieve house district from the URL
$HouseDistrict = isset($_GET['house_district']) ? $_GET['house_district'] : '';

// Check if a house district is provided in the URL
if (!empty($HouseDistrict)) {
    // Retrieve houses and landlord information based on the specified house district
    $houses = getHousesDistrict($conn, $HouseDistrict);

    // Pass the houses data to the UI (view_houses.php)
    include '../tenant/view_houses.php';
} else {
    echo '<p>Please specify a house district.</p>';
}

// Close your database connection if necessary
$conn = null;
?>

?>