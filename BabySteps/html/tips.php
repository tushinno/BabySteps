<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BabySteps - Tips</title>
  <link rel="icon" href="../image/babysteps_logo.jpg" type="image/jpeg">
  <link rel="stylesheet" href="../css/tips.css">
</head>
<body>

<header class="header">
  <div class="header-left">
    <img src="../image/babysteps_logo.jpg" class="logo" alt="BabySteps logo">
    <h1 class="title">BabySteps</h1>
  </div>

  <div class="header-right">
    <nav class="nav">
      <a href="../php/main.php">Home</a>
      <a href="../php/tracker.php">Pregnancy Tracker</a>
      <a href="../php/journal.php">Journal</a>
      <a href="../php/tips.php" class="active">Tips</a>
      <?php if (strtolower($role) === 'admin'): ?>
        <a href="../php/admin.php" class="admin-btn">Admin Panel</a>
      <?php endif; ?>
      <a href="../php/logout.php">Logout</a>
    </nav>
  </div>
</header>

<section class="mowm">
  <img src="../image/pregnant_lady2.jfif" class="bg-img" alt="pregnant">

  <div class="welcome-box">
    <h2>Wellness & Nutrition Tips</h2>
    <p>Guidance for a healthy pregnancy. From food safety to daily care routines.</p>
  </div>
</section>

<div class="motivation-box">Stay strong mowm!</div>

<main id="tips" class="page-wrap">
  <?php if (empty($groupedTips)): ?>
    <p class="no-tips">No tips found.</p>
  <?php else: ?>
    <?php foreach ($groupedTips as $category => $items): ?>
      <section class="info-container">
        <h3 class="container-title"><?php echo htmlspecialchars($category); ?></h3>

        <div class="cards">
          <?php foreach ($items as $item): ?>
            <article class="info-box">
              <?php if (!empty($item['subcategory'])): ?>
                <h4 class="info-sub"><?php echo htmlspecialchars($item['subcategory']); ?></h4>
              <?php endif; ?>
              <p class="info-text"><?php echo nl2br(htmlspecialchars($item['tip'])); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </section>
    <?php endforeach; ?>
  <?php endif; ?>
</main>

</body>
</html>
