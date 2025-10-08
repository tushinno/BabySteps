<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BabySteps</title>
    <link rel="icon" href="../image/babysteps_logo.jpg" type="image/jpeg">
    <link rel="stylesheet" href="../css/signup_step1.css">
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
    <h2>Welcome to BabySteps</h2>
    <p>Join us and make an account!</p>

    <?php if (!empty($errors)): ?>
        <ul class="server_errors">
            <?php foreach($errors as $e): ?>
                <li><?php echo htmlspecialchars($e); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="../php/signup_step1.php" novalidate>
        <div class="group">
            <label class="field-label" for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required
                value="<?php echo htmlspecialchars($username); ?>">
        </div>

        <div class="group">
            <label class="field-label" for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter email address" required
                value="<?php echo htmlspecialchars($email); ?>">
        </div>

        <div class="buttons">
            <a href="../php/landing.php" class="cancel">Cancel</a>
            <button type="submit" class="next">Next</button>
        </div>
    </form>

    <p>Already have an account? <a href="../php/login.php" class="login">Login</a></p>
</div>
</section>
</body>
</html>