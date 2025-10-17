<?php
session_start();
require_once __DIR__ . '/db_connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    die("Invalid request. No user ID provided.");
}

$id = intval($_GET['id']);
$errors = [];
$user = [
    'username' => '',
    'email' => '',
    'due_date' => '',
    'role' => ''
];

$stmt = $conn->prepare("SELECT id, username, email, due_date, role FROM users WHERE id = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();
$stmt->close();

if (!$userData) {
    die("User not found.");
}

$user = $userData;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $due_date = trim($_POST['due_date'] ?? '');
    $role = trim($_POST['role'] ?? '');

    if ($username === '' || $email === '') {
        $errors[] = "Username and Email are required.";
    } elseif (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters long.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if ($due_date === '') {
        $errors[] = "Please enter your due date.";
    } else {
        $today = new DateTime();
        $entered_date = DateTime::createFromFormat('Y-m-d', $due_date);
        if (!$entered_date) {
            $errors[] = "Invalid due date format.";
        } else {
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
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, due_date = ?, role = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $username, $email, $due_date, $role, $id);

        if ($stmt->execute()) {
            $_SESSION['flash_success'][] = "User updated successfully!";
            header("Location: admin.php");
            exit;
        } else {
            $errors[] = "Error updating user: " . $stmt->error;
        }

        $stmt->close();
    }

    $user['username'] = $username;
    $user['email'] = $email;
    $user['due_date'] = $due_date;
    $user['role'] = $role;
}

$conn->close();

include __DIR__ . '/../html/edit_user.php';
