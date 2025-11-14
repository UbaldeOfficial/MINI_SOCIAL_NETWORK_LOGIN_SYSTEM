# Employee Management System (PHP & MySQL)

## Overview
This project is a **simple Employee Management System** built using PHP and MySQL.  
It allows users to **register, login, and manage employee records** (CRUD) in a secure way using **sessions, cookies, and password hashing**.  

This system was developed as part of the **RP Tumba College, Develop Backend using PHP (Level 6, Year 2)** assignment.

---

## Features
- User **registration** and **login** with authentication.
- **Session-based access control** for all protected pages.
- Optional **“Remember Me”** functionality using cookies.
- **CRUD operations** for employees:
  - Add employee
  - View all employees
  - Edit employee details
  - Delete employee
- **Secure coding practices**:
  - Prepared statements to prevent SQL injection
  - Password hashing using `password_hash()`
  - Session fixation prevention (`session_regenerate_id()`)
  - Data validation and sanitization

---

## Database
The database is named: `employee_system`  

### Users Table
| Field                   | Type         |
|-------------------------|--------------|
| id                      | int(11)      |
| username                | varchar(50)  |
| email                   | varchar(150) |
| password_hash           | varchar(255) |
| created_at              | datetime     |
| remember_selector       | char(12)     |
| remember_validator_hash | char(64)     |
| remember_expires        | datetime     |

### Employees Table
| Field      | Type          |
|------------|---------------|
| id         | int(11)       |
| name       | varchar(150)  |
| position   | varchar(100)  |
| department | varchar(100)  |
| salary     | decimal(10,2) |
| created_at | datetime      |

> An SQL export of the database is included as `employee_system.sql`.

---

## How Sessions Were Used
- **Sessions** store the logged-in user’s ID and username.  
- All **protected pages** check for `$_SESSION['user_id']` before granting access.  
- On login, `session_regenerate_id(true)` is used to prevent session fixation.

---

## How Cookies Were Used
- Optional **“Remember Me”** feature uses cookies to keep users logged in for 30 days.  
- Cookies store a `selector:validator` token, with the validator hashed in the database for security.

---

## How Authentication is Secured
1. **Password Hashing:** Passwords are hashed using `password_hash()` before storing in the database.  
2. **Prepared Statements:** All SQL queries use prepared statements to prevent SQL injection.  
3. **Session Fixation Prevention:** Session ID is regenerated on login.  
4. **Access Control:** Only logged-in users can access dashboard and CRUD pages.  
5. **Cookies:** Secure validator hashes and expiry dates prevent unauthorized login.

---

## How to Run
1. Install **XAMPP** or any PHP + MySQL server.  
2. Place project folder `assignment6` in `htdocs`.  
3. Import the database:
   - Open **phpMyAdmin**
   - Create database `employee_system`
   - Import `employee_system.sql`  
4. Open browser and go to:
http://localhost/assignment6/register.php

yaml
Copy code
5. Register a new user and login to access the dashboard.  

---

## Author
**IBYIMANIKORA Ubalde**  
RP Tumba College, Level 6, Year 2  

---

## Notes
- All pages are protected; you must login to access employee management features.  
- This system demonstrates proper backend security practices for PHP CRUD applications. 