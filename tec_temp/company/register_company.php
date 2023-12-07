<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Company</title>
</head>
<body>
    <h2>Register Company</h2>
    <form action="process_company_registration.php" method="post">
        <label for="company_name">Company Name:</label>
        <input type="text" name="company_name" required>

        <input type="submit" value="Register Company">
    </form>
    <h2>Remove Company</h2>
    <form action="process_remove_company.php" method="post">
        <label for="company_id">Company ID:</label>
        <input type="text" name="company_id" required>

        <input type="submit" value="Remove Company">
    </form>
    <?php
include_once 'db_connection.php';


$selectCompaniesQuery = "SELECT * FROM company";
$result = mysqli_query($conn, $selectCompaniesQuery);


if (mysqli_num_rows($result) > 0) {
    echo "<h2>All Companies</h2>";
    echo "<table border='1'>
            <tr>
                <th>Company ID</th>
                <th>Company Name</th>
            </tr>";

    
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


mysqli_close($conn);
?>
</body>
</html>
