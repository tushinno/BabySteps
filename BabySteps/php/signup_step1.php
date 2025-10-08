<?php
require_once __DIR__ . '/check_session.php';

if (!isset($_SESSION['signup'])) {
    $_SESSION['signup'] = [];
}

$errors = [];
$username = $_SESSION['signup']['username'] ?? '';
$email = $_SESSION['signup']['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($username === '' || $email === '') {
        $errors[] = "All fields are required.";
    } elseif (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters long.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($errors)) {
        $_SESSION['signup']['username'] = $username;
        $_SESSION['signup']['email'] = $email;
        header("Location: ../php/signup_step2.php");
        exit;
    }
}

include __DIR__ . '/../html/signup_step1.php';