<style>
    .user-info{
        text-decoration: none;
        color: white;   
        justify-items: center;

    }

    .user-info span{
        text-transform: uppercase;
    }

    .a-dangxuat{
        text-decoration: none;
        color: red;
        line-height: 50px;
        justify-content: center
    }
</style>
<body>

    <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            echo '<div class="user-info">';
            echo '<span>Welcome, ' . $_SESSION['username'] . '</span>';
            echo '<a class="a-dangxuat" href="user_dangxuat.php">&nbsp;&nbsp;&nbsp;&nbsp;Đăng xuất</a>';
            echo '</div>';
        } else {
            echo '<i class="ti-icon ti-user js-btn-user" onclick="showDangNhap()"></i>';
        }
    ?>
    <i class="ti-icon ti-bag js-btn-giohang" onclick="showGioHang()"></i>

    <script>
        function showDangNhap(){
            window.location.href = 'user_dangnhap.php';
        }

        function showGioHang(){
            window.location.href = 'giohang.php';
        }
    </script>

</body>

    
   
    
