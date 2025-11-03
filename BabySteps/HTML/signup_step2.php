<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BabySteps</title>
    <link rel="icon" href="../image/babysteps_logo.jpg" type="image/jpeg">
    <link rel="stylesheet" href="../css/signup_step2.css">
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
        <h2>Create Your Password</h2>
        <p>Choose a secure password for your account.</p>

        <?php if (!empty($errors)): ?>
            <ul class="server_errors">
                <?php foreach($errors as $e) echo "<li>".htmlspecialchars($e)."</li>"; ?>
            </ul>
        <?php endif; ?>

        <form method="POST" action="../php/signup_step2.php" novalidate>
            <div class="group">
                <label class="field-label" for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>

            <div class="group">
                <label class="field-label" for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
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