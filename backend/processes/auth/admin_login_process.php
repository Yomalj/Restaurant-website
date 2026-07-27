<?php
session_start();
header('Content-Type: application/json; charset=UTF-8');

require_once '../../config/database.php'; 

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Incorrect request method.", "errors" => (object)[], "redirect" => null]);
    exit();
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$csrf_token = $_POST['csrf_token'] ?? '';

if (empty($csrf_token) || !isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $csrf_token)) {
    http_response_code(403);
    echo json_encode(["success" => false, "message" => "Invalid or missing CSRF token. Please refresh the page.", "errors" => (object)[], "redirect" => null]);
    exit();
}

$errors = [];
if (empty($email)) {
    $errors['email'] = "Email address is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format.";
}

if (empty($password)) {
    $errors['password'] = "Password is required.";
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(["success" => false, "message" => "Please fix the errors below.", "errors" => $errors, "redirect" => null]);
    exit();
}

// Table eka 'users', password column eka 'password_hash', saha role eka 'admin'
$query = "SELECT id, password_hash as password FROM users WHERE email = $1 AND role = 'admin'";
// Methana $conn wenuwata $db_connection kiyala wenas kala
$result = pg_query_params($db_connection, $query, array($email));

if ($result && pg_num_rows($result) > 0) {
    $row = pg_fetch_assoc($result);
    
    if (password_verify($password, $row['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $row['id'];

        http_response_code(200);
        echo json_encode([
            "success" => true,
            "message" => "Login successful.",
            "errors" => (object)[],
            "redirect" => "/restaurant-website/admin/dashboard.php"
        ]);
        exit();
    }
}

http_response_code(401);
echo json_encode([
    "success" => false, 
    "message" => "Invalid email or password.", 
    "errors" => (object)[], 
    "redirect" => null
]);
exit();
?>