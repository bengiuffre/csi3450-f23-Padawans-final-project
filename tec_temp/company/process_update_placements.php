<?php
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $updatePlacementsQuery = "
        INSERT INTO placement (opening_id, candidate_id, total_hours_worked)
        SELECT o.opening_id, c.candidate_id, NULL
        FROM opening o
        JOIN candidate_qualification cq ON o.required_qualification_code = cq.qualification_code
        JOIN candidate c ON cq.candidate_id = c.candidate_id
        LEFT JOIN placement p ON o.opening_id = p.opening_id AND c.candidate_id = p.candidate_id
        WHERE p.candidate_id IS NULL";

    if (mysqli_query($conn, $updatePlacementsQuery)) {
        echo "Placements updated successfully!";
    } else {
        echo "Error: " . $updatePlacementsQuery . "<br>" . mysqli_error($conn);
    }

    
    mysqli_close($conn);
}
?>
