<?php
require_once __DIR__ . '/check_session.php';

if (empty($_SESSION['signup'])) {
    header("Location: ../php/signup_step1.php");
    exit;
}

if (!isset($_SESSION['signup_role'])) {
    $_SESSION['signup_role'] = 'user';
}

if ($_SESSION['signup_role'] === 'admin') {
    header("Location: ../php/signup_step4.php");
    exit;
}

$errors = [];
$lmp = $_SESSION['signup']['lmp'] ?? '';
$cycle_length = $_SESSION['signup']['cycle_length'] ?? '28';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lmp = trim($_POST['lmp'] ?? '');
    $cycle_length = (int) ($_POST['cycle_length'] ?? 28);

    if ($lmp === '') {
        $errors[] = "Please enter the first day of your last menstrual period.";
    } else {
        $today = new DateTime();
        $entered = DateTime::createFromFormat('Y-m-d', $lmp);
        if (!$entered) {
            $errors[] = "Invalid date format.";
        } else {
            $diffDays = (int)$entered->diff($today)->days;
            if ($entered < (clone $today)->modify('-3 years')) {
                $errors[] = "That’s too far in the past. Enter a recent date.";
            } elseif ($entered > $today) {
                $errors[] = "LMP cannot be in the future.";
            } elseif ($entered < $today && $diffDays > 280) {
                $errors[] = "That’s more than 40 weeks ago. Please check the date.";
            } elseif ($entered > (clone $today)->modify('+1 day')) {
                $errors[] = "Invalid LMP date.";
            }
        }
    }

    if ($cycle_length < 21 || $cycle_length > 40) {
        $errors[] = "Average cycle length should be between 21 and 40 days.";
    }

    if (empty($errors)) {
        $lmp_date = DateTime::createFromFormat('Y-m-d', $lmp);
        $adjust = $cycle_length - 28;
        $due = (clone $lmp_date)->modify('+280 days')->modify("{$adjust} days");
        $today = new DateTime();
        if ($due < $today->modify('-1 day')) {
            $errors[] = "Calculated due date is in the past. Please check your LMP.";
        }
    }

    if (empty($errors)) {
        $_SESSION['signup']['lmp'] = $lmp;
        $_SESSION['signup']['cycle_length'] = $cycle_length;
        $_SESSION['signup']['due_date'] = $due->format('Y-m-d');
        header("Location: ../php/signup_step4.php");
        exit;
    }
}

include __DIR__ . '/../html/signup_step3.php';
