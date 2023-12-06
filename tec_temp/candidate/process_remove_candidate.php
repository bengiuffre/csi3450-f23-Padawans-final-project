<?php
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidate_id = $_POST['candidate_id'];

    // Delete candidate_course_assignment records for the candidate
    $deleteAssignmentQuery = "DELETE FROM candidate_course_assignment WHERE candidate_id = '$candidate_id'";
    if (mysqli_query($conn, $deleteAssignmentQuery)) {
        // Delete job history records for the candidate
        $deleteJobHistoryQuery = "DELETE FROM job_history WHERE candidate_id = '$candidate_id'";
        if (mysqli_query($conn, $deleteJobHistoryQuery)) {
            // Delete qualification records for the candidate
            $deleteQualificationQuery = "DELETE FROM candidate_qualification WHERE candidate_id = '$candidate_id'";
            if (mysqli_query($conn, $deleteQualificationQuery)) {
                // Now, delete the candidate
                $deleteCandidateQuery = "DELETE FROM candidate WHERE candidate_id = '$candidate_id'";
                if (mysqli_query($conn, $deleteCandidateQuery)) {
                    echo "Candidate and associated records removed successfully!";
                } else {
                    echo "Error: " . $deleteCandidateQuery . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error: " . $deleteQualificationQuery . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: " . $deleteJobHistoryQuery . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: " . $deleteAssignmentQuery . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
