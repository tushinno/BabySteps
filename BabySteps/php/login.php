<?php
require_once __DIR__ . '/db_connection.php';
require_once __DIR__ . '/check_session.php';

$errors = [];
$identifier = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = trim($_POST['identifier'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($identifier === '' || $password === '') {
        $errors[] = "All fields are required.";
    } else {
        $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE username = ? OR email = ? LIMIT 1");
        $stmt->bind_param("ss", $identifier, $identifier);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $email_db, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                header("Location: ../php/main.php");
                exit;
            } else {
                $errors[] = "Invalid password.";
            }
        } else {
            $errors[] = "No account found with that username or email.";
        }

        $stmt->close();
    }
}
$conn->close();

include __DIR__ . '/../html/login.php';
