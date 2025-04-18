<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $conn->query("INSERT INTO contact_messages (name, email, message, date_created) VALUES ('$name', '$email', '$message', NOW())");

    header("Location: info.php?success=1");
    exit();
}
?>
