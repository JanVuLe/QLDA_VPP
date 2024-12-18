<?php
include_once "cauhinh.php";

$MaHang = $_GET['MaHang'];

$stmt = $connect->prepare("SELECT * FROM tbl_hang WHERE MaHang = ?");
$stmt->bind_param("s", $MaHang);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
$stmt->close();

echo json_encode($product);
?>
