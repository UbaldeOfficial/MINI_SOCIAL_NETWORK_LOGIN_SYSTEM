<?php
// Include session check and database connection
include "auth_check.php"; // ensures only logged-in users can access
include "db.php";         // database connection
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Employee Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #1877f2; /* Facebook-style blue */
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: relative;
        }
        header h1 {
            margin: 0;
            font-size: 28px;
        }
        header p {
            margin: 5px 0 0 0;
            font-size: 16px;
        }
        .logout-btn {
            position: absolute;
            top: 25px;
            right: 25px;
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }
        .container {
            padding: 30px;
            max-width: 1000px;
            margin: auto;
        }
        .buttons a {
            display: inline-block;
            margin: 10px 10px 10px 0;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .buttons a:hover {
            background-color: #218838;
        }
        .stats {
            margin-top: 30px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .stats h3 {
            margin-top: 0;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #1877f2;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <h1>Employee Management System</h1>
    <p>Welcome, <strong><?php echo $_SESSION['username']; ?></strong>! Manage your employees efficiently.</p>
    <a href="fb_login.php" class="logout-btn">Logout</a>
</header>

<div class="container">
    <div class="buttons">
        <a href="add_employee.php">Add Employee</a>
        <a href="view_employees.php">View All Employees</a>
    </div>

    <div class="stats">
        <h3>System Stats</h3>

        <?php
        // Total employees
        $result = $conn->query("SELECT COUNT(*) AS total FROM employees");
        $row = $result->fetch_assoc();
        echo "<p><strong>Total Employees:</strong> " . $row['total'] . "</p>";

        // Recent 5 employees
        $result = $conn->query("SELECT name, position, department, salary, created_at FROM employees ORDER BY created_at DESC LIMIT 5");
        if ($result->num_rows > 0) {
            echo "<h4>Recently Added Employees:</h4>";
            echo "<table><tr><th>Name</th><th>Position</th><th>Department</th><th>Salary</th><th>Added On</th></tr>";
            while ($emp = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$emp['name']}</td>
                        <td>{$emp['position']}</td>
                        <td>{$emp['department']}</td>
                        <td>{$emp['salary']}</td>
                        <td>{$emp['created_at']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No employees added yet.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
