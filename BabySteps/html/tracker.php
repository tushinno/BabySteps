<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BabySteps</title>
<link rel="icon" href="../image/babysteps_logo.jpg" type="image/jpeg">
<link rel="stylesheet" href="../css/tracker.css">
</head>
<body>

<header class="header">
  <div class="header-left">
    <img src="../image/babysteps_logo.jpg" class="logo" alt="BabySteps">
    <h1 class="title">BabySteps</h1>
  </div>
  <nav class="nav">
    <a href="../php/main.php">Home</a>
    <a href="../php/tracker.php" class="active">Pregnancy Tracker</a>
    <a href="../php/journal.php">Journal</a>
    <a href="../php/tips.php">Tips</a>
    <?php if (strtolower($role) === 'admin'): ?>
      <a href="../php/admin.php" class="admin-btn">Admin Panel</a>
    <?php endif; ?>
    <a href="../php/logout.php">Logout</a>
  </nav>
</header>

<section class="mowm">
  <img src="../image/pregnant_lady2.jfif" class="bg-img">
  <div class="tracker-wrapper">
    <div class="bg-gray-box"></div>
    <div class="tracker-container">

      <div class="alert-container">
        <?php if (!empty($flash_success)): ?>
          <div class="alert success">
            <?php foreach ((array)$flash_success as $msg): ?>
              <p><?= htmlspecialchars($msg, ENT_QUOTES) ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <?php if (!empty($flash_error)): ?>
          <div class="alert error">
            <?php foreach ((array)$flash_error as $msg): ?>
              <p><?= htmlspecialchars($msg, ENT_QUOTES) ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="due-update-box">
        <div class="due-left">
          <span class="label">Due Date is on:</span>
          <span class="due-value"><?= $due_display ?></span>
        </div>
        <div class="due-right">
          <span class="label">Update Due Date:</span>
          <form method="POST" action="../php/tracker_update.php" novalidate class="update-form">
            <input type="date" name="due_date" value="<?= $due_display ?>" required>
            <button type="submit">Update</button>
          </form>
        </div>
      </div>

      <div class="bottom-box">
        <div class="time-box">
          <h3>Countdown</h3>
          <p class="small"><?= $countdown_display ?></p>
          <h3>Current Week</h3>
          <p class="small"><?= $week_display ?></p>
          <?php if (!empty($trimester)): ?>
            <h3>Trimester</h3>
            <p class="small"><?= $trimester ?></p>
          <?php endif; ?>
        </div>

        <div class="milestone-box">
          <h2>Weekly Milestone</h2>
          <p class="small"><?= $milestone_display ?></p>
          <div class="progress-wrap">
            <div class="small">Progress</div>
            <div class="progress-bar" aria-hidden="true">
              <div class="progress-fill" style="width: <?= $progress ?>%;"></div>
            </div>
            <div class="progress-text small">
              <?= $progress ?>% (Week <?= $week_display ?> of 40)
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

</body>
</html>