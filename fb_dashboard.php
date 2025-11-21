<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Interface FULL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>

        :root {
            --bg-color: #f0f2f5;
            --header-height: 56px;
            --blue: #1b74e4;
            --text-main: #050505;
            --text-secondary: #65676b;
            --hover-gray: #e4e6eb;
            --card-bg: #ffffff;
            --shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Helvetica, Arial, sans-serif; }
        body { background-color: var(--bg-color); overflow-x: hidden; }
        a { text-decoration: none; color: inherit; }

        /* HEADER */
        .navbar { 
            position: fixed; top: 0; width: 100%; height: var(--header-height); 
            background-color: var(--card-bg); display: flex; justify-content: space-between; 
            align-items: center; padding: 0 16px; box-shadow: 0 1px 2px rgba(0,0,0,0.1); 
            z-index: 100; 
        }

        .nav-left { display: flex; align-items: center; width: 300px; }
        .fb-logo { font-size: 40px; color: var(--blue); margin-right: 10px; cursor: pointer; }

        .search-box { background-color: #f0f2f5; border-radius: 50px; padding: 10px 16px; 
            display: flex; align-items: center; color: var(--text-secondary); width: 240px; }
        .search-box input { border: none; background: transparent; outline: none; margin-left: 10px; font-size: 15px; }

        .nav-middle { display: flex; justify-content: center; flex: 1; }
        .nav-icon { width: 110px; height: 50px; display: flex; justify-content: center; align-items: center; 
            font-size: 24px; color: var(--text-secondary); cursor: pointer; border-radius: 8px; margin: 0 2px; }
        .nav-icon:hover { background-color: #f2f2f2; }
        .nav-icon.active { color: var(--blue); border-bottom: 3px solid var(--blue); border-radius: 0; }

        .nav-right { display: flex; align-items: center; justify-content: flex-end; width: 300px; }
        .circle-icon { width: 40px; height: 40px; border-radius: 50%; background-color: #e4e6eb; 
            display: flex; justify-content: center; align-items: center; margin-left: 8px; cursor: pointer; font-size: 18px; }

        /* DROPDOWN MENU */
        #profileDropdown {
            display: none;
            position: absolute;
            top: 60px;
            right: 20px;
            background: #fff;
            width: 220px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            padding: 10px;
            z-index: 200;
        }

        /* CONTAINER */
        .container { display: flex; padding-top: var(--header-height); justify-content: space-between; }

        /* SIDEBARS */
        .sidebar-left, .sidebar-right { width: 360px; padding: 20px 10px; height: calc(100vh - var(--header-height)); overflow-y: auto; position: sticky; top: var(--header-height); }
        .sidebar-item { display: flex; align-items: center; padding: 12px 8px; border-radius: 8px; cursor: pointer; font-weight: 600; color: var(--text-main); font-size: 15px; }
        .sidebar-item:hover { background-color: var(--hover-gray); }
        .icon-placeholder { width: 36px; height: 36px; border-radius: 50%; margin-right: 12px; display: flex; justify-content: center; align-items: center; font-size: 20px; }

        /* FEED */
        .feed { flex: 1; max-width: 680px; padding: 20px 30px; display: flex; flex-direction: column; gap: 16px; }

        /* RESPONSIVE */
        @media (max-width: 1100px) { .sidebar-left, .sidebar-right { display: none; } .container { justify-content: center; } }
    </style>

</head>
<body>

    <!-- TOP NAVBAR -->
    <header class="navbar">
        <div class="nav-left">
            <a href="dashboard.php"><i class="fab fa-facebook fb-logo"></i></a>

            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search Facebook">
            </div>
        </div>

        <div class="nav-middle">
            <a href="dashboard.php" class="nav-icon active"><i class="fas fa-home"></i></a>
            <div class="nav-icon"><i class="fas fa-store"></i></div>
            <div class="nav-icon"><i class="fas fa-tv"></i></div>
            <div class="nav-icon"><i class="fas fa-users"></i></div>
            <div class="nav-icon"><i class="fas fa-gamepad"></i></div>
        </div>

        <div class="nav-right">
            <div class="circle-icon"><i class="fas fa-bars"></i></div>
            <div class="circle-icon"><i class="fab fa-facebook-messenger"></i></div>
            <div class="circle-icon"><i class="fas fa-bell"></i></div>

            <!-- PROFILE ICON -->
            <div class="circle-icon" id="profileMenuBtn" style="position: relative;">
                <img src="https://ui-avatars.com/api/?name=Ubalde+Official&background=random" 
                     style="width:100%; height:100%; border-radius:50%; cursor:pointer;">
            </div>
        </div>

        <!-- DROPDOWN -->
        <div id="profileDropdown">
            <div style="display:flex; align-items:center; padding:10px; border-bottom:1px solid #ddd;">
                <img src="https://ui-avatars.com/api/?name=Ubalde+Official&background=random" 
                     style="width:45px; height:45px; border-radius:50%; margin-right:10px;">
                <div>
                    <strong>Ubalde Official</strong><br>
                    <a href="profile.php" style="color:#1877f2; font-size:13px;">See your profile</a>
                </div>
            </div>

            <div style="padding:10px; cursor:pointer;" onclick="window.location.href='logout.php'">
                <i class="fas fa-sign-out-alt" style="margin-right:8px; color:red;"></i> Log Out
            </div>
        </div>

    </header>

    <div class="container">

    
        <!-- LEFT SIDEBAR -->
        <aside class="sidebar-left">
            
            <div class="sidebar-item">
                <img src="https://ui-avatars.com/api/?name=Ubalde+Official&background=000&color=fff" 
                     style="width:36px; height:36px; border-radius:50%; margin-right:12px;">
                Ubalde Official
            </div>

            <div class="sidebar-item">
                <div class="icon-placeholder" style="color: blue;"><i class="fas fa-circle-notch"></i></div>
                Meta AI
            </div>

            <div class="sidebar-item">
                <div class="icon-placeholder" style="color:#1b74e4;"><i class="fas fa-user-friends"></i></div>
                Friends
            </div>

            <div class="sidebar-item">
                <div class="icon-placeholder" style="color:#1877f2;"><i class="fas fa-chart-bar"></i></div>
                Professional Dashboard
            </div>
            <div class="center">

    <!-- ⭐ ADDED CRUD SYSTEM BOX (Centered) ⭐ -->
    <div style="display: flex; justify-content: center; margin-bottom: 25px;">
        <div class="crud" style="
            display: flex; 
            align-items: center; 
            justify-content: center; 
            width: 7cm; 
            height: 4cm; 
            border-radius: 12px; 
            background-color: var(--blue); 
            cursor: pointer; 
            font-weight: 600; 
            color: white; 
            transition: background 0.3s;"
        >
            <div class="icon-placeholder" style="
                color: #ffffff; 
                display: flex; 
                justify-content: center; 
                align-items: center; 
                font-size: 36px; 
                margin-right: 12px;">
                <i class="fas fa-chart-bar"></i>
            </div>

            <span style="font-size: 20px;">
                <a href="dashboard.php" style="text-decoration: none; color: white;">CRUD SYSTEM</a>
            </span>
        </div>
    </div>
    <!-- ⭐ END CRUD SYSTEM BOX ⭐ -->

    <div class="story-section">



            <!-- LOGOUT IN SIDEBAR -->
            <div class="sidebar-item" onclick="window.location.href='logout.php'">
                <div class="icon-placeholder" style="color:red;">
                    <i class="fas fa-sign-out-alt"></i>
                </div>
                Log Out
            </div>
            

        </aside>

        <!-- FEED -->
        <section class="feed">
            <div style="background:white; padding:20px; border-radius:8px; box-shadow:var(--shadow);">
                <h3>Welcome, Ubalde!</h3>
                <p>This is your Facebook-style interface with full logout functionality.</p>
            </div>
        </section>

    </div>
    

    <script>
        // Toggle Profile Dropdown
        document.getElementById('profileMenuBtn').onclick = function() {
            let menu = document.getElementById('profileDropdown');
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        };

        // Close dropdown when clicking outside
        document.addEventListener("click", function(event) {
            const menu = document.getElementById('profileDropdown');
            const btn = document.getElementById('profileMenuBtn');

            if (!btn.contains(event.target) && !menu.contains(event.target)) {
                menu.style.display = "none";
            }
        });
    </script>

</body>
</html>
