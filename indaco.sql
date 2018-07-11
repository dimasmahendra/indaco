-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2018 at 08:28 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indaco`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `isi_indo` text COLLATE utf8_unicode_ci NOT NULL,
  `isi_eng` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `isi_indo`, `isi_eng`) VALUES
(1, '<p>Yogyakarta</p>', '<p>Pakuningratan</p>');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `idx` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` varchar(5) DEFAULT NULL,
  `birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`idx`, `name`, `address`, `sex`, `birthdate`) VALUES
(1, 'Dimas', 'Jalan', '0', '2018-03-18'),
(2, 'yot', 'jalan sawit', '0', '2018-03-22'),
(3, 'A', 'Jalan A', '0', '2018-03-16'),
(4, 'B', 'Jalan B', '1', '2018-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE `bahasa` (
  `idx` int(11) NOT NULL,
  `bahasa` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahasa`
--

INSERT INTO `bahasa` (`idx`, `bahasa`, `slug`) VALUES
(1, 'Indonesia', 'id'),
(2, 'english', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `categoryevent`
--

CREATE TABLE `categoryevent` (
  `idx` int(11) NOT NULL,
  `categoryevent` varchar(50) DEFAULT NULL,
  `description` text,
  `image` varchar(100) NOT NULL DEFAULT '0',
  `slug` varchar(50) DEFAULT NULL,
  `idparent` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categorynews`
--

CREATE TABLE `categorynews` (
  `idx` int(11) UNSIGNED ZEROFILL NOT NULL,
  `categorynews` varchar(50) DEFAULT NULL,
  `description` text,
  `image` varchar(100) NOT NULL DEFAULT '0',
  `slug` varchar(50) DEFAULT NULL,
  `idparent` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categoryprogram`
--

CREATE TABLE `categoryprogram` (
  `idx` int(11) UNSIGNED ZEROFILL NOT NULL,
  `categoryprogram` varchar(50) DEFAULT NULL,
  `description` text,
  `image` varchar(100) NOT NULL DEFAULT '0',
  `slug` varchar(50) DEFAULT NULL,
  `idparent` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `idx` int(10) NOT NULL,
  `judul` text,
  `isiawal` text,
  `isi` text,
  `idbahasa` int(10) DEFAULT NULL,
  `idmenu` int(10) DEFAULT NULL,
  `idkomponen` int(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `idadmin` int(11) DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  `image1` text,
  `image2` text,
  `image3` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_to_image`
--

CREATE TABLE `content_to_image` (
  `idx` int(11) NOT NULL,
  `idcontent` int(11) DEFAULT NULL,
  `idimage` int(11) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_to_kategori`
--

CREATE TABLE `content_to_kategori` (
  `idx` int(11) NOT NULL,
  `idcontent` int(11) DEFAULT NULL,
  `idkategori` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_to_tag`
--

CREATE TABLE `content_to_tag` (
  `idx` int(11) NOT NULL,
  `idcontent` int(11) DEFAULT NULL,
  `idmeatatag` int(11) DEFAULT NULL,
  `content` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `idx` int(11) NOT NULL,
  `title_ind` varchar(200) DEFAULT NULL,
  `title_eng` varchar(200) DEFAULT NULL,
  `description_ind` text,
  `description_eng` text,
  `kategori` int(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`idx`, `title_ind`, `title_eng`, `description_ind`, `description_eng`, `kategori`, `tanggal`) VALUES
(1, 'kok', 'we', '<p>lop</p>', '<p>de</p>', 0, '2018-03-05'),
(2, 'Baru', 'New', '<p>Saja</p>', '<p>One</p>', 0, '2018-03-05'),
(4, 'er', 'lklkl', '<p>wew</p>', '<p>poopopo</p>', 1, '2018-03-20'),
(6, 'w', 'ee', '<p>r</p>', '<p>dd</p>', 1, '2018-03-17'),
(7, 'sdsdsd', 'EE', '<p>xcxcc</p>', '<p>jkjkjkjk</p>', 1, '2018-03-17'),
(8, 'DEDE', 'YUYU', '<p>FOFO</p>', '<p>CICI</p>', 1, '2018-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `event_artist`
--

CREATE TABLE `event_artist` (
  `idx` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_artist`
--

INSERT INTO `event_artist` (`idx`, `event_id`, `artist_id`) VALUES
(31, 1, 2),
(33, 4, 1),
(34, 4, 2),
(35, 4, 3),
(36, 4, 4),
(39, 2, 3),
(41, 6, 1),
(42, 7, 2),
(43, 8, 1),
(44, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `event_to_category`
--

CREATE TABLE `event_to_category` (
  `idx` int(11) NOT NULL,
  `idevent` int(11) DEFAULT NULL,
  `idcategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imagemanager`
--

CREATE TABLE `imagemanager` (
  `idx` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `alt` varchar(50) DEFAULT NULL,
  `update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `in_inspirasi`
--

CREATE TABLE `in_inspirasi` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_inspirasi`
--

INSERT INTO `in_inspirasi` (`id`, `name`) VALUES
(1, 'Inspirasi 1'),
(2, 'Inspirasi 2');

-- --------------------------------------------------------

--
-- Table structure for table `in_inspirasi_detail`
--

CREATE TABLE `in_inspirasi_detail` (
  `id` int(11) NOT NULL,
  `inspirasi_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_inspirasi_detail`
--

INSERT INTO `in_inspirasi_detail` (`id`, `inspirasi_id`, `name`, `image1`, `image2`) VALUES
(1, 1, 'Firm Woodgrano', 'inspirasi-firm-woodgrano.png', 'inspirasi-firm-woodgrano.jpg'),
(2, 1, 'Firm Graniteur', 'inspirasi-firm-graniteur.png', 'inspirasi-firm-graniteur-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `in_post_categories`
--

CREATE TABLE `in_post_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_post_categories`
--

INSERT INTO `in_post_categories` (`id`, `name`, `description`) VALUES
(1, 'Eksterior', ''),
(2, 'Interior', '');

-- --------------------------------------------------------

--
-- Table structure for table `in_post_content`
--

CREATE TABLE `in_post_content` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `video_url` varchar(250) DEFAULT NULL,
  `categories` text NOT NULL,
  `source` varchar(50) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_post_content`
--

INSERT INTO `in_post_content` (`id`, `title`, `author`, `content`, `image`, `video_url`, `categories`, `source`, `created`) VALUES
(1, 'Solusi Dinding Lembab Saat Musim Penghujan', 'Aji Baskoro', 'Memasuki musim penghujan, dinding rumah mesti menjadi perhatian. Pasalnya, guyuran air hujan yang terus menerus dapat berdampak buruk pada dinding rumah. Dinding akan menjadi lembab. Kelembaban tidak hanya terjadi pada dinding luar rumah yang langsung menerima guyuran air hujan, tetapi juga kerap merembes sampai ke dinding bagian dalam.\r\n\r\nKelembaban yang terjadi pada dinding rumah tidak boleh diabaikan. Pasalnya, hal itu dapat memicu kerusakan-kerusakan lain yang lebih parah, misalnya lapisan cat menjadi mengapur, menggelembung atau mengelupas. Kerusakan tersebut terjadi karena tingginya kadar air di dalam dinding.\r\n\r\nSalah satu cara supaya dinding rumah tidak lembab selama musim penghujan, adalah dengan melapisi dinding dengan cat tembok tahan air. Namun sebelumnya, ada beberapa prosedur yang harus dilakukan sehingga hasil pengecatan bisa optimal.\r\n\r\nPertama-tama, harus dipastikan bahwa kelembaban yang terjadi pada dinding tidak disebabkan oleh kebocoran. Jika ternyata kelembaban tersebut akibat kebocoran, maka kebocoran itulah yang wajib diselesaikan terlebih dahulu.\r\n\r\nJika kondisi dinding belum lembab, maka pengecatan bisa langsung dilakukan. Sementara jika dinding sudah lembab, harus dipastikan terlebih dahulu bahwa cat lama yang masih menempel dalam kondisi baik dan tidak mudah mengelupas. Jika cat dinding ternyata sudah mengelupas, maka perlu dilakukan pengerokan hingga bersih sebelum memulai pengecatan.\r\n\r\nUntuk mendapatkan perlindungan optimal pada dinding rumah, disarankan supaya memilih produk cat dinding dengan kualitas prima, baik dalam hal ketahanan warna, maupun kerekatan lapisan. Terlebih, untuk dinding luar ruangan yang langsung terkena sinar matahari dan air hujan.\r\n\r\nDalam hal ini, dua produk unggulan PT. Indaco Warna Dunia dapat menjadi pilihan yang tepat. Yang pertama adalah Belazo Climagard, cat eksterior yang tidak hanya memberikan perlindungan cuaca hingga tujuh tahun, tetapi juga memiliki ribuan pilhan warna menarik. Yang kedua adalah Top Seal, cat dengan lapisan elastis yang dapat menahan air hujan, sehingga tidak mudah meresap ke dalam lapisan tembok.', 'carakami-eksterior-1.jpg', NULL, '{0:1,1:5}', 'www.bernas.id', 0),
(2, 'Penyebab Nailhead Rusting', '', 'Bagaimana memperbaiki dinding yang sudah kena nailhead rusting?\r\n\r\nNailhead Rusting merupakan situasi di mana paku berkarat yang menancap ke dinding menimbulkan noda cokelat kemerahan di permukaan cat. Sebabnya, paku yang digunakan tidak dilapisi anti karat sehingga tidak tahan lama. Dalam mengatasi hal ini, Anda bisa mencegahnya dengan memilih paku yang sudah mengandung lapisan anti karat.\r\n\r\nBagaimana memperbaiki dinding yang sudah kena nailhead rusting?\r\n\r\nMemperbaiki dinding dengan nailhead rusting memang tidak mudah, karena tidak cukup dengan langsung melapisi ulang dengan cat baru. Berikut beberapa hal yang bisa Anda terapkan:\r\n\r\nAmpelas bagian dinding yang kena karat atau nailhead rusting. Ini adalah satu cara untuk membersihkan bekas karat hingga tidak bersisa.\r\nMelapisi dengan primer anti karat. Dalam hal ini Anda bisa gunakan Envi Anti Corrosive Primer. Lalu cat ulang dengan Envi Wall Putty.\r\nLalu Anda bisa memaku ulang dengan paku baru. Tentunya yang mengandung lapisan anti karat, atau berbahan galvanis.', 'carakami-eksterior-2.jpg', NULL, '{0:1,1:5}', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `in_products`
--

CREATE TABLE `in_products` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `type_title` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ind_description` text NOT NULL,
  `eng_description` text,
  `features_id` text COMMENT 'json from in_product_feature',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_products`
--

INSERT INTO `in_products` (`id`, `type_id`, `type_title`, `name`, `ind_description`, `eng_description`, `features_id`, `image`) VALUES
(1, 1, 'WATER BASED SYSTEM', 'Alkali Sealer', 'Belazo Alkali Sealer - Water Based Alkali Sealer adalah cat dasar premium berbahan dasar air dengan perlindungan ganda terhadap serangan garam- garam alkali pada permukaan tembok baru, batu bata, plester dan asbes di dalam maupun di luar ruangan. Belazo Alkali Sealer mempunyai keunggulan untuk meningkatkan daya rekat cat tembok di atasnya, sehingga terhindar dari masalah menggelembung, mengelupas dan mengapur.\r\n\r\nPetunjuk pemakaian untuk hasil terbaik : Untuk permukaan tembok baru, permukaan yang akan dicat harus dibersihkan dahulu dengan baik. Pastikan permukaan tembok sudah kering (pembacaan skala protimeter di bawah 18% dan kadar keasaman tembok 7-8). Lapiskan Belazo Alkali Sealer 1x lapis dengan pengenceran 15% air bersih.\r\n\r\nUntuk permukaan tembok lama, apabila cat lama sudah mengelupas atau mengapur harus dikerok terlebih dahulu. Bila diperlukan, amplas dan bersihkan debu hasil pengamplasan. Aplikasikan Belazo Alkali Sealer 1x lapis dengan pengenceran 15% air bersih, dan kuaskan secara merata di seluruh permukaan tembok. Untuk hasil yang sempurna, gunakan minimum 2 lapisan cat akhir.\r\n\r\nPetunjuk keselamatan : Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.', NULL, '{0:1,1:2,2:5}', 'belazo-alkalisealer.png'),
(2, 1, 'WATER BASED SYSTEM', 'Kidzdream', 'Belazo Kidzdream - Easy Wash adalah cat tembok interior bagi Anda yang mendukung dan mengembangkan kreasi anak tanpa harus khawatir tembok akan kotor. Dengan Stain Proof Anti Graffiti Technology, terbukti mampu menahan noda seperti kopi, teh, krayon, lumpur, debu dan noda lainnya yang tidak meresap dalam lapisan cat, sehingga dapat dibersihkan tanpa merusak lapisan cat.\r\n\r\nPetunjuk pemakaian untuk hasil terbaik : Pastikan dinding telah benar-benar kering dan bersih sebelum dicat. Amplas permukaan dinding jika perlu. Untuk permukaan tembok baru sebaiknya diberikan waktu pengeringan semen minimal 1 bulan dengan kadar air maksimum 18% dan maksimum pH 8.\r\n\r\nUntuk permukaan tembok lama periksa dahulu daya rekat cat tembok yang lama. Jika diperlukan, lakukan pengerokan kemudian dibersihkan kembali. Berilah satu lapis Belazo Alkali Sealer sebelum mengecat permukaan tersebut dengan Belazo Kidzdream terutama pada permukaan tembok baru atau pada permukaan tembok lama yang mempunyai kelembaban tinggi.\r\n\r\nDaya sebar optimum adalah 13-15 m2/liter per lapisan, tergantung porositas permukaan.\r\n\r\nPetunjuk keselamatan : Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.', NULL, '{0:2,1:3,3:5,4:1}', 'belazo-kidzdream.png'),
(3, 1, 'WATER BASED SYSTEM', 'Maxima', 'Belazo Maxima - Durable Luxurious Finish adalah cat tembok 100% akrilik berbahan dasar air untuk hasil maksimal dan mewah pada dinding interior. Dengan Multi Function Formula yang memiliki daya rekat tinggi, sempurna untuk aplikasi pada dinding yang menggunakan cat dasar Belazo Alkali Sealer. Belazo Maxima tanpa timbal dan merkuri serta rendah VOC, bau dan toksisitas.\r\n\r\nPetunjuk untuk pemakaian terbaik : Pastikan dinding telah benar-benar kering dan bersih sebelum dicat. Amplas permukaan dinding jika perlu. Untuk permukaan tembok baru sebaiknya diberikan waktu pengeringan semen minimal 1 bulan dengan kadar air maksimum 18% dan maksimum pH 8. Untuk permukaan tembok lama, periksa dahulu daya rekat cat tembok yang lama. Jika diperlukan, lakukan pengerokan kemudian dibersihkan kembali. Berilah satu lapis Belazo Alkali Sealer sebelum mengecat permukaan tersebut dengan Belazo Maxima terutama pada permukaan tembok baru atau pada permukaan tembok lama yang mempunyai kelembaban tinggi. Daya sebar optimum adalah 14-16 m2/liter per lapisan, tergantung porositas permukaan.\r\n\r\nPetunjuk keselamatan : Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.', NULL, NULL, 'belazo-maxima.png');

-- --------------------------------------------------------

--
-- Table structure for table `in_product_color`
--

CREATE TABLE `in_product_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_product_color`
--

INSERT INTO `in_product_color` (`id`, `product_id`, `name`, `code`, `image`) VALUES
(1, 2, 'Souffle', '50001', '50001-souffle.png'),
(2, 2, 'Sunblame', '50002', '50002-sunblame.png'),
(3, 3, 'Mermaid Green', '48021', '48021-mermaid-green.png'),
(4, 3, 'Autumn Green', '48055', '48055-autumn-green.png');

-- --------------------------------------------------------

--
-- Table structure for table `in_product_feature`
--

CREATE TABLE `in_product_feature` (
  `id` int(11) NOT NULL,
  `ind_name` varchar(50) NOT NULL,
  `eng_name` varchar(50) DEFAULT NULL,
  `ind_description` text,
  `eng_description` text,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_product_feature`
--

INSERT INTO `in_product_feature` (`id`, `ind_name`, `eng_name`, `ind_description`, `eng_description`, `image`) VALUES
(1, 'Colour Enhancement', NULL, '(Menyempurnakan dan mencerahkan hasil akhir pengecatan)', NULL, 'belazo-colourenhancement.png'),
(2, 'Rendah Bau', NULL, NULL, NULL, 'belazo-rendahbau.png'),
(3, 'Tanpa Tambahan', NULL, 'Timbal dan Raksa', NULL, 'belazo-rendahkandunganracun.png'),
(4, 'Singapore', NULL, 'Green Label', NULL, 'belazo-singaporegreenlabel.png'),
(5, 'Color Shield', NULL, '(Lapisan Pelindung Warna)', NULL, 'belazo-colorshield.png'),
(6, 'Stain Proof', NULL, '(Lapisan Penahan Noda)', NULL, 'belazo-stainproof.png'),
(7, 'Aroma Lavender', NULL, '(Anti Nyamuk)', NULL, 'belazo-aromalavender.png'),
(8, 'Daya Tutup', NULL, 'Prima', NULL, 'belazo-coverage.png'),
(9, 'Water Based', NULL, 'Berpengencer Air', NULL, 'belazo-waterbased.png'),
(10, 'Serba Guna', NULL, '(Kayu, Besi & Beton)', NULL, 'belazo-multipurpose.png'),
(11, 'Lapisan', NULL, 'Anti Debu', NULL, 'belazo-dirtshield.png'),
(12, 'Ketahanan Minimal', NULL, '7 Tahun', NULL, 'belazo-7tahun.png'),
(13, 'Ketahanan Cuaca', NULL, 'dan Sinar Matahari', NULL, 'belazo-tahancuaca.png'),
(14, 'Berpengencer', NULL, 'Air', NULL, 'belazo-waterbased.png');

-- --------------------------------------------------------

--
-- Table structure for table `in_product_file`
--

CREATE TABLE `in_product_file` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_product_file`
--

INSERT INTO `in_product_file` (`id`, `product_id`, `name`, `filename`) VALUES
(1, 1, 'Color Card', 'file1.pdf'),
(2, 1, 'Data Teknis', 'file2.pdf'),
(3, 2, 'Color Card', 'file3.pdf'),
(4, 2, 'MDS', 'file4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `in_product_type`
--

CREATE TABLE `in_product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ind_title` varchar(100) NOT NULL,
  `eng_title` varchar(100) DEFAULT NULL,
  `ind_description` text,
  `eng_description` text,
  `image` varchar(100) DEFAULT NULL,
  `bg_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `in_product_type`
--

INSERT INTO `in_product_type` (`id`, `name`, `ind_title`, `eng_title`, `ind_description`, `eng_description`, `image`, `bg_image`) VALUES
(1, 'Belazo', 'Water Based System', NULL, 'Belazo Kidzdream adalah cat tembok interior bagi Anda yang mendukung dan mengembangkan kreasi anak tanpa harus khawatir tembok akan kotor. Dengan Stain Proof Anti Graffiti Technology, terbukti mampu menahan noda seperti kopi, teh, krayon, lumpur.', NULL, 'belazo-kidzdream.png', 'par-belazo-bg.jpg'),
(2, 'Envi', 'Water Based & Solvent Based System', NULL, 'Adalah cat tembok yang memberikan permukaan yang halus dan mudah dibersihkan dengan air. Envi Latex Wall Paint dapat diaplikasikan untuk segala jenis permukaan tembok dan plafon yang terbuat dari beton, plaster, fiber, triplex maupun kayu.', NULL, 'envi-latexwallpaint.png', 'par-envi-bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `idx` int(11) NOT NULL,
  `kode_kabupaten` varchar(4) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `idprovinsi` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`idx`, `kode_kabupaten`, `kabupaten`, `idprovinsi`) VALUES
(1, '0101', 'Aceh Barat', 1),
(2, '0102', 'Aceh Barat Daya', 1),
(3, '0103', 'Aceh Besar', 1),
(4, '0104', 'Aceh Jaya', 1),
(5, '0105', 'Aceh Selatan', 1),
(6, '0106', 'Aceh Singkil', 1),
(7, '0107', 'Aceh Tamiang', 1),
(8, '0108', 'Aceh Tengah', 1),
(9, '0109', 'Aceh Tenggara', 1),
(10, '0110', 'Aceh Timur', 1),
(11, '0111', 'Aceh Utara', 1),
(12, '0112', 'Bener Meriah', 1),
(13, '0113', 'Bireuen', 1),
(14, '0114', 'Gayo Lues', 1),
(15, '0115', 'Nagan Raya', 1),
(16, '0116', 'Pidie', 1),
(17, '0117', 'Pidie Jaya', 1),
(18, '0118', 'Simeulue', 1),
(19, '0119', 'kota Banda Aceh', 1),
(20, '0120', 'kota Langsa', 1),
(21, '0121', 'kota Lhokseumawe', 1),
(22, '0122', 'kota Sabang', 1),
(23, '0123', 'kota Subulussalam', 1),
(24, '0201', 'Badung', 2),
(25, '0202', 'Bangli', 2),
(26, '0203', 'Buleleng', 2),
(27, '0204', 'Gianyar', 2),
(28, '0205', 'Jembrana', 2),
(29, '0206', 'Karangasem', 2),
(30, '0207', 'Klungkung', 2),
(31, '0208', 'Tabanan', 2),
(32, '0209', 'kota Denpasar', 2),
(33, '0301', 'Lebak', 3),
(34, '0302', 'Pandeglang', 3),
(35, '0303', 'Serang', 3),
(36, '0304', 'Tangerang', 3),
(37, '0305', 'Kota Cilegon', 3),
(38, '0306', 'Kota Serang', 3),
(39, '0307', 'Kota Tangerang', 3),
(40, '0308', 'Kota Tangerang Selatan', 3),
(41, '0401', 'Bengkulu Selatan', 4),
(42, '0402', 'Bengkulu Tengah', 4),
(43, '0403', 'Bengkulu Utara', 4),
(44, '0404', 'Kaur', 4),
(45, '0405', 'Kepahiang', 4),
(46, '0406', 'Lebong', 4),
(47, '0407', 'Mukomuko', 4),
(48, '0408', 'Rejang Lebong', 4),
(49, '0409', 'Seluma', 4),
(50, '0410', 'Kota Bengkulu', 4),
(51, '0501', 'Boalemo', 5),
(52, '0502', 'Bone Bolango', 5),
(53, '0503', 'Gorontalo', 5),
(54, '0504', 'Gorontalo Utara', 5),
(55, '0505', 'Pohuwato', 5),
(56, '0506', 'Kota Gorontalo', 5),
(57, '0601', 'Kepulauan Seribu', 6),
(58, '0602', 'Kota Jakarta Barat', 6),
(59, '0603', 'Kota Jakarta Pusat', 6),
(60, '0604', 'Kota Jakarta Selatan', 6),
(61, '0605', 'Kota Jakarta Timur', 6),
(62, '0606', 'Kota Jakarta Utara', 6),
(63, '0701', 'Batanghari', 7),
(64, '0702', 'Bungo', 7),
(65, '0703', 'Kerinci', 7),
(66, '0704', 'Merangin', 7),
(67, '0705', 'Muaro Jambi', 7),
(68, '0706', 'Sarolangun', 7),
(69, '0707', 'Tanjung Jabung Barat', 7),
(70, '0708', 'Tanjung Jabung Timur', 7),
(71, '0709', 'Tebo', 7),
(72, '0710', 'Kota ambi', 7),
(73, '0711', 'Kota Sungai Penuh', 7),
(74, '0801', 'Bandung', 8),
(75, '0802', 'Bandung Barat', 8),
(76, '0803', 'Bekasi', 8),
(77, '0804', 'Bogor', 8),
(78, '0805', 'Ciamis', 8),
(79, '0806', 'Cianjur', 8),
(80, '0807', 'Cirebon', 8),
(81, '0808', 'Garut', 8),
(82, '0809', 'Indramayu', 8),
(83, '0810', 'Karawang', 8),
(84, '0811', 'Kuningan', 8),
(85, '0812', 'Majalengka', 8),
(86, '0813', 'Pangandaran', 8),
(87, '0814', 'Purwakarta', 8),
(88, '0815', 'Subang', 8),
(89, '0816', 'Sukabumi', 8),
(90, '0817', 'Sumedang', 8),
(91, '0818', 'Tasikmalaya', 8),
(92, '0819', 'Kota Bandung', 8),
(93, '0820', 'Kota Banjar', 8),
(94, '0821', 'Kota Bekasi', 8),
(95, '0822', 'Kota Bogor', 8),
(96, '0823', 'Kota Cimahi', 8),
(97, '0824', 'Kota Cirebon', 8),
(98, '0825', 'Kota Depok', 8),
(99, '0826', 'Kota Sukabumi', 8),
(100, '0827', 'Kota Tasikmalaya', 8),
(101, '0901', 'Banjarnegara', 9),
(102, '0902', 'Banyumas', 9),
(103, '0903', 'Batang', 9),
(104, '0904', 'Blora', 9),
(105, '0905', 'Boyolali', 9),
(106, '0906', 'Brebes', 9),
(107, '0907', 'Cilacap', 9),
(108, '0908', 'Demak', 9),
(109, '0909', 'Grobogan', 9),
(110, '0910', 'Jepara', 9),
(111, '0911', 'Karanganyar', 9),
(112, '0912', 'Kebumen', 9),
(113, '0913', 'Kendal', 9),
(114, '0914', 'Klaten', 9),
(115, '0915', 'Kudus', 9),
(116, '0916', 'Magelang', 9),
(117, '0917', 'Pati', 9),
(118, '0918', 'Pekalongan', 9),
(119, '0919', 'Pemalang', 9),
(120, '0920', 'Purbalingga', 9),
(121, '0921', 'Purworejo', 9),
(122, '0922', 'Rembang', 9),
(123, '0923', 'Semarang', 9),
(124, '0924', 'Sragen', 9),
(125, '0925', 'Sukoharjo', 9),
(126, '0926', 'Tegal', 9),
(127, '0927', 'Temanggung', 9),
(128, '0928', 'Wonogiri', 9),
(129, '0929', 'Wonosobo', 9),
(130, '0930', 'Kota Magelang', 9),
(131, '0931', 'Kota Pekalongan', 9),
(132, '0932', 'Kota Salatiga', 9),
(133, '0933', 'Kota Semarang', 9),
(134, '0934', 'Kota Surakarta', 9),
(135, '0935', 'Kota Tegal', 9),
(136, '1001', 'Bangkalan', 10),
(137, '1002', 'Banyuwangi', 10),
(138, '1003', 'Blitar', 10),
(139, '1004', 'Bojonegoro', 10),
(140, '1005', 'Bondowoso', 10),
(141, '1006', 'Gresik', 10),
(142, '1007', 'Jember', 10),
(143, '1008', 'Jombang', 10),
(144, '1009', 'Kediri', 10),
(145, '1010', 'Lamongan', 10),
(146, '1011', 'Lumajang', 10),
(147, '1012', 'Madiun', 10),
(148, '1013', 'Magetan', 10),
(149, '1014', 'Malang', 10),
(150, '1015', 'Mojokerto', 10),
(151, '1016', 'Nganjuk', 10),
(152, '1017', 'Ngawi', 10),
(153, '1018', 'Pacitan', 10),
(154, '1019', 'Pamekasan', 10),
(155, '1020', 'Pasuruan', 10),
(156, '1021', 'Ponorogo', 10),
(157, '1022', 'Probolinggo', 10),
(158, '1023', 'Sampang', 10),
(159, '1024', 'Sidoarjo', 10),
(160, '1025', 'Situbondo', 10),
(161, '1026', 'Sumenep', 10),
(162, '1027', 'Trenggalek', 10),
(163, '1028', 'Tuban', 10),
(164, '1029', 'Tulungagung', 10),
(165, '1030', 'Kota Batu', 10),
(166, '1031', 'Kota Blitar', 10),
(167, '1032', 'Kota Kediri', 10),
(168, '1033', 'Kota Madiun', 10),
(169, '1034', 'Kota Malang', 10),
(170, '1035', 'Kota Mojokerto', 10),
(171, '1036', 'Kota Pasuruan', 10),
(172, '1037', 'Kota Probolinggo', 10),
(173, '1038', 'Kota Surabaya', 10),
(174, '1101', 'Bengkayang', 11),
(175, '1102', 'Kapuas Hulu', 11),
(176, '1103', 'Kayong Utara', 11),
(177, '1104', 'Ketapang', 11),
(178, '1105', 'Kubu Raya', 11),
(179, '1106', 'Landak', 11),
(180, '1107', 'Melawi', 11),
(181, '1108', 'Pontianak', 11),
(182, '1109', 'Sambas', 11),
(183, '1110', 'Sanggau', 11),
(184, '1111', 'Sekadau', 11),
(185, '1112', 'Sintang', 11),
(186, '1113', 'Kota Pontianak', 11),
(187, '1114', 'Kota Singkawang', 11),
(188, '1201', 'Balangan', 12),
(189, '1202', 'Banjar', 12),
(190, '1203', 'Barito Kuala', 12),
(191, '1204', 'Hulu Sungai Selatan', 12),
(192, '1205', 'Hulu Sungai Tengah', 12),
(193, '1206', 'Hulu Sungai Utara', 12),
(194, '1207', 'Kotabaru', 12),
(195, '1208', 'Tabalong', 12),
(196, '1209', 'Tanah Bumbu', 12),
(197, '1210', 'Tanah Laut', 12),
(198, '1211', 'Tapin', 12),
(199, '1212', 'Kota Banjarbaru', 12),
(200, '1213', 'Kota Banjarmasin', 12),
(201, '1301', 'Barito Selatan', 13),
(202, '1302', 'Barito Timur', 13),
(203, '1303', 'Barito Utara', 13),
(204, '1304', 'Gunung Mas', 13),
(205, '1305', 'Kapuas', 13),
(206, '1306', 'Katingan', 13),
(207, '1307', 'Kotawaringin Barat', 13),
(208, '1308', 'Kotawaringin Timur', 13),
(209, '1309', 'Lamandau', 13),
(210, '1310', 'Murung Raya', 13),
(211, '1311', 'Pulang Pisau', 13),
(212, '1312', 'Sukamara', 13),
(213, '1313', 'Seruyan', 13),
(214, '1314', 'Kota Palangka Raya', 13),
(215, '1401', 'Berau', 14),
(216, '1402', 'Kutai Barat', 14),
(217, '1403', 'Kutai Kartanegara', 14),
(218, '1404', 'Kutai Timur', 14),
(219, '1405', 'Paser', 14),
(220, '1406', 'Penajam Paser Utara', 14),
(221, '1407', 'Mahakam Ulu', 14),
(222, '1408', 'Kota Balikpapan', 14),
(223, '1409', 'Kota Bontang', 14),
(224, '1410', 'Kota Samarinda', 14),
(225, '1501', 'Bulungan', 15),
(226, '1502', 'Malinau', 15),
(227, '1503', 'Nunukan', 15),
(228, '1504', 'Tana Tidung', 15),
(229, '1505', 'Kota Tarakan', 15),
(230, '1601', 'Bangka', 16),
(231, '1602', 'Bangka Barat', 16),
(232, '1603', 'Bangka Selatan', 16),
(233, '1604', 'Bangka Tengah', 16),
(234, '1605', 'Belitung', 16),
(235, '1606', 'Belitung Timur', 16),
(236, '1607', 'Kota Pangkal Pinang', 16),
(237, '1701', 'Bintan', 17),
(238, '1702', 'Karimun', 17),
(239, '1703', 'Kepulauan Anambas', 17),
(240, '1704', 'Lingga', 17),
(241, '1705', 'Natuna', 17),
(242, '1706', 'Kota Batam', 17),
(243, '1707', 'Kota Tanjung Pinang', 17),
(244, '1801', 'Lampung Barat', 18),
(245, '1802', 'Lampung Selatan', 18),
(246, '1803', 'Lampung Tengah', 18),
(247, '1804', 'Lampung Timur', 18),
(248, '1805', 'Lampung Utara', 18),
(249, '1806', 'Mesuji', 18),
(250, '1807', 'Pesawaran', 18),
(251, '1808', 'Pringsewu', 18),
(252, '1809', 'Tanggamus', 18),
(253, '1810', 'Tulang Bawang', 18),
(254, '1811', 'Tulang Bawang Barat', 18),
(255, '1812', 'Way Kanan', 18),
(256, '1813', 'Pesisir Barat', 18),
(257, '1814', 'Kota Bandar Lampung', 18),
(258, '1815', 'Kota Metro', 18),
(259, '1901', 'Buru', 19),
(260, '1902', 'Buru Selatan', 19),
(261, '1903', 'Kepulauan Aru', 19),
(262, '1904', 'Maluku Barat Daya', 19),
(263, '1905', 'Maluku Tengah', 19),
(264, '1906', 'Maluku Tenggara', 19),
(265, '1907', 'Maluku Tenggara Barat', 19),
(266, '1908', 'Seram Bagian Barat', 19),
(267, '1909', 'Seram Bagian Timur', 19),
(268, '1910', 'Kota Ambon', 19),
(269, '1911', 'Kota Tual', 19),
(270, '2001', 'Halmahera Barat', 20),
(271, '2002', 'Halmahera Tengah', 20),
(272, '2003', 'Halmahera Utara', 20),
(273, '2004', 'Halmahera Selatan', 20),
(274, '2005', 'Kepulauan Sula', 20),
(275, '2006', 'Halmahera Timur', 20),
(276, '2007', 'Pulau Morotai', 20),
(277, '2008', 'Kota Ternate', 20),
(278, '2009', 'Kota Tidore Kepulauan', 20),
(279, '2101', 'Bima', 21),
(280, '2102', 'Dompu', 21),
(281, '2103', 'Lombok Barat', 21),
(282, '2104', 'Lombok Tengah', 21),
(283, '2105', 'Lombok Timur', 21),
(284, '2106', 'Lombok Utara', 21),
(285, '2107', 'Sumbawa', 21),
(286, '2108', 'Sumbawa Barat', 21),
(287, '2109', 'Kota Bima', 21),
(288, '2110', 'Kota Mataram', 21),
(289, '2201', 'Alor', 22),
(290, '2202', 'Belu', 22),
(291, '2203', 'Ende', 22),
(292, '2204', 'Flores Timur', 22),
(293, '2205', 'Kupang', 22),
(294, '2206', 'Lembata', 22),
(295, '2207', 'Manggarai', 22),
(296, '2208', 'Manggarai Barat', 22),
(297, '2209', 'Manggarai Timur', 22),
(298, '2210', 'Ngada', 22),
(299, '2211', 'Nagekeo', 22),
(300, '2212', 'Rote Ndao', 22),
(301, '2213', 'Sabu Raijua', 22),
(302, '2214', 'Sikka', 22),
(303, '2215', 'Sumba Barat', 22),
(304, '2216', 'Sumba Barat Daya', 22),
(305, '2217', 'Sumba Tengah', 22),
(306, '2218', 'Sumba Timur', 22),
(307, '2219', 'Timor Tengah Selatan', 22),
(308, '2220', 'Timor Tengah Utara', 22),
(309, '2221', 'Kota Kupang', 22),
(310, '2301', 'Asmat', 23),
(311, '2302', 'Biak Numfor', 23),
(312, '2303', 'Boven Digoel', 23),
(313, '2304', 'Deiyai', 23),
(314, '2305', 'Dogiyai', 23),
(315, '2306', 'Intan Jaya', 23),
(316, '2307', 'Jayapura', 23),
(317, '2308', 'Jayawijaya', 23),
(318, '2309', 'Keerom', 23),
(319, '2310', 'Kepulauan Yapen', 23),
(320, '2311', 'Lanny Jaya', 23),
(321, '2312', 'Mamberamo Raya', 23),
(322, '2313', 'Mamberamo Tengah', 23),
(323, '2314', 'Mappi', 23),
(324, '2315', 'Merauke', 23),
(325, '2316', 'Mimika', 23),
(326, '2317', 'Nabire', 23),
(327, '2318', 'Nduga', 23),
(328, '2319', 'Paniai', 23),
(329, '2320', 'Pegunungan Bintang', 23),
(330, '2321', 'Puncak', 23),
(331, '2322', 'Puncak Jaya', 23),
(332, '2323', 'Sarmi', 23),
(333, '2324', 'Supiori', 23),
(334, '2325', 'Tolikara', 23),
(335, '2326', 'Waropen', 23),
(336, '2327', 'Yahukimo', 23),
(337, '2328', 'Yalimo', 23),
(338, '2329', 'Kota Jayapura', 23),
(339, '2401', 'Fakfak', 24),
(340, '2402', 'Kaimana', 24),
(341, '2403', 'Manokwari', 24),
(342, '2404', 'Manokwari Selatan', 24),
(343, '2405', 'Maybrat', 24),
(344, '2406', 'Pegunungan Arfak', 24),
(345, '2407', 'Raja Ampat', 24),
(346, '2408', 'Sorong', 24),
(347, '2409', 'Sorong Selatan', 24),
(348, '2410', 'Tambrauw', 24),
(349, '2411', 'Teluk Bintuni', 24),
(350, '2412', 'Teluk Wondama', 24),
(351, '2413', 'Kota Sorong', 24),
(352, '2501', 'Bengkalis', 25),
(353, '2502', 'Indragiri Hilir', 25),
(354, '2503', 'Indragiri Hulu', 25),
(355, '2504', 'Kampar', 25),
(356, '2505', 'Kuantan Singingi', 25),
(357, '2506', 'Pelalawan', 25),
(358, '2507', 'Rokan Hilir', 25),
(359, '2508', 'Rokan Hulu', 25),
(360, '2509', 'Siak', 25),
(361, '2510', 'Kepulauan Meranti', 25),
(362, '2511', 'Kota Dumai', 25),
(363, '2512', 'Kota Pekanbaru', 25),
(364, '2601', 'Majene', 26),
(365, '2602', 'Mamasa', 26),
(366, '2603', 'Mamuju', 26),
(367, '2604', 'Mamuju Utara', 26),
(368, '2605', 'Polewali Mandar', 26),
(369, '2606', 'Mamuju Tengah', 26),
(370, '2701', 'Bantaeng', 27),
(371, '2702', 'Barru', 27),
(372, '2703', 'Bone', 27),
(373, '2704', 'Bulukumba', 27),
(374, '2705', 'Enrekang', 27),
(375, '2706', 'Gowa', 27),
(376, '2707', 'Jeneponto', 27),
(377, '2708', 'Kepulauan Selayar', 27),
(378, '2709', 'Luwu', 27),
(379, '2710', 'Luwu Timur', 27),
(380, '2711', 'Luwu Utara', 27),
(381, '2712', 'Maros', 27),
(382, '2713', 'Pangkajene dan Kepulauan', 27),
(383, '2714', 'Pinrang', 27),
(384, '2715', 'Sidenreng Rappang', 27),
(385, '2716', 'Sinjai', 27),
(386, '2717', 'Soppeng', 27),
(387, '2718', 'Takalar', 27),
(388, '2719', 'Tana Toraja', 27),
(389, '2720', 'Toraja Utara', 27),
(390, '2721', 'Wajo', 27),
(391, '2722', 'Kota Makassar', 27),
(392, '2723', 'Kota Palopo', 27),
(393, '2724', 'Kota Parepare', 27),
(394, '2801', 'Banggai', 28),
(395, '2802', 'Banggai Kepulauan', 28),
(396, '2803', 'Buol', 28),
(397, '2804', 'Donggala', 28),
(398, '2805', 'Morowali', 28),
(399, '2806', 'Parigi Moutong', 28),
(400, '2807', 'Poso', 28),
(401, '2808', 'Tojo Una-Una', 28),
(402, '2809', 'Toli-Toli', 28),
(403, '2810', 'Sigi', 28),
(404, '2811', 'Kota Palu', 28),
(405, '2901', 'Bombana', 29),
(406, '2902', 'Buton', 29),
(407, '2903', 'Buton Utara', 29),
(408, '2904', 'Kolaka', 29),
(409, '2905', 'Kolaka Timur', 29),
(410, '2906', 'Kolaka Utara', 29),
(411, '2907', 'Konawe', 29),
(412, '2908', 'Konawe Selatan', 29),
(413, '2909', 'Konawe Utara', 29),
(414, '2910', 'Muna', 29),
(415, '2911', 'Wakatobi', 29),
(416, '2912', 'Kota Bau-Bau', 29),
(417, '2913', 'Kota Kendari', 29),
(418, '3001', 'Bolaang Mongondow', 30),
(419, '3002', 'Bolaang Mongondow Selatan', 30),
(420, '3003', 'Bolaang Mongondow Timur', 30),
(421, '3004', 'Bolaang Mongondow Utara', 30),
(422, '3005', 'Kepulauan Sangihe', 30),
(423, '3006', 'Kepulauan Siau Tagulandang Biaro', 30),
(424, '3007', 'Kepulauan Talaud', 30),
(425, '3008', 'Minahasa', 30),
(426, '3009', 'Minahasa Selatan', 30),
(427, '3010', 'Minahasa Tenggara', 30),
(428, '3011', 'Minahasa Utara', 30),
(429, '3012', 'Kota Bitung', 30),
(430, '3013', 'Kota Kotamobagu', 30),
(431, '3014', 'Kota Manado', 30),
(432, '3015', 'Kota Tomohon', 30),
(433, '3101', 'Agam', 31),
(434, '3102', 'Dharmasraya', 31),
(435, '3103', 'Kepulauan Mentawai', 31),
(436, '3104', 'Lima Puluh Kota', 31),
(437, '3105', 'Padang Pariaman', 31),
(438, '3106', 'Pasaman', 31),
(439, '3107', 'Pasaman Barat', 31),
(440, '3108', 'Pesisir Selatan', 31),
(441, '3109', 'Sijunjung', 31),
(442, '3110', 'Solok', 31),
(443, '3111', 'Solok Selatan', 31),
(444, '3112', 'Tanah Datar', 31),
(445, '3113', 'Kota Bukittinggi', 31),
(446, '3114', 'Kota Padang', 31),
(447, '3115', 'Kota Padangpanjang', 31),
(448, '3116', 'Kota Pariaman', 31),
(449, '3117', 'Kota Payakumbuh', 31),
(450, '3118', 'Kota Sawahlunto', 31),
(451, '3119', 'Kota Solok', 31),
(452, '3201', 'Banyuasin', 32),
(453, '3202', 'Empat Lawang', 32),
(454, '3203', 'Lahat', 32),
(455, '3204', 'Muara Enim', 32),
(456, '3205', 'Musi Banyuasin', 32),
(457, '3206', 'Musi Rawas', 32),
(458, '3207', 'Ogan Ilir', 32),
(459, '3208', 'Ogan Komering Ilir', 32),
(460, '3209', 'Ogan Komering Ulu', 32),
(461, '3210', 'Ogan Komering Ulu Selatan', 32),
(462, '3211', 'Penukal Abab Lematang Ilir', 32),
(463, '3212', 'Ogan Komering Ulu Timur', 32),
(464, '3213', 'Kota Lubuklinggau', 32),
(465, '3214', 'Kota Pagar Alam', 32),
(466, '3215', 'Kota Palembang', 32),
(467, '3216', 'Kota Prabumulih', 32),
(468, '3301', 'Asahan', 33),
(469, '3302', 'Batubara', 33),
(470, '3303', 'Dairi', 33),
(471, '3304', 'Deli Serdang', 33),
(472, '3305', 'Humbang Hasundutan', 33),
(473, '3306', 'Karo', 33),
(474, '3307', 'Labuhanbatu', 33),
(475, '3308', 'Labuhanbatu Selatan', 33),
(476, '3309', 'Labuhanbatu Utara', 33),
(477, '3310', 'Langkat', 33),
(478, '3311', 'Mandailing Natal', 33),
(479, '3312', 'Nias', 33),
(480, '3313', 'Nias Barat', 33),
(481, '3314', 'Nias Selatan', 33),
(482, '3315', 'Nias Utara', 33),
(483, '3316', 'Padang Lawas', 33),
(484, '3317', 'Padang Lawas Utara', 33),
(485, '3318', 'Pakpak Bharat', 33),
(486, '3319', 'Samosir', 33),
(487, '3320', 'Serdang Bedagai', 33),
(488, '3321', 'Simalungun', 33),
(489, '3322', 'Tapanuli Selatan', 33),
(490, '3323', 'Tapanuli Tengah', 33),
(491, '3324', 'Tapanuli Utara', 33),
(492, '3325', 'Toba Samosir', 33),
(493, '3326', 'Kota Binjai', 33),
(494, '3327', 'Kota Gunungsitoli', 33),
(495, '3328', 'Kota Medan', 33),
(496, '3329', 'Kota Padangsidempuan', 33),
(497, '3330', 'Kota Pematangsiantar', 33),
(498, '3331', 'Kota Sibolga', 33),
(499, '3332', 'Kota Tanjungbalai', 33),
(500, '3333', 'Kota Tebing Tinggi', 33),
(501, '3401', 'Bantul', 35),
(502, '3402', 'Gunung Kidul', 35),
(503, '3403', 'Kulon Progo', 35),
(504, '3404', 'Sleman', 35),
(505, '3405', 'Kota Yogyakarta', 35);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idx` int(11) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `idparent` int(11) DEFAULT NULL,
  `deskripsi` text,
  `image` varchar(50) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idx`, `kategori`, `idparent`, `deskripsi`, `image`, `idbahasa`, `slug`) VALUES
(1, 'Living room', 0, '', '', NULL, NULL),
(2, 'Handycraft', 1, '', '', NULL, NULL),
(3, 'Meja', 1, '', 'jemuran.jpg', NULL, NULL),
(4, 'Sandal', 2, 'A', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `idx` int(11) NOT NULL,
  `kode_kecamatan` varchar(10) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `idkabupaten` int(11) DEFAULT NULL,
  `idkota` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`idx`, `kode_kecamatan`, `kecamatan`, `idkabupaten`, `idkota`) VALUES
(1, 'aa', 'banguntapan', 3401, 0),
(2, NULL, 'mergangsan', NULL, NULL),
(3, NULL, 'piyungan', 3401, NULL),
(4, '777', 'mergangsan', 0, 57);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `idx` int(11) NOT NULL,
  `kode_kelurahan` varchar(10) DEFAULT NULL,
  `idkecamatan` int(11) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`idx`, `kode_kelurahan`, `idkecamatan`, `kelurahan`) VALUES
(1, '3', 1, 'wonocatur'),
(2, '999', 4, 'wirogunan');

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `idkomponen` int(10) NOT NULL COMMENT 'header,menu,iklan,isi,keterangan filed form',
  `NmKomponen` varchar(40) DEFAULT NULL,
  `isshow` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`idkomponen`, `NmKomponen`, `isshow`) VALUES
(1, 'Menu View', 'T'),
(2, 'Menu Admin', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `idx` int(10) NOT NULL,
  `kode_kota` varchar(10) NOT NULL DEFAULT '0',
  `kota` text,
  `idprovinsi` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`idx`, `kode_kota`, `kota`, `idprovinsi`) VALUES
(1, '0', 'Kampung Kekatung', NULL),
(2, '0', 'Tungkaran Pangeran', NULL),
(3, '0', 'Pingaran', NULL),
(4, '0', 'Tanah Grogot', NULL),
(5, '0', 'Tanah Bumbu', NULL),
(6, '0', 'Batulicin', NULL),
(8, '0', 'Simpang Empat', NULL),
(10, '0', 'Barabai', NULL),
(12, '0', 'Martapura', NULL),
(13, '0', 'Kotabaru', NULL),
(14, '0', 'Panda Sari', NULL),
(16, '0', 'Banyuwangi', NULL),
(18, '0', 'Pagatan', NULL),
(19, '0', 'Banjarmasin', NULL),
(26, '0', 'Kersik Putih', NULL),
(28, '0', 'Balikpapan', NULL),
(32, '0', 'Manunggal', NULL),
(33, '0', 'Karang Bintang', NULL),
(34, '0', 'Sarimulya', NULL),
(35, '0', 'Seruyan', NULL),
(38, '0', 'Pematang Ulin', NULL),
(43, '0', 'Amuntai', NULL),
(45, '0', 'Plowali Mandar', NULL),
(46, '0', 'Mantawakan Mulya', NULL),
(48, '0', 'Pallameang', NULL),
(49, '0', 'Mallandroe', NULL),
(51, '0', 'Lokbuntar', NULL),
(57, '888', 'Kota Yogyakarta', '35');

-- --------------------------------------------------------

--
-- Table structure for table `logdelrecord`
--

CREATE TABLE `logdelrecord` (
  `idx` int(20) UNSIGNED NOT NULL,
  `idxhapus` varchar(10) DEFAULT NULL,
  `keterangan` text,
  `nmtable` varchar(100) DEFAULT NULL,
  `tgllog` datetime DEFAULT NULL,
  `ideksekusi` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logdelrecord`
--

INSERT INTO `logdelrecord` (`idx`, `idxhapus`, `keterangan`, `nmtable`, `tgllog`, `ideksekusi`) VALUES
(24, '2', NULL, 'event', '2018-02-03 09:44:08', 1),
(23, '1', NULL, 'event', '2018-02-03 08:02:49', 1),
(22, '4', NULL, 'page', '2018-02-03 06:59:07', 1),
(21, '2', NULL, 'page', '2018-02-02 23:07:16', 1),
(20, '1', NULL, 'page', '2018-02-02 23:02:09', 1),
(25, '1', NULL, 'event', '2018-03-10 22:03:02', 1),
(26, '2', NULL, 'event', '2018-03-14 22:23:05', 1),
(27, '3', NULL, 'event', '2018-03-14 22:23:27', 1),
(28, '4', NULL, 'artist', '2018-03-14 23:17:55', 1),
(29, '5', NULL, 'artist', '2018-03-14 23:18:44', 1),
(30, '3', NULL, 'artist', '2018-03-14 23:22:02', 1),
(31, '2', NULL, 'artist', '2018-03-14 23:23:23', 1),
(32, '6', NULL, 'event', '2018-03-14 23:38:26', 1),
(33, '2', NULL, 'event_artist', '2018-03-17 00:35:14', 1),
(34, '2', NULL, 'event_artist', '2018-03-17 00:40:21', 1),
(35, '2', NULL, 'event_artist', '2018-03-17 00:43:17', 1),
(36, '2', NULL, 'event_artist', '2018-03-17 00:45:03', 1),
(37, '2', NULL, 'event_artist', '2018-03-17 00:48:50', 1),
(38, '2', NULL, 'event_artist', '2018-03-17 00:49:52', 1),
(39, '2', NULL, 'event_artist', '2018-03-17 00:50:28', 1),
(40, '2', NULL, 'event_artist', '2018-03-17 00:50:51', 1),
(41, '1', NULL, 'event_artist', '2018-03-17 00:51:27', 1),
(42, '1', NULL, 'event_artist', '2018-03-17 00:52:27', 1),
(43, '3', NULL, 'event_artist', '2018-03-17 01:09:51', 1),
(44, '2', NULL, 'event_artist', '2018-03-17 01:10:17', 1),
(45, '5', NULL, 'event', '2018-03-17 01:12:33', 1),
(46, '5', NULL, 'event_artist', '2018-03-17 01:12:33', 1),
(47, '3', NULL, 'thread_event', '2018-03-17 20:25:14', 1),
(48, '3', NULL, 'thread_event', '2018-03-17 20:27:33', 1),
(49, '3', NULL, 'thread_event', '2018-03-17 20:30:22', 1),
(50, '1', NULL, 'residency_event', '2018-03-25 19:29:26', 1),
(51, '1', NULL, 'residency', '2018-03-25 19:33:29', 1),
(52, '1', NULL, 'residency_event', '2018-03-25 19:33:29', 1),
(53, '2', NULL, 'residency', '2018-03-25 19:35:36', 1),
(54, '2', NULL, 'residency_event', '2018-03-25 19:35:36', 1),
(55, '4', NULL, 'residency', '2018-03-25 19:36:48', 1),
(56, '4', NULL, 'residency_event', '2018-03-25 19:36:48', 1),
(57, '3', NULL, 'event', '2018-03-25 19:39:26', 1),
(58, '3', NULL, 'event_artist', '2018-03-25 19:39:27', 1),
(59, '3', NULL, 'thread', '2018-03-25 19:43:52', 1),
(60, '3', NULL, 'thread_event', '2018-03-25 19:43:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(10) NOT NULL,
  `nmmenu` varchar(100) DEFAULT NULL,
  `tipemenu` int(1) DEFAULT NULL COMMENT '1 : page singgle 2: Page list',
  `idkomponen` int(10) DEFAULT NULL,
  `iduser` int(10) DEFAULT '0',
  `parentmenu` int(10) DEFAULT NULL,
  `urlci` varchar(100) DEFAULT NULL,
  `urut` int(10) DEFAULT NULL,
  `jmlgambar` int(1) DEFAULT '0',
  `settingform` text,
  `idaplikasi` int(10) DEFAULT NULL,
  `isumum` enum('Y','N') DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idmenu`, `nmmenu`, `tipemenu`, `idkomponen`, `iduser`, `parentmenu`, `urlci`, `urut`, `jmlgambar`, `settingform`, `idaplikasi`, `isumum`) VALUES
(34, 'User Manager', 1, 2, 1, 0, '#', 5, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', 1, 'Y'),
(2, 'Setting Admin Menu ', 1, 2, 0, 34, 'ctrmenu', 1, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', 1, 'Y'),
(6, 'LOGOUT', 1, 2, 0, 0, 'webadmindo/logout', 21, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', 1, 'Y'),
(35, 'User Access', 1, 2, 0, 34, 'ctrusermenu', 2, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', 1, 'Y'),
(36, 'User Group', 1, 2, 0, 34, 'ctrusergroup', 3, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', 1, 'Y'),
(334, 'Category', 2, 2, 0, 332, 'ctrkategori', 0, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(322, 'User', 1, 2, 0, 34, 'ctrusersistem', 0, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(333, 'List About', 2, 2, 0, 332, 'ctrpage', 3, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(332, 'About Page', 1, 2, 0, 0, '#', 6, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(331, 'Category Event', 2, 2, 0, 329, 'ctrcategoryevent', 2, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(330, 'List Event', 2, 2, 0, 329, 'ctrevent', 0, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(326, 'Setting', 1, 2, 0, 0, '#', 10, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(327, 'Language', 2, 2, 0, 326, 'ctrbahasa', 1, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(328, 'Image Manager', 2, 2, 0, 326, 'ctrimagemanager', 2, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(325, 'Menu', 1, 2, 0, 0, 'ctrmenuutama', 5, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(329, 'Exhibition / Event', 1, 2, 0, 0, '#', 1, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(335, 'About', 1, 2, 1, 0, 'ctrabout', 0, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(337, 'List Artist', 2, 2, 0, 329, 'ctrartist', 1, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(339, 'Program Threads', 1, 2, 0, 0, 'ctrthread', 2, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N'),
(340, 'Residency Program', 1, 2, 0, 0, 'ctrresiden', 3, 0, 'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;', NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `menuutama`
--

CREATE TABLE `menuutama` (
  `idx` int(11) NOT NULL,
  `menu` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `idparent` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL,
  `customlink` varchar(200) DEFAULT NULL,
  `penghubungcontent` varchar(200) DEFAULT NULL,
  `idcontent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `metatag`
--

CREATE TABLE `metatag` (
  `idx` int(11) NOT NULL,
  `metakey` varchar(255) DEFAULT NULL,
  `value` longtext,
  `idcontent` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metatag`
--

INSERT INTO `metatag` (`idx`, `metakey`, `value`, `idcontent`) VALUES
(1, NULL, 'sewage', NULL),
(2, NULL, 'testt', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `idx` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `date` date DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `istampil` enum('Y','N') DEFAULT 'Y',
  `keyword` varchar(200) DEFAULT NULL,
  `idmetatag` int(11) DEFAULT NULL,
  `idcategorynews` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL,
  `idimage` int(11) DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `idx` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `date` date DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `istampil` enum('Y','N') DEFAULT 'Y',
  `keyword` varchar(255) DEFAULT NULL,
  `idmetatag` int(11) DEFAULT NULL,
  `idkategoripage` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL,
  `idimage` int(11) DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`idx`, `title`, `description`, `date`, `image`, `istampil`, `keyword`, `idmetatag`, `idkategoripage`, `idbahasa`, `idimage`, `update`, `iduser`) VALUES
(3, 'sdfsd', '<p>sdfsd</p>', '2018-02-06', 'image1 (1).jpg', 'N', 'dfsd,fghfg', 0, 0, 2, 0, '2018-02-03 07:11:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `idx` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `istampil` enum('Y','N') DEFAULT 'Y',
  `keyword` varchar(200) DEFAULT NULL,
  `idmetatag` int(11) DEFAULT NULL,
  `idcategoryprogram` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL,
  `idimage` int(11) DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_to_category`
--

CREATE TABLE `program_to_category` (
  `idx` int(11) NOT NULL,
  `idevent` int(11) DEFAULT NULL,
  `idcategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `idx` int(10) NOT NULL,
  `kode_provinsi` varchar(5) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`idx`, `kode_provinsi`, `provinsi`) VALUES
(2, '01', 'Aceh'),
(3, '02', 'Bali'),
(4, '03', 'Banten'),
(5, '04', 'Bengkulu'),
(6, '05', 'Gorontalo'),
(7, '06', 'DKI Jakarta'),
(8, '07', 'Jambi'),
(9, '08', 'Jawa Barat'),
(10, '09', 'Jawa Tengah'),
(11, '10', 'Jawa Timur'),
(12, '11', 'Kalimantan Barat'),
(13, '12', 'Kalimantan Selatan'),
(14, '13', 'Kalimantan Tengah'),
(15, '14', 'Kalimantan Timur'),
(16, '15', 'Kalimantan Utara'),
(17, '16', 'Kepulauan Bangka Belitung'),
(18, '17', 'Kepulauan Riau'),
(19, '18', 'Lampung'),
(20, '19', 'Maluku'),
(21, '20', 'Maluku Utara'),
(22, '21', 'Nusa Tenggara Barat'),
(23, '22', 'Nusa Tenggara Timur'),
(24, '23', 'Papua'),
(25, '24', 'Papua Barat'),
(26, '25', 'Riau'),
(27, '26', 'Sulawesi Barat'),
(28, '27', 'Sulawesi Selatan'),
(29, '28', 'Sulawesi Tengah'),
(30, '29', 'Sulawesi Tenggara'),
(31, '30', 'Sulawesi Utara'),
(32, '31', 'Sumatera Barat'),
(33, '32', 'Sumatera Selatan'),
(34, '33', 'Sumatera Utara'),
(35, '35', 'DI Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `publishing`
--

CREATE TABLE `publishing` (
  `idx` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `keyword` varchar(250) NOT NULL,
  `idmetatag` int(11) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `video` varchar(50) NOT NULL,
  `audio` varchar(50) NOT NULL,
  `pdf` varchar(50) NOT NULL,
  `update` datetime NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idimage` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `residency`
--

CREATE TABLE `residency` (
  `idx` int(11) NOT NULL,
  `title_ind` varchar(50) DEFAULT NULL,
  `title_eng` varchar(50) DEFAULT NULL,
  `content_ind` text,
  `content_eng` text,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residency`
--

INSERT INTO `residency` (`idx`, `title_ind`, `title_eng`, `content_ind`, `content_eng`, `year`) VALUES
(3, 'A', 'Dimas', '<p><br />B</p>', '', 2018),
(5, 'REO', 'CO', '<p><br />JIJI</p>', '<p><br />FO</p>', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `residency_event`
--

CREATE TABLE `residency_event` (
  `idx` int(11) NOT NULL,
  `residency_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residency_event`
--

INSERT INTO `residency_event` (`idx`, `residency_id`, `event_id`) VALUES
(8, 3, 4),
(10, 5, 3),
(11, 5, 4),
(12, 5, 6),
(13, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `idx` int(5) NOT NULL,
  `title_ind` varchar(50) DEFAULT NULL,
  `title_eng` varchar(50) DEFAULT NULL,
  `content_ind` text,
  `content_eng` text,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`idx`, `title_ind`, `title_eng`, `content_ind`, `content_eng`, `tanggal`) VALUES
(1, 'Thread 1', 'Thread eng 1', '<p>Isi 1</p>', '<p>Isi Eng 1</p>', '2018-03-17'),
(2, 'Jd indo 2', 'Title 2', '<p>isi indo 2</p>', '<p>Content 2</p>', '2018-03-18'),
(6, 'D', 'D', '<p>D</p>', '<p>D</p>', '2018-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `thread_event`
--

CREATE TABLE `thread_event` (
  `idx` int(5) NOT NULL,
  `thread_id` int(5) DEFAULT NULL,
  `event_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread_event`
--

INSERT INTO `thread_event` (`idx`, `thread_id`, `event_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 6),
(6, 1, 7),
(7, 2, 4),
(8, 2, 6),
(9, 2, 7),
(22, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tipemenu`
--

CREATE TABLE `tipemenu` (
  `idTipeMenu` varchar(1) DEFAULT NULL,
  `NmTipeMenu` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipemenu`
--

INSERT INTO `tipemenu` (`idTipeMenu`, `NmTipeMenu`) VALUES
('1', 'Singgle'),
('2', 'Berbentuk Daftar');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `idx` int(10) NOT NULL,
  `NmUserGroup` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`idx`, `NmUserGroup`) VALUES
(1, 'All Admin'),
(2, 'Admin'),
(3, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `usermenu`
--

CREATE TABLE `usermenu` (
  `idx` int(10) NOT NULL,
  `iduser` int(10) DEFAULT NULL,
  `idmenu` int(10) DEFAULT NULL,
  `idaplikasi` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermenu`
--

INSERT INTO `usermenu` (`idx`, `iduser`, `idmenu`, `idaplikasi`) VALUES
(7341, 2, 6, NULL),
(7340, 2, 318, NULL),
(7339, 2, 312, NULL),
(7338, 2, 316, NULL),
(7337, 2, 317, NULL),
(7416, 1, 326, NULL),
(7415, 1, 325, NULL),
(7414, 1, 332, NULL),
(7413, 1, 333, NULL),
(7412, 1, 36, NULL),
(7411, 1, 34, NULL),
(7410, 1, 329, NULL),
(7409, 1, 328, NULL),
(7408, 1, 331, NULL),
(7407, 1, 35, NULL),
(7406, 1, 327, NULL),
(7405, 1, 2, NULL),
(7404, 1, 335, NULL),
(7403, 1, 330, NULL),
(7402, 1, 322, NULL),
(7401, 1, 334, NULL),
(7301, 0, 36, NULL),
(7417, 1, 337, NULL),
(7418, 1, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersistem`
--

CREATE TABLE `usersistem` (
  `idx` int(10) NOT NULL,
  `npp` varchar(20) DEFAULT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL COMMENT 'Organisasi',
  `NoTelpon` varchar(50) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `statuspeg` int(10) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ym` varchar(100) DEFAULT NULL,
  `isaktif` enum('Y','N') DEFAULT 'N',
  `idusergroup` int(10) DEFAULT NULL,
  `idkabupaten` int(10) DEFAULT NULL,
  `idpropinsi` int(10) DEFAULT NULL,
  `imehp` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersistem`
--

INSERT INTO `usersistem` (`idx`, `npp`, `Nama`, `alamat`, `NoTelpon`, `user`, `password`, `statuspeg`, `photo`, `email`, `ym`, `isaktif`, `idusergroup`, `idkabupaten`, `idpropinsi`, `imehp`) VALUES
(1, 'undefined', 'User Demo', '0', '0274747474', 'demo', 'demo', 0, 'undefined', '', '', '', 1, 173, 12, '860205025197033'),
(2, 'undefined', 'pengguna lain', '0', '04532', 'test', 'test', 0, 'undefined', '', '', '', 2, 3402, 35, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `categoryevent`
--
ALTER TABLE `categoryevent`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `categorynews`
--
ALTER TABLE `categorynews`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `categoryprogram`
--
ALTER TABLE `categoryprogram`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `content_to_image`
--
ALTER TABLE `content_to_image`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `content_to_kategori`
--
ALTER TABLE `content_to_kategori`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `content_to_tag`
--
ALTER TABLE `content_to_tag`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `event_artist`
--
ALTER TABLE `event_artist`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `event_to_category`
--
ALTER TABLE `event_to_category`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `imagemanager`
--
ALTER TABLE `imagemanager`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `in_inspirasi`
--
ALTER TABLE `in_inspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_inspirasi_detail`
--
ALTER TABLE `in_inspirasi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_post_categories`
--
ALTER TABLE `in_post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_post_content`
--
ALTER TABLE `in_post_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_products`
--
ALTER TABLE `in_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_product_color`
--
ALTER TABLE `in_product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_product_feature`
--
ALTER TABLE `in_product_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_product_file`
--
ALTER TABLE `in_product_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_product_type`
--
ALTER TABLE `in_product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`idkomponen`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `logdelrecord`
--
ALTER TABLE `logdelrecord`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `menuutama`
--
ALTER TABLE `menuutama`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `metatag`
--
ALTER TABLE `metatag`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `program_to_category`
--
ALTER TABLE `program_to_category`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`idx`),
  ADD UNIQUE KEY `id_provinsi` (`kode_provinsi`);

--
-- Indexes for table `publishing`
--
ALTER TABLE `publishing`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `residency`
--
ALTER TABLE `residency`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `residency_event`
--
ALTER TABLE `residency_event`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `thread_event`
--
ALTER TABLE `thread_event`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `usermenu`
--
ALTER TABLE `usermenu`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `usersistem`
--
ALTER TABLE `usersistem`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categoryevent`
--
ALTER TABLE `categoryevent`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categorynews`
--
ALTER TABLE `categorynews`
  MODIFY `idx` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoryprogram`
--
ALTER TABLE `categoryprogram`
  MODIFY `idx` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `idx` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `content_to_image`
--
ALTER TABLE `content_to_image`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_to_kategori`
--
ALTER TABLE `content_to_kategori`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_to_tag`
--
ALTER TABLE `content_to_tag`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `event_artist`
--
ALTER TABLE `event_artist`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `event_to_category`
--
ALTER TABLE `event_to_category`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imagemanager`
--
ALTER TABLE `imagemanager`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `in_inspirasi`
--
ALTER TABLE `in_inspirasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `in_inspirasi_detail`
--
ALTER TABLE `in_inspirasi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `in_post_categories`
--
ALTER TABLE `in_post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `in_post_content`
--
ALTER TABLE `in_post_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `in_products`
--
ALTER TABLE `in_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `in_product_color`
--
ALTER TABLE `in_product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `in_product_feature`
--
ALTER TABLE `in_product_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `in_product_file`
--
ALTER TABLE `in_product_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `in_product_type`
--
ALTER TABLE `in_product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `komponen`
--
ALTER TABLE `komponen`
  MODIFY `idkomponen` int(10) NOT NULL AUTO_INCREMENT COMMENT 'header,menu,iklan,isi,keterangan filed form', AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `idx` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `logdelrecord`
--
ALTER TABLE `logdelrecord`
  MODIFY `idx` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;
--
-- AUTO_INCREMENT for table `menuutama`
--
ALTER TABLE `menuutama`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `metatag`
--
ALTER TABLE `metatag`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `program_to_category`
--
ALTER TABLE `program_to_category`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `idx` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `publishing`
--
ALTER TABLE `publishing`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `residency`
--
ALTER TABLE `residency`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `residency_event`
--
ALTER TABLE `residency_event`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `idx` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `thread_event`
--
ALTER TABLE `thread_event`
  MODIFY `idx` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `idx` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usermenu`
--
ALTER TABLE `usermenu`
  MODIFY `idx` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7419;
--
-- AUTO_INCREMENT for table `usersistem`
--
ALTER TABLE `usersistem`
  MODIFY `idx` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
