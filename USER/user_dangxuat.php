<?php
    session_start();
    include_once 'cauhinh.php';

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $sql_delete = "DELETE FROM tbl_giohang WHERE Mauser = ?";
        $stmt = $connect->prepare($sql_delete);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // Save the cart to the database
        if (isset($_SESSION['GIOHANG']) && is_array($_SESSION['GIOHANG'])) {
            foreach ($_SESSION['GIOHANG'] as $item) {
                $hinh = $item[0];
                $ten = $item[1];
                $soluong = $item[2];
                $dongia = $item[3];
                $giamgia = $item[4];
                $thanhtoan = $item[5];
                $mahang = uniqid();
                $mota = '';  
                $maloai = ''; 
                $manhacungcap = ''; 

                $sql = "INSERT INTO tbl_giohang (Mauser, MaHang, TenHang, Dongia, Hinhanh, MoTa, Magiamgia, Maloai, Manhacungcap) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $connect->prepare($sql);
                $stmt->bind_param("issdssiss", $user_id, $mahang, $ten, $dongia, $hinh, $mota, $giamgia, $maloai, $manhacungcap);
                $stmt->execute();
            }
        }
    }
    session_unset();
    session_destroy();
    header("Location: main.php");
    exit();
?>
