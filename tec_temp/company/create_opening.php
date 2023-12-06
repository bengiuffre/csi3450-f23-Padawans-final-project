<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Opening</title>
</head>
<body>
    <h2>Create Opening</h2>
    <form action="process_opening_registration.php" method="post">
        <!-- No need for input for opening_id; it will be auto-incremented -->

        <label for="company_id">Company ID:</label>
        <input type="text" name="company_id" required>

        <label for="required_qualification_code">Required Qualification Code:</label>
        <!-- Populate this dropdown with available qualifications from the database -->
        <select name="required_qualification_code" required>
            <?php
                // Assuming you have a connection script (db_connection.php)
                include_once 'db_connection.php';

                $qualificationQuery = "SELECT qualification_code, qualification_description FROM qualification";
                $result = mysqli_query($conn, $qualificationQuery);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['qualification_code']}'>{$row['qualification_description']}</option>";
                }

                // Close the database connection
                mysqli_close($conn);
            ?>
        </select>

        <label for="starting_date">Starting Date:</label>
        <input type="date" name="starting_date" required>

        <label for="ending_date">Ending Date:</label>
        <input type="date" name="ending_date" required>

        <label for="hourly_pay">Hourly Pay:</label>
        <input type="text" name="hourly_pay" required>

        <input type="submit" value="Create Opening">
    </form>
</body>
</html>
