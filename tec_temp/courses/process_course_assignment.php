<?php
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidate_id = $_POST['candidate_id'];
    $course_code = $_POST['course_code'];

    // Check if the candidate ID already exists
    $checkCandidateQuery = "SELECT COUNT(*) AS candidate_count FROM candidate WHERE candidate_id = '$candidate_id'";
    $resultCandidate = mysqli_query($conn, $checkCandidateQuery);
    $rowCandidate = mysqli_fetch_assoc($resultCandidate);
    $candidateCount = $rowCandidate['candidate_count'];

    if ($candidateCount > 0) {
        // Check if the course code exists
        $checkCourseQuery = "SELECT qualification_code FROM course WHERE course_code = '$course_code'";
        $resultCourse = mysqli_query($conn, $checkCourseQuery);

        if ($rowCourse = mysqli_fetch_assoc($resultCourse)) {
            $qualification_code = $rowCourse['qualification_code'];

            // Insert candidate_id and qualification_code into the candidate_qualification table
            $insertQualificationQuery = "INSERT INTO candidate_qualification (candidate_id, qualification_code) VALUES ('$candidate_id', '$qualification_code')";
            if (mysqli_query($conn, $insertQualificationQuery)) {
                echo "Qualification assigned";
                
                // Insert the pair (candidate_id, course_code) into the 'candidate_course_assignment' table
                $insertCourseAssignmentQuery = "INSERT INTO candidate_course_assignment (candidate_id, course_code) VALUES ('$candidate_id', '$course_code')";
                if (mysqli_query($conn, $insertCourseAssignmentQuery)) {
                    echo "Course assigned";
                } else {
                    echo "Error: " . $insertCourseAssignmentQuery . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error: " . $insertQualificationQuery . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: The course code does not exist.";
        }
    } else {
        echo "Error: The candidate ID does not exist.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
