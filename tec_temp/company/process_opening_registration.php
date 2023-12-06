<?php
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $company_id = $_POST['company_id'];
    $required_qualification_code = $_POST['required_qualification_code'];
    $starting_date = $_POST['starting_date'];
    $ending_date = $_POST['ending_date'];
    $hourly_pay = $_POST['hourly_pay'];

    // Get the next available opening ID
    $getNextOpeningIdQuery = "SELECT MAX(opening_id) + 1 AS next_opening_id FROM opening";
    $result = mysqli_query($conn, $getNextOpeningIdQuery);
    $row = mysqli_fetch_assoc($result);
    $nextOpeningId = $row['next_opening_id'];

    // If no opening exists yet, set the next opening ID to 1
    if ($nextOpeningId === null) {
        $nextOpeningId = 1;
    }

    // Insert opening information into the 'opening' table with the next available opening ID
    $insertOpeningQuery = "INSERT INTO opening (opening_id, company_id, required_qualification_code, starting_date, ending_date, hourly_pay) 
                           VALUES ('$nextOpeningId', '$company_id', '$required_qualification_code', '$starting_date', '$ending_date', '$hourly_pay')";
    
    if (mysqli_query($conn, $insertOpeningQuery)) {
        echo "Opening registered successfully!";
    } else {
        echo "Error: " . $insertOpeningQuery . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
