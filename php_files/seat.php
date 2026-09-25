<?php
session_start();
include 'db_connect.php';

$sql = "SELECT * FROM listings WHERE status = 'active' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
$totalSeats = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Find a Seat</title>
    <link rel="stylesheet" href="../css_files/nav.css">
    <link rel="stylesheet" href="../css_files/seat.css">
    <link rel="stylesheet" href="../css_files/seat_posting.css">
</head>

<body style="padding-top: 0px;">
    <nav class="navbar">
        <div class="brand">
            <div class="logo-icon">M</div>
            <div class="brand-name">MessFinder<span>BD</span></div>
        </div>

        <input type="checkbox" id="nav-toggle" class="nav-toggle" style="display:none;">
        <label for="nav-toggle" class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="seat.php" class="active">Find a Seat</a>
        </div>

        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="nav-actions">
                <a href="/PUC_project_git/Mess_Finder_Project/html_files/seat_posting_form.html" class="post-seat-btn">
                    + Post a Seat
                </a>
                <a href="profile.php" class="avatar-circle">
                    <i class="fa-solid fa-user">🦸</i>
                </a>
            </div>
        <?php else: ?>
            <div class="nav-actions">
                <a href="/PUC_project_git/Mess_Finder_Project/html_files/login.html" class="login-link">
                    Login
                </a>
                <a href="/PUC_project_git/Mess_Finder_Project/html_files/registration_form.html" class="register-btn">
                    Register
                </a>
            </div>
        <?php endif; ?>
    </nav>

    <h1>Find a Seat</h1>

    <div class="card">
        <div class="fields">
            <div class="field">
                <label for="area">Area</label>
                <select id="area">
                    <option value="">All Areas</option>
                    <option value="mirpur">Mirpur</option>
                    <option value="dhanmondi">Dhanmondi</option>
                    <option value="uttara">Uttara</option>
                    <option value="mohammadpur">Mohammadpur</option>
                    <option value="badda">Badda</option>
                </select>
            </div>

            <div class="field">
                <label for="minRent">Min Rent (৳)</label>
                <input type="number" id="minRent" placeholder="e.g. 2000" min="0">
            </div>

            <div class="field">
                <label for="maxRent">Max Rent (৳)</label>
                <input type="number" id="maxRent" placeholder="e.g. 5000" min="0">
            </div>
        </div>

        <div class="actions">
            <button class="search" id="searchBtn">Search</button>
            <button class="clear" id="clearBtn">Clear</button>
        </div>
    </div>

    <div class="results" id="results"></div>

    <section>
        <p class="results-count" style="margin-bottom: 30px;">
            <?php echo $totalSeats; ?> seats found
        </p>

        <?php if ($totalSeats > 0): ?>

            <div class="cards-grid">

                <?php while ($row = mysqli_fetch_assoc($result)): ?>

                    <?php
                    // Map the DB's seat_type value to the short badge label shown on the card
                    $typeLabels = [
                        'Single'     => 'Single',
                        'Shared (2)' => 'Double',
                        'Shared (3+)'=> 'Triple'
                    ];

                    $badgeLabel = $typeLabels[$row['seat_type']] ?? $row['seat_type'];

                    //image_showing---------------------------------- 
                    if (!empty($row['photo'])){
                        $photo = '/PUC_project_git/Mess_Finder_Project/mess_photos/' . $row['photo'];
                    } else{
                        $photo = 'https://picsum.photos/seed/' . $row['id'] . '/400/300';
                    }
                    ?>

                    <div class="seat-card">
                        <div class="seat-img-wrap">
                            <img
                                src="<?php echo htmlspecialchars($photo); ?>"
                                alt="<?php echo htmlspecialchars($row['title']); ?>"
                            >
                            <span class="type-badge">
                                <?php echo htmlspecialchars($badgeLabel); ?>
                            </span>

                            <div class="heart-btn">🤍</div>
                        </div>

                        <div class="seat-body">
                            <div class="seat-title">
                                <?php echo htmlspecialchars($row['title']); ?>
                            </div>
                            <div class="seat-meta location">
                                📍
                                <?php echo htmlspecialchars($row['area']); ?>,
                                <?php echo htmlspecialchars($row['city']); ?>
                            </div>

                            <div class="seat-meta rent">
                                💰 ৳<?php echo number_format($row['monthly_rent']); ?>/month
                            </div>

                            <?php if ($row['food'] === 'Yes'): ?>

                                <div class="seat-meta">
                                    🍲 Food Included
                                </div>

                            <?php else: ?>

                                <div class="seat-meta no-food">
                                    🚫 No Food
                                </div>

                            <?php endif; ?>
                            <a href="/PUC_project_git/Mess_Finder_Project/php_files/seat-details.php?id=<?php echo $row['id']; ?>" class="view-btn">View Details</a>
                            <!-- <a href="PUC_project_git/Mess_Finder_Project/php_files/seat-details.php?id=<?php echo $row['id']; ?>" class="view-btn"> View Details </a> -->
                            <!-- <a href="PUC_project_git/Mess_Finder_Project/php_files/seat-details.php" class="view-btn"> View Details </a> -->
                        </div>
                    </div>

                <?php endwhile; ?>

            </div>

        <?php else: ?>
            <div class="empty-state">
                No seats found yet. Be the first to post one!
            </div>
        <?php endif; ?>
    </section>

    <script src="../js_files/seat.js"></script>
</body>

</html>