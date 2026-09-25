<?php
include 'db_connect.php';

// Get the listing id from the URL, e.g. listing_details.php?id=3
$listingId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Join with users so we can show "Posted by" — matches user_id -> users.id
$sql = "SELECT listings.*, users.full_name AS owner_name 
        FROM listings 
        JOIN users ON listings.user_id = users.id 
        WHERE listings.id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $listingId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$listing = mysqli_fetch_assoc($result);

// If no listing matches this id, stop here
if (!$listing) {
    die("Listing not found.");
}

// Map DB seat_type value to the short badge label
$typeLabels = [
    'Single' => 'Single Room',
    'Shared (2)' => 'Double Room',
    'Shared (3+)' => 'Triple Room'
];
$badgeLabel = $typeLabels[$listing['seat_type']] ?? $listing['seat_type'];

$photo = !empty($listing['photo']) ? '/PUC_project_git/Mess_Finder_Project/mess_photo/' . $listing['photo'] : 'https://picsum.photos/seed/' . $listing['id'] . '/800/500';

$availableFrom = !empty($listing['available_from']) ? $listing['available_from'] : 'Not specified';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($listing['title']); ?> — MessFinderBD</title>
  <link rel="stylesheet" href="../css_files/seat_details.css">
</head>
<body>

<a href="seat.php" class="back-link">← Back to search</a>

<div class="detail-card">
  <div class="detail-img-wrap">
    <img src="<?php echo htmlspecialchars($photo); ?>" alt="<?php echo htmlspecialchars($listing['title']); ?>">
    <span class="type-badge"><?php echo htmlspecialchars($badgeLabel); ?></span>
  </div>

  <div class="detail-body">
    <div class="title-row">
      <div>
        <div class="detail-title"><?php echo htmlspecialchars($listing['title']); ?></div>
        <div class="detail-location">📍 <?php echo htmlspecialchars($listing['area']); ?>, <?php echo htmlspecialchars($listing['city']); ?></div>
      </div>
      <div class="detail-price">
        ৳<?php echo number_format($listing['monthly_rent']); ?>
        <small>per month</small>
      </div>
    </div>

    <div class="info-grid">
      <div class="info-box">
        <div class="info-label">Food</div>
        <div class="info-value"><?php echo $listing['food'] === 'Yes' ? 'Included' : 'Not included'; ?></div>
      </div>
      <div class="info-box">
        <div class="info-label">Bathroom</div>
        <div class="info-value"><?php echo htmlspecialchars($listing['bathroom']); ?></div>
      </div>
      <div class="info-box">
        <div class="info-label">Internet</div>
        <div class="info-value"><?php echo $listing['internet'] === 'Yes' ? 'Available' : 'Not available'; ?></div>
      </div>
      <div class="info-box">
        <div class="info-label">Electricity</div>
        <div class="info-value"><?php echo htmlspecialchars($listing['electricity']); ?></div>
      </div>
      <div class="info-box">
        <div class="info-label">Available From</div>
        <div class="info-value"><?php echo htmlspecialchars($availableFrom); ?></div>
      </div>
      <div class="info-box">
        <div class="info-label">Seat Type</div>
        <div class="info-value"><?php echo htmlspecialchars($listing['seat_type']); ?></div>
      </div>
    </div>

    <?php if (!empty($listing['description'])): ?>
      <div class="section-title">Description</div>
      <p class="detail-description"><?php echo nl2br(htmlspecialchars($listing['description'])); ?></p>
    <?php endif; ?>

    <div class="posted-row">
      <div>
        <div class="posted-by-label">Posted by</div>
        <div class="posted-by-name"><?php echo htmlspecialchars($listing['owner_name']); ?></div>
      </div>
      <div class="action-buttons">
        <button class="save-btn">🤍 Save</button>
        <a href="#" class="contact-btn">Contact</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>