<?php
require_once __DIR__ . '/check_session.php';

if (!isset($_SESSION['signup'])) {
    header("Location: ../html/signup_step1.php");
    exit;
}

$errors = [];
$password = '';
$confirm_password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    if ($password === '' || strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $_SESSION['signup']['password'] = password_hash($password, PASSWORD_DEFAULT);
        header("Location: ../php/signup_step3.php");
        exit;
    }
}

include __DIR__ . '/../html/signup_step2.php';