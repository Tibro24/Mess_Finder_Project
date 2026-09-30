<?php
$listingId = isset($_GET['listing_id']) ? (int) $_GET['listing_id'] : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report a Listing</title>
  <link rel="stylesheet" href="../css_files/report.css">
</head>

<body>

  <div class="form-card">
    <h1 class="form-title">Report a Listing</h1>
    <p class="form-subtitle">Let us know what's wrong — we'll review it shortly.</p>

    <form action="/PUC_project_git/Mess_Finder_Project/php_files/submit-report.php" method="post">
      <input type="hidden" name="listing_id" value="<?php echo $listingId; ?>">

      <div class="form-group">
        <label for="reason">Reason</label>
        <select id="reason" name="reason" required>
          <option value="">Select a reason</option>
          <option value="Fake Listing">Fake Listing</option>
          <option value="Scam">Scam</option>
          <option value="Inappropriate Content">Inappropriate Content</option>
          <option value="Owner Unresponsive">Owner Unresponsive</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Explain what's wrong with this listing..."
          required></textarea>
      </div>

      <button type="submit" class="submit-btn">Submit Report</button>
    </form>
  </div>

</body>

</html>