<?php
session_start();    
include_once "cauhinh.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>LINES STORE</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="./img-logo-background/online-shopping.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">
    <script src="javascript/main.js"></script>
    <link rel="stylesheet" href="./themify-icons/themify-icons.css">

    <style>
        h1{
            margin: 50px 0px;
            text-align: center;
            color: blueviolet;
        }
        .chitiet-sp{
            margin:0 auto 50px;

        }
        .chitiet-sp table{
            margin:auto;
        }
        .chitiet-sp table td{
            padding-left: 40px;
            line-height: 45px;
        }
        .chitiet-sp table td img{
            border-radius: 8px;
        }
    </style>
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
        <?php include 'taikhoan-giohang.php'; ?> 
    </div>

    <div class="container">
        <h1>Thông tin chi tiết sản phẩm</h1>
        <?php
            if (isset($_GET['id'])) {
                
                $product_id = htmlspecialchars($_GET['id']); 
                
                
                    $sql = "SELECT h.*, ncc.Tennhacc 
                            FROM tbl_hang h 
                            JOIN tbl_Manhacungcap ncc 
                            ON h.Manhacungcap = ncc.Manhacc 
                            WHERE h.MaHang = '$product_id'";
                                        
                    $result = $connect->query($sql); 
                    
                    if ($result) {
                        if ($result->num_rows > 0) {
                            $product = $result->fetch_assoc(); 
                            echo "<div class=\"chitiet-sp\">";
                            echo "<table>";
                                echo "<tr>";
                                    echo "<td><img src='" . htmlspecialchars($product['Hinhanh']) . "' alt='Product Image' style='width: 350px; height: 350px;'></td>"; //td

                                    echo "<td><h2>" . htmlspecialchars($product['TenHang']) . "</h2>"; //td
                                    echo "<p>Đơn giá: " . number_format($product['Dongia']) . " đ</p>";
                                    echo "<p>Mô tả: " . htmlspecialchars($product['MoTa']) . "</p>";
                                    echo "<p>Nhà cung cấp: " . htmlspecialchars($product['Tennhacc']) ."</p></td>";
                                echo "</tr>";
                            echo "</table>";
                            echo "</div>";
                        } else {
                            echo "Không tìm thấy sản phẩm.";
                        }
                    } else {
                        echo "Query execution failed: " . $connect->error;
                    }
                } else {
                    echo "Invalid product ID.";
                }
        ?>
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
                    <p><i class="ti-footer ti-headphone-alt"></i>0123456789</p>
                    <p><i class="ti-footer ti-email"></i>lines@gmail.com</p>
                </td>
                <td class="tbl-th-td">
                    <img src="./img-logo-background/ptthanhtoan.png" alt="" style="width: 90%;">
                </td>
            </tr>
        </table>
        <div class="end-footer">
        </div>
        <p style="text-align: center; font-size: 12px;">
            <span style="margin-bottom:5px;">Trang web được viết bởi Nguyễn Thành Đạt</span>
            <i class="ti-footer ti-html5"></i>
            <i class="ti-footer ti-css3"></i>
        </p>
    </footer>
</body>
</html>
