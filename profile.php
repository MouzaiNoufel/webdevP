<?php
session_start();
header("Content-Type: application/json");

if (!isset($_SESSION['user'])) {
    echo json_encode(["status" => "error", "message" => "Not logged in"]);
    exit;
}

$user = $_SESSION['user'];

echo json_encode([
    "status" => "success",
    "name" => $user['name'],
    "email" => $user['email'],
    "created_at" => $user['created_at'] ?? "Non spécifiée"
]);
?>
