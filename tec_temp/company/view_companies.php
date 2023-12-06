<?php
include_once 'db_connection.php';

// Retrieve all companies from the 'company' table
$selectCompaniesQuery = "SELECT * FROM company";
$result = mysqli_query($conn, $selectCompaniesQuery);

// Check if there are companies to display
if (mysqli_num_rows($result) > 0) {
    echo "<h2>All Companies</h2>";
    echo "<table border='1'>
            <tr>
                <th>Company ID</th>
                <th>Company Name</th>
            </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['company_id']}</td>
                <td>{$row['company_name']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No companies found.";
}

// Close the database connection
mysqli_close($conn);
?>
