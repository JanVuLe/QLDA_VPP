<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
else{
    $user = $_SESSION["user"];
}
include_once "cauhinh.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add product
    if (isset($_POST['add_product'])) {
        $MaHang = $_POST['MaHang'];
        $TenHang = $_POST['TenHang'];
        $Dongia = $_POST['Dongia'];
        $Soluong = $_POST['Soluong'];
        $MoTa = $_POST['MoTa'];
        $Magiamgia = $_POST['Magiamgia'];
        $Maloai = $_POST['Maloai'];
        $Manhacungcap = $_POST['Manhacungcap'];

        move_uploaded_file($_FILES["Hinhanh"]["tmp_name"], "../USER/img/". $_FILES["Hinhanh"]["name"]);

        $stmt = $connect->prepare("INSERT INTO tbl_hang (MaHang, TenHang, Dongia, Soluong, Hinhanh, MoTa, Magiamgia, Maloai, Manhacungcap) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssissdsss", $MaHang, $TenHang, $Dongia, $Soluong, $target_file, $MoTa, $Magiamgia, $Maloai, $Manhacungcap);
        $stmt->execute();
        $stmt->close();
    }

    // Edit product
    if (isset($_POST['edit_product'])) {
        $MaHang = $_POST['MaHang'];
        $TenHang = $_POST['TenHang'];
        $Dongia = $_POST['Dongia'];
        $Soluong = $_POST['Soluong'];
        $MoTa = $_POST['MoTa'];
        $Magiamgia = $_POST['Magiamgia'];
        $Maloai = $_POST['Maloai'];
        $Manhacungcap = $_POST['Manhacungcap'];

        // Handle image upload
        if ($_FILES["Hinhanh"]["name"]) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["Hinhanh"]["name"]);
            move_uploaded_file($_FILES["Hinhanh"]["tmp_name"], $target_file);
            $stmt = $connect->prepare("UPDATE tbl_hang SET TenHang=?, Dongia=?, Soluong=?, Hinhanh=?, MoTa=?, Magiamgia=?, Maloai=?, Manhacungcap=? WHERE MaHang=?");
            $stmt->bind_param("sissdssss", $TenHang, $Dongia, $Soluong, $target_file, $MoTa, $Magiamgia, $Maloai, $Manhacungcap, $MaHang);
        } else {
            $stmt = $connect->prepare("UPDATE tbl_hang SET TenHang=?, Dongia=?, Soluong=?, MoTa=?, Magiamgia=?, Maloai=?, Manhacungcap=? WHERE MaHang=?");
            $stmt->bind_param("sissdsss", $TenHang, $Dongia, $Soluong, $MoTa, $Magiamgia, $Maloai, $Manhacungcap, $MaHang);
        }
        $stmt->execute();
        $stmt->close();
    }

    // Delete product
    if (isset($_POST['delete_product'])) {
        $MaHang = $_POST['MaHang'];

        $stmt = $connect->prepare("DELETE FROM tbl_hang WHERE MaHang=?");
        $stmt->bind_param("s", $MaHang);
        $stmt->execute();
        $stmt->close();
    }

    // Add user
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $connect->prepare("INSERT INTO tbl_user (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->close();
    }

    // Delete user
    if (isset($_POST['delete_user'])) {
        $username = $_POST['username'];

        $stmt = $connect->prepare("DELETE FROM tbl_user WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->close();
    }
}
    $supplier_search = '';
    if (isset($_GET['search_supplier'])) {
        $supplier_search = $_GET['Manhacungcap'];
        $stmt = $connect->prepare("SELECT * FROM tbl_hang WHERE Manhacungcap LIKE ?");
        $supplier_search_param = "%" . $supplier_search . "%";
        $stmt->bind_param("s", $supplier_search_param);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    } 
    else {
        $result = $connect->query("SELECT * FROM tbl_hang");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page - Manage Products</title>
    <link rel="stylesheet" href="./css/style-index.css">
    <style>
        .form-container {
            display: none;
        }
    </style>
    <script>
        function showForm(formId) {
            document.getElementById('addForm').style.display = 'none';
            document.getElementById('editForm').style.display = 'none';
            document.getElementById('deleteForm').style.display = 'none';
            // document.getElementById('addUserForm').style.display = 'none';
            // document.getElementById('deleteUserForm').style.display = 'none';
            document.getElementById(formId).style.display = 'block';
        }

        function showDiscountedProducts() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("discountedProducts").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "sp_sale.php", true);
            xmlhttp.send();
        }

        function editProduct(MaHang) {
            var editForm = document.getElementById('editForm');
            editForm.style.display = 'block';

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var product = JSON.parse(this.responseText);
                    document.getElementById('editMaHang').value = product.MaHang;
                    document.getElementById('editTenHang').value = product.TenHang;
                    document.getElementById('editDongia').value = product.Dongia;
                    document.getElementById('editSoluong').value = product.Soluong;
                    document.getElementById('editMoTa').value = product.MoTa;
                    document.getElementById('editMagiamgia').value = product.Magiamgia;
                    document.getElementById('editMaloai').value = product.Maloai;
                    document.getElementById('editManhacungcap').value = product.Manhacungcap;
                }
            };
            xmlhttp.open("GET", "get_product.php?MaHang=" + MaHang, true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
    <h1>Admin Page - Manage Products</h1>
    <nav>
        <button onclick="showForm('addForm')">Thêm sản phẩm</button>
        <button onclick="showForm('editForm')">Sửa sản phẩm</button>
        <button onclick="showForm('deleteForm')">Xóa sản phẩm</button>
        <button onclick="showDiscountedProducts()">Xem sản phẩm có giảm giá</button>
        <?php if ($user == '1'){
            echo "<a href=\"user_management.php\">Quản lý tài khoản</a>";
        } ?>
            
        <a class="logout" href="logout.php">Đăng xuất</a>
    </nav>


    <!-- Supplier search form -->
    <form action="index.php" method="get" class="form-search">
        <input  style="width: 30%;" class="form-search-input" type="text" name="Manhacungcap" placeholder="Nhập mã nhà cung cấp" value="<?php echo htmlspecialchars($supplier_search); ?>">
        <button style="width: 100px;" type="submit" name="search_supplier">Tìm kiếm</button>
    </form>

    <div id="addForm" class="form-container">
        <h2>Add New Product</h2>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="text" name="MaHang" placeholder="MaHang" required>
            <input type="text" name="TenHang" placeholder="TenHang" required>
            <input type="number" name="Dongia" placeholder="Dongia" required>
            <input type="number" name="Soluong" placeholder="Soluong" required>
            <input type="file" name="Hinhanh" required>
            <input type="text" name="MoTa" placeholder="MoTa" required>
            <input type="number" step="0.01" name="Magiamgia" placeholder="Magiamgia" required>
            <input type="text" name="Maloai" placeholder="Maloai" required>
            <input type="text" name="Manhacungcap" placeholder="Manhacungcap" required>
            <button type="submit" name="add_product">Add Product</button>
        </form>
    </div>

    <div id="editForm" class="form-container">
        <h2>Sửa sản phẩm</h2>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="editMaHang" name="MaHang" required>
            <input type="text" id="editTenHang" name="TenHang" placeholder="TenHang" required>
            <input type="number" id="editDongia" name="Dongia" placeholder="Dongia" required>
            <input type="number" id="editSoluong" name="Soluong" placeholder="Soluong" required>
            <input type="file" id="editHinhanh" name="Hinhanh">
            <input type="text" id="editMoTa" name="MoTa" placeholder="MoTa" required>
            <input type="number" step="0.01" id="editMagiamgia" name="Magiamgia" placeholder="Magiamgia" required>
            <input type="text" id="editMaloai" name="Maloai" placeholder="Maloai" required>
            <input type="text" id="editManhacungcap" name="Manhacungcap" placeholder="Manhacungcap" required>
            <button type="submit" name="edit_product">Edit Product</button>
        </form>
    </div>

    <div id="deleteForm" class="form-container">
        <h2>Xóa sản phẩm</h2>
        <form action="index.php" method="post">
            <input type="text" name="MaHang" placeholder="MaHang" required>
            <button type="submit" name="delete_product">Xóa</button>
        </form>
    </div>

    <!-- <div id="addUserForm" class="form-container">
        <h2>Thêm người dùng</h2>
        <form action="index.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="add_user">Add User</button>
        </form>
    </div>

    <div id="deleteUserForm" class="form-container">
        <h2>Xóa người dùng</h2>
        <form action="index.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <button type="submit" name="delete_user">Delete User</button>
        </form>
    </div> -->

    <!-- Thêm một phần tử để hiển thị danh sách sản phẩm -->
    <div id="discountedProducts"></div>

    <h2>Danh sách sản phẩm</h2>
    <table border="1">
        <tr>
            <th>MaHang</th>
            <th>TenHang</th>
            <th>Dongia</th>
            <th>Soluong</th>
            <th>Hinhanh</th>
            <th>MoTa</th>
            <th>Magiamgia</th>
            <th>Maloai</th>
            <th>Manhacungcap</th>
            <th>Actions</th>
        </tr>
        <?php if ($result): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['MaHang']; ?></td>
                    <td><?php echo $row['TenHang']; ?></td>
                    <td><?php echo $row['Dongia']; ?></td>
                    <td><?php echo $row['Soluong']; ?></td>
                    <td><img src="../USER/<?php echo $row['Hinhanh']; ?>" alt="<?php echo $row['TenHang']; ?>" width="100"></td>
                    <td><?php echo $row['MoTa']; ?></td>
                    <td><?php echo $row['Magiamgia']; ?></td>
                    <td><?php echo $row['Maloai']; ?></td>
                    <td><?php echo $row['Manhacungcap']; ?></td>
                    <td>
                        <button onclick="editProduct('<?php echo $row['MaHang']; ?>')">Edit</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="10">Không tìm thấy sản phẩm</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
