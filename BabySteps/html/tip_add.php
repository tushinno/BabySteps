<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Add Tip - BabySteps Admin</title>
<link rel="icon" href="../image/babysteps_logo.jpg" type="image/jpeg">
<link rel="stylesheet" href="../css/tip_add.css">
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
    <a href="../php/tips.php">Tips</a>
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
          <h2>Add New Tip</h2>
          <form method="POST" action="../php/tip_add.php" class="entry-form">
            <input type="text" name="category" placeholder="Category (e.g. Foods to Avoid)" value="<?= htmlspecialchars($prefill_category ?? ($_POST['category'] ?? ''), ENT_QUOTES) ?>" required>
            <input type="text" name="subcategory" placeholder="Subcategory (optional)" value="<?= htmlspecialchars($_POST['subcategory'] ?? '', ENT_QUOTES) ?>">
            <textarea name="tip" placeholder="Enter the tip content..." rows="6" required><?= htmlspecialchars($_POST['tip'] ?? '', ENT_QUOTES) ?></textarea>

            <div class="entry-btns">
              <a class="btn-link" href="../php/admin.php"><button type="button" class="btn-action cancel">Cancel</button></a>
              <button type="submit" class="btn-action">Add Tip</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>
</body>
</html>
