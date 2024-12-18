<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include_once "cauhinh.php";

// Fetch discounted products
$result = $connect->query("SELECT * FROM tbl_hang WHERE Magiamgia > 0");
?>

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
</table>
