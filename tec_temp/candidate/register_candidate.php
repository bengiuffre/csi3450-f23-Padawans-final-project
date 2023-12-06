<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEC Candidate Registration</title>
</head>
<body>
    <h2>Candidate Registration</h2>
    <form action="process_registration.php" method="post">
        <label for="candidate_name">Candidate Name:</label>
        <input type="text" name="candidate_name" required>
        
        <label for="job_details">Job History:</label>
        <textarea name="job_details" rows="4" cols="50" required></textarea>

        <input type="submit" value="Register">
    </form>
</body>
</html>
