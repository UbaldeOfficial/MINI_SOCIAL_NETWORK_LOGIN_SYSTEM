<?php
include "auth_check.php"; // ensures only logged-in users can access
include "db.php";         // database connection

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape inputs to prevent SQL issues
    $name       = $conn->real_escape_string($_POST['name']);
    $position   = $conn->real_escape_string($_POST['position']);
    $department = $conn->real_escape_string($_POST['department']);
    $salary     = $conn->real_escape_string($_POST['salary']);

    $sql = "INSERT INTO employees (name, position, department, salary) 
            VALUES ('$name', '$position', '$department', '$salary')";

    if ($conn->query($sql) === TRUE) {
        $message = "Employee added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f2f5; padding: 30px; }
        form { background-color: white; padding: 20px; border-radius: 5px; max-width: 500px; }
        input, button { width: 100%; padding: 10px; margin: 5px 0; }
        button { background-color: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #218838; }
        a { display: inline-block; margin-top: 10px; }
    </style>
</head>
<body>

<h2>Add New Employee</h2>

<form method="POST">
    Name:<br>
    <input type="text" name="name" required><br>

    Position:<br>
    <input type="text" name="position" required><br>

    Department:<br>
    <input type="text" name="department" required><br>

    Salary:<br>
    <input type="number" step="0.01" name="salary" required><br><br>

    <button type="submit">Add Employee</button>
</form>

<p style="color:green;"><?php echo $message; ?></p>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
