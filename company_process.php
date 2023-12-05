<?php
// Database connection function
function dbConnect() {
    $servername = "127.0.0.1"; // Your server name, usually localhost
    $username = "root"; // Default username for local MySQL
    $password = ""; // Default is no password
    $dbname = "tec_temp_employment"; // Your database name

    // Create and check connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


// Function to display companies
function displayCompanies() {
    $conn = dbConnect();
    $sql = "SELECT company_id, company_name FROM company";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["company_id"]. " - Name: " . $row["company_name"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}

// Handling POST requests for adding or deleting companies
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = dbConnect();

    // Add a company
    if (isset($_POST['add_company'])) {
        $companyName = $conn->real_escape_string($_POST["company_name"]);
        $sql = "INSERT INTO company (company_name) VALUES ('$companyName')";
        if ($conn->query($sql) === TRUE) {
            echo "New company added successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Delete a company
    if (isset($_POST['delete_company'])) {
        $companyId = $conn->real_escape_string($_POST["company_id"]);
        $sql = "DELETE FROM company WHERE company_id = $companyId";
        if ($conn->query($sql) === TRUE) {
            echo "Company deleted successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
