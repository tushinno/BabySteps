<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - BabySteps</title>
  <link rel="icon" href="../image/babysteps_logo.jpg" type="image/jpeg">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<header class="header">
  <div class="header-left">
    <img src="../image/babysteps_logo.jpg" class="logo" alt="BabySteps Logo">
    <h1 class="title">BabySteps Admin</h1>
  </div>
</header>

<section class="mowm">
  <img src="../image/pregnant_lady2.jfif" class="bg-img" alt="Background">
  <div class="admin-box">
    <h2>👶 Admin Dashboard</h2>
    <p>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>! Manage all BabySteps user accounts below.</p>
  </div>
</section>

<div class="content-section">
  <div class="info-container">
    <h3 class="table-title">User Management</h3>

    <?php if (!empty($flash_success)): ?>
      <div class="alert success">
        <?php foreach ($flash_success as $msg): ?>
          <p><?= htmlspecialchars($msg) ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($flash_error)): ?>
      <div class="alert error">
        <?php foreach ($flash_error as $msg): ?>
          <p><?= htmlspecialchars($msg) ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Due Date</th>
            <th>Created At</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
              <tr>
                <td><?= htmlspecialchars($user['id']) ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['due_date']) ?></td>
                <td><?= htmlspecialchars($user['created_at']) ?></td>
                <td><?= htmlspecialchars($user['role']) ?></td>
                <td class="actions">
                  <?php if ($user['id'] !== $_SESSION['user_id']): ?>
                    <a href="../php/edit_user.php?id=<?= htmlspecialchars($user['id']) ?>" class="edit-btn">Edit</a>
                    <form method="POST" class="inline-form" onsubmit="return confirm('Are you sure you want to delete this user?');">
                      <input type="hidden" name="delete_user_id" value="<?= htmlspecialchars($user['id']) ?>">
                      <button type="submit" class="delete-btn">Delete</button>
                    </form>
                  <?php else: ?>
                    <span class="self">You</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="7">No users found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="back-btn-container">
      <a href="../php/main.php" class="btn">Back to Main Page</a>
    </div>
  </div>
</div>

</body>
</html>
