<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $login_url = "user_dangnhap.php";
}

while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) {                
    $giaban = $row['Dongia'] - (($row['Magiamgia']) * $row['Dongia']);
    echo "<form action=\"giohang.php\" method=\"POST\">";
        echo "<div class='khungsanpham'>";
            echo "<div class='card'>";                    
                    echo "<a class=\"xemchitiet\" href=\"chitiet_sp.php?id=" . $row['MaHang'] . "\"><img class='hinhanhphim' src=\"" . $row["Hinhanh"] . "\"  style='width: 225px; height: 225px;'></a>";
                    echo "<span class='tenphim' ></span> <br />";
                    echo "<span class=\"\" name=\"ten_hang\">". $row["TenHang"] ."</span><br/>" ;                    
                $Magiamgia = $row['Magiamgia'];
                if($Magiamgia != 0) { 
                    echo "<span class=\"dongia\" style=\"text-decoration: line-through;\">". number_format($row['Dongia'])." đ</span>";
                }
                echo "</br></b><span style='float: right;'class=\"Giaban\">". number_format($giaban)." đ</span>";
                echo "<br/><br/><input class=\"soluong\" type=\"number\" value=1 name=\"soluong\">";
                echo "<input type=\"hidden\" name=\"hinh_anh\" value=\"" .$row['Hinhanh']. "\">";
                echo "<input type=\"hidden\" name=\"ten_hang\" value=\"" . $row["TenHang"] . "\">";
                echo "<input type=\"hidden\" name=\"dongia\" value=\"" . $row["Dongia"] . "\">";
                echo "<input type=\"hidden\" name=\"magiamgia\" value=\"" . $row["Magiamgia"] . "\">";

                if(isset($login_url)) {
                    echo "<input class=\"themgh\" type=\"button\" value=\"Thêm vào giỏ hàng\" onclick=\"location.href='$login_url'\" name=\"btn_themgh\">";
                } else {
                    echo "<input class=\"themgh\" type=\"submit\" value=\"Thêm vào giỏ hàng\" name=\"btn_themgh\">";
                }

            echo "</div>";         
        echo "</div>";
    echo "</form>";
}
?>
