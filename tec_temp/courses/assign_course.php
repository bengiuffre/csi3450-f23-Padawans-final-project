<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEC Course Assignment</title>
</head>
<body>
    <h2>Course Assignment</h2>
    <form action="process_course_assignment.php" method="post">
        <label for="candidate_id">Candidate ID:</label>
        <input type="text" name="candidate_id" required>

        <label for="course_code">Select Course:</label>
        <select name="course_code" required>
        <?php
                // List of course codes and descriptions
                $courses = array(
                    "SEC-45" => "Secretarial work; candidate must type at least 45 words per minute",
                    "SEC-60" => "Secretarial work; candidate must type at least 60 words per minute",
                    "CLERK" => "General clerking work",
                    "PRG-PY" => "Programmer, Python",
                    "PRG-C++" => "Programmer, C++",
                    "DBA-ORA" => "Database Administrator, Oracle",
                    "DBA-DB2" => "Database Administrator, IBM DB2",
                    "DBA-SQLSERV" => "Database Administrator, MS SQL Server",
                    "SYS-1" => "Systems Analyst, level 1",
                    "SYS-2" => "Systems Analyst, level 2",
                    "NW-CIS" => "Network Administrator, Cisco experience",
                    "WD-CF" => "Web Developer, ColdFusion"
                );

                // Display the courses in the dropdown
                foreach ($courses as $code => $description) {
                    echo "<option value='$code'>$description</option>";
                }
            ?>
        </select>

        <input type="submit" value="Assign Course">
    </form>
</body>
</html>
