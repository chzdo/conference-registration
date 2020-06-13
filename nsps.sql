-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 10:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsps`
--

-- --------------------------------------------------------

--
-- Table structure for table `abstract`
--

CREATE TABLE `abstract` (
  `email` varchar(50) NOT NULL,
  `paper_title` varchar(50) NOT NULL,
  `paper_pdf` varchar(50) NOT NULL,
  `paper_date` varchar(30) NOT NULL,
  `paper_number` varchar(20) NOT NULL,
  `accepted` int(11) NOT NULL DEFAULT '0',
  `paper_ack` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abstract`
--

INSERT INTO `abstract` (`email`, `paper_title`, `paper_pdf`, `paper_date`, `paper_number`, `accepted`, `paper_ack`) VALUES
('chzdo92@gmail.com', 'Stenography', '../PDFAbstracts/NSPS2020-1615189200_Abstract.pdf', '01/01/20 08:01:17pm', 'NSPS2020-1615189200', 1, '../PDFReciepts/NSPS2020-1615189200.pdf'),
('chido.nduaguibe@gmail.com', 'tyyyt', '../PDFAbstracts/NSPS2020-2903848881_Abstract.pdf', '01/01/20 02:01:11pm', 'NSPS2020-2903848881', 1, '../PDFReciepts/NSPS2020-2903848881.pdf'),
('babatunde.falaye@gmail.com', 'Quantum metrology', '../PDFAbstracts/NSPS2020-30090_Abstract.pdf', '02/01/20 06:01:05pm', 'NSPS2020-30090', 1, '../PDFReciepts/NSPS2020-30090.pdf'),
('stan.nduaguibe@yahoo.com', 'Design Of templates', '../PDFAbstracts/NSPS2020-6213888786_Abstract.pdf', '01/01/20 08:01:43pm', 'NSPS2020-6213888786', 1, '../PDFReciepts/NSPS2020-6213888786.pdf'),
('aagrace06@gmail.com', 'Quantum metrology of Fisher Information', '../PDFAbstracts/NSPS2020-8394_Abstract.pdf', '03/01/20 08:01:05pm', 'NSPS2020-8394', 1, '../PDFReciepts/NSPS2020-8394.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE `apps_countries` (
  `countryid` bigint(20) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`countryid`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia '),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard '),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia'),
(144, 'MD', 'Moldova'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russia'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts'),
(185, 'LC', 'Saint Lucia'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'UAE'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(241, 'WF', 'Wallis'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `certs`
--

CREATE TABLE `certs` (
  `certid` bigint(20) NOT NULL,
  `cert` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certs`
--

INSERT INTO `certs` (`certid`, `cert`) VALUES
(1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `conf`
--

CREATE TABLE `conf` (
  `id` bigint(20) DEFAULT NULL,
  `title` varchar(400) NOT NULL,
  `name` varchar(400) NOT NULL,
  `phonenumber` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `memberno` varchar(40) DEFAULT NULL,
  `reg_ack` varchar(50) DEFAULT NULL,
  `passport` varchar(40) DEFAULT NULL,
  `reg_rec` varchar(100) DEFAULT NULL,
  `affiliation` varchar(100) DEFAULT NULL,
  `pay1` varchar(40) DEFAULT NULL,
  `clear1` bigint(20) DEFAULT NULL,
  `pay2` varchar(40) DEFAULT NULL,
  `clear2` bigint(20) DEFAULT NULL,
  `pay3` varchar(40) DEFAULT NULL,
  `clear3` bigint(20) DEFAULT NULL,
  `clear` bigint(20) DEFAULT NULL,
  `registered` int(11) NOT NULL DEFAULT '0',
  `abstract_submitted` int(11) NOT NULL DEFAULT '0',
  `reg_number` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  `rrr` varchar(50) DEFAULT NULL,
  `orderID` varchar(200) NOT NULL,
  `rrr2` varchar(200) NOT NULL,
  `orderID2` varchar(200) NOT NULL,
  `rrr3` varchar(200) NOT NULL,
  `orderID3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conf`
--

INSERT INTO `conf` (`id`, `title`, `name`, `phonenumber`, `email`, `memberno`, `reg_ack`, `passport`, `reg_rec`, `affiliation`, `pay1`, `clear1`, `pay2`, `clear2`, `pay3`, `clear3`, `clear`, `registered`, `abstract_submitted`, `reg_number`, `address`, `sex`, `rrr`, `orderID`, `rrr2`, `orderID2`, `rrr3`, `orderID3`) VALUES
(NULL, 'Prof.', 'Adenike Adepoju', '5510981534', 'aagrace06@gmail.com', '', '../PDFRegistration/NSPS2020CONF-7479.pdf', '../Passport/NSPS2020CONF-7479.png', '../PDFPayments/NSPS2020CONF-7479.pdf', 'FULafia affiliation', NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 'NSPS2020CONF-7479', 'Federal University Lafia, Nigeria', 'm', '140007797985', '020120233051', '270007798040', '030120231207', '', ''),
(NULL, 'Dr.', 'Babatunde Falaye', '08103950870', 'babatunde.falaye@gmail.com', '', '../PDFRegistration/.pdf', '../Passport/.png', NULL, 'IPN affiliation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 'Federal University Lafia, Nigeria', 'm', NULL, '', '', '', '', ''),
(NULL, 'Mr.', 'dd', '87', 'cfgd@fh.k', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '', '', '', '', ''),
(NULL, 'Miss.', 'Stanley Nduaguibe', '09094453214', 'chido.nduaguibe@gmail.com', '46566', '../PDFRegistration/NSPS2020CONF-6073788945.pdf', '../Passport/NSPS2020CONF-6073788945.jpg', '../PDFPayments/NSPS2020CONF-6073788945.pdf', 'gyfu affiliation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'NSPS2020CONF-6073788945', 'wewaa', 'f', NULL, '', '', '', '', ''),
(NULL, 'Miss.', 'Favour Nduaguibe', '07050704721', 'chzdo92@gmail.com', '', '../PDFRegistration/NSPS2020CONF-4542563784.pdf', '../Passport/NSPS2020CONF-4542563784.jpg', '../PDFPayments/NSPS2020CONF-4542563784.pdf', 'Ebonyi State University, Abakaliki affiliation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'NSPS2020CONF-4542563784', 'iudshsda', 'm', NULL, '', '', '', '', ''),
(NULL, 'Mr.', 'Stanley Nduaguibe', '08101316680', 'stan.nduaguibe@yahoo.com', '123456', '../PDFRegistration/NSPS2020CONF-136428951.pdf', '../Passport/NSPS2020CONF-136428951.jpg', '../PDFPayments/NSPS2020CONF-136428951.pdf', 'University of Uyo affiliation', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'NSPS2020CONF-136428951', 'No 4 Rumuorlu', 'm', NULL, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `editors`
--

CREATE TABLE `editors` (
  `editorid` bigint(20) NOT NULL,
  `editoridno` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pword` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titleid` bigint(20) NOT NULL DEFAULT '0',
  `fname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sex` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countryid` bigint(20) NOT NULL DEFAULT '0',
  `state` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailid` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `specialization` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rgate` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qualification` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `daq` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `typeid` bigint(20) NOT NULL DEFAULT '0',
  `que` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ans` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certid` bigint(20) NOT NULL DEFAULT '0',
  `profile` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cv` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `memidcard` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statusid` bigint(20) NOT NULL DEFAULT '1',
  `last_login` datetime NOT NULL,
  `salt` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `priv` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `token` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `curdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `editors`
--

INSERT INTO `editors` (`editorid`, `editoridno`, `pword`, `titleid`, `fname`, `lname`, `dob`, `sex`, `countryid`, `state`, `home`, `phonenumber`, `emailid`, `address`, `department`, `rank`, `specialization`, `google`, `rgate`, `qualification`, `daq`, `typeid`, `que`, `ans`, `certid`, `profile`, `cv`, `payment`, `memidcard`, `statusid`, `last_login`, `salt`, `created`, `priv`, `prix`, `token`, `curdate`) VALUES
(1, 'BBJ020', '44739545b56d9f5783d23097d430a56b717bbe0fafe33e462e070cc6c002b7fc', 6, 'Babatunde', 'Falaye', '1989-03-18 00:00:00', '2', 161, 'Nigeria', 'Federal University Lafia, Nigeria', '08103950870', 'babatunde.falaye@science.fulafia.edu.ng', 'Federal University Lafia', 'Physics', 'Lecturer I', 'Theoretical Physics, Mathematical Physics, Computational Physics', 'https://scholar.google.com/citations?hl=en&user=mEczPMUAAAAJ', 'https://www.researchgate.net/profile/Babatunde_Falaye', 'PhD', '2017-06-28 00:00:00', 4, 'Mother maiden name?', 'omoleke', 1, 'Falaye-BBJ020', 'Falaye-BBJ020.pdf', 'NULL', 'NULL', 1, '2019-12-03 12:20:26', '8e0849878cc45a1fda462b2cb05f3a97b9f6fd18db243f3308cf50366bd90227', '2019-01-20 00:00:00', 1, 0, '9f578b939833a8ce8dd68c0b76b9e42623f0b8103e2049220a8ea7c806799167', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `keynote`
--

CREATE TABLE `keynote` (
  `id` bigint(10) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keynote`
--

INSERT INTO `keynote` (`id`, `emailid`, `address`, `name`, `date`) VALUES
(1, 'babatunde.falaye@gmail.com', 'babatunde.falaye@gmail.com', 'babatunde.falaye@gmail.com', '2019-12-10 17:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberid` bigint(20) NOT NULL,
  `memberidno` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pword` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titleid` bigint(20) NOT NULL DEFAULT '0',
  `fname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sex` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countryid` bigint(20) NOT NULL DEFAULT '0',
  `state` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailid` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rank` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `specialization` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rgate` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qualification` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `daq` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `typeid` bigint(20) NOT NULL DEFAULT '0',
  `que` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ans` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certid` bigint(20) NOT NULL DEFAULT '0',
  `profile` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cv` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `memidcard` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `statusid` bigint(20) NOT NULL DEFAULT '1',
  `last_login` datetime NOT NULL,
  `salt` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `priv` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `token` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `curdate` datetime NOT NULL,
  `certificate` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certno` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberid`, `memberidno`, `pword`, `titleid`, `fname`, `lname`, `dob`, `sex`, `countryid`, `state`, `home`, `phonenumber`, `emailid`, `address`, `department`, `rank`, `specialization`, `google`, `rgate`, `qualification`, `daq`, `typeid`, `que`, `ans`, `certid`, `profile`, `cv`, `payment`, `memidcard`, `statusid`, `last_login`, `salt`, `created`, `priv`, `prix`, `token`, `curdate`, `certificate`, `card`, `certno`) VALUES
(1, 'BBJ020', '44739545b56d9f5783d23097d430a56b717bbe0fafe33e462e070cc6c002b7fc', 6, 'Babatunde', 'Falaye', '1989-03-18 00:00:00', '2', 161, 'Nigeria', 'Federal University Lafia, Nigeria', '08103950870', 'babatunde.falaye@science.fulafia.edu.ng', 'Federal University Lafia', 'Physics', 'Lecturer I', 'Theoretical Physics, Mathematical Physics, Computational Physics', 'https://scholar.google.com/citations?hl=en&user=mEczPMUAAAAJ', 'https://www.researchgate.net/profile/Babatunde_Falaye', 'PhD', '2017-06-28 00:00:00', 4, 'Mother maiden name?', 'omoleke', 1, 'Falaye-BBJ020', 'Falaye-BBJ020.pdf', 'NULL', '35818227', 5, '2019-12-19 17:27:47', '8e0849878cc45a1fda462b2cb05f3a97b9f6fd18db243f3308cf50366bd90227', '2019-01-20 00:00:00', 1, 1, '0904e4a5ccb606739da4f3caaa4516dbc6e2fbf630c609b400c17d6282e8d0fe', '2019-02-01 21:11:46', NULL, NULL, NULL),
(3, 'drmaths', '3d50eef092b5a9291e21b83d5e7d49329ee08b42691e3f2bcf7ca06234c044d1', 6, 'Tolulope', 'Latunde', '1990-04-11 00:00:00', '1', 161, 'Osun', '13, Ojaja street, Moore, Ile-Ife', '08032801624', 'tolulope.latunde@fuoye.edu.ng', 'Federal University Oye-Ekiti', 'Mathematics', 'Lecturer II', 'Optimization', 'https://scholar.google.com/citations?user=Bcg5WOkAAAAJ&hl=en', 'https://www.researchgate.net/profile/Tolulope_Latunde?ev=hdr_xprf&_sg=X14N-TWCVHlBnHrEWStk1vzvYXy9mMcNYJ8BBN9eFOC5C2y8xtJbFhoQuo6icImXFLCN5MFTqhQB9GvdCsjEgqAT', 'PhD', '2018-03-27 00:00:00', 4, 'Mother maiden name?', 'Odewumi', 1, 'Latunde-drmaths', 'Latunde-drmaths.pdf', 'NULL', '87789253', 10, '2019-04-06 03:02:17', 'eaf94535e54ce0f971b71d9664a5257a985cd324b889c949c285a836be1e12be', '2019-01-21 00:00:00', 1, 1, 'beb38cb159dd783625eb4e4ba7c388291a0bf591020c46b2b06b8b8f1550c8dc', '2019-01-28 21:30:40', NULL, NULL, NULL),
(4, 'oladiran', 'bd71a540c1dc4b9cf4c31b69f0aa4aa55603011763db5837fe758c779e8281de', 6, 'Oladiran', 'Abimbola', '1974-10-13 00:00:00', '1', 161, 'Other - not US or CA', 'Department of Physics', '08036481762', 'ladiran@gmail.com', 'Federal University Lafia', 'Physics', 'Senior Lecturer', 'Atmospheric Physics', 'https://scholar.google.com/citations?user=011wbooAAAAJ&hl=en', 'https://www.researchgate.net/profile/Oladiran_Abimbola2', 'PhD', '2018-11-09 00:00:00', 4, 'Mother maiden name?', 'Akerele', 1, 'Abimbola-oladiran', 'Abimbola-oladiran.pdf', 'NULL', '77829867', 10, '2019-02-02 16:57:26', 'd73fbc6c5d03acddd3c446dc832a67385f4b7c03bf28fa65b171a2a7876c7b42', '2019-01-21 00:00:00', 1, 1, 'd4ceaa191e3e7ffbcf8242d8b05cf63afbb4c57e9aa2c09d6bd38f0cfd9be55a', '2019-01-28 21:29:30', NULL, NULL, NULL),
(8, 'oluwadare', '40a11f217d70bb2c69abe447ed591fc96ed65a4b0a60f470696d4267e51443a8', 6, 'Oluwatimilehin Joshua', 'Oluwadare', '1979-07-14 00:00:00', '1', 161, 'Osun', 'Opposite No.19 Kanisuru Community, Agbale line 2, Ede, Osun State', '08032378284', 'oluwatimilehin.oluwadare@fuoye.edu.ng', 'Federal University Oye-Ekiti', 'Department of Physics', 'Lecturer II', 'Theoretical Physics/Mathematical Physics', 'https://scholar.google.com/citations?user=u85-93IAAAAJ&hl=en', 'https://www.researchgate.net/profile/Oluwatimilehin_Oluwadare2', 'Ph.D.', '2018-03-28 00:00:00', 4, 'Name of your first child?', 'Delight', 1, 'Oluwadare-oluwadare', 'Oluwadare-oluwadare.pdf', 'NULL', '78823772', 10, '2019-01-31 07:59:01', 'ec045f0329df2d6295d2c6821f69ecc363668e538e89201c156418a8aab37821', '2019-01-31 07:06:48', 1, 1, '0f0d6cbd1595cb5557545a9566b5e20c8bee22d6a5f402d8caf19d2b5c5afa39', '2019-01-31 07:50:21', NULL, NULL, NULL),
(9, 'olumideaeo', '61ae119a6737a7c62e532008b946ffc8cc4a6c1a6e5388704011831d27fb167e', 3, 'Olumide  Ebenezer', 'ADEBANJI', '1989-06-11 00:00:00', '1', 161, 'OYO', 'DEPARTMENT OF PHYSICS, UNIVERSITY OF IBADAN, IBADAN, NIGERIA', '08061185310', 'olumideaeo@gmail.com', 'University of Ibadan', 'Physics', 'PhD Student', 'ATMOSPHERIC PHYSICS', 'https://www.researchgate.net/profile/Olumide_Adebanji', 'https://www.researchgate.net/profile/Olumide_Adebanji', 'M. SC.', '2015-10-30 00:00:00', 1, 'Mother maiden name?', 'Olotu', 1, 'ADEBANJI-olumideaeo', 'ADEBANJI-olumideaeo.pdf', 'NULL', '84593829', 9, '2019-01-31 18:16:11', '3a82a7b1dee90ce85b018c708d12617236364df95f7e589ece36f3763314250e', '2019-01-31 09:24:41', 1, 1, 'bcee3dc0a8682e0f40863bc8acb8c25dc3caa44c8ea7715aa0e73c4146b6539a', '2019-02-01 09:48:15', NULL, NULL, NULL),
(11, 'NSPS', '9fe3e689a2a7ef06efcee599718d651fa85fdf4ea9c7dd0def25184de5364678', 6, 'Babatunde', 'Falaye', '2019-02-14 00:00:00', '1', 161, 'Nigeria', 'Federal University Lafia, Nigeria', '8103950870', 'babatunde.falaye@gmail.com', 'Federal University Lafia, Nigeria', 'Physics', 'Director', 'Theoretical', 'https://scholar.google.com/citations?hl=en&user=mEczPMUAAAAJ', 'https://www.researchgate.net/profile/Babatunde_Falaye', 'PhD', '2019-02-12 00:00:00', 1, 'Mother maiden name?', 'alice', 1, 'Falaye-NSPS', 'Falaye-NSPS.pdf', 'NULL', 'NULL', 2, '2019-02-03 00:00:00', '332628dd948a30a70ae667e2043d84763c0cdfa9a6acb9b320967b29b2b44887', '2019-02-03 07:22:45', 1, 0, '7c431a9ef0ae09a347940305f47436b846edf6cbbac14952b86df3c7b4ae79ec', '2019-02-26 21:21:34', NULL, NULL, NULL),
(14, 'banken87', '59bbe04bd67293ba15d76df13db2d3b87e09c4cb5dbaed942968fdb1bf4dea1e', 3, 'Charles Ojiefoh', 'Oseghale', '1987-06-14 00:00:00', '1', 161, 'Abuja', 'First floor , Murjanatu House, No. 1 Zambezi Cresent , off Aquiyi Ironsi Street, Maitama,  Abuja, Nigeria. Care (Barr. Damilola Oseghale).', '07037821445', 'charlesbarken@gmail.com', 'Federal University Lafia, Nassarawa State, Nigeria.', 'Chemistry', 'Assistant lecturer', 'Materials Chemistry/ Nanotechnology', 'https://scholar.google.com.hk/citations?user=Y0ZZpsIAAAAJ&hl=en', 'https://www.researchgate.net/profile/Charles_Oseghale2/amp', 'Masters ', '2016-04-24 00:00:00', 1, 'Mother maiden name?', 'Iseghohimen', 1, 'Oseghale-banken87', 'Oseghale-banken87.pdf', 'NULL', '37781372', 9, '2019-02-28 10:11:39', 'a985e198036259c17efba3ee676d8b0fe09664fcca97f8b9d93e712333e3fb35', '2019-02-26 08:31:25', 1, 1, 'b21ba4a2d70efe18e91fe5f75cdd53bec0acd030100f6e381518c9bebe44c821', '2019-02-28 09:38:55', NULL, NULL, NULL),
(22, 'olofinbolu', '88deeb39a782ebb0efc539ca98a620174a69538957f69cc95ce8f38e920b78db', 6, 'Bolutife', 'Olofinjana', '1975-10-25 04:00:00', '1', 161, 'Lagos', 'Department of Physics,Obafemi Awolowo University,Ile-Ife,Nigeria', '08066762570', 'olofinbolu@gmail.com', 'Obafemi Awolowo University, Ile-Ife, Nigeria', 'Department of Physics', '', 'Materials Science/Solid State Physics', '', '', 'Ph.D', '2011-01-16 05:00:00', 1, 'Mother maiden name?', 'Akinwande', 1, 'Olofinjana-olofinbolu', 'Olofinjana-olofinbolu.pdf', 'Yes', '86895562', 9, '2019-05-04 15:58:07', '1640609bfc584646a9a3ad38400d12226db2beb0ca12129e147ad1dc1d57fb02', '2019-05-02 16:49:47', 1, 1, 'c61b699d93c764571de9854fc748a16fd905565181391563479f879bda33c608', '2019-05-04 13:05:46', 'Olofinjana-olofinbolu-Card.pdf', 'Olofinjana-olofinbolu-Certificate.pdf', 'N0901190010'),
(26, 'sapientnsp', 'f62093506debbf7654229bf5ec67c0d5b7fb5cfb5c481ea58b7a27fdd1ba927f', 3, 'SOLOMON', 'ASIN', '1977-01-01 05:00:00', '1', 161, 'AKWA IBOM STATE', 'ENWANG COMPREHENSIVE SECONDARY SCHOOL, ENWANG, MBO LOCAL GOVT. AREA, AKWA IBOM STATE, NIGERIA', '+2347081534825', 'solomonasin@gmail.com', 'ENWANG COMPREHENSIVE SECONDARY SCHOOL, ENWANG, MBO L. G. A., AKWA IBOM STATE, NIGERIA', 'SCIENCE', '', 'ATMOSPHERIC PHYSICS', '', '', 'MASTER OF SCIENCE, M. SC.', '2017-03-04 05:00:00', 1, 'Mother maiden name?', 'Affiong Etim Isong', 1, 'ASIN-sapientnsp', 'ASIN-sapientnsp.pdf', 'Yes', '81848443', 9, '2019-11-11 15:16:30', '5087ea708b12db23f45858c8df237b8327ad3bb01aefba283b3f3fbc882c8096', '2019-06-04 13:36:59', 1, 1, '7f12bb8231f521fcc59ec98bc62b47b4afb664b95fda807424167745c6ce8aa5', '2019-06-09 09:22:00', 'ASIN-sapientnsp-Card.pdf', 'ASIN-sapientnsp-Certificate.pdf', 'N 0901190012'),
(24, 'GRACE020W', 'fbaf0293f7c1dbbfd146dc6bec9cb06de1732259b8581de7a5369074a0312fbf', 3, 'Naphtali', 'Falaye', '2019-05-23 04:00:00', '2', 99, 'none', 'dnjrfgnjft', '2534525234', 'info@nsps.org.ng', 'NULL', 'fgnjfgnm', 'fgnjcfg', 'dfjnhdfgnjfdmhn', 'dnhfcg ', 'dfn cgnm c', 'dnfjdxf', '2019-05-02 04:00:00', 2, 'Name of your first child?', 'jk./m,jkl/mnj ', 1, 'Falaye-GRACE020W', 'Falaye-GRACE020W.pdf', 'Yes', 'NULL', 1, '0000-00-00 00:00:00', '2dda490af46a0e4e6c7b049be650cc5e08e4006db88d4c814b820b312e600532', '2019-05-09 02:55:54', 1, 1, '24d30beba77f95bcef7e20060b6d8bfb338eeec719001677c7cb84eb8da20bdfbb', '2019-05-09 02:55:54', 'NULL', 'NULL', 'NULL'),
(25, 'NAPH023', '45857101ab13f6a20d641f7f0f22d855c5e5964ddac07951b51629e3decece1f', 6, 'Adenike', 'Adepoju', '2019-05-22 04:00:00', '1', 5, 'Fgggg', 'Ffffggg', 'Gggghbbb', 'secretary@nsps.org.ng', 'NULL', 'Nullh', '', 'Vgggh', '', '', 'Phd', '2019-05-22 04:00:00', 4, 'What is your best food?', 'Akr', 1, 'Adepoju-NAPH023', 'Adepoju-NAPH023.pdf', 'Yes', 'NULL', 1, '0000-00-00 00:00:00', 'a3bdb47323d3a608a216f47c61638f4942e541ed5ef8312c0df4ffad29eee43a', '2019-05-09 08:24:48', 1, 1, '25dbb9d1cad57518ab2aa9d073de6fffa4b0f2dec1f1ff28508e2fc17deff20406', '2019-05-09 08:24:48', 'NULL', 'NULL', 'NULL'),
(23, 'nickarta', '3f13d40436d714b4f64b71b6340508b73fffaee603bf1dbdcfbf45a459f67e75', 3, 'Nicholas', 'Tasie', '1976-12-19 05:00:00', '1', 161, 'Rivers State', 'Rivers State University, Port Harcourt, Nigeria.', '+2348036723396', 'nickarta@gmail.com', 'Rivers State Universitry', 'Physics Department', '', 'Solid State Physics', '', 'https://www.researchgate.net/profile/Nicholas_Tasie2', 'M.SC.', '2018-05-04 04:00:00', 1, 'Name of your first child?', 'chizinum', 1, 'Tasie-nickarta', 'Tasie-nickarta.pdf', 'Yes', '74247337', 9, '2019-05-11 20:57:48', '40584f828a50b9e4d1d8d5cc9e2463cf715eed95c376827ab125f08aeb60ac72', '2019-05-09 02:31:44', 1, 1, 'd504655b7f7693f2c749d5d81ff999c1d15f9274e20d6ef1ee9f1ce3db11233a', '2019-05-10 17:44:18', 'Tasie-nickarta-Card.pdf', 'Tasie-nickarta-Certificate.pdf', 'N0901190011'),
(27, 'epitomizer', 'fb4b12fc911e6517c2e44125632959e6dbc3b3859549b55d54adf6b334217069', 3, 'OKENNA THANKGOD', 'CHIBUIKE', '1991-01-29 05:00:00', '1', 161, 'Enugu', '15 Ikem Street, AbakpaEnugu EastEnugu', '08031936721', 'okennathankgod@yahoo.com', 'City Comprehensive Secondary School', 'Physics', '', 'Pure and Applied Physics, Geophysics', '', '', 'B.Sc.', '2019-03-05 05:00:00', 1, 'Mother maiden name?', 'chukwu', 1, 'CHIBUIKE-epitomizer', 'CHIBUIKE-epitomizer.pdf', 'Yes', '15452476', 9, '2019-09-11 01:59:33', 'fa9f7a75544cc7681ec351e8fa81f4f52351f12186b565e28c81f70adf21d435', '2019-06-25 10:57:53', 1, 1, '991563d5a9ee72867e3c4829b384c4904abe6dda008664d21a727c25a8381c22', '2019-06-25 17:52:00', 'CHIBUIKE-epitomizer-Certificate.pdf', 'CHIBUIKE-epitomizer-Card.pdf', 'N 0901190013'),
(28, 'EVERGREEN', '4f9e6a8130a8fcd632b9687c97c9ed41c51247d2f1b706d11a368eb92381e860', 2, 'RAMATU ALHAJI', 'SULEIMAN', '1984-11-12 05:00:00', '2', 161, 'KADUNA', '% ENGR. JIMOH MOHAMMEDICT/MIS DEPARTMENT,NIGERIA POLICE ACADEMY WUDIL,KANO-MAIDUGURI ROAD,PMB 3474,P.O.BOX 14830 KANO,KANO STATE,NIGERIA.', '07038886624', 'ramat.suleiman@yahoo.com', 'AL-MANARAT INTERNATIONAL SCHOOL, DANLADI-NASIDI HOUSING ESTATE, MARIRI, KANO, KANO STATE, NIGERIA.', 'CHEMISTRY', '', 'INDUSTRIAL CHEMISTRY', '', '', 'PGD (CHEMISTRY)', '2016-06-03 04:00:00', 1, 'Name of your first child?', 'ZULFAH', 1, 'SULEIMAN-EVERGREEN', 'SULEIMAN-EVERGREEN.pdf', 'Yes', '24254385', 9, '2019-07-28 01:15:13', '6e645d05018d19b20e7abd5e2722c0e7ccd3c1e319468a0790d5a71d8a838b05', '2019-07-01 13:09:26', 1, 1, '2f76c2108d3a90b2085f3a30a46b0d92a77df8bd20a7e8580c929b6fe0308fe2', '2019-07-03 01:53:35', 'SULEIMAN-EVERGREEN-Cert.pdf', 'SULEIMAN-EVERGREEN-Card.pdf', 'N 0901190015'),
(29, 'danladieli', '509846ab33f09292401964babc216b1c3c02b1dfb60874e19da803947c4c4d26', 3, 'Eli', 'Danladi', '1989-11-01 05:00:00', '1', 161, 'Kaduna', 'C/O Dr. Gyuk Philip MusaDepartment of Physics,Kaduna State University,Tafawa Balewa Way, PMB 2339, Kaduna.', '08063307256', 'danladielibako@gmail.com', 'Nigerian Defence Academy', 'Physics', '', 'Condensed matter physics, semiconductor physics, experimental physics, material physics, nanophotonics, surface science, dye and quantum dot sensitized solar cells, nanotechnology, renewable energy, p', 'https://scholar.google.com/scholar?hl=en&as_sdt=0%2C5&q=danladi+eli&oq=da', 'https://www.researchgate.net/profile/Danladi_Eli', 'M.Sc', '2017-09-08 04:00:00', 1, 'Mother maiden name?', 'Talatu', 1, 'Danladi-danladieli', 'Danladi-danladieli.pdf', 'Yes', '46391575', 9, '2019-10-17 08:56:14', '22196ff4aaa22233158daffb336e1a43698406f906f81bddcac8cc7ea4358a78', '2019-07-01 15:06:05', 1, 1, '211d802b38b94596b37a5f81cc6ab71287e4ae1b8818e4b0638a723c365c866a', '2019-07-02 11:53:25', 'Danladi-danladieli-Certificate.pdf', 'Danladi-danladieli-Card.pdf', 'N 0901190014'),
(30, 'ewa4nsps', '75f8fe2d08ddff5cf7d618f802efa08bc4660a3bc7c11800390c093e41599563', 6, 'Ewa Ibrahim', 'Inusa', '1985-06-12 04:00:00', '1', 161, 'Nasarawa', 'Department of Physics, Nasarawa State University, P.M.B. 1022, Keffi, Nasarawa State, Nigeria', '+2348063400484', 'ewainusa@nsuk.edu.ng', 'Nasarawa State University, Keffi', 'Department of Physics', '', 'Theoretical (Mathematical) Physics', '', '', 'Ph.D', '2018-07-25 04:00:00', 1, 'What is your best food?', 'Pounded yam', 1, 'Inusa-ewa4nsps', 'Inusa-ewa4nsps.pdf', 'Yes', '63782835', 9, '2019-08-13 03:22:31', '3fc67731ef2ae8c61aa3093947fc1e6dacbac3d4edab1b43bfefa56cd15e6d5b', '2019-07-15 02:11:48', 1, 1, 'f6cba7a58b204728f7db0a707596b3dc46e21a0ba9daadf9adb4f7afb49282e3', '2019-07-16 03:48:05', 'Inusa-ewa4nsps-Cert.pdf', 'Inusa-ewa4nsps-Card.pdf', 'N 0901190016'),
(31, 'makserm201', '8d301455dee091bccce14657aa4fb4310164b482c2522ca2d36a283d01f7d62d', 3, 'Oluniyi Samuel', 'Makinde', '1975-03-11 04:00:00', '1', 161, 'Oyo', 'Physics department,\r\nThe Polytechnic Ibadan,\r\nIbadan.\r\nOyo State.', '09017239853', 'makserm@yahoo.com', 'The Polytechnic Ibadan.', 'Physics Department', 'Lecturer I', 'Health Physics\r\nMedical Physics', '', '', '(1) MSc Physics. (2) MSc Medical Physics', '2008-10-02 04:00:00', 1, 'Where did you meet your spouse?', 'Bauchi', 1, 'Makinde-makserm201', 'Makinde-makserm201.pdf', 'Yes', '92821369', 9, '2019-11-28 15:21:23', '15bbc5deeff4df138fd20ff160d7e9d5bca36627b890d90cf051e0fe5ec4468c', '2019-08-28 02:44:49', 1, 1, 'd4efbe57c04638c6fbbfed3ff26a9dc8e95928dd776d9b7cec33b84f4308d4d1', '2019-08-31 13:56:32', 'Makinde-makserm201-Cert.pdf', 'Makinde-makserm201-Card.pdf', 'N 0901190017'),
(32, 'geographer', 'd2ca06c30b2a7c3f2817b30d115dfe7f3ab90ae60a61c7b5af3d324ab7f8eca4', 3, 'Ayiwulu', 'Ezekiel', '1983-11-11 05:00:00', '1', 161, 'Nasarawa', 'Department of Geography, Federal University of Lafia', '08038106509', 'eayiwulu@gmail.com', 'Federal University of Lafia', 'Geography', '', 'Climate Change and Hydrology', '', '', 'MSc', '2014-04-15 04:00:00', 1, 'What is your best food?', 'rice', 1, 'Ezekiel-geographer', 'Ezekiel-geographer.pdf', 'Yes', '33312751', 1, '2019-11-18 16:27:44', '153a14d898a30d86027ab6135d168b20b4a188d9e744ca73ca68608d168b800c', '2019-11-17 05:00:28', 1, 1, 'ca5019113e2609e13e5a092bf1b9db7d6da18e7d82c8f44fa68a990e7c2d0b9d', '2019-11-18 10:24:48', 'Ezekiel-geographer-Cert.pdf', 'Ezekiel-geographer-Card.pdf', 'N 0901190018'),
(33, 'buhari001', '764b0ecb10b09cfced9cb7b49823a50de156afe7aaf68ccb6d601a2a938bd4e7', 3, 'BUHARI', 'SAMAILA', '1987-04-22 04:00:00', '1', 161, 'Kebbi', 'FACULTY OF SCIENCE, DEPARTMENT OF PHYSICS WITH ELECTRONICS, Federal university Birnin kebbi,P.M.B 1157,\r\nOFFICE OF THE SECRETARY PHYSICS WITH ELECTRONICS', '07067847629', 'kawara002@gmail.com', 'Federal university Birnin kebbi', 'PHYSICS WITH ELECTRONICS', 'LECTURER', 'RADIATION AND NUCLEAR PHYSICS', '', '', 'B.Sc physics', '2013-12-31 05:00:00', 1, 'Name of your first child?', 'Abdulraheem', 1, 'SAMAILA-buhari001', 'SAMAILA-buhari001.pdf', 'Yes', '18355777', 9, '2019-12-08 13:48:03', '3845e29e4c8c113892c340709db8a7a7c3dba6fe0cca3e2d058de07763864f73', '2019-11-29 05:11:08', 1, 1, 'cd179bada3521eca72f22ad272e1b65306f964f6a005acd54fed76da356df17f', '2019-12-03 12:27:27', 'SAMAILA-buhari001-Cert.pdf', 'SAMAILA-buhari001-Card.pdf', 'N 0901190019');

-- --------------------------------------------------------

--
-- Table structure for table `member_card_no`
--

CREATE TABLE `member_card_no` (
  `sn` double DEFAULT NULL,
  `cardno` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_card_no`
--

INSERT INTO `member_card_no` (`sn`, `cardno`) VALUES
(1, 35818227),
(2, 77829867),
(3, 87789253),
(4, 78823772),
(5, 84593829),
(6, 82722826),
(7, 75539263),
(8, 37781372),
(9, 55868321),
(10, 86895562),
(11, 74247337),
(12, 81848443),
(13, 15452476),
(14, 46391575),
(15, 24254385),
(16, 63782835),
(17, 92821369),
(18, 33312751),
(19, 18355777),
(20, 51893873),
(21, 87563867),
(22, 24782565),
(23, 71958562),
(24, 17371488),
(25, 71496743),
(26, 17337829),
(27, 87865613),
(28, 11556252),
(29, 35525737),
(30, 52458766),
(31, 59774489),
(32, 73971383),
(33, 25433498),
(34, 62441642),
(35, 15713956),
(36, 38217282),
(37, 59424496),
(38, 61287356),
(39, 24283111),
(40, 37113183),
(41, 92185669),
(42, 62394353),
(43, 76295111),
(44, 11144691),
(45, 48224125),
(46, 96256162),
(47, 64647146),
(48, 57891149),
(49, 78997866),
(50, 89198352),
(51, 28226493),
(52, 84158812),
(53, 81854538),
(54, 56481618),
(55, 34968391),
(56, 51875239),
(57, 98538929),
(58, 27395613),
(59, 12688729),
(60, 44153588),
(61, 42823299),
(62, 76471378),
(63, 54478766),
(64, 14682667),
(65, 87473386),
(66, 35453855),
(67, 44796673),
(68, 19639848),
(69, 18565418),
(70, 53998922),
(71, 23841767),
(72, 37424779),
(73, 55766437),
(74, 44885739),
(75, 68377991),
(76, 19159531),
(77, 23871967),
(78, 25445211),
(79, 43778915),
(80, 71345828),
(81, 38435655),
(82, 54311387),
(83, 43316829),
(84, 86945682),
(85, 33376658),
(86, 42518978),
(87, 33199366),
(88, 96438847),
(89, 93827795),
(90, 38113585),
(91, 94351227),
(92, 36447664),
(93, 15618578),
(94, 76739236),
(95, 35911883),
(96, 15863373),
(97, 81355388),
(98, 38667149),
(99, 57528915),
(100, 11624337),
(101, 86182819),
(102, 75274739),
(103, 19982969),
(104, 19765491),
(105, 44124932),
(106, 21413646),
(107, 61714483),
(108, 38876391),
(109, 61813945),
(110, 33525887),
(111, 57399337),
(112, 59246373),
(113, 47235531),
(114, 78847914),
(115, 72982525),
(116, 73632879),
(117, 62437193),
(118, 79192851),
(119, 36664739),
(120, 49465479),
(121, 33551733),
(122, 38454537),
(123, 44942868),
(124, 27117445),
(125, 71911471),
(126, 91524358),
(127, 81772247),
(128, 41649923),
(129, 96274954),
(130, 55538553),
(131, 39479239),
(132, 53124991),
(133, 33251633),
(134, 89591623),
(135, 74963996),
(136, 16962753),
(137, 42123517),
(138, 16262629),
(139, 78682643),
(140, 65845281),
(141, 32438783),
(142, 33745932),
(143, 71997115),
(144, 68374927),
(145, 62553947),
(146, 53258315),
(147, 96438137),
(148, 42794468),
(149, 47951326),
(150, 97623916),
(151, 46578826),
(152, 47377544),
(153, 32661146),
(154, 87115369),
(155, 55441911),
(156, 76415458),
(157, 33631373),
(158, 26467149),
(159, 72458692),
(160, 53649795),
(161, 59578451),
(162, 95151657),
(163, 43296446),
(164, 88851622),
(165, 48195982),
(166, 31671233),
(167, 17341278),
(168, 48476746),
(169, 85876491),
(170, 19143252),
(171, 75691383),
(172, 92426568),
(173, 15275255),
(174, 62519124),
(175, 69962811),
(176, 26219424),
(177, 57621923),
(178, 57252261),
(179, 77387786),
(180, 83397835),
(181, 92248391),
(182, 65494756),
(183, 36356615),
(184, 47626583),
(185, 19354731),
(186, 51498292),
(187, 42479637),
(188, 58424362),
(189, 52899166),
(190, 92164528),
(191, 31284494),
(192, 98885992),
(193, 73522324),
(194, 41615491),
(195, 41253343),
(196, 53514992),
(197, 75829269),
(198, 88119766),
(199, 32841921),
(200, 33365586),
(201, 96235538),
(202, 74468493),
(203, 57357727),
(204, 83792351),
(205, 25928223),
(206, 65913118),
(207, 66667122),
(208, 87354458),
(209, 68988941),
(210, 63556362),
(211, 48238454),
(212, 54532736),
(213, 15646215),
(214, 18179772),
(215, 25158562),
(216, 97362143),
(217, 56347919),
(218, 72459888),
(219, 67769247),
(220, 86217961),
(221, 24413146),
(222, 35894548),
(223, 41872488),
(224, 78875782),
(225, 23952129),
(226, 87626237),
(227, 32733869),
(228, 12913938),
(229, 84884985),
(230, 58668134),
(231, 13995517),
(232, 11162889),
(233, 19754747),
(234, 21751998),
(235, 96986224),
(236, 11971279),
(237, 27816424),
(238, 51156418),
(239, 92672415),
(240, 84972436),
(241, 98527694),
(242, 68269828),
(243, 57559684),
(244, 24269693),
(245, 78195127),
(246, 79432294),
(247, 56648197),
(248, 65615796),
(249, 14969863),
(250, 25311555),
(251, 53861451),
(252, 42368892),
(253, 48893219),
(254, 15287916),
(255, 74353385),
(256, 79863978),
(257, 93763148),
(258, 69757447),
(259, 43652547),
(260, 27269282),
(261, 68377911),
(262, 66441886),
(263, 31168393),
(264, 52954339),
(265, 87633279),
(266, 79955722),
(267, 23159414),
(268, 93712915),
(269, 37396862),
(270, 45821263),
(271, 62647518),
(272, 54776826),
(273, 73976646),
(274, 31312816),
(275, 83131916),
(276, 91195393),
(277, 52554699),
(278, 15948121),
(279, 97117182),
(280, 33721158),
(281, 96535645),
(282, 46193215),
(283, 43949311),
(284, 52897566),
(285, 95338939),
(286, 98274295),
(287, 63515186),
(288, 51133577),
(289, 42527665),
(290, 98914243),
(291, 67714692),
(292, 13199114),
(293, 32176285),
(294, 73872942),
(295, 63961194),
(296, 82169511),
(297, 12628646),
(298, 42931177),
(299, 89351142),
(300, 22659436),
(301, 67591154),
(302, 45145888),
(303, 98926587),
(304, 37917698),
(305, 19565248),
(306, 66448462),
(307, 16419863),
(308, 54728361),
(309, 62156447),
(310, 66838543),
(311, 63339117),
(312, 47578348),
(313, 48668857),
(314, 65789955),
(315, 42594564),
(316, 78195769),
(317, 81461587),
(318, 73727657),
(319, 65949449),
(320, 82144166),
(321, 63932483),
(322, 38782238),
(323, 96477379),
(324, 95597728),
(325, 84588426),
(326, 66312175),
(327, 91647891),
(328, 14116733),
(329, 32823145),
(330, 37842714),
(331, 47798986),
(332, 25281852),
(333, 49778563),
(334, 89133114),
(335, 99427958),
(336, 87487785),
(337, 22764694),
(338, 95628771),
(339, 69658932),
(340, 39859125),
(341, 77152152),
(342, 23175966),
(343, 21952595),
(344, 13911846),
(345, 81641221),
(346, 98164332),
(347, 34365948),
(348, 26963958),
(349, 28175928),
(350, 17789998),
(351, 72281375),
(352, 12217647),
(353, 82147663),
(354, 35779354),
(355, 99394373),
(356, 82389317),
(357, 52544598),
(358, 48543873),
(359, 25437893),
(360, 23432823),
(361, 75326758),
(362, 29423874),
(363, 43829326),
(364, 25393281),
(365, 84172678),
(366, 56126696),
(367, 28185342),
(368, 47255269),
(369, 82693425),
(370, 93784447),
(371, 48378625),
(372, 48411142),
(373, 34668878),
(374, 74915777),
(375, 48271179),
(376, 41494573),
(377, 41341772),
(378, 82965158),
(379, 48491841),
(380, 56561813),
(381, 45974856),
(382, 51776476),
(383, 55935135),
(384, 91649112),
(385, 16476162),
(386, 19794378),
(387, 83825698),
(388, 18729355),
(389, 94628662),
(390, 73118795),
(391, 34769258),
(392, 76744754),
(393, 72341874),
(394, 78919227),
(395, 91166547),
(396, 68186718),
(397, 32659349),
(398, 62664715),
(399, 42669683),
(400, 27352382),
(401, 63981112),
(402, 58537511),
(403, 32718952),
(404, 82556816),
(405, 12443348),
(406, 55158529),
(407, 12499464),
(408, 33195679),
(409, 44451559),
(410, 95214358),
(411, 36556154),
(412, 28542449),
(413, 24328252),
(414, 32122423),
(415, 82989559),
(416, 87547432),
(417, 32533873),
(418, 26394687),
(419, 75513114),
(420, 41534124),
(421, 23248796),
(422, 42684824),
(423, 26486631),
(424, 57546473),
(425, 32658247),
(426, 68883562),
(427, 31897522),
(428, 91937116),
(429, 42579637),
(430, 71276389),
(431, 78397338),
(432, 15921685),
(433, 87582158),
(434, 57795312),
(435, 12685687),
(436, 85629758),
(437, 84211921),
(438, 87933131),
(439, 31599152),
(440, 75658512),
(441, 16728557),
(442, 25312342),
(443, 24429797),
(444, 24892464),
(445, 43447115),
(446, 53413539),
(447, 87652945),
(448, 29715184),
(449, 35552839),
(450, 44682764),
(451, 78982744),
(452, 19542337),
(453, 36729637),
(454, 58947438),
(455, 39955472),
(456, 61584116),
(457, 79495936),
(458, 83689984),
(459, 29958663),
(460, 96333667),
(461, 59314366),
(462, 89745854),
(463, 84739761),
(464, 19773644),
(465, 59985698),
(466, 31385151),
(467, 84511966),
(468, 56538849),
(469, 66954865),
(470, 67193141),
(471, 82952325),
(472, 48456652),
(473, 28522965),
(474, 82781631),
(475, 92258867),
(476, 17891321),
(477, 43258682),
(478, 34349935),
(479, 65561865),
(480, 95954658),
(481, 45347814),
(482, 68869618),
(483, 48158668),
(484, 35355247),
(485, 68567416),
(486, 21166268),
(487, 92961235),
(488, 11857754),
(489, 55244286),
(490, 27163467),
(491, 58946499),
(492, 29666377),
(493, 62457364),
(494, 84995697),
(495, 51627357),
(496, 91215189),
(497, 78865964),
(498, 78372214),
(499, 26174115),
(500, 94448349);

-- --------------------------------------------------------

--
-- Table structure for table `mysecurity`
--

CREATE TABLE `mysecurity` (
  `mysecurityid` int(11) NOT NULL,
  `mysecurityque` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mysecurity`
--

INSERT INTO `mysecurity` (`mysecurityid`, `mysecurityque`) VALUES
(1, 'Mother maiden name?'),
(2, 'Name of your first child?'),
(3, 'Where did you meet your spouse?'),
(4, 'What is your best food?'),
(5, 'What is your best color?'),
(6, 'Who is your best friend?'),
(7, 'Last 4 digit of your passport');

-- --------------------------------------------------------

--
-- Table structure for table `nsps_iv`
--

CREATE TABLE `nsps_iv` (
  `id` bigint(20) NOT NULL,
  `memberid` bigint(20) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nsps_iv`
--

INSERT INTO `nsps_iv` (`id`, `memberid`, `emailid`, `name`, `date`) VALUES
(1, 1, 'editor-in-chief@jnsps.org', 'Prof. Babatunde Falaye', '2019-03-09'),
(2, 1, 'babatunde.falaye@gmail.com', 'Prof. Babatunde Falaye', '2019-03-09'),
(3, 1, 'babatunde.falaye@science.fulafia.edu.ng', 'Prof. Babatunde Falaye', '2019-03-09'),
(4, 0, 'hussainigm@gmail.com', 'HUSSAINI GARBA MOHAMMED', '2019-03-10'),
(5, 0, 'tayookunlola@hotmail.com', 'OKUNLOLA Temitayo Joseph', '2019-03-10'),
(6, 2, 'falana.funmiloayo@yahoo.com', 'Mrs Abejide Funmilayo', '2019-03-11'),
(7, 2, 'flomake2003@gmail.com', 'Mrs Odeyemi', '2019-03-11'),
(8, 2, 'sowowlabi2000@yahoo.com', 'Dr. Owolabi Solomon', '2019-03-11'),
(9, 12, 'falanaabimbola@yahoo.com', 'Afe Babalola University, Ado Ekiti', '2019-03-13'),
(10, 32, 'mariovye@yahoo.com', 'Mr. Mari Ovye', '2019-11-17'),
(11, 32, 'mainamuhammed1@gmail.com', 'Mr. Maina Muhammad Badamasi ', '2019-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `sexx`
--

CREATE TABLE `sexx` (
  `sexid` int(11) NOT NULL,
  `sex` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sexx`
--

INSERT INTO `sexx` (`sexid`, `sex`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusid` bigint(20) NOT NULL,
  `status` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusid`, `status`) VALUES
(1, 'Application Submitted'),
(2, 'Application Under Review'),
(3, 'Account Scheduled for Deletion'),
(4, 'Application Rejected'),
(5, 'Application Accepted'),
(6, 'Due for Renewal'),
(7, 'Student Member'),
(8, 'Associate Member'),
(9, 'Regular Member'),
(10, 'Life Member'),
(11, 'Honorary Fellow'),
(12, 'Fellow');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `titleid` bigint(20) NOT NULL,
  `title` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`titleid`, `title`) VALUES
(1, 'Miss.'),
(2, 'Mrs.'),
(3, 'Mr.'),
(4, 'Mallam'),
(5, 'Col.'),
(6, 'Dr.'),
(7, 'Dr. Dr.'),
(8, 'Ass. Prof. '),
(9, 'Prof.'),
(10, 'Prof. Dr.'),
(11, 'Prof. Dr. Dr.');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeid` bigint(20) NOT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeid`, `type`) VALUES
(1, 'Regular Member (MNSPS)'),
(2, 'Associate Membership (ANSPS)'),
(3, 'Student Membership (SNSPS)'),
(4, 'Life Membership (LNSPS)'),
(5, 'Honorary Fellow (Hon. FNSPS) '),
(6, 'Fellow');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abstract`
--
ALTER TABLE `abstract`
  ADD PRIMARY KEY (`paper_number`);

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`countryid`),
  ADD UNIQUE KEY `country_name` (`country_name`);

--
-- Indexes for table `certs`
--
ALTER TABLE `certs`
  ADD PRIMARY KEY (`certid`),
  ADD UNIQUE KEY `cert` (`cert`);

--
-- Indexes for table `conf`
--
ALTER TABLE `conf`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `keynote`
--
ALTER TABLE `keynote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mysecurity`
--
ALTER TABLE `mysecurity`
  ADD PRIMARY KEY (`mysecurityid`);

--
-- Indexes for table `nsps_iv`
--
ALTER TABLE `nsps_iv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailid` (`emailid`);

--
-- Indexes for table `sexx`
--
ALTER TABLE `sexx`
  ADD PRIMARY KEY (`sexid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusid`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`titleid`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keynote`
--
ALTER TABLE `keynote`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
