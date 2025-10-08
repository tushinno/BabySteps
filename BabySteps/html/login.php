<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BabySteps</title>
    <link rel="icon" href="../image/babysteps_logo.jpg" type="image/jpeg">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<header class="header">
    <img src="../image/babysteps_logo.jpg" class="logo" alt="BabySteps logo">
    <h1>BabySteps</h1>
</header>

<section class="mowm">
    <img src="../image/pregnant_lady1.jfif" class="bg-img" alt="">
    <div class="overlay"></div>

    <div class="login_box">
        <h2>Good to have you back!</h2>
        <p>Check in with your progress.</p>

        <?php if (!empty($errors)): ?>
            <ul class="server_errors">
                <?php foreach ($errors as $e): ?>
                    <li><?php echo htmlspecialchars($e, ENT_QUOTES); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form method="POST" action="../php/login.php" novalidate>
            <div class="group">
                <label class="field-label" for="identifier">Username or Email</label>
                <input type="text" id="identifier" name="identifier" placeholder="Enter username or email"
                       value="<?php echo htmlspecialchars($identifier, ENT_QUOTES); ?>" required>
            </div>

            <div class="group">
                <label class="field-label" for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <div class="buttons">
                <a href="../php/landing.php" class="cancel">Cancel</a>
                <button type="submit" class="next">Login</button>
            </div>
        </form>

        <p>Don't have an account? <a href="../php/signup_step1.php" class="signup">Sign up</a></p>
    </div>
</section>

</body>
</html>