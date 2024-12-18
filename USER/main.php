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
</head>
<body>

    <div class="menutrip">
        <ul class="menutrip-nav">
            <li><img src="./img-logo-background/logo_web.PNG"></li>
            <li><a href="main.php">Trang chủ</a></li>
            <li>
                <a href="">
                    Danh mục sản phẩm
                    <i class="ti-angle-down"></i>
                </a>
                <ul class="subnav">
                    <li><a href="#but">Bút</a></li>
                    <li><a href="#thuoc">Thước</a></li>
                    <li><a href="#giayin">Giấy in văn phòng</a></li>
                    <li><a href="#ghim">Ghim bấm</a></li>
                    <li><a href="#sotay">Sổ</a></li>
                    <li><a href="#keodan">Băng dính - Keo dán</a></li>
                </ul>
            </li>
            <li><a href="spsale.php">Sale</a></li>
            <li><a href="phanhoi.php">Phản hồi</a></li>
            <li><a href="thongtin.php">Thông tin</a></li>
            <li><a href="lienhe.php">Liên hệ</a></li>
        </ul>
        <?php include 'taikhoan-giohang.php'; ?> 
    </div>

    <div class="head_main">
        <div class="search">
            <form action="main.php?do=search_xuly" method="post" style="margin:0; padding: 0;">
                <input type="text" name="search_sp" placeholder="Tìm tên sản phẩm">
                <button name="ok_timkiem" type="submit"><i class="ti-search" style="width: 100%;"></i></button>
            </form>
        </div>
    </div>
    <!-- End head -->

    <!-- slide-show -->
    <div class="banner">
        <div class="baner-slideshow">
            <div id="list-img">
                <img src="./img-logo-background/vpp3.jpeg" class="img-title">
                <img src="./img-logo-background/vpp2.png" class="img-title">
                <img src="./img-logo-background/vpp1.png" class="img-title">
            </div>
        </div>
        <div class="banner-img">
            <img src="./img-logo-background/vppaio.png" alt="" style="width:49%;">
            <img src="./img-logo-background/vppaio2.png" alt=""style="width:49%;">
        </div>
    </div>
    <!-- end slide show -->

    <!-- Body main -->
    
    <div class="body_main_sp">
        
        <?php if (isset($_REQUEST['ok_timkiem'])) { include 'search_xuly.php'; } ?>
        <div class="sp_timkiem loai_sp" id="but">
            <p class="title_sp">Các sản phẩm bút</p>

            <div class="data_items">
                <tr>
                    <td style="width: 250px">
                        <?php include 'danhmucsp/sanphambut.php'; ?>
                    </td>
                </tr>
            </div>
        </div>
        <div class="sp_timkiem loai_sp spthuhai" id="thuoc">
            <p class="title_sp">Thước kẻ</p>

            <div class="data_items">
                <tr>
                    <td style="width: 250px">
                        <?php include 'danhmucsp/sanphamthuoc.php'; ?>
                    </td>
                </tr>
            </div>
        </div>
        <div class="sp_timkiem loai_sp spthuhai" id="giayin">
            <p class="title_sp">Giấy in văn phòng</p>

            <div class="data_items">
                <tr>
                    <td style="width: 250px">
                        <?php include 'danhmucsp/sanphamgiayin.php'; ?>
                    </td>
                </tr>
            </div>
        </div>
        <div class="sp_timkiem loai_sp spthuhai" id="ghim">
            <p class="title_sp">Ghim bấm</p>

            <div class="data_items">
                <tr>
                    <td style="width: 250px">
                        <?php include 'danhmucsp/sanphamghimbam.php'; ?>
                    </td>
                </tr>
            </div>
        </div>
        <div class="sp_timkiem loai_sp spthuhai" id="sotay">
            <p class="title_sp">Sổ tay màu sắc</p>

            <div class="data_items">
                <tr>
                    <td style="width: 250px">
                        <?php include 'danhmucsp/sanphamsotay.php'; ?>
                    </td>
                </tr>
            </div>
        </div>
        <div class="sp_timkiem loai_sp spthuhai" id="keodan">
            <p class="title_sp">Băng dính - Keo dán</p>

            <div class="data_items">
                <tr>
                    <td style="width: 250px">
                        <?php include 'danhmucsp/sanphamkeodan.php'; ?>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#list-img').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            fade: true
        });
    });
</script>                    
