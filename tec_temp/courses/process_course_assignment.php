<?php
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidate_id = $_POST['candidate_id'];
    $course_code = $_POST['course_code'];

    // Check if the candidate ID exists in the 'candidate' table
    $checkCandidateQuery = "SELECT COUNT(*) AS candidate_count FROM candidate WHERE candidate_id = '$candidate_id'";
    $resultCandidate = mysqli_query($conn, $checkCandidateQuery);
    $rowCandidate = mysqli_fetch_assoc($resultCandidate);
    $candidateCount = $rowCandidate['candidate_count'];

    if ($candidateCount > 0) {
        // Check if the course code exists in the 'course' table
        $checkCourseQuery = "SELECT COUNT(*) AS course_count FROM course WHERE course_code = '$course_code'";
        $resultCourse = mysqli_query($conn, $checkCourseQuery);
        $rowCourse = mysqli_fetch_assoc($resultCourse);
        $courseCount = $rowCourse['course_count'];

        if ($courseCount > 0) {
            // Insert course assignment into the 'candidate_course_assignment' table
            $insertAssignmentQuery = "INSERT INTO candidate_course_assignment (candidate_id, course_code) VALUES ('$candidate_id', '$course_code')";
            if (mysqli_query($conn, $insertAssignmentQuery)) {
                echo "Course assigned successfully!";
            } else {
                echo "Error: " . $insertAssignmentQuery . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: The specified course code does not exist.";
        }
    } else {
        echo "Error: The specified candidate ID does not exist.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
