<?php include "auth_check.php"; ?>
<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Employee Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            padding: 30px;
            max-width: 900px;
            margin: auto;
        }
        a.button {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a.button:hover {
            background-color: #218838;
        }
        .logout {
            background-color: #dc3545;
        }
        .logout:hover {
            background-color: #c82333;
        }
        .stats {
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
        }
        .stats h3 {
            margin-top: 0;
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
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome to the Employee Management System</h1>
    <p>Hello, <strong><?php echo $_SESSION['username']; ?></strong>! Manage your employees efficiently.</p>
</header>

<div class="container">
    <a href="add_employee.php" class="button">Add Employee</a>
    <a href="view_employees.php" class="button">View All Employees</a>
    <a href="logout.php" class="button logout">Logout</a>

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
