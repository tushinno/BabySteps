<?php
require_once __DIR__ . '/check_session.php';
require_once __DIR__ . '/db_connection.php';

if (!empty($display_week)) {
    $stmt = $conn->prepare("SELECT description FROM milestones WHERE week_number = ? LIMIT 1");
    $stmt->bind_param('i', $display_week);
    $stmt->execute();
    $stmt->bind_result($db_desc);
    if ($stmt->fetch()) $milestone_text = $db_desc;
    $stmt->close();
}

$conn->close();
?>