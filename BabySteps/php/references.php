<?php
require_once __DIR__ . '/check_session.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$username = $_SESSION['username'] ?? 'Guest';
include __DIR__ . '/../html/references.php';