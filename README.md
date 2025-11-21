# Mini Social Network Login System + Employee CRUD

This project is a simplified Facebook-style social network login system that redirects to an Employee CRUD system. It was developed as **Assignment 7** for the module **Backend Using PHP**.

---

## Student Information

- **Name:** Ubalde IBYIMANIKORA  
- **Registration Number:** 24RP05770  
- **Level & Year:** Year 2 (Y2)  
- **Program:** ITB IT Program  
- **Department:** ICT Department  

---

## Features Implemented

- **User Sign Up** with validation (username, email, password, confirm password)  
- **User Sign In** with validation (username/email + password)  
- **Google Login Simulation** (mocked; no real API required)  
- **Redirect to Employee CRUD system** after successful login  
- **Employee CRUD Operations:**  
  - Add Employee  
  - Edit Employee  
  - Delete Employee  
  - View Employees  
- **Logout Functionality**  
- **Dashboard UI** inspired by Facebook style  

---

## File Structure

/add_employee -> Add Employee page
/auth_check -> Check login session
/dashboard -> Main dashboard after login
/db -> Database connection file
/delete_employee -> Delete employee page
/edit_employee -> Edit employee page
/employee_system -> Database icon / employee DB folder
/fb_auth_check -> Facebook login session check
/fb_dashboard -> Facebook-style dashboard
/fb_google_mock -> Google login simulation
/fb_login -> Facebook-style login page
/fb_logo.png -> Facebook logo image
/fb_logout -> Facebook logout page
/fb_register -> Facebook-style registration page
/login -> Login page
/logout -> Logout page
/register -> Registration page
/view_employees -> View employees page
README.md -> This file

---

## How to Run

1. Import the **`employee_system` database** using `db.sql` or your exported SQL file.  
2. Update database credentials in `db/config.php` (or `db` folder connection file).  
3. Open `login.php` in your browser.  
4. Use Sign Up or Sign In to access the system.  
5. After login, you will be redirected to the **Employee CRUD system**.  
6. Use CRUD operations to manage employees.

---

## Screenshots

Include screenshots of:

- Sign Up page  
- Sign In page  
- Facebook-style Dashboard  
- Employee CRUD pages (Add, Edit, Delete, View)  

---

## Notes

- Google Login is **simulated**; no real Google API is used.  
- UI is **inspired by Facebook**, not copied.  
- Make sure PHP and MySQL are correctly configured on your local server (XAMPP/WAMP/LAMP).  

---

**Author:** Ubalde IBYIMANIKORA  
**Submission:** Assignment 7  
**Module:** Backend Using PHP  
**Level & Year:** Y2, ITB IT Program, ICT Department
