<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BabySteps - Pregnancy Tracker</title>
  <link rel="icon" href="../image/babysteps_logo.jpg" type="image/jpeg">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/tracker.css">
</head>
<body>

<header class="header">
  <div class="header-left">
    <img src="../image/babysteps_logo.jpg" class="logo" alt="BabySteps">
    <h1 class="title">BabySteps</h1>
  </div>

  <div class="header-right">
    <nav class="nav">
      <a href="../php/main.php">Home</a>
      <a href="../php/tracker.php" class="active">Pregnancy Tracker</a>
      <a href="../php/journal.php">Journal</a>
      <a href="../php/references.php">References</a>
      <a href="../php/logout.php">Logout</a>
    </nav>
  </div>
</header>

<section class="mowm">
  <img src="../image/pregnant_lady2.jfif" class="bg-img" alt="">
  <div class="overlay"></div>

  <div class="tracker-container">
    <?php if (!empty($flash_success)): ?>
      <div class="message success">
        <?php foreach ($flash_success as $msg): ?>
          <p><?php echo htmlspecialchars($msg, ENT_QUOTES); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($flash_errors)): ?>
      <div class="message error">
        <?php foreach ($flash_errors as $err): ?>
          <p><?php echo htmlspecialchars($err, ENT_QUOTES); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="due-box">
      <h2>Your Due Date</h2>
      <p><?php echo $due_date ? htmlspecialchars($due_date, ENT_QUOTES) : 'Not set'; ?></p>
    </div>

    <div class="update-box">
      <h2>Enter New Due Date</h2>
      <form method="POST" action="../php/tracker_update.php" novalidate>
        <input type="date" name="due_date" value="<?php echo htmlspecialchars($due_date, ENT_QUOTES); ?>" required>
        <button type="submit">Update</button>
      </form>
    </div>
  </div>
</section>

</body>
</html>