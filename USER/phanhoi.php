<?php
session_start();
include_once "cauhinh.php"; // Ensure this file contains database connection details

$success = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name-kh'];
    $email = $_POST['email-kh'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $message = $_POST['mess'];

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert feedback into database
    $sql = "INSERT INTO tbl_phanhoi (name, email, phone, address, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $address, $message);

    if ($stmt->execute()) {
        $success = "Cảm ơn phản hồi của bạn!";
    } else {
        $error = "Lỗi phản hồi. Thử lại.";
    }

    $stmt->close();
    $conn->close();
}

// Retrieve the latest 5 feedback entries
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name, email, phone, address, message, created_at FROM tbl_phanhoi ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);

$feedbacks = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $feedbacks[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phản hồi cửa hàng</title>
    <link rel="shortcut icon" type="image/x-icon" href="./img-logo-background/online-shopping.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./themify-icons/themify-icons.css">
</head>
<body>

<div class="menutrip">
    <ul class="menutrip-nav">
        <li><img src="./img-logo-background/logo_web.PNG"></li>
        <li><a href="main.php">Trang chủ</a></li>
        <li><a href="spsale.php">Sale</a></li>
        <li><a href="#">Phản hồi</a></li>
        <li><a href="thongtin.php">Thông tin</a></li>
        <li><a href="lienhe.php">Liên hệ</a></li>
    </ul>
    <?php include 'taikhoan-giohang.php'; ?>
</div>
<!-- End head -->

<!-- Body main -->
<div class="phanhoi">
    <div class="title-phanhoi">Hãy đóng góp ý kiến của bạn</div>
    <div class="form-phanhoi">
        <?php if ($success): ?>
            <p class="success"><?php echo $success; ?></p>
        <?php elseif ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="feedback.php" method="POST">
            <table class="tbl-phanhoi">
                <tr>
                    <td><input class="input-form" placeholder="Name" type="text" name="name-kh" required></td>
                    <td><input class="input-form" placeholder="Email" type="email" name="email-kh" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="input-form" placeholder="Phone" type="text" name="phone" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input class="input-form" placeholder="Address" type="text" name="address" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea class="input-form" placeholder="Message" name="mess" id="" cols="" rows="10" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input class="btn-form" type="submit" name="send" value="Gửi">
                        <input class="btn-form" type="reset" name="reset" value="Hủy">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="latest-feedbacks">
        <h2>Phản Hồi Gần Nhất</h2>
        <?php if (count($feedbacks) > 0): ?>
            <?php foreach ($feedbacks as $feedback): ?>
                <table>
                    <tr>
                        <td>
                            <p><strong><?php echo htmlspecialchars($feedback['name']); ?></strong></p>
                            <em><?php echo $feedback['created_at']; ?></em>
                        </td>
                        <td>
                            <p><?php echo nl2br(htmlspecialchars($feedback['message'])); ?></p>
                        </td>
                    </tr>
                </table>
                
            <?php endforeach; ?>
        <?php else: ?>
            <p>Chưa có phản hồi nào.</p>
        <?php endif; ?>
    </div>
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
