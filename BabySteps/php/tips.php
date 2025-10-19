<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'] ?? '';
$role = $_SESSION['role'] ?? 'user';

// Fetch tips from DB
$sql = "SELECT id, category, subcategory, tip FROM wellness_tips ORDER BY category ASC, id ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$tips = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Group tips by category for easier rendering
$groupedTips = [];
foreach ($tips as $t) {
    $cat = $t['category'] ?? 'General';
    if (!isset($groupedTips[$cat])) {
        $groupedTips[$cat] = [];
    }
    $groupedTips[$cat][] = $t;
}

// make $groupedTips available to the template
include __DIR__ . '/../html/tips.php';
