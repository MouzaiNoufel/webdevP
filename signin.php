<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'] ?? '';
$password = $data['password'] ?? '';


if (empty($email) || empty($password)) {
    echo json_encode(["status" => "error", "message" => "Email and password are required"]);
    exit;
}


$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["status" => "error", "message" => "No user found with this email"]);
    exit;
}

$user = $result->fetch_assoc();


if (!password_verify($password, $user['password'])) {
    echo json_encode(["status" => "error", "message" => "Incorrect password"]);
    exit;
}


session_start();
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

echo json_encode(["status" => "success", "message" => "Merhba Bik , welcome!"]);
?>
