<?php
include_once 'db_connection.php';

// Retrieve all candidates and their assigned course codes
$selectCandidatesQuery = "SELECT candidate.candidate_id, candidate.candidate_name, GROUP_CONCAT(candidate_course_assignment.course_code) AS assigned_courses
                          FROM candidate
                          LEFT JOIN candidate_course_assignment ON candidate.candidate_id = candidate_course_assignment.candidate_id
                          GROUP BY candidate.candidate_id";
$result = mysqli_query($conn, $selectCandidatesQuery);

// Check if there are candidates to display
if (mysqli_num_rows($result) > 0) {
    echo "<h2>All Candidates</h2>";
    echo "<table border='1'>
            <tr>
                <th>Candidate ID</th>
                <th>Candidate Name</th>
                <th>Assigned Course Codes</th>
            </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['candidate_id']}</td>
                <td>{$row['candidate_name']}</td>
                <td>{$row['assigned_courses']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No candidates found.";
}

// Close the database connection
mysqli_close($conn);
?>
