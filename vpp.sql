SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `vanphongpham`;
CREATE DATABASE `vanphongpham` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `vanphongpham`;




DROP TABLE IF EXISTS `tbl_nguoidung`;
CREATE TABLE IF NOT EXISTS `tbl_nguoidung` (
  `MaNguoiDung` int(10) NOT NULL,
  `TenNguoiDung` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenDangNhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaNguoiDung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_nguoidung` (`MaNguoiDung`, `TenNguoiDung`, `TenDangNhap`, `MatKhau`) VALUES
(1, 'Quan ly', 'ql', '12345'),
(2, 'Nhan vien', 'nv', '123');

DROP TABLE IF EXISTS `tbl_taikhoanuser`;
CREATE TABLE IF NOT EXISTS `tbl_taikhoanuser` (
  `Mauser` int (10) NOT NULL auto_increment,
  `Tendangnhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` bigint (15) COLLATE utf8_unicode_ci NOT NULL,
  `Matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Mauser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `tbl_hang`;
CREATE TABLE IF NOT EXISTS `tbl_hang` (
  `MaHang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenHang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Dongia` int NOT NULL,
  `Soluong` int NOT NULL,
  `Hinhanh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Magiamgia` float not null ,
  `Maloai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Manhacungcap` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Mahang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_hang` (`Mahang`, `TenHang`, `Dongia`, `SoLuong`, `Hinhanh`, `MoTa`, `Magiamgia`, `Maloai`, `Manhacungcap`) VALUES
('sp1', 'Thước đo góc SR016', 5000, 60,'img/dogoc_sr02.jpg','Thước đo góc có thể đo góc', 0.3,'ml2','nhacc1'),
('sp2', 'Bút mực xanh Thiên Long FO03', 5000, 120,'img/fo03.png','Bút đến từ Thiên Long đảm bảo chất lượng', 0,'ml1','nhacc1'),
('sp3', 'Bút mực xanh Thiên Long GEl-08', 5000, 200,'img/gel08.jpg','Bút đến từ Thiên Long đảm bảo chất lượng', 0,'ml1','nhacc1'),
('sp4', 'Bút mực xanh Thiên Long GEL-B011', 5000, 200,'img/gelb011.webp','Bút đến từ Thiên Long đảm bảo chất lượng', 0,'ml1','nhacc1'),
('sp5', 'Ghim bấm Double A', 5000, 200,'img/ghim_10lo.webp','Ghim bấm giấy đảm bảo chất lượng', 0.2,'ml4','nhacc2'),
('sp6', 'Đồ bấm ghim cỡ đại', 78000, 200,'img/ghim_dobamdai.jpg','Bấm giấy chất lượng tối đa 250 tờ', 0.3,'ml4','nhacc2'),
('sp7', 'Đồ bấm ghim INNOX', 15000, 200,'img/ghim_dobaminox.jpg','Bấm giấy chất lượng vừa tay bền ', 0,'ml4','nhacc2'),
('sp8', 'Đồ bấm ghim bấm MINI', 10000, 300,'img/ghim_dobammini.webp','Bấm giấy chất lượng dễ dàng tiện lợi', 0,'ml4','nhacc2'),
('sp9', 'Đồ bấm ghim E0358', 25000, 200,'img/ghim_e0358.jpg','Bấm giấy chất lượng, thiết kế tinh tế', 0,'ml4','nhacc2'),
('sp10', 'Ghim bấm Plus', 5000, 200,'img/ghim_plus.png','Ghim bấm giấy đảm bảo chất lượng', 0,'ml4','nhacc2'),
('sp11', 'Giấy in Văn Phòng Epaper', 65000, 300,'img/giay_epaper.jpg','Giấy in đảm bảo chất lượng màu in tốt', 0.3,'ml3','nhacc2'),
('sp12', 'Giấy in Văn Phòng IK Plus', 78000, 200,'img/giay_ikplus.jpg','Giấy in đảm bảo chất lượng màu in tốt', 0.3,'ml3','nhacc2'),
('sp13', 'Giấy in Văn Phòng màu khổ A4', 78000, 200,'img/giay_mau.jpg','Giấy in đảm bảo chất lượng màu in tốt', 0.3,'ml3','nhacc2'),
('sp14', 'Giấy in Văn Phòng 10 màu', 78000, 200,'img/giay_mau10.jpg','Giấy in đảm bảo chất lượng màu in tốt', 0.3,'ml3','nhacc2'),
('sp15', 'Giấy Note nhiều màu sắc', 25000, 200,'img/giay_note.jpg','Giấy note thông tin ghi chú', 0.3,'ml3','nhacc2'),
('sp16', 'Giấy Note Usa', 30000, 500,'img/giay_noteUSA.jpg','Giấy note thông tin ghi chú', 0,'ml3','nhacc2'),
('sp17', 'Giấy in Văn phòng nhiều màu sắc ORG', 78000, 200,'img/giay_org.jpg','Giấy in đảm bảo chất lượng màu in tốt', 0.3,'ml3','nhacc2'),
('sp18', 'Giấy in Văn Phòng PaperOne', 78000, 200,'img/giay_paperone.jpg','Giấy in đảm bảo chất lượng màu in tốt', 0.3,'ml3','nhacc2'),
('sp19', 'Giấy in Văn Phòng Viva Nano', 68000, 200,'img/giay_viva.jpg','Giấy in đảm bảo chất lượng màu in tốt', 0.3,'ml3','nhacc2'),
('sp20', 'Giấy in Văn Phòng Viva', 78000, 200,'img/giay_vivavang.jpg','Giấy in đảm bảo chất lượng màu in tốt', 0.3,'ml3','nhacc2'),
('sp21', 'Gôm tẩy chì Thiên Long E06', 9000, 200,'img/gomtl_e06.jpg','Gôm tẩy màu trắng TL đảm bảo chất lượng tốt', 0,'ml1','nhacc1'),
('sp22', 'Gôm tẩy chì Thiên Long E11', 9000, 200,'img/gomtl_e11.webp','Gôm tẩy màu trắng TL đảm bảo chất lượng tốt', 0,'ml1','nhacc1'),
('sp23', 'Bút chì Thiên Long GP01', 14000, 200,'img/gp01.webp','Bút chì TL đảm bảo chất lượng tốt', 0,'ml1','nhacc1'),
('sp24', 'Bút chì Thiên Long GP03', 14000, 200,'img/gp03.jpg','Bút chì TL đảm bảo chất lượng tốt', 0,'ml1','nhacc1'),
('sp25', 'Bút chì Thiên Long GP04', 14000, 200,'img/gp04.jpg','Bút chì thân gỗ TL đảm bảo chất lượng tốt', 0,'ml1','nhacc1'),
('sp26', 'Bút chì Thiên Long GP06', 14000, 200,'img/gp06.jpg','Bút chì thân gỗ TL đảm bảo chất lượng tốt', 0,'ml1','nhacc1'),
('sp27', 'Bút chì Thiên Long GP018', 14000, 200,'img/gp18.png','Bút chì thân gỗ TL đảm bảo chất lượng tốt', 0,'ml1','nhacc1'),
('sp28', 'Bút chì màu Thiên Long Colokit', 50000, 200,'img/gpcolor.webp','Bút chì màu TL đảm bảo chất lượng tốt', 0,'ml1','nhacc1'),
('sp29', 'Bút chì màu Thiên Long GP-E06', 35000, 200,'img/gpe06.jpg','Bút chì màu TL đảm bảo chất lượng tốt', 0,'ml1','nhacc1'),
('sp30', 'Keo 2 mặt bản nhỏ', 13000, 200,'img/keo_2mat.jpg','Keo dán 2 mặt đảm bảo chất lượng tốt', 0,'ml6','nhacc3'),
('sp31', 'Keo Dongdo-K12', 20000, 200,'img/keo_dongdok12.jpg','Keo dán giấy đảm bảo chất lượng tốt', 0,'ml6','nhacc3'),
('sp32', 'Keo dán giấy G08', 12000, 200,'img/keo_g08.webp','Keo dán giấy đảm bảo chất lượng tốt', 0,'ml6','nhacc3'),
('sp33', 'Keo dán giấy G015', 15000, 200,'img/keo_g015.jpg','Keo dán giấy đảm bảo chất lượng tốt', 0,'ml6','nhacc3'),
('sp34', 'Keo dán giấy khô G011', 7000, 200,'img/keo_khog011.jpg','Keo dán khô đảm bảo chất lượng tốt', 0,'ml6','nhacc3'),
('sp35', 'Keo dán giấy Queen', 7000, 200,'img/keo_queen.png','Keo dán Queen đảm bảo chất lượng tốt', 0,'ml6','nhacc3'),
('sp37', 'Keo dán Universal', 15000, 200,'img/keo_universal.webp','Keo dán Universal đảm bảo chất lượng tốt', 0,'ml6','nhacc3'),
('sp38', 'Bút mực Thiên Long P01', 7000, 200,'img/p01.jpeg','Bút mực xanh TL đảm bảo chất lượng tốt', 0,'ml1','nhacc1'),
('sp39', 'Bút chì ngồi Thiên Long PC02', 18000, 200,'img/pc02.jpg','Bút chì ngồi TL đảm bảo chất lượng tốt', 0,'ml1','nhacc1'),
('sp40', 'Sổ ghi chép 365', 16000, 200,'img/so_365.jpg','Sổ ghi chép đảm bảo chất lượng tốt', 0,'ml5','nhacc3'),
('sp41', 'Sổ ghi chép A7', 15000, 200,'img/so_a7.jpg','Sổ ghi chép A7 đảm bảo chất lượng tốt', 0,'ml5','nhacc3'),
('sp42', 'Sổ ghi chép AGENDA', 25000, 200,'img/so_agenda.jpg','Sổ ghi chép Agenda đảm bảo chất lượng tốt', 0,'ml5','nhacc3'),
('sp43', 'Sổ ghi chép Korea', 30000, 200,'img/so_korea.webp','Sổ ghi chép Korea đảm bảo chất lượng tốt', 0,'ml5','nhacc3'),
('sp44', 'Sổ ghi chép LOXO', 25000, 200,'img/so_loxo.jpg','Sổ ghi chép LOXO đảm bảo chất lượng tốt', 0,'ml5','nhacc3'),
('sp45', 'Sổ ghi chép Tab', 18000, 200,'img/so_tab.jpg','Sổ ghi chép Tab đảm bảo chất lượng tốt', 0,'ml5','nhacc3'),
('sp46', 'Sổ ghi chép Thiên Long', 15000, 200,'img/so_thienlong.webp','Sổ ghi chép TL đảm bảo chất lượng tốt', 0,'ml5','nhacc1'),
('sp47', 'Thước thẳng Thiên Long SR02', 5000, 200,'img/sr02.jpg','Thước TL đảm bảo chất lượng đo chính xác', 0,'ml2','nhacc1'),
('sp48', 'Thước Thiên Long SR09 Doraemon', 26000, 200,'img/sr09.webp','Thước TL đảm bảo chất lượng đo chính xác', 0,'ml2','nhacc1'),
('sp49', 'Thước thẳng Thiên Long màu Hồng SR010', 5000, 200,'img/sr010.webp','Thước TL đảm bảo chất lượng đo chính xác', 0,'ml2','nhacc1'),
('sp50', 'Thước thẳng Thiên Long 15cm SR017', 6000, 200,'img/sr017.jpg','Thước TL đảm bảo chất lượng đo chính xác', 0,'ml2','nhacc1'),
('sp51', 'Thước thẳng Thiên Long 20cm SR022', 5000, 200,'img/sr022.jpg','Thước TL đảm bảo chất lượng đo chính xác', 0,'ml2','nhacc1'),
('sp52', 'Bút mực đỏ Thiên Long TL08', 4000, 200,'img/tl08.jpg','Bút mực đỏ TL đảm bảo chất lượng  màu mực tốt', 0,'ml1','nhacc1'),
('sp53', 'Bút mực xanh Thiên Long TL08', 4000, 200,'img/tl08_xanh.jpg','Bút mực xanh TL đảm bảo chất lượng  màu mực tốt', 0,'ml1','nhacc1'),
('sp54', 'Bút mực đỏ Thiên Long TL023', 5000, 200,'img/tl023.jpg','Bút mực đỏ TL đảm bảo chất lượng  màu mực tốt', 0,'ml1','nhacc1'),
('sp55', 'Bút mực xanh Thiên Long TL25', 4000, 200,'img/tl025.jpg','Bút mực xanh TL đảm bảo chất lượng  màu mực tốt', 0,'ml1','nhacc1'),
('sp56', 'Bút mực xanh Thiên Long TL027', 4000, 200,'img/tl027.jpg','Bút mực xanh TL đảm bảo chất lượng  màu mực tốt', 0,'ml1','nhacc1'),
('sp57', 'Bút mực xanh Thiên Long TL031', 4000, 200,'img/tl031.webp','Bút mực xanh TL đảm bảo chất lượng  màu mực tốt', 0,'ml1','nhacc1'),
('sp58', 'Bút mực xanh Thiên Long TL036', 6000, 200,'img/tl036.jpg','Bút mực xanh TL đảm bảo chất lượng  màu mực tốt', 0,'ml1','nhacc1');


DROP TABLE IF EXISTS `tbl_Maloai`;
CREATE TABLE IF NOT EXISTS `tbl_Maloai` (
  `Maloai`  varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tenloai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_Maloai`(`Maloai`, `Tenloai`) values 
('ml1','Bút'),
('ml2','Thước'),
('ml3','Giấy in'),
('ml4','Ghim bấm'),
('ml5','Sổ'),
('ml6','Keo dán');




DROP TABLE IF EXISTS `tbl_Manhacungcap`;
CREATE TABLE IF NOT EXISTS `tbl_Manhacungcap` (
  `Manhacc`  varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tennhacc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Manhacc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tbl_Manhacungcap`(`Manhacc`, `Tennhacc`) values 
('nhacc1','Thiên Long'),
('nhacc2','Paper'),
('nhacc3','Hồng Hà');


DROP TABLE IF EXISTS `tbl_giohang`;
CREATE TABLE IF NOT EXISTS `tbl_giohang` (
  `MaHang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Magiohang` int(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenHang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Dongia` int NOT NULL,
  `Hinhanh` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Magiamgia` float not null ,
  `Maloai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Manhacungcap` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Magiohang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





