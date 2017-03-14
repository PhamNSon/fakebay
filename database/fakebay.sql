/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : fakebay

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2017-03-14 11:12:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bids
-- ----------------------------
DROP TABLE IF EXISTS `bids`;
CREATE TABLE `bids` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `bid_price` float(10,2) NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '1 - Win; 2 - Lost; 3 - Still Bidding; \r\n4 - Done',
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bids
-- ----------------------------
INSERT INTO `bids` VALUES ('1', '3', '2', '4.00', '3', '2017-03-14 02:37:26', '2017-03-14 02:37:26');
INSERT INTO `bids` VALUES ('2', '1', '2', '5.00', '3', '2017-03-14 03:04:09', '2017-03-14 03:04:09');

-- ----------------------------
-- Table structure for bidstatus
-- ----------------------------
DROP TABLE IF EXISTS `bidstatus`;
CREATE TABLE `bidstatus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_status` tinyint(2) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bidstatus
-- ----------------------------
INSERT INTO `bidstatus` VALUES ('1', '1', 'Win');
INSERT INTO `bidstatus` VALUES ('2', '2', 'Lost');
INSERT INTO `bidstatus` VALUES ('3', '3', 'Bidding');
INSERT INTO `bidstatus` VALUES ('4', '4', 'Done');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Fashion', 'Fashion define the style of who you are, where you come from and your personality. So choose the best things for you!', '2017-03-07 16:55:56', '2017-03-07 16:55:56');
INSERT INTO `categories` VALUES ('2', 'Houseware', 'Times change, life slowly change, too. Electronics effect greatly to the daily life. So choose the best things for your house!', '2017-03-07 16:58:48', '2017-03-07 16:58:48');
INSERT INTO `categories` VALUES ('3', 'Sportware', '\r\nSports are the kinds of physical activity and entertaining games that bringing joyful and excitement to the participants. So choose the best things to support you', '2017-03-07 16:59:35', '2017-03-07 16:59:35');
INSERT INTO `categories` VALUES ('4', 'Mobile Phone', '\r\nPhone is indispensable in the daily life of everyone. So choose the best things for you', '2017-03-07 17:00:06', '2017-03-07 17:00:06');
INSERT INTO `categories` VALUES ('5', 'Computer', 'Computers are indispensable in the daily life of everyone. So choose the best things for you', '2017-03-07 17:00:18', '2017-03-07 17:00:18');

-- ----------------------------
-- Table structure for infors
-- ----------------------------
DROP TABLE IF EXISTS `infors`;
CREATE TABLE `infors` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `info` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of infors
-- ----------------------------
INSERT INTO `infors` VALUES ('1', 'Hello World');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `image_url` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desciption` text NOT NULL,
  `base_price` float(10,2) NOT NULL,
  `bid_end` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '1', '2', '321056-combo-4-doi-vo-co-trung-the-thao.jpg', 'Combo 4 Đôi Vớ Cổ Trung Thể Thao', 'Combo 4 Đôi Vớ Cổ Trung Thể Thao - Màu Sắc Trẻ Trung - Chất Liệu Thun Cotton Co Giãn, Thông Thoáng - Giúp Bạn Thoải Mái, Dễ Chịu Khi Chơi Thể Thao, Khi Vận Động Nhiều.\r\nĐiểm nổi bật\r\n- Combo 4 đôi vớ cổ trung thể thao thiết kế năng động, thời trang.\r\n- Màu sắc trẻ trung, nam tính.\r\n- Chất liệu thun cotton co giãn, thông thoáng.\r\n- Giúp bạn luôn thoải mái, dễ chịu khi chơi thể thao hay khi vận động nhiều.', '3.20', '2017-03-15 08:55:14', null, '2017-03-14 01:57:38', '2017-03-14 01:57:38');
INSERT INTO `products` VALUES ('2', '1', '2', '321075-combo-4-doi-vo-chu-t-vien-co-cao-cap.jpg', 'Combo 4 Đôi Vớ Chữ T Viền Cổ Cao Cấp', 'Combo 4 Đôi Vớ Chữ T Viền Cổ Cao Cấp - Chất Liệu Mềm Mại, Co Giãn Tốt, Thông Thoáng - Mang Lại Cảm Giác Êm Ái, Dễ Chịu Cho Đôi Chân.\r\nĐiểm nổi bật :\r\n- Combo 4 đôi vớ chữ T viền cổ cao cấp giúp bảo vệ đôi bàn chân của bạn khi phải mang giày nhiều giờ liền đồng thời giữ ấm rất hiệu quả khi gặp thời tiết lạnh.\r\n- Chất liệu thun cotton co giãn tốt, độ mềm mịn cao, thấm hút tốt, tạo cảm giác êm ái, thoải mái, dễ chịu khi mang.\r\n- Màu sắc trung tín dễ dàng phối hợp với nhiều kiểu giày khác nhau.', '3.20', '2017-03-16 08:55:26', null, '2017-03-14 01:59:14', '2017-03-14 01:59:14');
INSERT INTO `products` VALUES ('3', '1', '2', '318283-that-lung-nam-thoi-trang-da-zeppa.jpg', 'Thắt Lưng Nam Thời Trang Da Zeppa', 'Thắt Lưng Nam Thời Trang Da Zeppa - Kiểu Dáng Trang Nhã, Lịch Lãm Đầy Nam Tính, Thể Hiện Đẳng Cấp Sành Điệu Của Các Chàng Trai. \r\nĐiểm nổi bật :\r\n- Thắt lưng nam thời trang da Zeppa được làm bằng chất liệu da tốt, bản to thể hiện phong cách mạnh mẽ, lịch lãm.\r\n- Khóa bằng inox chắc chắn, tinh tế, không bị trầy xước.\r\n- Có thể kết hợp với quần jeans, quần tây, kaki…\r\n- Thoải mái điều chỉnh kích cỡ theo size vòng 2.\r\n- Màu nâu, đen, cam sang trọng, thời trang.', '6.60', '2017-03-15 09:05:37', null, '2017-03-14 02:00:41', '2017-03-14 02:00:41');
INSERT INTO `products` VALUES ('4', '1', '2', '319997-giay-the-thao-nam-thoang-khi-thoi-trang.jpg', 'Giày Thể Thao Nam Thoáng Khí Thời Trang', 'Giày Thể Thao Nam Thoáng Khí Thời Trang - Thiết Kế Đơn Giản, Màu Sắc Nam Tính - Cho Phái Mạnh Thêm Trẻ Trung, Năng Động. \r\nĐiểm nổi bật :\r\n- Giày thể thao cho nam được thiết kế với mẫu mã thời trang, độ bền cao, và rất tiện lợi và thoải mái trong mọi hoạt động của bạn.\r\n- Đế bằng nhựa xẻ rãnh chống trơn rất tốt, không hề gây đau chân trong thời gian dài sử dụng.\r\n- Sản phẩm có thể giặt sạch, phơi khô sau khi sử dụng xong.\r\n- Với kiểu dáng khỏe khoắn, năng động đôi giầy này là sự lựa chọn hoàn hảo cho những hoạt động thể thao, ngoại khóa, du lịch…', '5.68', '2017-03-17 09:50:45', null, '2017-03-14 02:02:24', '2017-03-14 02:02:24');
INSERT INTO `products` VALUES ('5', '5', '1', '318716-chuot-choi-game-r8-1635-den.jpg', 'Chuột Chơi Game R8 1635 (Đen)', 'Chuột Chơi Game R8 1635 (Đen) - Kiểu Dáng Hầm Hố, Mạnh Mẽ, Thiết Kế Chuyên Dùng Cho Game Thủ. \r\nĐiểm nổi bật :\r\n- Chuột chơi game R8 1635 kiểu dáng hầm hố, mạnh mẽ, thiết kế chuyên dùng cho game thủ.\r\n- Chất liệu nhựa ABS sáng bóng, bền đẹp.\r\n- Led thay đổi tùy chỉnh theo DPI: màu đỏ, lam, tím.\r\n- Tốc độ DPI: 800/1200/1600/2400.\r\n- Dây dù cực bền kết nối cổng USB.', '7.40', '2017-03-15 09:45:31', null, '2017-03-14 02:09:23', '2017-03-14 02:09:23');
INSERT INTO `products` VALUES ('6', '5', '1', '279215-loa-microlab-m-113-2.1-am-thanh-song-dong-chan-that.jpg', 'Loa Microlab M-113/ 2.1', 'Khơi Nguồn Cảm Giác Thoải Mái Và Thú Vị Khi Nghe Nhạc Cùng Loa Microlab M-113/ 2.1 Âm Thanh Sống Động Chân Thật .\r\nĐiểm nổi bật :\r\n- Loa Microlab M-113/ 2.1 âm thanh sống động chân thật với thiết kế gọn gàng, gam màu đen sang trọng tính tế, phù hợp với mọi không gian.\r\n- Hệ thống âm thanh 2.1 với công suất 20W sẽ mang đến cho bạn những âm thanh hoàn hảo.\r\n- Âm thanh sống động, chân thật thỏa mãn việc xem phim và nghe ca nhạc.\r\n- Sử dụng các loại máy tính như: PC, Laptop..., các đầu DVD, CD, VCD.\r\n- Giúp bạn giải tỏa mọi căng thẳng, lo âu của cuộc sống sau một ngày làm việc mệt mỏi.', '30.36', '2017-03-17 14:50:27', null, '2017-03-14 02:11:01', '2017-03-14 02:11:01');
INSERT INTO `products` VALUES ('7', '5', '1', '311217-bo-ban-phim-va-chuot-game-foxxray-swift-fxr-ckm-01.jpg', 'Bộ Bàn Phím Và Chuột Game Foxxray Swift FXR-CKM-01', 'Bộ Bàn Phím Và Chuột Game Foxxray Swift FXR-CKM-01 - Thiết Kế Tối Ưu Cho Game Thủ - Kiểu Dáng Mạnh Mẽ, Cá Tính - Mang Đến Trải Nghiệm Chơi Game Cực Chất.\r\nĐiểm nổi bật :\r\n- Bộ bàn phím và chuột game Foxxray Swift FXR-CKM-01được làm từ chất liệu nhựa cao cấp, bền lâu và khả năng chống sốc khá tốt.\r\n- Vòng đời các phím lên đến 50 triệu lần và hỗ trợ chống xung đột lên đến 19 phím giúp bạn yên tâm hơn khi sử dụng.\r\n- Bàn phím sử dụng cổng kết nối USB 2.0 hoặc 3.0, phù hợp với tất cả các PC hay laptop, tiện lợi khi sử dụng.', '13.64', '2017-03-21 12:40:05', null, '2017-03-14 02:12:07', '2017-03-14 02:12:07');
INSERT INTO `products` VALUES ('8', '2', '3', '248955-am-dun-sieu-toc-comet-1.5l-cm8215.jpg', 'Ấm Đun Siêu Tốc Comet 1.5L', 'Ấm Đun Siêu Tốc Comet 1.5L – Kiểu Dáng Sang Trọng, Chất Liệu Cao Cấp, Bền Đẹp, Hoạt Động Với Công Suất Lớn, Đun Sôi Nước Nhanh Chóng, An Toàn Và Tiện Lợi. \r\nĐiểm nổi bật :\r\n- Ấm siêu tốc Comet có công suất 1500W giúp bạn tiết kiệm thời gian tối đa cho công việc đun nước phục vụ các nhu cầu thường ngày.\r\n- Chỉ cần vài thao tác đơn giản: đổ nước vào bình, đặt lên đế và bấm nút là ít phút sau bạn đã có được bình nước sôi mà mình mong muốn.\r\n- Ấm có chế độ tự động ngắt điện khi nước sôi, giúp tránh được tình trạng nước trào khỏi ấm. ', '6.38', '2017-03-15 13:45:22', null, '2017-03-14 02:14:24', '2017-03-14 02:14:24');
INSERT INTO `products` VALUES ('9', '2', '3', '321356-combo-2-hop-2-bo-muong-dua-inox-hoa-tiet-sang-trong.jpg', 'Combo 2 Hộp 2 Bộ Muỗng Đũa Inox', 'Combo 2 Hộp 2 Bộ Muỗng Đũa Inox Họa Tiết Sang Trọng - Thích Hợp Dùng Cho Dân Văn Phòng Hay Những Chuyến Du Lịch Xa.\r\nĐiểm nổi bật :\r\n- Combo gồm 2 bộ muỗng, đũa được làm từ chất liệu inox cao cấp, an toàn, gia tăng thời gian sử dụng lâu dài.\r\n- Phục vụ cho bữa ăn trở nên đầy đủ, tươm tất hơn.\r\n- Sản phẩm có kèm hộp, tiện dụng khi mang theo sử dụng.\r\n- Thích hợp dùng cho dân văn phòng hay những chuyến du lịch xa.', '2.16', '2017-03-16 13:25:29', null, '2017-03-14 02:15:18', '2017-03-14 02:15:18');

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) DEFAULT NULL,
  `from_user_id` int(10) DEFAULT NULL,
  `to_user_id` int(10) DEFAULT NULL,
  `message` text,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of question
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'phamson.jvb@gmail.com', '$2y$10$MXUkF3q3MmimuVkoiqP06u3gz2.xW.Y7bqSCnN2qhT/OCeWT3g7aK', '0', '2017-03-09 09:37:41', '2017-03-09 09:37:41');
INSERT INTO `users` VALUES ('2', 'John Cena', 'ps_saurangnhanh93@yahoo.com.vn', '$2y$10$ow4N9NJoe66tSpk7DbOUX.kaq051liBXrdHDobov.R/hW.zSyOLoG', '1', '2017-03-10 06:39:22', '2017-03-10 06:39:22');
INSERT INTO `users` VALUES ('3', 'James Thomas', 'vnzpopi@gmail.com', '$2y$10$52z81nkNiijiNF74WgWxse0NwET9.vTM9eQoZEdTx1rFP/v6ZkDnG', '1', '2017-03-10 08:39:46', '2017-03-10 08:39:46');
