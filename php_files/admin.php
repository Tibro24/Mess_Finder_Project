<?php
include 'db_connect.php';


$totalUsers = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];

$totalListings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM listings"))['total'];

$activeListings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM listings WHERE status = 'active'"))['total'];

$recentListings = mysqli_query($conn, "
    SELECT listings.title, listings.area, listings.monthly_rent, listings.status, users.full_name AS owner
    FROM listings
    JOIN users ON listings.user_id = users.id
    ORDER BY listings.created_at DESC
    LIMIT 5
");


$allListings = mysqli_query($conn, "
    SELECT listings.id, listings.title, listings.area, listings.monthly_rent, 
           listings.seat_type, listings.status, listings.created_at, users.full_name AS owner
    FROM listings
    JOIN users ON listings.user_id = users.id
    ORDER BY listings.created_at DESC
");

$listingCount = mysqli_num_rows($allListings);

$allUsers = mysqli_query($conn, "SELECT * FROM users ORDER BY created_at DESC");



$sql = "SELECT reports.*, listings.title AS listing_title, users.full_name AS reporter_name
        FROM reports
        JOIN listings ON reports.listing_id = listings.id
        JOIN users ON reports.reporter_id = users.id
        ORDER BY reports.created_at DESC";

$result = mysqli_query($conn, $sql);
$totalReports = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_panal</title>
    <link rel="stylesheet" href="../css_files/admin_panal.css">
    <link rel="stylesheet" href="../css_files/admin_er_report.css">
</head>

<body>

    <div class="sidebar-overlay" id="overlay" aria-hidden="true"></div>

    <aside class="sidebar close" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">🏠</div>
            <div>
                <div class="sidebar-brand-name">MessFinder</div>
                <div class="sidebar-brand-sub">Admin Panel</div>
                <!-- <div class="">
                    <i class="fa fa-bars toggle" id="sidebar_toggle"> <☰></i>
                </div> -->

            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="#" class="nav-item active" onclick="showSection('Dashboard')">🏠 Dashboard</a>
            <a href="#" class="nav-item" onclick="showSection('Users')">👤 Users</a>
            <a href="#" class="nav-item" onclick="showSection('Listings')">🏢 Listings</a>
            <a href="#" class="nav-item" onclick="showSection('reports')">🚩 Reports</a>
        </nav>

        <div class="sidebar-footer">
            <div class="footer-name">tibroshill020@gmail.com</div>
            <div class="footer-role">Administrator</div>
            <a href="#" class="logout-link">⏻ Logout</a>
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
        <!-- 😍 Dashboard section starts here..😍 -->
        <div class="content-section active-section" id="Dashboard-section">

            <h1 class="page-title">Dashboard</h1>
            <p class="page-subtitle">Welcome back. Here's what's happening on the platform.</p>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-label">Total Users</div>
                    <div class="stat-value"><?php echo $totalUsers; ?></div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Total Listings</div>
                    <div class="stat-value"><?php echo $totalListings; ?></div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Active Listings</div>
                    <div class="stat-value green"><?php echo $activeListings; ?></div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Open Reports</div>
                    <div class="stat-value orange">0</div>
                </div>
            </div>

            <div class="table-card">
                <div class="table-header">Recent Listings</div>
                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Owner</th>
                                <th>Location</th>
                                <th>Rent</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($recentListings)): ?>
                            <tr>
                                <td class="title"><?php echo htmlspecialchars($row['title']); ?></td>
                                <td><?php echo htmlspecialchars($row['owner']); ?></td>
                                <td><?php echo htmlspecialchars($row['area']); ?></td>
                                <td>৳<?php echo number_format($row['monthly_rent']); ?></td>
                                <td><span class="status-badge"><?php echo strtoupper($row['status']); ?></span></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- 😍user section starts here..😍 -->
        <div class="content-section active-section" id="Users-section">
            <h1 class="page-title">Manage Users</h1>
            <p class="page-subtitle">2 registered accounts</p>

            <div class="card">
                <div class="search-bar">
                    <div class="search-box">
                        <span class="search-icon">🔍</span>
                        <input type="text" id="userSearch" placeholder="Search users..." oninput="filterUsers()">
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
                            <?php while ($row = mysqli_fetch_assoc($allUsers)): ?>
                            <tr>
                                <td class="id"><?php echo $row['id']; ?></td>
                                <td class="name"><?php echo htmlspecialchars($row['full_name']); ?></td>
                                <td class="email"><?php echo htmlspecialchars($row['email']); ?></td>
                                <td class="university"><?php echo htmlspecialchars($row['university']); ?></td>
                                <td><?php echo htmlspecialchars($row['city']); ?></td>
                                <td><span class="role-badge role-<?php echo $row['role']; ?>"><?php echo strtoupper($row['role']); ?></span></td>
                                <td><?php echo date('d M Y', strtotime($row['created_at'])); ?></td>
                                <td><a href="delete-user.php?id=<?php echo $row['id']; ?>" class="delete-link">Delete</a></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <!-- 😍Listing section starts here..😍 -->
        <div class="content-section active-section" id="Listings-section">
            <h1 class="page-title">Manage Listings</h1>
            <p class="page-subtitle"><?php echo $listingCount; ?> listings in database</p>

            <div class="card">
                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Posted by</th>
                                <th>Location</th>
                                <th>Rent</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($allListings)): ?>
                            <tr>
                                <td class="id"><?php echo $row['id']; ?></td>
                                <td class="title"><?php echo htmlspecialchars($row['title']); ?></td>
                                <td><?php echo htmlspecialchars($row['owner']); ?></td>
                                <td><?php echo htmlspecialchars($row['area']); ?></td>
                                <td>৳<?php echo number_format($row['monthly_rent']); ?></td>
                                <td><?php echo htmlspecialchars($row['seat_type']); ?></td>
                                <td><span class="status-badge"><?php echo strtoupper($row['status']); ?></span></td>
                                <td><?php echo date('d M Y', strtotime($row['created_at'])); ?></td>
                                <td>
                                    <div class="actions">
                                        <?php if ($row['status'] === 'inactive'): ?>
                                        <a href="activate_listing.php?id=<?php echo $row['id']; ?>" class="activate-link">Activate</a>
                                        <?php endif; ?>
                                        <a href="delete_listing.php?id=<?php echo $row['id']; ?>" class="delete-link">Delete</a>
                                    </div>
                                </td>
                            </tr>
                             <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- 😍report section starts here..😍 -->
        <div class="content-section active-section" id="reports-section">
            <h1 class="page-title">Manage Reports</h1>
            <p class="page-subtitle"> <?php echo $totalReports; ?> Reports in database</p>
            <?php while ($report = mysqli_fetch_assoc($result)): ?>
                <div class="report-card" style="margin-bottom: 15px;">
                    <div class="report-header">
                        <span class="report-id"># <?php echo $report['id']; ?></span>
                        <button class="btn-delete">Delete</button>
                    </div>
                    <h3 class="report-title"><?php echo htmlspecialchars($report['reason']); ?></h3>
                    <p class="report-meta">
                        Reported by <strong><?php echo htmlspecialchars($report['reporter_name']); ?></strong>
                        · Listing: <?php echo htmlspecialchars($report['listing_title']); ?>
                        · <?php echo date('d M Y', strtotime($report['created_at'])); ?>
                    </p>
                    <p class="report-desc"><?php echo htmlspecialchars($report['description']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </main>

     
    <script src="../js_files/admin.js"></script>
</body>
</html>