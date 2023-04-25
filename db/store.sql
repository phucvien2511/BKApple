SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `AppleStore`
--
CREATE DATABASE IF NOT EXISTS `AppleStore` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `AppleStore`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
CREATE TABLE user (
  id INT NOT NULL UNIQUE AUTO_INCREMENT,
  role VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  username VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL UNIQUE,
  password CHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  name VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  avatar text NOT NULL DEFAULT 'https://st3.depositphotos.com/1767687/16607/v/600/depositphotos_166074422-stock-illustration-default-avatar-profile-icon-grey.jpg',
  birthday DATE DEFAULT CURRENT_TIMESTAMP, 
  phone CHAR(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  mail VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  address text,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `user`(`id`, `role`, `username`, `password`, `name`, `avatar`, `birthday`, `phone`, `mail`, `address`) VALUES 
(1, 'user', 'guest','123456','Huỳnh Bảo Tín','https://st3.depositphotos.com/1767687/16607/v/600/depositphotos_166074422-stock-illustration-default-avatar-profile-icon-grey.jpg', '2002-02-17','0707829902','lonelyghost172@gmail.com','290/19 Lý Thường Kiệt'),
(2, 'user', 'phuc','123456','Viên Minh Phúc','https://st3.depositphotos.com/1767687/16607/v/600/depositphotos_166074422-stock-illustration-default-avatar-profile-icon-grey.jpg', '2002-11-25','0123456789','phuc@gmail.com','528 Nguyễn Văn Khối, P.9, Q.Gò Vấp, TPHCM'),
(3, 'admin', 'admin1', '123456', 'Lê Thị Admin', 'https://st3.depositphotos.com/1767687/16607/v/600/depositphotos_166074422-stock-illustration-default-avatar-profile-icon-grey.jpg', '2001-08-15', '028123456', 'admin1@bkapple.com', '250 Phạm Văn Chiêu');
--
-- Table structure for table `products`
--
CREATE TABLE product (
  id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  productName VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  releaseDate DATE DEFAULT CURRENT_TIMESTAMP, 
  quantity INT DEFAULT 0,
  sold INT DEFAULT 0,
  price INT DEFAULT 0,
  description text,
  color VARCHAR(30) NOT NULL,
  thumbnail text,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `product` (`id`, `productName`, `releaseDate`, `quantity`, `sold`, `price`, `description`, `color`, `thumbnail`) VALUES
-- iPhone
('IPHONE14_128', 'iPhone 14', '2022-09-20', 100, 0, 22990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.', 'black,red', '/images/iphone/iphone14/iphone14'),
('IPHONE14_256', 'iPhone 14', '2022-09-20', 100, 3, 25990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.', 'gold,blue', '/images/iphone/iphone14/iphone14'),
('IPHONE14_512', 'iPhone 14', '2022-09-20', 100, 0, 28990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.', 'black,blue,red', '/images/iphone/iphone14/iphone14'),
('IPHONE14PLUS_128', 'iPhone 14 Plus', '2022-10-31', 150, 0, 24990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'gold', '/images/iphone/iphone14/iphone14_plus'),
('IPHONE14PLUS_256', 'iPhone 14 Plus', '2020-10-31', 150, 15, 27990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'red,white,gold', '/images/iphone/iphone14/iphone14_plus'),
('IPHONE14PLUS_512', 'iPhone 14 Plus', '2020-10-31', 150, 0, 32990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'gold,red', '/images/iphone/iphone14/iphone14_plus'),
('IPHONE14PRO_256', 'iPhone 14 Pro', '2022-10-31', 120, 0, 29990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'purple,gold', '/images/iphone/iphone14/iphone14_pro'),
('IPHONE14PRO_512', 'iPhone 14 Pro', '2022-10-31', 120, 0, 35990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'silver,gold,purple', '/images/iphone/iphone14/iphone14_pro'),
('IPHONE14PROMAX_256', 'iPhone 14 Pro Max', '2022-10-31', 150, 17, 32990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'black,gold', '/images/iphone/iphone14/iphone14_promax'),
('IPHONE14PROMAX_512', 'iPhone 14 Pro Max', '2022-10-31', 150, 0, 37990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'silver,black', '/images/iphone/iphone14/iphone14_promax'),
('IPHONE13_128', 'iPhone 13', '2021-10-31', 80, 9, 18990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'black,blue', '/images/iphone/iphone13/iphone13'),
('IPHONE13_256', 'iPhone 13', '2021-10-31', 80, 0, 20990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'black,green', '/images/iphone/iphone13/iphone13'),
('IPHONE13_512', 'iPhone 13', '2021-10-31', 80, 0, 24990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'black,blue,green', '/images/iphone/iphone13/iphone13'),
('IPHONE13PRO_512', 'iPhone 13 Pro', '2021-10-31', 150, 24, 23990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'blue,grey', '/images/iphone/iphone13/iphone13_pro'),
('IPHONE13PRO_1024', 'iPhone 13 Pro', '2021-10-31', 150, 0, 27990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'blue,silver,grey', '/images/iphone/iphone13/iphone13_pro'),
('IPHONE13PROMAX_512', 'iPhone 13 Pro Max', '2021-10-31', 70, 10, 29990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'gold,silver,grey', '/images/iphone/iphone13/iphone13_promax'),
('IPHONE12_64', 'iPhone 12', '2020-10-31', 50, 0, 14990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'green,purple', '/images/iphone/iphone12/iphone12'),
('IPHONE12_128', 'iPhone 12', '2020-10-31', 50, 13, 15990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'red,green', '/images/iphone/iphone12/iphone12'),
('IPHONE12_256', 'iPhone 12', '2020-10-31', 50, 0, 17990000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'black,red,purple', '/images/iphone/iphone12/iphone12'),
-- Mac
('MACPROM1_13', 'MacBook Pro M1 13 inch', '2021-01-01', 50, 0, 36290000, "MacBook Pro M1's description", 'silver', '/images/mac/mac13_prom1'),
('MACPROM1_14', 'MacBook Pro M1 14 inch', '2021-01-01', 75, 0, 43790000, "MacBook Pro M1's description", 'silver,grey', '/images/mac/mac14_prom1'),
('MACPROM1_16', 'MacBook Pro M1 16 inch', '2021-01-01', 40, 0, 53790000, "MacBook Pro M1's description", 'silver,grey', '/images/mac/mac16_prom1'),
('MACPROM2_13', 'MacBook Pro M2 13 inch', '2022-01-01', 120, 0, 38890000, "MacBook Pro M2's description", 'silver', '/images/mac/mac13_prom2'),
('MACAIRM2', 'MacBook Air M2', '2020-01-01', 50, 0, 39790000, "MacBook Air M2's description", 'silver,blue,yellow', '/images/mac/mac_airm2'),
('MACAIRM1', 'MacBook Air M1', '2022-01-01', 70, 0, 25790000, "MacBook Air M1's description", 'silver,grey,yellow', '/images/mac/mac_airm1'),
('IMAC', 'iMac M1 24 inch', '2021-07-08', 150, 25, 37390000, "iMac's description", 'blue,pink,green', '/images/mac/imac24_m1'),
-- iPad
('IPADAIR5', 'iPad Air 5 WiFi 256GB', '2019-03-03', 120, 20, 20990000, "Với màn hình Liquid Retina 10.9 inch sống động. Chip Apple M1 đột phá cho hiệu năng nhanh hơn, giúp iPad trở nên siêu mạnh mẽ để sáng tạo và chơi game di động. Sở hữu Touch ID, camera tiên tiến, 5G và Wi-Fi 6 nhanh như chớp, cổng USB-C, cùng khả năng hỗ trợ Magic Keyboard và Apple Pencil (thế hệ thứ 2).", 'gray,blue,gold', '/images/ipad/air/air5'),
('IPADAIR5_C', 'iPad Air 5 WiFi + Cellular 256GB', '2019-06-05', 200, 35, 24990000, "Với màn hình Liquid Retina 10.9 inch sống động. Chip Apple M1 đột phá cho hiệu năng nhanh hơn, giúp iPad trở nên siêu mạnh mẽ để sáng tạo và chơi game di động. Sở hữu Touch ID, camera tiên tiến, 5G và Wi-Fi 6 nhanh như chớp, cổng USB-C, cùng khả năng hỗ trợ Magic Keyboard và Apple Pencil (thế hệ thứ 2).", 'blue,gray', '/images/ipad/air/air5_cellular'),
('IPADMINI6', 'iPad Mini 6 WiFi 256GB', '2019-01-01', 180, 1, 19990000, "Thiết kế màn hình toàn phần với màn hình Liquid Retina 8.3 inch. Chip A15 Bionic mạnh mẽ với Neural Engine. Camera trước Ultra Wide 12MP với tính năng Trung Tâm Màn Hình. Cổng kết nối USB-C. Mạng 5G siêu nhanh. Ghi chú, đánh dấu tài liệu hoặc phác thảo ngay khi những ý tưởng lớn xuất hiện trong đầu với Apple Pencil (thế hệ thứ 2) có khả năng gắn kết bằng nam châm và sạc không dây.", 'gold,grey,purple', '/images/ipad/mini/mini6'),
('IPADMINI6_C', 'iPad Mini 6 WiFi + Cellular 256GB', '2019-02-02', 140, 12, 23990000, "Thiết kế màn hình toàn phần với màn hình Liquid Retina 8.3 inch. Chip A15 Bionic mạnh mẽ với Neural Engine. Camera trước Ultra Wide 12MP với tính năng Trung Tâm Màn Hình. Cổng kết nối USB-C. Mạng 5G siêu nhanh. Ghi chú, đánh dấu tài liệu hoặc phác thảo ngay khi những ý tưởng lớn xuất hiện trong đầu với Apple Pencil (thế hệ thứ 2) có khả năng gắn kết bằng nam châm và sạc không dây.", 'pink,purple,silver', '/images/ipad/mini/mini6_cellular'),
('IPADPROM1_11', 'iPad Pro M1 11 inch WiFi 256GB', '2021-05-05', 250, 45, 25990000, "Với hiệu năng ấn tượng, kết nối không dây siêu nhanh và trải nghiệm Apple Pencil thế hệ mới. Cùng với các tính năng mới mạnh mẽ cho hiệu suất công việc và cộng tác ở iPadOS 16. iPad Pro đem đến trải nghiệm iPad cực đỉnh.", 'silver', '/images/ipad/prom1/prom1_11'),
('IPADPROM1_11_C', 'iPad Pro M1 11 inch WiFi + Cellular 256GB', '2021-05-06', 200, 11, 29990000, "Với hiệu năng ấn tượng, kết nối không dây siêu nhanh và trải nghiệm Apple Pencil thế hệ mới. Cùng với các tính năng mới mạnh mẽ cho hiệu suất công việc và cộng tác ở iPadOS 16. iPad Pro đem đến trải nghiệm iPad cực đỉnh.", 'silver', '/images/ipad/prom1/prom1_11_cellular'),
('IPADPROM1_12.9', 'iPad Pro M1 12.9 inch WiFi 256GB', '2021-05-07', 150, 0, 29990000, "Với hiệu năng ấn tượng, kết nối không dây siêu nhanh và trải nghiệm Apple Pencil thế hệ mới. Cùng với các tính năng mới mạnh mẽ cho hiệu suất công việc và cộng tác ở iPadOS 16. iPad Pro đem đến trải nghiệm iPad cực đỉnh.", 'silver', '/images/ipad/prom1/prom1_12.9'),
('IPADPROM1_12.9_C', 'iPad Pro M1 12.9 inch WiFi + Cellular 256GB', '2021-05-08', 100, 3, 33990000, "Với hiệu năng ấn tượng, kết nối không dây siêu nhanh và trải nghiệm Apple Pencil thế hệ mới. Cùng với các tính năng mới mạnh mẽ cho hiệu suất công việc và cộng tác ở iPadOS 16. iPad Pro đem đến trải nghiệm iPad cực đỉnh.", 'silver,grey', '/images/ipad/prom1/prom1_12.9_cellular'),
('IPADPROM2_11', 'iPad Pro M2 11 inch WiFi 256GB', '2022-05-05', 250, 44, 28990000, "Với hiệu năng ấn tượng, kết nối không dây siêu nhanh và trải nghiệm Apple Pencil thế hệ mới. Cùng với các tính năng mới mạnh mẽ cho hiệu suất công việc và cộng tác ở iPadOS 16. iPad Pro đem đến trải nghiệm iPad cực đỉnh.", 'silver,grey', '/images/ipad/prom2/prom2_11'),
('IPADPROM2_12.9', 'iPad Pro M2 12.9 inch WiFi 256GB', '2022-05-07', 150, 2, 34990000, "Với hiệu năng ấn tượng, kết nối không dây siêu nhanh và trải nghiệm Apple Pencil thế hệ mới. Cùng với các tính năng mới mạnh mẽ cho hiệu suất công việc và cộng tác ở iPadOS 16. iPad Pro đem đến trải nghiệm iPad cực đỉnh.", 'silver,grey', '/images/ipad/prom2/prom2_12.9'),
('IPADPROM2_12.9_C', 'iPad Pro M2 12.9 inch WiFi + Cellular 256GB', '2022-05-08', 100, 1, 38990000, "Với hiệu năng ấn tượng, kết nối không dây siêu nhanh và trải nghiệm Apple Pencil thế hệ mới. Cùng với các tính năng mới mạnh mẽ cho hiệu suất công việc và cộng tác ở iPadOS 16. iPad Pro đem đến trải nghiệm iPad cực đỉnh.", 'silver,grey', '/images/ipad/prom2/prom2_12.9_cellular'),
-- Watch
('WATCHSE_40MM', 'Apple Watch SE 40mm', '2022-07-06', 300, 10, 8990000, "Chiếc Apple Watch ngầu và giàu năng lực nhất từ trước đến nay, được thiết kế cho các hoạt động khám phá, phiêu lưu, và rèn luyện sức bền. Với vỏ titan hàng không chuyên dụng 49mm, thời lượng pin siêu dài, các ứng dụng chuyên biệt phối hợp với các cảm biến tối tân, và nút Tác Vụ tùy chỉnh mới.", 'white,black,lightgrey', '/images/watch/watch_se_40mm'),
('WATCHSE_44MM', 'Apple Watch SE 44mm', '2022-07-07', 250, 17, 9990000, "Chiếc Apple Watch ngầu và giàu năng lực nhất từ trước đến nay, được thiết kế cho các hoạt động khám phá, phiêu lưu, và rèn luyện sức bền. Với vỏ titan hàng không chuyên dụng 49mm, thời lượng pin siêu dài, các ứng dụng chuyên biệt phối hợp với các cảm biến tối tân, và nút Tác Vụ tùy chỉnh mới.", 'white,black,lightgrey', '/images/watch/watch_se_44mm'),
('WATCH_ULTRA_A', 'Apple Watch Ultra 49mm Alpine Loop', '2022-09-08', 350, 20, 23990000, "Chiếc Apple Watch ngầu và giàu năng lực nhất từ trước đến nay, được thiết kế cho các hoạt động khám phá, phiêu lưu, và rèn luyện sức bền. Với vỏ titan hàng không chuyên dụng 49mm, thời lượng pin siêu dài, các ứng dụng chuyên biệt phối hợp với các cảm biến tối tân, và nút Tác Vụ tùy chỉnh mới.", 'black,orange,white', '/images/watch/watch_ultra_alpineloop'),
('WATCH_ULTRA_O', 'Apple Watch Ultra 49mm Ocean Band', '2022-09-08', 350, 21, 23990000, "Chiếc Apple Watch ngầu và giàu năng lực nhất từ trước đến nay, được thiết kế cho các hoạt động khám phá, phiêu lưu, và rèn luyện sức bền. Với vỏ titan hàng không chuyên dụng 49mm, thời lượng pin siêu dài, các ứng dụng chuyên biệt phối hợp với các cảm biến tối tân, và nút Tác Vụ tùy chỉnh mới.", 'black,white', '/images/watch/watch_ultra_oceanband'),

-- Sound
('AIRPODPRO', 'AirPods Pro', '2020-01-01', 100, 10, 6990000, "AirPod Pro's description.", 'white', '/images/sound/airpod/airpod_pro'),
('AIRPODMAX', 'AirPods Max', '2020-09-01', 100, 9, 12990000, "AirPod Max's description", 'red', '/images/sound/airpod/airpod_max'),
('AIRPOD3_LIGHTNING', 'AirPods 3 Lightning','2020-03-01', 50, 1, 4490000, "AirPod 3 Lighning's description", 'white', '/images/sound/airpod/airpod_3_lightning'),
('AIRPOD3_TYPEC', 'AirPods 3 Type-C','2020-01-01', 50, 2, 4690000, "AirPod 3 Type-C's description", 'white', '/images/sound/airpod/airpod_3_typec'),
('AIRPOD2', 'AirPods 2','2021-01-01', 60, 4, 2790000, "AirPod 2's description", 'white', '/images/sound/airpod/airpod_2'),
('EARPOD_3.5', 'EarPods 3.5mm','2021-02-01', 70, 11, 490000, "EarPod 3.5mm's description", 'white', '/images/sound/earpod/earpod_3.5mm'),
('EARPOD_LIGHTNING', 'EarPods Lightning','2021-03-01', 80, 13, 990000, "EarPod Lightning description", 'white', '/images/sound/earpod/earpod_lightning'),
-- Accessory
('CHARGER_TYPEC_35', 'Củ sạc Type-C 35W','2020-08-01', 200, 10, 1490000, "Củ sạc Type-C's description", 'white', '/images/accessory/charger/charger_typec_35w'),
('CHARGER_TYPEC_20', 'Củ sạc Type-C 20W','2020-08-01', 180, 7, 1190000, "Củ sạc Type-C's description", 'white', '/images/accessory/charger/charger_typec_20w'),
('CHARGER_TYPEC_96', 'Củ sạc Type-C 96W','2020-08-01', 150, 9, 2790000, "Củ sạc Type-C's description", 'white', '/images/accessory/charger/charger_typec_96w'),
('CHARGER_MAGSAFE_85', 'Củ sạc MagSafe 85W','2020-01-01', 300, 21, 3790000, "Củ sạc MagSafe's description", 'white', '/images/accessory/charger/charger_magsafe_85w'),
('CHARGER_MAGSAFE_DUO', 'Bộ sạc MagSafe Duo', '2020-02-01', 200, 6, 3990000, "MagSafe Duo's description", 'white', '/images/accessory/charger/charger_magsafe_duo'),
('WIRE_CTOLIGHTNING_1M', 'Cáp sạc Type-C to Lightning (1m)','2020-11-20', 300, 11, 390000, "Cáp sạc's description", 'white', '/images/accessory/wire/wire_ctolightning_1m'),
('WIRE_CTOLIGHTNING_2M', 'Cáp sạc Type-C to Lightning (2m)','2020-11-20', 200, 12, 590000, "Cáp sạc's description", 'white', '/images/accessory/wire/wire_ctolightning_2m'),
('WIRE_TYPEC_1M', 'Cáp sạc Type-C to Type-C (1m)','2020-01-01', 250, 27, 390000, "Cáp sạc's description", 'white', '/images/accessory/wire/wire_typec_1m'),
('WIRE_USBTOLIGHTNING_2M', 'Cáp sạc USB to Lightning (2m)','2020-01-01', 200, 22, 590000, "Cáp sạc's description", 'white', '/images/accessory/wire/wire_usbtolightning_2m'),
('WIRE_MAGSAFE', 'Cáp sạc không dây MagSafe','2022-04-01', 190, 19, 1190000, "Cáp sạc's description", 'white', '/images/accessory/wire/wire_magsafe_iphone'),
('BATTERY_MAGSAFE', 'Sạc dự phòng MagSafe cho iPhone','2022-01-05', 250, 0, 3790000, "Sạc dự phòng's description", 'white', '/images/accessory/battery/battery_magsafe'),
('AIRTAG', 'AirTag', '2021-06-06', 500, 30, 790000, "AirTag's description", 'white', '/images/accessory/airtag/airtag'),
('CASE_LEATHER', 'Ốp lưng da MagSafe cho iPhone', '2020-03-03', 200, 0, 1790000, "Ốp lưng da's description", 'black,brown', '/images/accessory/case/case_leather'),
('CASE_SILICONE', 'Ốp lưng silicone MagSafe cho iPhone', '2020-03-04', 250, 37, 1590000, "Ốp lưng silicone's description", 'lightblue,blue', '/images/accessory/case/case_silicone');

--
-- Table structure for table `iPhone`
--
CREATE TABLE iPhone (
  id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  classify VARCHAR(20),
  version VARCHAR(20),
  capacity CHAR(5), 
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES product (id) 
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `iPhone` (`id`, `classify`, `version`, `capacity`) VALUES
('IPHONE14_128', 'iphone14', '', '128GB'),
('IPHONE14_256', 'iphone14', '', '256GB'),
('IPHONE14_512', 'iphone14', '', '512GB'),
('IPHONE14PLUS_128', 'iphone14', 'plus', '128GB'),
('IPHONE14PLUS_256', 'iphone14', 'plus', '256GB'),
('IPHONE14PLUS_512', 'iphone14', 'plus', '512GB'),
('IPHONE14PRO_256', 'iphone14', 'pro', '256GB'),
('IPHONE14PRO_512', 'iphone14', 'pro', '512GB'),
('IPHONE14PROMAX_256', 'iphone14', 'pro-max', '256GB'),
('IPHONE14PROMAX_512', 'iphone14', 'pro-max', '512GB'),
('IPHONE13_128', 'iphone13', '', '128GB'),
('IPHONE13_256', 'iphone13', '', '256GB'),
('IPHONE13_512', 'iphone13', '', '512GB'),
('IPHONE13PRO_512', 'iphone13', 'pro', '512GB'),
('IPHONE13PRO_1024', 'iphone13', 'pro', '1TB'),
('IPHONE13PROMAX_512', 'iphone13', 'pro-max', '512GB'),
('IPHONE12_64', 'iphone12', '', '64GB'),
('IPHONE12_128', 'iphone12', '', '128GB'),
('IPHONE12_256', 'iphone12', '', '256GB');



--
-- Table structure for table `Mac`
--
CREATE TABLE mac (
  id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  classify VARCHAR(20),
  capacity VARCHAR(20), 
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES product (id) 
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `mac` (`id`, `classify`, `capacity`) VALUES
('MACPROM1_13', 'pro', 'RAM 16GB - SSD 512GB'),
('MACPROM1_14', 'pro', 'RAM 16GB - SSD 512GB'),
('MACPROM1_16', 'pro', 'RAM 16GB - SSD 512GB'),
('MACPROM2_13', 'pro', 'RAM 16GB - SSD 512GB'),
('MACAIRM1', 'air', 'RAM 16GB - SSD 512GB'),
('MACAIRM2', 'air', 'RAM 16GB - SSD 512GB'),
('IMAC', 'imac', 'RAM 8GB - SSD 256GB');
--
-- Table structure for table `iPad`
--
CREATE TABLE iPad (
  id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  classify VARCHAR(20),
  capacity CHAR(5), 
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES product (id) 
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `iPad` (`id`, `classify`, `capacity`) VALUES
('IPADAIR5', 'air', '256GB'),
('IPADAIR5_C', 'air', '256GB'),
('IPADMINI6', 'mini', '256GB'),
('IPADMINI6_C', 'mini', '256GB'),
('IPADPROM1_11', 'pro-m1', '256GB'),
('IPADPROM1_11_C', 'pro-m1', '256GB'),
('IPADPROM1_12.9', 'pro-m1', '256GB'),
('IPADPROM1_12.9_C', 'pro-m1', '256GB'),
('IPADPROM2_11', 'pro-m2', '256GB'),
('IPADPROM2_12.9', 'pro-m2', '256GB'),
('IPADPROM2_12.9_C', 'pro-m2', '256GB');
--
-- Table structure for table `watch`
--
CREATE TABLE watch (
  id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  classify VARCHAR(20),
  diameter CHAR(4), 
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES product (id) 
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `watch` (`id`, `classify`, `diameter`) VALUES
('WATCHSE_40MM', 'se', '40mm'),
('WATCHSE_44MM', 'se', '44mm'),
('WATCH_ULTRA_A', 'ultra', '49mm'),
('WATCH_ULTRA_O', 'ultra', '49mm');
--
-- Table structure for table `sound`
--
CREATE TABLE sound (
  id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  classify VARCHAR(20),
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES product (id) 
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `sound` (`id`, `classify`) VALUES
('AIRPODPRO', 'airpod'),
('AIRPODMAX', 'airpod'),
('AIRPOD3_LIGHTNING', 'airpod'),
('AIRPOD3_TYPEC', 'airpod'),
('AIRPOD2', 'airpod'),
('EARPOD_3.5', 'earpod'),
('EARPOD_LIGHTNING', 'earpod');
--
-- Table structure for table `accessory`
--
CREATE TABLE accessory (
  id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  classify VARCHAR(20),
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES product (id) 
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `accessory` (`id`, `classify`) VALUES
('CHARGER_TYPEC_35', 'charger'),
('CHARGER_TYPEC_20', 'charger'),
('CHARGER_TYPEC_96', 'charger'),
('CHARGER_MAGSAFE_85', 'charger'),
('CHARGER_MAGSAFE_DUO', 'charger'),
('WIRE_CTOLIGHTNING_1M', 'wire'),
('WIRE_CTOLIGHTNING_2M', 'wire'),
('WIRE_TYPEC_1M', 'wire'),
('WIRE_USBTOLIGHTNING_2M', 'wire'),
('WIRE_MAGSAFE', 'wire'),
('BATTERY_MAGSAFE', 'battery'),
('AIRTAG', 'airtag'),
('CASE_LEATHER', 'case'),
('CASE_SILICONE', 'case');
--
-- Table structure for table `orders`
--
CREATE TABLE orders (
  orderId INT NOT NULL AUTO_INCREMENT,
  customerId INT NOT NULL,
  address text,
  mail text,
  note text,
  PRIMARY KEY (orderId, customerId),
  FOREIGN KEY (customerId) REFERENCES user (id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `orders_products`
--
CREATE TABLE order_product (
  orderId INT NOT NULL,
  customerId INT NOT NULL,
  productId VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  PRIMARY KEY (orderId, customerId, productId),
  FOREIGN KEY (orderId) REFERENCES orders (orderId)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (customerId) REFERENCES user (id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (productId) REFERENCES product (id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `cart`
--
CREATE TABLE cart (
  customerId VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  productId VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  PRIMARY KEY (productId),
  FOREIGN KEY (customerId) REFERENCES user (username)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (productId) REFERENCES product (id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `review`
--
CREATE TABLE review (
  customerId INT NOT NULL,
  productId VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  comment text,
  rate int DEFAULT 5,
  PRIMARY KEY (customerId, productId),
  FOREIGN KEY (customerId) REFERENCES user (id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (productId) REFERENCES product (id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


COMMIT;