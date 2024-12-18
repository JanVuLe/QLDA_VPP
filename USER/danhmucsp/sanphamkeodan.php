<?php

    $sql = "SELECT h.MaHang, h.TenHang, h.Dongia, h.Soluong, h.Hinhanh, h.Mota, h.Magiamgia, ml.Maloai ,ml.Tenloai, cc.Tennhacc 
    FROM tbl_hang h 
    INNER JOIN tbl_Maloai ml ON h.Maloai = ml.Maloai 
    INNER JOIN tbl_Manhacungcap cc ON h.Manhacungcap = cc.Manhacc
    WHERE ml.Maloai = 'ml6'";


            
    $danhsach = $connect->query($sql);
    //Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
    if (!$danhsach) {
        die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
        exit();
    }


    include"khungsanpham.php";
?>
