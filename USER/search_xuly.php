<?php
    $search = addslashes($_POST['search_sp']);
    $spl = "SELECT * FROM tbl_hang WHERE TenHang LIKE '%$search%'";
    $danhsach = $connect->query($spl);


    if (!$danhsach){
        die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
        exit();
    }
    
    $num = mysqli_num_rows($danhsach);// đếm số dòng trả về trong ds
 

    if ($num > 0 && $search != "") {
        
        echo"<style>.sp_timkiem{display:none;} </style>";
            echo"<div class=\"sanpham sp_timthay\">";
                echo"<p class=\"title\"> $num sản phẩm có tên <b>$search</b></p>";
                echo"<div class=\"data\">";
                    echo" <tr><td style=\"width: 250px\">";
                        while ($row = $danhsach->fetch_array(MYSQLI_ASSOC))
                        {
                            $giaban = $row['Dongia'] - (($row['Magiamgia']) * $row['Dongia']);
                            echo"<form action=\"giohang.php\" method=\"POST\">";
                                echo "<div class='khungsp'>";
                                    echo "<div class='card'>";					
                                            echo "<img class='hinhanhphim' src=" . $row["Hinhanh"] . "  style='width: 250px; height: 250px;'>";
                                            echo "<span class='tenphim' ></span> <br />";
                                            echo "<span class=\"\">". $row["TenHang"] ."</span><br/>" ;
                                        echo "<span class=\"price\">". number_format($giaban)." đ</span>";
                                        $Magiamgia = $row['Magiamgia'];
                                        if($Magiamgia != 0) { 
                                            echo "<span class=\"gia\" style=\"text-decoration: line-through;\">". number_format($row['Dongia'])." đ</span>";
                                        }
                                        echo "<br/><br/><input class=\"soluong\" type=\"number\" value=1 name=\"soluong\">";
                                        echo "<input type=\"hidden\" name=\"hinh_anh\" value=\"" .$row['Hinhanh']. "\">";
                                        echo "<input type=\"hidden\" name=\"ten_hang\" value=\"" . $row["TenHang"] . "\">";
                                        echo "<input type=\"hidden\" name=\"dongia\" value=\"" . $row["Dongia"] . "\">";
                                        echo "<input type=\"hidden\" name=\"magiamgia\" value=\"" . $row["Magiamgia"] . "\">";
                                        echo "<input class=\"themgiohang\" type=\"submit\" value=\"Thêm vào giỏ hàng\" name=\"btn_themgh\">";   
                                    echo "</div>";         
                                echo "</div>";
                            echo"</form>";  
                        }
                    echo"</td></tr>";   
                echo"</div>";
        echo"</div>";
    }
    else{
        echo"<style>.sp_timkiem{display:none;} </style>";
        echo"<p class=\"title\"> $num sản phẩm có tên <b>$search</b></p>";

        echo"<div class=\"data\">";
                echo" <tr><td style=\"width: 250px\">";
                echo"</td></tr>";   
        echo"</div>";		
    }
?>