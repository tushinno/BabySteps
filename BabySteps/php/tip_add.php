<?php
// php/tip_add.php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (empty($_SESSION['user_id']) || empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../php/login.php');
    exit;
}

$flash_error = [];
$prefill_category = trim($_GET['category'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = trim($_POST['category'] ?? '');
    $subcategory = trim($_POST['subcategory'] ?? '');
    $tip = trim($_POST['tip'] ?? '');

    if ($category === '' || $tip === '') {
        $flash_error[] = 'Category and Tip text are required.';
    } else {
        $stmt = $conn->prepare('INSERT INTO wellness_tips (category, subcategory, tip) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $category, $subcategory, $tip);
        if ($stmt->execute()) {
            $_SESSION['flash_success'] = ['Tip added successfully.'];
            $stmt->close();
            $conn->close();
            header('Location: ../php/admin.php');
            exit;
        } else {
            $flash_error[] = 'Error adding tip: ' . $stmt->error;
            $stmt->close();
        }
    }
}

// close DB but keep variables for the view
$conn->close();

include __DIR__ . '/../html/tip_add.php';
