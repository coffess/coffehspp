<?php
require 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $email = mysqli_real_escape_string($conn, $email);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header('Location: account.html');
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
