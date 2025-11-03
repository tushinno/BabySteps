<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === null || $id === false) {
    die('Invalid request. No user ID provided.');
}

$errors = [];

$stmt = $conn->prepare(
    "SELECT id, username, email, due_date, role 
    FROM users 
    WHERE id = ?"
);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    die("User not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $due_date = trim($_POST['due_date'] ?? '');
    $role = trim($_POST['role'] ?? '');

    // username/email validation
    if ($username === '' || $email === '') {
        $errors[] = "Username and Email are required.";
    } elseif (strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters long.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // due date validation 
    if ($due_date === '') {
        $errors[] = "Please enter your due date.";
    } else {
        $today = new DateTimeImmutable('today');
        $entered_date = DateTime::createFromFormat('Y-m-d', $due_date);

        if (!$entered_date) {
            $errors[] = "Invalid due date format.";
        } else {
            $threeYearsAgo   = $today->modify('-3 years');
            $oneYearAhead    = $today->modify('+1 year');
            $diffDays        = (int) $entered_date->diff($today)->days;

            if ($entered_date < $threeYearsAgo) {
                $errors[] = "That’s way too far in the past! Please enter a recent date.";
            } elseif ($entered_date < $today && $diffDays > 280) {
                $errors[] = "That’s more than 40 weeks ago!";
            } elseif ($entered_date < $today) {
                $errors[] = "Your child is already born! Please enter a future date.";
            } elseif ($entered_date > $oneYearAhead) {
                $errors[] = "That’s too far in the future! Please enter a realistic due date.";
            }
        }
    }

    if (empty($errors)) {
        $stmt = $conn->prepare(
            "UPDATE users 
            SET username = ?, email = ?, due_date = ?, role = ? 
            WHERE id = ?");
        if (!$stmt) {
            $errors[] = "Prepare failed: " . $conn->error;
        } else {
            $stmt->bind_param("ssssi", $username, $email, $due_date, $role, $id);

            if ($stmt->execute()) {
                $_SESSION['flash_success'][] = "User updated successfully!";
                header("Location: admin.php");
                exit;
            }
            $stmt->close();
        }
    }
    $user['username'] = $username;
    $user['email']    = $email;
    $user['due_date'] = $due_date;
    $user['role']     = $role;
}

$conn->close();

include __DIR__ . '/../html/edit_user.php';