<?php
require_once __DIR__ . '/check_session.php';

if (empty($_SESSION['signup'])) {
    header("Location: ../php/signup_step1.php");
    exit;
}

$errors = [];
$due_date = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $due_date = trim($_POST['due_date'] ?? '');

    if ($due_date === '') {
        $errors[] = "Please enter your due date.";
    } else {
        $today = new DateTime();
        $entered_date = new DateTime($due_date);
        $days_diff = (int)$entered_date->diff($today)->days;

        if ($entered_date < (clone $today)->modify('-3 years')) {
            $errors[] = "That’s way too far in the past! Please enter a recent date.";
        } elseif ($entered_date < $today && $days_diff > 280) {
            $errors[] = "That’s more than 40 weeks ago!";
        } elseif ($entered_date < $today) {
            $errors[] = "Your child is already born! Please enter a future date.";
        } elseif ($entered_date > (clone $today)->modify('+1 year')) {
            $errors[] = "That’s too far in the future! Please enter a realistic due date.";
        }
    }

    if (empty($errors)) {
        $_SESSION['signup']['due_date'] = $due_date;
        header("Location: ../php/signup_step4.php");
        exit;
    }
}

include __DIR__ . '/../html/signup_step3.php';