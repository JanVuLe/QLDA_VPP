<?php
include_once "cauhinh.php";

// Kiểm tra kết nối
if ($connect->connect_error) {
    die("Kết nối thất bại: " . $connect->connect_error);
}

// Kiểm tra và thực hiện lệnh SQL
$sql = "SELECT * FROM tbl_taikhoanuser";
$danhsach = $connect->query($sql);

if (!$danhsach) {
    die("Không thể thực hiện câu lệnh SQL: " . $connect->error);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten_dk = $_POST['hoten_dk'];
    $email_dk = $_POST['email_dk'];
    $sdt = $_POST['phone_dk'];
    $pass = $_POST['password_dk'];
    $nhaplai_pass = $_POST['nhaplai-password_dk'];
    
    function btn_submit_click($pass, $nhaplai_pass, $sdt, $ten_dk, $email_dk, $connect) {
        if ($pass != $nhaplai_pass) {
            echo "<script>alert('Mật khẩu không trùng khớp. Vui lòng nhập lại.');</script>";
            return;
        }

        // Kiểm tra trùng lặp email hoặc tên đăng nhập
        $check_user = $connect->prepare("SELECT * FROM tbl_taikhoanuser WHERE Email = ? OR Tendangnhap = ?");
        $check_user->bind_param("ss", $email_dk, $ten_dk);
        $check_user->execute();
        $result = $check_user->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Tên đăng nhập hoặc Email đã tồn tại.');</script>";
            return;
        }

        // Thực hiện chèn tài khoản mới (lưu mật khẩu không mã hóa)
        $insert_tkUser = $connect->prepare("INSERT INTO tbl_taikhoanuser (Tendangnhap, Email, SDT, Matkhau) VALUES (?, ?, ?, ?)");
        $insert_tkUser->bind_param("ssss", $ten_dk, $email_dk, $sdt, $pass);

        if ($insert_tkUser->execute()) {
            echo "<script>alert('Đăng ký thành công');</script>";
            header("Location: user_dangnhap.php");
            exit();
        } else {
            echo "<script>alert('Đăng ký thất bại. Vui lòng thử lại.');</script>";
        }
    }
    
    if (isset($_POST['btn-submit'])) {
        btn_submit_click($pass, $nhaplai_pass, $sdt, $ten_dk, $email_dk, $connect);
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link rel="shortcut icon" type="image/x-icon" href="./img-logo-background/online-shopping.png">
    <link rel="stylesheet" href="css/user_dangnhap_dangky.css">
    <script src="javascript/user_dn_dk.js"></script>
</head>
<body>
    <div class="dangnhap">
        <form action="" method="POST">
            <table>
                <tr>
                    <td class="title-dangnhap" style="font-size: 24px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:blueviolet; font-weight: 600;">Đăng ký</td>
                    <td class="title-dangnhap" style="text-align: end;"><img src="img-logo-background/logo_web.PNG" style="width: 120px;"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="form-dangnhap" required placeholder="Họ và tên" type="text" name="hoten_dk">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="form-dangnhap" required placeholder="Email" type="email" name="email_dk">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="form-dangnhap" required placeholder="Số điện thoại" type="number" name="phone_dk">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="form-dangnhap" required placeholder="Mật khẩu" type="password" name="password_dk">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="form-dangnhap" required placeholder="Nhập lại mật khẩu" type="password" name="nhaplai-password_dk">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="btn-dangnhap" type="submit" name="btn-submit" value="Đăng ký">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                        <p class="dangky">Bạn đã có tài khoản?<a href="user_dangnhap.php" style="text-decoration: none; color: rgb(255, 2, 112)"> Đăng nhập </a></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
