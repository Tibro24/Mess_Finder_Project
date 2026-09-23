<?php
    session_start();
    include "db_connect.php";

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.html");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    $firstLetter = strtoupper(substr($user['full_name'], 0, 1));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_panal</title>
    <!-- <link rel="stylesheet" href="/css_files/admin_panal.css"> -->
    <link rel="stylesheet" href="../css_files/user.css">
</head>

<body>

    <div class="sidebar-overlay" id="overlay" aria-hidden="true"></div>

    <aside class="sidebar close" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">🏠</div>
            <div>
                <div class="sidebar-brand-name">MessFinder</div>
                <div class="sidebar-brand-sub">User Panel</div>
                <!-- <div class="">
                    <i class="fa fa-bars toggle" id="sidebar_toggle"> <☰></i>
                </div> -->

            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="#" class="nav-item active" onclick="showSection('Profile')">👤 Profile</a>
            <a href="#" class="nav-item" onclick="showSection('My_listing')">👤 My listing</a>
            <a href="#" class="nav-item" onclick="showSection('S_Listings')">🏢 Saved Listings</a>
            <a href="#" class="nav-item">🚩 Reports</a>
        </nav>

        <div class="sidebar-footer">
            <div class="footer-name">
                <?php echo htmlspecialchars($user['full_name']); ?>
            </div>
            <div class="footer-role">user</div>
            <a href="/PUC_project_git/Mess_Finder_Project/php_files/logout.php" class="logout-link">⏻ Logout</a>
        </div>
    </aside>
    <!-- knjbcjvvjmbv    class="content-section active-section" id="Dashboard-section" -->
    <main class="main">
        <div class="mobile-topbar">
            <button class="menu-btn" id="menuBtn" type="button" aria-controls="sidebar" aria-expanded="false"
                aria-label="Open navigation">☰</button>
        </div>
        <div>

        </div>
        <div class="content-section active-section" id="Profile-section">
            <h1 class="page-title">Profile</h1>

            <div class="profile-card">
                <div class="profile-header">
                    <div class="avatar-square">
                        <?php echo $firstLetter; ?>
                    </div>
                    <div>
                        <div class="profile-name">
                            <?php echo htmlspecialchars($user['full_name']); ?>
                        </div>
                        <div class="profile-university">
                           <?php echo htmlspecialchars($user['university']); ?>
                        </div>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">Email</div>
                    <div class="info-value"> 
                        <?php echo htmlspecialchars($user['email']); ?>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">Phone</div>
                    <div class="info-value"> 
                        <?php echo htmlspecialchars($user['phone']); ?>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">University</div>
                    <div class="info-value"> 
                        <?php echo htmlspecialchars($user['university']); ?>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">City</div>
                    <div class="info-value">
                        <?php echo htmlspecialchars($user['city']); ?>
                    </div>
                </div>

                <a href="#" class="edit-btn">Edit Profile</a>
            </div>


        </div>

        <div class="content-section active-section" id="My_listing-section">

            <div class="listings">
                <div class="listin-p_header">
                    <h1 class="page-title"> My listings</h1>
                    <a href="/html_files/seat_posting_form.html">
                            <button class="post-btnn">+ Post new
                        
                    </button>
                        </a>
                    
                </div>
            </div>
            <div class="listings-list">
                <div class="listing-card">
                    <img class="listing-img" src="https://picsum.photos/seed/mess1/160/160"
                        alt="Single Seat in Clean Mess">
                    <div class="listing-info">
                        <div class="listing-title">Single Seat in Clean Mess</div>
                        <div class="listing-meta">📍 Mirpur 10 &nbsp;·&nbsp; 💰 ৳3,500/mo</div>
                        <span class="status-badge">active</span>
                    </div>
                    <div class="listing-actions">
                        <a href="#" class="delete-btn">Delete</a>
                    </div>
                </div>

                <div class="listing-card">
                    <img class="listing-img" src="https://picsum.photos/seed/mess2/160/160"
                        alt="Double Seat in Student Hostel">
                    <div class="listing-info">
                        <div class="listing-title">Double Seat in Student Hostel</div>
                        <div class="listing-meta">📍 Dhanmondi 15 &nbsp;·&nbsp; 💰 ৳2,800/mo</div>
                        <span class="status-badge">active</span>
                    </div>
                    <div class="listing-actions">
                        <a href="#" class="delete-btn">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-section active-section" id="S_Listings-section">


        </div>
    </main>

    <!-- <section id="dashboard-section" class="content-section active-section">
        <h1 class="page-title">Manage Users</h1>
        <p class="page-subtitle">2 registered accounts</p>

        <div class="card">
            <div class="search-bar">
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text" placeholder="Search users...">
                </div>
            </div>

            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>University</th>
                            <th>Location</th>
                            <th>Role</th>
                            <th>Joined</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="id">1</td>
                            <td class="name">Rahim Ahmed</td>
                            <td class="email">rahim@abc.edu.bd</td>
                            <td class="university">BUET</td>
                            <td>Mirpur</td>
                            <td><span class="role-badge role-user">USER</span></td>
                            <td>15 Jan 2024</td>
                            <td><a href="#" class="delete-link">Delete</a></td>
                        </tr>
                        <tr>
                            <td class="id">2</td>
                            <td class="name">Karim Hossain</td>
                            <td class="email">karim@xyz.edu.bd</td>
                            <td class="university">DU</td>
                            <td>Uttara</td>
                            <td><span class="role-badge role-user">USER</span></td>
                            <td>08 Feb 2024</td>
                            <td><a href="#" class="delete-link">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section> -->
    <script src="../js_files/admin.js"></script>
</body>

</html>