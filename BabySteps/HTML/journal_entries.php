<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>BabySteps</title>
<link rel="icon" href="../image/babysteps_logo.jpg" type="image/jpeg">
<link rel="stylesheet" href="../css/journal_entries.css">
</head>
<body>
<header class="header">
  <div class="header-left">
    <img src="../image/babysteps_logo.jpg" class="logo" alt="BabySteps">
    <h1 class="title">BabySteps</h1>
  </div>
  <nav class="nav">
    <a href="../php/main.php">Home</a>
    <a href="../php/tracker.php">Pregnancy Tracker</a>
    <a href="../php/journal.php" class="active">Journal</a>
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

        <?php if (empty($entries)): ?>
          <div class="journal-entry">
            <h3>No entries yet</h3>
            <p class="small">Click the Add Entry button to create your first journal entry.</p>
          </div>
        <?php else: ?>
          <?php foreach ($entries as $entry): ?>
            <div class="journal-entry">
              <h3><?= htmlspecialchars($entry['title'], ENT_QUOTES) ?></h3>
              <p><?= nl2br(htmlspecialchars($entry['content'], ENT_QUOTES)) ?></p>
              <div class="entry-btns">
                <a class="btn-link" href="../php/journal_edit.php?id=<?= (int)$entry['id'] ?>"><button class="btn-action">Edit</button></a>
                <a class="btn-link" href="../php/journal_delete.php?id=<?= (int)$entry['id'] ?>" onclick="return confirm('Delete this entry?')"><button class="btn-action delete">Delete</button></a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <a href="../php/journal_add.php" class="add-entry-btn">+ Add Entry</a>
</section>
</body>
</html>