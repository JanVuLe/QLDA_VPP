<?php
session_start();
include_once "cauhinh.php"; // Ensure this file contains database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name-kh'];
    $email = $_POST['email-kh'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $message = $_POST['mess'];

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert feedback into database
    $sql = "INSERT INTO tbl_phanhoi (name, email, phone, address, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $address, $message);

    if ($stmt->execute()) {
        $success = "Cảm ơn phản hồi cuar bạn!";
    } else {
        $error = "Lỗi phản hồi.Thử lại";
    }

    $stmt->close();
    $conn->close();
}
?>
