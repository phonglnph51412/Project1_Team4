-- Thiết lập lại cơ sở dữ liệu
DROP DATABASE IF EXISTS `du_an_1`;
CREATE DATABASE `du_an_1`;
USE `du_an_1`;

-- Bảng danh mục sản phẩm
CREATE TABLE `danh_muc` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `ten_danh_muc` VARCHAR(255) NOT NULL,
  `trang_thai` TINYINT(1) NOT NULL,
  `mo_ta` VARCHAR(256) NOT NULL
) ENGINE=InnoDB;

-- Bảng trạng thái
CREATE TABLE `trang_thai` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `ten_trang_thai` VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Bảng sản phẩm
CREATE TABLE `san_pham` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `ten_san_pham` VARCHAR(255) NOT NULL,
  `gia_nhap` DECIMAL(10, 0) NOT NULL,
  `gia_ban` DECIMAL(10, 0) NOT NULL,
  `gia_khuyen_mai` DECIMAL(10, 0) NOT NULL,
  `ngay_nhap` DATE NOT NULL,
  `luot_xem` INT DEFAULT 0,
  `mo_ta` TEXT NOT NULL,
  `danh_muc_id` INT NOT NULL,
  `trang_thai_id` INT NOT NULL,
  FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_muc`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Bảng chi tiết sản phẩm
CREATE TABLE `san_pham_chi_tiet` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `san_pham_id` INT NOT NULL,
  `mau_sac` VARCHAR(50) NOT NULL,
  `kich_thuoc` VARCHAR(10) NOT NULL,
  `so_luong` INT NOT NULL,
  FOREIGN KEY (`san_pham_id`) REFERENCES `san_pham`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Bảng hình ảnh sản phẩm
CREATE TABLE `hinh_anh_san_pham` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `san_pham_id` INT NOT NULL,
  `link_hinh_anh` TEXT NOT NULL,
  FOREIGN KEY (`san_pham_id`) REFERENCES `san_pham`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Bảng khuyến mãi
CREATE TABLE `khuyen_mai` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `ma_khuyen_mai` VARCHAR(256) NOT NULL,
  `ten_khuyen_mai` VARCHAR(256) NOT NULL,
  `muc_giam` DECIMAL(10, 2) NOT NULL,
  `ngay_bat_dau` DATE NOT NULL,
  `ngay_ket_thuc` DATE NOT NULL,
  `mo_ta` VARCHAR(256),
  `trang_thai` TINYINT(1) NOT NULL
) ENGINE=InnoDB;

-- Bảng tài khoản
CREATE TABLE `tai_khoan` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `ho_ten` VARCHAR(256) NOT NULL,
  `email` VARCHAR(256) NOT NULL,
  `so_dien_thoai` VARCHAR(10) NOT NULL,
  `mat_khau` VARCHAR(256) NOT NULL,
  `dia_chi` VARCHAR(256) NOT NULL,
  `ngay_sinh` DATE,
  `trang_thai` TINYINT(1) NOT NULL,
  `chuc_vu` VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Bảng đơn hàng
CREATE TABLE `don_hang` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `ma_don_hang` VARCHAR(50) NOT NULL,
  `nguoi_dung_id` INT NOT NULL,
  `ngay_dat` DATE NOT NULL,
  `tong_tien` DECIMAL(10, 2) NOT NULL,
  `ghi_chu` TEXT,
  `phuong_thuc_thanh_toan` VARCHAR(255) NOT NULL,
  `trang_thai_id` INT NOT NULL,
  FOREIGN KEY (`nguoi_dung_id`) REFERENCES `tai_khoan`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Bảng chi tiết đơn hàng
CREATE TABLE `chi_tiet_don_hang` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `don_hang_id` INT NOT NULL,
  `san_pham_id` INT NOT NULL,
  `so_luong` INT NOT NULL,
  `don_gia` DECIMAL(10, 2) NOT NULL,
  `thanh_tien` DECIMAL(10, 2) NOT NULL,
  FOREIGN KEY (`don_hang_id`) REFERENCES `don_hang`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`san_pham_id`) REFERENCES `san_pham`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Bảng giỏ hàng
CREATE TABLE `gio_hang` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nguoi_dung_id` INT NOT NULL,
  FOREIGN KEY (`nguoi_dung_id`) REFERENCES `tai_khoan`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Bảng chi tiết giỏ hàng
CREATE TABLE `chi_tiet_gio_hang` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `gio_hang_id` INT NOT NULL,
  `san_pham_id` INT NOT NULL,
  `so_luong` INT NOT NULL,
  FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hang`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`san_pham_id`) REFERENCES `san_pham`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;
