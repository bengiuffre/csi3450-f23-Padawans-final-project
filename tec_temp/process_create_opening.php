<?php
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $company_id = $_POST['company_id'];
    $required_qualification_code = $_POST['required_qualification_code'];
    $starting_date = $_POST['starting_date'];
    $ending_date = $_POST['ending_date'];
    $hourly_pay = $_POST['hourly_pay'];

    // Insert opening information into the 'opening' table
    $insertOpeningQuery = "INSERT INTO opening (company_id, required_qualification_code, starting_date, ending_date, hourly_pay)
                           VALUES ('$company_id', '$required_qualification_code', '$starting_date', '$ending_date', '$hourly_pay')";
    
    if (mysqli_query($conn, $insertOpeningQuery)) {
        echo "Opening created successfully!";
    } else {
        echo "Error: " . $insertOpeningQuery . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
