<?php
// php/tip_edit.php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (empty($_SESSION['user_id']) || empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../php/login.php');
    exit;
}

$flash_error = [];
$tip_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($tip_id <= 0) {
    $_SESSION['flash_error'] = ['Invalid tip id.'];
    header('Location: ../php/admin.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = trim($_POST['category'] ?? '');
    $subcategory = trim($_POST['subcategory'] ?? '');
    $tip = trim($_POST['tip'] ?? '');

    if ($category === '' || $tip === '') {
        $flash_error[] = 'Category and Tip text are required.';
    } else {
        $stmt = $conn->prepare('UPDATE wellness_tips SET category = ?, subcategory = ?, tip = ? WHERE id = ?');
        $stmt->bind_param('sssi', $category, $subcategory, $tip, $tip_id);
        if ($stmt->execute()) {
            $_SESSION['flash_success'] = ['Tip updated successfully.'];
            $stmt->close();
            $conn->close();
            header('Location: ../php/admin.php');
            exit;
        } else {
            $flash_error[] = 'Error updating tip: ' . $stmt->error;
            $stmt->close();
        }
    }
}

// Load existing tip for initial form values (if GET or if POST had errors)
$stmt = $conn->prepare('SELECT id, category, subcategory, tip FROM wellness_tips WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $tip_id);
$stmt->execute();
$result = $stmt->get_result();
$existing = $result ? $result->fetch_assoc() : null;
$stmt->close();

if (!$existing) {
    $_SESSION['flash_error'] = ['Tip not found.'];
    header('Location: ../php/admin.php');
    exit;
}

$conn->close();

include __DIR__ . '/../html/tip_edit.php';
