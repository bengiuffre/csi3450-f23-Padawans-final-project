<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEC Placements</title>
</head>
<body>
    <h2>Placements</h2>
    <form action="process_update_placements.php" method="post">
        <input type="submit" value="Update Placements">
    </form>

    <!-- Display Placements Table -->
    <?php
    include_once 'db_connection.php';

    
    $placementsQuery = "SELECT * FROM placement"; 
    $placementsResult = mysqli_query($conn, $placementsQuery);

    // Display Placements Table
    echo "<table border='1'>
    <tr>
    <th>Opening ID</th>
    <th>Candidate ID</th>
    <th>Total Hours Worked</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($placementsResult)) {
        echo "<tr>";
        echo "<td>" . $row['opening_id'] . "</td>";
        echo "<td>" . $row['candidate_id'] . "</td>";
        echo "<td>" . $row['total_hours_worked'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    
    mysqli_close($conn);
    ?>
</body>
</html>
