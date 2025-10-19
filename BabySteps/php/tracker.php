<?php
require_once __DIR__ . '/../php/check_session.php';
require_once __DIR__ . '/../php/db_connection.php';

$role = $_SESSION['role'];
$user_id = (int)($_SESSION['user_id']);
$username = $_SESSION['username'];

$flash_success = $_SESSION['flash_success'] ?? [];
$flash_error = $_SESSION['flash_error'] ?? [];
unset($_SESSION['flash_success'], $_SESSION['flash_error']);

$stmt = $conn->prepare("SELECT due_date FROM users WHERE id = ? LIMIT 1");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($due_date);
$stmt->fetch();
$stmt->close();

if (!$due_date) {
    $due_date = date('Y-m-d', strtotime('+20 weeks'));
}

// countdown 'to
$today = time();
$due = strtotime($due_date);
$days_left = (int) floor(($due - $today) / 86400);
$countdown = $days_left < 0
    ? abs($days_left) . " day(s) past due"
    : "{$days_left} day(s) left";

// curr week 'to
$preg_days = max(0, min(280, 280 - $days_left));
$display_week = max(1, min(40, (int) ceil($preg_days / 7)));

// trimester
$trimester = '';
if (!empty($display_week)) {
    $trimester = $display_week <= 12 ? '1st Trimester'
        : ($display_week <= 27 ? '2nd Trimester' : '3rd Trimester');
}

// progress %
$progress = round(($display_week / 40) * 100, 1);

require_once __DIR__ . '/../php/tracker_milestone.php';

$due_display = htmlspecialchars(date('F j, Y', strtotime($due_date)), ENT_QUOTES);
$countdown_display = htmlspecialchars($countdown, ENT_QUOTES);
$week_display = htmlspecialchars($display_week, ENT_QUOTES);
$milestone_display = htmlspecialchars($milestone_text, ENT_QUOTES);

include __DIR__ . '/../html/tracker.php';