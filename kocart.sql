-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 01. Jan 2015 um 23:48
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`id`, `parent_id`, `rank`, `link`) VALUES
(2, 0, 2, 'category/2/ikincimenu.html'),
(3, 0, 3, 'category/3/ucuncumenu.html'),
(15, 0, 1, 'category/15/birinci_menu.html');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Daten für Tabelle `category_description`
--

INSERT INTO `category_description` (`ids`, `category_id`, `language_id`, `category_name`, `description`, `meta_description`, `meta_keyword`) VALUES
(1, 3, 1, 'Ucuncumenu', '', '', ''),
(12, 2, 1, 'Ikincimenu', 'test', 'test', ''),
(41, 2, 2, 'Second Menu', '', '', ''),
(42, 3, 2, 'Third Menu', '', '', ''),
(85, 15, 1, 'Birinci Menu', 'Birinci', 'Birinci', 'Birinci'),
(86, 15, 2, 'First', 'First', 'First', 'First');

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
(15, 15, 0);

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
(1, 'Türkce', 'turkish', '', '', '1'),
(2, 'English', 'english', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

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
(16, 'Slider', '', 'slide', 5, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Daten für Tabelle `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `billing_first_name`, `billing_email`, `billing_telephone`, `billing_address1`, `billing_address2`, `billing_city`, `billing_postcode`, `billing_country`, `billing_region`, `billing_company`, `billing_companyid`, `cargo_first_name`, `cargo_email`, `cargo_telephone`, `cargo_address1`, `cargo_address2`, `cargo_city`, `cargo_postcode`, `cargo_country`, `cargo_region`, `cargo_type`, `payment_type`, `status`, `comment`, `total`, `ip`, `date`) VALUES
(26, 0, 'Test Customer 2', 'testcostumor@test.com', '+00902242442424', 'Örnek Mah. Örnek Sk. No:11', '', 'Bursa', 16340, 'Türkiye', '-', '', '300000000000', 'Test Customer 2', 'testcostumor@test.com', '+00902242442424', 'Örnek Mah. Örnek Sk. No:11', '', 'Bursa', 16340, 'Türkiye', '-', 1, 1, 1, '', '111', '78.43.43.76', '2014-12-14 19:54:46'),
(27, 0, 'Test Customer', 'testcostumor@test.com', '+00902242442424', 'Örnek Mah. Örnek Sk. No:11', '', 'Bursa', 16340, 'Türkiye', '-', '', '300000000000', 'Test Customer', 'testcostumor@test.com', '+00902242442424', 'Örnek Mah. Örnek Sk. No:11', '', 'Bursa', 16340, 'Türkiye', '-', 2, 1, 1, '', '1321', '78.43.43.76', '2014-12-14 23:20:28'),
(28, 0, 'Test Customer', 'testcostumor@test.com', '+00902242442424', 'Örnek Mah. Örnek Sk. No:11', '', 'Bursa', 16340, 'Türkiye', '-', 'aaaaaaaaaaaa', '300000000000', 'Test Customer', 'testcostumor@test.com', '+00902242442424', 'Örnek Mah. Örnek Sk. No:11', '', 'Bursa', 16340, 'Türkiye', '-', 2, 1, 1, '', '111', '78.43.43.98', '2014-12-18 23:35:02'),
(29, 0, 'Test Customer', 'testcostumor@test.com', '+00902242442424', 'Örnek Mah. Örnek Sk. No:11', '', 'Bursa', 16340, 'Türkiye', '-', 'aaaaaaaaaaaa', '300000000000', 'Test Customer', 'testcostumor@test.com', '+00902242442424', 'Örnek Mah. Örnek Sk. No:11', '', 'Bursa', 16340, 'Türkiye', '-', 1, 1, 1, '', '3963', '78.43.43.98', '2014-12-18 23:36:10');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Daten für Tabelle `order_detail`
--

INSERT INTO `order_detail` (`oid`, `order_id`, `product_id`, `count`) VALUES
(17, 26, 3, 1),
(18, 27, 4, 1),
(19, 27, 3, 2),
(20, 28, 3, 1),
(21, 29, 4, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`id`, `category_id`, `price`, `stock`, `image`, `url`, `rank`) VALUES
(1, '15', 1500, 15, 'http://www.jolyjokerz.com/upload/files/images/Samsung-ATIV-Tab-Product-Image-5.jpg', 'product/1/product/1/deneme_slayt_urunu_1.html.html', 0),
(2, '2', 1300, 55, 'http://core0.staticworld.net/images/article/2012/12/samsung_galaxy_s_iii_1182355_g5-original-100015856-large.jpeg', 'product/2/slider-urun2.html', 2),
(3, '3', 111, 1, 'http://venus.vestel.com.tr/images/page07/model01Detail.png', 'product/3/most-sell-product.html', 0),
(4, '2', 1321, 22, 'http://www.digitalage.com.tr/wp-content/uploads/2014/09/Yerli-tasarım-ve-üretim-eseri-akıllı-cep-telefonu-Venus-Eylül’de-tüketiciyle-buluşuyor.jpg', 'product/4/most-sell-product2.html', 0),
(5, '3', 123, 2, 'http://venus.vestel.com.tr/images/page07/model01Detail.png', 'product/5/most-popular-product1.html', 0),
(6, '3', 532, 123, 'http://s1.turkcell.com.tr/SiteAssets/Cihaz/cep-telefonu/turkcell/t40/cg/3yeni/3yeni_600x450.png?v=20140505114725', 'product/6/most-popular-product2.html', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Daten für Tabelle `product_description`
--

INSERT INTO `product_description` (`description_id`, `product_id`, `language_id`, `name`, `details`, `meta_tags`, `meta_keys`) VALUES
(13, 5, 1, 'Populer Ürün 1', 'Türkçe Lorem Ipsum, tasarım yaparken "burada metin olacak" şeklinde yinelemeler yerine Türkçe''ye benzer şekilde anlamsız yazılar, lorem ipsum dolar sit amet, lorem ipsut text üretir. Böylece dikkatler tasarım üzerinde yoğunlaşmış olur, tasarım doğal görünür. ', '', ''),
(14, 5, 2, 'Popular Product 1', 'Popular Product 1 details..', '', ''),
(35, 3, 1, 'Cok Satilan Urun 1', 'Türkçe Lorem Ipsum, tasarım yaparken "burada metin olacak" şeklinde yinelemeler yerine Türkçe''ye benzer şekilde anlamsız yazılar, lorem ipsum dolar sit amet, lorem ipsut text üretir. Böylece dikkatler tasarım üzerinde yoğunlaşmış olur, tasarım doğal görünür. ', 'urun, 3,', 'urun, 3,'),
(36, 3, 2, 'Test Most Sell Product 1', 'Test Most Sell Product 1 details coming soon...', 'product, 3,', 'product, 3'),
(45, 2, 1, 'Deneme Slayt Urunu2', 'Türkçe Lorem Ipsum, tasarım yaparken "burada metin olacak" şeklinde yinelemeler yerine Türkçe''ye benzer şekilde anlamsız yazılar, lorem ipsum dolar sit amet, lorem ipsut text üretir. Böylece dikkatler tasarım üzerinde yoğunlaşmış olur, tasarım doğal görünür. ', 'urun, 2,', 'urun, 2,'),
(46, 2, 2, 'Test Slider Product 2', 'Test Slider Product 2 details coming soon...', 'product, 2,', 'product, 2'),
(47, 4, 1, 'Cok Satan Urun 2', 'Türkçe Lorem Ipsum, tasarım yaparken "burada metin olacak" şeklinde yinelemeler yerine Türkçe''ye benzer şekilde anlamsız yazılar, lorem ipsum dolar sit amet, lorem ipsut text üretir. Böylece dikkatler tasarım üzerinde yoğunlaşmış olur, tasarım doğal görünür. ', 'urun, 4,', 'urun, 4,'),
(48, 4, 2, 'Test Most Sell Product 2', 'Test Most Sell Product 2', 'product, 4', 'product, 4'),
(49, 6, 1, 'Populer Ürün 2', 'Türkçe Lorem Ipsum, tasarım yaparken "burada metin olacak" şeklinde yinelemeler yerine Türkçe''ye benzer şekilde anlamsız yazılar, lorem ipsum dolar sit amet, lorem ipsut text üretir. Böylece dikkatler tasarım üzerinde yoğunlaşmış olur, tasarım doğal görünür. ', 'deneme', ''),
(50, 6, 2, 'Popular Product 2', 'Popular Product 2 details..', '', ''),
(69, 1, 1, 'Deneme Slayt Urunu 1', 'Türkçe Lorem Ipsum, tasarım yaparken "burada metin olacak" şeklinde yinelemeler yerine Türkçe''ye benzer şekilde anlamsız yazılar, lorem ipsum dolar sit amet, lorem ipsut text üretir. Böylece dikkatler tasarım üzerinde yoğunlaşmış olur, tasarım doğal görünür. ', 'urun, 1,', 'urun, 1,'),
(70, 1, 2, 'Test Slider Product 1 ', 'Test Slider Product 1 detail ist coming soon..', 'product, 1,', 'product, 1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_option`
--

CREATE TABLE IF NOT EXISTS `product_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_type` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `product_option`
--

INSERT INTO `product_option` (`id`, `product_id`, `language_id`, `option_name`, `option_type`, `rank`) VALUES
(1, 4, 1, 'Selectbox Renk', 'selectbox', 1),
(2, 4, 1, 'Checkbox Boyut', 'checkbox', 2),
(3, 4, 2, 'Selectbox Test', 'selectbox', 1),
(4, 4, 2, 'Checkbox Test', 'checkbox', 1),
(5, 4, 1, 'Giris Deneme', 'input', 1),
(6, 4, 2, 'Input Test', 'input', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_option_value`
--

CREATE TABLE IF NOT EXISTS `product_option_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_option_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `option_value` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `product_option_value`
--

INSERT INTO `product_option_value` (`id`, `product_option_id`, `language_id`, `option_value`, `action`, `value`) VALUES
(1, 1, 1, 'Deneme', '+', '100'),
(2, 4, 2, 'Test', '+', '100'),
(3, 2, 1, 'Checkbox deneme', '+', '20'),
(4, 3, 2, 'Checkbox test', '+', '20'),
(5, 5, 1, 'Herhangi bir bilgi', '', ''),
(6, 6, 2, 'Input text', '', '');

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
