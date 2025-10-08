<?php
require_once __DIR__ . '/check_session.php';

if (isset($_SESSION['user_id'])) {
    header("Location: ../php/main.php");
    exit;
}

include __DIR__ . '/../html/landing.php';
?>