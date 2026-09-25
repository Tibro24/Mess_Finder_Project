<?php
session_start();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css_files/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar">
        <div class="brand">
            <div class="logo-icon">M</div>
            <div class="brand-name">MessFinder<span>BD</span></div>
        </div>

        <!-- checkbox hack for no-JS mobile toggle -->
        <input type="checkbox" id="nav-toggle" class="nav-toggle" style="display:none;">
        <label for="nav-toggle" class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <div class="nav-links">
            <a href="#" class="active">Home</a>
            <a href="/PUC_project_git/Mess_Finder_Project/php_files/seat.php">Find a Seat</a>
        </div>

        <!-- Logged-IN view — hidden by default -->
        <!-- <div class="nav-actions" id="loggedInActions" style="display: none;">
            <a href="#" class="post-seat-btn">+ Post a Seat</a>
            <div class="avatar-circle" id="avatarInitial">T</div>
        </div>

        <div class="nav-actions" id="loggedOutActions">
            <a href="login.html" class="login-link">Login</a>
            <a href="registration_form.html" class="register-btn">Register</a>
        </div> -->

        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- LOGGED IN -->
            <div class="nav-actions">

                <a href="/PUC_project_git/Mess_Finder_Project/html_files/seat_posting_form.html" class="post-seat-btn">
                    + Post a Seat
                </a>

                <a href="profile.php" class="avatar-circle">
                    <i class="fa-solid fa-user" >🦸</i>
                </a>

            </div>

        <?php else: ?>

        <!-- NOT LOGGED IN -->
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
    <div class="bdy">
        <section class="hero">
            <div class="hero-inner">
                <div class="hero-label">Bangladesh Student Housing</div>
                <h1 class="hero-title">Find Your Perfect<br>Mess &amp; Hostel Seat</h1>
                <p class="hero-subtitle">
                    Search available seats across Dhaka, Chittagong, Rajshahi, and more.
                    Post your available seat for free.
                </p>
            </div>
        </section>
    </div>
    <!-- <section class="record">
        <div class="after_record">
             <div>

             </div>
        </div>
    </section> -->

    <section class="stats">
        <div class="stat-item">
            <div class="stat-number">500+</div>
            <div class="stat-label">Active Listings</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">1,200+</div>
            <div class="stat-label">Students Helped</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">30+</div>
            <div class="stat-label">Areas Covered</div>
        </div>
    </section>

    <div style="background-color: #f0f7f78a;">
        <section class="P_area">
            <span>
                <p
                    style="color: #0f172b; font-size: 1.8rem; font-family: 'Outfit', sans-serif; font-weight: 450;margin-top: 0px;padding-top: 64px;">
                    Popular Areas</p>
            </span>
            <div class="area-grid">
                <div class="area-card">
                    <img src="https://d3fphkxyf5o5bm.cloudfront.net/image-resize/format=webp,w=720/QwRY54Li1HMwD7oNfoqz6b8v7btHHC1StwhoGYLxGk"
                        alt="chobi nai">
                    <div class="area-info">
                        <div class="area-name">Chawkbazar</div>
                        <div class="area-seats">25 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://www.thedailystar.net/sites/default/files/styles/big_1/public/media/api_images/2022/12/04/Lead_1490.jpg"
                        alt="chobi nai">

                    <div class="area-info">
                        <div class="area-name">Cinema Palace</div>
                        <div class="area-seats">15 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://live.staticflickr.com/65535/49548858311_29730588cd_b.jpg" alt="chobi nai">

                    <div class="area-info">
                        <div class="area-name">Agrabad</div>
                        <div class="area-seats">45 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRW5HubZREH2I3Swol-hHa_1YfxzC9QaK6IWuWsZtf5mCtZbd7pqzNkBtA&s=10"
                        alt="chobi nai">

                    <div class="area-info">
                        <div class="area-name">Hazari Lane</div>
                        <div class="area-seats">29 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7oMCBYd3P27kaFf90hN97rxAen6IiYa_w1SEp5rL5i0y98W57nuuKNdAF&s=10"
                        alt="chobi nai">
                    <div class="area-info">
                        <div class="area-name">GEC Circle</div>
                        <div class="area-seats">25 seats</div>
                    </div>
                </div>

            </div>
        </section>

        <section class="P_area">
            <div class="area-grid">
                <div class="area-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6tBMEl1oKZ7ikGv02LDf1TWTTSYA40MNGt8qN7AAEfOEpelAKLZGRMOc&s=10"
                        alt="chobi nai">
                    <div class="area-info">
                        <div class="area-name">Fufuri nagar</div>
                        <div class="area-seats">25 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSKHmFmUUffvO0LSfVZgHs4Gqb5-6ZMKyouMxBM7cPe4hRq0ytmlrl3Kk&s=10"
                        alt="chobi nai">

                    <div class="area-info">
                        <div class="area-name">Dholak pur</div>
                        <div class="area-seats">15 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNMkFc-yXbzj6uxlzY7Suz8RpN2_4jZDlZcQzf9fAC6r4aWBT_p22WFIc&s=10"
                        alt="chobi nai">

                    <div class="area-info">
                        <div class="area-name">krisnonagr</div>
                        <div class="area-seats">45 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://trippainter.com/wp-content/uploads/2020/10/alir-guha-1024x576.jpg"
                        alt="chobi nai">

                    <div class="area-info">
                        <div class="area-name">ali babar guha</div>
                        <div class="area-seats">29 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://www.orfonline.org/public/uploads/posts/image/1776090651_img-north-korea.jpg"
                        alt="chobi nai">
                    <div class="area-info">
                        <div class="area-name">north korea</div>
                        <div class="area-seats">25 seats</div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    <div class="cta-wrapper">
        <section class="cta-banner">
            <h2 class="cta-title">Have a Seat to Offer?</h2>
            <p class="cta-subtitle">
                Post your available mess or hostel seat for free and connect
                with students looking for a place.
            </p>
            <a href="/PUC_project_git/Mess_Finder_Project/html_files/seat_posting_form.html" class="cta-btn">Post a Seat — Free</a>
        </section>
    </div>
    <script src="/js_files/index.js"></script>
</body>

</html>