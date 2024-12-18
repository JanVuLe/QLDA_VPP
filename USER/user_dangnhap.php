<?php
session_start();
include_once "cauhinh.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['userpassword']);

    function btn_submit_click($username, $password, $connect)
    {
        if (empty($username)) {
            ThongBao("Tên đăng nhập không được bỏ trống!");
            return;
        } elseif (empty($password)) {
            ThongBao("Mật khẩu không được bỏ trống!");
            return;
        }

        $sql_kiemtra = "SELECT * FROM tbl_taikhoanuser WHERE (Tendangnhap = ? OR Email = ? OR SDT = ?) AND Matkhau = ?";
        $stmt = $connect->prepare($sql_kiemtra);
        $stmt->bind_param("ssis", $username, $username, $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // if ($result->num_rows > 0) {
        //     $row = $result->fetch_assoc();
        //     $_SESSION['loggedin'] = true;
        //     $_SESSION['user_id'] = $row['Mauser'];
        //     $_SESSION['username'] = $row['Tendangnhap'];

        //     // Restore cart from the database
        //     $user_id = $row['Mauser'];
        //     $sql = "SELECT * FROM tbl_giohang WHERE Mauser = ?";
        //     $stmt = $connect->prepare($sql);
        //     $stmt->bind_param("i", $user_id);
        //     $stmt->execute();
        //     $result = $stmt->get_result();
        //     $_SESSION['GIOHANG'] = [];
        //     if ($result->num_rows > 0) {
        //         while ($cart_item = $result->fetch_assoc()) {
        //             $_SESSION['GIOHANG'][] = [
        //                 $cart_item['Hinhanh'],
        //                 $cart_item['TenHang'],
        //                 $cart_item['Soluong'],
        //                 $cart_item['Dongia'],
        //                 $cart_item['Magiamgia'],
        //                 $cart_item['Dongia'] * (1 - $cart_item['Magiamgia'] / 100)
        //             ];
        //         }
        //     }

        //     // Clear the cart data from the database after restoring
        //     $sql_delete = "DELETE FROM tbl_giohang WHERE Mauser = ?";
        //     $stmt = $connect->prepare($sql_delete);
        //     $stmt->bind_param("i", $user_id);
        //     $stmt->execute();

        //     // Redirect to the main page
        //     header("Location: main.php");
        //     exit();
        // }

        $stmt->close();
    }

    if (isset($_POST['btn-submit'])) {
        btn_submit_click($username, $password, $connect);
    }
}
?>

<html lang="en">

<head>
    <title>Đăng nhập</title>
    <link rel="shortcut icon" type="image/x-icon" href="./img-logo-background/online-shopping.png">
    <link rel="stylesheet" href="css/user_dangnhap_dangky.css">
</head>

<body>
    <div class="dangnhap">
        <form action="" method="POST">
            <table>
                <tr>
                    <td class="title-dangnhap" style="font-size: 24px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:blueviolet; font-weight: 600;">Đăng nhập</td>
                    <td class="title-dangnhap" style="text-align: end;"><img src="img-logo-background/logo_web.PNG" style="width: 120px;"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="form-dangnhap" required placeholder="Email/Số điện thoại/Tên đăng nhập" type="text" name="username">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="form-dangnhap" required placeholder="Mật khẩu" type="password" name="userpassword">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="btn-dangnhap" type="submit" name="btn-submit" value="Đăng nhập">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                        <p class="dangky">Bạn chưa có tài khoản?<a href="user_dangky.php" style="text-decoration: none; color: rgb(255, 2, 112)"> Đăng ký</a></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>