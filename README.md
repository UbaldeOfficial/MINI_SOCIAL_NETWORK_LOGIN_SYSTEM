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
<img width="1919" height="1079" alt="Screenshot 2025-11-21 105215" src="https://github.com/user-attachments/assets/3a2ee135-2f62-46c1-ba8b-df69e6288b04" />
<img width="1919" height="1079" alt="Screenshot 2025-11-21 105240" src="https://github.com/user-attachments/assets/148a341a-eac3-4cf1-b535-5a52dbe7e986" />
<img width="1919" height="1079" alt="Screenshot 2025-11-21 105331" src="https://github.com/user-attachments/assets/d8d6c9f6-20b7-40cf-a854-521e704ed6c0" />
<img width="1919" height="1079" alt="Screenshot 2025-11-21 105339" src="https://github.com/user-attachments/assets/efb31a3d-aa85-46d7-8c15-dab9ea954aa0" />
<img width="1919" height="1079" alt="Screenshot 2025-11-21 105441" src="https://github.com/user-attachments/assets/719ad1b4-0cf2-4c3a-bce0-f5b59f88d9a0" />
<img width="1919" height="1079" alt="Screenshot 2025-11-21 105453" src="https://github.com/user-attachments/assets/b06f8e8d-7b57-4563-985b-2643c322a6b6" />
  <img width="1906" height="947" alt="Screenshot 2025-11-21 105731" src="https://github.com/user-attachments/assets/b3d2025a-a8b9-440b-b9cf-83e19e1d14e0" />
  <img width="1919" height="1074" alt="Screenshot 2025-11-21 110018" src="https://github.com/user-attachments/assets/70c06209-e48f-45ae-a302-065d39b21214" />
  <img width="1918" height="1079" alt="Screenshot 2025-11-21 110029" src="https://github.com/user-attachments/assets/1b06755d-8fef-4674-98a8-93d3bb83f78c" />
  <img width="1919" height="1054" alt="Screenshot 2025-11-21 110041" src="https://github.com/user-attachments/assets/a843a962-f406-4048-aebf-4b8563d14d5a" />
    <img width="1919" height="1079" alt="Screenshot 2025-11-21 110054" src="https://github.com/user-attachments/assets/fcf97eb0-ce19-4738-b44b-94dc86c3795c" />
<img width="1919" height="1079" alt="Screenshot 2025-11-21 110120" src="https://github.com/user-attachments/assets/628f0137-41fe-4b3f-9a49-a17e50823f71" />

<img width="1916" height="1025" alt="Screenshot 2025-11-21 111111" src="https://github.com/user-attachments/assets/37a66f39-9bde-47ea-b6df-2e2f31e130b5" />


<img width="1919" height="1037" alt="Screenshot 2025-11-21 111123" src="https://github.com/user-attachments/assets/d07b9c21-7e5f-469b-acde-b02c455510ab" />

<img width="1913" height="1030" alt="Screenshot 2025-11-21 111141" src="https://github.com/user-attachments/assets/385c4091-dfeb-4fb4-9716-69f3f276c752" />


<img width="1919" height="1025" alt="Screenshot 2025-11-21 111227" src="https://github.com/user-attachments/assets/e5a1f9a5-6038-4c52-880b-27bfb96dea37" />

<img width="1919" height="1029" alt="Screenshot 2025-11-21 111251" src="https://github.com/user-attachments/assets/57c30061-0435-4421-b7b6-9da34bcebf8a" />

<img width="1919" height="1026" alt="Screenshot 2025-11-21 111321" src="https://github.com/user-attachments/assets/4cc43137-5721-48f9-b98d-3d31555f04f1" />







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



## Notes

- Google Login is **simulated**; no real Google API is used.  
- UI is **inspired by Facebook** 
- Make sure PHP and MySQL are correctly configured on your local server (XAMPP/WAMP/LAMP).  

---

**Author:** Ubalde IBYIMANIKORA  
**Submission:** Assignment 7  
**Module:** Backend Using PHP  
**Level & Year:** Y2, ITB IT Program, ICT Department
