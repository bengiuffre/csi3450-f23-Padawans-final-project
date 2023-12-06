<?php
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidate_name = $_POST['candidate_name'];
    $job_details = $_POST['job_details'];

    // Retrieve the current maximum candidate_id from the 'candidate' table
    $maxIdQuery = "SELECT MAX(candidate_id) as max_id FROM candidate";
    $result = mysqli_query($conn, $maxIdQuery);
    $row = mysqli_fetch_assoc($result);
    $candidate_id = $row['max_id'] + 1;

    // Insert candidate data into the 'candidate' table
    $insertCandidateQuery = "INSERT INTO candidate (candidate_id, candidate_name) VALUES ('$candidate_id', '$candidate_name')";
    if (mysqli_query($conn, $insertCandidateQuery)) {
        // Insert job history data into the 'job_history' table
        $insertJobHistoryQuery = "INSERT INTO job_history (candidate_id, job_details) VALUES ('$candidate_id', '$job_details')";
        if (mysqli_query($conn, $insertJobHistoryQuery)) {
            echo "Candidate registered successfully!";
        } else {
            echo "Error: " . $insertJobHistoryQuery . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $insertCandidateQuery . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
