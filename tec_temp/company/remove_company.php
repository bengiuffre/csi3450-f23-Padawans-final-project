<?php
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $company_id = $_POST['company_id'];

    // Check if the company ID exists in the 'company' table
    $checkCompanyQuery = "SELECT COUNT(*) AS company_count FROM company WHERE company_id = '$company_id'";
    $resultCompany = mysqli_query($conn, $checkCompanyQuery);
    $rowCompany = mysqli_fetch_assoc($resultCompany);
    $companyCount = $rowCompany['company_count'];

    if ($companyCount > 0) {
        // Remove the company from the 'company' table
        $removeCompanyQuery = "DELETE FROM company WHERE company_id = '$company_id'";
        
        if (mysqli_query($conn, $removeCompanyQuery)) {
            echo "Company removed successfully!";
        } else {
            echo "Error: " . $removeCompanyQuery . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: The specified company ID does not exist.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
