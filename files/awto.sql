-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2020 at 11:18 AM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-8+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awto`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_category`
--

CREATE TABLE `company_category` (
  `id` int(11) NOT NULL,
  `title_tm` varchar(25) NOT NULL,
  `title_ru` varchar(25) NOT NULL,
  `title_en` varchar(25) NOT NULL,
  `title_ar` varchar(25) NOT NULL,
  `status` set('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(20) NOT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `isProduct` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `description` text,
  `gallery_id` varchar(150) DEFAULT NULL,
  `sort` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1533012821),
('m130524_201442_init', 1533012826),
('m130524_201444_create_news_table', 1533015154),
('m140209_132017_init', 1546431646),
('m140403_174025_create_account_table', 1546431647),
('m140504_113157_update_tables', 1546431649),
('m140504_130429_create_token_table', 1546431651),
('m140622_111540_create_image_table', 1533032845),
('m140830_171933_fix_ip_field', 1546431651),
('m140830_172703_change_account_table_name', 1546431651),
('m141222_110026_update_ip_field', 1546431652),
('m141222_135246_alter_username_length', 1546431653),
('m150429_155009_create_page_table', 1533015088),
('m150614_103145_update_social_account_table', 1546431654),
('m150623_212711_fix_username_notnull', 1546431654),
('m151218_234654_add_timezone_to_profile', 1546431655),
('m160929_103127_add_last_login_at_to_user_table', 1546431655);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `language` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ru',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `annonce` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `language` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ru',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) DEFAULT '1',
  `content` text COLLATE utf8_unicode_ci,
  `title_browser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `language`, `title`, `alias`, `published`, `content`, `title_browser`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'en', 'About Us', 'about-us', 1, '<p style=\"text-align: center;\"><img src=\"/images/5cf7d4b0c1ee6.jpg\" \"=\"\" width=\"423\" height=\"283\" style=\"width: 423px; height: 283px;\"></p><h2 style=\"text-align: center;\" rel=\"text-align: center;\">Joint-stock company of the closed type “Atiyachlandyrysh hyzmatary”<br></h2><p>In order to implement the National Program for the Social and Economic Development of Turkmenistan, develop the insurance business and improve it in accordance with international principles, develop the insurance market, in accordance with the Resolution of the President of Turkmenistan No. 12506 dated August 17, 2012, the Closed Joint-Stock Company “Atiyachlandyrysh hyzmatlary” was established. The Closed Joint-Stock Company “Atiyachlandyrysh hyzmatlary” operates on the basis of the Law of Turkmenistan “On Insurance”, the Charter of the Closed Joint-Stock Company “Atiyachlandyrysh hyzmatlary” and a license from the Ministry of Finance and Economy of Turkmenistan. Our main goal is to strengthen the financial position of the subjects of Turkmenistan, as well as to fully meet the needs of the population and legal entities in the territory of Turkmenistan for insurance services in accordance with international standards.</p>', 'About Us', 'About Us', 'About us page', '2018-08-02 16:15:47', '2019-11-01 06:04:35'),
(2, 'ru', 'О нас', 'o-nas', 1, '<h2 style=\"text-align: center;\"><br><img src=\"/images/5cf7d478ab196.jpg\" width=\"489\" height=\"327\" \"=\"\"></h2><h2 style=\"text-align: center;\">Акционерное общество закрытого типа «Атиячландырыш хызматлары»</h2><p style=\"text-align: justify;\">С целью выполнения Национальной программы социально-экономического развития Туркменистана, развитие страхового дела и его улучшения в соответствии  с международными принципами, согласно постановления Президента Туркменистана №12506 от 17 августа 2012 года было создано Акционерное общество закрытого типа «Атиячландырыш хызматлары». Акционерное общество закрытого типа «Атиячландырыш хызматлары» осуществляет свою деятельность на основании Закона Туркменистана «О страховании», Устава Акционерного общества закрытого типа «Атиячландырыш хызматлары» и лицензии Министерства финансов и экономики Туркменистана. Нашей главной целью является укрепление финансового положения субъектов Туркменистана, а также полное удовлетворение потребностей населения и юридических субъектов на территории Туркменистана в страховых услугах в соответствии с международными стандартами.</p>', 'О нас', 'О нас', 'О нас page', '2018-08-02 16:18:02', '2019-11-01 06:06:56'),
(3, 'tm', 'Biz barada', 'biz-hakda', 1, '<h1></h1><div class=\"content-page\">\r\n	<h3 style=\"background-image: none; text-align: center;\"><img src=\"/images/5cc988677c845.jpg\" width=\"499\" height=\"332\" \"=\"\"><br></h3><br>\r\n	<h3 style=\"text-align: center;\">“Ätiýaçlandyryş hyzmatlary” ýapyk görnüşli paýdarlar jemgyýeti</h3>\r\n	<div><br>\r\n		<div style=\"text-align: justify;\">Hormatly Prezidentimiz Gurbanguly Berdimuhammedowyň baştutanlygynda alnyp barylýan syýasaty esasynda ýurdumyzyň ähli pudaklary uly özgertmelere eýe boldy. Döwletimizde “Türkmenistanyň durmuş-ykdysady ösüşiniň 2011-2030-njy ýyllar üçin Milli maksatnamasynyň” we “Türkmenistanyň Prezidentiniň ýurdumyzyň 2012-2016-njy ýyllarda durmuş-ykdysady taýdan ösüşiniň Milli maksatnamasynyň” netijesinde amala aşyrylýan ähli işler döwletimiziň ykdysadyýetiniň kuwwatlylygyny artdyrmak bilen çäklenmän, eýsem ilatymyzyň durmuş derejesini has-da ýokarlandyrylmagyna uly itergi berýär.\r\n		</div><div style=\"text-align: justify;\">Mundan ugur alyp Türkmenistanyň durmuş-ykdysady ösüşiniň Milli maksatnamasyny ýerine ýetirmek, ätiýaçlandyryş işini ösdürmek we ony has-da gowlandyrmagyň halkara ýörelgelerini hasaba almak, ätiýaçlandyryş bazaryny ösdürmek maksady bilen Türkmenistanyň Prezidentiniň 2012-nji ýylyň 17-nji awgustynda 12506 belgili karary esasynda “Ätiýaçlandyryş hyzmatlary” ýapyk görnüşli paýdarlar jemgyýeti döredildi.<br>\r\n		</div><p \"=\"\">“Ätiýaçlandyryş hyzmatlary” ýapyk görnüşli paýdarlar jemgyýeti öz ätiýaçlandyryş işini “Ätiýaçlandyryş hakynda” Türkmenistanyň kanunynyň, “Ätiýaçlandyryş hyzmatlary” ýapyk görnüşli paýdarlar jemgyýetiniň Tertipnamasynyň we Türkmenistanyň Maliýe we ykdysadyýet ministrliginiň beren ygtyýarnamasy esasynda amala aşyrýar. Biziň baş maksadymyz Türkmenistanyň subýektleriniň maliýe ýagdaýyny berkitmek, şeýle hem ilatyň we ýurduň ýuridiki subýektlerini halkara standartlaryna laýyk ätiýaçlandyryş hyzmatlaryna bolan isleglerini doly kanagatlandyrmak bolup durýar.<br>\r\n		</p>\r\n	</div>\r\n	<div>\r\n	</div>\r\n</div>', 'Biz hakda', 'Biz hakda', 'Biz hakda sahypa', '2018-08-09 16:04:47', '2019-11-01 06:10:16'),
(4, 'en', 'Our partners', 'partners', 1, '<div class=\"col-lg-6 col-xl-7\">\r\n	<p \"=\"\">During our work on the insurance market, we have established closed partnerships with many insurance companies of Turkmenistan. Due to the honest and open policy of “Atiyachlandyrysh hyzmatlary” Closed Joint-Stock Company, the list of our regular partners in the field of insurance is steadily growing.\r\n	</p>\r\n	<p>Our insurance partners are:</p><ul><li>The State Insurance Organization of Turkmenistan </li><li>“Hazar atiyachlandyrysh” Open Joint-Stock Company</li></ul>\r\n</div><div class=\"col-lg-6 col-xl-5\">\r\n	[slick_slider_clients]\r\n</div>', 'Our partners', 'Our partners', 'Our partners', '2019-03-04 13:30:04', '2019-11-01 06:20:23'),
(5, 'en', 'Expired policy', 'prolong-policy', 1, '<div class=\"row\">\r\n	<div class=\"col-sm-12\">\r\n		<p class=\"technical-description mb-30\">If the term of your contract or policy comes to an end or has already expired, then you can extend it by visiting our office.\r\n		</p>\r\n	</div>\r\n</div><!-- end .prolong-intro --><div class=\"row\">\r\n	<div class=\"col-sm-6 col-xs-12 mb-30\">\r\n		<h3 class=\"prolong-cases-item-title\"><i class=\"fa fa-phone\" aria-hidden=\"true\"></i> By phone</h3>\r\n		<p class=\"prolong-cases-item-description\">Call any of the numbers below and we will help you renew the policy.\r\n		</p>\r\n		<p class=\"prolong-cases-item-description\"><strong><a href=\"tel:+99312957527\" class=\"link\">(+993 12) 95-75-27</a></strong><br><strong><a href=\"tel:+99312957528\" class=\"link\">(+993 12) 95-75-28</a></strong>\r\n		</p>\r\n	</div>\r\n	<div class=\"col-sm-6 col-xs-12 mb-30\">\r\n		<h3 class=\"prolong-cases-item-title\"><i class=\"fa fa-map-marker\"></i> Address</h3>\r\n		<p class=\"prolong-cases-item-description\">Oguzhan str 205, 3rd floor. Ashgabat, Turkmenistan.</p>\r\n	</div>\r\n</div><!-- end .prolong-cases -->', 'Expired policy', 'Prolong, Expired policy ', 'Prolong Expired policy ', '2019-03-04 15:13:34', '2019-04-14 06:16:09'),
(6, 'en', 'Case Request', 'case-request', 1, '<p>If you have an insured event, then leave us a request and we will call you back to clarify the details.</p>', 'Case Request', 'Case Request', 'Case Request', '2019-03-04 15:36:47', '2019-04-14 06:20:39'),
(7, 'ru', 'Истек срок полиса ', 'prolong-policy-ru', 1, '<div class=\"row\">\r\n	<div class=\"col-sm-12\">\r\n		<p class=\"technical-description mb-30\">Если срок вашего договора или полиса подходит к концу или уже истек, то\r\n                    вы можете продлить его посетив наш офис.\r\n		</p>\r\n	</div>\r\n</div><!-- end .prolong-intro --><div class=\"row\">\r\n	<div class=\"col-sm-6 col-xs-12 mb-30\">\r\n		<h3 class=\"prolong-cases-item-title\"><i class=\"fa fa-phone\" aria-hidden=\"true\"></i> По телефону</h3>\r\n		<p class=\"prolong-cases-item-description\">Позвоните по любому из номеров ниже и мы поможем вам продлить полис.\r\n		</p>\r\n		<p class=\"prolong-cases-item-description\"><strong><a href=\"tel:+99312957527\" class=\"link\">(+993 12) 95-75-27</a></strong><br><strong><a href=\"tel:+99312957528\" class=\"link\">(+993 12) 95-75-28</a></strong>\r\n		</p>\r\n	</div>\r\n	<div class=\"col-sm-6 col-xs-12 mb-30\">\r\n		<h3 class=\"prolong-cases-item-title\"><i class=\"fa fa-map-marker\"></i> Адрес</h3>\r\n		<p class=\"prolong-cases-item-description\">Улица \"Огузхан\", дом 205, 3 этаж. Ашхабад, Туркменистан.\r\n		</p>\r\n	</div>\r\n</div><!-- end .prolong-cases -->', 'Истек срок полиса ', 'Истек срок полиса ', 'Истек срок полиса ', '2019-04-14 06:17:05', '2019-04-22 03:48:36'),
(8, 'tm', 'Polisyň möhleti gutardy', 'prolong-policy-tm', 1, '<div class=\"row\">\r\n	<div class=\"col-sm-12\">\r\n		<p class=\"technical-description mb-30\">Eger-de Siziň atiýaçlandyrma şertnamasynyň möhleti gutaran bolsa, onda Siz ony biziň iş ýerimize gelip uzaldyň.\r\n		</p>\r\n	</div>\r\n</div><!-- end .prolong-intro --><div class=\"row\">\r\n	<div class=\"col-sm-6 col-xs-12 mb-30\">\r\n		<h3 class=\"prolong-cases-item-title\"><i class=\"fa fa-phone\" aria-hidden=\"true\"></i> Telefon </h3>\r\n		<p class=\"prolong-cases-item-description\">Aşakdaky islendik telefon belgilere jaň ediň.\r\n		</p>\r\n		<p class=\"prolong-cases-item-description\"><strong><a href=\"tel:+99312957527\" class=\"link\">(+993 12) 95-75-27</a></strong><br><strong><a href=\"tel:+99312957528\" class=\"link\">(+993 12) 95-75-28</a></strong>\r\n		</p>\r\n	</div>\r\n	<div class=\"col-sm-6 col-xs-12 mb-30\">\r\n		<h3 class=\"prolong-cases-item-title\"><i class=\"fa fa-map-marker\"></i> Adres</h3>\r\n		<p class=\"prolong-cases-item-description\">\"Oguzhan\" köçesi, jaý 205, 3 etaž. Aşgabat, Türkmenistan.\r\n		</p>\r\n	</div>\r\n</div><!-- end .prolong-cases -->', 'Polisyň möhleti gutardy', 'Polisyň möhleti gutardy', 'Polisyň möhleti gutardy', '2019-04-14 06:19:54', '2019-04-22 03:48:43'),
(9, 'ru', 'Произошел страховой случай', 'case-request-ru', 1, '<p>Если с вами произошел страховой случай, то оставьте нам заявку и мы перезвоним вам для уточнения подробностей.</p>', 'Произошел страховой случай', 'Произошел страховой случай', 'Произошел страховой случай', '2019-04-14 06:21:23', '2019-04-22 03:48:48'),
(10, 'tm', 'Heläkçilik bolan bolsa', 'case-request-tm', 1, '<h4>Heläkçilik bolan bolsa bize arza ugradyň, biz Siziň bilen goşmaça maglumat üçin habarlaşarys.<br>\r\n</h4><p><br></p><div class=\"col-sm-6 col-xs-12 mb-30\"><h3 class=\"prolong-cases-item-title\"><i class=\"fa fa-phone\" aria-hidden=\"true\"></i> Telefon </h3>\r\n		<p class=\"prolong-cases-item-description\">Aşakdaky islendik telefon belgilere jaň ediň.\r\n		</p>\r\n		<p class=\"prolong-cases-item-description\"><strong><a href=\"tel:+99312957527\" class=\"link\">(+993 12) 95-75-27</a></strong><br><strong><a href=\"tel:+99312957528\" class=\"link\">(+993 12) 95-75-28</a></strong>\r\n		</p>\r\n	</div><div class=\"col-sm-6 col-xs-12 mb-30\">\r\n		<h3 class=\"prolong-cases-item-title\"><i class=\"fa fa-map-marker\"></i> Adres</h3>\r\n		<p class=\"prolong-cases-item-description\">\"Oguzhan\" köçesi, jaý 205, 3 etaž. Aşgabat, Türkmenistan.\r\n		</p>\r\n	</div>', 'Heläkçilik bolan bolsa', 'Heläkçilik bolan bolsa', 'Heläkçilik bolan bolsa', '2019-04-14 06:22:57', '2019-05-01 13:29:54'),
(11, 'tm', 'Hyzmatdaşlarymyz', 'partnerstm', 1, '<div class=\"col-lg-6 col-xl-7\">\r\n	<p>“Ätiýaçlandyryş hyzmatlary” ýapyk görnüşli paýdarlar jemgyýeti ätiýaçlandyryş bazarynda işleýän döwründe Türkmenistanyň ätiýaçlandyryş guramalary bilen ýakyn hyzmatdaşlyk ýola goýuldy. “Ätiýaçlandyryş hyzmatlary” ÝGPJ alyp barýan dogry we açyk syýasatynyň netijesinde ätiýaçlandyryş bazarynda hyzmatdaşlarymyzyň sanawy barha artýar.\r\n	</p>\r\n	<p>Biziň ätiýaçlandyryş boýunça hyzmatdaşlarymyz:\r\n	</p>\r\n	<ul>\r\n		\r\n		<li>Türkmenistanyň Döwlet ätiýaçlandyryş guramasy</li>\r\n		\r\n		<li>\"Hazar ätiýaçlandyryş” açyk görnüşli paýdarlar jemgyýeti</li>\r\n	</ul>\r\n</div><div class=\"col-lg-6 col-xl-5\">\r\n	[slick_slider_clients]\r\n</div>', 'Hyzmatdaşlarymyz', 'Hyzmatdaşlarymyz', 'Hyzmatdaşlarymyz', '2019-04-27 01:39:33', '2019-10-31 05:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title_tm` varchar(255) NOT NULL,
  `title_ru` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `fullname_tm` text NOT NULL,
  `fullname_ru` text NOT NULL,
  `fullname_en` text NOT NULL,
  `description_tm` text,
  `description_ru` text,
  `description_en` text,
  `products_tm` text,
  `products_ru` text,
  `products_en` text,
  `phone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `legal_address_tm` text,
  `legal_address_ru` text,
  `legal_address_en` text,
  `expiration_date` varchar(255) NOT NULL,
  `status` set('0','1') NOT NULL DEFAULT '1',
  `main_page` set('0','1') NOT NULL DEFAULT '0',
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `language` varchar(2) NOT NULL DEFAULT 'tm',
  `mykey` varchar(25) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `language`, `mykey`, `value`) VALUES
(1, 'en', 'contact_address', 'Oguzhan str 205'),
(3, 'en', 'contact_phone', '<b>Phone: </b>(+993 12) 95-75-27, 95-75-28, 95-75-29 <br/>\r\n'),
(4, 'en', 'contact_support', '<strong>Email:</strong> <a href=\"mailto:info@ah-insurance.com.tm\">info@ah-insurance.com.tm</a>\r\n'),
(5, 'tm', 'contact_address', '<strong>\"Oguzhan\" köçesi, jaý 205</strong> '),
(6, 'ru', 'contact_address', 'Улица \"Огузхана\", дом 205'),
(8, 'tm', 'footer_contact', 'Tel: 95-75-27, 95-75-28, 95-75-29,\r\n95-75-32, faks: 95-75-30 '),
(9, 'tm', 'contact_support', '<strong>E-poçta:</strong>  <a href=\"mailto:info@ah-insurance.com.tm\">info@ah-insurance.com.tm</a>\r\n'),
(10, 'ru', 'contact_support', '<strong>Эл. адрес:</strong> <a href=\"mailto:info@ah-insurance.com.tm\">info@ah-insurance.com.tm</a>\r\n'),
(12, 'tm', 'contact_phone', '<b>Tel.:</b>(+993 12) 95-75-27,  95-75-28,  95-75-29<br/>\r\n'),
(13, 'ru', 'contact_phone', '<b>Тел.:</b> (+993 12) 95-75-27, 95-75-28,  95-75-29'),
(15, 'ru', 'footer_contact', 'Tel: 95-75-27, 95-75-28, 95-75-29,\r\n95-75-32, faks: 95-75-30 '),
(16, 'en', 'footer_contact', 'Tel: 95-75-27, 95-75-28, 95-75-29, 95-75-32, fax: 95-75-30 '),
(18, 'en', 'footer_logo', '<p>Legal Address: Oguzhan str 205. Ashgabat, Turkmenistan</p>'),
(19, 'tm', 'footer_logo', 'Salgy: \"Oguzhan\" köçesi, jaý 205. Aşgabat, Türkmenistan'),
(20, 'ru', 'footer_logo', 'Юридический адрес: Улица \"Огузхан\", дом 205. Ашгабат, Туркменистан'),
(22, 'tm', 'footer_working_time', 'Duşenbe - Anna: 09:00 - 18:00<br/>\r\nArakesme: 13:00 - 14:00<br/>\r\nŞenbe - Ýekşenbe: Dynç güni<br/>'),
(23, 'ru', 'footer_working_time', 'Понедельник- Пятница: 09:00 - 18:00 <br>\r\nПерерыв:  13:00 - 14:00 <br>\r\nСуббота- Воскресенье: Выходной<br>'),
(24, 'en', 'footer_working_time', 'Monday - Friday: 09:00 - 18:00<br>\r\nBreak time: 13:00 - 14:00<br>\r\nDays off: Sunday - Saturday<br>'),
(25, 'tm', 'contact_fax', '<b>Faks:</b> (+993 12) 95-75-29, 95-75-30<br/>'),
(26, 'ru', 'contact_fax', '<b>Факс:</b> (+993 12) 95-75-29, 95-75-30<br/>'),
(27, 'en', 'contact_fax', '<b>Fax:</b>  (+993 12) 95-75-29, 95-75-30<br/>'),
(31, 'tm', 'main_target', '“Ätiýaçlandyryş hyzmatlary” ýapyk görnüşli paýdarlar jemgyýeti öz ätiýaçlandyryş işini “Ätiýaçlandyryş hakynda”  Türkmenistanyň kanunynyň, “Ätiýaçlandyryş hyzmatlary” ýapyk görnüşli paýdarlar jemgyýetiniň Tertipnamasynyň we Türkmenistanyň Maliýe we ykdysadyýet ministrliginiň beren ygtyýarnamasy esasynda amala aşyrýar. Biziň baş maksadymyz Türkmenistanyň subýektleriniň maliýe ýagdaýyny berkitme, şeýle hem ilatyň we ýurdyň ýuridiki subýektlerini halkara standartlaryna laýyk ätiýaçlandyryş hyzmatlaryna bolan isleglerini doly kanagatlandyrmak bolup durýar.'),
(32, 'ru', 'main_target', 'Акционерное общество закрытого типа «Атиячландырыш хызматлары» осуществляет свою деятельность на основании Закона Туркменистана «О страховании», Устава Акционерного общество закрытого типа «Атиячландырыш хызматлары» и лицензии Министерства финансов и экономики Туркменистана. Нашей главной целью является укрепление финансового положения субъектов Туркменистана, а также полное удовлетворение потребностей населения и юридических субъектов на территории Туркменистана в страховых услугах в соответствии с международными стандартами.'),
(33, 'en', 'main_target', 'The Closed Joint Stock Company “Atiyachlandyrysh hyzmatlary” operates on the basis of the Law of Turkmenistan “On Insurance”, the Charter of the Closed Joint Stock Company “Atiyachlandyrysh hyzmatlary” and a license from the Ministry of Finance and Economy of Turkmenistan. Our main goal is to strengthen the financial position of the subjects of Turkmenistan, as well as to fully meet the needs of the population and legal entities in the territory of Turkmenistan for insurance services in accordance with international standards.'),
(34, 'tm', 'partners', '“Ätiýaçlandyryş hyzmatlary” ýapyk görnüşli paýdarlar jemgyýeti ätiýaçlandyryş bazarynda işleýän döwründe Türkmenistanyň ätiýaçlandyryş guramalary bilen ýakyn hyzmatdaşlyk ýola goýuldy. “Ätiýaçlandyryş hyzmatlary” ÝGPJ alyp barýan dogry we açyk syýasatynyň netijesinde ätiýaçlandyryş bazarynda hyzmatdaşlarymyzyň sanawy barha artýar.\r\nBiziň ätiýaçlandyryş boýunça hyzmatdaşlarymyz:\r\n•	Türkmenistanyň Döwlet ätiýaçlandyryş guramasy\r\n•	Hazar ätiýaçlandyryş” açyk görnüşli paýdarlar jemgyýeti'),
(35, 'ru', 'partners', 'За время работы на страховом рынке нами установлены тесные партнерские отношения со другими страховыми компаниями Туркменистана. Благодаря  честной и открытой политике акционерного общества закрытого типа «Атиячландырыш хызматлары» список наших постоянных партнеров в области страхования стабильно растет.\r\nНашими партнерами по страхованию являются:\r\n- Государственная страховая организация Туркменистана\r\n- ОАО “Хазар атиячландырыш”\r\n'),
(36, 'en', 'partners', 'During our work on the insurance market, we have established close partnerships with many insurance companies of Turkmenistan. Due to the honest and open policy of “Atiyachlandyrysh hyzmatlary” Closed Joint-Stock Company, the list of our regular partners in the field of insurance is steadily growing.\r\nOur insurance partners are:\r\n•	The State Insurance Organization of Turkmenistan \r\n•	“Hazar atiyachlandyrysh” Open Joint-Stock Company');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `text` text,
  `language` varchar(2) NOT NULL DEFAULT 'tm',
  `type` int(11) NOT NULL DEFAULT '1',
  `link` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `text` text,
  `language` varchar(2) NOT NULL DEFAULT 'tm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'zHmpocQLZR6bDQkXe6SibGw63W-qR1pF', 1546432494, 0),
(2, 'ipqv_rW_YmQpahtfOrhvzkmxduryjO8P', 1546433217, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'test1', 'test1@mail.ru', '$2y$12$lWTwwLmX6dWYdxomk2VINuHTbDA/FkNx5PJ/wuRP5kkHAcdnDRtz6', 'D2-0mhnAsgFGr4Av10fEYwchxjRkyaKf', NULL, NULL, NULL, '::1', 1546432493, 1546432493, 0, 1605029984),
(2, 'textile', 'textile@mail.ru', '$2y$12$lWTwwLmX6dWYdxomk2VINuHTbDA/FkNx5PJ/wuRP5kkHAcdnDRtz6', 'D2-0mhnAsgFGr4Av10fEYwchxjRkyaKf', NULL, NULL, NULL, '217.174.226.211', 1546433217, 1546433217, 0, 1605029910);

-- --------------------------------------------------------

--
-- Table structure for table `user-temp`
--

CREATE TABLE `user-temp` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user-temp`
--

INSERT INTO `user-temp` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'gadmin', 'Zcni6b2mMJkbL9ByZ5D_NppYnxZ2E_Hv', '$2y$13$NI3It6M8bwJREhsUA/H0Q.v3/lhWljY3t2zR8mepIxATMMTIb9hV6', NULL, 'info@industry.gov.tm', 10, 1533013516, 1533013516);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_category`
--
ALTER TABLE `company_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_news_user` (`user_id`),
  ADD KEY `status` (`status`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `updated_at` (`updated_at`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_idx_1` (`alias`),
  ADD KEY `pages_idx_2` (`alias`,`published`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indexes for table `user-temp`
--
ALTER TABLE `user-temp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_category`
--
ALTER TABLE `company_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user-temp`
--
ALTER TABLE `user-temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `company_category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
