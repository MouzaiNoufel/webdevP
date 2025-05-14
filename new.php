<?php
include 'db.php'; // Ce fichier doit contenir la connexion $conn

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    if (!$name || !$email || !$message) {
        echo json_encode(['success' => false, 'message' => 'Tous les champs sont requis.']);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO messages2 (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Message enregistré avec succès.',
            'data' => compact('name', 'email', 'message')
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'enregistrement.']);
    }

    exit;
}

echo json_encode(['success' => false, 'message' => 'Requête invalide']);
?>
