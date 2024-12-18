<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }
    include_once "cauhinh.php";

    // Handle form submissions
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add user
    if (isset($_POST['add_user'])) {
        $tennguoidung = $_POST['tennguoidung'] ?? null;
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!empty($tennguoidung) && !empty($username) && !empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $connect->prepare("INSERT INTO tbl_nguoidung (TenNguoiDung, TenDangNhap, MatKhau) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $tennguoidung, $username, $hashed_password);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "All fields are required.";
        }
    }

    // Delete user
    if (isset($_POST['delete_user'])) {
        $username = $_POST['username'] ?? null;

        if (!empty($username)) {
            $stmt = $connect->prepare("DELETE FROM tbl_nguoidung WHERE TenDangNhap=?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Username cannot be empty.";
        }
    }
}

// Fetch all users
$result = $connect->query("SELECT * FROM tbl_nguoidung");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <link rel="stylesheet" href="./css/style-um.css">
</head>
<body>
    <h1>QUẢN LÍ TÀI KHOẢN</h1>
    <nav>
        <a href="index.php">Back to Admin Page</a>
        <a class="logout" href="logout.php">Đăng xuất</a>
    </nav>

    <div class="form-container">
    <h2>Add New User</h2>
    <form action="user_management.php" method="post" onsubmit="return validateForm()">
        <input type="text" name="tennguoidung" placeholder="Tên người dùng" required id="tennguoidung">
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <p id="message"></p>
        <button type="submit" name="add_user">Thêm</button>
    </form>
</div>

<script>
    function validateForm() {
        var tennguoidungInput = document.getElementById("tennguoidung");
        var tennguoidungValue = tennguoidungInput.value.trim();
        
        if (tennguoidungValue.length < 5) {
            document.getElementById("message").innerText = "Tên người dùng phải có ít nhất 5 ký tự.";
            return false; // ngăn form được submit nếu không hợp lệ
        }
        return true; // cho phép form được submit nếu hợp lệ
    }
</script>


    <div class="form-container">
        <h2>Delete User</h2>
        <form action="user_management.php" method="post">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <button type="submit" name="delete_user">Xóa</button>
        </form>
    </div>

    <h2>User List</h2>
    <table border="1">
        <tr>
            <th>Mã người dùng</th>
            <th>Tên người dùng</th>
            <th>Tên đăng nhập</th>
        </tr>
        <?php if ($result): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['MaNguoiDung']); ?></td>
                    <td><?php echo htmlspecialchars($row['TenNguoiDung']); ?></td>
                    <td><?php echo htmlspecialchars($row['TenDangNhap']); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No users found</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
