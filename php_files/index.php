<?php
session_start();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/PUC_project_git/Mess_Finder_Project/css_files/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
</head>

<body>
    <nav class="navbar">
        <div class="brand">
            <div class="logo-icon">
                <i class="ti ti-home-search" aria-hidden="true"></i>
            </div>
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
                    <i class="fa-solid fa-user" ></i>
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
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5erweRgwNy3OMLr5wzWefvZapQApiGAhkb2nAFrpCbQ&s=10"
                        alt="chobi nai">
                    <div class="area-info">
                        <div class="area-name">jamal khan</div>
                        <div class="area-seats">25 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRgEp1aSO41i6mUGwQyOwqniO5jJoIEFUbONOYG_Z0Q0LaT_-8F7J4BWgY&s=10"
                        alt="chobi nai">

                    <div class="area-info">
                        <div class="area-name">Port Colony</div>
                        <div class="area-seats">15 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwOVipHXl1js70u25Fa9H1HS9gDRTDAj-Vv1eRE_O6-Q5ru0wC2VAPOEc&s=10"
                        alt="chobi nai">

                    <div class="area-info">
                        <div class="area-name">chowmuhani</div>
                        <div class="area-seats">45 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1GXH8cfGgw-7l8vXN_JFk2BoVXX3NwMjigC84gvdD1sB601HuTAZ-RzA&s=10"
                        alt="chobi nai">

                    <div class="area-info">
                        <div class="area-name">DC hill area</div>
                        <div class="area-seats">29 seats</div>
                    </div>
                </div>
                <div class="area-card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5MdFsiSI7hP2SbhS7NNzSCLO2Rh2Mdq_nXspN-zid5STZHIb6oz7V772v&s=10"
                        alt="chobi nai">
                    <div class="area-info">
                        <div class="area-name">Hemsen Lane</div>
                        <div class="area-seats">10 seats</div>
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


    <footer class="site-footer">
        <div class="footer-grid">
            <div style="margin-top: 15px;">
                <h3 class="footer-logo">
                    <i class="ti ti-home-search" style="color:#4ade80;margin-right:6px;" aria-hidden="true"></i>
                    MessFinder <span>BD</span></h3>
                <p>Find and post mess and hostel seats across Bangladesh.</p>
            </div>
            <div>
                <h4>Quick links</h4>
                <a href="#">Find a seat</a>
                <a href="#">post a seat</a>
                <a href="#">Login</a>
            </div>
            <div>
                <h4>Contact</h4>
                <p>tibroshill020@gmail.com</p>
                <div class="contacts-icons">
                    <a href="">
                        <i class="fa-brands fa-square-github"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a href="">
                        <i class="fa-solid fa-laptop-code"></i>
                    </a>
                    
                </div>
            </div>
        </div>

        <div class="footer-bottom">&copy;
            MessFinderBD. All rights reserved.
        </div>
    </footer>
    <script src="/js_files/index.js"></script>
</body>

</html>