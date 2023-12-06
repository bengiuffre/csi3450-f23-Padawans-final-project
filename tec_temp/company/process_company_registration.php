<?php
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $company_name = $_POST['company_name'];

    // Get the next available company ID
    $getNextCompanyIdQuery = "SELECT MAX(company_id) + 1 AS next_company_id FROM company";
    $result = mysqli_query($conn, $getNextCompanyIdQuery);
    $row = mysqli_fetch_assoc($result);
    $nextCompanyId = $row['next_company_id'];

    // If no company exists yet, set the next company ID to 1
    if ($nextCompanyId === null) {
        $nextCompanyId = 1;
    }

    // Insert company information into the 'company' table with the next available company ID
    $insertCompanyQuery = "INSERT INTO company (company_id, company_name) VALUES ('$nextCompanyId', '$company_name')";
    
    if (mysqli_query($conn, $insertCompanyQuery)) {
        echo "Company registered successfully!";
    } else {
        echo "Error: " . $insertCompanyQuery . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
