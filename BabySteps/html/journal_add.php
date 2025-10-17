<?php
$role = $role ?? '';
$flash_error = $flash_error ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>BabySteps</title>
<link rel="icon" href="../image/babysteps_logo.jpg" type="image/jpeg">
<link rel="stylesheet" href="../css/journal.css">
</head>
<body class="single-entry">
<header class="header">
  <div class="header-left">
    <img src="../image/babysteps_logo.jpg" class="logo" alt="BabySteps">
    <h1 class="title">BabySteps</h1>
  </div>
  <nav class="nav">
    <a href="../php/main.php">Home</a>
    <a href="../php/tracker.php">Pregnancy Tracker</a>
    <a href="../php/journal.php">Journal</a>
    <a href="../php/references.php">References</a>
    <?php if (!empty($role) && strtolower($role) === 'admin'): ?>
      <a href="../php/admin.php" class="admin-btn">Admin Panel</a>
    <?php endif; ?>
    <a href="../php/logout.php">Logout</a>
  </nav>
</header>

<section class="mowm">
  <img src="../image/pregnant_lady2.jfif" class="bg-img" alt="Pregnant Lady">
  <div class="journal-wrapper">
    <div class="journal-inner">
      <div class="journal-container">
        <?php if (!empty($flash_error)): ?>
          <div class="alert error">
            <?php foreach ((array)$flash_error as $msg): ?>
              <p><?= htmlspecialchars($msg, ENT_QUOTES) ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <div class="journal-entry">
          <h2>Add New Entry</h2>
          <form method="POST" action="../php/journal_add.php" class="entry-form">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="content" placeholder="Write your thoughts..." rows="8" required></textarea>
            <div class="entry-btns">
              <a class="btn-link" href="../php/journal.php"><button type="button" class="btn-action cancel">Cancel</button></a>
              <button type="submit" class="btn-action">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
