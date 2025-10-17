<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BabySteps</title>
  <link rel="icon" href="../image/babysteps_logo.jpg" type="image/jpeg">
  <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<header class="header">
  <div class="header-left">
    <img src="../image/babysteps_logo.jpg" class="logo" alt="BabySteps">
    <h1 class="title">BabySteps</h1>
  </div>
  <nav class="nav">
    <a href="../php/main.php" class="active">Home</a>
    <a href="../php/tracker.php">Pregnancy Tracker</a>
    <a href="../php/journal.php">Journal</a>
    <a href="../php/references.php">References</a>
    <?php if (strtolower($role) === 'admin'): ?>
      <a href="../php/admin.php" class="admin-btn">Admin Panel</a>
    <?php endif; ?>
    <a href="../php/logout.php">Logout</a>
  </nav>
</header>

<section class="mowm">
  <img src="../image/pregnant_lady2.jfif" class="bg-img" alt="">
  <div class="welcome-box">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>You are now logged in. Enjoy tracking your pregnancy journey with BabySteps.</p>
  </div>
</section>

<div class="motivation-box">
  Let's stay on track!
</div>

<section class="content-section">
  <div class="info-container">
    <div class="info-box">
      <h3>Progress Overview</h3>
      <p>Track how far you are in your pregnancy journey. View your baby’s weekly growth and wellness updates.</p>
      <a href="../php/tracker.php" class="btn">View Tracker</a>
    </div>
    <div class="info-box">
      <h3>Personal Journal</h3>
      <p>Document your thoughts, milestones, and memorable moments as you go through each week.</p>
      <a href="../php/journal.php" class="btn">Go to Journal</a>
    </div>
    <div class="info-box">
      <h3>Wellness Tips</h3>
      <p>Stay healthy with curated tips on nutrition, self-care, and activities that keep you and your baby safe.</p>
      <a href="../php/references.php" class="btn">View Tips</a>
    </div>
  </div>
</section>

</body>
</html>
