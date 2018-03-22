-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 11 Février 2018 à 05:53
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `luxtrot`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id_adresse` int(11) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `certificat_residence` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `id_pays`, `ville`, `rue`, `code_postal`, `certificat_residence`) VALUES
(41, 450, 'fianarantsoa', 'Sahalava', 301, 'http://localhost/luxtrot/uploads/profile/0db0747e8c2a7adf6fa9880a94c2bc1f.jpg'),
(26, 450, 'tana', 'road', 101, 'http://localhost/luxtrot/uploads/profile/02f2d04cbcbf2183f7d4c9d88ad61d11.jpg'),
(25, 450, 'Antananarivo', 'ambatofinandrahana centre', 304, 'http://localhost/luxtrot/uploads/profile/b56998131ea84d6f505c5bead3aa85e7.jpg'),
(27, 450, 'Fianarantsoa', 'Tambohobe', 301, 'http://localhost/luxtrot/uploads/profile/84b44df6a67b04043cef17155fef2d8e.jpg'),
(33, 450, 'tanana', 'boulevard de l europe', 101, 'http://localhost/luxtrot/uploads/profile/3107389601391effca6d97545dafba4b.jpg'),
(40, 450, 'Antananarivo', 'Boulevard de l \'europe', 101, 'http://localhost/luxtrot/uploads/profile/5dae82484e706768ebe50564fdc6ed35.jpg'),
(37, 450, 'antsirabe', 'Andranomanelatra', 110, 'http://localhost/luxtrot/uploads/profile/6779cf8a833ce787bcf42980cb887976.png'),
(38, 450, 'ANGERS', '67 HA RUE DES LAURIERS', 49000, 'http://localhost/luxtrot/uploads/profile/2ebeb66fed74a57c2767147a3ab2bf23.jpg'),
(39, 450, 'ANGERS', '67 HA RUE DES LAURIERS', 49000, 'http://localhost/luxtrot/uploads/profile/0fba855bd1172ca20dc421740803fb12.jpg'),
(42, 450, 'Fianarantsoa', 'zaz', 301, 'http://localhost/luxtrot/uploads/profile/aeb83a1b322eecae300b0e35b17179f1.jpg'),
(43, 450, 'Antananarivo', '67 HA', 101, 'http://localhost/luxtrot/uploads/profile/24b0aff5260801274e8cd8858568d2d4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(18, 'chaussure'),
(17, 'vetement'),
(16, 'accessoire');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `date_commande` date NOT NULL,
  `qte_commande` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `date_commande`, `qte_commande`, `id_user`, `id_produit`, `id_facture`) VALUES
(6, '2018-01-12', 5, 1, 27, 0),
(5, '2018-01-13', 2, 1, 26, 0);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `text_comment` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `currency_name` varchar(64) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  `symbol` varchar(150) NOT NULL,
  `hex` varchar(150) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `currency`
--

INSERT INTO `currency` (`currency_id`, `currency_name`, `currency_code`, `symbol`, `hex`, `status`) VALUES
(1, 'Andorran Peseta', 'ADP', '', '', NULL),
(2, 'United Arab Emirates Dirham', 'AED', 'د.إ', 'د.إ', NULL),
(3, 'Afghanistan Afghani', 'AFA', '', '', NULL),
(4, 'Albanian Lek', 'ALL', '', '', NULL),
(5, 'Netherlands Antillian Guilder', 'ANG', 'ƒ', 'ƒ', NULL),
(6, 'Angolan Kwanza', 'AOK', '', '', NULL),
(7, 'Argentine Peso', 'ARS', '$', '$', NULL),
(9, 'Australian Dollar', 'AUD', 'A$', 'A$', NULL),
(10, 'Aruban Florin', 'AWG', '', '', NULL),
(11, 'Barbados Dollar', 'BBD', '', '', NULL),
(12, 'Bangladeshi Taka', 'BDT', '', '', NULL),
(14, 'Bulgarian Lev', 'BGN', '', '', NULL),
(15, 'Bahraini Dinar', 'BHD', '', '', NULL),
(16, 'Burundi Franc', 'BIF', '', '', NULL),
(17, 'Bermudian Dollar', 'BMD', '', '', NULL),
(18, 'Brunei Dollar', 'BND', '', '', NULL),
(19, 'Bolivian Boliviano', 'BOB', '', '', NULL),
(20, 'Brazilian Real', 'BRL', 'R$', 'R$', NULL),
(21, 'Bahamian Dollar', 'BSD', 'B$', 'B$', NULL),
(22, 'Bhutan Ngultrum', 'BTN', '', '', NULL),
(23, 'Burma Kyat', 'BUK', '', '', NULL),
(24, 'Botswanian Pula', 'BWP', '', '', NULL),
(25, 'Belize Dollar', 'BZD', '', '', NULL),
(26, 'Canadian Dollar', 'CAD', '$', '$', NULL),
(27, 'Swiss Franc', 'CHF', 'CHF', 'CHF', NULL),
(28, 'Chilean Unidades de Fomento', 'CLF', '', '', NULL),
(29, 'Chilean Peso', 'CLP', '$', '$', NULL),
(30, 'Yuan (Chinese) Renminbi', 'CNY', '¥', '¥', NULL),
(31, 'Colombian Peso', 'COP', '$', '$', NULL),
(32, 'Costa Rican Colon', 'CRC', '', '', NULL),
(33, 'Czech Republic Koruna', 'CZK', 'Kč', 'Kč', NULL),
(34, 'Cuban Peso', 'CUP', '', '', NULL),
(35, 'Cape Verde Escudo', 'CVE', '', '', NULL),
(36, 'Cyprus Pound', 'CYP', '', '', NULL),
(40, 'Danish Krone', 'DKK', 'kr', 'kr', NULL),
(41, 'Dominican Peso', 'DOP', '', '', NULL),
(42, 'Algerian Dinar', 'DZD', '', '', NULL),
(43, 'Ecuador Sucre', 'ECS', '', '', NULL),
(44, 'Egyptian Pound', 'EGP', '', '', NULL),
(45, 'Estonian Kroon (EEK)', 'EEK', '', '', NULL),
(46, 'Ethiopian Birr', 'ETB', '', '', NULL),
(47, 'Euro', 'EUR', '€', '€', NULL),
(49, 'Fiji Dollar', 'FJD', 'FJ$', 'FJ$', NULL),
(50, 'Falkland Islands Pound', 'FKP', '', '', NULL),
(52, 'British Pound', 'GBP', '£', '£', NULL),
(53, 'Ghanaian Cedi', 'GHC', '', '', NULL),
(54, 'Gibraltar Pound', 'GIP', '', '', NULL),
(55, 'Gambian Dalasi', 'GMD', '', '', NULL),
(56, 'Guinea Franc', 'GNF', '', '', NULL),
(58, 'Guatemalan Quetzal', 'GTQ', 'Q', 'Q', NULL),
(59, 'Guinea-Bissau Peso', 'GWP', '', '', NULL),
(60, 'Guyanan Dollar', 'GYD', '', '', NULL),
(61, 'Hong Kong Dollar', 'HKD', '$', '$', NULL),
(62, 'Honduran Lempira', 'HNL', 'L', 'L', NULL),
(63, 'Haitian Gourde', 'HTG', '', '', NULL),
(64, 'Hungarian Forint', 'HUF', 'Ft', 'Ft', NULL),
(65, 'Indonesian Rupiah', 'IDR', 'Rp', 'Rp', NULL),
(66, 'Irish Punt', 'IEP', '', '', NULL),
(67, 'Israeli Shekel', 'ILS', '₪', '₪', NULL),
(68, 'Indian Rupee', 'INR', '₹', '₹', 1),
(69, 'Iraqi Dinar', 'IQD', '', '', NULL),
(70, 'Iranian Rial', 'IRR', '', '', NULL),
(73, 'Jamaican Dollar', 'JMD', 'J$', 'J$', NULL),
(74, 'Jordanian Dinar', 'JOD', '', '', NULL),
(75, 'Japanese Yen', 'JPY', '¥', '¥', NULL),
(76, 'Kenyan Schilling', 'KES', '', '', NULL),
(77, 'Kampuchean (Cambodian) Riel', 'KHR', '', '', NULL),
(78, 'Comoros Franc', 'KMF', '', '', NULL),
(79, 'North Korean Won', 'KPW', '', '', NULL),
(80, '(South) Korean Won', 'KRW', '₩', '₩', NULL),
(81, 'Kuwaiti Dinar', 'KWD', '', '', NULL),
(82, 'Cayman Islands Dollar', 'KYD', '', '', NULL),
(83, 'Lao Kip', 'LAK', '', '', NULL),
(84, 'Lebanese Pound', 'LBP', '', '', NULL),
(85, 'Sri Lanka Rupee', 'LKR', '₨', '₨', NULL),
(86, 'Liberian Dollar', 'LRD', '', '', NULL),
(87, 'Lesotho Loti', 'LSL', '', '', NULL),
(89, 'Libyan Dinar', 'LYD', '', '', NULL),
(90, 'Moroccan Dirham', 'MAD', '.د.م', '.د.م', NULL),
(91, 'Malagasy Franc', 'MGF', '', '', NULL),
(92, 'Mongolian Tugrik', 'MNT', '', '', NULL),
(93, 'Macau Pataca', 'MOP', '', '', NULL),
(94, 'Mauritanian Ouguiya', 'MRO', '', '', NULL),
(95, 'Maltese Lira', 'MTL', '', '', NULL),
(96, 'Mauritius Rupee', 'MUR', '', '', NULL),
(97, 'Maldive Rufiyaa', 'MVR', '', '', NULL),
(98, 'Malawi Kwacha', 'MWK', '', '', NULL),
(99, 'Mexican Peso', 'MXP', '', '', NULL),
(100, 'Malaysian Ringgit', 'MYR', 'RM', 'RM', NULL),
(101, 'Mozambique Metical', 'MZM', '', '', NULL),
(102, 'Namibian Dollar', 'NAD', '', '', NULL),
(103, 'Nigerian Naira', 'NGN', '', '', NULL),
(104, 'Nicaraguan Cordoba', 'NIO', '', '', NULL),
(105, 'Norwegian Kroner', 'NOK', 'kr', 'kr', NULL),
(106, 'Nepalese Rupee', 'NPR', '', '', NULL),
(107, 'New Zealand Dollar', 'NZD', '$', '$', NULL),
(108, 'Omani Rial', 'OMR', '', '', NULL),
(109, 'Panamanian Balboa', 'PAB', 'B/.', 'B/.', NULL),
(110, 'Peruvian Nuevo Sol', 'PEN', 'S/.', 'S/.', NULL),
(111, 'Papua New Guinea Kina', 'PGK', '', '', NULL),
(112, 'Philippine Peso', 'PHP', '₱', '₱', NULL),
(113, 'Pakistan Rupee', 'PKR', '₨', '₨', NULL),
(114, 'Polish Zloty', 'PLN', 'zł', 'zł', NULL),
(116, 'Paraguay Guarani', 'PYG', '', '', NULL),
(117, 'Qatari Rial', 'QAR', '', '', NULL),
(118, 'Romanian Leu', 'RON', 'lei', 'lei', NULL),
(119, 'Rwanda Franc', 'RWF', '', '', NULL),
(120, 'Saudi Arabian Riyal', 'SAR', '', '', NULL),
(121, 'Solomon Islands Dollar', 'SBD', '', '', NULL),
(122, 'Seychelles Rupee', 'SCR', '', '', NULL),
(123, 'Sudanese Pound', 'SDP', '', '', NULL),
(124, 'Swedish Krona', 'SEK', 'kr', 'kr', NULL),
(125, 'Singapore Dollar', 'SGD', 'S$', 'S$', NULL),
(126, 'St. Helena Pound', 'SHP', '', '', NULL),
(127, 'Sierra Leone Leone', 'SLL', '', '', NULL),
(128, 'Somali Schilling', 'SOS', '', '', NULL),
(129, 'Suriname Guilder', 'SRG', '', '', NULL),
(130, 'Sao Tome and Principe Dobra', 'STD', '', '', NULL),
(131, 'Russian Ruble', 'RUB', 'руб', 'руб', NULL),
(132, 'El Salvador Colon', 'SVC', '', '', NULL),
(133, 'Syrian Potmd', 'SYP', '', '', NULL),
(134, 'Swaziland Lilangeni', 'SZL', '', '', NULL),
(135, 'Thai Baht', 'THB', '฿', '฿', NULL),
(136, 'Tunisian Dinar', 'TND', 'DT', 'DT', NULL),
(137, 'Tongan Paanga', 'TOP', '', '', NULL),
(138, 'East Timor Escudo', 'TPE', '', '', NULL),
(139, 'Turkish Lira', 'TRY', 'TL', 'TL', NULL),
(140, 'Trinidad and Tobago Dollar', 'TTD', '$', '$', NULL),
(141, 'Taiwan Dollar', 'TWD', 'NT$', 'NT$', NULL),
(142, 'Tanzanian Schilling', 'TZS', '', '', NULL),
(143, 'Uganda Shilling', 'UGX', '', '', NULL),
(144, 'US Dollar', 'USD', '$', '$', NULL),
(145, 'Uruguayan Peso', 'UYU', '', '', NULL),
(146, 'Venezualan Bolivar', 'VEF', 'Bs', 'Bs', NULL),
(147, 'Vietnamese Dong', 'VND', '₫', '₫', NULL),
(148, 'Vanuatu Vatu', 'VUV', '', '', NULL),
(149, 'Samoan Tala', 'WST', '', '', NULL),
(150, 'CommunautÃƒÂ© FinanciÃƒÂ¨re Africaine BEAC, Francs', 'XAF', 'FCFA', 'FCFA', NULL),
(151, 'Silver, Ounces', 'XAG', '', '', NULL),
(152, 'Gold, Ounces', 'XAU', '', '', NULL),
(153, 'East Caribbean Dollar', 'XCD', '$', '$', NULL),
(154, 'International Monetary Fund (IMF) Special Drawing Rights', 'XDR', '', '', NULL),
(155, 'CommunautÃƒÂ© FinanciÃƒÂ¨re Africaine BCEAO - Francs', 'XOF', '', '', NULL),
(156, 'Palladium Ounces', 'XPD', '', '', NULL),
(157, 'Comptoirs FranÃƒÂ§ais du Pacifique Francs', 'XPF', 'F', 'F', NULL),
(158, 'Platinum, Ounces', 'XPT', '', '', NULL),
(159, 'Democratic Yemeni Dinar', 'YDD', '', '', NULL),
(160, 'Yemeni Rial', 'YER', '', '', NULL),
(161, 'New Yugoslavia Dinar', 'YUD', '', '', NULL),
(162, 'South African Rand', 'ZAR', 'R', 'R', NULL),
(163, 'Zambian Kwacha', 'ZMK', '', '', NULL),
(164, 'Zaire Zaire', 'ZRZ', '', '', NULL),
(165, 'Zimbabwe Dollar', 'ZWD', '', '', NULL),
(166, 'Slovak Koruna', 'SKK', '', '', NULL),
(167, 'Armenian Dram', 'AMD', '', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `dimension`
--

CREATE TABLE `dimension` (
  `id_dimension` int(11) NOT NULL,
  `taille_produit` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(11) NOT NULL,
  `ref_facture` varchar(255) NOT NULL,
  `date_facture` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`id_facture`, `ref_facture`, `date_facture`) VALUES
(1, 'fact20171115071508', '2017-11-15'),
(2, 'fact20171115071706', '2017-11-23');

-- --------------------------------------------------------

--
-- Structure de la table `image_produit`
--

CREATE TABLE `image_produit` (
  `id_image_produit` int(11) NOT NULL,
  `link_image_pple` varchar(255) NOT NULL,
  `link_image_1` varchar(255) DEFAULT NULL,
  `link_image_2` varchar(255) DEFAULT NULL,
  `link_image_3` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image_produit`
--

INSERT INTO `image_produit` (`id_image_produit`, `link_image_pple`, `link_image_1`, `link_image_2`, `link_image_3`) VALUES
(21, 'http://localhost/luxtrot/uploads/produit/0da36335da93ab798d58f12214ad39f7.jpg', 'http://localhost/luxtrot/uploads/produit/bfac15e1614aa824e0d770c9b8cc7e17.jpg', 'http://localhost/luxtrot/uploads/produit/b14f747be714677c1d888e736fe99a3f.jpg', 'http://localhost/luxtrot/uploads/produit/6a753331288cd86fd63e06f05a9a5638.jpg'),
(22, 'http://localhost/luxtrot/uploads/produit/acc0275cacac0e181b6377105e09a1af.jpg', 'http://localhost/luxtrot/uploads/produit/87e17d6548ffc7bccef3a5b6f3fc8771.jpg', 'http://localhost/luxtrot/uploads/produit/62b42d04934d12aa9036ee119247e749.jpg', 'http://localhost/luxtrot/uploads/produit/894e8a1b1cca36330af5ccdf85d278d0.jpg'),
(25, 'http://localhost/luxtrot/uploads/produit/0b0039a596ac1bb0b5df6734c04a8c5c.jpg', 'http://localhost/luxtrot/uploads/produit/c95624f81724c73a6ad0a04d64e2bdd6.jpg', 'http://localhost/luxtrot/uploads/produit/9ccafc4867f1555ccc602ebb36a62f25.jpg', 'http://localhost/luxtrot/uploads/produit/2175b17476e476bb3cba3a5198e99f58.jpg'),
(26, 'http://localhost/luxtrot/uploads/produit/7df7adc72089396cc786f6cbc5570d62.jpg', 'http://localhost/luxtrot/uploads/produit/250af1c18333158098988632603e58f7.jpg', 'http://localhost/luxtrot/uploads/produit/34fb5a8c26e6f4ae7c198e4a731258e1.jpg', 'http://localhost/luxtrot/uploads/produit/daf09a5a2480dfa146240cb33a8a99d5.jpg'),
(27, 'http://localhost/luxtrot/uploads/produit/1c699a4e0f19024a82c0133a95d3dd49.jpg', 'http://localhost/luxtrot/uploads/produit/968794e39e4d184bf3f8ffe536b261c2.jpg', 'http://localhost/luxtrot/uploads/produit/7c83b588a7639cb0737efe578d1c4cce.jpg', 'http://localhost/luxtrot/uploads/produit/02c080fb9cd94d027f1d5a15ff94198e.jpg'),
(28, 'http://localhost/luxtrot/uploads/produit/ddc4d5cf13fdb142b37f1d416f804d3c.jpg', 'http://localhost/luxtrot/uploads/produit/3646b465f22508a3c1a9fd17ec3768d5.jpg', 'http://localhost/luxtrot/uploads/produit/e04499ff1201961ee553ee4ef128c638.jpg', 'http://localhost/luxtrot/uploads/produit/8e3e6f82aa3c8b8a3ea7f990ef0400cb.jpg'),
(29, 'http://localhost/luxtrot/uploads/produit/13ef4ae1f62b9707599b5beb7f8cca77.jpg', 'http://localhost/luxtrot/uploads/produit/2d170674045a5747613948a387fb5008.jpg', 'http://localhost/luxtrot/uploads/produit/ed6e3e1cfaef347f2a8d87e1161d440d.jpg', 'http://localhost/luxtrot/uploads/produit/c3e6d2cca8a2d26316363c5d6302ef36.jpg'),
(30, 'http://localhost/luxtrot/uploads/produit/758553ba4cdf94f9a7d9c00f5420eca6.jpeg', 'http://localhost/luxtrot/uploads/produit/700a143490f2f0fb3b53ee4a7e30b72d.jpg', 'http://localhost/luxtrot/uploads/produit/874c6278452fadac054c1c5c6c429518.jpg', 'http://localhost/luxtrot/uploads/produit/21d9b14d5ded5ff9614113d99c96f86a.jpg'),
(31, 'http://localhost/luxtrot/uploads/produit/8a5e3fe838b70c4ab280b0cba1bfa024.jpg', 'http://localhost/luxtrot/uploads/produit/53d2cb1bc557191e03b2b919885052b5.jpg', 'http://localhost/luxtrot/uploads/produit/10d8bf6091311eac4e82db8d8c3808a0.jpg', 'http://localhost/luxtrot/uploads/produit/aa9df872154ae21ef8358f7f442201e2.jpg'),
(32, 'http://localhost/luxtrot/uploads/produit/1fc0ddc641b04e9301fcb326b6a3e065.jpg', 'http://localhost/luxtrot/uploads/produit/3ea49600302a5f4c6df1c904651ed8c7.jpg', 'http://localhost/luxtrot/uploads/produit/6d1b86a762b509f472e6068a691b2232.jpg', 'http://localhost/luxtrot/uploads/produit/ddb39e3d4c9ff5f2c6bbf4cae53b69f9.jpg'),
(33, 'http://localhost/luxtrot/uploads/produit/ca80989db764444a39c6a68de5a1098b.jpg', 'http://localhost/luxtrot/uploads/produit/4d0fbb9bf5a68a76a9e5513a1cd3d4c8.jpg', 'http://localhost/luxtrot/uploads/produit/e79ccfa08bc6cab8c97affd98e8d0312.jpg', 'http://localhost/luxtrot/uploads/produit/447b7bdd85312e6533c59dd2e056743f.jpg'),
(40, 'http://localhost/luxtrot/uploads/produit/8854e2bfdab80aa53620302782c63f24.jpg', 'http://localhost/luxtrot/uploads/produit/840190e2d966515fd6c8a4616800e9af.jpg', 'http://localhost/luxtrot/uploads/produit/0c716d626a8eb18e9959f9bd33f49443.jpg', 'http://localhost/luxtrot/uploads/produit/40b37a98f9e863ad598277e033e5ef5b.jpg'),
(39, 'http://localhost/luxtrot/uploads/produit/81f419aabc19a998a34e4b363f7a5eaf.jpg', 'http://localhost/luxtrot/uploads/produit/6f832772a51669788b16abd9140f1661.jpg', 'http://localhost/luxtrot/uploads/produit/faad94d705cb1a2f87e087f019b4ee8b.jpg', 'http://localhost/luxtrot/uploads/produit/46e392032f41cd74283aea6c5022af80.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `information_entreprise`
--

CREATE TABLE `information_entreprise` (
  `id_profile` int(11) NOT NULL,
  `pseudo_info` varchar(255) NOT NULL,
  `nom_dirigeant` varchar(255) NOT NULL,
  `prenom_dirigeant` varchar(255) NOT NULL,
  `numero_tva` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `image_link_piece_identity` varchar(255) NOT NULL,
  `coord_bancaire_society` varchar(255) NOT NULL,
  `acte_constitution_society` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `information_entreprise`
--

INSERT INTO `information_entreprise` (`id_profile`, `pseudo_info`, `nom_dirigeant`, `prenom_dirigeant`, `numero_tva`, `telephone`, `image_link_piece_identity`, `coord_bancaire_society`, `acte_constitution_society`, `id_user`) VALUES
(1, 'pseudo', 'nom', 'prenom', '30030167', '5555541102', 'http://localhost/luxtrot/uploads/info_pro/7112d3df1524236322b3c79c8583a98a.jpg', '10000950001560000', '', 1),
(2, 'kimsociete', 'nom', 'prenom', '100001523', '111111', 'http://localhost/luxtrot/uploads/info_pro/09780b4998549a500d64ded60956a0cf.jpg', '100000000', '', 26),
(3, 'kimsociete', 'nom', 'prenom', '100001523', '111111', 'http://localhost/luxtrot/uploads/info_pro/764b951111b636d5680b64b0f9fb1739.jpg', '100000000', '', 26);

-- --------------------------------------------------------

--
-- Structure de la table `like`
--

CREATE TABLE `like` (
  `id_like` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id_marque` int(11) NOT NULL,
  `nom_marque` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`id_marque`, `nom_marque`) VALUES
(24, 'NIKE'),
(23, 'ADIDAS'),
(22, 'DELL'),
(56, 'lacoste'),
(55, 'caterpillar'),
(54, 'all star');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `corps_message` varchar(255) NOT NULL,
  `date_envoi` datetime NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL,
  `status_delete_sender` varchar(15) NOT NULL,
  `status_delete_receiver` varchar(15) NOT NULL,
  `status_view_receiver` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_message`, `corps_message`, `date_envoi`, `id_sender`, `id_receiver`, `status_delete_sender`, `status_delete_receiver`, `status_view_receiver`) VALUES
(5, 'Bonjour cruz', '2017-12-12 07:30:59', 26, 1, 'N', 'N', 'N'),
(6, 'Bonjour mahery', '2017-12-12 07:31:14', 1, 26, 'N', 'N', 'N'),
(7, 'comment tu vas?', '2017-12-12 07:31:31', 26, 1, 'N', 'N', 'N'),
(8, 'ça va bien merci', '2017-12-12 07:31:49', 1, 26, 'N', 'N', 'N'),
(9, 'ton produit, il est toujours dispo?', '2017-12-12 07:32:10', 26, 1, 'N', 'N', 'N'),
(10, 'oui, j en ai encore en stock si tu veu commander :)', '2017-12-12 07:32:34', 1, 26, 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `id_produit`, `id_profile`) VALUES
(10, 27, 33),
(18, 32, 32),
(8, 26, 33),
(19, 27, 32),
(6, 27, 1),
(21, 27, 38),
(14, 33, 1),
(20, 27, 1),
(22, 33, 39),
(23, 35, 40),
(24, 32, 1),
(25, 34, 1),
(26, 39, 1),
(27, 27, 1),
(28, 0, 1),
(29, 27, 1),
(30, 27, 1),
(31, 27, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `code` int(3) NOT NULL,
  `alpha2` varchar(2) NOT NULL,
  `alpha3` varchar(3) NOT NULL,
  `nom_en_gb` varchar(45) NOT NULL,
  `nom_fr_fr` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `code`, `alpha2`, `alpha3`, `nom_en_gb`, `nom_fr_fr`) VALUES
(1, 4, 'AF', 'AFG', 'Afghanistan', 'Afghanistan'),
(2, 8, 'AL', 'ALB', 'Albania', 'Albanie'),
(3, 10, 'AQ', 'ATA', 'Antarctica', 'Antarctique'),
(4, 12, 'DZ', 'DZA', 'Algeria', 'Algérie'),
(5, 16, 'AS', 'ASM', 'American Samoa', 'Samoa Américaines'),
(6, 20, 'AD', 'AND', 'Andorra', 'Andorre'),
(7, 24, 'AO', 'AGO', 'Angola', 'Angola'),
(8, 28, 'AG', 'ATG', 'Antigua and Barbuda', 'Antigua-et-Barbuda'),
(9, 31, 'AZ', 'AZE', 'Azerbaijan', 'Azerbaïdjan'),
(10, 32, 'AR', 'ARG', 'Argentina', 'Argentine'),
(11, 36, 'AU', 'AUS', 'Australia', 'Australie'),
(12, 40, 'AT', 'AUT', 'Austria', 'Autriche'),
(13, 44, 'BS', 'BHS', 'Bahamas', 'Bahamas'),
(14, 48, 'BH', 'BHR', 'Bahrain', 'Bahreïn'),
(15, 50, 'BD', 'BGD', 'Bangladesh', 'Bangladesh'),
(16, 51, 'AM', 'ARM', 'Armenia', 'Arménie'),
(17, 52, 'BB', 'BRB', 'Barbados', 'Barbade'),
(18, 56, 'BE', 'BEL', 'Belgium', 'Belgique'),
(19, 60, 'BM', 'BMU', 'Bermuda', 'Bermudes'),
(20, 64, 'BT', 'BTN', 'Bhutan', 'Bhoutan'),
(21, 68, 'BO', 'BOL', 'Bolivia', 'Bolivie'),
(22, 70, 'BA', 'BIH', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine'),
(23, 72, 'BW', 'BWA', 'Botswana', 'Botswana'),
(24, 74, 'BV', 'BVT', 'Bouvet Island', 'Île Bouvet'),
(25, 76, 'BR', 'BRA', 'Brazil', 'Brésil'),
(26, 84, 'BZ', 'BLZ', 'Belize', 'Belize'),
(27, 86, 'IO', 'IOT', 'British Indian Ocean Territory', 'Territoire Britannique de l\'Océan Indien'),
(28, 90, 'SB', 'SLB', 'Solomon Islands', 'Îles Salomon'),
(29, 92, 'VG', 'VGB', 'British Virgin Islands', 'Îles Vierges Britanniques'),
(30, 96, 'BN', 'BRN', 'Brunei Darussalam', 'Brunéi Darussalam'),
(31, 100, 'BG', 'BGR', 'Bulgaria', 'Bulgarie'),
(32, 104, 'MM', 'MMR', 'Myanmar', 'Myanmar'),
(33, 108, 'BI', 'BDI', 'Burundi', 'Burundi'),
(34, 112, 'BY', 'BLR', 'Belarus', 'Bélarus'),
(35, 116, 'KH', 'KHM', 'Cambodia', 'Cambodge'),
(36, 120, 'CM', 'CMR', 'Cameroon', 'Cameroun'),
(37, 124, 'CA', 'CAN', 'Canada', 'Canada'),
(38, 132, 'CV', 'CPV', 'Cape Verde', 'Cap-vert'),
(39, 136, 'KY', 'CYM', 'Cayman Islands', 'Îles Caïmanes'),
(40, 140, 'CF', 'CAF', 'Central African', 'République Centrafricaine'),
(41, 144, 'LK', 'LKA', 'Sri Lanka', 'Sri Lanka'),
(42, 148, 'TD', 'TCD', 'Chad', 'Tchad'),
(43, 152, 'CL', 'CHL', 'Chile', 'Chili'),
(44, 156, 'CN', 'CHN', 'China', 'Chine'),
(45, 158, 'TW', 'TWN', 'Taiwan', 'Taïwan'),
(46, 162, 'CX', 'CXR', 'Christmas Island', 'Île Christmas'),
(47, 166, 'CC', 'CCK', 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)'),
(48, 170, 'CO', 'COL', 'Colombia', 'Colombie'),
(49, 174, 'KM', 'COM', 'Comoros', 'Comores'),
(50, 175, 'YT', 'MYT', 'Mayotte', 'Mayotte'),
(51, 178, 'CG', 'COG', 'Republic of the Congo', 'République du Congo'),
(52, 180, 'CD', 'COD', 'The Democratic Republic Of The Congo', 'République Démocratique du Congo'),
(53, 184, 'CK', 'COK', 'Cook Islands', 'Îles Cook'),
(54, 188, 'CR', 'CRI', 'Costa Rica', 'Costa Rica'),
(55, 191, 'HR', 'HRV', 'Croatia', 'Croatie'),
(56, 192, 'CU', 'CUB', 'Cuba', 'Cuba'),
(57, 196, 'CY', 'CYP', 'Cyprus', 'Chypre'),
(58, 203, 'CZ', 'CZE', 'Czech Republic', 'République Tchèque'),
(59, 204, 'BJ', 'BEN', 'Benin', 'Bénin'),
(60, 208, 'DK', 'DNK', 'Denmark', 'Danemark'),
(61, 212, 'DM', 'DMA', 'Dominica', 'Dominique'),
(62, 214, 'DO', 'DOM', 'Dominican Republic', 'République Dominicaine'),
(63, 218, 'EC', 'ECU', 'Ecuador', 'Équateur'),
(64, 222, 'SV', 'SLV', 'El Salvador', 'El Salvador'),
(65, 226, 'GQ', 'GNQ', 'Equatorial Guinea', 'Guinée Équatoriale'),
(66, 231, 'ET', 'ETH', 'Ethiopia', 'Éthiopie'),
(67, 232, 'ER', 'ERI', 'Eritrea', 'Érythrée'),
(68, 233, 'EE', 'EST', 'Estonia', 'Estonie'),
(69, 234, 'FO', 'FRO', 'Faroe Islands', 'Îles Féroé'),
(70, 238, 'FK', 'FLK', 'Falkland Islands', 'Îles (malvinas) Falkland'),
(71, 239, 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les Îles Sandwich du Sud'),
(72, 242, 'FJ', 'FJI', 'Fiji', 'Fidji'),
(73, 246, 'FI', 'FIN', 'Finland', 'Finlande'),
(74, 248, 'AX', 'ALA', 'Åland Islands', 'Îles Åland'),
(75, 250, 'FR', 'FRA', 'France', 'France'),
(76, 254, 'GF', 'GUF', 'French Guiana', 'Guyane Française'),
(77, 258, 'PF', 'PYF', 'French Polynesia', 'Polynésie Française'),
(78, 260, 'TF', 'ATF', 'French Southern Territories', 'Terres Australes Françaises'),
(79, 262, 'DJ', 'DJI', 'Djibouti', 'Djibouti'),
(80, 266, 'GA', 'GAB', 'Gabon', 'Gabon'),
(81, 268, 'GE', 'GEO', 'Georgia', 'Géorgie'),
(82, 270, 'GM', 'GMB', 'Gambia', 'Gambie'),
(83, 275, 'PS', 'PSE', 'Occupied Palestinian Territory', 'Territoire Palestinien Occupé'),
(84, 276, 'DE', 'DEU', 'Germany', 'Allemagne'),
(85, 288, 'GH', 'GHA', 'Ghana', 'Ghana'),
(86, 292, 'GI', 'GIB', 'Gibraltar', 'Gibraltar'),
(87, 296, 'KI', 'KIR', 'Kiribati', 'Kiribati'),
(88, 300, 'GR', 'GRC', 'Greece', 'Grèce'),
(89, 304, 'GL', 'GRL', 'Greenland', 'Groenland'),
(90, 308, 'GD', 'GRD', 'Grenada', 'Grenade'),
(91, 312, 'GP', 'GLP', 'Guadeloupe', 'Guadeloupe'),
(92, 316, 'GU', 'GUM', 'Guam', 'Guam'),
(93, 320, 'GT', 'GTM', 'Guatemala', 'Guatemala'),
(94, 324, 'GN', 'GIN', 'Guinea', 'Guinée'),
(95, 328, 'GY', 'GUY', 'Guyana', 'Guyana'),
(96, 332, 'HT', 'HTI', 'Haiti', 'Haïti'),
(97, 334, 'HM', 'HMD', 'Heard Island and McDonald Islands', 'Îles Heard et Mcdonald'),
(98, 336, 'VA', 'VAT', 'Vatican City State', 'Saint-Siège (état de la Cité du Vatican)'),
(99, 340, 'HN', 'HND', 'Honduras', 'Honduras'),
(100, 344, 'HK', 'HKG', 'Hong Kong', 'Hong-Kong'),
(101, 348, 'HU', 'HUN', 'Hungary', 'Hongrie'),
(102, 352, 'IS', 'ISL', 'Iceland', 'Islande'),
(103, 356, 'IN', 'IND', 'India', 'Inde'),
(104, 360, 'ID', 'IDN', 'Indonesia', 'Indonésie'),
(105, 364, 'IR', 'IRN', 'Islamic Republic of Iran', 'République Islamique d\'Iran'),
(106, 368, 'IQ', 'IRQ', 'Iraq', 'Iraq'),
(107, 372, 'IE', 'IRL', 'Ireland', 'Irlande'),
(108, 376, 'IL', 'ISR', 'Israel', 'Israël'),
(109, 380, 'IT', 'ITA', 'Italy', 'Italie'),
(110, 384, 'CI', 'CIV', 'Côte d\'Ivoire', 'Côte d\'Ivoire'),
(111, 388, 'JM', 'JAM', 'Jamaica', 'Jamaïque'),
(112, 392, 'JP', 'JPN', 'Japan', 'Japon'),
(113, 398, 'KZ', 'KAZ', 'Kazakhstan', 'Kazakhstan'),
(114, 400, 'JO', 'JOR', 'Jordan', 'Jordanie'),
(115, 404, 'KE', 'KEN', 'Kenya', 'Kenya'),
(116, 408, 'KP', 'PRK', 'Democratic People\'s Republic of Korea', 'République Populaire Démocratique de Corée'),
(117, 410, 'KR', 'KOR', 'Republic of Korea', 'République de Corée'),
(118, 414, 'KW', 'KWT', 'Kuwait', 'Koweït'),
(119, 417, 'KG', 'KGZ', 'Kyrgyzstan', 'Kirghizistan'),
(120, 418, 'LA', 'LAO', 'Lao People\'s Democratic Republic', 'République Démocratique Populaire Lao'),
(121, 422, 'LB', 'LBN', 'Lebanon', 'Liban'),
(122, 426, 'LS', 'LSO', 'Lesotho', 'Lesotho'),
(123, 428, 'LV', 'LVA', 'Latvia', 'Lettonie'),
(124, 430, 'LR', 'LBR', 'Liberia', 'Libéria'),
(125, 434, 'LY', 'LBY', 'Libyan Arab Jamahiriya', 'Jamahiriya Arabe Libyenne'),
(126, 438, 'LI', 'LIE', 'Liechtenstein', 'Liechtenstein'),
(127, 440, 'LT', 'LTU', 'Lithuania', 'Lituanie'),
(128, 442, 'LU', 'LUX', 'Luxembourg', 'Luxembourg'),
(129, 446, 'MO', 'MAC', 'Macao', 'Macao'),
(130, 450, 'MG', 'MDG', 'Madagascar', 'Madagascar'),
(131, 454, 'MW', 'MWI', 'Malawi', 'Malawi'),
(132, 458, 'MY', 'MYS', 'Malaysia', 'Malaisie'),
(133, 462, 'MV', 'MDV', 'Maldives', 'Maldives'),
(134, 466, 'ML', 'MLI', 'Mali', 'Mali'),
(135, 470, 'MT', 'MLT', 'Malta', 'Malte'),
(136, 474, 'MQ', 'MTQ', 'Martinique', 'Martinique'),
(137, 478, 'MR', 'MRT', 'Mauritania', 'Mauritanie'),
(138, 480, 'MU', 'MUS', 'Mauritius', 'Maurice'),
(139, 484, 'MX', 'MEX', 'Mexico', 'Mexique'),
(140, 492, 'MC', 'MCO', 'Monaco', 'Monaco'),
(141, 496, 'MN', 'MNG', 'Mongolia', 'Mongolie'),
(142, 498, 'MD', 'MDA', 'Republic of Moldova', 'République de Moldova'),
(143, 500, 'MS', 'MSR', 'Montserrat', 'Montserrat'),
(144, 504, 'MA', 'MAR', 'Morocco', 'Maroc'),
(145, 508, 'MZ', 'MOZ', 'Mozambique', 'Mozambique'),
(146, 512, 'OM', 'OMN', 'Oman', 'Oman'),
(147, 516, 'NA', 'NAM', 'Namibia', 'Namibie'),
(148, 520, 'NR', 'NRU', 'Nauru', 'Nauru'),
(149, 524, 'NP', 'NPL', 'Nepal', 'Népal'),
(150, 528, 'NL', 'NLD', 'Netherlands', 'Pays-Bas'),
(151, 530, 'AN', 'ANT', 'Netherlands Antilles', 'Antilles Néerlandaises'),
(152, 533, 'AW', 'ABW', 'Aruba', 'Aruba'),
(153, 540, 'NC', 'NCL', 'New Caledonia', 'Nouvelle-Calédonie'),
(154, 548, 'VU', 'VUT', 'Vanuatu', 'Vanuatu'),
(155, 554, 'NZ', 'NZL', 'New Zealand', 'Nouvelle-Zélande'),
(156, 558, 'NI', 'NIC', 'Nicaragua', 'Nicaragua'),
(157, 562, 'NE', 'NER', 'Niger', 'Niger'),
(158, 566, 'NG', 'NGA', 'Nigeria', 'Nigéria'),
(159, 570, 'NU', 'NIU', 'Niue', 'Niué'),
(160, 574, 'NF', 'NFK', 'Norfolk Island', 'Île Norfolk'),
(161, 578, 'NO', 'NOR', 'Norway', 'Norvège'),
(162, 580, 'MP', 'MNP', 'Northern Mariana Islands', 'Îles Mariannes du Nord'),
(163, 581, 'UM', 'UMI', 'United States Minor Outlying Islands', 'Îles Mineures Éloignées des États-Unis'),
(164, 583, 'FM', 'FSM', 'Federated States of Micronesia', 'États Fédérés de Micronésie'),
(165, 584, 'MH', 'MHL', 'Marshall Islands', 'Îles Marshall'),
(166, 585, 'PW', 'PLW', 'Palau', 'Palaos'),
(167, 586, 'PK', 'PAK', 'Pakistan', 'Pakistan'),
(168, 591, 'PA', 'PAN', 'Panama', 'Panama'),
(169, 598, 'PG', 'PNG', 'Papua New Guinea', 'Papouasie-Nouvelle-Guinée'),
(170, 600, 'PY', 'PRY', 'Paraguay', 'Paraguay'),
(171, 604, 'PE', 'PER', 'Peru', 'Pérou'),
(172, 608, 'PH', 'PHL', 'Philippines', 'Philippines'),
(173, 612, 'PN', 'PCN', 'Pitcairn', 'Pitcairn'),
(174, 616, 'PL', 'POL', 'Poland', 'Pologne'),
(175, 620, 'PT', 'PRT', 'Portugal', 'Portugal'),
(176, 624, 'GW', 'GNB', 'Guinea-Bissau', 'Guinée-Bissau'),
(177, 626, 'TL', 'TLS', 'Timor-Leste', 'Timor-Leste'),
(178, 630, 'PR', 'PRI', 'Puerto Rico', 'Porto Rico'),
(179, 634, 'QA', 'QAT', 'Qatar', 'Qatar'),
(180, 638, 'RE', 'REU', 'Réunion', 'Réunion'),
(181, 642, 'RO', 'ROU', 'Romania', 'Roumanie'),
(182, 643, 'RU', 'RUS', 'Russian Federation', 'Fédération de Russie'),
(183, 646, 'RW', 'RWA', 'Rwanda', 'Rwanda'),
(184, 654, 'SH', 'SHN', 'Saint Helena', 'Sainte-Hélène'),
(185, 659, 'KN', 'KNA', 'Saint Kitts and Nevis', 'Saint-Kitts-et-Nevis'),
(186, 660, 'AI', 'AIA', 'Anguilla', 'Anguilla'),
(187, 662, 'LC', 'LCA', 'Saint Lucia', 'Sainte-Lucie'),
(188, 666, 'PM', 'SPM', 'Saint-Pierre and Miquelon', 'Saint-Pierre-et-Miquelon'),
(189, 670, 'VC', 'VCT', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les Grenadines'),
(190, 674, 'SM', 'SMR', 'San Marino', 'Saint-Marin'),
(191, 678, 'ST', 'STP', 'Sao Tome and Principe', 'Sao Tomé-et-Principe'),
(192, 682, 'SA', 'SAU', 'Saudi Arabia', 'Arabie Saoudite'),
(193, 686, 'SN', 'SEN', 'Senegal', 'Sénégal'),
(194, 690, 'SC', 'SYC', 'Seychelles', 'Seychelles'),
(195, 694, 'SL', 'SLE', 'Sierra Leone', 'Sierra Leone'),
(196, 702, 'SG', 'SGP', 'Singapore', 'Singapour'),
(197, 703, 'SK', 'SVK', 'Slovakia', 'Slovaquie'),
(198, 704, 'VN', 'VNM', 'Vietnam', 'Viet Nam'),
(199, 705, 'SI', 'SVN', 'Slovenia', 'Slovénie'),
(200, 706, 'SO', 'SOM', 'Somalia', 'Somalie'),
(201, 710, 'ZA', 'ZAF', 'South Africa', 'Afrique du Sud'),
(202, 716, 'ZW', 'ZWE', 'Zimbabwe', 'Zimbabwe'),
(203, 724, 'ES', 'ESP', 'Spain', 'Espagne'),
(204, 732, 'EH', 'ESH', 'Western Sahara', 'Sahara Occidental'),
(205, 736, 'SD', 'SDN', 'Sudan', 'Soudan'),
(206, 740, 'SR', 'SUR', 'Suriname', 'Suriname'),
(207, 744, 'SJ', 'SJM', 'Svalbard and Jan Mayen', 'Svalbard etÎle Jan Mayen'),
(208, 748, 'SZ', 'SWZ', 'Swaziland', 'Swaziland'),
(209, 752, 'SE', 'SWE', 'Sweden', 'Suède'),
(210, 756, 'CH', 'CHE', 'Switzerland', 'Suisse'),
(211, 760, 'SY', 'SYR', 'Syrian Arab Republic', 'République Arabe Syrienne'),
(212, 762, 'TJ', 'TJK', 'Tajikistan', 'Tadjikistan'),
(213, 764, 'TH', 'THA', 'Thailand', 'Thaïlande'),
(214, 768, 'TG', 'TGO', 'Togo', 'Togo'),
(215, 772, 'TK', 'TKL', 'Tokelau', 'Tokelau'),
(216, 776, 'TO', 'TON', 'Tonga', 'Tonga'),
(217, 780, 'TT', 'TTO', 'Trinidad and Tobago', 'Trinité-et-Tobago'),
(218, 784, 'AE', 'ARE', 'United Arab Emirates', 'Émirats Arabes Unis'),
(219, 788, 'TN', 'TUN', 'Tunisia', 'Tunisie'),
(220, 792, 'TR', 'TUR', 'Turkey', 'Turquie'),
(221, 795, 'TM', 'TKM', 'Turkmenistan', 'Turkménistan'),
(222, 796, 'TC', 'TCA', 'Turks and Caicos Islands', 'Îles Turks et Caïques'),
(223, 798, 'TV', 'TUV', 'Tuvalu', 'Tuvalu'),
(224, 800, 'UG', 'UGA', 'Uganda', 'Ouganda'),
(225, 804, 'UA', 'UKR', 'Ukraine', 'Ukraine'),
(226, 807, 'MK', 'MKD', 'The Former Yugoslav Republic of Macedonia', 'L\'ex-République Yougoslave de Macédoine'),
(227, 818, 'EG', 'EGY', 'Egypt', 'Égypte'),
(228, 826, 'GB', 'GBR', 'United Kingdom', 'Royaume-Uni'),
(229, 833, 'IM', 'IMN', 'Isle of Man', 'Île de Man'),
(230, 834, 'TZ', 'TZA', 'United Republic Of Tanzania', 'République-Unie de Tanzanie'),
(231, 840, 'US', 'USA', 'United States', 'États-Unis'),
(232, 850, 'VI', 'VIR', 'U.S. Virgin Islands', 'Îles Vierges des États-Unis'),
(233, 854, 'BF', 'BFA', 'Burkina Faso', 'Burkina Faso'),
(234, 858, 'UY', 'URY', 'Uruguay', 'Uruguay'),
(235, 860, 'UZ', 'UZB', 'Uzbekistan', 'Ouzbékistan'),
(236, 862, 'VE', 'VEN', 'Venezuela', 'Venezuela'),
(237, 876, 'WF', 'WLF', 'Wallis and Futuna', 'Wallis et Futuna'),
(238, 882, 'WS', 'WSM', 'Samoa', 'Samoa'),
(239, 887, 'YE', 'YEM', 'Yemen', 'Yémen'),
(240, 891, 'CS', 'SCG', 'Serbia and Montenegro', 'Serbie-et-Monténégro'),
(241, 894, 'ZM', 'ZMB', 'Zambia', 'Zambie');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(100) NOT NULL,
  `type_produit` varchar(100) NOT NULL,
  `qte_produit` double NOT NULL,
  `prix_unitaire` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `id_marque` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `type_produit`, `qte_produit`, `prix_unitaire`, `description`, `dimension`, `id_pays`, `id_marque`, `id_categorie`, `id_image`, `id_user`) VALUES
(27, 't-shirt', 'vetement leger ', 5, 1500, 'essayer l\'experience de notre nouvel game de vetement en pur coton pour vous mettre plus a l\'aise dans vos mouvement', 'XL', 450, 23, 17, 21, 1),
(28, 'chaussure', 'tennis de sport ', 10, 150, 'essayer l\'experience de notre nouvel game de vetement en pur coton pour vous mettre plus a l\'aise dans vos mouvement', 'XL', 450, 24, 18, 22, 1),
(32, 'converse', 'tennis de sport ', 100, 150, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '40', 450, 54, 18, 26, 1),
(33, 'blouson', 'vetement chaud', 100, 150, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'XL', 450, 24, 17, 27, 1),
(34, 'polo', 'vetement ', 100, 150, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'XL', 450, 24, 17, 28, 1),
(35, 'botte', 'chaussure', 100, 150, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '41', 450, 55, 18, 29, 1),
(36, 'chemise', 'chemise', 100, 150, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'XL', 450, 56, 17, 30, 1),
(37, 'casquette', 'anti soleil', 100, 150, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'XL', 450, 24, 17, 31, 1),
(38, 'capuche', 'vetement chaud', 100, 150, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'XL', 450, 23, 17, 32, 1),
(39, 'pantalon', 'vetement', 100, 150, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'XL', 450, 56, 17, 33, 1),
(46, 'test', 'test', 1, 1, 'aaa', '1', 450, 23, 18, 40, 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `type_role` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id_role`, `type_role`) VALUES
(1, 'kim'),
(2, 'yoko'),
(3, 'nouveau');

-- --------------------------------------------------------

--
-- Structure de la table `user_data`
--

CREATE TABLE `user_data` (
  `id_user` int(10) NOT NULL,
  `email` varchar(225) CHARACTER SET utf8 NOT NULL,
  `password_encrypted` varchar(255) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `status_pro` varchar(10) DEFAULT NULL,
  `id_adresse` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user_data`
--

INSERT INTO `user_data` (`id_user`, `email`, `password_encrypted`, `salt`, `date_creation`, `id_role`, `status_pro`, `id_adresse`) VALUES
(1, 'cruz@gmail.com', '4dae8857db9fec2c9f488ae0d87ff4b3', '52c7915d4e0b6d93268b1f63bfd4578b', '2017-11-24 08:18:33', 1, 'P', 25),
(26, 'mahery@gmail.com', '04961939875e762f0853c2d577ca384b', '469147ce7dec55db89d691892e513f71', '2017-11-27 01:15:48', 3, 'E', 26),
(41, 'zaza@gmail.com', '9abb900b749d08d87da1d96eca6ef33f', '8ba97607a1485ccdbe19745ed80cd52d', '2018-02-07 11:28:26', 1, 'P', 42),
(42, 'email@gmail.com', '05bf1f2b9440a35ab5542906bf88cdde', '0c83f57c786a0b4a39efab23731c7ebc', '2018-02-09 07:09:52', 1, 'P', 43),
(32, 'fanouh@gmail.com', '1b07806e88f0903058c2f306ab2f5065', '083c4093a27e77a132fb72cae42f581d', '2018-01-12 08:54:26', 1, 'P', 37),
(33, 'mozart@gmail.com', 'c11e91a51d5a63600a5761fc14165d14', 'e842795b282293fd61bc294c49edb12b', '2018-01-12 08:54:55', 1, 'P', 27),
(34, 'sefo@gmail.com', 'cf05a3e07a26506f46302510d432e3f9', 'dfdb6ee373fffa05ed280e559bd43082', '2018-01-12 11:37:01', 1, 'P', 38),
(40, 'louv@gmail.com', '8601d89114fe0709bd687312c774c2cf', 'c09f66284a8cefb2a89c1fdd779e892d', '2018-02-06 06:23:55', 1, 'P', 41);

-- --------------------------------------------------------

--
-- Structure de la table `user_profile`
--

CREATE TABLE `user_profile` (
  `id_profile` int(11) NOT NULL,
  `pseudo_profile` varchar(255) NOT NULL,
  `nom_profile` varchar(100) NOT NULL,
  `prenom_profile` varchar(100) NOT NULL,
  `contact_profile` varchar(100) NOT NULL,
  `sexe_profile` varchar(15) NOT NULL,
  `date_naiss_profile` date NOT NULL,
  `image_link_profile` varchar(255) NOT NULL,
  `piece_identite_profile` varchar(255) NOT NULL,
  `coord_bancaire_profile` varchar(255) NOT NULL,
  `langue_parle_profile` varchar(255) NOT NULL,
  `text_marketing_profile` varchar(255) NOT NULL,
  `id_pays_profile` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user_profile`
--

INSERT INTO `user_profile` (`id_profile`, `pseudo_profile`, `nom_profile`, `prenom_profile`, `contact_profile`, `sexe_profile`, `date_naiss_profile`, `image_link_profile`, `piece_identite_profile`, `coord_bancaire_profile`, `langue_parle_profile`, `text_marketing_profile`, `id_pays_profile`, `id_user`) VALUES
(19, 'Fandresena', 'Ravoninahidraibe', 'Mahery', '0338171117', 'Homme', '1996-04-07', 'http://localhost/luxtrot/uploads/info_pro/3eef3e1b11997c154767053d40439df4.jpg', 'http://localhost/luxtrot/uploads/profile/2431d21698af7ccf9d99386053455b06.jpg', '202010900', 'francais', 'Sed eu est vulputate, fringilla ligula ac, maximus arcu. Donec sed felis vel magna mattis ornare ut non turpis. Sed id arcu elit. Sed nec sagittis tortor. Mauris ante urna, ornare sit amet mollis eu, aliquet ac ligula. Nullam dolor metus, suscipit ac impe', 450, 1),
(40, 'Kim_mozart', 'Giselman', 'Ravoninahidraibe', '0340610655', 'Homme', '1994-02-17', 'http://localhost/luxtrot/uploads/info_pro/11c004ca83edfc60a0694748e1ae0e72.jpg', 'http://localhost/luxtrot/uploads/profile/6ff1e8ef781c70c00d2c23a815538bf9.jpg', '202010011900', 'francais', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte', 450, 33),
(53, 'sefo', 'sefo', 'chef', '0338172305', 'Femme', '0000-00-00', 'http://localhost/luxtrot/uploads/profile/5f465001ff3d519387bcd644502fc3dd.jpg', 'http://localhost/luxtrot/uploads/profile/164dcf935bb51a077db8af8768e82371.jpg', '110000115', 'undefined', 'bonjour tout le monde', 450, 34),
(52, 'IaryFanou', 'Hary', 'Fanomezana', '0338172305', 'femme', '0000-00-00', 'http://localhost/luxtrot/uploads/profile/e26275b1271f51718301ee4bddc7d6a2.jpg', 'http://localhost/luxtrot/uploads/profile/d9fe703f7da51864eb68ead30e82778d.jpg', '123456', 'undefined', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte', 450, 32),
(55, 'kim', 'ravoninahidraibe', 'tomy', '0338172305', 'homme', '0000-00-00', 'http://localhost/luxtrot/uploads/profile/1b67e39a06bac20d7522e4b631f7209a.jpg', 'http://localhost/luxtrot/uploads/profile/85da5c4689d420d17942c74840c2e7dd.jpeg', '123456', 'undefined', 'Bonjour, je suis nouveau dans l\'application, et je suis faciné par la mode', 450, 39),
(56, 'Kim', 'Louv', 'Box', '0338172305', 'Homme', '0000-00-00', 'http://localhost/luxtrot/uploads/profile/94a2ddcc938518c531bfc0001f1a59b5.jpg', 'http://localhost/luxtrot/uploads/profile/f66f07f8ba717aca7f7953227c3c33f5.jpg', '110000115', 'undefined', 'coucou c est moi', 450, 40),
(57, 'kim', 'zaza', 'zaza', '03333', 'homme', '0000-00-00', 'http://localhost/luxtrot/uploads/profile/b145559de2565d2d89f865475c008d67.jpg', 'http://localhost/luxtrot/uploads/profile/0d4e9c690740fad379f789ee4cf07279.jpg', '110000115', 'undefined', 'welcome', 450, 41),
(58, 'kim', 'google', 'email', '0338172305', 'homme', '0000-00-00', 'http://localhost/luxtrot/uploads/profile/2e85f6309f282efce6566e0660c79bdd.jpg', 'http://localhost/luxtrot/uploads/profile/083f3a2bde1530521e11835b2b67e810.jpg', '110000115', 'undefined', 'hello world', 450, 42);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_profile` (`id_user`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_facture` (`id_facture`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Index pour la table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`),
  ADD KEY `idx_currency_name` (`currency_name`);

--
-- Index pour la table `dimension`
--
ALTER TABLE `dimension`
  ADD PRIMARY KEY (`id_dimension`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_facture`);

--
-- Index pour la table `image_produit`
--
ALTER TABLE `image_produit`
  ADD PRIMARY KEY (`id_image_produit`);

--
-- Index pour la table `information_entreprise`
--
ALTER TABLE `information_entreprise`
  ADD PRIMARY KEY (`id_profile`);

--
-- Index pour la table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id_like`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_marque`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_profile` (`id_profile`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alpha2` (`alpha2`),
  ADD UNIQUE KEY `alpha3` (`alpha3`),
  ADD UNIQUE KEY `code_unique` (`code`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT pour la table `dimension`
--
ALTER TABLE `dimension`
  MODIFY `id_dimension` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `image_produit`
--
ALTER TABLE `image_produit`
  MODIFY `id_image_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `information_entreprise`
--
ALTER TABLE `information_entreprise`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `like`
--
ALTER TABLE `like`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pour la table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
