<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$username = $_SESSION['username'] ?? 'Guest';
include __DIR__ . '/../html/references.php';