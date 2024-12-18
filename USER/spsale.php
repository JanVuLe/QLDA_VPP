<?php
    session_start();   
    include_once "cauhinh.php";
?>
<html>
    <head>
        <title>Sản phẩm giảm giá</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="./img-logo-background/online-shopping.png">
        <link rel="stylesheet" href="css/xuly_spgiamgia.css">
        <link rel="stylesheet" href="./themify-icons/themify-icons.css">
    </head>
    <body>

        <div class="menutrip">
            <ul class="menutrip-nav">
                <li><img src="./img-logo-background/logo_web.PNG"></li>
                <li><a href="main.php">Trang chủ</a></li> 
                <li><a href="#">Sale</a></li> 
                <li><a href="phanhoi.php">Phản hồi</a></li> 
                <li><a href="thongtin.php">Thông tin</a></li> 
                <li><a href="lienhe.php">Liên hệ</a></li>
            </ul>
            <?php include 'taikhoan-giohang.php' ?>
        </div>

        <div class="head_main"> <!--head_title_logo_menu-->
            <div class="search">
                <form action="main.php?do=search_xuly" method="post" style="margin:0; padding: 0;">
                    <input type="text" name="search_sp" placeholder="Tìm tên sản phẩm">
                    <button name="ok_timkiem" type="submit"><i class="ti-search" style="width: 100%;"></i></button>
				</form> 
            </div>
        </div>
        <!-- End head -->

        <!-- Body main -->
        <div class="body_main">
            <!-- <?php if (isset($_REQUEST['ok_timkiem'])){include'search_xuly.php';}?> -->
            <div class="sanpham">
                <p class="title">Các sản phẩm được giảm giá</p>
                
                <div class="data">
                    <tr>
                        <td style="width: 250px">
                            <?php

                                    $sql = "SELECT h.MaHang, h.TenHang, h.Dongia, h.Soluong, h.Hinhanh, h.Mota, h.Magiamgia, ml.Maloai ,ml.Tenloai, cc.Tennhacc 
                                    FROM tbl_hang h 
                                    INNER JOIN tbl_Maloai ml ON h.Maloai = ml.Maloai 
                                    INNER JOIN tbl_Manhacungcap cc ON h.Manhacungcap = cc.Manhacc
                                    WHERE h.Magiamgia != 0";


                                            
                                    $danhsach = $connect->query($sql);
                                    //Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
                                    if (!$danhsach) {
                                        die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
                                        exit();
                                    }


                                    while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) 		
                                    {				
                                        $giaban = $row['Dongia'] - (($row['Magiamgia']) * $row['Dongia']);
                                        echo"<form action=\"giohang.php\" method=\"POST\">";
                                            echo "<div class='khungsp'>";
                                                echo "<div class='card'>";					
                                                        echo "<a class=\"xemchitiet\" href=\"chitiet_sp.php?id=" . $row['MaHang'] . "\"><img class='hinhanhphim' src=" . $row["Hinhanh"] . "  style='width: 225px; height: 225px;'></a>";
                                                        echo "<span class='tenphim' ></span> <br />";
                                                        echo "<span class=\"\">". $row["TenHang"] ."</span><br/>" ;
                                                    
                                                    $Magiamgia = $row['Magiamgia'];
                                                    if($Magiamgia != 0) { 
                                                        echo "<span class=\"gia\" style=\"text-decoration: line-through;\">". number_format($row['Dongia'])." đ</span>";
                                                    }
                                                    echo "</br><span class=\"price\">". number_format($giaban)." đ</span>";
                                                    echo "<br/><br/><input class=\"soluong\" type=\"number\" value=1 name=\"soluong\">";
                                                    echo "<input type=\"hidden\" name=\"hinh_anh\" value=\"" .$row['Hinhanh']. "\">";
                                                    echo "<input type=\"hidden\" name=\"ten_hang\" value=\"" . $row["TenHang"] . "\">";
                                                    echo "<input type=\"hidden\" name=\"dongia\" value=\"" . $row["Dongia"] . "\">";
                                                    echo "<input type=\"hidden\" name=\"magiamgia\" value=\"" . $row["Magiamgia"] . "\">";
                                                    echo "<input class=\"themgiohang\" type=\"submit\" value=\"Thêm vào giỏ hàng\" name=\"btn_themgh\">";   
                                                echo "</div>";         
                                            echo "</div>";
                                        echo"</form>";
                                    }
                            ?>
                        </td>
                    </tr>
                </div>

            </div>
            
        </div>                            
        <footer>
            <div class="head-footer">
                <img class="logo-lines-footer" src="./img-logo-background/logo_web.PNG" alt="">
                <p class="title_head-footer">CỬA HÀNG VĂN PHÒNG PHẨM LINES</p>
                <a href="#" style="position: absolute; right: 0; text-decoration: none; margin-right: 32px;">
                    <i class="ti-angle-up" style="
                        display: grid; 
                        justify-items: end;  
                        line-height: 80px;
                        font-size: 24px;
                        "> </i>
                </a>
                
            </div>
            <hr>
            <table>
                <tr>
                    <th class="tbl-th-td">Liên kết</th>
                    <th class="tbl-th-td">Nhà cung cấp</th>
                    <th class="tbl-th-td" colspan="2">Địa chỉ</th>
                    <th class="tbl-th-td">Hotline</th>
                    <th class="tbl-th-td">Phương thức thanh toán</th>
                </tr>
                <tr>
                    <td class="tbl-th-td">
                        <i class="ti-footer ti-lienket ti-youtube"></i>
                        <i class="ti-footer ti-lienket ti-facebook"></i>
                        <i class="ti-footer ti-lienket ti-instagram"></i>
                        <i class="ti-footer ti-lienket ti-twitter"></i>
                    </td>
                    <td class="tbl-th-td">
                        <p>Thiên Long</p>
                        <p>Hồng Hà</p>
                        <p>Epaper</p>
                    </td>
                    <td class="tbl-th-td" colspan="2">
                            <p>Đông Xuyên, An Giang</p>
                            <p>Đại học An Giang</p>
                            <p>Công nghệ thông tin</p>
                            <img src="img-logo-background/dhag.png" alt="" style="width: 15%;">
                    </td>
                    <td class="tbl-th-td">
                        <p><i class="ti-footer ti-headphone-alt"></i>0123456789</i></p>
                        <p><i class="ti-footer ti-email"></i>lines@gmail.com</i></p>
                    </td>
                    <td class="tbl-th-td">
                        <img src="./img-logo-background/ptthanhtoan.png" alt="" style="width: 90%;">
                    </td>
                </tr>
            </table>
            <div class="end-footer">
            </div>
            <p style="text-align: center; font-size: 12px;">
                <span style="margin-bottom:5px";>Trang web được viết bởi Nguyễn Thành Đạt</span>
                <i class="ti-footer ti-html5"></i>
                <i class="ti-footer ti-css3"></i>
            </p>
        </footer>
    </body>
</html>