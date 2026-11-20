<?php
// Simple JSON API used by the XMLHttpRequest and API demos.
header('Content-Type: application/json; charset=utf-8');
$action = $_GET['action'] ?? 'users';
if ($action === 'hello') {
    echo json_encode(['message' => 'Hello from the PHP server', 'time' => date('c')]);
} else {
    echo json_encode([
        ['id' => 1, 'name' => 'Edison Avila',      'email' => 'edison@example.com'],
        ['id' => 2, 'name' => 'Neil Francis Silla', 'email' => 'neil@example.com'],
        ['id' => 3, 'name' => 'Lucky Martizano',   'email' => 'lucky@example.com'],
        ['id' => 4, 'name' => 'Billy Naire Nobre', 'email' => 'billy@example.com'],
    ]);
}
