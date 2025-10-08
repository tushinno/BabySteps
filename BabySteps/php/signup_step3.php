<?php
require_once __DIR__ . '/check_session.php';

if (!isset($_SESSION['signup'])) {
    header("Location: ../html/signup_step1.php");
    exit;
}

$errors = [];
$due_date = $_SESSION['signup']['due_date'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $due_date = trim($_POST['due_date'] ?? '');

    if ($due_date === '') {
        $errors[] = "Please enter your due date.";
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $due_date)) {
        $errors[] = "Due date format is invalid. Use YYYY-MM-DD.";
    }

    if (empty($errors)) {
        $_SESSION['signup']['due_date'] = $due_date;
        header("Location: ../php/signup_step4.php");
        exit;
    }
}

include __DIR__ . '/../html/signup_step3.php';