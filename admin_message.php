<?php
include 'db.php';

$result = $conn->query("SELECT * FROM contact_messages ORDER BY created_at DESC");

$messages = [];

while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode(["status" => "success", "messages" => $messages]);
?>
