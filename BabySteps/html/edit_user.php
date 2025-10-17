<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../css/edit_user.css">
</head>
<body>

<header class="header">
    <img src="../image/babysteps_logo.jpg" class="logo">
    <h1>BabySteps</h1>
</header>

<section class="mowm">
    <img src="../image/pregnant_lady1.jfif" class="bg-img">
    <div class="overlay"></div>

    <div class="signup_box">
        <h2>Edit User</h2>

        <?php if (!empty($errors)): ?>
            <ul class="server_errors">
                <?php foreach($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="group">
                <label class="field-label" for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username"
                       value="<?= htmlspecialchars($user['username'] ?? '') ?>" required>
            </div>

            <div class="group">
                <label class="field-label" for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter email"
                       value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
            </div>

            <div class="group">
                <label class="field-label" for="due_date">Due Date</label>
                <input type="date" id="due_date" name="due_date"
                       value="<?= htmlspecialchars($user['due_date'] ?? '') ?>" required>
            </div>

            <div class="group">
                <label class="field-label" for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="user" <?= ($user['role'] === 'user') ? 'selected' : '' ?>>User</option>
                    <option value="admin" <?= ($user['role'] === 'admin') ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>

            <div class="buttons">
                <a href="admin.php" class="cancel">Cancel</a>
                <button type="submit" class="next">Update</button>
            </div>
        </form>
    </div>
</section>

</body>
</html>
