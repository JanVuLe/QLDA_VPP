<?php
session_start();

include_once "cauhinh.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['tenad'] ?? null;
    $password = $_POST['matkhau'] ?? null;

    if (!empty($username) && !empty($password)) {
        // Mã hóa mật khẩu
        $password = md5($password);

        $stmt = $connect->prepare("SELECT MaNguoiDung, TenDangNhap, MatKhau FROM tbl_nguoidung WHERE TenDangNhap=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($MaNguoiDung, $TenDangNhap, $hashed_password);
            $stmt->fetch();

            if ($password == $hashed_password){
                $_SESSION['user'] = $MaNguoiDung;
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Tên đăng nhập hoặc mật khẩu sai.";
            }
            
        } else {
            $error_message = "Tên đăng nhập hoặc mật khẩu sai.";
        }

        $stmt->close();
    } else {
        $error_message = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login-Lines</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css" />
</head>
<body>
    <div class="header">
        <div class="header-title">
            <img src="../USER/img-logo-background/logo_web.PNG" alt="">
            <p>Admin-Lines</p>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <table>
                <tr>
                    <td>
                        <h2>Đăng nhập</h2>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="tenad" placeholder="Tên đăng nhập" required></td>
                </tr>
                <tr>
                    <td><input type="password" name="matkhau" placeholder="Mật khẩu" required></td>
                </tr>
                <tr>
                    <td><input type="submit" name="login" value="Đăng nhập"></td>
                </tr>
            </table>
            <?php
            if (isset($error_message)) {
                echo "<p style='color:red;'>$error_message</p>";
            }
            ?>
        </form>
    </div>
    <div class="body">
    </div>
</body>
</html>
