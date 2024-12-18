<?php
    session_start();    
    include_once "cauhinh.php";
?>
<html>
    <head>
        <title>Liên hệ tư vấn</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" type="image/x-icon" href="./img-logo-background/online-shopping.png">
        <link rel="stylesheet" href="css/style.css">
        <!-- <link rel="stylesheet" href="javascrpit/javascript.js"> -->
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
                <li><a href="#">Liên hệ</a></li>
            </ul>

            <?php include 'taikhoan-giohang.php' ?>
        </div>
        <!-- End head -->

        <!-- Body main -->
        <div class="lienhe">
            <p class="title-tuvan">Liên hệ tư vấn</p>
            <div class="tuvan">
                <a href="thongtin.php" style="text-decoration:none;">
                    <div class="khung-tuvan">
                        
                            <p>Thông tin liên hệ</p>
                            <br/>
                            <i class="ti-tuvan ti-user"></i><br/><br/>
                            <p>Chúng tôi luôn sẵn sàng tư vấn cho bạn.</p>
                    </div>
                </a>

                <a href="" style="text-decoration:none;">
                    <div class="khung-tuvan" >
                        <p>Hộ trợ trực tuyến</p>
                        <br/>
                        <i class="ti-tuvan ti-headphone-alt"></i><br/><br/>
                        <p>Chúng tôi luôn sẵn sàng tư vấn cho bạn.</p>
                    </div>
                </a>
                
                <a href="phanhoi.php" style="text-decoration:none;">
                    <div class="khung-tuvan" >
                        <p>Phản hồi sản phẩm</p>
                        <br/>
                        <i class="ti-tuvan ti-email"></i><br/><br/>
                        <p>Chúng tôi luôn sẵn sàng tư vấn cho bạn.</p>
                    </div>
                </a>
            </div>
            <div class="nav-brand">
                <p class="title-nav">Truy cập trang web của chúng tôi</p> <hr>
                    <div class="ti-nav">
                        <a target="_blank" href="http://youtube.com" style="text-decoration: none;"><i class="ti-brand ti-youtube"></i>
                        <a target="_blank" href="http://facebook.com" style="text-decoration: none;"><i class="ti-brand ti-facebook"></i></a>
                        <a target="_blank" href="http://instagram.com" style="text-decoration: none;"><i class="ti-brand ti-instagram"></i></a>
                        <a target="_blank" href="http://twitter.com" style="text-decoration: none;"><i class="ti-brand ti-twitter"></i></a></a>        
                    </div>
                </div>
        </div>
        <!-- End body main -->

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