-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2014 at 08:20 PM
-- Server version: 5.1.73
-- PHP Version: 5.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `koray`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `note`) VALUES
(1, 'deneme', 'deneme', 'deneme', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `rank`, `link`) VALUES
(1, 1, 1, 'product/1/slider-urun.html'),
(2, 0, 2, 'category/2/ikincimenu.html'),
(3, 0, 3, 'category/3/ucuncumenu.html'),
(15, 0, 1, 'category/1/Birinci.html'),
(16, 15, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `category_description`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `category_description`
--

INSERT INTO `category_description` (`ids`, `category_id`, `language_id`, `category_name`, `description`, `meta_description`, `meta_keyword`) VALUES
(1, 3, 1, 'Ucuncumenu', '', '', ''),
(12, 2, 1, 'Ikincimenu', 'test', 'test', ''),
(41, 2, 2, 'Second Menu', '', '', ''),
(42, 3, 2, 'Third Menu', '', '', ''),
(75, 16, 1, 'test2', '', '', ''),
(76, 16, 2, 'test2', '', '', ''),
(77, 15, 1, 'Birinci2', 'Birinci', 'Birinci', 'Birinci'),
(78, 15, 2, 'First', 'First', 'First', 'First');

-- --------------------------------------------------------

--
-- Table structure for table `category_path`
--

CREATE TABLE IF NOT EXISTS `category_path` (
  `category_id` int(11) NOT NULL,
  `path_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`path_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_path`
--

INSERT INTO `category_path` (`category_id`, `path_id`, `level`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(15, 15, 0),
(16, 15, 0),
(16, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `extension`
--

CREATE TABLE IF NOT EXISTS `extension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `loadpage` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `extension`
--

INSERT INTO `extension` (`id`, `name`, `type`, `loadpage`) VALUES
(1, 'Paypal', 'payment', 'paypal');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_name` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `default` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language_name`, `flag`, `code`, `default`) VALUES
(1, 'Türkce', '', '', '1'),
(2, 'English', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
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
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `details`, `type`, `product_id`, `rank`) VALUES
(1, 'Slider', '', 'slide', 1, 3),
(2, 'Slider', '', 'slide', 2, 2),
(3, 'Most Sell Products', '', 'sell', 3, 2),
(4, 'Most Sell Products', '', 'sell', 4, 1),
(5, 'Populer Products', '', 'popular', 5, 1),
(6, 'Populer Products', '', 'popular', 6, 2),
(16, 'Slider', '', 'slide', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order`
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
  `status` int(11) NOT NULL,
  `comment` text NOT NULL,
  `total` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `billing_first_name`, `billing_email`, `billing_telephone`, `billing_address1`, `billing_address2`, `billing_city`, `billing_postcode`, `billing_country`, `billing_region`, `billing_company`, `billing_companyid`, `cargo_first_name`, `cargo_email`, `cargo_telephone`, `cargo_address1`, `cargo_address2`, `cargo_city`, `cargo_postcode`, `cargo_country`, `cargo_region`, `status`, `comment`, `total`, `ip`, `date`) VALUES
(2, 1, 'a', 'fasf', 'safsa', 'fas', 'safa', 'sfa', 0, 'sfsa', 'fsaf', 'safsaf', 'safsa', 'fas', 'fsaf', 'saf', 'saf', 'asf', 'safa', 11, 'asgasg', 'asgasg', 2, 'test', '2321', '231231', '2014-10-15 00:00:00'),
(3, 1, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', 0, '', '', 1, '', '23231', '', '2014-10-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`oid`, `order_id`, `product_id`, `count`) VALUES
(1, 2, 1, 2),
(2, 2, 3, 2),
(3, 2, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_name`) VALUES
(1, 'Deneme');

-- --------------------------------------------------------

--
-- Table structure for table `page_description`
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
-- Dumping data for table `page_description`
--

INSERT INTO `page_description` (`page_id`, `language_id`, `name`, `details`, `meta_tags`, `meta_keys`) VALUES
(1, 1, 'Deneme Sayfa', 'Deneme sayfa icerik alani...', 'Deneme sayfa icerik alani...', 'Deneme sayfa icerik alani...'),
(1, 2, 'Test Page', 'Test Page detail is here..', 'Test Page detail is here..', 'Test Page detail is here..');

-- --------------------------------------------------------

--
-- Table structure for table `product`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `price`, `stock`, `image`, `url`, `rank`) VALUES
(1, '2', 1500, 15, 'http://www.sammobile.com/wp-content/uploads/2012/08/Samsung-ATIV-Tab-Product-Image-5.jpg', 'product/1/slider-urun.html', 1),
(2, '2', 1300, 55, 'http://core0.staticworld.net/images/article/2012/12/samsung_galaxy_s_iii_1182355_g5-original-100015856-large.jpeg', 'product/2/slider-urun2.html', 2),
(3, '3', 111, 1, 'http://venus.vestel.com.tr/images/page07/model01Detail.png', 'product/3/most-sell-product.html', 0),
(4, '2', 1321, 22, 'http://www.digitalage.com.tr/wp-content/uploads/2014/09/Yerli-tasarım-ve-üretim-eseri-akıllı-cep-telefonu-Venus-Eylül’de-tüketiciyle-buluşuyor.jpg', 'product/4/most-sell-product2.html', 0),
(5, '3', 123, 2, 'http://i.milliyet.com.tr/YeniAnaResim/2013/12/17/turk-mali-telefonu-onlar-yapti-3882787.Jpeg', 'product/5/most-popular-product1.html', 0),
(6, '3', 532, 123, 'http://s1.turkcell.com.tr/SiteAssets/Cihaz/cep-telefonu/turkcell/t40/cg/3yeni/3yeni_600x450.png?v=20140505114725', 'product/6/most-popular-product2.html', 0),
(9, '4', 111111, 111111111, '', '', 1111),
(10, '4', 111111, 111111111, '', '', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `product_description`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `product_description`
--

INSERT INTO `product_description` (`description_id`, `product_id`, `language_id`, `name`, `details`, `meta_tags`, `meta_keys`) VALUES
(13, 5, 1, 'Populer Ürün 1', 'Popüler Ürün 1 detaylar...', '', ''),
(14, 5, 2, 'Popular Product 1', 'Popular Product 1 details..', '', ''),
(35, 3, 1, 'Cok Satilan Urun 1', 'Deneme Cok Satilan Urun 1', 'urun, 3,', 'urun, 3,'),
(36, 3, 2, 'Test Most Sell Product 1', 'Test Most Sell Product 1 details coming soon...', 'product, 3,', 'product, 3'),
(43, 1, 1, 'Deneme Slayt Urunu 1', 'Deneme Slayt Urunu 1', 'urun, 1,', 'urun, 1,'),
(44, 1, 2, 'Test Slider Product 1 ', 'Test Slider Product 1 detail ist coming soon..', 'product, 1,', 'product, 1'),
(45, 2, 1, 'Deneme Slayt Urunu2', 'Deneme Slayt Urunu2', 'urun, 2,', 'urun, 2,'),
(46, 2, 2, 'Test Slider Product 2', 'Test Slider Product 2 details coming soon...', 'product, 2,', 'product, 2'),
(47, 4, 1, 'Cok Satan Urun 2', 'Deneme Cok Satilan Urun 2', 'urun, 4,', 'urun, 4,'),
(48, 4, 2, 'Test Most Sell Product 2', 'Test Most Sell Product 2', 'product, 4', 'product, 4'),
(49, 6, 1, 'Populer Ürün 2', 'Popüler Ürün 2 detaylar...', 'deneme', ''),
(50, 6, 2, 'Popular Product 2', 'Popular Product 2 details..', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
