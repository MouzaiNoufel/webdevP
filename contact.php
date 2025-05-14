<?php
include 'db.php';

header("Content-Type: application/json");
$input = json_decode(file_get_contents("php://input"), true);

$name = $input['name'] ?? '';
$email = $input['email'] ?? '';
$message = $input['message'] ?? '';

if (!$name || !$email || !$message) {
    echo json_encode(["status" => "error", "message" => "All fields are required"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Message dyalek l7a9na! merci "]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to send message"]);
}
?>
