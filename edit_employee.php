<?php include "auth_check.php"; ?>
<?php
include "db.php";
$message = "";

// Get employee ID
$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM employees WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1) {
    echo "Employee not found!";
    exit();
}
$employee = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name       = $_POST['name'];
    $position   = $_POST['position'];
    $department = $_POST['department'];
    $salary     = $_POST['salary'];

    $update_stmt = $conn->prepare("UPDATE employees SET name=?, position=?, department=?, salary=? WHERE id=?");
    $update_stmt->bind_param("sssdi", $name, $position, $department, $salary, $id);

    if ($update_stmt->execute()) {
        $message = "Employee updated successfully!";
        $stmt->execute(); // refresh
        $employee = $stmt->get_result()->fetch_assoc();
    } else {
        $message = "Error: " . $update_stmt->error;
    }
    $update_stmt->close();
}
$stmt->close();
?>
<!-- HTML Form same as before -->
