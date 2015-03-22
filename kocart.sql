-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 22. Mrz 2015 um 23:03
-- Server Version: 5.1.73
-- PHP-Version: 5.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `koray`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `note`) VALUES
(1, 'demo', 'demo', 'demo', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `cargo`
--

INSERT INTO `cargo` (`id`, `name`, `price`, `status`) VALUES
(1, 'Flat Rate', 5, 1),
(2, 'Fast Cargo', 10, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`id`, `parent_id`, `rank`, `link`) VALUES
(2, 0, 2, 'category/2/desktops_all_in_ones.html'),
(3, 0, 3, 'category/3/category/3/category/3/category/3/category/3/category/3/category/3/category/3/category/3/category/3/category/3/category/3/category/3/category/3/category/3/computer_components_parts.html.html.html.html.html.html.html.html.html.html.html.html.html'),
(15, 0, 1, 'category/15/laptops_netbooks.html'),
(16, 0, 4, 'category/16/category/16/tabletebook.html.html'),
(17, 0, 6, 'category/17/category/17/drives_storage_blank_media.html.html'),
(18, 0, 5, 'category/18/category/18/software.html.html'),
(19, 18, 0, 'category/19/mac_os.html'),
(20, 18, 0, 'category/20/windows.html'),
(21, 16, 0, 'category/21/apple_tablets.html'),
(22, 16, 0, 'category/22/android_tablets.html'),
(23, 15, 0, 'category/23/acer_laptops.html'),
(24, 15, 0, 'category/24/samsung_laptops.html'),
(25, 15, 0, 'category/25/hp_laptops.html');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category_description`
--

CREATE TABLE IF NOT EXISTS `category_description` (
  `ids` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  PRIMARY KEY (`ids`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=177 ;

--
-- Daten für Tabelle `category_description`
--

INSERT INTO `category_description` (`ids`, `category_id`, `language_id`, `category_name`, `description`, `meta_description`, `meta_keyword`) VALUES
(89, 15, 2, 'Laptops & Netbooks', 'Laptops & Netbooks', 'Laptops & Netbooks', 'Laptops & Netbooks'),
(90, 15, 1, 'Dizüstü Bilgisayarlar', 'Dizüstü Bilgisayarlar', 'Dizüstü Bilgisayarlar', 'Dizüstü Bilgisayarlar'),
(91, 2, 2, 'Desktops & All-In-Ones', 'Desktops & All-In-Ones', 'Desktops & All-In-Ones', 'Desktops & All-In-Ones'),
(92, 2, 1, 'Masaüstü Bilgisayalar', 'Masaüstü Bilgisayalar', 'Masaüstü Bilgisayalar', 'Masaüstü Bilgisayalar'),
(101, 19, 2, 'Mac OS', 'Mac OS', 'Mac OS', 'Mac OS'),
(102, 19, 1, 'Mac OS', 'Mac OS', 'Mac OS', 'Mac OS'),
(103, 20, 2, 'Windows', 'Windows', 'Windows', 'Windows'),
(104, 20, 1, 'Windows', 'Windows', 'Windows', 'Windows'),
(105, 21, 2, 'Apple Tablets', 'Apple Tablets', 'Apple Tablets', 'Apple Tablets'),
(106, 21, 1, 'Apple Tabletler', 'Apple Tabletler', 'Apple Tabletler', 'Apple Tabletler'),
(107, 22, 2, 'Android Tablets', 'Android Tablets', 'Android Tablets', 'Android Tablets'),
(108, 22, 1, 'Android Tabletler', 'Android Tabletler', 'Android Tabletler', 'Android Tabletler'),
(109, 23, 2, 'Acer Laptops', 'Acer Laptops', 'Acer Laptops', 'Acer Laptops'),
(110, 23, 1, 'Acer Dizüstüler', 'Acer Dizüstüler', 'Acer Dizüstüler', 'Acer Dizüstüler'),
(111, 24, 2, 'Samsung Laptops', 'Samsung Laptops', 'Samsung Laptops', 'Samsung Laptops'),
(112, 24, 1, 'Samsung Dizüstüler', 'Samsung Dizüstüler', 'Samsung Dizüstüler', 'Samsung Dizüstüler'),
(113, 25, 2, 'Hp Laptops', 'Hp Laptops', 'Hp Laptops', 'Hp Laptops'),
(114, 25, 1, 'Hp Dizüstüler', 'Hp Dizüstüler', 'Hp Dizüstüler', 'Hp Dizüstüler'),
(115, 16, 2, 'Tablet/eBook ', 'Tablet/eBook ', 'Tablet/eBook ', 'Tablet/eBook '),
(116, 16, 1, 'Tablet Bilgisayar/e-Kitaplar', 'Tablet Bilgisayar/e-Kitaplar', 'Tablet Bilgisayar/e-Kitaplar', 'Tablet Bilgisayar/e-Kitaplar'),
(117, 18, 2, 'Software', 'Software', 'Software', 'Software'),
(118, 18, 1, 'Yazilim', 'Yazilim', 'Yazilim', 'Yazilim'),
(119, 17, 2, 'Drives, Storage & Blank Media', 'Drives, Storage & Blank Media', 'Drives, Storage & Blank Media', 'Drives, Storage & Blank Media'),
(120, 17, 1, 'Sürücüler, Depolama ve Boş Medya', 'Sürücüler, Depolama ve Boş Medya', 'Sürücüler, Depolama ve Boş Medya', 'Sürücüler, Depolama ve Boş Medya'),
(175, 3, 2, 'Computer Components & Parts', 'Computer Components & Parts', 'Computer Components & Parts', 'Computer Components & Parts'),
(176, 3, 1, 'Bilgisayar Parcalari', 'Bilgisayar Parcalari', 'Bilgisayar Parcalari', 'Bilgisayar Parcalari');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category_path`
--

CREATE TABLE IF NOT EXISTS `category_path` (
  `category_id` int(11) NOT NULL,
  `path_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`path_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `category_path`
--

INSERT INTO `category_path` (`category_id`, `path_id`, `level`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(15, 15, 0),
(16, 16, 0),
(17, 17, 0),
(18, 18, 0),
(19, 18, 0),
(19, 19, 1),
(20, 18, 0),
(20, 20, 1),
(21, 16, 0),
(21, 21, 1),
(22, 16, 0),
(22, 22, 1),
(23, 15, 0),
(23, 23, 1),
(24, 15, 0),
(24, 24, 1),
(25, 15, 0),
(25, 25, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `currency` float NOT NULL,
  `code` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `standart` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `currency`
--

INSERT INTO `currency` (`id`, `name`, `currency`, `code`, `symbol`, `standart`) VALUES
(1, 'TL', 1, 'TL', '₺', 1),
(2, 'Euro', 0.353, 'EUR', '€', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `extension`
--

CREATE TABLE IF NOT EXISTS `extension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `loadpage` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `extension`
--

INSERT INTO `extension` (`id`, `name`, `type`, `loadpage`) VALUES
(1, 'Paypal', 'payment', 'paypal'),
(2, 'Bank Transfer / EFT', 'payment', 'banktransfer');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `default` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `language`
--

INSERT INTO `language` (`id`, `language_name`, `file_name`, `flag`, `code`, `default`) VALUES
(1, 'Türkce', 'turkish', 'http://www.sanmak.com.tr/img/trFlagBig.png', 'tr', ''),
(2, 'English', 'english', 'http://www.sanmak.com.tr/img/enFlagBig.png', 'en', '1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Daten für Tabelle `modules`
--

INSERT INTO `modules` (`id`, `name`, `details`, `type`, `product_id`, `rank`) VALUES
(1, 'Slider', '', 'slide', 1, 1),
(2, 'Slider', '', 'slide', 2, 2),
(3, 'Most Sell Products', '', 'sell', 3, 2),
(4, 'Most Sell Products', '', 'sell', 4, 1),
(5, 'Populer Products', '', 'popular', 5, 1),
(6, 'Populer Products', '', 'popular', 6, 2),
(16, 'Slider', '', 'slide', 5, 3),
(17, 'Most Sell Products', '', 'sell', 7, 3),
(18, 'Populer Products', '', 'popular', 2, 3),
(21, 'Most Sell Products', '', 'sell', 0, 0),
(22, 'Slider', '', 'slide', 0, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_type` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `option`
--

INSERT INTO `option` (`id`, `option_type`, `rank`) VALUES
(1, 'selectbox', 1),
(2, 'checkbox', 2),
(3, 'radio', 3),
(4, 'textarea', 6),
(5, 'date', 5),
(6, 'file', 4),
(7, 'input', 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `option_description`
--

CREATE TABLE IF NOT EXISTS `option_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Daten für Tabelle `option_description`
--

INSERT INTO `option_description` (`id`, `option_id`, `language_id`, `option_name`) VALUES
(18, 2, 1, 'Boyut'),
(17, 2, 2, 'Size'),
(13, 1, 2, 'Color'),
(14, 1, 1, 'Renk'),
(15, 2, 2, 'Gift'),
(16, 2, 1, 'Hediye');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `option_value`
--

CREATE TABLE IF NOT EXISTS `option_value` (
  `option_value_row_id` int(11) NOT NULL AUTO_INCREMENT,
  `option_value_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `value_name` varchar(255) NOT NULL,
  PRIMARY KEY (`option_value_row_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Daten für Tabelle `option_value`
--

INSERT INTO `option_value` (`option_value_row_id`, `option_value_id`, `option_id`, `language_id`, `value_name`) VALUES
(28, 27, 15, 1, 'Anahtarlik'),
(27, 27, 15, 2, 'Keychain'),
(26, 25, 15, 1, 'Çakmak'),
(25, 25, 15, 2, 'Lighter'),
(24, 23, 13, 1, 'Turuncu'),
(23, 23, 13, 2, 'Orange'),
(22, 21, 13, 1, 'Beyaz'),
(21, 21, 13, 2, 'Wheit'),
(18, 17, 13, 1, 'Kirmizi'),
(17, 17, 13, 2, 'Red'),
(19, 19, 13, 2, 'Black'),
(20, 19, 13, 1, 'Siyah'),
(29, 29, 17, 2, 'Large'),
(30, 29, 17, 1, 'Büyük'),
(31, 31, 17, 2, 'Small'),
(32, 31, 17, 1, 'Kücük'),
(33, 33, 17, 2, 'Middle'),
(34, 33, 17, 1, 'Orta');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `billing_first_name` varchar(255) NOT NULL,
  `billing_email` varchar(255) NOT NULL,
  `billing_telephone` varchar(255) NOT NULL,
  `billing_address1` varchar(255) NOT NULL,
  `billing_address2` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_postcode` int(11) NOT NULL,
  `billing_country` varchar(255) NOT NULL,
  `billing_region` varchar(255) NOT NULL,
  `billing_company` varchar(255) NOT NULL,
  `billing_companyid` varchar(255) NOT NULL,
  `cargo_first_name` varchar(255) NOT NULL,
  `cargo_email` varchar(255) NOT NULL,
  `cargo_telephone` varchar(255) NOT NULL,
  `cargo_address1` varchar(255) NOT NULL,
  `cargo_address2` varchar(255) NOT NULL,
  `cargo_city` varchar(255) NOT NULL,
  `cargo_postcode` int(11) NOT NULL,
  `cargo_country` varchar(255) NOT NULL,
  `cargo_region` varchar(255) NOT NULL,
  `cargo_type` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `comment` text NOT NULL,
  `total` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Daten für Tabelle `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `billing_first_name`, `billing_email`, `billing_telephone`, `billing_address1`, `billing_address2`, `billing_city`, `billing_postcode`, `billing_country`, `billing_region`, `billing_company`, `billing_companyid`, `cargo_first_name`, `cargo_email`, `cargo_telephone`, `cargo_address1`, `cargo_address2`, `cargo_city`, `cargo_postcode`, `cargo_country`, `cargo_region`, `cargo_type`, `payment_type`, `status`, `comment`, `total`, `ip`, `date`) VALUES
(33, 0, 'test', 'test@test.com', 'test', 'test', '', 'test', 0, 'test', 'test', 'test', 'test', 'test', 'test@test.com', 'test', 'test', '', 'test', 0, 'test', 'test', 2, 2, 1, '', '2731', '78.43.43.36', '2015-03-19 23:42:37');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `options` varchar(255) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Daten für Tabelle `order_detail`
--

INSERT INTO `order_detail` (`oid`, `order_id`, `product_id`, `count`, `options`) VALUES
(25, 33, 4, 1, '36'),
(26, 33, 4, 1, '39,40');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `page`
--

INSERT INTO `page` (`id`, `page_name`) VALUES
(1, 'Deneme');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `page_description`
--

CREATE TABLE IF NOT EXISTS `page_description` (
  `page_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `meta_tags` text NOT NULL,
  `meta_keys` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `page_description`
--

INSERT INTO `page_description` (`page_id`, `language_id`, `name`, `details`, `meta_tags`, `meta_keys`) VALUES
(1, 1, 'Deneme Sayfa', 'Deneme sayfa icerik alani...', 'Deneme sayfa icerik alani...', 'Deneme sayfa icerik alani...'),
(1, 2, 'Test Page', 'Test Page detail is here..', 'Test Page detail is here..', 'Test Page detail is here..');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`id`, `category_id`, `price`, `stock`, `image`, `url`, `rank`) VALUES
(1, '15', 1500, 15, 'http://www.jolyjokerz.com/upload/files/images/20270206_r1.png', 'product/1/test_slider_product_1.html', 0),
(2, '2', 1300, 55, 'http://core0.staticworld.net/images/article/2012/12/samsung_galaxy_s_iii_1182355_g5-original-100015856-large.jpeg', 'product/2/slider-urun2.html', 2),
(3, '3', 111, 1, 'http://www.jolyjokerz.com/upload/files/images/20270206_r1.png', 'product/3/most-sell-product.html', 0),
(4, '2', 1321, 22, 'http://www.jolyjokerz.com/upload/files/images/20270206_r1.png', 'product/4/most-sell-product2.html', 0),
(5, '3', 123, 2, 'http://www.jolyjokerz.com/upload/files/images/model01Detail.png', 'product/5/most-popular-product1.html', 0),
(6, '3', 532, 123, 'http://www.jolyjokerz.com/upload/files/images/model01Detail.png', 'product/6/most-popular-product2.html', 0),
(7, '3', 22, 1, 'http://www.jolyjokerz.com/upload/files/images/20270206_r1.png', 'product/7/test.html', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_description`
--

CREATE TABLE IF NOT EXISTS `product_description` (
  `description_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `meta_tags` text NOT NULL,
  `meta_keys` text NOT NULL,
  PRIMARY KEY (`description_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=117 ;

--
-- Daten für Tabelle `product_description`
--

INSERT INTO `product_description` (`description_id`, `product_id`, `language_id`, `name`, `details`, `meta_tags`, `meta_keys`) VALUES
(45, 2, 1, 'Deneme Slayt Urunu2', 'Türkçe Lorem Ipsum, tasarım yaparken "burada metin olacak" şeklinde yinelemeler yerine Türkçe''ye benzer şekilde anlamsız yazılar, lorem ipsum dolar sit amet, lorem ipsut text üretir. Böylece dikkatler tasarım üzerinde yoğunlaşmış olur, tasarım doğal görünür. ', 'urun, 2,', 'urun, 2,'),
(46, 2, 2, 'Test Slider Product 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'product, 2,', 'product, 2'),
(81, 3, 2, 'Test Most Sell Product 1', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'product, 3,', 'product, 3'),
(82, 3, 1, 'Cok Satilan Urun 1', '<p>T&uuml;rk&ccedil;e Lorem Ipsum, tasarım yaparken "burada metin olacak" şeklinde yinelemeler yerine T&uuml;rk&ccedil;e''ye benzer şekilde anlamsız yazılar, lorem ipsum dolar sit amet, lorem ipsut text &uuml;retir. B&ouml;ylece dikkatler tasarım &uuml;zerinde yoğunlaşmış olur, tasarım doğal g&ouml;r&uuml;n&uuml;r.</p>', 'urun, 3,', 'urun, 3,'),
(83, 4, 2, 'Test Most Sell Product 2', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'product, 4', 'product, 4'),
(84, 4, 1, 'Cok Satan Urun 2', '<p>T&uuml;rk&ccedil;e Lorem Ipsum, tasarım yaparken "burada metin olacak" şeklinde yinelemeler yerine T&uuml;rk&ccedil;e''ye benzer şekilde anlamsız yazılar, lorem ipsum dolar sit amet, lorem ipsut text &uuml;retir. B&ouml;ylece dikkatler tasarım &uuml;zerinde yoğunlaşmış olur, tasarım doğal g&ouml;r&uuml;n&uuml;r.</p>', 'urun, 4,', 'urun, 4,'),
(85, 5, 2, 'Popular Product 1', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '', ''),
(86, 5, 1, 'Populer Ürün 1', '<p>T&uuml;rk&ccedil;e Lorem Ipsum, tasarım yaparken "burada metin olacak" şeklinde yinelemeler yerine T&uuml;rk&ccedil;e''ye benzer şekilde anlamsız yazılar, lorem ipsum dolar sit amet, lorem ipsut text &uuml;retir. B&ouml;ylece dikkatler tasarım &uuml;zerinde yoğunlaşmış olur, tasarım doğal g&ouml;r&uuml;n&uuml;r.</p>', '', ''),
(87, 6, 2, 'Popular Product 2', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '', ''),
(88, 6, 1, 'Populer Ürün 2', '<p>T&uuml;rk&ccedil;e Lorem Ipsum, tasarım yaparken "burada metin olacak" şeklinde yinelemeler yerine T&uuml;rk&ccedil;e''ye benzer şekilde anlamsız yazılar, lorem ipsum dolar sit amet, lorem ipsut text &uuml;retir. B&ouml;ylece dikkatler tasarım &uuml;zerinde yoğunlaşmış olur, tasarım doğal g&ouml;r&uuml;n&uuml;r.</p>', 'deneme', ''),
(113, 7, 2, 'TEST', '<p><em>&nbsp;test description ist here,&nbsp;test description ist here,&nbsp;test description ist here,&nbsp;test description ist here,</em></p>\n', 'TEST', 'TEST'),
(114, 7, 1, 'TEST', '<div>\n<h4><em>&nbsp;test description ist here,&nbsp;test description ist here,&nbsp;test description ist here,&nbsp;test description ist here,</em></h4>\n</div>\n', 'test', 'TEST'),
(115, 1, 2, 'Test Slider Product 1', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', 'product, 1,', 'product, 1'),
(116, 1, 1, 'Deneme Slayt Urunu 1', '<p>T&uuml;rk&ccedil;e Lorem Ipsum, tasarım yaparken</p>\n', 'urun, 1,', 'urun, 1,');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_option`
--

CREATE TABLE IF NOT EXISTS `product_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Daten für Tabelle `product_option`
--

INSERT INTO `product_option` (`id`, `product_id`, `option_id`) VALUES
(19, 2, 3),
(18, 4, 2),
(17, 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_option_value`
--

CREATE TABLE IF NOT EXISTS `product_option_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `value_id` int(11) NOT NULL,
  `operation` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Daten für Tabelle `product_option_value`
--

INSERT INTO `product_option_value` (`id`, `product_id`, `value_id`, `operation`, `price`) VALUES
(36, 4, 29, '+', '66'),
(35, 1, 25, '+', '22'),
(33, 4, 23, '+', '11'),
(34, 1, 27, '+', '11'),
(32, 4, 19, '+', '55'),
(31, 4, 17, '+', '44'),
(30, 4, 21, '+', '33'),
(40, 4, 25, '+', '1'),
(39, 4, 27, '+', '22'),
(38, 4, 31, '+', '11'),
(37, 4, 33, '+', '22');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_tags` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `meta_tags`, `name`, `owner`, `address`, `email`, `telefon`, `logo`, `language`, `currency`) VALUES
(1, 'koCART', 'koCART Open Source PHP MVC E-Commerce System', 'koCART, Open Source, PHP E-Commerce, MVC E-Commerce System', 'koCART Demo Company', 'koCART ', 'Lörrach / Germany', 'info@jolyjokerz.com', '+90224333333', 'http://www.jolyjokerz.com/upload/files/images/logo.png', '2', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
