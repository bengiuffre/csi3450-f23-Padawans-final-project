<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Opening</title>
</head>
<body>
    <h2>Create Opening</h2>
    <form action="process_create_opening.php" method="post">
        <label for="company_id">Company ID:</label>
        <input type="text" name="company_id" required>

        <label for="required_qualification_code">Required Qualification Code:</label>
        <select name="required_qualification_code" required>
            <!-- Populate this dropdown with available course codes from the database -->
            <?php
                include_once 'db_connection.php';

                $courseQuery = "SELECT course_code, CONCAT(course_description, ' ; ', course_name) AS full_description FROM course";
                $result = mysqli_query($conn, $courseQuery);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['course_code']}'>{$row['full_description']}</option>";
                }

                // Close the database connection
                mysqli_close($conn);
            ?>
        </select>

        <label for="starting_date">Starting Date:</label>
        <input type="date" name="starting_date" required>

        <label for="ending_date">Anticipated Ending Date:</label>
        <input type="date" name="ending_date" required>

        <label for="hourly_pay">Hourly Pay:</label>
        <input type="text" name="hourly_pay" required>

        <input type="submit" value="Create Opening">
    </form>
</body>
</html>
