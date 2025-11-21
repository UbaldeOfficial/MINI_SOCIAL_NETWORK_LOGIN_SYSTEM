<?php
include "auth_check.php"; // ensures only logged-in users can access
include "db.php";         // database connection

// Fetch all employees
$sql = "SELECT * FROM employees ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Employees</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f2f5; padding: 30px; }
        table { width: 100%; border-collapse: collapse; background-color: white; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #1877f2; color: white; }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
        .message { color: green; }
        .header { margin-bottom: 20px; }
        .header p { margin: 5px 0; }
    </style>
</head>
<body>

<div class="header">
    <h2>All Employees</h2>
    <p>Logged in as: <strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php
    if(isset($_GET['msg']) && $_GET['msg']=='deleted'){
        echo "<p class='message'>Employee deleted successfully!</p>";
    }
    ?>
</div>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Position</th>
<th>Department</th>
<th>Salary</th>
<th>Actions</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['position']; ?></td>
    <td><?php echo $row['department']; ?></td>
    <td><?php echo $row['salary']; ?></td>
    <td>
        <a href="edit_employee.php?id=<?php echo $row['id']; ?>">Edit</a> |
        <a href="delete_employee.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
    </td>
</tr>
<?php } ?>
</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
