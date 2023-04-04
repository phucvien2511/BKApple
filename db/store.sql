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
-- Table structure for table `Admin`
--
CREATE TABLE admin (
  id VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL UNIQUE,
  name VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  idNumber CHAR(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL UNIQUE,
  address text,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `customer`
--
CREATE TABLE customer (
  id INT NOT NULL UNIQUE AUTO_INCREMENT,
  username CHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL UNIQUE,
  password CHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  name VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  birthDay DATE DEFAULT CURRENT_TIMESTAMP, 
  phone CHAR(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  gmail VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  address text,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `products`
--
CREATE TABLE product (
  id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  productName VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  releaseDate DATE DEFAULT CURRENT_TIMESTAMP, 
  quantity INT DEFAULT 0,
  sold INT DEFAULT 0,
  price INT DEFAULT 0,
  description text,
  color VARCHAR(30),
  thumbnail text,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `product` (`id`, `productName`, `releaseDate`, `quantity`, `sold`, `price`, `description`, `color`, `thumbnail`) VALUES
-- iPhone
('IPHONE14_64', 'iPhone 14', '2020-09-20', 90, 0, 20000000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.', 'silver', '/images/iphone/iphone14'),
('IPHONE14_128', 'iPhone 14', '2020-09-20', 100, 0, 20000000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.', 'gold,red', '/images/iphone/iphone14'),
('IPHONE14_256', 'iPhone 14', '2020-09-20', 100, 0, 21000000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.', 'black,silver', '/images/iphone/iphone14'),
('IPHONE14PLUS_128', 'iPhone 14 Plus', '2020-10-31', 150, 10, 23000000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'gold', '/images/iphone/iphone14'),
('IPHONE14PROMAX_256', 'iPhone 14 Pro Max', '2022-10-31', 150, 10, 25199000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'black', '/images/iphone/iphone14'),
('IPHONE14PROMAX_512', 'iPhone 14 Pro Max', '2022-10-31', 150, 10, 27099000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'black', '/images/iphone/iphone14'),
('IPHONE13PRO_512', 'iPhone 13 Pro', '2022-10-31', 150, 10, 27099000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'blue', '/images/iphone/iphone13'),
('IPHONE13PRO_1024', 'iPhone 13 Pro', '2022-10-31', 150, 10, 27099000, 'A-16 Bionic Chip.<br>Long-live battery up to 19 hours.<br>Retina Full HD big screen.', 'blue', '/images/iphone/iphone13'),
-- Mac
('MACPROM1', 'MacBook Pro M1', '2021-01-01', 50, 0, 19999000, "MacBook Pro M1's description", 'silver', '/images/mac/mac'),
('MACAIRM2', 'MacBook Air M2', '2021-01-01', 50, 0, 21999000, "MacBook Air M2's description", 'silver', '/images/mac/mac');

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
('IPHONE14_64', 'iphone14', '', '64GB'),
('IPHONE14_128', 'iphone14', '', '128GB'),
('IPHONE14_256', 'iphone14', '', '256GB'),
('IPHONE14PLUS_128', 'iphone14', 'plus', '128GB'),
('IPHONE14PROMAX_256', 'iphone14', 'pro max', '256GB'),
('IPHONE14PROMAX_512', 'iphone14', 'pro max', '512GB'),
('IPHONE13PRO_512', 'iphone13', 'pro', '512GB'),
('IPHONE13PRO_1024', 'iphone13', 'pro', '1TB');
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
('MACPROM1', 'pro m1', '256GB'),
('MACAIRM2', 'air m2', '512GB');
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

--
-- Table structure for table `audio`
--
CREATE TABLE audio (
  id VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  classify VARCHAR(20),
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES product (id) 
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

--
-- Table structure for table `orders`
--
CREATE TABLE orders (
  orderId INT NOT NULL AUTO_INCREMENT,
  customerId INT NOT NULL,
  address text,
  note text,
  PRIMARY KEY (orderId, customerId),
  FOREIGN KEY (customerId) REFERENCES customer (id)
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
  FOREIGN KEY (customerId) REFERENCES customer (id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (productId) REFERENCES product (id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `cart`
--
CREATE TABLE cart (
  customerId INT NOT NULL,
  productId VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  PRIMARY KEY (customerId, productId),
  FOREIGN KEY (customerId) REFERENCES customer (id)
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
  content text,
  rate int DEFAULT 5,
  PRIMARY KEY (customerId, productId),
  FOREIGN KEY (customerId) REFERENCES customer (id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (productId) REFERENCES product (id)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `repair`
--
CREATE TABLE repair (
  productId VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  productName VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (productId)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `repair_iPhone`
--
CREATE TABLE repair_iPhone (
  productId VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  component VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  price INT DEFAULT 0,
  PRIMARY KEY (productId, component),
  FOREIGN KEY (productId) REFERENCES repair (productId)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `repair_mac`
--
CREATE TABLE repair_mac (
  productId VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  component VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  price INT DEFAULT 0,
  PRIMARY KEY (productId, component),
  FOREIGN KEY (productId) REFERENCES repair (productId)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `repair_other`
--
CREATE TABLE repair_other (
  productId VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  classify VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  price INT DEFAULT 0,
  PRIMARY KEY (productId),
  FOREIGN KEY (productId) REFERENCES repair (productId)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

COMMIT;