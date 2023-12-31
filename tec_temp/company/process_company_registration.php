<?php
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $company_name = $_POST['company_name'];

    // Next company ID will be determined by max existing ID +1
    $getNextCompanyIdQuery = "SELECT MAX(company_id) + 1 AS next_company_id FROM company";
    $result = mysqli_query($conn, $getNextCompanyIdQuery);
    $row = mysqli_fetch_assoc($result);
    $nextCompanyId = $row['next_company_id'];

    // set the next company ID to 1 if there is no existing company
    if ($nextCompanyId === null) {
        $nextCompanyId = 1;
    }

    // Insert company information 
    $insertCompanyQuery = "INSERT INTO company (company_id, company_name) VALUES ('$nextCompanyId', '$company_name')";

    //Error checking
    if (mysqli_query($conn, $insertCompanyQuery)) {
        echo "Company registered successfully!";
    } else {
        echo "Error: " . $insertCompanyQuery . "<br>" . mysqli_error($conn);
    }

    
    mysqli_close($conn);
}
?>
