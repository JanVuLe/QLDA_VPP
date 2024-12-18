<?php
    session_start();
    include_once "cauhinh.php";

    $ten_hang = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kiểm tra xem trường tên hàng đã được gửi hay chưa
        if(isset($_POST['ten_hang']))
            $ten_hang = $_POST['ten_hang'];
        else
            // Trường tên hàng không được gửi đi
            echo "Lỗi: Trường tên hàng không được gửi đi.";
    }
    

    $sql = "SELECT h.MaHang, h.TenHang, h.Dongia, h.Soluong, h.Hinhanh, h.Mota, h.Magiamgia, ml.Maloai ,ml.Tenloai, cc.Tennhacc 
    FROM tbl_hang h 
    INNER JOIN tbl_Maloai ml ON h.Maloai = ml.Maloai 
    INNER JOIN tbl_Manhacungcap cc ON h.Manhacungcap = cc.Manhacc
    WHERE h.TenHang = '$ten_hang'";

    $danhsach = $connect->query($sql);
    
    if(!$danhsach)
        echo "Lỗi truy vấn !!!";
    else{
        if(!isset($_SESSION["GIOHANG"])) $_SESSION["GIOHANG"]=[];
        if(isset($_GET['delid'])&&($_GET['delid']>=0)){
            array_splice($_SESSION['GIOHANG'],$_GET['delid'],1);
        }
        if(isset($_GET['delgiohang'])&&($_GET['delgiohang']==1)) unset ($_SESSION['GIOHANG']);
        if(isset($_POST["btn_themgh"])){
            $hinh = $_POST['hinh_anh'];
            $ten = $_POST['ten_hang'];
            $soluong = $_POST['soluong'];
            $dongia = $_POST['dongia'];
            $Magiamgia = $_POST['magiamgia'];
            if($Magiamgia == 0)
            {
                $thanhtoan = $soluong * $dongia;
            }
            else{
                $thanhtoan = $soluong * ($dongia - ($Magiamgia * $dongia));
            }

            $fl = 0; //kiem tra sp trung  hay khong

            for($i = 0; $i < sizeof($_SESSION['GIOHANG']); $i++){
                if($_SESSION['GIOHANG'][$i][1] == $ten){
                    $fl = 1;
                    $soluongnew = $soluong + $_SESSION['GIOHANG'][$i][2];
                    $_SESSION['GIOHANG'][$i][2] = $soluongnew;
                    break;
                }
            }
            if($fl == 0) //thhem moi
            {
                $sp = [$hinh, $ten, $soluong, $dongia, ($Magiamgia*100), $thanhtoan];
                $_SESSION['GIOHANG'][] = $sp;
            }   

            
        }        
    }

    function showGiohang(){
        if(isset($_SESSION['GIOHANG'])&&(is_array($_SESSION['GIOHANG']))){
            $tongtien = 0;
            for($i = 0;$i < sizeof($_SESSION['GIOHANG']); $i++){
                $tongtien = $tongtien + $_SESSION['GIOHANG'][$i][5];
                echo"
                    <tr>
                        <td><img src=" .$_SESSION['GIOHANG'][$i][0]. "></td> 
                        <td> {$_SESSION['GIOHANG'][$i][1]} </td>
                        <td> {$_SESSION['GIOHANG'][$i][2]} </td>
                        <td> {$_SESSION['GIOHANG'][$i][3]} đ</td>
                        <td> {$_SESSION['GIOHANG'][$i][4]} %</td>
                        <td> {$_SESSION['GIOHANG'][$i][5]} đ</td>
                        <td><a href=\"giohang.php?delid=".$i."\">Xóa</><td>
                    </tr>
                ";
            }
            echo"
                <tr>
                    <td colspan=\"3\"></td>
                    <td></td>
                    <td> Tổng: $tongtien đ</td>
                    <td class=\"btn_thanhtoan\"><input type=\"sudmit\" value=\"Thanh toán\"></td>
                    <td><a href = \"giohang.php?delgiohang=1\">Xóa tất cả</a></td>
                </tr>
            ";
        }
    }


?>

<html>
<head>
    <title>GIỎ HÀNG</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="./img-logo-background/online-shopping.png">
    <link rel="stylesheet" href="css/xuly_giohang.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./themify-icons/themify-icons.css">
</head>
<body>
    <div class="menutrip">
        <ul class="menutrip-nav">
            <li><img src="./img-logo-background/logo_web.PNG"></li>
            <li><a href="main.php">Trang chủ</a></li> 
            <li><a href="spsale.php">Sale</a></li> 
            <li><a href="phanhoi.php">Phản hồi</a></li> 
            <li><a href="thongtin.php">Thông tin</a></li> 
            <li><a href="lienhe.php">Liên hệ</a></li>
        </ul>
        <?php include 'taikhoan-giohang.php' ?>
    </div>
    <div class="giohang" style="margin-bottom: 120px;">
        <div class="thongtin_giohang">
            <p class="title-giohang">THÔNG TIN GIỎ HÀNG CỦA BẠN</p>
        </div>
        <div class="thongtin-sanpham">
            <table>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng </th>
                    <th>Đơn giá</th>
                    <th>Giảm giá</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
                <?php
                if (isset($_SESSION['user_id'])) {
                    showGiohang();
                } else {
                    echo "<tr><td colspan='7'>Vui lòng đăng nhập để xem giỏ hàng.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <footer>
        <div class="head-footer">
            <img class="logo-lines-footer" src="./img-logo-background/logo_web.PNG" alt="">
            <p class="title_head-footer">CỬA HÀNG VĂN PHÒNG PHẨM LINES</p>
            <a href="#" style="position: absolute; right: 0; text-decoration: none; margin-right: 32px;">
                <i class="ti-angle-up" style="display: grid; justify-items: end; line-height: 80px; font-size: 24px;"></i>
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
                    <p><i class="ti-footer ti-headphone-alt"></i>0123456789</p>
                    <p><i class="ti-footer ti-email"></i>lines@gmail.com</p>
                </td>
                <td class="tbl-th-td">
                    <img src="./img-logo-background/ptthanhtoan.png" alt="" style="width: 90%;">
                </td>
            </tr>
        </table>
        <div class="end-footer"></div>
        <p style="text-align: center; font-size: 12px;">
            <span style="margin-bottom:5px;">Trang web được viết bởi Nguyễn Thành Đạt</span>
            <i class="ti-footer ti-html5"></i>
            <i class="ti-footer ti-css3"></i>
        </p>
    </footer>
</body>
</html>
