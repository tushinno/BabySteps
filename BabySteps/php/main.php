<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'] ?? '';
$role = $_SESSION['role'] ?? '';

include __DIR__ . '/../html/main.php';