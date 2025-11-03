<?php
if (!empty($display_week)) {
    $stmt = $conn->prepare('SELECT description FROM milestones WHERE week_number = ? LIMIT 1');
    $stmt->bind_param('i', $display_week);
    $stmt->execute();
    $stmt->bind_result($milestone_text);
    $stmt->fetch();
    $stmt->close();
}

$conn->close();
