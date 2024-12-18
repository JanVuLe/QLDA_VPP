<?php
    session_start();    
    include_once "cauhinh.php";
?>
<html>
    <head>
        <title>Thông tin Lines Store</title>
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
                <li><a href="#">Thông tin</a></li> 
                <li><a href="lienhe.php">Liên hệ</a></li>
            </ul>

            <?php include 'taikhoan-giohang.php' ?>
        </div>

        <!-- End head -->

        <!-- Body main -->
        <div class="thongtin">
            <p class="content-thongtin">Văn phòng phẩm Lines Store được thành lập ngày 25/04/2024.</p>
            <p class="content-thongtin">Từ những nhà cung cấp chất lượng Lines Store có những sản phẩm mang lại cho khách hàng sự tin tưởng và uy tín.</p>
            <p class="content-thongtin">Khách hàng có thể đến địa chỉ Ung Văn Khiêm, Đông Xuyên, An Giang để có thể tiếp cận và nhận ưu đãi nhiều hơn với những sản phẩm chất lượng.</p>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.6272952968347!2d105.4297639757395!3d10.371655789753575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a731e7546fd7b%3A0x953539cd7673d9e5!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBBbiBHaWFuZyAtIMSQSFFHIFRQSENN!5e0!3m2!1svi!2s!4v1714213038229!5m2!1svi!2s" 
                width="100%" height="450" style="border:0; align-items:center" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
            <p class="content-thongtin">Lines Store là điểm đến hàng đầu cho tất cả những gì bạn cần để trang trí và tổ chức không gian làm việc của mình. 
                Với một loạt các sản phẩm văn phòng phẩm chất lượng cao từ các thương hiệu lớn, chúng tôi cam kết mang 
                lại cho bạn sự lựa chọn đa dạng và chất lượng tốt nhất. Từ bút, giấy, sổ tay cho đến các phụ kiện trang trí, chúng tôi 
                không chỉ cung cấp sản phẩm mà còn là nguồn cảm hứng cho không gian làm việc sáng tạo của bạn. Hãy đến và khám phá thế 
                giới của chúng tôi tại Lines Store ngay hôm nay! </p>
        </div>

        <div class="picTitle">
            <div id="bigPicWrapper">
                <div id="bigPic">
                    <img class="img-bigPic" src="img-logo-background/vp1.jpg" alt="" style="height:200px;">
                    <img class="img-bigPic" src="img-logo-background/vp2.jpg" alt="" style="height:200px;">
                    <img class="img-bigPic" src="img-logo-background/vp3.jpg" alt="" style="height:200px;">
                    <img class="img-bigPic" src="img-logo-background/vp4.jpg" alt="" style="height:200px;">
                    <img class="img-bigPic" src="img-logo-background/vp5.jpg" alt="" style="height:200px;">
                    <img class="img-bigPic" src="img-logo-background/vp6.jpg" alt="" style="height:200px;">
                </div>
            </div>            
        

            <!-- Import jQuery and Slick libraries -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#bigPic').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 1000,
                        fade: true
                    });
                });
            </script>

        </div>
        <!--End Body main -->

        
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