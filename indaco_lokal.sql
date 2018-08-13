# SQL Manager 2010 for MySQL 4.5.0.9
# ---------------------------------------
# Host     : hostingiix.net
# Port     : 3306
# Database : hostingi_indaci


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

SET FOREIGN_KEY_CHECKS=0;

#
# Structure for the `about` table : 
#

DROP TABLE IF EXISTS `about`;

CREATE TABLE `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isi_indo` text COLLATE utf8_unicode_ci NOT NULL,
  `isi_eng` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Structure for the `artist` table : 
#

DROP TABLE IF EXISTS `artist`;

CREATE TABLE `artist` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` varchar(5) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `bahasa` table : 
#

DROP TABLE IF EXISTS `bahasa`;

CREATE TABLE `bahasa` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `bahasa` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `categoryevent` table : 
#

DROP TABLE IF EXISTS `categoryevent`;

CREATE TABLE `categoryevent` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `categoryevent` varchar(50) DEFAULT NULL,
  `description` text,
  `image` varchar(100) NOT NULL DEFAULT '0',
  `slug` varchar(50) DEFAULT NULL,
  `idparent` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `categorynews` table : 
#

DROP TABLE IF EXISTS `categorynews`;

CREATE TABLE `categorynews` (
  `idx` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `categorynews` varchar(50) DEFAULT NULL,
  `description` text,
  `image` varchar(100) NOT NULL DEFAULT '0',
  `slug` varchar(50) DEFAULT NULL,
  `idparent` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `categoryprogram` table : 
#

DROP TABLE IF EXISTS `categoryprogram`;

CREATE TABLE `categoryprogram` (
  `idx` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `categoryprogram` varchar(50) DEFAULT NULL,
  `description` text,
  `image` varchar(100) NOT NULL DEFAULT '0',
  `slug` varchar(50) DEFAULT NULL,
  `idparent` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `content` table : 
#

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `idx` int(10) NOT NULL AUTO_INCREMENT,
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
  `image3` text,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

#
# Structure for the `content_to_image` table : 
#

DROP TABLE IF EXISTS `content_to_image`;

CREATE TABLE `content_to_image` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `idcontent` int(11) DEFAULT NULL,
  `idimage` int(11) DEFAULT NULL,
  `content` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `content_to_kategori` table : 
#

DROP TABLE IF EXISTS `content_to_kategori`;

CREATE TABLE `content_to_kategori` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `idcontent` int(11) DEFAULT NULL,
  `idkategori` int(11) DEFAULT NULL,
  `urut` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `content_to_tag` table : 
#

DROP TABLE IF EXISTS `content_to_tag`;

CREATE TABLE `content_to_tag` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `idcontent` int(11) DEFAULT NULL,
  `idmeatatag` int(11) DEFAULT NULL,
  `content` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `event` table : 
#

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `title_ind` varchar(200) DEFAULT NULL,
  `title_eng` varchar(200) DEFAULT NULL,
  `description_ind` text,
  `description_eng` text,
  `kategori` int(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for the `event_artist` table : 
#

DROP TABLE IF EXISTS `event_artist`;

CREATE TABLE `event_artist` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

#
# Structure for the `event_to_category` table : 
#

DROP TABLE IF EXISTS `event_to_category`;

CREATE TABLE `event_to_category` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `idevent` int(11) DEFAULT NULL,
  `idcategory` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `imagemanager` table : 
#

DROP TABLE IF EXISTS `imagemanager`;

CREATE TABLE `imagemanager` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `alt` varchar(50) DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `in_brosolin` table : 
#

DROP TABLE IF EXISTS `in_brosolin`;

CREATE TABLE `in_brosolin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `masalah` text,
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Structure for the `in_depo` table : 
#

DROP TABLE IF EXISTS `in_depo`;

CREATE TABLE `in_depo` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama_depo` varchar(255) DEFAULT NULL,
  `alamat_depo` text,
  `nama_bm` varchar(50) DEFAULT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `tel_bm` varchar(50) DEFAULT NULL,
  `tel_admin` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `map_lat` varchar(50) NOT NULL,
  `map_lang` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `in_inspirasi` table : 
#

DROP TABLE IF EXISTS `in_inspirasi`;

CREATE TABLE `in_inspirasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Structure for the `in_inspirasi_detail` table : 
#

DROP TABLE IF EXISTS `in_inspirasi_detail`;

CREATE TABLE `in_inspirasi_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inspirasi_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Structure for the `in_post_categories` table : 
#

DROP TABLE IF EXISTS `in_post_categories`;

CREATE TABLE `in_post_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Structure for the `in_post_content` table : 
#

DROP TABLE IF EXISTS `in_post_content`;

CREATE TABLE `in_post_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_popup` varchar(100) DEFAULT NULL,
  `video_url` varchar(250) DEFAULT NULL,
  `video_url_2` varchar(250) DEFAULT NULL,
  `video_url_3` varchar(250) DEFAULT NULL,
  `categories` text NOT NULL,
  `source` varchar(50) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

#
# Structure for the `in_product_color` table : 
#

DROP TABLE IF EXISTS `in_product_color`;

CREATE TABLE `in_product_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=478 DEFAULT CHARSET=latin1;

#
# Structure for the `in_product_feature` table : 
#

DROP TABLE IF EXISTS `in_product_feature`;

CREATE TABLE `in_product_feature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ind_name` varchar(50) NOT NULL,
  `eng_name` varchar(50) DEFAULT NULL,
  `ind_description` text,
  `eng_description` text,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

#
# Structure for the `in_product_file` table : 
#

DROP TABLE IF EXISTS `in_product_file`;

CREATE TABLE `in_product_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

#
# Structure for the `in_product_type` table : 
#

DROP TABLE IF EXISTS `in_product_type`;

CREATE TABLE `in_product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ind_title` varchar(100) NOT NULL,
  `eng_title` varchar(100) DEFAULT NULL,
  `ind_description` text,
  `eng_description` text,
  `image` varchar(100) DEFAULT NULL,
  `bg_image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Structure for the `in_products` table : 
#

DROP TABLE IF EXISTS `in_products`;

CREATE TABLE `in_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `type_title` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ind_description` text NOT NULL,
  `eng_description` text,
  `features_id` text COMMENT 'json from in_product_feature',
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

#
# Structure for the `in_subscriber` table : 
#

DROP TABLE IF EXISTS `in_subscriber`;

CREATE TABLE `in_subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `kabupaten` table : 
#

DROP TABLE IF EXISTS `kabupaten`;

CREATE TABLE `kabupaten` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kabupaten` varchar(4) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `idprovinsi` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=506 DEFAULT CHARSET=latin1;

#
# Structure for the `kategori` table : 
#

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) DEFAULT NULL,
  `idparent` int(11) DEFAULT NULL,
  `deskripsi` text,
  `image` varchar(50) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `kecamatan` table : 
#

DROP TABLE IF EXISTS `kecamatan`;

CREATE TABLE `kecamatan` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kecamatan` varchar(10) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `idkabupaten` int(11) DEFAULT NULL,
  `idkota` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Structure for the `kelurahan` table : 
#

DROP TABLE IF EXISTS `kelurahan`;

CREATE TABLE `kelurahan` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kelurahan` varchar(10) DEFAULT NULL,
  `idkecamatan` int(11) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `komponen` table : 
#

DROP TABLE IF EXISTS `komponen`;

CREATE TABLE `komponen` (
  `idkomponen` int(10) NOT NULL AUTO_INCREMENT COMMENT 'header,menu,iklan,isi,keterangan filed form',
  `NmKomponen` varchar(40) DEFAULT NULL,
  `isshow` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idkomponen`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

#
# Structure for the `kota` table : 
#

DROP TABLE IF EXISTS `kota`;

CREATE TABLE `kota` (
  `idx` int(10) NOT NULL AUTO_INCREMENT,
  `kode_kota` varchar(10) NOT NULL DEFAULT '0',
  `kota` text,
  `idprovinsi` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

#
# Structure for the `logdelrecord` table : 
#

DROP TABLE IF EXISTS `logdelrecord`;

CREATE TABLE `logdelrecord` (
  `idx` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `idxhapus` varchar(10) DEFAULT NULL,
  `keterangan` text,
  `nmtable` varchar(100) DEFAULT NULL,
  `tgllog` datetime DEFAULT NULL,
  `ideksekusi` int(10) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

#
# Structure for the `menu` table : 
#

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `idmenu` int(10) NOT NULL AUTO_INCREMENT,
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
  `isumum` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idmenu`)
) ENGINE=MyISAM AUTO_INCREMENT=347 DEFAULT CHARSET=latin1;

#
# Structure for the `menuutama` table : 
#

DROP TABLE IF EXISTS `menuutama`;

CREATE TABLE `menuutama` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `idparent` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL,
  `customlink` varchar(200) DEFAULT NULL,
  `penghubungcontent` varchar(200) DEFAULT NULL,
  `idcontent` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `metatag` table : 
#

DROP TABLE IF EXISTS `metatag`;

CREATE TABLE `metatag` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `metakey` varchar(255) DEFAULT NULL,
  `value` longtext,
  `idcontent` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `news` table : 
#

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
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
  `iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `page` table : 
#

DROP TABLE IF EXISTS `page`;

CREATE TABLE `page` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
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
  `iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `program` table : 
#

DROP TABLE IF EXISTS `program`;

CREATE TABLE `program` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
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
  `iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `program_to_category` table : 
#

DROP TABLE IF EXISTS `program_to_category`;

CREATE TABLE `program_to_category` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `idevent` int(11) DEFAULT NULL,
  `idcategory` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `provinsi` table : 
#

DROP TABLE IF EXISTS `provinsi`;

CREATE TABLE `provinsi` (
  `idx` int(10) NOT NULL AUTO_INCREMENT,
  `kode_provinsi` varchar(5) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idx`),
  UNIQUE KEY `id_provinsi` (`kode_provinsi`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

#
# Structure for the `publishing` table : 
#

DROP TABLE IF EXISTS `publishing`;

CREATE TABLE `publishing` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
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
  `idimage` int(11) DEFAULT '0',
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `residensi` table : 
#

DROP TABLE IF EXISTS `residensi`;

CREATE TABLE `residensi` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `istampil` enum('Y','N') DEFAULT 'Y',
  `keyword` varchar(200) DEFAULT NULL,
  `idartist` int(11) DEFAULT NULL,
  `idmetatag` int(11) DEFAULT NULL,
  `idbahasa` int(11) DEFAULT NULL,
  `idimage` int(11) DEFAULT NULL,
  `update` datetime DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `thread` table : 
#

DROP TABLE IF EXISTS `thread`;

CREATE TABLE `thread` (
  `idx` int(5) NOT NULL AUTO_INCREMENT,
  `title_ind` varchar(50) DEFAULT NULL,
  `title_eng` varchar(50) DEFAULT NULL,
  `content_ind` text,
  `content_eng` text,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Structure for the `thread_event` table : 
#

DROP TABLE IF EXISTS `thread_event`;

CREATE TABLE `thread_event` (
  `idx` int(5) NOT NULL AUTO_INCREMENT,
  `thread_id` int(5) DEFAULT NULL,
  `event_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

#
# Structure for the `tipemenu` table : 
#

DROP TABLE IF EXISTS `tipemenu`;

CREATE TABLE `tipemenu` (
  `idTipeMenu` varchar(1) DEFAULT NULL,
  `NmTipeMenu` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Structure for the `usergroup` table : 
#

DROP TABLE IF EXISTS `usergroup`;

CREATE TABLE `usergroup` (
  `idx` int(10) NOT NULL AUTO_INCREMENT,
  `NmUserGroup` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Structure for the `usermenu` table : 
#

DROP TABLE IF EXISTS `usermenu`;

CREATE TABLE `usermenu` (
  `idx` int(10) NOT NULL AUTO_INCREMENT,
  `iduser` int(10) DEFAULT NULL,
  `idmenu` int(10) DEFAULT NULL,
  `idaplikasi` int(10) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=7419 DEFAULT CHARSET=latin1;

#
# Structure for the `usersistem` table : 
#

DROP TABLE IF EXISTS `usersistem`;

CREATE TABLE `usersistem` (
  `idx` int(10) NOT NULL AUTO_INCREMENT,
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
  `imehp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for the `about` table  (LIMIT 0,500)
#

INSERT INTO `about` (`id`, `isi_indo`, `isi_eng`) VALUES 
  (1,'<p>Yogyakarta</p>','<p>Pakuningratan</p>');
COMMIT;

#
# Data for the `artist` table  (LIMIT 0,500)
#

INSERT INTO `artist` (`idx`, `name`, `address`, `sex`, `birthdate`) VALUES 
  (1,'Dimas','Jalan','0','2018-03-18'),
  (2,'yot','jalan sawit','0','2018-03-22'),
  (3,'A','Jalan A','0','2018-03-16'),
  (4,'B','Jalan B','1','2018-03-29');
COMMIT;

#
# Data for the `bahasa` table  (LIMIT 0,500)
#

INSERT INTO `bahasa` (`idx`, `bahasa`, `slug`) VALUES 
  (1,'Indonesia','id'),
  (2,'english','en');
COMMIT;

#
# Data for the `event` table  (LIMIT 0,500)
#

INSERT INTO `event` (`idx`, `title_ind`, `title_eng`, `description_ind`, `description_eng`, `kategori`, `tanggal`) VALUES 
  (1,'kok','we','<p>lop</p>','<p>de</p>',0,'2018-03-05'),
  (2,'Baru','New','<p>Saja</p>','<p>One</p>',0,'2018-03-05'),
  (3,'sad','jkjkj','<p>we</p>','<p>tt</p>',0,'2018-03-17'),
  (4,'er','lklkl','<p>wew</p>','<p>poopopo</p>',1,'2018-03-20'),
  (6,'w','ee','<p>r</p>','<p>dd</p>',1,'2018-03-17'),
  (7,'sdsdsd','EE','<p>xcxcc</p>','<p>jkjkjkjk</p>',1,'2018-03-17');
COMMIT;

#
# Data for the `event_artist` table  (LIMIT 0,500)
#

INSERT INTO `event_artist` (`idx`, `event_id`, `artist_id`) VALUES 
  (31,1,2),
  (33,4,1),
  (34,4,2),
  (35,4,3),
  (36,4,4),
  (37,3,1),
  (38,3,3),
  (39,2,3),
  (41,6,1),
  (42,7,2);
COMMIT;

#
# Data for the `in_brosolin` table  (LIMIT 0,500)
#

INSERT INTO `in_brosolin` (`id`, `nama`, `masalah`, `created`) VALUES 
  (1,'Dev Test','One two three four five six ten',1532855661);
COMMIT;

#
# Data for the `in_depo` table  (LIMIT 0,500)
#

INSERT INTO `in_depo` (`id`, `nama_depo`, `alamat_depo`, `nama_bm`, `nama_admin`, `tel_bm`, `tel_admin`, `image`, `map_lat`, `map_lang`) VALUES 
  (1,'Depo Tirtomartani','JL Tanjungtirto KM. 0,5 Gendingan, Tirtomartani, Kalasan, Sleman, Yogyakarta','Wawan Sutiyanto','Dewi Putri Rahayuningsih','628112745138','628112745140','q1vsji8mju5wvj4/20180802001601.jpg','-7.761712155015326','110.47069017106548'),
  (2,'Semarang Depo','Simpang Lima','Test','Coba','123','111','fkkh1sq4dn61td4/20180802002702.jpg','-6.991360010590045','110.41551383659476');
COMMIT;

#
# Data for the `in_inspirasi` table  (LIMIT 0,500)
#

INSERT INTO `in_inspirasi` (`id`, `name`) VALUES 
  (3,'Inspirasi 1'),
  (5,'Inspirasi 2'),
  (6,'Inspirasi 3'),
  (7,'Inspirasi 4'),
  (8,'Inspirasi 5');
COMMIT;

#
# Data for the `in_inspirasi_detail` table  (LIMIT 0,500)
#

INSERT INTO `in_inspirasi_detail` (`id`, `inspirasi_id`, `name`, `image1`, `image2`) VALUES 
  (1,3,'Homey Belazo','inspirasi-homey-belazo.png','inspirasi-homey-belazo-12.jpg'),
  (3,3,'Homey Belazo','inspirasi-homey-belazo.png','inspirasi-homey-belazo-22.jpg'),
  (4,3,'Homey Belazo','inspirasi-homey-belazo.png','inspirasi-homey-belazo-32.jpg'),
  (5,5,'Creamy Belazo','inspirasi-creamy-belazo.png','inspirasi-creamy-belazo-13.jpg'),
  (6,5,'Creamy Belazo','inspirasi-creamy-belazo.png','inspirasi-creamy-belazo-23.jpg'),
  (7,5,'Creamy Belazo','inspirasi-creamy-belazo.png','inspirasi-creamy-belazo-32.jpg'),
  (8,6,'Firm Woodgrano','inspirasi-firm-woodgrano.png','inspirasi-firm-woodgrano.jpg'),
  (9,6,'Firm Graniteur','inspirasi-firm-graniteur.png','inspirasi-firm-graniteur-1.jpg'),
  (10,6,'Firm Graniteur','inspirasi-firm-graniteur.png','inspirasi-firm-graniteur-2.jpg'),
  (11,7,'Modern Top Seal','inspirasi-modern-top-seal.png','inspirasi-modern-top-seal1.jpg'),
  (12,7,'Modern Hot Seal','inspirasi-modern-hot-seal-1.png','inspirasi-modern-hot-seal-11.jpg'),
  (13,7,'Modern Hot Seal','inspirasi-modern-hot-seal-2.png','inspirasi-modern-hot-seal-21.jpg'),
  (14,8,'Fresh Envy','inspirasi-fresh-envy.png','inspirasi-fresh-envy-11.jpg'),
  (15,8,'Fresh Envy','inspirasi-fresh-envy.png','inspirasi-fresh-envy-21.jpg'),
  (16,8,'Fresh Envy','inspirasi-fresh-envy.png','inspirasi-fresh-envy-31.jpg');
COMMIT;

#
# Data for the `in_post_categories` table  (LIMIT 0,500)
#

INSERT INTO `in_post_categories` (`id`, `name`, `description`) VALUES 
  (1,'Eksterior',''),
  (2,'Interior',''),
  (3,'Video Tutorial',''),
  (4,'Sejarah',''),
  (5,'Visi Misi',''),
  (6,'TVC Indaco',''),
  (7,'Hymne',''),
  (8,'Proyek',''),
  (9,'Csr',''),
  (10,'Faq',''),
  (11,'Berita','');
COMMIT;

#
# Data for the `in_post_content` table  (LIMIT 0,500)
#

INSERT INTO `in_post_content` (`id`, `title`, `author`, `content`, `image`, `image_popup`, `video_url`, `video_url_2`, `video_url_3`, `categories`, `source`, `created`) VALUES 
  (1,'Solusi Dinding Lembab Saat Musim Penghujan','Aji Baskoro','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Memasuki musim penghujan, dinding rumah mesti menjadi perhatian. Pasalnya, guyuran air hujan yang terus menerus dapat berdampak buruk pada dinding rumah. Dinding akan menjadi lembab. Kelembaban tidak hanya terjadi pada dinding luar rumah yang langsung menerima guyuran air hujan, tetapi juga kerap merembes sampai ke dinding bagian dalam.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Kelembaban yang terjadi pada dinding rumah tidak boleh diabaikan. Pasalnya, hal itu dapat memicu kerusakan-kerusakan lain yang lebih parah, misalnya lapisan cat menjadi mengapur, menggelembung atau mengelupas. Kerusakan tersebut terjadi karena tingginya kadar air di dalam dinding.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Salah satu cara supaya dinding rumah tidak lembab selama musim penghujan, adalah dengan melapisi dinding dengan cat tembok tahan air. Namun sebelumnya, ada beberapa prosedur yang harus dilakukan sehingga hasil pengecatan bisa optimal.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Pertama-tama, harus dipastikan bahwa kelembaban yang terjadi pada dinding tidak disebabkan oleh kebocoran. Jika ternyata kelembaban tersebut akibat kebocoran, maka kebocoran itulah yang wajib diselesaikan terlebih dahulu.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Jika kondisi dinding belum lembab, maka pengecatan bisa langsung dilakukan. Sementara jika dinding sudah lembab, harus dipastikan terlebih dahulu bahwa cat lama yang masih menempel dalam kondisi baik dan tidak mudah mengelupas. Jika cat dinding ternyata sudah mengelupas, maka perlu dilakukan pengerokan hingga bersih sebelum memulai pengecatan.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Untuk mendapatkan perlindungan optimal pada dinding rumah, disarankan supaya memilih produk cat dinding dengan kualitas prima, baik dalam hal ketahanan warna, maupun kerekatan lapisan. Terlebih, untuk dinding luar ruangan yang langsung terkena sinar matahari dan air hujan.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Dalam hal ini, dua produk unggulan PT. Indaco Warna Dunia dapat menjadi pilihan yang tepat. Yang pertama adalah Belazo Climagard, cat eksterior yang tidak hanya memberikan perlindungan cuaca hingga tujuh tahun, tetapi juga memiliki ribuan pilhan warna menarik. Yang kedua adalah Top Seal, cat dengan lapisan elastis yang dapat menahan air hujan, sehingga tidak mudah meresap ke dalam lapisan tembok.</p>','carakami-eksterior1.jpg',NULL,'',NULL,NULL,'{\"0\":\"1\"}','www.bernas.id',0),
  (3,'Penyebab Nailhead Rusting','','<p><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px;\">Bagaimana memperbaiki dinding yang sudah kena&nbsp;</span><em style=\"box-sizing: border-box; color: #505050; font-family: Muli-Regular; font-size: 14px;\">nailhead rusting</em><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px;\">?</span></p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><em style=\"box-sizing: border-box;\">Nailhead Rusting</em>&nbsp;merupakan situasi di mana paku berkarat yang menancap ke dinding menimbulkan noda cokelat kemerahan di permukaan cat. Sebabnya, paku yang digunakan tidak dilapisi anti karat sehingga tidak tahan lama. Dalam mengatasi hal ini, Anda bisa mencegahnya dengan memilih paku yang sudah mengandung lapisan anti karat.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Bagaimana memperbaiki dinding yang sudah kena&nbsp;<em style=\"box-sizing: border-box;\">nailhead rusting</em>?</span></p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Memperbaiki dinding dengan&nbsp;<em style=\"box-sizing: border-box;\">nailhead rusting</em>&nbsp;memang tidak mudah, karena tidak cukup dengan langsung melapisi ulang dengan cat baru. Berikut beberapa hal yang bisa Anda terapkan:</p>\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">\r\n<li style=\"box-sizing: border-box;\">Ampelas bagian dinding yang kena karat atau&nbsp;<em style=\"box-sizing: border-box;\">nailhead rusting</em>. Ini adalah satu cara untuk membersihkan bekas karat hingga tidak bersisa.</li>\r\n<li style=\"box-sizing: border-box;\">Melapisi dengan primer anti karat. Dalam hal ini Anda bisa gunakan&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Envi Anti Corrosive Primer</span>. Lalu cat ulang dengan&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Envi Wall Putty</span>.</li>\r\n<li style=\"box-sizing: border-box;\">Lalu Anda bisa memaku ulang dengan paku baru. Tentunya yang mengandung lapisan anti karat, atau berbahan galvanis.</li>\r\n</ol>','carakami-eksterior-2.jpg',NULL,'',NULL,NULL,'{\"0\":\"1\"}','',0),
  (4,'Pilihan Warna Tepat untuk Kamar Anak','Aji Baskoro','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Selain berfungsi sebagai tempat istirahat, kamar tidur juga berfungsi sebagai tempat beraktivitas.Terlebih pada anak-anak usia pertumbuhan, kamar juga merupakan sarana belajar mengenal hal-hal baru dan mengembangkan kreativitas. Anda bisa mendukung proses belajar dan pengembangan kreativitas tersebut dengan mengaplikasikan warna yang tepat pada kamar anak. Pasalnya, aplikasi warna yang tepat pada kamar anak dapat menciptakan suasana menyenangkan bagi mereka untuk belajar.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Seniman dan konsultan warna asal Amerika Serikat, Sunny Goode dalam bukunya berjudul&nbsp;<em style=\"box-sizing: border-box;\">&ldquo;Paint Can! Children&rsquo;s Room: Patterns &amp; Projects for Colorful Creative Spaces&rdquo;</em>&nbsp;menjelaskan bahwa orang tua bisa memberi perubahan besar pada suasana kamar anak hanya dengan sentuhan kecil warna. Berikut adalah beberapa warna yang bisa Anda coba aplikasikan pada kamar anak untuk mendukung kreativitas mereka.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Warna pertama yang bisa Anda coba aplikasikan adalah merah. Warna ini memiliki kemampuan untuk membangkitkan energi di dalam tubuh dan pikiran, sehingga anak-anak jadi bersemangat dalam beraktivitas. Kendati demikian, sejumlah penelitian menyebutkan bahwa warna merah yang terlalu banyak dapat menimbulkan sikap agresif dan mengganggu fokus, sehingga kurang cocok diaplikasikan pada kamar anak yang sudah aktif. Dalam mengaplikasikan warna merah pada kamar anak, Anda juga bisa memadukannya dengan warna lain. Jadikan warna merah sebagai aksen warna-warna kalem yang menenangkan sehingga keduanya bisa saling melengkapi. Warna oranye juga bisa menjadi pilihan untuk kamar anak Anda. Pasalnya, warna ini mampu menciptakan suasana hangat dan bersahabat. Bagi anak-anak, warna oranye bisa meningkatkan kepercayaan diri dan kemandirian, memberikan inspirasi bagi mereka untuk berkomunikasi dan bekerja sama.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Warna kuning juga bisa menjadi pilihan untuk kamar anak Anda. Sesuai dengan karakternya, warna kuning bisa menciptakan kegembiraan dan keceriaan terlebih pada anak-anak. Sementara warna kuning muda juga bisa membantu meningkatkan konsentrasi anak. Namun, warna kuning yang berlebihan bisa memunculkan suasana tidak nyaman. Jika kamar anak Anda berkonsep natural, cobalah untuk mengaplikasikan warna hijau. Pasalnya warna ini punya dampak yang cukup signifikan pada perkembangan anak-anak. Para ilmuwan bahkan mengatakan warna hijau mampu meningkatkan kemampuan membaca pada anak-anak. Terlebih tidak ada efek negatif tertentu jika warna ini diaplikasikan secara berlebihan. Namun hal itu tetap tidak disarankan karena akan mempengaruhi keindahan kamar anak Anda.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Selain menggunakan warna-warna di atas, Anda juga bisa mengaplikasikan warna-warna lain yang memang disukai anak Anda. Ajaklah anak Anda berdiskusi tentang warna apa yang mereka inginkan untuk kamar mereka. Terlepas dari warna yang mereka pilih, proses diskusi ini juga akan meningkatkan daya kreativitas dan imajinasi mereka.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Untuk memenuhi kebutuhan tersebut, Anda tentu membutuhkan produk cat yang tidak hanya menyediakan beragam pilihan warna tetapi juga aman. Dalam hal ini,&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Kidzdream</span>&nbsp;dari PT Indaco Warna Dunia layak menjadi pilihan Anda. Selain tersedia dalam ratusan pilihan warna khusus kamar anak, Belazo Kidzdream juga aman karena 100 persen berbahan dasar air serta tidak mengandung timbal dan raksa. Jangan khawatir, jika anak Anda gemar mencorat-coret dinding. Belazo Kidzdream dilengkapi dengan teknologi anti grafiti yang mencegah noda meresap ke lapisan cat, sehingga noda jadi mudah dibersihkan.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Mari dukung perkembangan kreativitas anak Anda dengan mulai menggunakan Belazo Kidzdream.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Kidzdream, Bebaskan Noda Bebaskan Kreativitas.</span></p>','carakami-interior1.jpg',NULL,'',NULL,NULL,'{\"0\":\"2\"}','www.bernas.id',0),
  (5,'Cat Kamar Anak BELAZO KIDZDREAM','','','carakami-tutorial1.jpg',NULL,'https://www.youtube.com/embed/p0mFq_DZY60  ',NULL,NULL,'{\"0\":\"3\"}','',0),
  (6,'Sejarah','','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #ffffff; font-family: Muli-Regular; font-size: 14px; text-align: justify; background-color: #14259b;\">PT. Indaco Warna Dunia adalah perusahaan investasi lokal murni yang didirikan oleh orang &ndash; orang yang inovatif, kreatif, dan agresif yang melihat peluang dalam industri cat. Mereka umumnya memiliki latar belakang teknologi cat yang merupakan bagian dari kunci keunggulan mereka untuk memproduksi dan bersaing dengan produsen cat yang sudah ada.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #ffffff; font-family: Muli-Regular; font-size: 14px; text-align: justify; background-color: #14259b;\">PT. Indaco Warna Dunia mulai beroperasi di Jakarta. Pada awalnya, kami bergerak pada produksi cat NC untuk bidang otomotif dan cat sintetic alkyd serta cat anti karat untuk industri logam. Dalam perkembangan selanjutnya, kami mencoba memproduksi cat dekoratif berbahan dasar air yang sedang digandrungi oleh pasar cat Indonesia. Kini, kami bermarkas di Karanganyar Jawa Tengah.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #ffffff; font-family: Muli-Regular; font-size: 14px; text-align: justify; background-color: #14259b;\">Kami sekarang dan selanjutnya akan terfokus pada usaha untuk mengembangkan cat dekoratif berbahan dasar air dan pelarut organik. Jangkauan pasar kami meliputi pengecer dan distributor besar.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #ffffff; font-family: Muli-Regular; font-size: 14px; text-align: justify; background-color: #14259b;\">Ketersediaan jenis produk saat ini meliputi :</p>\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #ffffff; font-family: Muli-Regular; font-size: 14px; text-align: justify; background-color: #14259b; list-style-type: square;\">\r\n<li style=\"box-sizing: border-box;\">Cat dekoratif berbahan dasar air dengan merek Belazo dan Envi Latex</li>\r\n<li style=\"box-sizing: border-box;\">Cat sintetik dengan merek Envi Alkyd</li>\r\n<li style=\"box-sizing: border-box;\">Bahan kimia untuk bangunan dengan merek Modacon</li>\r\n</ol>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #ffffff; font-family: Muli-Regular; font-size: 14px; text-align: justify; background-color: #14259b;\">Dengan total pekerja 500 orang PT. Indaco Warna Dunia mampu memproduksi 40 MT per hari atau berkisar pada angka 1000 MT per bulan.</p>','',NULL,'',NULL,NULL,'{\"0\":\"4\"}','',0),
  (7,'Visi & Misi','','<h4 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; font-family: Muli-Regular; font-weight: 500; line-height: 1.2; color: #ffffff; font-size: 1.5rem; text-align: justify; background-color: #14259b;\"><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">VISI a</span></h4>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #ffffff; font-family: Muli-Regular; font-size: 14px; text-align: justify; background-color: #14259b;\">Indaco dengan semua produknya akan menjadi barometer untuk industri cat dalam hal kualitas, inovasi, dan tanggung jawab terhadap lingkungan hidup.</p>\r\n<h4 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; font-family: Muli-Regular; font-weight: 500; line-height: 1.2; color: #ffffff; font-size: 1.5rem; text-align: justify; background-color: #14259b;\"><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">MISI</span></h4>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #ffffff; font-family: Muli-Regular; font-size: 14px; text-align: justify; background-color: #14259b;\">Menghasilkan produk-produk berkualitas yang memberikan tingkat maksimum dari nilai yang diperoleh pelanggan pada tingkat optimum dari biaya yang dikeluarkan oleh pelanggan melalui penerapan Total Quality Management dengan standar internasional.</p>','',NULL,'',NULL,NULL,'{\"0\":\"5\"}','',0),
  (8,'TVC Indaco','','<div id=\"tvc-slider\" class=\"carousel slide carousel-fade\" data-ride=\"carousel\" data-interval=\"false\">\r\n<div class=\"carousel-inner\">\r\n<div class=\"carousel-item active\"><img class=\"img-fluid\" src=\"img/tvc-video-poster-1.png\" alt=\"\" /> <img src=\"img/play.png\" alt=\"\" /> <!--\r\n<div class=\"embed-responsive embed-responsive-16by9\">\r\n\t\t\t\t\t\t\t\t\t<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/nFuHRw--YWw?rel=0&amp;controls=0&amp;showinfo=0&amp;html5=true\"></iframe>\r\n\t\t\t\t\t\t\t\t</div>\r\n--></div>\r\n<div class=\"carousel-item\"><img class=\"img-fluid\" src=\"img/tvc-video-poster-2.png\" alt=\"\" /> <img src=\"img/play.png\" alt=\"\" /> <!--\r\n<div class=\"embed-responsive embed-responsive-16by9\">\r\n\t\t\t\t\t\t\t\t\t<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/6a-3jutITPE?rel=0&amp;controls=0&amp;showinfo=0&amp;html5=true\"></iframe>\r\n\t\t\t\t\t\t\t\t</div>\r\n--></div>\r\n</div>\r\n<div class=\"tvc-slider-control\">&nbsp;</div>\r\n</div>','tvc-video-poster-1.png',NULL,'https://www.youtube.com/embed/6a-3jutITPE',NULL,NULL,'{\"0\":\"6\"}','',0),
  (9,'Hymne','','<p><img class=\"img-fluid\" src=\"img/hymne-video-poster.png\" alt=\"\" /> <img src=\"img/play.png\" alt=\"\" /></p>','hymne-video-poster.png',NULL,'https://www.youtube.com/embed/28iamxp3OqE',NULL,NULL,'{\"0\":\"7\"}','',0),
  (10,'Flyover Semanggi','','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Dalam rangka&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">\"Program Jakarta Bersih 2013\"</span>&nbsp;ini, kami berkontribusi dengan mengecat Jembatan Semanggi dengan&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Cat Premium Belazo Multi Emulsion</span>&nbsp;yang dilapisi dengan&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Stain Resistant</span>&nbsp;sebagai penangkal kotor di media dinding.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Untuk media besi, kami menggunakan&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Envi Alkyd Gloss Enamel</span>untuk melindungi dari karat. Kami menggunakan warna&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo 3004 P &ndash; Sussex</span>, dan&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Envi Alkyd Gloss Enamel - Nearly White</span>.</p>','proyek-1.png',NULL,'',NULL,NULL,'{\"0\":\"8\"}','',0),
  (11,'Flyover Pondok Indah','','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Dalam rangka&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">\"Program Jakarta Bersih 2013\"</span>&nbsp;ini, kami berkontribusi dengan mengecat Flyover Pondok Indah menggunakan&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Cat Premium Belazo Multi Emulsion</span>&nbsp;yang dilapisi dengan&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Stain Resistant</span>&nbsp;sebagai penangkal kotor untuk dinding.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Kami menggunakan warna&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo 3004 P &ndash; Sussex</span>.</p>','proyek-1.png',NULL,'',NULL,NULL,'{\"0\":\"8\"}','',0),
  (12,'Flyover Angke','','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Dalam rangka&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">\"Program Jakarta Bersih 2013\"</span>&nbsp;ini, kami berkontribusi dengan mengecat Flyover Angke menggunakan&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Cat Premium Belazo Multi Emulsion</span>&nbsp;yang dilapisi dengan&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Stain Resistant</span>&nbsp;sebagai penangkal kotor untuk dinding.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Kami menggunakan warna&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo 3004 P &ndash; Sussex</span>.</p>','proyek-1.png',NULL,'',NULL,NULL,'{\"0\":\"8\"}','',0),
  (13,'Ubud Village, Ciledug','','<p><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Mengaplikasikan&nbsp;</span><span style=\"box-sizing: border-box; font-family: Muli-Bold; color: #505050; font-size: 14px; text-align: justify;\">Envi Latex Wall Paint</span><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">&nbsp;di Perumahan Ubud Village &ndash; Ciledug, perumahan di wilayah Ciledug untuk menciptakan suasana interior yang sehat karena formulanya yang ramah lingkungan.</span></p>','proyek-4.png',NULL,'',NULL,NULL,'{\"0\":\"8\"}','',0),
  (14,'Peduli Lingkungan PT. Indaco Warna Dunia Pelet Go Green','','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Cinta lingkungan menjadi salah satu hal yang patut untuk kita sadari bersama, khususnya karena semakin banyaknya masyarakat yang tidak sadar dengan kebersihan lingkungannya. Berangkat dari hal itu, PT. Indaco Warna Dunia kembali menggelar&nbsp;<em style=\"box-sizing: border-box;\">Corporate Social Responsibility</em>&nbsp;(CSR) bertajuk &ldquo;Pelet&nbsp;<em style=\"box-sizing: border-box;\">Go Green</em>&rdquo; di Dusun Pelet, Kelurahan Gedong, Karanganyar pada hari Sabtu 11 Februari 2017.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><em style=\"box-sizing: border-box;\">Operation Manager</em>&nbsp;PT. Indaco Warna Dunia sekaligus Ketua tim CSR PT. Indaco Warna Dunia, Muji Lestari mengungkapkan bahwa kegiatan sejalan dengan misi dan kebijakan perusahaan PT. Indaco Warna Dunia yaitu bertanggung jawab terhadap kelestarian lingkungan.&nbsp;<em style=\"box-sizing: border-box;\">Go Green</em>&nbsp;tidak sebatas dengan menanam pohon. Kebanyakan orang, terlebih masyarakat di dusun-dusun hanya memahami cinta alam itu menanam pohon, padahal kegiatan&nbsp;<em style=\"box-sizing: border-box;\">Go Green</em>&nbsp;sangat banyak dan tidak hanya berhenti sampai di situ.&nbsp;<em style=\"box-sizing: border-box;\">Go Green</em>&nbsp;bisa dimulai dengan tidak membuang sampah sembarangan, melakukan 3R sampah, penanaman pohon, dan aktivitas lain yang bertujuan untuk efisiensi SDA.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Beberapa program &ldquo;Pelet&nbsp;<em style=\"box-sizing: border-box;\">Go Green</em>&rdquo; yang dilakukan PT. Indaco di antaranya menyediakan tangki komposter untuk pembuatan kompos sampah organik, di mana setiap KK diberikan fasilitas ini supaya dapat mengolah sampah yang berasal dari aktivitas rumah tangga. Pupuk kompos yang dihasilkan dapat dimanfaatkan untuk keperluan pribadi yaitu untuk pupuk tanaman sayur atau buah yang ditanam per KK, maupun dijual keluar sehingga memberikan pemasukan tambahan. Selain itu, Indaco juga menyediakan tong sampah yang dibedakan antara sampah organik dan anorganik. Di mana nanti masyarakat masih diajarkan untuk bisa memilah sampah dan selanjutnya dikelola di bank sampah.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">PT. Indaco juga memberikan bibit pohon jeruk (<em style=\"box-sizing: border-box;\">Citrus</em>) yang ditanam di lingkungan Dusun Pelet. Tujuan penanaman pohon ini selain untuk mendukung penghijauan, juga untuk mewujudkan Kampung Khas Jeruk yang diharapkan dapat menjadikan agro wisata maupun diperdagangkan sehingga dapat meningkatkan perekonomian warga Dusun Pelet yang sebelumnya terkenal sebagai Desa Tertinggal.</p>','csr-4.png',NULL,'',NULL,NULL,'{\"0\":\"9\",\"1\":\"11\"}','',0),
  (15,'Penghargaan Perusahaan Peduli Lingkungan 2016','','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Kamis, 15 Desember 2016 bertempat di Gedung Wanita Karanganyar diselenggarakan sebuah event bertajuk &ldquo;KARANGANYAR AWARD 2016&rdquo;. Event ini diselenggarakan dalam rangka HUT Kabupaten Karanganyar ke-99 sebagai bentuk apresiasi untuk individu dan institusi di berbagai bidang. Ada puluhan nominasi kategori penghargaan dari berbagai bidang yang menunjukkan kiprah para individu dan instansi/lembaga dalam ikut membangun Kabupaten Karanganyar.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">PT. Indaco Warna Dunia adalah salah satu perusahaan yang berkiprah di bidang industri manufaktur cat ramah lingkungan, dinobatkan menjadi salah satu pemenang penghargaan &ldquo;KARANGANYAR AWARD 2016 &ldquo; kategori perusahaan peduli lingkungan. Penghargaan ini diberikan kepada PT. Indaco Warna Dunia karena kontribusi nyata terhadap lingkungan sekitar secara khususnya dan Kabupaten Karanganyar secara umumnya. Penghargaan diberikan secara langsung oleh Bupati Karanganyar Drs. H. Juliyatmono, MM.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">PT. Indaco Warna Dunia dinilai berhasil mengembangkan sistem teknologi ramah lingkungan serta berhasil mengolah limbah hasil produksi cat dengan baik. Beberapa aspek yang dinilai dalam kategori ini adalah pengelolaan limbah cair, pengelolaan sampah padatan Non B3, pengelolaan limbah B3, pengurangan emisi pencemaran udara serta program CSR yang mengarah ke pengembangan masyarakat (<em style=\"box-sizing: border-box;\">Community Development</em>).</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Kunci keberhasilan PT. Indaco adalah menjalankan program 3R (<em style=\"box-sizing: border-box;\">Reduce, Reuse, Recycle</em>) secara konsisten yang sudah dilakukan di internal perusahaan, program yang menuntut setiap individu di lingkungan perusahaan melakukan pengelolaan dan pemilahan sampah dan meminimalisir limbah. Selain itu kami juga mempunyai sistem pengolahan limbah cair, di mana limbah cair diolah melalui Instalasi Pengolahan Air Limbah (IPAL) sehingga outlet sesuai dengan standar baku mutu sesuai peraturan sehingga aman bagi lingkungan.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">PT. Indaco Warna Dunia juga memiliki program CSR, bekerja sama dengan masyarakat sekitar dalam bentuk bank sampah, yaitu suatu program untuk melakukan pemilahan dan pengumpulan sampah supaya bernilai ekonomis sehingga dapat membantu perekonomian masyarakat dan mengurangi pencemaran lingkungan.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Penghargaan yang telah diperoleh PT. Indaco Warna Dunia ini tentunya membanggakan semua pihak dan menjadi motivasi lebih bagi perusahaan agar senantiasa meningkatkan kepedulian terhadap lingkungan dan masyarakat khususnya di Kabupaten Karanganyar.</p>','news-update1.png',NULL,'',NULL,NULL,'{\"0\":\"9\",\"1\":\"11\"}','',0),
  (16,'Kemeriahan Ulang Tahun Ke-11 PT. Indaco Warna Dunia','','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">INDACO BERSAHABAT</span>&hellip;BERSIH&hellip;SEHAT&hellip;HEBAT&hellip;&hellip;</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Kalimat tersebut menjadi&nbsp;<em style=\"box-sizing: border-box;\">text line</em>&nbsp;dalam acara perayaan ulang tahun PT. Indaco Warna Dunia yang ke-11 pada tanggal 5 Desember 2016. Seluruh karyawan dan jajaran direksi dengan suka cita mengikuti acara tersebut, beberapa perangkat desa dan tokoh-tokoh masyarakat turut hadir dalam memeriahkan acara.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Ulang tahun kali ini mengusung tema &ldquo;INDACO BERSAHABAT&rdquo; yang merupakan kepanjangan dari &ldquo;BERSIH, SEHAT, HEBAT&rdquo;. Harapan dari tema ini adalah PT. Indaco dan segenap masyarakat sekitar untuk berkontribusi dalam menjaga lingkungan agar selalu BERSIH sehingga menciptakan lingkungan yang SEHAT dengan teknologi yang HEBAT. Kegiatan nyata yang sudah dilakukan antara PT. Indaco adalah mendirikan bank sampah. Bank sampah adalah suatu wadah yang didirikan PT. Indaco dan masyarakat untuk melakukan pemilahan dan pengumpulan sampah supaya bisa lebih bernilai ekonomis sehingga dapat membantu perekonomian masyarakat.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Acara ini diselenggarakan dalam dua kegiatan. Kegiatan pertama dilakukan pada tanggal 3 Desember 2016, kegiatan diisi dengan donor darah oleh karyawan PT. Indaco yang bekerjasama dengan PMI Kab. Karanganyar. Selain kegiatan donor darah, PT. Indaco juga mengadakan pembagian sembako gratis kepada masyarakat sekitar. Dalam rangkaian acara tersebut turut diberikan hadiah dan penghargaan kepada anggota bank sampah yang paling aktif di tahun 2016. Kegiatan kedua dilakukan pada tanggal 05 Desember 2016 bertepatan dengan hari jadi PT. Indaco Warna Dunia. Kegiatan dimulai pada pukul 07.00 WIB dengan acara jalan sehat dan gerakan pungut sampah di area perkampungan sekitar pabrik yang dilalui perserta jalan sehat.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Dengan usia yang masih relatif muda bagi sebuah perusahaan, PT. Indaco Warna Dunia memiliki visi besar sebagai produsen cat dekoratif ramah lingkungan No.1 di Indonesia. Dalam sambutan Bapak Iwan Adranacus selaku President Director PT. Indaco Warna Dunia menyampaikan tentang pentingnya kerja keras untuk kemajuan bersama, karena tantangan ke depan akan semakin berat dan persaingan akan semakin sengit, maka pentingnya kerja keras bagi seluruh elemen karyawan PT. Indaco menjadi kunci kesuksesan bersama.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Rangkaian acara diakhiri dengan hiburan untuk karyawan dan pembagian hadiah-hadiah yang diserahkan sendiri oleh Bp. Iwan Adranacus. PT. Indaco Warna Dunia dalam ulang tahun ke-11 ini diharapkan menjadi tonggak sejarah untuk transformasi PT. Indaco Warna Dunia menjadi produsen cat dekoratif ramah lingkungan No.1 di Indonesia.</p>','news-update2.png',NULL,'',NULL,NULL,'{\"0\":\"9\",\"1\":\"11\"}','',0),
  (17,'Belazo Hadir Dengan Kemasan Yang Lebih Modern','','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">BELAZO</span>&nbsp;diluncurkan pertama kali pada tahun 2009. Sejak peluncurannya,&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">BELAZO</span>&nbsp;menjadi pilihan konsumen di segmen premium karena kualitas yang prima dan sajian warna yang eksklusif.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Sambutan konsumen yang baik dan pergerakan kompetisi di industri cat membuat&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">BELAZO</span>&nbsp;juga harus melakukan inovasi agar terus menjadi pilihan terbaik bagi konsumen.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Kini PT. Indaco Warna Dunia meluncurkan kembali pada bulan Agustus 2016 ini dengan &ldquo;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">The NEW BELAZO</span>&rdquo; yang kini lebih mengukuhkan kehadirannya di segmen cat tembok premium dan sejajar dengan merek lain di segmen yang sama.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Kami telah melakukan riset konsumen dalam upaya renovasi brand&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">BELAZO</span>.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Konsumen&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">BELAZO</span>&nbsp;meliputi Ibu Rumah Tangga menengah ke atas yang berusia muda yaitu antara 24- 40 tahun.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Menghargai cita rasa seni dan berani mengekspresikan cita rasa seni mereka dalam gaya eksterior dan interior rumah mereka.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Beberapa keunggulan &ldquo;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">The NEW BELAZO</span>\" yang kami sajikan untuk konsumen kami adalah:</p>\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">\r\n<li style=\"box-sizing: border-box;\">Desain kemasan yang lebih elegan dan artistik. Desain ini telah melalui serangkaian tes di konsumen dan telah dipilih oleh konsumen.</li>\r\n<li style=\"box-sizing: border-box;\">Logo&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">BELAZO</span>&nbsp;yang baru ini disejajarkan oleh konsumen sebagai brand internasional.</li>\r\n<li style=\"box-sizing: border-box;\">Rangkaian produk yang lengkap dengan standar mutu internasional lolos uji Singapore Green Label.</li>\r\n</ol>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">BELAZO</span>&nbsp;percaya bahwa setiap insan manusia terlahir dengan kepandaian artistik dan mengajak untuk berani mengekspresikan citarasa artistik tersebut dengan bebas.&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">BELAZO</span>&nbsp;baru mengusung slogan&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\"><em style=\"box-sizing: border-box;\">LIVE YOUR STYLE</em></span>&nbsp;yang ditujukan bagi konsumen yang ingin mengekspresikan cita rasa artistik mereka melalui desain dan warna rumah pribadi sesuai selera dan gaya masing-masing.</p>','news-update3.png','no-img-brochure.jpg','',NULL,NULL,'{\"0\":\"9\",\"1\":\"11\"}','',0),
  (18,'FAQ','','<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Pemilihan warna untuk pengecatan eksterior dan interior?</strong></p>\r\n<h5>A</h5>\r\n<p><strong>Interior:</strong><br />Untuk interior hal yang terpenting adalah faktor kombinasi dari warna itu sendiri karena semua warna bagus tetapi bagaimana kita mengkombinasikannya.</p>\r\n<p><strong>Eksterior:</strong><br />Untuk warna&ndash;warna yang digunakan di eksterior memang agak sedikit selektif dalam proses pemilihannya karena berhubungan dengan tingkat daya tahan dan keawetan cat itu sendiri. Hindari pemilihan warna cat yang mengandung warna dominan kuning, merah, dan orange karena jenis ketiga warna tadi kurang tahan terhadap cuaca dan sinar matahari.</p>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Tips menghitung kebutuhan pengecatan tembok?</strong></p>\r\n<h5>A</h5>\r\n<p>Agar cat yang dibeli tidak berlebihan ataupun kurang maka hitunglah luas dinding yang akan dicat. Daya sebar dari setiap produk cat berbeda&ndash;beda. Untuk mengetahuinya bisa kita lihat pada petunjuk penggunaan cat yang biasa tertera pada kemasan. Misalnya untuk 1 galon cat (5 kg) tertulis 5m2/kg, angka tersebut menunjukkan daya sebar cat untuk 2 kali lapis.</p>\r\n<p>Contoh Perhitungan Kebutuhan Cat:</p>\r\n<p>Misalnya:<br />Dinding kamar ukuran panjang x lebar x tinggi = 4 x 4 x 3 dengan 1 lubang pintu.</p>\r\n<p>Maka perhitungannya:<br /> Luas: (Panjang x Tinggi) x 4 bidang = (4 x 3) x 4 = 48 m2<br /> Lubang pintu (Panjang x Lebar pintu) = 0.8 x 2.1 = 1.68 m2<br /> Luas Area (luas&ndash;lubang pintu) = 48&ndash;1.68 = 46.32 m2<br /> Jumlah cat yang diperlukan = 46.32 m2 / 5 m2 = 9.3 Kg</p>\r\n<p>(Total Luas Area / Daya sebar /Kg cat)</p>\r\n<p>Sehingga cat yang dibutuhkan untuk proses pengecatan adalah 9 Kg</p>\r\n<p>Untuk kemasan cat dengan satuan liter, cara perhitungannya tidak jauh berbeda, hanya ukuran kemasan biasanya lebih kecil daripada kemasan cat dengan satuan berat (kg).</p>\r\n<p>Ingat: Rumus Massa = Berat Jenis x Volume</p>\r\n<p>Berat jenis cat kebanyakan berkisar 1 &ndash; 1,6 gr/cm3</p>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Tahapan untuk pengecatan luar ruangan?</strong></p>\r\n<h5>A</h5>\r\n<ul>\r\n<li>Lakukan persiapan permukaan tembok meliputi tingkat kering dan kebersihan tembok.</li>\r\n<li>Sebelum melapisi dinding dengan cat, aplikasikan lapisan cat dasar (WA Proof).</li>\r\n<li>Perhatikan keserasian cat dengan elemen&ndash;elemen eksterior lainnya seperti warna atap, batu alam, kusen, daun pintu, dan jendela.</li>\r\n<li>Pertimbangkan cuaca dalam proses pengerjaaan pengecatan.</li>\r\n<li>Gunakan cat yang direkomendasikan untuk eksterior.</li>\r\n</ul>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Tips Pengecatan Synthetic (Cat Kayu-Besi)?</strong></p>\r\n<h5>A</h5>\r\n<ol style=\"list-style-type: upper-alpha;\">\r\n<li>\r\n<p>Pengecatan pada Kayu</p>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>Bersihkan permukaan kayu yang akan dicat dari kotoran dan amplas searah serat menggunakan kertas amplas no.180.</li>\r\n<li>Aduk Envi Alkyd Synthetic Enamel hingga rata, tambahkan Envi Thinner Gloss Enamel secukupnya sesuai alat aplikasi yang akan digunakan, lalu aduk kembali cat tersebut untuk mendapatkan hasil yang seragam. Aplikasikan sampai merata ke seluruh permukaan dan biarkan kering.</li>\r\n<li>Aplikasikan sekali lagi Envi Alkyd Synthetic Enamel dan biarkan kering.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p>Pengecatan pada Besi / Baja</p>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>Bersihkan permukaan besi yang akan dicat dari debu, minyak, karat atau kotoran lainnya, menggunakan kertas amplas, sikat kawat atau menggunakan pembersih karat.</li>\r\n<li>Aplikasikan Envi Anti Corrosive Primer sebagai lapisan dasar dan biarkan kering.</li>\r\n<li>Aduk Envi Alkyd Synthetic Enamel hingga rata, tambahkan Envi Thinner Gloss Enamel secukupnya sesuai alat aplikasi yang digunakan, lalu aduk kembali cat tersebut untuk mendapatkan hasil yang seragam. Aplikasikan sampai merata ke seluruh permukaan dan biarkan kering.</li>\r\n<li>Aplikasikan sekali lagi Envi Alkyd Synthetic Enamel dan biarkan kering.</li>\r\n</ul>\r\n</li>\r\n</ol><hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Pemilihan Politur kayu yang berkualitas?</strong></p>\r\n<h5>A</h5>\r\n<ol style=\"list-style-type: decimal;\">\r\n<li>Praktis pengerjaannya</li>\r\n<li>Ramah lingkungan</li>\r\n<li>Aman bagi kesehatan</li>\r\n<li>Bisa diaplikasikan di dalam dan diluar ruangan</li>\r\n<li>Tahan lama</li>\r\n<li>Koleksi warna lengkap</li>\r\n</ol><hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Tips Pengecatan Politur Kayu</strong></p>\r\n<h5>A</h5>\r\n<ul>\r\n<li>Pilihlah politur yang praktis dan nyaman dalam aplikasinya (misalnya yang berpengencer air).</li>\r\n<li>Tentukan posisi yang akan di politur, di dalam ruangan atau di luar ruangan. Misalnya di luar ruangan, pilihlah politur yang direkomendasikan bisa untuk luar ruangan.</li>\r\n<li>Pilihlah alat aplikasi yang sesuai dan tepat dengan lokasi pengecatan.</li>\r\n<li>Baca aturan pakai dan catat nomor produksi dari politur yang dipilih untuk menghindari jika cat tersebut ada masalah.</li>\r\n<li>Lakukan pengerjaan dan pengenceran sesuai aturan yang tertera pada kemasan.</li>\r\n</ul>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Tips Pengecatan Genteng?</strong></p>\r\n<h5>A</h5>\r\n<ol style=\"list-style-type: lower-alpha;\">\r\n<li>\r\n<p>Untuk pengecatan genteng baru</p>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>Bersihkan permukaan yang akan dicat dari kotoran dan debu.</li>\r\n<li>Aplikasikan cat genteng dengan pengenceran 50% air bersih untuk lapis pertama.</li>\r\n<li>Ulangi pengecatan genteng 2&ndash;3 kali lapis dengan pengenceran 20% air bersih.</li>\r\n</ul>\r\n</li>\r\n<li class=\"mt-3\">\r\n<p>Untuk pengecatan genteng lama</p>\r\n<ul style=\"list-style-type: disc;\">\r\n<li>Genteng yang sudah berjamur bersihkan dengan larutan kaporit 10% (jangan lupa memakai kaos tangan).</li>\r\n<li>Setelah bersih amplas genteng dengan amplas kain no.180, pastikan semua permukaan terkena amplas.</li>\r\n<li>Bersihkan debu hasil pengamplasan.</li>\r\n<li>Lakukan pengecatan dengan cat genteng, pengenceran 20% air bersih 2&ndash;3 kali lapis.</li>\r\n</ul>\r\n</li>\r\n</ol><hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Tips memilih warna untuk interior?</strong></p>\r\n<h5>A</h5>\r\n<p>Dinding dapur, area tangga dan ruang ganti adalah area&ndash;area yang ideal untuk mencoba dengan warna&ndash;warna berani yang lebih kuat.<br />Jika menginginkan perpaduan warna&ndash;warna yang berbeda dalam ruangan, cermati perencanaannya dan perhatikan sambungan antar warna untuk kerapihan waktu pengecatan.</p>\r\n<p>Menggunakan warna sejuk seperti biru dan hijau akan membuat ruangan terasa tenang dan menciptakan suasana santai dan mengantuk. Untuk itu warna sejuk cocok digunakan untuk kamar tidur.</p>\r\n<p>Warna&ndash;warna hangat seperti merah, kuning, orange, dan coklat dapat membuat tubuh bergairah. Warna seperti ini cocok untuk tempat kerja.<br />Kelompok warna pastel seperti biru muda, pink, dan hijau muda memberikan kesan hangat namun lembut sehinga menimbulkan suasana yang nyaman dan menyenangkan.</p>\r\n<p>Menggunakan warna monokromatik akan menciptakan keserasian misalnya perpaduan cokelat tua dan cokelat muda. Sayangnya menggunakan satu warna monokromatik saja dapat menimbulkan kesan yang monoton, untuk itu perlu dipadukan dengan beberapa warna kontras.</p>\r\n<p>Jika ingin menggunakan dua warna (two tones) pada dinding yang berhubungan lakukan pergantian warna pada sudut dalam pertemuan antara dinding agar garis batas kedua cat lebih tegas dan rapi.</p>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Pemilihan warna sesuai keinginanmu?</strong></p>\r\n<h5>A</h5>\r\n<p>Tahukah anda bahwa warna juga memiliki kepribadian dan dapat mempengaruhi perasaan manusia antara lain :</p>\r\n<p>Biru : Warna yang menyejukkan dan menyenangkan.<br /> Merah : Warna penggugah semangat dan memberikan pengaruh kuat.<br /> Hijau : Menghadirkan keseimbangan dan perasaan yakin.<br /> Kuning : Warna emosional yang menggerakkan energi dan menimbulkan keceriaan.</p>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Hal&ndash;hal yang perlu diperhatikan untuk pengecatan tembok baru?</strong></p>\r\n<h5>A</h5>\r\n<ul>\r\n<li>Tentukan pilihan cat tembok yang berkualitas.</li>\r\n<li>Gunakan peralatan pengecatan yang baik dan berkualitas.</li>\r\n<li>Lakukan pengecatan pada kondisi cuaca yang baik.</li>\r\n<li>Lakukan persiapan permukaan tembok yang akan dicat dengan benar yaitu: masa pengeringan acian baru minimal 1 bulan, kelembaban tembok 18&ndash;20% skala protimeter, dan pH tembok skala 7&ndash;8.</li>\r\n<li>Setelah semua dilakukan pastikan tembok sudah bersih dan bagian&ndash;bagian yang rusak sudah diperbaiki.</li>\r\n<li>Lakukan pengecatan (gunakan wall sealer untuk hasil yang maksimal).</li>\r\n</ul>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Membuang sisa cat yang benar?</strong></p>\r\n<h5>A</h5>\r\n<p>Lakukanlah pembuangan sisa dengan melakukan pengecatan pada bidang lain karena kita harus bertanggung jawab terhadap lingkungan dengan menghindarkan membuang limbah/ sisa cat ke dalam saluran pembuangan. Misalnya tidak ada bidang lain yang akan dicat biarkan sisa cat mengering di wadahnya sebelum dibuang ke tempat sampah.</p>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Cara pemilihan dan perawatan roll/ kuas setelah pengecatan?</strong></p>\r\n<h5>A</h5>\r\n<p><strong>Pemilihan Roller dan Kuas</strong></p>\r\n<p>Hal yang harus diperhatikan adalah:</p>\r\n<ol>\r\n<li>Kualitas dari roll maupun kuas yang digunakan.</li>\r\n<li>Tekstur yang diinginkan (karena ada kuas dan roll yang bertekstur).</li>\r\n<li>Luas bidang yang akan di cat.</li>\r\n</ol>\r\n<p><strong>Perawatan Roller dan Kuas</strong></p>\r\n<p>Roller :<br />Setelah selesai pengecatan tiriskan cat dengan menggosokkan pada kertas koran, setelah tiris rendam dan bersihkan dengan air diamkan 10&ndash;15 menit kemudian. Cuci roller dengan menggunakan air sabun untuk menghilangkan sisa dari cat, keringkan dan simpan di tempat yang kering.</p>\r\n<p>Kuas :<br />Setelah selesai aplikasi pengecatan berbahan dasar air cuci kuas dengan air sampai bersih dan keringkan. Setelah kering balut bulu kuas dengan kertas koran untuk menjaga bulunya tetap lurus. Untuk aplikasi cat berbahan dasar thinner bersihkan kuas dengan thinner sampai bersih dan keringkan. Setelah kering balut buku kuas dengan kertas koran untuk menjaga bulunya tetap lurus.</p>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Cara pengecatan ulang tembok yang tepat dan benar?</strong></p>\r\n<h5>A</h5>\r\n<p>Jika cat tembok lama kita raba masih bagus atau misalnya mengapur tidak cukup parah, cukup amplas dengan amplas tembok dan bersihkan debu hasil amplasan dengan menggunakan lap basah. Kemudian lakukan pengecatan ulang.</p>\r\n<p>Untuk tembok yang sudah mengelupas atau mengapur parah maka cat tembok lama harus dikerok dahulu sampai bersih baru lakukan pengecatan ulang. Untuk hasil yang maksimal aplikasikan wallsealer sebagai lapisan dasarnya.</p>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Cara penyimpanan cat sisa pengecatan?</strong></p>\r\n<h5>A</h5>\r\n<p>Bersihkan terlebih dahulu bibir dan tutup kaleng cat dengan lap dan pastikan cat tidak tercampur dengan air / thinner. Tutup kaleng dan tekan-tekan sehingga kondisinya betul-betul rapat. Setelah itu, nyalakan lilin dan teteskan lelehan lilin di sekeliling tepi tutup kaleng supaya lebih rapat.</p>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Menangkal cat mengelupas?</strong></p>\r\n<h5>A</h5>\r\n<p>Cat kayu :<br />Pengelupasan untuk cat kayu terjadi umumnya pada pengecatan eksterior. Untuk itu pilihlah politur ataupun cat kayu yang memang direkomendasikan untuk luar ruangan.</p>\r\n<p>Cat Tembok :<br />Mencegah pengelupasan pada cat tembok :</p>\r\n<ol style=\"list-style-type: lower-alpha;\">\r\n<li>\r\n<p>Tembok Interior :<br />Sebelum melakukan pengecatan pastikan dinding dalam keadaan bersih dari kontaminan (minyak, debu, dan lain - lain).<br />Pemakaian plamur jangan terlalu tebal, untuk hasil yang maksimal gantikan penggunaan plamur tembok dengan wall sealer karena dapat berfungsi untuk meningkatkan daya rekat cat tembok itu sendiri.</p>\r\n</li>\r\n<li>\r\n<p>Tembok Eksterior :<br />Sebelum melakukan pengecatan pastikan dinding dalam keadaan bersih dari kontaminan (minyak, debu, dan lain -lain).<br />Jangan menggunakan plamur tembok untuk pengecatan luar ruangan sebaiknya gunakan wall sealer sebagai pelapis dasarnya.<br />Pilihlah cat tembok yang memang direkomendasikan untuk pengecatan luar ruangan.</p>\r\n</li>\r\n</ol><hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Cara menghilangkan jamur pada dinding?</strong></p>\r\n<h5>A</h5>\r\n<p>Bersihkan Jamur dengan menggunakan scrap dan sikat kawat/baja (lakukan penyikatan perlahan jangan sampai merusak acian), kemudian bersihkan dengan air bersih.</p>\r\n<p>Kuaskan larutan kaporit (untuk keamanan pakailah sarung tangan), dengan perbandingan 1 kg kaporit dicampur dengan air 3 sampai 5 liter. Biarkan selama satu jam agar cairan benar-benar bekerja, kemudian bilas dan semprot dengan air bersih.</p>\r\n<p>Setelah dinding kering pastikan jamur sudah benar-benar hilang dari permukaan dinding. Untuk pencegahan beri cairan khusus untuk mematikan jamur seperti fungicidal wash. Dikuaskan pada permukaan dinding dan biarkan selama 1 hari. Kemudian bilas dengan air bersih.</p>\r\n<p>Biarkan dinding sampai benar-benar benar kering, kemudian lakukan pengecatan.</p>\r\n<hr />\r\n<h5 class=\"mt-5\">Q</h5>\r\n<p class=\"lead\"><strong>Urutan proses dalam pengecatan ruangan?</strong></p>\r\n<h5>A</h5>\r\n<p>Agar mengemat waktu dan biaya dalam proses pengecatan ruangan, beberapa hal yang perlu diperhatikan terutama urutan bagian dalam ruangan yang akan di cat, antara lain:</p>\r\n<ul>\r\n<li>Langit-langit</li>\r\n<li>Tembok</li>\r\n<li>Pintu / Jendela</li>\r\n</ul>\r\n<p>Pengecatan tembok harus diselesaikan dahulu jika ingin melapisi dengan Wallpaper.</p>\r\n<p><br /><br /></p>','',NULL,'',NULL,NULL,'{\"0\":\"10\"}','',0),
  (19,'Puri Sentosa Cikarang ','','<p style=\"text-align: justify;\"><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Komplek perumahan Puri Sentosa - Cikarang dilapisi dengan&nbsp;</span><strong><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Premium Belazo Multi Emulsion</span></strong><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">&nbsp;yang memiliki daya lindung tinggi terhadap alkali. Warnanya yang beragam dihasilkan dengan sistem&nbsp;</span><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">T<strong>inting Machine Indaco Colour Innovation</strong></span><strong><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">.</span></strong></p>','proyek5.jpg',NULL,'',NULL,NULL,'{\"0\":\"8\"}','',0),
  (20,'Perumahan Crown Golf','','<p style=\"text-align: justify;\"><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Komplek perumahan Crown Golf Pantai Indah Kapuk diaplikasikan menggunakan&nbsp;</span><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold; color: #505050; font-size: 14px; text-align: justify;\">Premium Belazo Multi Emulsion&nbsp;</span></strong><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">dengan daya tahan lama dan kandungan yang&nbsp;</span><em style=\"box-sizing: border-box; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">non-toxic</em><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">.</span></p>','proyek-6.png',NULL,'',NULL,NULL,'{\"0\":\"8\"}','',0),
  (21,'Pintu Air Pantai Indah Kapuk, Jakarta','','<p><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Pintu Air Pantai Indah Kapuk dilapisi dengan cat premium serbaguna&nbsp;</span><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold; color: #505050; font-size: 14px; text-align: justify;\">Belazo A.G.E</span></strong><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">&nbsp;untuk perlindungan terhadap karat dan air.</span></p>','proyek7.jpg',NULL,'',NULL,NULL,'{\"0\":\"8\"}','',0),
  (22,'Perumahan Metro Residence, Sentul','','<p><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Komplek Perumahan Metro Residence, Sentul dilapisi dengan&nbsp;</span><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold; color: #505050; font-size: 14px; text-align: justify;\">Premium Belazo Multi Emulsion</span></strong><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong>&nbsp;</strong>yang memiliki pilihan warna beragam dari hasil sistem&nbsp;</span><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold; color: #505050; font-size: 14px; text-align: justify;\">Tinting Machine Indaco Colour Innovation</span><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">.</span></strong></p>','proyek8.jpg',NULL,'',NULL,NULL,'{\"0\":\"8\"}','',0),
  (23,'Perumahan Citra Garden, Lampung','','<p><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Komplek Perumahan Citra Garden, Lampung dilindungi oleh cat&nbsp;</span><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold; color: #505050; font-size: 14px; text-align: justify;\">Premium Belazo Multi Emulsion</span></strong><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">&nbsp;dengan pilihan warna beragam hasil dari sistem&nbsp;</span><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold; color: #505050; font-size: 14px; text-align: justify;\">Tinting Machine Indaco Colour Innovation</span><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">.</span></strong></p>','proyek9.jpg',NULL,'',NULL,NULL,'{\"0\":\"8\"}','',0),
  (24,'Gedung Pemerintah Surakarta','','<p><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Gedung-gedung Pemerintah Daerah Surakarta dilindungi dengan produk-produk kami.&nbsp;</span><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold; color: #505050; font-size: 14px; text-align: justify;\">Envi Latex Wall Paint</span></strong><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong>&nbsp;</strong>yang dilengkapi formula ramah lingkungan,<strong>&nbsp;</strong></span><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold; color: #505050; font-size: 14px; text-align: justify;\">Envi Alkyd Gloss Enamel&nbsp;</span></strong><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">untuk hasil optimal pada medium kayu dan besi, serta&nbsp;</span><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold; color: #505050; font-size: 14px; text-align: justify;\">Belazo Multi Emulsion</span></strong><span style=\"color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">&nbsp;dengan warna-warnya yang beragam.</span></p>','proyek-2.png',NULL,'',NULL,NULL,'{\"0\":\"8\"}','',0),
  (25,'Mengapa Tembok Pecah-Pecah?','','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Tembok pecah-pecah, yang juga bisa disebut dengan&nbsp;<em style=\"box-sizing: border-box;\">alligatoring</em>&nbsp;biasanya berupa pemecahan lapisan di permukaan cat. Hal ini bisa disebabkan oleh beberapa faktor. Seperti pengaplikasian cat yang salah yaitu ketika primernya menggunakan jenis yang lebih fleksibel kemudian ditumpuk dengan cat alkyd, sehingga ada ketidakcocokan komposisi yang tercampur. Selain itu, bisa juga karena ketika mengaplikasikan cat akhir dalam kondisi cat primer belum kering sempurna. Sehingga mengakibatkan permukaan lembab.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Bagaimana mengatasi tembok pecah-pecah?</span></strong></p>\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">\r\n<li style=\"box-sizing: border-box;\">Kerok permukaan tembok yang sudah pecah-pecah.</li>\r\n<li style=\"box-sizing: border-box;\">Kemudian ampelas permukaan temboknya hingga halus.</li>\r\n<li style=\"box-sizing: border-box;\">Terakhir lapisi ulang dengan cat&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Envi Alkali Sealer</span>, lalu kemudian&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Envi Latex Wall Paint</span>.</li>\r\n</ol>','carakami-2.png',NULL,'',NULL,NULL,'{\"0\":\"1\"}','',0),
  (26,'Tunjukkan Keunikan Keluarga Anda dengan Warna','Aji Baskoro','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Keluarga adalah unit terkecil dalam masyarakat yang terdiri dari seorang kepala keluarga dan beberapa orang yang tinggal di bawah satu atap dalam keadaan saling bergantung satu sama lain. Meski merupakan unit terkecil, keluarga memiliki peran yang penting dan esensial di dalam masyarakat. Pasalnya, keluarga menentukan baik buruk sebuah masyarakat.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Kumpulan keluarga yang harmonis akan membentuk masyarakat yang kokoh. Sebaliknya, kumpulan keluarga yang kurang harmonis akan membentuk masyarakat yang kurang kokoh pula. Meski sekilas tampak sama, setiap keluarga pada dasarnya memiliki keunikannya masing-masing. Keunikan itu bisa dipengaruhi oleh hal-hal yang sifatnya mendasar, seperti latar belakang kebangsaan dan kebudayaan, bisa juga dipengaruhi oleh preferensi terhadap suatu hal, misalnya kesukaan terhadap kegiatan, musik, atau olahraga tertentu.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Psikolog asal Amerika Serikat, Stephanie Smith, dalam sebuah tulisan berjudul &ldquo;<em style=\"box-sizing: border-box;\">What Makes Your Family Unique</em>&rdquo; memaparkan bahwa keunikan merupakan hal penting bagi setiap keluarga. Pasalnya, keunikan itulah yang menjadikan sebuah keluarga spesial, setidaknya di mata para anggotanya. Keunikan pada perkembangannya juga menumbuhkan rasa kekompakan yang mampu mempererat hubungan antar anggotanya. Itulah mengapa setiap keluarga mesti mengenali dan menunjukkan setiap keunikan yang mereka miliki.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Cara menunjukkan keunikan keluarga bisa beragam. Salah satunya dengan merancang warna hunian yang sesuai dengan keunikan keluarga yang ingin Anda tunjukkan. Misalnya, jika Anda sekeluarga suka olahraga sepakbola, Anda bisa mencoba mengecat interior atau eksterior rumah dengan warna yang identik dengan warna klub sepakbola favorit Anda sekeluarga. Contoh lain, jika Anda sekeluarga menyukai kegiatan petualangan luar ruangan, Anda bisa mengecat interior atau eksterior rumah Anda dengan warna-warna alami yang akan mengingatkan Anda sekeluarga pada suasana hutan atau bumi perkemahan. Selain itu, jika keluarga Anda berjiwa seni atau butuh sentuhan seni di rumah, Anda bisa melakukan kombinasi warna yang artistik dengan dekorasi yang elegan.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Untuk memenuhi kebutuhan tersebut, Anda membutuhkan produk cat yang tidak hanya menawarkan banyak pilihan warna tetapi juga aman dan nyaman untuk keluarga. Untuk interior rumah Anda,&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Maxima</span></strong>&nbsp;dari&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">PT. Indaco Warna Dunia</span></strong>&nbsp;layak menjadi pilihan Anda. Selain tersedia dalam ratusan pilihan warna,&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Maxima</span></strong>&nbsp;juga aman dan nyaman digunakan bagi seluruh anggota keluarga, karena berbahan dasar air serta tidak mengandung timbal dan raksa, sehingga tidak berbau menyengat.&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo</span>&nbsp;</strong>juga selalu memberikan inspirasi warna yang modern, elegan dan artistik pada katalog produknya.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Sementara untuk eksterior, Anda bisa menggunakan&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Climagard</span>.</strong> Dilengkapi dengan teknologi&nbsp;<em style=\"box-sizing: border-box;\">Color Shield</em>&nbsp;dan&nbsp;<em style=\"box-sizing: border-box;\">Dirt Shield</em>, produk&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">PT. Indaco Warna Dunia</span></strong>&nbsp;ini mampu melindungi dinding eksterior rumah Anda dari debu, kotoran hingga cuaca ekstrem hingga tujuh tahun, sehingga warna yang Anda pilih sebagai ekspresi keunikan keluarga Anda tidan mudah luntur dan pudar.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Mari pilih warna cat rumah yang sesuai dengan keunikan keluarga Anda.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo, Live Your Style.</span></strong></p>','carakami-eksterior4.jpg',NULL,'',NULL,NULL,'{\"0\":\"1\"}','www.bernas.id',0),
  (29,'Tips Ciptakan Ruang Tamu yang Indah dan Nyaman','Aji Baskoro','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Rumah yang ideal adalah rumah yang tidak hanya nyaman bagi penghuninya, tetapi juga nyaman bagi tamu yang berkunjung. Pasalnya, dalam hidup bermasyarakat kita tidak bisa menghindar dari interaksi dengan orang lain, salah satunya kunjungan tamu ke rumah kita. Oleh sebab itu, menjadikan rumah nyaman tidak hanya bagi penghuni tetapi juga bagi tamu adalah hal yang penting dilakukan.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Lisa Crapetto, penulis asal Amerika Serikat yang banyak memproduksi tulisan bertema gaya hidup, dalam sebuah artikel berjudul&nbsp;<em style=\"box-sizing: border-box;\">&ldquo;3 Simple Ways to Make Guests Feel Welcome in Your Home&rdquo;</em>&nbsp;yang diterbitkan di Huffington Post mengungkapkan bahwa cara terbaik membuat tamu nyaman saat sedang berada di rumah Anda adalah dengan memberikan sambutan berupa sikap hangat dan ramah. Namun, selain itu ada juga hal lain yang mendukung yaitu interior rumah yang nyaman, khususnya ruang tamu. Berikut adalah beberapa hal yang sebaiknya Anda perhatikan supaya ruang tamu di rumah Anda terasa nyaman.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Jangan Terlalu Banyak Memasang Foto di Ruang Tamu</span></strong></p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Memasang foto pada dinding rumah pada dasarnya adalah hal yang baik. Pasalnya, selain bisa berfungsi sebagai penanda memori, foto juga bisa berfungsi sebagai hiasan yang membuat rumah Anda lebih berkarakter. Namun khusus untuk ruang tamu, Anda sebaiknya tidak terlalu banyak memasang foto. Terlalu banyak foto di dinding ruang tamu akan membuat ruang tamu terlihat sesak sehingga tamu menjadi tidak betah berlama-lama di sana.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Gunakan Aksen Sesuai Konsep</span></strong></p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Untuk menciptakan sebuah ruang tamu yang nyaman, Anda sebaiknya juga memikirkan konsep apa yang ingin Anda tonjolkan di situ. Pasalnya, ruang tamu tidak hanya sekadar ruang tetapi juga perwajahan bagi rumah Anda. Untuk itu, Anda sebaiknya memilih konsep yang sesuai dengan konsep rumah Anda. Jika Anda sudah menentukan konsep yang ingin Anda tunjukkan pada ruang tamu Anda, selanjutnya, Anda bisa memilih aksen-aksen yang sesuai dengan konsep tersebut. Jika ruang tamu Anda berkonsep modern, maka pilihlah aksen-aksen minimalis ketimbang aksen-aksen rumit. Kesesuaian konsep ruang tamu dan aksen yang Anda pilih, akan membuat suasana ruang tamu Anda selaras, sehingga nyaman bagi tamu yang datang.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Gunakan Bantal Sofa Secukupnya</span></strong></p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Bantal pada sofa pada dasarnya dirancang untuk menambah kenyamanan siapa saja yang duduk di atasnya. Selain itu, bantal juga bisa menambah keindahan sofa. Apalagi jika menggunakan sarung bantal yang berwarna selaras dengan warna interior ruang tamu. Kendati demikian, Anda sebaiknya tidak terlalu banyak memasang bantal pada sofa ruang tamu. Pasalnya, bantal sofa yang terlalu banyak justru membuat sofa menjadi tidak nyaman untuk diduduki karena ruang duduknya yang menjadi sempit. Dengan sofa yang tidak nyaman, ruang tamu Anda pun otomatis menjadi tidak nyaman.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Perhatikan Ukuran Furniture</span></strong></p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Perhatikan selalu ukuran furnitur yang Anda tempatkan di ruang tamu. Jika ruang tamu Anda berukuran luas, jangan menggunakan furnitur berukuran kecil karena hal itu akan membuat ruang tamu Anda terlihat kosong. Sebaliknya, jika ruang tamu Anda berukuran sempit, jangan pula memaksa menggunakan furnitur berukuran besar, karena hal itu akan membuat ruang tamu Anda menjadi sesak sehingga tamu yang datang ke rumah Anda tidak leluasa bergerak.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Pilih Warna yang Tepat</span></strong></p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Cara terakhir yang bisa Anda lakukan untuk membuat ruang tamu Anda nyaman adalah dengan mengaplikasi cat dinding dengan warna yang tepat. Pilihlah warna-warna bernuansa hangat dan kalem seperti kuning muda, oranye muda, krem, merah muda dan lain-lain. Pasalnya, warna hangat akan menciptakan suasana akrab yang membuat Anda dan tamu Anda betah berlama-lama berbincang di sana.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Dalam hal ini&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Maxima</span>&nbsp;layak menjadi pilihan Anda. Pasalnya, selain tersedia dalam berbagai pilihan warna yang bernuansa&nbsp;<em style=\"box-sizing: border-box;\">simple</em>&nbsp;dan&nbsp;<em style=\"box-sizing: border-box;\">stylish</em>, produk PT Indaco Warna Dunia yang satu ini juga tidak mengandung timbal dan raksa sehingga aman dan tidak berbau menyengat. Selain itu, Belazo Maxima juga dilengkapi dengan teknologi&nbsp;<em style=\"box-sizing: border-box;\">color shield</em>&nbsp;yang membuat warna dinding ruang tamu Anda lebih tahan lama.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Mari ciptakan ruang tamu yang nyaman, tidak hanya bagi Anda dan keluarga tetapi juga bagi siapapun yang berkunjung ke rumah Anda.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo, Live Your Style.</span></strong></p>','carakami-interior2.jpg',NULL,'',NULL,NULL,'{\"0\":\"2\"}','www.bernas.id',0),
  (30,'Mencegah Staining','','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><em style=\"box-sizing: border-box;\">Staining</em>&nbsp;merupakan noda yang muncul pada dinding dan biasanya terjadi pada pengaplikasian cat tembok untuk kayu bergetah atau karena kotoran kayu yang tersangkut saat tembok akan diplamir, kemudian getah yang keluar dari kayu terjebak dalam lapisan cat sehingga menimbulkan noda atau bercak berwarna kecokelatan.&nbsp;<em style=\"box-sizing: border-box;\">Staining</em>&nbsp;tentunya dapat mengganggu keindahan dinding rumah Anda, dan tidak menolak kemungkinan berimbas juga ke kenyamanan.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Bagaimana mencegah&nbsp;<em style=\"box-sizing: border-box;\">staining?</em></span></strong></p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Pilih jenis kayu yang tidak bergetah untuk dicat. Terutama ketika cat yang akan digunakan berwarna putih.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Bagaimana memperbaikinya?</span></strong></p>\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">\r\n<li style=\"box-sizing: border-box;\">Amplas dan bersihkan bagian yang bernoda untuk memudahkan getah keluar.</li>\r\n<li style=\"box-sizing: border-box;\">Tunggu beberapa saat sampai getah keluar tuntas.</li>\r\n<li style=\"box-sizing: border-box;\">Aplikaskan cat lagi ke permukaan setelah bersih dari getah dan noda.</li>\r\n</ol>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Untuk rekomendasi cat yang akan diaplikasikan lagi demi mencapai hasil optimal dan terhindar dari noda, Anda bisa menggunakan&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Woodstain</span></strong>&nbsp;atau&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Woodfiller.</span></strong></p>','carakami-interior-3.jpg',NULL,'',NULL,NULL,'{\"0\":\"2\"}','',0),
  (31,'Maksimalkan Fungsi Ruangan Rumah dengan Warna','','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Setiap ruangan di dalam rumah memiliki fungsinya masing-masing. Ruang tamu untuk menerima tamu, ruang keluarga untuk bersantai dan berkumpul bersama anggota keluarga, ruang makan untuk tempat makan dan kamar tidur untuk aktivitas pribadi dan beristirahat. Seorang pemilik rumah yang baik tidak hanya perlu memastikan bahwa ruang-ruang tersebut berfungsi maksimal sesuai dengan peruntukannya, tetapi juga bisa mengkreasikan warna cat dinding yang mampu memaksimalkan fungsi ruang-ruang tersebut sesuai peruntukannya.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Arsitek asal Amerika Serikat Eve Ashcraft dalam bukunya berjudul&nbsp;<em style=\"box-sizing: border-box;\">&ldquo;The Right Color: Finding The Perfect Pallette for Every Room in Your Home&rdquo;</em>&nbsp;menjelaskan bahwa ada banyak cara bagi seseorang untuk memilih ragam warna dalam rumahnya. Beberapa hal, mulai dari pemandangan alam, benda-benda, lukisan hingga aktivitas kesukaan bisa menjadi inspirasi. Selain itu, pemilik rumah juga perlu mempertimbangkan kesesuaian warna-warna yang dipilih dengan fungsi ruangan. Pasalnya, pilihan warna yang tepat terbukti mampu memaksimalkan fungsi ruang-ruang di rumah. Berikut beberapa referensi aplikasi warna yang bisa menjadi rujukan Anda.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Untuk ruang tamu, Anda pada dasarnya bisa mengaplikasikan berbagai warna. Namun, ada satu hal yang perlu diingat yaitu fungsi ruang tamu sebagai tempat menerima tamu, sehingga Anda sebaiknya memilih warna yang merepresentasikan konsep rumah Anda. Jika rumah Anda berkonsep alami, Anda bisa memilih warna-warna alami pula, seperti biru muda atau hijau muda. Jika rumah Anda berkonsep modern, Anda bisa memilih warna-warna yang lebih berani seperti kuning atau merah. Warna krem juga layak menjadi pilihan jika Anda ingin menonjolkan kelembutan.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Kemudian untuk ruang keluarga, Anda bisa menghadirkan kesan hangat dengan mengaplikasikan warna-warna cerah yang tidak terlalu mencolok, misalnya merah muda, kuning muda atau biru muda. Hal ini sesuai dengan fungsi ruang keluarga, yaitu sebagai tempat berkumpul dan bercengkerama anggota keluarga. Hindarilah warna yang terlalu cerah, karena akan melelahkan mata, sehingga para anggota keluarga menjadi tidak betah berlama-lama di sana. Hindari juga warna-warna yang terlalu lembut yang memberi kesan dingin, hingga membuat anggota keluarga mudah mengantuk.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Sementara untuk ruang makan, Anda bisa menghadirkan kesan ramah dengan mengaplikasikan warna-warna cerah. Warna-warna seperti hijau, oranye atau kuning dapat menghadirkan semangat yang membuat suasana makan bersama keluarga Anda menjadi menyenangkan. Selain itu, warna-warna cerah juga mampu menambah selera makan.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Terakhir, untuk kamar tidur. Meskipun peruntukan utama kamar tidur adalah sebagai tempat beristirahat, tetapi kamar tidur acapkali juga menjadi tempat untuk belajar dan beraktivitas, terutama bagi anak-anak pada usia sekolah. Untuk itu, Anda sebaiknya tidak serta merta memilih warna cat yang amat lembut dengan asumsi bahwa warna cat tersebut akan meningkatkan kualitas istirahat. Namun, pilihlah warna cat yang juga mendukung aktivitas lain di sana. Terlebih, jika kamar tidur tersebut diperuntukkan bagi anak di bawah usia lima tahun yang sedang gemar-gemarnya menggambar di dinding, Anda juga patut mempertimbangkan cat yang mudah dibersihkan.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Untuk memenuhi kebutuhan tersebut, Anda perlu produk cat yang tidak hanya menyediakan berbagai pilihan warna tetapi juga aman untuk seluruh anggota keluarga. Untuk aplikasi pada ruang tamu, ruang keluarga dan ruang makan,&nbsp;<span style=\"box-sizing: border-box; font-family: Muli-Bold;\"><strong>Belazo Maxima</strong>&nbsp;</span>layak menjadi pilihan Anda.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Selain tersedia dalam berbagai pilihan warna dan memiliki daya sebar yang luas,&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Maxima</span>&nbsp;</strong>juga tidak mengandung raksa dan timbal sehingga tidak berbau menyengat. Khusus untuk kamar anak,&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Kidzdream</span></strong>&nbsp;layak menjadi pilihan. Produk dari&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">PT. Indaco Warna Dunia</span></strong>&nbsp;ini dilengkapi dengan teknologi anti grafiti yang mencegah noda meresap ke dalam lapisan cat sehingga mudah dibersihkan. Dengan&nbsp;<strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo Kidzdream</span></strong>, Anda tidak perlu khawatir lagi dengan kebiasaan anak Anda menggambar di dinding.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\">Mari pastikan warna ruangan di rumah kita mampu memaksimalkan fungsinya.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #505050; font-family: Muli-Regular; font-size: 14px; text-align: justify;\"><strong><span style=\"box-sizing: border-box; font-family: Muli-Bold;\">Belazo, Live Your Style.</span></strong></p>','carakami-interior4.jpg',NULL,'',NULL,NULL,'{\"0\":\"2\"}','www.bernas.id',0),
  (32,'ENVI CAT GENTENG','','','carakami-tutorial2.jpg',NULL,'https://www.youtube.com/embed/G3oDR04DJX0',NULL,NULL,'{\"0\":\"3\"}','',0),
  (34,'ENVI CAT TEMBOK','','','carakami-tutorial3.jpg',NULL,'https://www.youtube.com/embed/jqc6OWh9ABw',NULL,NULL,'{\"0\":\"3\"}','',0),
  (35,'CAT DINDING EKSTERIOR BELAZO CLIMAGARD','','','carakami-tutorial4.jpg',NULL,'https://www.youtube.com/embed/ktEY-sf8Sm0',NULL,NULL,'{\"0\":\"3\"}','',0),
  (36,'TVC Indaco','','','tvc-video-poster-2.png',NULL,'https://www.youtube.com/embed/6a-3jutITPE',NULL,NULL,'{\"0\":\"6\"}','',0);
COMMIT;

#
# Data for the `in_product_color` table  (LIMIT 0,500)
#

INSERT INTO `in_product_color` (`id`, `product_id`, `name`, `code`, `image`) VALUES 
  (1,2,'Souffle','50001','50001-souffle.png'),
  (2,2,'Sunblame','50002','50002-sunblame.png'),
  (3,3,'Mermaid Green','48021','48021-mermaid-green1.png'),
  (4,3,'Autumn Green','48055','48055-autumn-green.png'),
  (5,2,'Brillian White','50000','50000-brilliant-white.png'),
  (6,2,'Gilvus','50003','50003-gilvus.png'),
  (7,2,'equator belazo','50004','equator.PNG'),
  (8,2,'Cream Belazo','50005','Cream.PNG'),
  (9,2,'Paper Blaze Belazo','50006','Paper_Blaze1.PNG'),
  (10,2,'Lemoneto Belazo','50007','Lemoneto.PNG'),
  (11,2,'Pasta Vibrant Belazo','50008','pasta_vibrant1.PNG'),
  (12,2,'Magic Green Belazo','50009','magic_green1.PNG'),
  (13,2,'Limon Belazo','50010','limon_belazo1.PNG'),
  (14,2,'Pippin Belazo','50011','50011-pippin.png'),
  (15,2,'Vasper Belazo','50012','50012-vasper.png'),
  (16,2,'Green Flash Belazo','50013','50013-green-flash.png'),
  (17,2,'balze Green Belazo','50014','50014-blaze-green.png'),
  (18,2,'Luminary Belazo','50015','50015-luminary.png'),
  (19,2,'Misty Green Belazo','50016','50016-misty-green.png'),
  (20,2,'Cozy Belazo','50017','50017-cozy.png'),
  (21,2,'Jamaican Sea Belazo','50018','50018-jamaican-sea.png'),
  (22,2,'Viridis Belazo','50019','50019-viridis.png'),
  (23,2,'Flora Belazo','50020','50020-flora.png'),
  (24,2,'Aquamarine Belazo','50021','50021-aquamarine.png'),
  (25,2,'Pitch Pine Belazo','50022','50022-pitch-pine.png'),
  (26,2,'Tosca Cyan Belazo','50023','50023-tosca-cyan.png'),
  (27,2,'Cool Mint Belazo','50024','50024-cool-mint.png'),
  (28,2,'Delphy Belazo','50025','50025-delphy.png'),
  (29,2,'Calm River Belazo','50026','50026-calm-river.png'),
  (30,2,'Armenian Blue Belazo','50027','50027-armenian-blue.png'),
  (31,2,'Shuttle Blue Belazo','50028','50028-shuttle-blue.png'),
  (32,2,'Royal Fair Belazo','50029','50029-royal-fair.png'),
  (33,2,'Fresh Pink Belazo','50030','50030-fresh-pink.png'),
  (34,2,'Bubble Gum Belazo','50031','50031-bubble-gum.png'),
  (35,2,'Sweet Bubble Belazo','50032','50032-sweet-bubble.png'),
  (36,2,'Candy Pink Belazo','50033','50033-candy-pink.png'),
  (37,2,'Livid Pink Belazo','50034','50034-livid-pink.png'),
  (38,2,'Rose White Belazo','50035','50035-rose-white.png'),
  (39,2,'Lavenda Belazo','50036','50036-lavenda.png'),
  (40,2,'Plum Belazo','50037','50037-plum.png'),
  (41,2,'Vain Purple Belazo','50038','50038-vain-purple.png'),
  (42,2,'Blossom Orchid Belazo ','50039','50039-blossom-orchid.png'),
  (43,2,'Tuscan Glow Belazo','50040','50040-tuscan-glow.png'),
  (44,2,'Sangria Belazo','50041','50041-sangria.png'),
  (45,2,'Magenta Belazo','50042','50042-magenta.png'),
  (46,2,'Tamale Red Belazo','50043','50043-tamale-red.png'),
  (47,2,'Red Square Belazo','50044','50044-red-square.png'),
  (48,2,'Cosmic Belazo ','50045','50045-cosmic.png'),
  (49,2,'Caramel Belazo','50046','50046-caramel.png'),
  (50,2,'Tawny Lion Belazo','50047','50047-tawny-lion.png'),
  (51,2,'Mandarin Belazo','50048','50048-mandarin.png'),
  (52,2,'Flamboyant Belazo','50049','50049-flamboyant.png'),
  (53,2,'Goldby Belazo','50050','50050-goldby.png'),
  (54,2,'Ecru Olive Belazo','50051','50051-ecru-olive.png'),
  (55,2,'Burnished Green Belazo','50052','50052-burnished-green.png'),
  (56,2,'Mocca Belazo','50053','50053-mocca.png'),
  (57,2,'Coffe Belazo','50054','50054-coffe.png'),
  (58,2,'Slide Grey Belazo','50055','50055-slide-grey.png'),
  (59,2,'Splash Vanilla Belazo','50056','50056-splash-vanilla.png'),
  (60,2,'Silver Blitz Belazo','50057','50057-sliver-blitz.png'),
  (61,2,'Atlantis Sky Belazo','50058','50058-atlantis-sky.png'),
  (62,2,'Great Stone Belazo','50059','50059-great-stone.png'),
  (63,3,'Briliant White Belazo','4800','48000-brilliant-white.png'),
  (64,3,'Kashmir Green Belazo','48017','48017-kashmir-green.png'),
  (65,3,'Golden Olive Belazo','48078','48078-golden-olive.png'),
  (66,3,'New Moon Belazo','48022','48022-new-moon.png'),
  (67,3,'Atmosfir Belazo','48056','48056-atmosfir.png'),
  (68,3,'Vanesia Green Belazo','48020','48020-vanesia-green.png'),
  (69,3,'Spring Green Belazo','48018','48018-spring-green.png'),
  (70,3,'Asparagus Belazo','48079','48079-asparagus.png'),
  (71,3,'Lemon Fizz Belazo','48016','48016-lemon-fizz.png'),
  (72,3,'Lemonade Belazo','48047','48047-lemonade.png'),
  (73,3,'Summer Sum Belazo','48015','48015-summer-sun.png'),
  (74,3,'Submarine Belazo','48067','48067-submarine.png'),
  (75,3,'Gold Spark Belazo','48068','48068-gold-spark.png'),
  (76,3,'Golde Ocre Belazo','48007','48007-golden-ocre.png'),
  (77,3,'Everbright Belazo','48050','48050-everbright.png'),
  (78,3,'Academia','48051','48051-academia.png'),
  (79,3,'Lime Yellow Belazo ','48046','48046-lime-yellow.png'),
  (80,3,'Prety Ivory Belazo','48008','48008-pretty-ivory.png'),
  (81,3,'Torisca','48053','48053-torisca.png'),
  (82,3,'Florida Gold Belazo','48011','48011-florida-gold.png'),
  (83,3,'Istanbul Dawn Belazo','48010','48010-istanbul-dawn.png'),
  (84,3,'Taj Mahal Belazo','48054','48054-taj-mahal.png'),
  (85,3,'Aragon Belazo','48076','48076-aragon.png'),
  (86,3,'Summer Heat Belazo','48038','48038-summer-heat.png'),
  (87,3,'Mahogani Belazo','48035','48035-mahogani.png'),
  (88,3,'Lambada Belazo','48066','48066-lambada.png'),
  (89,3,'Beleza Belazo','48057','48057-beleza.png'),
  (90,3,'Vanilla Cream Belazo','48023','48023-vanilla-cream.png'),
  (91,3,'First Forst Belazo','48030','48030-first-frost.png'),
  (92,3,'Antartika Belazo','48042','48042-antartika.png'),
  (93,3,'Silvero Belazo','48041','48041-silvero.png'),
  (94,3,'Sentripeta Belazo','48044','48044-sentripeta.png'),
  (95,3,'Garden Pool Belazo','48029','48029-garden-pool.png'),
  (96,3,'Solitary Belazo','48043','48043-solitary.png'),
  (97,3,'Fiesta Belazo','48040','48040-fiesta.png'),
  (98,3,'Borobudur Belazo','48039','48039-borobudur.png'),
  (99,3,'Flag Stone Belazo','48034','48034-flag-stone.png'),
  (100,3,'Sahara Belazo','48033','48033-sahara.png'),
  (101,3,'Almond Colorado Belazo','48077','48077-almond-colorado.png'),
  (102,3,'Coral Serenade Belazo','48082','48082-coral-serenade.png'),
  (103,3,'Sun Cappucino Belazo','48009','48009-sun-cappuccino.png'),
  (104,3,'Country Blue Belazo','48027','48027-country-blue.png'),
  (105,3,'Sky Blue Belazo','480','480-sky-blue.png'),
  (106,3,'Musking Blue Belazo','480','480-musking-blue.png'),
  (107,3,'Bue Beauty Belazo','480','480-blue-beauty.png'),
  (108,3,'Prime White Belazo','48027','48027-prime-white.png'),
  (109,3,'Violita Belazo','48026','48026-violita.png'),
  (110,3,'Purple Glow Belazo','48026','48026-purple-glow.png'),
  (111,3,'Dardanela Belazo','48064','48064-dardanela.png'),
  (112,3,'Minorca Belazo','48061','48061-minorca.png'),
  (113,3,'Rose De Paris Belazo','48006','48006-rose-de-paris.png'),
  (114,3,'Mademoiselle Belazo','48083','48083-mademoiselle.png'),
  (115,3,'Paris Pink Belazo','48002','48002-paris-pink.png'),
  (116,3,'Victorian Pop Belazo','48070','48070-victorian-pop.png'),
  (117,3,'Ghotic Purple Belazo','48071','48071-gothic-purple.png'),
  (118,3,'Larita Belazo','48065','48065-larita.png'),
  (119,3,'Egyptian Buff Belazo','48012','48012-egyptian-buff.png'),
  (120,3,'Pretty Cupid Belazo','48073','48073-pretty-cupid.png'),
  (121,3,'Red Glow Belazo','48080','48080-red-glow.png'),
  (122,3,'Geranium Belazo','48001','48001-geranium.png'),
  (123,3,'Black Belazo','48100','48100-black.png'),
  (124,3,'Cinamon Sugar Belazo','48081','48081-cinnamon-sugar.png'),
  (125,3,'Olympic Bue Belazo','48074','48074-olympic-blue.png'),
  (126,3,'Foxy Green Belazo','48075','48075-foxy-green.png'),
  (127,4,'Pearl Silver  Belazo','49033','49033-pearl-silver.png'),
  (128,4,'Pearl Gold Belazo','49031','49031-pearl-gold.png'),
  (129,4,'Pearl Bronze Belazo','49032','49032-pearl-bronze.png'),
  (130,4,'White Belazo','49000','49000-white.png'),
  (131,4,'Black Belazo','49100','49100-black.png'),
  (132,4,'Rose de Paris Belazo','49009','49009-rose-de-paris.png'),
  (133,4,'Galeria Belazo','49012','49012-galeria.png'),
  (134,4,'Misty Green Belazo','49022','49022-misty-green.png'),
  (135,4,'Ice Blue Belazo','49004','49004-ice-blue.png'),
  (136,4,'Stone grey Belazo','49008','49008-stone-grey.png'),
  (137,4,'Valenrine Red Belazo','49017','49017-valentine-red.png'),
  (138,4,'Camomile Belazo','49020','49020-camomile.png'),
  (139,4,'Picnic Green Belazo','49013','49013-picnic-green.png'),
  (140,4,'Cosmos Blue Belazo','49016','49016-cosmos-blue.png'),
  (141,4,'Sahara Belazo','49018','49018-sahara.png'),
  (142,4,'Opera Red Belazo','49001','49001-opera-red.png'),
  (143,4,'Daffodil Flower Belazo','49019','49019-daffodil-flower.png'),
  (144,4,'Signal Green Belazo','49014','49014-signal-green.png'),
  (145,4,'Air Way Blue Belazo','49015','49015-airway-blue.png'),
  (146,4,'Hot Chocolate Belazo','49029','49029-hot-chocolate.png'),
  (147,5,'Comamile Belazo','47012','47012-camomile.png'),
  (148,5,'Crayon Yellow Belazo','47011','47011-crayon-yellow.png'),
  (149,5,'Valle Yellow Belazo','47063','47063-valle-yellow.png'),
  (150,5,'Beach Sand Belazo','47010','47010-beach-sand.png'),
  (151,5,'Savana Belazo','47046','47046-savana.png'),
  (152,5,'Mint Ice Cream Belazo','47022','47022-mint-ice-cream.png'),
  (153,5,'Lettuce Green Belazo','47021','47021-lettuce-green.png'),
  (154,5,'Alpine Green Belazo','47055','47055-alpine-green.png'),
  (155,5,'Queen Neptune Belazo','47056','47056-queen-neptune.png'),
  (156,5,'Green Wich Belazo','47044','47044-green-wich.png'),
  (157,5,'Cool Blue Belazo','47030','47030-cool-blue.png'),
  (158,5,'Light Apple Belazo','47023','47023-light-apple.png'),
  (159,5,'Banana Leaf Belazo','47019','47019-banana-leaf.png'),
  (160,5,'Pale Aqua Belazo','47018','47018-pale-aqua.png'),
  (161,5,'Verdigris Belazo','47017','47017-verdigris.png'),
  (162,5,'Blue Pacific Belazo','47027','47027-blue-pacific.png'),
  (163,5,'Blue Airy Belazo','47026','47026-blue-airy.png'),
  (164,5,'Tropical Blue Belazo','47053','47053-tropical-blue.png'),
  (165,5,'Blue France Belazo','47025','47025-blue-france.png'),
  (166,5,'Arvia Blue Belazo','47054','47054-arvia-blue.png'),
  (167,5,'Baby Pink Belazo','47038','47038-baby-pink.png'),
  (168,5,'Roxy Pink Belazo','47003','47003-roxy-pink.png'),
  (169,5,'Giselda Belazo','47060','47060-giselda.png'),
  (170,5,'Romance Spice Belazo','47061','47061-romance-spice.png'),
  (171,5,'Shalomitha Belazo','47062','47062-shalomitha.png'),
  (172,5,'Dust Mauve Belazo','47037','47037-dust-mauve.png'),
  (173,5,'Vision Purple Belazo','47066','47066-vision-purple.png'),
  (174,5,'Sugar Wine Belazo','47063','47067-sugar-wine.png'),
  (175,5,'Dubarry Belazo','47058','47058-dubarry.png'),
  (176,5,'Coral Grape Belazo','47068','47068-coral-grape.png'),
  (177,5,'Candied Peel Belazo','47007','47007-candied-peel.png'),
  (178,5,'Spanish Orange Belazo','47005','47005-spanish-orange.png'),
  (179,5,'Burnt Orange Belazo','47002','47002-burnt-orange.png'),
  (180,5,'Fanatic Red Belazo','47065','47065-fanatic-red.png'),
  (181,5,'bagasta Belazo','47053','47053-bagasta.png'),
  (182,5,'Viva Grey Belazo','47051','47051-viva-grey.png'),
  (183,5,'Arca Belazo','47050','47050-arca.png'),
  (184,5,'North Sea Belazo','47033','47033-north-sea.png'),
  (185,5,'Black Belazo','47000','47000-black.png'),
  (186,5,'brilliant White Belazo','47000','47000-brilliant-white.png'),
  (187,5,'Vanilla Straw Belazo','47016','47016-vanilla-straw.png'),
  (188,5,'Milenia Belazo','47049','47049-milenia.png'),
  (189,5,'Krisolit Belazo','47048','47048-krisolit.png'),
  (190,5,'Woat Blue Belazo','47028','47028-woat-blue.png'),
  (191,5,'Golden White Belazo','47043','47043-golden-white.png'),
  (192,5,'Bark Cream Belazo','47014','47014-bark-cream.png'),
  (193,5,'Coffe Late Belazo','47035','47035-coffe-late.png'),
  (194,5,'String Oyster Belazo','47034','47034-string-oyster.png'),
  (195,5,'Almond Belazo','47041','47041-almond.png'),
  (196,5,'Aura White Belazo','47043','47043-aura-white.png'),
  (197,5,'New Moon Belazo','47032','47032-new-moon.png'),
  (198,5,'Othello Belazo','47057','47057-othello.png'),
  (199,5,'Virenza Belazo','47040','47040-virenza.png'),
  (200,5,'Granada Belazo','47039','47039-granada.png'),
  (201,5,'Elfeinbein Belazo','47013','47013-elfeinbein.png'),
  (202,5,'Florida Gold Belazo','47009','47009-florida-gold.png'),
  (203,5,'Elshine Belazo','47064','47064-elshine.png'),
  (204,5,'Happy Orange Belazo','47004','47004-happy-orange.png'),
  (205,5,'Volcano Belazo','47059','47059-volcano.png'),
  (206,6,'Colorado Belazo','BR 07','br07-colorado.png'),
  (207,6,'Teak Brown Belazo','BR 08','br08-teak-brown.png'),
  (208,6,'Safari Green Belazo','BR 05','br05-safari-green.png'),
  (209,6,'Stone Grey Belazo','BR 10','br10-stone-grey.png'),
  (210,6,'White Belazo','BR 45','br45-white.png'),
  (211,6,'Amelia Belazo','BR 03','br03-amelia.png'),
  (212,6,'Maroco Belazo','BR 01','br01-maroco.png'),
  (213,6,'Pine Green Belazo','BR 06','br06-pine-green.png'),
  (214,6,'Viva Brown Belazo','BR 11','br11-viva-brown.png'),
  (215,6,'Black Belazo','BR 00','br00-black.png'),
  (216,6,'Senoria Belazo','BR 02','br02-senoria.png'),
  (217,6,'Happy Orage Belazo','BR 04','br04-happy-orange.png'),
  (218,6,'Luxor Belazo','BR 09','br09-luxor.png'),
  (219,7,'Kamper Wood Filler Belazo ','Kamper','woodfiller-kamper.png'),
  (220,7,'Jati Wood Filler Belazo','Jati','woodfiller-jati.png'),
  (221,7,'Sungkai Wood Filler Belazo ','Sungkai','woodfiller-sungkai.png'),
  (222,8,'Deep Ruby Belazo','711','711-deep-ruby.png'),
  (223,8,'Red Earth Belazo','710','710-red-earth.png'),
  (224,8,'Marmalade Belazo','709','709-marmalade.png'),
  (225,8,'Clear Gloss Belazo','705','705-clear-gloss.png'),
  (226,8,'Walnut Belazo','701','701-walnut.png'),
  (227,8,'Saffron Belazo','708','708-saffron.png'),
  (228,8,'Ripe Corn Belazo','707','707-ripe-corn.png'),
  (229,8,'Alisea Belazo','706','706-alisea.png'),
  (230,8,'Pine Green Belazo','713','713-pine-green.png'),
  (231,8,'Fedona Belazo','714','714-fedona.png'),
  (232,8,'Ebony Belazo','716','716-ebony.png'),
  (233,8,'Smart Olive Belazo','715','715-smart-olive.png'),
  (234,8,'Antique Blue Belazo','704','704-antique-black.png'),
  (235,8,'Coffe Bean Belazo','703','703-coffee-bean.png'),
  (236,8,'Mahony Belazo','712','712-mahony.png'),
  (237,8,'Ebony Belazo','702','702-ebony.png'),
  (238,9,'Star White Belazo','51001','51001-star-white.png'),
  (239,9,'Black Galaxy Belazo','51002','51002-black-galaxy.png'),
  (240,9,'Astra Brown Belazo','51003','51003-astra-brown.png'),
  (241,9,'Fan Brown ','51004','51004-tan-brown.png'),
  (242,13,'Brilliant White Envi','845','845-brilliant-white1.png'),
  (243,13,'Pink Envi','827','827-pink.png'),
  (244,13,'Classy Blue Envi','867','867-classy-blue.png'),
  (245,13,'Shapire Blue Envi ','854','854-saphire-blue.png'),
  (246,13,'Blossom White Envi','878','878-blossom-white.png'),
  (247,13,'Rose Vlevet Envi ','828','828-rose-velvet.png'),
  (248,13,'Crystal Blue Envi ','805','805-crystal-blue.png'),
  (249,13,'Light Violet Envi ','803','803-light-violet.png'),
  (250,13,'Rose White Envi ','844','844-rose-white.png'),
  (251,13,'Aluvial Envi ','860','860-aluvial.png'),
  (252,13,'Ocean Blue Envi ','857','857-ocean-blue.png'),
  (253,13,'Light Purple Envi ','869','869-light-purple.png'),
  (254,13,'Peach Envi ','825','825-peach.png'),
  (255,13,'Pinky Envi ','868','868-pinky.png'),
  (256,13,'Elegant Pink Envi ','861','861-elegant-pink.png'),
  (257,13,'Purple Blue Envi ','881','881-purple-gold.png'),
  (258,13,'Tuscan Glory Envi ','826','826-tuscan-glory.png'),
  (259,13,'Orchid Blue Envi ','804','804-orchid-blue.png'),
  (260,13,'Geranium Envi','846','846-geranium.png'),
  (261,13,'Coral Grape Envi','852','852-coral-grape.png'),
  (262,13,'Classic White Envi','877','877-classic-white.png'),
  (263,13,'Primerose Envi','820','820-primerose.png'),
  (264,13,'Canary Yellow Envi','848','848-canary-yellow.png'),
  (265,13,'Sunrise Envi','862','862-sunrise.png'),
  (266,13,'Broken White Envi','843','843-broken-white.png'),
  (267,13,'Barley White Envi','819','819-barley-white.png'),
  (268,13,'Signal Yellow Envi','847','847-signal-yellow.png'),
  (269,13,'Monaco Envi','855','855-monaco.png'),
  (270,13,'Marygold Envi','842','842-marygold.png'),
  (271,13,'Olympic Yellow Envi','821','821-olympic-yellow.png'),
  (272,13,'Honey Wood Envi','822','822-honey-wood.png'),
  (273,13,'Odiva Envi','863','863-odiva.png'),
  (274,13,'Lily White Envi','841','841-lily-white.png'),
  (275,13,'Ivory Envi','818','818-ivory.png'),
  (276,13,'Goby Sand Envi','829','829-goby-sand.png'),
  (277,13,'Brick Red Envi','831','831-brick-red.png'),
  (278,13,'Off White Envi','833','833-off-white.png'),
  (279,13,'Cream Envi','817','817-cream.png'),
  (280,13,'Tropical Orage Envi','830','830-tropical-orange.png'),
  (281,13,'Terracota Envi','832','832-terracota.png'),
  (282,13,'Olivera Envi','872','872-olivera.png'),
  (283,13,'Teal Ice Envi','810','810-teal-ice.png'),
  (284,13,'Misty Green Envi','811','811-misty-green.png'),
  (285,13,'Metro White Envi','801','801-metro-white.png'),
  (286,13,'Oase Envi','876','876-oase.png'),
  (287,13,'Tender Green Envi','875','875-tender-green.png'),
  (288,13,'Lucky Green Envi','812','812-lucky-green.png'),
  (289,13,'Atlantic Blue Envi','806','806-atlantic-blue.png'),
  (290,13,'Lime Green Envi','870','870-lime-green.png'),
  (291,13,'Sheva Green Envi','849','849-sheva-green.png'),
  (292,13,'Aqua Green Envi','813','813-aqua-green.png'),
  (293,13,'Navy Blue Envi','807','807-navy-blue.png'),
  (294,13,'Jade Green Envi','814','814-jade-green.png'),
  (295,13,'Paradise Green Envi','850','850-paradise-green.png'),
  (296,13,'Brilliant Green Envi','815','815-brilliant-green.png'),
  (297,13,'Indigo Envi','856','856-indigo.png'),
  (298,13,'Tarquoise Envi','816','816-turquoise.png'),
  (299,13,'Leaf Green Envi','866','866-leaf-green.png'),
  (300,13,'Envi Green Envi','866','866-envi-green.png'),
  (301,13,'Jazzy Blue Envi','808','808-jazzy-blue.png'),
  (302,13,'Soft Green Envi','809','809-soft-green.png'),
  (303,13,'BWS Envi','865','865-bws.png'),
  (304,13,'Silver Blue Envi','874','874-silver-blue.png'),
  (305,13,'Fontana Envi','873','873-fontana.png'),
  (306,13,'lake Stone Envi','838','838-lake-stone.png'),
  (307,13,'Regata Envi','879','879-regata.png'),
  (308,13,'Primavera Envi','880','880-primavera.png'),
  (309,13,'Silver Grey Envi','837','837-silver-grey.png'),
  (310,13,'Ash Grey Envi','836','836-ash-grey.png'),
  (311,13,'Blue Bell Envi','802','802-blue-bell.png'),
  (312,13,'Sahara Envi','858','858-sahara.png'),
  (313,13,'Saddle Tan ','824','824-saddle-tan.png'),
  (314,13,'Milk Grey Envi','835','835-milk-grey.png'),
  (315,13,'Millenium Envi','839','839-millenium.png'),
  (316,13,'Natura Envi','871','871-natura.png'),
  (317,13,'Coffee Envi','823','823-coffee.png'),
  (318,13,'Alabaster Envi','834','834-alabaster.png'),
  (319,13,'Goose Wing Envi','840','840-goose-wing.png'),
  (320,13,'Black Envi','800','800-black.png'),
  (321,13,'Cocoa Envi','859','859-cocoa.png'),
  (322,14,'White Roof Envi','8R45','8r45-white-roof.png'),
  (323,14,'Mexico Envi','8R02','8r02-mexico.png'),
  (324,14,'Tropic Green Envi','8R01','8r01-tropic-green.png'),
  (325,14,'Solitaire Envi','8R09','8r09-solitare.png'),
  (326,14,'Crimsom Envi','8R08','8r08-crimson.png'),
  (327,14,'Holywood Envi','8R05','8r05-hollywood.png'),
  (328,14,'Amazon Envi','8R07','8r07-amazon.png'),
  (329,14,'Java Brown Envi','8R10','8r10-java-brown.png'),
  (330,14,'Tile Red Envi','8R03','8r03-tile-red.png'),
  (331,14,'Maroon Envi','8R06','8r06-maroon.png'),
  (332,14,'Marina Envi','8R04','8r04-marina.png'),
  (333,14,'Black Roof Envi','8R00','8r00-black-roof.png'),
  (334,15,'Zinc Prosphate Green Envi ','960-113','960-113-zinc-prosphate-green.png'),
  (335,15,'Zin Prosphate Grey Envi','960-155','960-155-zinc-prosphate-grey.png'),
  (336,15,'Zinc Prosphate Dark Grey Envi','960-108','960-108-zinc-prosphate-dark-grey.png'),
  (337,15,'Zinc Coat Grey Envi ','960-106','960-106-zinc-coat-grey.png'),
  (338,15,'Zinc Prosphate Black','960-008','960-008-zinc-prosphate-black.png'),
  (339,16,'Sunshine Envi ','912','912-sunshine.png'),
  (340,16,'Flame Orange Envi ','921','921-flame-orange.png'),
  (341,16,'Candy Pink Envi ','924','924-candy-pink.png'),
  (342,16,'Purple Dawn Envi','942','942-purple-dawn.png'),
  (343,16,'Star Orange Envi ','950','950-star-orange.png'),
  (344,16,'Signal Orange Envi ','922','922-signal-orange.png'),
  (345,16,'Cyclamen Envi','925','925-cyclamen.png'),
  (346,16,'Violet Envi ','926','926-violet.png'),
  (347,16,'Sun Cappucino','935','935-sun-capucino.png'),
  (348,16,'Vermillion Envi ','923','923-vermillion.png'),
  (349,16,'Maroon Envi','917','917-maroon.png'),
  (350,16,' Romantic Purple Envi ','952','952-romantic-purple.png'),
  (351,16,'Beigi Envi ','958','958-beige.png'),
  (352,16,'Febriani Envi ','944','944-febriani.png'),
  (353,16,'Diesel Yellow Envi','933','933-diesel-yellow.png'),
  (354,16,'Canary Yellow Envi','911','911-canary-yellow.png'),
  (355,16,'Edelweis Envi ','957','957-edelweis.png'),
  (356,16,'Calista Envi ','907','907-calista.png'),
  (357,16,'Limone Envi','955','955-limone.png'),
  (358,16,'Golden Yellow Envi ','909','909-golden-yellow.png'),
  (359,16,'Magnolia Envi','910','910-magnolia.png'),
  (360,16,'Butterfly Envi ','951','951-butterfly.png'),
  (361,16,'Lemon Yellow Envi ','908','908-lemon-yellow.png'),
  (362,16,'Vanilla Cream Envi','934','934-vanilla-cream.png'),
  (363,16,'Brilliant White Envi','945','945-brilliant-white.png'),
  (364,16,'Sunny Blue Envi ','947','947-sunny-blue.png'),
  (365,16,'Sky Blue Envi ','937','937-sky-blue.png'),
  (366,16,'Dardanela Envi ','941','941-dardanela.png'),
  (367,16,'Metro White Envi','936','936-metro-white.png'),
  (368,16,'Panasia Envi ','946','946-panasia.png'),
  (369,16,'Marine Blue Envi ','902','902-marine-blue.png'),
  (370,16,'Blue Dalize Envi ','964','964-blue-dalize.png'),
  (371,16,'Ice Blue Envi ','904','904-ice-blue.png'),
  (372,16,'Tropic Blue Envi','901','901-tropic-blue.png'),
  (373,16,'Ocean Blue Envi ','903','903-ocean-blue.png'),
  (374,16,'Dark Blue Envi ','949','949-dark-blue.png'),
  (375,16,'Verona Envi ','953','953-verona.png'),
  (376,16,'Hauch Green Envi ','943','943-hauch-green.png'),
  (377,16,'Hino Green Envi ','939','939-hino-green.png'),
  (378,16,'Paprika Envi ','953','953-paprika.png'),
  (379,16,'Arcadia Envi ','954','954-arcadia.png'),
  (380,16,'Apple Green Envi ','927','927-apple-green.png'),
  (381,16,'Pien Green Envi ','930','930-pine-green.png'),
  (382,16,'Emerald Green Envi ','931','931-emerald-green.png'),
  (383,16,'Cobalt Green Envi ','940','940-cobalt-green.png'),
  (384,16,'Evergreen Envi ','928','928-evergreen.png'),
  (385,16,'Safari Green Envi ','948','948-safari-green.png'),
  (386,16,'Forest Green Envi ','932','932-forest-green.png'),
  (387,16,'Misty Blue Envi ','938','938-misty-blue.png'),
  (388,16,'Aragon Envi ','956','956-aragon.png'),
  (389,16,'Caramel Envi','919','919-caramel.png'),
  (390,16,'Coffee Brown Envi ','915','915-coffee-brown.png'),
  (391,16,'Tern Grey Envi','905','905-tern-grey.png'),
  (392,16,'Nutmeg Envi ','913','913-nutmeg.png'),
  (393,16,'Teak Brown Envi ','920','920-teak-brown.png'),
  (394,16,'Dark Brown Envi ','916','916-dark-brown.png'),
  (395,16,'Static Grey Envi ','906','906-static-grey.png'),
  (396,16,'Chocolate Envi ','914','914-chocolate.png'),
  (397,16,'Mahony Envi ','918','918-mahony.png'),
  (398,16,'Black Envi','900','900-black.png'),
  (399,16,'White Dof Envi','9450','9450-white-dof.png'),
  (400,16,'Black Dof Envi ','9000','9000-black-dof.png'),
  (401,16,'Alumunium Envi','961','961-aluminium.png'),
  (402,16,' Gold Envi ','962','962-gold.png'),
  (403,16,'Bronze Envi','963','963-bronze.png'),
  (404,17,'White Sands Envi ','970-045','970-045-white-sand.png'),
  (405,17,'Coral Red Envi','970-018','970-018-coral-red.png'),
  (406,19,'Transparent Top Seal','61011','61011-transparent.png'),
  (407,19,'Black Top Seal','61010','61010-black.png'),
  (408,19,'White Top Seal','61001','61001-white.png'),
  (409,19,'Sky Blue Top Seal','61004','61004-sky-blue.png'),
  (410,19,'Jovan Blue Top Seal','61014','61014-jovan-blue.png'),
  (411,19,'Eragon Top Seal','61020','61020-eragon.png'),
  (412,19,'Ice Green Top Seal','61002','61002-ice-green.png'),
  (413,19,'Wasabi Top Seal','61018','61018-wasabi.png'),
  (414,19,'Greaan Hornet Top Seal','61019','61019-green-hornet.png'),
  (415,19,'Borneo Top Seal','61009','61009-borneo.png'),
  (416,19,'Cream Top Seal','61012','61012-cream.png'),
  (417,19,'Apollo Top Seal','61003','61003-apollo.png'),
  (418,19,'Bumble Bee Top Seal','61021','61021-bumble-bee.png'),
  (419,19,'Fairy Pink Top Seal','61022','61022-fairy-pink.png'),
  (420,19,'Mango Top Seal','61023','61023-mango.png'),
  (421,19,'orange Top Seal','61015','61015-orange.png'),
  (422,19,'Light Grey Top Seal','61005','61006-light-grey.png'),
  (423,19,'Dark Brown Top Seal','61007','61007-dark-brown.png'),
  (424,19,'Milenium Top Seal','61017','61017-milenium.png'),
  (425,19,'Mocca Top Seal','61016','61016-mocca.png'),
  (426,19,'Light Grey Top Seal','61006','61006-light-grey.png'),
  (427,19,'Dark Yellow Top Seal','61008','61008-dark-grey.png'),
  (428,19,'Geranium Top Seal','61024','61024-geranium.png'),
  (429,19,'Lime Yellow Top Seal','61025','61025-lime-yellow.png'),
  (430,19,'Purple Gold Top Seal','61026','61026-purple-gold.png'),
  (431,20,'White Hot Seal ','62001','62001-white.png'),
  (432,20,'Sugar Wine Hot Seal','62020','62020-sugar-wine.png'),
  (433,20,'Oxy Crown Hot Seal ','62018','62018-oxy-crown.png'),
  (434,20,'Admiral Blue Hot Seal ','62006','62006-admiral-blue.png'),
  (435,20,'Navy Iron Hot Seal ','62010','62010-navy-iron.png'),
  (436,20,'Vert Clair Hot Seal ','62003','62003-vert-clair.png'),
  (437,20,'Word Pine Hot Seal ','62015','62015-wood-pine.png'),
  (438,20,'Carlo Forza Hot Seal ','62007','62007-carlo-vorza.png'),
  (439,20,'Moss Squash Hot Seal ','62011','62011-moss-squash.png'),
  (440,20,'Smoke Drive Hot Seal ','62019','62019-smoke-drive.png'),
  (441,20,'Admiral Blue Hot Seal ','62006','62006-admiral-blue.png'),
  (442,20,'Coral Honey Hot Seal ','62009','62009-coral-honey.png'),
  (443,20,'Gold Sands Hot Seal ','62013','62013-gold-sand.png'),
  (444,20,'Blush Jam hot Seal','62004','62004-blush-jam.png'),
  (445,20,'Blood Scarlet Hot Seal','62017','62017-blood-scarlet.png'),
  (446,20,'Brick Candy Hot Seal ','62008','62008-brick-candy.png'),
  (447,20,'Berry Rose Hot Seal','62016','62016-berry-rose.png'),
  (448,20,'Ruby Garnet Hot Seal ','62012','62012-ruby-garnet.png'),
  (449,20,'Sugar Wine Hot Seal ','62020','62020-sugar-wine.png'),
  (450,20,'Obsidian Hot Seal','62014','62014-obsidian-jet.png'),
  (451,23,'Palet Nusatex','01','palet-nusatex-01.png'),
  (452,23,'Palet Nusatex','02','palet-nusatex-02.png'),
  (453,23,'Palet Nusatex','03','palet-nusatex-03.png'),
  (454,23,'Palet Nusatex','04','palet-nusatex-04.png'),
  (455,23,'Palet Nusatex','05','palet-nusatex-05.png'),
  (456,23,'Palet Nusatex','06','palet-nusatex-06.png'),
  (457,23,'Palet Nusatex','07','palet-nusatex-07.png'),
  (458,23,'Palet Nusatex','08','palet-nusatex-08.png'),
  (459,23,'Palet Nusatex','09','palet-nusatex-09.png'),
  (460,23,'Palet Nusatex','10','palet-nusatex-10.png'),
  (461,23,'Palet Nusatex','11','palet-nusatex-11.png'),
  (462,23,'Palet Nusatex','12','palet-nusatex-12.png'),
  (463,23,'Palet Nusatex','13','palet-nusatex-13.png'),
  (464,23,'Palet Nusatex','14','palet-nusatex-14.png'),
  (465,23,'Palet Nusatex','15','palet-nusatex-15.png'),
  (466,23,'Palet Nusatex','16','palet-nusatex-16.png'),
  (467,23,'Palet Nusatex','17','palet-nusatex-17.png'),
  (468,23,'Palet Nusatex','18','palet-nusatex-18.png'),
  (469,24,'Grey Nusatex','NS05','ns05-grey.png'),
  (470,24,'Green Nusatex','NS06','ns06-green.png'),
  (471,24,'Black Nusatex','NS07','ns07-black.png'),
  (472,25,'Maroon Nusatex','NSPC01G','nspc01g-maroon.png'),
  (473,25,'Dark Green Nusatex','NSPC02G','nspc02g-dark-green.png'),
  (474,25,'Grey Nusatex','NSPC03G','nspc03g-grey.png'),
  (475,25,'Black Nusatex','NSPC04G','nspc04g-black.png'),
  (477,4,'a','2','xs.jpg');
COMMIT;

#
# Data for the `in_product_feature` table  (LIMIT 0,500)
#

INSERT INTO `in_product_feature` (`id`, `ind_name`, `eng_name`, `ind_description`, `eng_description`, `image`) VALUES 
  (1,'Colour Enhancement',NULL,'(Menyempurnakan dan mencerahkan hasil akhir pengecatan)',NULL,'belazo-colourenhancement.png'),
  (2,'Rendah Bau',NULL,NULL,NULL,'belazo-rendahbau.png'),
  (3,'Tanpa Tambahan',NULL,'Timbal dan Raksa',NULL,'belazo-rendahkandunganracun.png'),
  (4,'Singapore',NULL,'Green Label',NULL,'belazo-singaporegreenlabel.png'),
  (5,'Color Shield',NULL,'(Lapisan Pelindung Warna)',NULL,'belazo-colorshield.png'),
  (6,'Stain Proof',NULL,'(Lapisan Penahan Noda)',NULL,'belazo-stainproof.png'),
  (7,'Aroma Lavender',NULL,'(Anti Nyamuk)',NULL,'belazo-aromalavender.png'),
  (8,'Daya Tutup',NULL,'Prima',NULL,'belazo-coverage.png'),
  (9,'Water Based',NULL,'Berpengencer Air',NULL,'belazo-waterbased.png'),
  (10,'Serba Guna',NULL,'(Kayu, Besi & Beton)',NULL,'belazo-multipurpose.png'),
  (11,'Lapisan',NULL,'Anti Debu',NULL,'belazo-dirtshield.png'),
  (12,'Ketahanan Minimal',NULL,'7 Tahun',NULL,'belazo-7tahun.png'),
  (13,'Ketahanan Cuaca',NULL,'dan Sinar Matahari',NULL,'belazo-tahancuaca.png'),
  (14,'Berpengencer',NULL,'Air',NULL,'belazo-waterbased.png'),
  (15,'Daya Sebar',NULL,'Lebih Luas',NULL,'envi-dayasebar.png'),
  (16,'Dapat Dicuci',NULL,NULL,NULL,'envi-dapatdicuci.png'),
  (17,'Dilengkapi',NULL,'Anti Jamur',NULL,'envi-antijamur.png'),
  (18,'Dengan Aroma',NULL,'Yang Segar',NULL,'envi-aromasegar.png');
COMMIT;

#
# Data for the `in_product_file` table  (LIMIT 0,500)
#

INSERT INTO `in_product_file` (`id`, `product_id`, `name`, `filename`) VALUES 
  (3,2,'Color Card','file3.pdf'),
  (4,2,'MDS','file4.pdf'),
  (5,1,'MSDS BELAZO ALKALI SEALER','MSDS BELAZO ALKALI SEALER.docx'),
  (6,5,'MSDS BELAZO CLIMAGARD','MSDS BELAZO CLIMAGARD.docx'),
  (7,6,'MSDS BELAZO ROOF PAINT','MSDS BELAZO ROOF PAINT.docx'),
  (8,7,'MSDS BELAZO WOOD FILLER','MSDS BELAZO PRIMER WOOD FILLER.docx'),
  (9,8,'MSDS BELAZO WOOD STAIN','MSDS BELAZO WOOD STAIN.docx'),
  (10,9,'MSDS BELAZO GRANITEUR','MSDS BELAZO GRANITEUR.docx'),
  (11,4,'MSDS BELAZO AGE','MSDS BELAZO AGE.docx'),
  (12,3,'MSDS BELAZO MAXIMA','MSDS BELAZO MAXIMA.docx'),
  (13,11,'MSDS ENVI LATEX WALL PUTTY','MSDS ENVI LATEX WALL PUTTY.docx'),
  (14,12,'MSDS ENVI ALKALI SEALER','MSDS ENVI ALKALI SEALER.docx'),
  (15,13,'MSDS ENVI LATEX WALL PAINT','MSDS ENVI LATEX WALL PAINT.doc'),
  (16,14,'MSDS ENVI ROOF PAINT','MSDS ENVI ROOF PAINT.docx'),
  (17,15,'MSDS ENVI ANTI CORROSIVE','MSDS ENVI ANTI CORROSIVE.docx'),
  (18,16,'MSDS ENVI ALKYD GLOSS ENAMEL','MSDS ENVI ALKYD GLOSS ENAMEL.docx'),
  (19,18,'MSDS ENVI THINNER GLOSS ENAMEL','MSDS ENVI THINNER GLOSS ENAMEL.docx'),
  (20,19,'MSDS TOP SEAL','MSDS TOP SEAL.docx'),
  (21,20,'MSDS HOT SEAL','MSDS HOT SEAL.docx');
COMMIT;

#
# Data for the `in_product_type` table  (LIMIT 0,500)
#

INSERT INTO `in_product_type` (`id`, `name`, `ind_title`, `eng_title`, `ind_description`, `eng_description`, `image`, `bg_image`) VALUES 
  (1,'BELAZO','Water Based System','','<p>Belazo Kidzdream adalah cat tembok interior bagi Anda yang mendukung dan mengembangkan kreasi anak tanpa harus khawatir tembok akan kotor. Dengan Stain Proof Anti Graffiti Technology, terbukti mampu menahan noda seperti kopi, teh, krayon, lumpur.</p>','','belazo-kidzdream.png/20180724035057.png','belazo-kidzdream.png/20180724035114.jpg'),
  (2,'ENVI','Water Based & Solvent Based System','','<p>Adalah cat tembok yang memberikan permukaan yang halus dan mudah dibersihkan dengan air. Envi Latex Wall Paint dapat diaplikasikan untuk segala jenis permukaan tembok dan plafon yang terbuat dari beton, plaster, fiber, triplex maupun kayu.</p>','','envi-latexwallpaint.png/20180724035251.png','envi-latexwallpaint.png/20180724035307.jpg'),
  (3,'TOP SEAL','Cat Pelapis Anti Bocor dan Anti Alkali','Cat Pelapis Anti Bocor dan Anti Alkali','<p>Top Seal adalah pelapis anti bocor dan anti alkali ramah lingkungan yang memiliki sifat elastis, kedap air dan tahan cuaca.</p>','<p>Top Seal adalah pelapis anti bocor dan anti alkali ramah lingkungan yang memiliki sifat elastis, kedap air dan tahan cuaca.</p>','h4ky7o7l2785e6l/20180724034555.png','h4ky7o7l2785e6l/20180724034622.jpg'),
  (4,'HOT SEAL','Peredam Panas dan Anti Bocor','','<p>Hot Seal adalah pelapis atap (seng, galvanis dan genteng) anti bocor yang mampu menolak radiasi panas matahari sehingga munurunkan suhu ruangan sampai 7&deg; Celcius.</p>','','kz9og1w2ejrcq8l/20180724035356.png','kz9og1w2ejrcq8l/20180724035410.jpg'),
  (5,'TINTING','Colour Innovation','','<p>Colour Innovation merupakan sistem pencampuran warna dari PT Indaco Warna Dunia yang dimana sistem ini menghasilkan ribuan variasi warna sehingga dapat menjadi solusi untuk kebutuhan masyarakat modern saat ini tentang warna.</p>','','4556jaidb42x8v5/20180724035512.png','4556jaidb42x8v5/20180724035523.jpg'),
  (6,'MODACON','Acian Semen Anti Alkali','','<p>Modacon Acian Semen Anti Alkali adalah Acian instan premium berwarna abu - abu muda dengan fungsi meratakan, menghaluskan permukaan beton dan plester sebelum tahap pengecatan atau pemasangan wallpaper.</p>','','gxue1iojmyjlz6w/20180724035620.png','gxue1iojmyjlz6w/20180724035628.jpg'),
  (7,'NUSATEX','Meni Kayu','','<p>Nusatex Meni Kayu adalah cat dasar untuk melapisi semua jenis permukaan kayu.</p>','','mbjut4emcwo1fsd/20180724035715.png','mbjut4emcwo1fsd/20180724035722.jpg');
COMMIT;

#
# Data for the `in_products` table  (LIMIT 0,500)
#

INSERT INTO `in_products` (`id`, `type_id`, `type_title`, `name`, `ind_description`, `eng_description`, `features_id`, `image`) VALUES 
  (1,1,'WATER BASED SYSTEM','Alkali Sealer','<p><strong>Belazo Alkali Sealer</strong> - Water Based Alkali Sealer adalah cat dasar premium berbahan dasar air dengan perlindungan ganda terhadap serangan garam- garam alkali pada permukaan tembok baru, batu bata, plester dan asbes di dalam maupun di luar ruangan. Belazo Alkali Sealer mempunyai keunggulan untuk meningkatkan daya rekat cat tembok di atasnya, sehingga terhindar dari masalah menggelembung, mengelupas dan mengapur.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Petunjuk pemakaian untuk hasil terbaik</strong> : Untuk permukaan tembok baru, permukaan yang akan dicat harus dibersihkan dahulu dengan baik. Pastikan permukaan tembok sudah kering (pembacaan skala protimeter di bawah 18% dan kadar keasaman tembok 7-8). Lapiskan Belazo Alkali Sealer 1x lapis dengan pengenceran 15% air bersih.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Untuk permukaan tembok lama</strong>, apabila cat lama sudah mengelupas atau mengapur harus dikerok terlebih dahulu. Bila diperlukan, amplas dan bersihkan debu hasil pengamplasan. Aplikasikan Belazo Alkali Sealer 1x lapis dengan pengenceran 15% air bersih, dan kuaskan secara merata di seluruh permukaan tembok. Untuk hasil yang sempurna, gunakan minimum 2 lapisan cat akhir.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Petunjuk keselamatan</strong> : Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"1\",\"1\":\"2\",\"2\":\"3\",\"3\":\"4\"}','belazo-alkalisealer.png'),
  (2,1,'WATER BASED SYSTEM','Kidzdream','<p style=\"text-align: justify;\"><strong>Belazo Kidzdream -</strong> Easy Wash adalah cat tembok interior bagi Anda yang mendukung dan mengembangkan kreasi anak tanpa harus khawatir tembok akan kotor. Dengan Stain Proof Anti Graffiti Technology, terbukti mampu menahan noda seperti kopi, teh, krayon, lumpur, debu dan noda lainnya yang tidak meresap dalam lapisan cat, sehingga dapat dibersihkan tanpa merusak lapisan cat.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian untuk hasil terbaik :</strong> Pastikan dinding telah benar-benar kering dan bersih sebelum dicat. Amplas permukaan dinding jika perlu. Untuk permukaan tembok baru sebaiknya diberikan waktu pengeringan semen minimal 1 bulan dengan kadar air maksimum 18% dan maksimum pH 8.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">Untuk permukaan tembok lama periksa dahulu daya rekat cat tembok yang lama. Jika diperlukan, lakukan pengerokan kemudian dibersihkan kembali. Berilah satu lapis Belazo Alkali Sealer sebelum mengecat permukaan tersebut dengan Belazo Kidzdream terutama pada permukaan tembok baru atau pada permukaan tembok lama yang mempunyai kelembaban tinggi.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">Daya sebar optimum adalah 13-15 m2/liter per lapisan, tergantung porositas permukaan.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk keselamatan :</strong> Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"3\",\"1\":\"4\",\"2\":\"5\",\"3\":\"6\",\"4\":\"7\"}','belazo-kidzdream.png'),
  (3,1,'WATER BASED SYSTEM','Maxima','<p style=\"text-align: justify;\"><strong>Belazo Maxima -</strong> Durable Luxurious Finish adalah cat tembok 100% akrilik berbahan dasar air untuk hasil maksimal dan mewah pada dinding interior. Dengan Multi Function Formula yang memiliki daya rekat tinggi, sempurna untuk aplikasi pada dinding yang menggunakan cat dasar Belazo Alkali Sealer. Belazo Maxima tanpa timbal dan merkuri serta rendah VOC, bau dan toksisitas.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk untuk pemakaian terbaik :</strong> Pastikan dinding telah benar-benar kering dan bersih sebelum dicat. Amplas permukaan dinding jika perlu. Untuk permukaan tembok baru sebaiknya diberikan waktu pengeringan semen minimal 1 bulan dengan kadar air maksimum 18% dan maksimum pH 8. Untuk permukaan tembok lama, periksa dahulu daya rekat cat tembok yang lama. Jika diperlukan, lakukan pengerokan kemudian dibersihkan kembali. Berilah satu lapis Belazo Alkali Sealer sebelum mengecat permukaan tersebut dengan Belazo Maxima terutama pada permukaan tembok baru atau pada permukaan tembok lama yang mempunyai kelembaban tinggi. Daya sebar optimum adalah 14-16 m2/liter per lapisan, tergantung porositas permukaan.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk keselamatan :</strong> Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"3\",\"1\":\"4\",\"2\":\"5\",\"3\":\"7\",\"4\":\"8\"}','belazo-maxima.png'),
  (4,1,'WATER BASED SYSTEM','Belazo A.G.E','<p style=\"text-align: justify;\"><strong>Belazo A.G.E</strong> - Water Based Masonry Finish adalah cat besi, kayu dan beton yang terbuat dari 100% akrilik khusus untuk menyempurnakan nilai estetika perabot, mainan anak-anak, kusen jendela dan pintu pagar luar yang terbuat dari besi, kayu dan beton. Formulanya telah lulus berbagai uji kualitas dan memperoleh sertifikat Singapore Green Label, sehingga aman bagi lingkungan bahkan untuk mainan anak-anak. Belazo A.G.E memberikan hasil akhir yang mengkilap. Belazo A.G.E tanpa timbal dan merkuri, serta rendah VOC, bau dan racun.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian untuk hasil terbaik</strong> :&nbsp;Terlebih dahulu lakukan pengamplasan permukaan yang akan dicat, pastikan telah kering, bersih, rata dan bebas dari debu.</p>\r\n<p style=\"text-align: justify;\">Untuk permukaan kayu, gunakan Belazo Wood Filler untuk meratakan permukaan. Penggunaan Belazo Wood Filler tidak disarankan untuk eksterior.<br />Untuk permukaan besi, gunakan Envi Anti Corrosive Primer sebagai cat dasar untuk memaksimalkan perlindungan terhadap karat.</p>\r\n<p style=\"text-align: justify;\">Daya sebar optimum adalah 12-14 m2/liter per lapisan, tergantung porositas permukaan.</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk keselamatan</strong> :&nbsp;Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"3\",\"1\":\"4\",\"2\":\"5\",\"3\":\"9\",\"4\":\"10\"}','belazo-age.png'),
  (5,1,'WATER BASED SYSTEM','Belazo Climagard','<p style=\"text-align: justify;\"><strong>Belazo Climagard</strong> - Ultimate Climate Protection adalah cat tembok 100% akrilik berbahan dasar air khusus untuk melindungi dan memperindah eksterior rumah atau bangunan. Dengan Colour Shield Technology, UV Resistant colour pigment, anti jamur dan lumut, dan memperoleh sertifikat Singapore Green Label. Belazo Climagard tanpa timbal dan merkuri serta rendah VOC, bau dan toksisitas.</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian untuk hasil terbaik</strong> :&nbsp;Pastikan tembok telah benar-benar kering dan bersih sebelum dicat. Amplas permukaan tembok jika perlu.Untuk permukaan tembok baru sebaiknya diberikan waktu pengeringan semen minimal 1 bulan dengan kadar air maksimum 18% dan maksimum pH 8.</p>\r\n<p style=\"text-align: justify;\">Untuk permukaan tembok lama, periksa dahulu daya rekat cat tembok yang lama. Jika diperlukan, lakukan pengerokan kemudian dibersihkan kembali. Berilah satu lapis Belazo Alkali Sealer sebelum mengecat permukaan tersebut dengan Belazo Climagard terutama pada permukaan tembok baru atau pada permukaan tembok lama yang mempunyai kelembaban tinggi.</p>\r\n<p style=\"text-align: justify;\">Daya sebar optimum adalah 13-15 m2/liter per lapisan, tergantung porositas permukaan.</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk keselamatan :</strong>&nbsp;Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"3\",\"1\":\"4\",\"2\":\"5\"}','belazo-climagard.png'),
  (6,1,'WATER BASED SYSTEM  ','Belazo Roof Paint','<p style=\"text-align: justify;\"><strong>Belazo Roof Paint -</strong> Elastomeric Finish adalah cat genteng premium berbahan dasar air untuk melindungi dan memperindah atap rumah Anda. Dengan Elastomeric Formula dan bahan pewarna anti UV yang dibuat khusus untuk menahan sinar matahari, mencegah retak rambut penyebab kebocoran, melindungi dari pertumbuhan jamur dan lumut. Hasil akhir yang mengkilap serta dapat diaplikasikan pada media genteng, tembok, seng, besi dan baja. Belazo Roof Paint tanpa timbal dan merkuri serta rendah VOC, bau dan toksisitas.</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan :</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Tampilan high gloss / sangat kilap</li>\r\n<li>Cepat kering</li>\r\n<li>Daya tutup prima</li>\r\n<li>Tidak lengket</li>\r\n<li>Singapore Green Label</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk untuk pemakaian terbaik</strong> :&nbsp;Permukaan genteng yang akan dicat perlu dibersihkan dahulu dari debu, kotoran dan lumut. Pastikan permukaan genteng dalam keadaan kering. Aplikasikan Belazo Roof Paint dengan kuas, roller ataupun spray dengan pengenceran maksimal 20%, menggunakan air bersih. Daya sebar 14-16 m2/liter per lapis, tergantung porositas permukaan genteng. Banyaknya lapisan mempengaruhi tingkat kilap dari permukaan genteng yang dicat.</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk keselamatan</strong> :&nbsp;Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"\"}','belazo-roofpaint.png'),
  (7,1,'WATER BASED SYSTEM  ','Belazo Wood Filler','<p style=\"text-align: justify;\"><strong>Belazo Wood Filler</strong> - Water Based Wood Filler adalah lapisan dasar untuk menutup pori-pori kayu sehingga permukaan kayu rata dan halus, serta siap untuk proses Wood Finishing untuk hasil yang lebih indah. Dengan Water Based Formula yang bebas racun dan bau sehingga aman untuk lingkungan dan proses pengerjaannya. Belazo Wood Filler mudah dalam aplikasi dan proses pengampelasan, sehingga mempercepat proses pengerjaan. Tidak disarankan untuk permukaan yang terkena sinar matahari langsung terus menerus.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian untuk hasil terbaik</strong> :&nbsp;Permukaan yang akan dilapisi Belazo Wood Filler harus sudah diamplas dan dibersihkan dari sisa debu hasil amplas.</p>\r\n<p style=\"text-align: justify;\">Aplikasikan tipis di permukaan kayu menggunakan KAPE secara merata di seluruh permukaan.</p>\r\n<p style=\"text-align: justify;\">Daya sebar Belazo Wood Filler 10 m2/kg.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">Setelah kering, amplas Belazo Wood Filler di permukaan kayu dengan amplas (no.240) sampai serat kayu terlihat.</p>\r\n<p style=\"text-align: justify;\">Bersihkan debu sisa amplas dan siap untuk dilakukan proses pengecatan selanjutnya.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk keselamatan</strong> :&nbsp;Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"\"}','belazo-woodfiller.png'),
  (8,1,'WATER BASED SYSTEM  ','Belazo Woodstain','<p style=\"text-align: justify;\"><strong>Belazo Woodstain</strong> - Green Wood Coating adalah pelapis kayu 100% akrilik berbahan dasar air dengan kandungan pigmen oksida transparan. Melapisi permukaan kayu dengan lapisan bening khusus sehingga keindahan serat kayu tetap terjaga dan terkesan alami. Dapat digunakan untuk interior dan eksterior. Belazo Woodstain tanpa timbal dan merkuri serta rendah VOC, bau dan toksisitas.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian untuk hasil terbaik</strong> :&nbsp;Permukaan kayu diamplas dengan amplas (no.150/180) sampai licin searah serat kayu. Untuk hasil yang lebih rata, gunakan Belazo Wood Filler hanya pada obyek interior. Pastikan permukaan kayu bersih dari debu sisa amplas. Encerkan Belazo Woodstain dengan 50% air bersih. Kuaskan merata searah serat kayu. Setelah seluruh permukaan dicat, biarkan kering selama 1 jam. Setelah lapis pertama, serat kayu akan timbul, sehingga terasa kasar. Amplas ambang dengan amplas (no.400) sehingga permukaan licin kembali. Bersihkan debu bekas amplas.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">Beri lapis yang kedua seperti lapis pertama dengan pengenceran 30% air bersih. Biarkan kering selama 1 jam. Daya sebar optimum adalah 16-18 m2/liter per lapisan tergantung porositas permukaan. Seandainya diinginkan warna yang lebih tua, beri lapis ketiga dan seterusnya dengan selang waktu 1 jam. Untuk mendapatkan hasil yang lebih kilap, bisa diaplikasikan Belazo Woodstain Transparent Gloss dengan pengenceran 30% air bersih.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk keselamatan :</strong>&nbsp;Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"3\",\"1\":\"4\",\"2\":\"13\",\"3\":\"14\"}','belazo-woodstain.png'),
  (9,1,'WATER BASED SYSTEM  ','Belazo Graniteur','<p style=\"text-align: justify;\"><strong>Belazo Graniteur</strong> - Granite Style Finish adalah cat spesial efek batu granit berbahan dasar air 1 (satu) komponen yang sangat praktis untuk menambah keindahan dan nilai artistik ruangan interior dan eksterior. Aplikasi yang mudah dan dapat diaplikasikan pada media tembok, besi ataupun kayu.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan :</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Wallpaper Look</li>\r\n<li>Satu komponen</li>\r\n<li>Mudah dalam aplikasi</li>\r\n<li>Tahan lama</li>\r\n<li>Aplikasi di banyak substrat</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian</strong> :&nbsp;Permukaan tembok, besi atau kayu perlu dibersihkan dahulu dari debu, kotoran dan lumut. Untuk efek granit yang lebih baik, dapat diaplikasikan cat dasar Belazo Maxima sesuai warna yang diinginkan. Aplikasikan Belazo Graniteur dengan spray tanpa pengenceran. Daya sebar 5 m2/liter per lapis. Semakin tebal dalam pengecatan akan mempengaruhi efek yang ditimbulkan.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk keselamatan</strong> :&nbsp;Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"\"}','belazo-graniteur.png'),
  (10,1,'WATER BASED SYSTEM  ','Belazo Woodgrano','<p style=\"text-align: justify;\"><strong>Belazo Woodgrano</strong> - Wooden Style Finish adalah cat spesial efek kayu berbahan dasar air 1 (satu) komponen yang sangat praktis untuk menambah keindahan dan nilai artistik bidang interior atau eksterior.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan</strong> :</p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Mudah diaplikasi</li>\r\n<li>Tampilan natural seperti serat kayu</li>\r\n<li>Aplikasi dibanyak substrat&nbsp;</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian</strong> :&nbsp;Permukaan tembok, besi atau kayu perlu dibersihkan dahulu dari debu, kotoran dan lumut. Untuk efek kayu yang lebih baik, permukaan tembok, besi atau kayu dapat diaplikasikan cat dasar Belazo A.G.E sesuai warna yang diinginkan. Aplikasikan Belazo Woodgrano 1 (satu) lapis dengan wood grain tool tanpa pengenceran. Setelah 1 jam, aplikasikan kembali Belazo Woodgrano lapis ke 2 (dua) dengan wood grain tool tanpa pengenceran. Daya sebar 10 m2/liter per lapis. Efek kayu yang ditimbulkan tergantung dari kerataan bidang dan jenis alat yang digunakan.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk keselamatan</strong> :&nbsp;Kemasan cat harus tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk membersihkan semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"\"}','belazo-woodgrano.png'),
  (11,2,'WATER BASED SYSTEM  ','Envi Dempul Tembok','<p style=\"text-align: justify;\">Envi Dempul Tembok adalah lapisan dasar akrilik berwarna putih dengan fungsi utama untuk menutup pori &ndash; pori tembok sehingga menghasilkan permukaan tembok yang rata dan halus setelah pengecatan.</p>\r\n<p style=\"text-align: justify;\">Envi Dempul Tembok diformulasikan mempunyai daya rekat dan daya tutup yang baik sehingga dapat dipakai sebagai dempul kayu untuk mendapatkan pengecatan kayu yang rata dan lebih mengkilap.</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan :</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Daya tutup pori &ndash; pori yang baik</li>\r\n<li>Mudah diamplas</li>\r\n<li>Daya rekat yang baik</li>\r\n<li>Aplikasi mudah</li>\r\n<li>Cepat kering</li>\r\n</ol>\r\n<p style=\"text-align: justify;\"><strong>Cara pemakaian :</strong>&nbsp;Aplikasikan Envi Dempul Tembok untuk bagian tembok dalam yang kurang rata, misal: retak rambut dan lubang paku. Setelah aplikasi Envi Wall Putty biarkan kering selama 2&ndash;4 jam untuk mendapatkan hasil yang maksimal. Pemakaian Envi Dempul Tembok untuk seluruh permukaan tembok tidak disarankan.</p>','','{\"0\":\"\"}','envi-dempul-tembok.png'),
  (12,2,'WATER BASED SYSTEM  ','Envi Cat Dasar Anti Alkali','<p style=\"text-align: justify;\">Envi Cat Dasar Anti Alkali adalah cat dasar berkualitas yang sangat bermanfaat untuk mempersiapkan pori-pori permukaan tembok sehingga pemakaian cat tembok menjadi lebih hemat, tampilan warna lebih cerah, dan hasil cat akhir menjadi lebih tahan terhadap serangan alkali terutama pada permukaan tembok baru baik di dalam maupun di luar ruangan.</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan :</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Meningkatkan daya sebar cat tembok</li>\r\n<li>Menahan serangan garam-garam alkali</li>\r\n<li>Mencerahkan hasil pengecatan cat tembok</li>\r\n</ol>\r\n<p style=\"text-align: justify;\"><strong>Cara pemakaian :</strong>&nbsp;Permukaan yang akan dicat harus dibersihkan dahulu dengan baik. Pastikan permukaan tembok yang akan dicat benar-benar kering (untuk permukaan tembok baru, pembacaan skala protimeter harus sekitar 18 % dan pH sekitar 8).</p>\r\n<p style=\"text-align: justify;\">Pada permukaan tembok lama, cat lama yang sudah mengelupas atau mengapur harus dikerok terlebih dahulu. Bila diperlukan, amplaslah permukaan sampai halus lalu bersihkan permukaan tembok untuk menghilangkan debu, kotoran, dan minyak. Setelah itu gunakan satu lapis Envi Cat Dasar Alkali secara merata ke seluruh permukaan tembok. Untuk hasil yang sempurna, gunakan minimum 2 lapisan cat akhir.</p>\r\n<p style=\"text-align: justify;\"><strong>Cara aplikasi</strong> :&nbsp;Dengan Kuas, Roll, Semprot.</p>\r\n<p style=\"text-align: justify;\"><strong>Keterangan produk :&nbsp;</strong>Masa pengeringan adalah 1-2 jam sebelum lapisan berikutnya,&nbsp;</p>','','{\"0\":\"\"}','envi-cat-dasar-alkali.png'),
  (13,2,'WATER BASED SYSTEM ',' Envi Cat Tembok','<p style=\"text-align: justify;\"><strong>Envi Cat</strong> Tembok adalah cat tembok yang memberikan permukaan halus dan mudah dibersihkan dengan air. Envi Cat Tembok dapat diaplikasikan untuk segala jenis permukaan tembok dan plafon yang terbuat dari beton, plaster, fiber, triplex maupun kayu.</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian</strong> :&nbsp;Permukaan yang akan dicat perlu diampelas dan dibersihkan dahulu dengan baik. Supaya mendapatkan hasil akhir yang baik dan awet bagi permukaan tembok, beton, atau permukaan lainnya, sebaiknya diberikan waktu pengeringan secukupnya sebelum pengecatan. Untuk permukaan tembok baru sebaiknya diberikan waktu pengeringan semen minimal 1 bulan dengan kadar air maksimum 18% dan maksimum pH8. Untuk permukaan tembok lama, periksa dahulu daya rekat cat tembok yang lama. Jika diperlukan, lakukan pengerokan kemudian dibersihkan kembali.</p>\r\n<p style=\"text-align: justify;\">Cara aplikasi :&nbsp;Dengan Kuas, Roll, Semprot</p>\r\n<p style=\"text-align: justify;\"><strong>Keterangan produk :</strong>&nbsp;Masa pengeringan adalah 1-2 jam sebelum lapisan berikutnya, dengan daya sebar optimum 7-10 m2/kg per lapisan tergantung kondisi dan porositas permukaan. Pengenceran dengan air bersih sebanyak 30% untuk aplikasi dengan kuas atau roll dan 50% untuk aplikasi dengan semprot.</p>\r\n<p style=\"text-align: justify;\">JANGAN GUNAKAN PLAMUR MURAH DENGAN DAYA REKAT BURUK UNTUK MERATAKAN PERMUKAAN TEMBOK.</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk keselamatan</strong> :&nbsp;Kemasan cat harus selalu tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Gunakan air bersih untuk semua peralatan. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"\"}','envi-cat-tembok.png'),
  (14,2,'WATER BASED SYSTEM ',' Envi Cat Genteng','<p style=\"text-align: justify;\">Adalah cat genteng serbaguna berbahan dasar 100% akrilik yang dapat digunakan untuk segala jenis permukaan genteng, tembok, asbes, eternit, plafon, lapangan tenis, markah jalan serta lantai gudang.</p>\r\n<p style=\"text-align: justify;\">Envi Cat Genteng mempunyai sifat kilap dan ketahanan yang baik terhadap cuaca dan sinar matahari sehingga permukaan yang telah dicat menjadi tetap bersih dan lebih awet.</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan:</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Pilihan warna &ndash; warna menarik</li>\r\n<li>Daya sebar yang luas</li>\r\n<li>Dapat diaplikasikan dalam bidang tembok, seng ataupun baja</li>\r\n</ol>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian :</strong>&nbsp;Permukaan yang akan dicat harus dalam keadaan benar-benar bersih, kering dan bebas dari segala macam kotoran, pasir, debu, minyak, maupun lumut. Aduklah Envi Cat Genteng secara merata sebelum digunakan. Jika diperlukan, lakukan pengenceran dengan air bersih sebanyak 10-20%. Envi Cat Genteng dapat diaplikasikan dengan menggunakan kuas, roller maupun spray. Sebelum dilanjutkan ke lapisan selanjutnya biarkan lapisan pertama benar-benar kering terlebih dahulu.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Cara aplikasi :&nbsp;</strong>Kuas, Roll dan Spray</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keterangan produk :&nbsp;</strong>Masa pengeringan adalah 1-2 jam sebelum lapisan berikutnya, dengan daya sebar optimum 7-10 m2/kg per lapisan tergantung kondisi dan porositas permukaan. Pengenceran dengan air bersih sebanyak 20% untuk aplikasi dengan kuasa taurol dan 40% untuk aplikasi dengan semprot.</p>','','{\"0\":\"\"}','envi-cat-genteng.png'),
  (15,2,'SOLVENT BASED SYSTEM ',' Envi Cat Dasar Anti Karat','<p style=\"text-align: justify;\">Envi Cat Dasar Anti Karat adalah cat dasar alkyd sintetik bermutu tinggi yang mengandung pigment anti karat dengan ketahanan cuaca yang tinggi.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan:</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Mengandung zat penghambat karat</li>\r\n<li>Kental dan daya sebar luas sehingga menambah nilai keekonomisan pemakaian cat</li>\r\n<li>Perlindungan terhadap karat yang tahan lama</li>\r\n<li>Cepat kering</li>\r\n<li>Menambah daya rekat cat diatasnya</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian:</strong>&nbsp;Permukaan yang akan dicat harus dibersihkan terlebih dahulu dengan baik. Aduk cat sampai rata dan tambahkan thinner &plusmn; 5% untuk pemakaian dengan kuas atau roll dan &plusmn; 15-20% untuk pemakaian dengan spray/semprot.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keterangan produk:</strong>&nbsp;Masa pengeringan adalah 1 jam untuk kering sentuh dan 4 jam untuk kering keras tergantung keadaan cuaca dan sirkulasi udara selama pengecatan. Daya sebar optimum adalah 10-13 m2 / liter tergantung sifat dan absorpsi dari pori-pori permukaan. Gunakan Minyak Terpentin untuk membersihkan kuas dan peralatan lainnya setelah pemakaian<strong>.</strong></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Peringatan:&nbsp;</strong>Kemasan cat harus selalu tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Simpan di tempat yang sejuk dan jauhkan dari jangkauan anak - anak. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"\"}','envi-cat-dasar-anti-karat.png'),
  (16,2,'SOLVENT BASED SYSTEM ',' Envi Cat Kayu & Besi','<p style=\"text-align: justify;\">Envi Cat Kayu &amp; Besi adalah cat alkyd sintetik bermutu tinggi yang memberikan perlindungan sekaligus keindahan pada permukaan kayu, logam dan berbagai konstruksi besi di luar ruangan maupun dalam ruangan.</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan:</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Lebih cepat kering</li>\r\n<li>Kental sehingga daya sebar lebih luas</li>\r\n<li>Cocok dengan banyak pengencer / Thinner</li>\r\n<li>Mudah dalam aplikasi</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian:</strong>&nbsp;Permukaan yang akan dicat harus dibersihkan terlebih dahulu dengan baik. Aduk cat sampai rata dan tambahkan thinner &plusmn; 5% untuk pemakaian dengan kuas atau roll dan &plusmn; 15-20% untuk pemakaian dengan spray/semprot. Untuk mendapatkan hasil optimal pada permukaan logam, dianjurkan memakai cat dasar anti karat Envi Zinc Chromate Alkyd Primer.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keterangan produk:</strong>&nbsp;Masa Pengeringan adalah 2 jam untuk kering sentuh dan 8 jam untuk kering keras tergantung keadaan cuaca dan sirkulasi udara selama pengecatan. Daya sebar optimum adalah 10-13 m&sup2; /liter tergantung sifat dan absorpsi dari pori-pori permukaan. Gunakan Minyak Terpentin untuk membersihkan kuas dan peralatan lainnya setelah pemakaian.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Peringatan:</strong>&nbsp;Kemasan cat harus selalu tertutup rapat dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Simpan ditempat yang sejuk dan jauhkan dari jangkauan anak-anak. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"\"}','envi-cat-kayu-besi.png'),
  (17,2,'SOLVENT BASED SYSTEM ',' Envi Anti Fouling','<p style=\"text-align: justify;\">Cat kapal dan perahu bagian bawah yang terendam air untuk melindungi dan mencegah menempelnya tumbuhan atau hewan di lambung kapal dan perahu.</p>\r\n<p style=\"text-align: justify;\"><strong>Pengenceran&nbsp;:</strong> 10 % Thinner B<br /><strong>Daya sebar&nbsp;:</strong> 10 m2/ L per lapis</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan:</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Anti-Ganggang dan Tiram</li>\r\n<li>Perlindungan terhadap air garam</li>\r\n<li>Mudah aplikasi</li>\r\n<li>Daya sebar tinggi</li>\r\n</ol>','','{\"0\":\"\"}','envi-anti-fouling.png'),
  (18,2,'SOLVENT BASED SYSTEM  ','Envi Thinner-B Cat Kayu & Besi','<p style=\"text-align: justify;\">Envi Thinner Gloss Enamel adalah pelarut solvent berbahan dasar &ldquo;mineral spirit&rdquo; yang cocok melarutkan cat sintetik dengan tingkat kelarutan 100%.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">Envi Thinner Gloss Enamel merupakan pelarut solvent jenis Thinner B sehingga tidak relevan untuk pengencer cat furniture atau cat otomotif (Melamine, NC, PU atau DUCO).</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan :</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Jernih dan menjaga keaslian warna cat</li>\r\n<li>Takaran tepat sesuai yang tertera di kemasan</li>\r\n<li>Cocok untuk melarutkan semua Cat Synthetic (Cat Kayu &amp; Besi)</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian :</strong>&nbsp;Campurkan Envi Thinner Gloss Enamel dengan cat sintetik dengan ketentuan sesuai jumlah yang ditentukan dalam setiap produk cat sintetik yang dipergunakan.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Peringatan :</strong>&nbsp;Kemasan cat harus selalu tertutup rapat untuk menghindari penguapan dan jangan sampai terkena mata. Perhatikan sirkulasi udara selama pengecatan. Simpan di tempat yang sejuk dan jauhkan dari jangkauan anak-anak. Buanglah sisa bahan di tempat yang diijinkan menurut peraturan yang ada.</p>','','{\"0\":\"\"}','envi-thinner-b.png'),
  (19,3,'WATER BASED SYSTEM  ','Top Seal Pelapis Anti Bocor dan Anti Alkali','<p style=\"text-align: justify;\">Top Seal adalah pelapis anti bocor dan anti alkali yang memiliki sifat elastis, kedap air serta tahan cuaca sehingga sangat cocok digunakan pada permukaan tembok, beton, asbes, galvanis/seng, dan permukaan terakota.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Pengenceran&nbsp;:</strong> 10 % air bersih<br /><strong>Daya sebar&nbsp;:</strong> 8 m2/ L per lapis<br /><strong>Kemasan&nbsp;:</strong> 1 L, 4 L, 20 L</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan:</strong></p>\r\n<ol>\r\n<li style=\"text-align: justify;\">Bau tidak menyengat</li>\r\n<li style=\"text-align: justify;\">Memiliki daya rekat dan elastisitas yang baik</li>\r\n<li style=\"text-align: justify;\">Kemampuan kedap air yang baik</li>\r\n<li style=\"text-align: justify;\">Ketahanan terhadap zat alkali yang baik</li>\r\n<li style=\"text-align: justify;\">Hasil tampilan akhir Gloss (Kilap)</li>\r\n</ol>','','{\"0\":\"\"}','top-seal.png'),
  (20,4,'WATER BASED SYSTEM  ','Hot Seal Cat Peredam Panas','<p style=\"text-align: justify;\">Hot Seal adalah Cat Peredam Panas dengan lapisan film eksotermal yang mampu memantulkan radiasi sinar matahari, sehingga menurunkan suhu permukaan hingga 7&deg;.</p>\r\n<p style=\"text-align: justify;\">Dapat digunakan di berbagai medium seperti atap berbahan seng atau galvalum, dinding serta dak beton. Membuat suhu ruangan rumah Anda menjadi lebih adem.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Cara pemakaian :</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Permukaan yang akan dilapisi harus kering dan bersih dari debu, minyak, kerat, jamur, dan kotoran yang lainnya.</li>\r\n<li>Bila akan diaplikasikan di atas lapisan cat lama pastikan cat lama mempunyai daya rekat yang masih baik, bila sudah terkelupas sebaiknya harus dikerok dahulu untuk cat lamanya.</li>\r\n<li>Aplikasi untuk perlindungan bocor dan meredam panas:<br /><strong>Tembok, Beton / Dak</strong>\r\n<ul type=\"disc\">\r\n<li>Bersihkan media yang akan dicat dari kotoran dan debu hasil amplas</li>\r\n<li>Lapiskan&nbsp;Hot Seal&nbsp;tanpa pengenceran, minimal 3 kali lapis dengan arah yang berbeda (vertikal-horizontal).</li>\r\n</ul>\r\n<strong>Galvanis / Seng</strong>\r\n<ul type=\"disc\">\r\n<li>Bersihkan media yang akan dicat dari kotoran dan debu hasil amplas</li>\r\n<li>Lapiskan cat anti karat sebagai lapisan cat dasar</li>\r\n<li>Lapiskan Hot Seal tanpa pengenceran, minimal 3 kali lapis dengan arah yang berbeda (vertikal-horizontal).</li>\r\n</ul>\r\n</li>\r\n<li><strong>Aplikasi dianjurkan minimal 3 kali lapis untuk hasil yang maksimal dengan menggunakan alat aplikasi:</strong>\r\n<ul type=\"disc\">\r\n<li>Kuas lebar (tanpa pengenceran)</li>\r\n<li>Roll bulu pendek (tanpa pengenceran)</li>\r\n<li>Airless spray (pengenceran maksimal 10%)</li>\r\n</ul>\r\n</li>\r\n<li><strong>Untuk Anti Bocor:</strong><br />Gunakan 1x lapis&nbsp;Top Seal&nbsp;pada permukaan tembok atau beton kemudian lapiskan&nbsp;Hot Seal&nbsp;diatasnya minimal 2x lapis.</li>\r\n</ol>','','{\"0\":\"\"}','hot-seal.png'),
  (21,5,'TINTING MACHINE  ','Tinting Colour Innovation','<p style=\"text-align: justify;\">Colour Innovation merupakan sistem pencampuran warna dari PT. Indaco Warna Dunia yang menghasilkan ribuan variasi warna sehingga dapat menjadi solusi untuk kebutuhan masyarakat modern tentang warna.</p>\r\n<p style=\"text-align: justify;\">Teknologi Colour Innovation terdapat di berbagai segmen produk antara lain:</p>\r\n<ul style=\"text-align: justify;\" type=\"disc\">\r\n<li>Envi Cat Tembok untuk segmen medium</li>\r\n<li>Envi Cat Genteng untuk segmen medium</li>\r\n<li>Envi Cat Kayu &amp; Besi untuk segmen medium</li>\r\n<li>Belazo Kidzdream untuk segmen premium</li>\r\n<li>Belazo Maxima untuk segmen premium</li>\r\n<li>Belazo A.G.E untuk segmen premium</li>\r\n<li>Belazo Climagard untuk segmen premium</li>\r\n<li>Belazo Roof Paint untuk segmen premium</li>\r\n<li>Top Seal Water Proofing untuk segmen premium</li>\r\n<li>Hot Seal untuk segmen premium</li>\r\n</ul>','','{\"0\":\"\"}','tinting.png'),
  (22,6,'CONSTRUCTION ',' Modacon Acian Semen','<p style=\"text-align: justify;\">Modacon Acian Semen Anti Alkali adalah Acian instan premium berwarna abu &ndash; abu muda dengan fungsi meratakan, menghaluskan permukaan beton dan plester sebelum tahap pengecatan atau pemasangan wallpaper.</p>\r\n<p style=\"text-align: justify;\">Modacon Acian Semen Anti Alkali merupakan Acian instan berbahan dasar Semen, Filler, Aditif dan diperkuat dengan Polimer khusus. Modacon Acian Semen Anti Alkali diformulasikan untuk digunakan di luar (Eksterior) dan dalam (Interior) ruangan.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan:</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Praktis dan hemat waktu, cukup dicampur dengan air acian siap untuk digunakan.</li>\r\n<li>Memiliki daya rekat dan daya tekan yang baik sehingga tidak mudah mengelupas.</li>\r\n<li>Mencegah timbulnya retak rambut karena tingkat penyusutan yang rendah acian tidak cepat kering sehingga mudah dalam meratakan dan merapikan acian.</li>\r\n<li>Tanpa plamur tembok karena permukaan sudah rata dan halus.</li>\r\n<li>Memiliki tingkat porositas dan kadar alkali yang rendah sehingga menghemat penggunaan cat dan dapat langsung dicat setelah acian berumur 7 hari.</li>\r\n</ol>','','{\"0\":\"\"}','indicator-modacon-aciansemen.png'),
  (23,7,'SOLVENT BASED SYSTEM  ','Nusatex Meni Kayu','<p style=\"text-align: justify;\"><strong>Nusatex Meni Kayu</strong> adalah cat dasar sintetik bermutu tinggi untuk melapisi berbagai jenis permukaan kayu. Agar mendapatkan hasil maksimal dari pengecatan kayu dengan cat sintetik, gunakan selalu satu lapis Nusatex Meni Kayu sebagai cat dasar.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan:</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Nusatex Meni kayu mempunyai daya sebar dan daya tutup pori&ndash;pori kayu yang tinggi.</li>\r\n<li>Harga yang ekonomis dan kualitas yang baik sehingga dapat dijangkau disegala lapisan masyarakat.</li>\r\n<li>Daya Tutup maksimal</li>\r\n</ol>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Petunjuk pemakaian:</strong>&nbsp;Permukaan yang akan dicat perlu dibersihkan dahulu dari debu dan kotoran lainnya kemudian biarkan hingga permukaan benar - benar kering. Aduklah cat dengan rata lalu encerkan dengan pengencer Envi Thinner Gloss Enamel secukupnya. Lakukan pengecatan dengan mempergunakan kuas, roller, atau alat-alat pengecatan yang baik.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Perhatian:</strong>&nbsp;Nusatex Meni Kayu mempunyai daya sebar dan daya tutup pori - pori kayu yang tinggi sehingga hasil pengecatan kayu menjadi lebih rata, halus, dan mengkilap.</p>','','{\"0\":\"\"}','nusatex-meni-kayu.png'),
  (24,7,'SOLVENT BASED SYSTEM ',' Nusatex Anti Karat','<p style=\"text-align: justify;\">Cat anti karat bermutu tinggi, ketahanan cuaca yang baik dengan harga ekonomis.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Pengenceran&nbsp;:</strong> 15 % Thinner B<br /><strong>Daya sebar&nbsp;:</strong> 12 m2/ Kg per lapis<br /><strong>Kemasan&nbsp;:</strong> 1 Kg, 5 Kg, 20 Kg</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan:</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Melindungi besi dari reaksi Oksidasi (pengkaratan)</li>\r\n<li>Meningkatkan daya rekat cat diatasnya</li>\r\n<li>Cepat kering dan ekonomis</li>\r\n</ol>','','{\"0\":\"\"}','indicator-nusatex-antikarat.png'),
  (25,7,'SOLVENT BASED SYSTEM  ','Nusatex Cat Paving','<p style=\"text-align: justify;\">Nusatex Cat Paving adalah cat paving dengan tampilan kilap/gloss bermutu dengan perlindungan dari sinar ultraviolet yang baik disertai lapisan anti licin.</p>\r\n<p style=\"text-align: justify;\"><strong>Pengenceran&nbsp;:</strong> 10 % air bersih<br /><strong>Daya sebar&nbsp;:</strong> 8 m2/ L per lapis<br /><strong>Kemasan&nbsp;:</strong> 1 L, 4 L, 20 L</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Keunggulan:</strong></p>\r\n<ol style=\"text-align: justify;\">\r\n<li>Daya rekat yang bagus</li>\r\n<li>Lapisan Anti Licin</li>\r\n<li>Daya Tutup maksimal</li>\r\n</ol>','','{\"0\":\"\"}','nusatex-cat-paving.png');
COMMIT;

#
# Data for the `in_subscriber` table  (LIMIT 0,500)
#

INSERT INTO `in_subscriber` (`id`, `email`, `created`) VALUES 
  (1,'alung@abc.com',1532865910),
  (2,'adi@indaco.id',1533178322),
  (3,'ba@saa.id',1533184311);
COMMIT;

#
# Data for the `kabupaten` table  (LIMIT 0,500)
#

INSERT INTO `kabupaten` (`idx`, `kode_kabupaten`, `kabupaten`, `idprovinsi`) VALUES 
  (1,'0101','Aceh Barat',1),
  (2,'0102','Aceh Barat Daya',1),
  (3,'0103','Aceh Besar',1),
  (4,'0104','Aceh Jaya',1),
  (5,'0105','Aceh Selatan',1),
  (6,'0106','Aceh Singkil',1),
  (7,'0107','Aceh Tamiang',1),
  (8,'0108','Aceh Tengah',1),
  (9,'0109','Aceh Tenggara',1),
  (10,'0110','Aceh Timur',1),
  (11,'0111','Aceh Utara',1),
  (12,'0112','Bener Meriah',1),
  (13,'0113','Bireuen',1),
  (14,'0114','Gayo Lues',1),
  (15,'0115','Nagan Raya',1),
  (16,'0116','Pidie',1),
  (17,'0117','Pidie Jaya',1),
  (18,'0118','Simeulue',1),
  (19,'0119','kota Banda Aceh',1),
  (20,'0120','kota Langsa',1),
  (21,'0121','kota Lhokseumawe',1),
  (22,'0122','kota Sabang',1),
  (23,'0123','kota Subulussalam',1),
  (24,'0201','Badung',2),
  (25,'0202','Bangli',2),
  (26,'0203','Buleleng',2),
  (27,'0204','Gianyar',2),
  (28,'0205','Jembrana',2),
  (29,'0206','Karangasem',2),
  (30,'0207','Klungkung',2),
  (31,'0208','Tabanan',2),
  (32,'0209','kota Denpasar',2),
  (33,'0301','Lebak',3),
  (34,'0302','Pandeglang',3),
  (35,'0303','Serang',3),
  (36,'0304','Tangerang',3),
  (37,'0305','Kota Cilegon',3),
  (38,'0306','Kota Serang',3),
  (39,'0307','Kota Tangerang',3),
  (40,'0308','Kota Tangerang Selatan',3),
  (41,'0401','Bengkulu Selatan',4),
  (42,'0402','Bengkulu Tengah',4),
  (43,'0403','Bengkulu Utara',4),
  (44,'0404','Kaur',4),
  (45,'0405','Kepahiang',4),
  (46,'0406','Lebong',4),
  (47,'0407','Mukomuko',4),
  (48,'0408','Rejang Lebong',4),
  (49,'0409','Seluma',4),
  (50,'0410','Kota Bengkulu',4),
  (51,'0501','Boalemo',5),
  (52,'0502','Bone Bolango',5),
  (53,'0503','Gorontalo',5),
  (54,'0504','Gorontalo Utara',5),
  (55,'0505','Pohuwato',5),
  (56,'0506','Kota Gorontalo',5),
  (57,'0601','Kepulauan Seribu',6),
  (58,'0602','Kota Jakarta Barat',6),
  (59,'0603','Kota Jakarta Pusat',6),
  (60,'0604','Kota Jakarta Selatan',6),
  (61,'0605','Kota Jakarta Timur',6),
  (62,'0606','Kota Jakarta Utara',6),
  (63,'0701','Batanghari',7),
  (64,'0702','Bungo',7),
  (65,'0703','Kerinci',7),
  (66,'0704','Merangin',7),
  (67,'0705','Muaro Jambi',7),
  (68,'0706','Sarolangun',7),
  (69,'0707','Tanjung Jabung Barat',7),
  (70,'0708','Tanjung Jabung Timur',7),
  (71,'0709','Tebo',7),
  (72,'0710','Kota ambi',7),
  (73,'0711','Kota Sungai Penuh',7),
  (74,'0801','Bandung',8),
  (75,'0802','Bandung Barat',8),
  (76,'0803','Bekasi',8),
  (77,'0804','Bogor',8),
  (78,'0805','Ciamis',8),
  (79,'0806','Cianjur',8),
  (80,'0807','Cirebon',8),
  (81,'0808','Garut',8),
  (82,'0809','Indramayu',8),
  (83,'0810','Karawang',8),
  (84,'0811','Kuningan',8),
  (85,'0812','Majalengka',8),
  (86,'0813','Pangandaran',8),
  (87,'0814','Purwakarta',8),
  (88,'0815','Subang',8),
  (89,'0816','Sukabumi',8),
  (90,'0817','Sumedang',8),
  (91,'0818','Tasikmalaya',8),
  (92,'0819','Kota Bandung',8),
  (93,'0820','Kota Banjar',8),
  (94,'0821','Kota Bekasi',8),
  (95,'0822','Kota Bogor',8),
  (96,'0823','Kota Cimahi',8),
  (97,'0824','Kota Cirebon',8),
  (98,'0825','Kota Depok',8),
  (99,'0826','Kota Sukabumi',8),
  (100,'0827','Kota Tasikmalaya',8),
  (101,'0901','Banjarnegara',9),
  (102,'0902','Banyumas',9),
  (103,'0903','Batang',9),
  (104,'0904','Blora',9),
  (105,'0905','Boyolali',9),
  (106,'0906','Brebes',9),
  (107,'0907','Cilacap',9),
  (108,'0908','Demak',9),
  (109,'0909','Grobogan',9),
  (110,'0910','Jepara',9),
  (111,'0911','Karanganyar',9),
  (112,'0912','Kebumen',9),
  (113,'0913','Kendal',9),
  (114,'0914','Klaten',9),
  (115,'0915','Kudus',9),
  (116,'0916','Magelang',9),
  (117,'0917','Pati',9),
  (118,'0918','Pekalongan',9),
  (119,'0919','Pemalang',9),
  (120,'0920','Purbalingga',9),
  (121,'0921','Purworejo',9),
  (122,'0922','Rembang',9),
  (123,'0923','Semarang',9),
  (124,'0924','Sragen',9),
  (125,'0925','Sukoharjo',9),
  (126,'0926','Tegal',9),
  (127,'0927','Temanggung',9),
  (128,'0928','Wonogiri',9),
  (129,'0929','Wonosobo',9),
  (130,'0930','Kota Magelang',9),
  (131,'0931','Kota Pekalongan',9),
  (132,'0932','Kota Salatiga',9),
  (133,'0933','Kota Semarang',9),
  (134,'0934','Kota Surakarta',9),
  (135,'0935','Kota Tegal',9),
  (136,'1001','Bangkalan',10),
  (137,'1002','Banyuwangi',10),
  (138,'1003','Blitar',10),
  (139,'1004','Bojonegoro',10),
  (140,'1005','Bondowoso',10),
  (141,'1006','Gresik',10),
  (142,'1007','Jember',10),
  (143,'1008','Jombang',10),
  (144,'1009','Kediri',10),
  (145,'1010','Lamongan',10),
  (146,'1011','Lumajang',10),
  (147,'1012','Madiun',10),
  (148,'1013','Magetan',10),
  (149,'1014','Malang',10),
  (150,'1015','Mojokerto',10),
  (151,'1016','Nganjuk',10),
  (152,'1017','Ngawi',10),
  (153,'1018','Pacitan',10),
  (154,'1019','Pamekasan',10),
  (155,'1020','Pasuruan',10),
  (156,'1021','Ponorogo',10),
  (157,'1022','Probolinggo',10),
  (158,'1023','Sampang',10),
  (159,'1024','Sidoarjo',10),
  (160,'1025','Situbondo',10),
  (161,'1026','Sumenep',10),
  (162,'1027','Trenggalek',10),
  (163,'1028','Tuban',10),
  (164,'1029','Tulungagung',10),
  (165,'1030','Kota Batu',10),
  (166,'1031','Kota Blitar',10),
  (167,'1032','Kota Kediri',10),
  (168,'1033','Kota Madiun',10),
  (169,'1034','Kota Malang',10),
  (170,'1035','Kota Mojokerto',10),
  (171,'1036','Kota Pasuruan',10),
  (172,'1037','Kota Probolinggo',10),
  (173,'1038','Kota Surabaya',10),
  (174,'1101','Bengkayang',11),
  (175,'1102','Kapuas Hulu',11),
  (176,'1103','Kayong Utara',11),
  (177,'1104','Ketapang',11),
  (178,'1105','Kubu Raya',11),
  (179,'1106','Landak',11),
  (180,'1107','Melawi',11),
  (181,'1108','Pontianak',11),
  (182,'1109','Sambas',11),
  (183,'1110','Sanggau',11),
  (184,'1111','Sekadau',11),
  (185,'1112','Sintang',11),
  (186,'1113','Kota Pontianak',11),
  (187,'1114','Kota Singkawang',11),
  (188,'1201','Balangan',12),
  (189,'1202','Banjar',12),
  (190,'1203','Barito Kuala',12),
  (191,'1204','Hulu Sungai Selatan',12),
  (192,'1205','Hulu Sungai Tengah',12),
  (193,'1206','Hulu Sungai Utara',12),
  (194,'1207','Kotabaru',12),
  (195,'1208','Tabalong',12),
  (196,'1209','Tanah Bumbu',12),
  (197,'1210','Tanah Laut',12),
  (198,'1211','Tapin',12),
  (199,'1212','Kota Banjarbaru',12),
  (200,'1213','Kota Banjarmasin',12),
  (201,'1301','Barito Selatan',13),
  (202,'1302','Barito Timur',13),
  (203,'1303','Barito Utara',13),
  (204,'1304','Gunung Mas',13),
  (205,'1305','Kapuas',13),
  (206,'1306','Katingan',13),
  (207,'1307','Kotawaringin Barat',13),
  (208,'1308','Kotawaringin Timur',13),
  (209,'1309','Lamandau',13),
  (210,'1310','Murung Raya',13),
  (211,'1311','Pulang Pisau',13),
  (212,'1312','Sukamara',13),
  (213,'1313','Seruyan',13),
  (214,'1314','Kota Palangka Raya',13),
  (215,'1401','Berau',14),
  (216,'1402','Kutai Barat',14),
  (217,'1403','Kutai Kartanegara',14),
  (218,'1404','Kutai Timur',14),
  (219,'1405','Paser',14),
  (220,'1406','Penajam Paser Utara',14),
  (221,'1407','Mahakam Ulu',14),
  (222,'1408','Kota Balikpapan',14),
  (223,'1409','Kota Bontang',14),
  (224,'1410','Kota Samarinda',14),
  (225,'1501','Bulungan',15),
  (226,'1502','Malinau',15),
  (227,'1503','Nunukan',15),
  (228,'1504','Tana Tidung',15),
  (229,'1505','Kota Tarakan',15),
  (230,'1601','Bangka',16),
  (231,'1602','Bangka Barat',16),
  (232,'1603','Bangka Selatan',16),
  (233,'1604','Bangka Tengah',16),
  (234,'1605','Belitung',16),
  (235,'1606','Belitung Timur',16),
  (236,'1607','Kota Pangkal Pinang',16),
  (237,'1701','Bintan',17),
  (238,'1702','Karimun',17),
  (239,'1703','Kepulauan Anambas',17),
  (240,'1704','Lingga',17),
  (241,'1705','Natuna',17),
  (242,'1706','Kota Batam',17),
  (243,'1707','Kota Tanjung Pinang',17),
  (244,'1801','Lampung Barat',18),
  (245,'1802','Lampung Selatan',18),
  (246,'1803','Lampung Tengah',18),
  (247,'1804','Lampung Timur',18),
  (248,'1805','Lampung Utara',18),
  (249,'1806','Mesuji',18),
  (250,'1807','Pesawaran',18),
  (251,'1808','Pringsewu',18),
  (252,'1809','Tanggamus',18),
  (253,'1810','Tulang Bawang',18),
  (254,'1811','Tulang Bawang Barat',18),
  (255,'1812','Way Kanan',18),
  (256,'1813','Pesisir Barat',18),
  (257,'1814','Kota Bandar Lampung',18),
  (258,'1815','Kota Metro',18),
  (259,'1901','Buru',19),
  (260,'1902','Buru Selatan',19),
  (261,'1903','Kepulauan Aru',19),
  (262,'1904','Maluku Barat Daya',19),
  (263,'1905','Maluku Tengah',19),
  (264,'1906','Maluku Tenggara',19),
  (265,'1907','Maluku Tenggara Barat',19),
  (266,'1908','Seram Bagian Barat',19),
  (267,'1909','Seram Bagian Timur',19),
  (268,'1910','Kota Ambon',19),
  (269,'1911','Kota Tual',19),
  (270,'2001','Halmahera Barat',20),
  (271,'2002','Halmahera Tengah',20),
  (272,'2003','Halmahera Utara',20),
  (273,'2004','Halmahera Selatan',20),
  (274,'2005','Kepulauan Sula',20),
  (275,'2006','Halmahera Timur',20),
  (276,'2007','Pulau Morotai',20),
  (277,'2008','Kota Ternate',20),
  (278,'2009','Kota Tidore Kepulauan',20),
  (279,'2101','Bima',21),
  (280,'2102','Dompu',21),
  (281,'2103','Lombok Barat',21),
  (282,'2104','Lombok Tengah',21),
  (283,'2105','Lombok Timur',21),
  (284,'2106','Lombok Utara',21),
  (285,'2107','Sumbawa',21),
  (286,'2108','Sumbawa Barat',21),
  (287,'2109','Kota Bima',21),
  (288,'2110','Kota Mataram',21),
  (289,'2201','Alor',22),
  (290,'2202','Belu',22),
  (291,'2203','Ende',22),
  (292,'2204','Flores Timur',22),
  (293,'2205','Kupang',22),
  (294,'2206','Lembata',22),
  (295,'2207','Manggarai',22),
  (296,'2208','Manggarai Barat',22),
  (297,'2209','Manggarai Timur',22),
  (298,'2210','Ngada',22),
  (299,'2211','Nagekeo',22),
  (300,'2212','Rote Ndao',22),
  (301,'2213','Sabu Raijua',22),
  (302,'2214','Sikka',22),
  (303,'2215','Sumba Barat',22),
  (304,'2216','Sumba Barat Daya',22),
  (305,'2217','Sumba Tengah',22),
  (306,'2218','Sumba Timur',22),
  (307,'2219','Timor Tengah Selatan',22),
  (308,'2220','Timor Tengah Utara',22),
  (309,'2221','Kota Kupang',22),
  (310,'2301','Asmat',23),
  (311,'2302','Biak Numfor',23),
  (312,'2303','Boven Digoel',23),
  (313,'2304','Deiyai',23),
  (314,'2305','Dogiyai',23),
  (315,'2306','Intan Jaya',23),
  (316,'2307','Jayapura',23),
  (317,'2308','Jayawijaya',23),
  (318,'2309','Keerom',23),
  (319,'2310','Kepulauan Yapen',23),
  (320,'2311','Lanny Jaya',23),
  (321,'2312','Mamberamo Raya',23),
  (322,'2313','Mamberamo Tengah',23),
  (323,'2314','Mappi',23),
  (324,'2315','Merauke',23),
  (325,'2316','Mimika',23),
  (326,'2317','Nabire',23),
  (327,'2318','Nduga',23),
  (328,'2319','Paniai',23),
  (329,'2320','Pegunungan Bintang',23),
  (330,'2321','Puncak',23),
  (331,'2322','Puncak Jaya',23),
  (332,'2323','Sarmi',23),
  (333,'2324','Supiori',23),
  (334,'2325','Tolikara',23),
  (335,'2326','Waropen',23),
  (336,'2327','Yahukimo',23),
  (337,'2328','Yalimo',23),
  (338,'2329','Kota Jayapura',23),
  (339,'2401','Fakfak',24),
  (340,'2402','Kaimana',24),
  (341,'2403','Manokwari',24),
  (342,'2404','Manokwari Selatan',24),
  (343,'2405','Maybrat',24),
  (344,'2406','Pegunungan Arfak',24),
  (345,'2407','Raja Ampat',24),
  (346,'2408','Sorong',24),
  (347,'2409','Sorong Selatan',24),
  (348,'2410','Tambrauw',24),
  (349,'2411','Teluk Bintuni',24),
  (350,'2412','Teluk Wondama',24),
  (351,'2413','Kota Sorong',24),
  (352,'2501','Bengkalis',25),
  (353,'2502','Indragiri Hilir',25),
  (354,'2503','Indragiri Hulu',25),
  (355,'2504','Kampar',25),
  (356,'2505','Kuantan Singingi',25),
  (357,'2506','Pelalawan',25),
  (358,'2507','Rokan Hilir',25),
  (359,'2508','Rokan Hulu',25),
  (360,'2509','Siak',25),
  (361,'2510','Kepulauan Meranti',25),
  (362,'2511','Kota Dumai',25),
  (363,'2512','Kota Pekanbaru',25),
  (364,'2601','Majene',26),
  (365,'2602','Mamasa',26),
  (366,'2603','Mamuju',26),
  (367,'2604','Mamuju Utara',26),
  (368,'2605','Polewali Mandar',26),
  (369,'2606','Mamuju Tengah',26),
  (370,'2701','Bantaeng',27),
  (371,'2702','Barru',27),
  (372,'2703','Bone',27),
  (373,'2704','Bulukumba',27),
  (374,'2705','Enrekang',27),
  (375,'2706','Gowa',27),
  (376,'2707','Jeneponto',27),
  (377,'2708','Kepulauan Selayar',27),
  (378,'2709','Luwu',27),
  (379,'2710','Luwu Timur',27),
  (380,'2711','Luwu Utara',27),
  (381,'2712','Maros',27),
  (382,'2713','Pangkajene dan Kepulauan',27),
  (383,'2714','Pinrang',27),
  (384,'2715','Sidenreng Rappang',27),
  (385,'2716','Sinjai',27),
  (386,'2717','Soppeng',27),
  (387,'2718','Takalar',27),
  (388,'2719','Tana Toraja',27),
  (389,'2720','Toraja Utara',27),
  (390,'2721','Wajo',27),
  (391,'2722','Kota Makassar',27),
  (392,'2723','Kota Palopo',27),
  (393,'2724','Kota Parepare',27),
  (394,'2801','Banggai',28),
  (395,'2802','Banggai Kepulauan',28),
  (396,'2803','Buol',28),
  (397,'2804','Donggala',28),
  (398,'2805','Morowali',28),
  (399,'2806','Parigi Moutong',28),
  (400,'2807','Poso',28),
  (401,'2808','Tojo Una-Una',28),
  (402,'2809','Toli-Toli',28),
  (403,'2810','Sigi',28),
  (404,'2811','Kota Palu',28),
  (405,'2901','Bombana',29),
  (406,'2902','Buton',29),
  (407,'2903','Buton Utara',29),
  (408,'2904','Kolaka',29),
  (409,'2905','Kolaka Timur',29),
  (410,'2906','Kolaka Utara',29),
  (411,'2907','Konawe',29),
  (412,'2908','Konawe Selatan',29),
  (413,'2909','Konawe Utara',29),
  (414,'2910','Muna',29),
  (415,'2911','Wakatobi',29),
  (416,'2912','Kota Bau-Bau',29),
  (417,'2913','Kota Kendari',29),
  (418,'3001','Bolaang Mongondow',30),
  (419,'3002','Bolaang Mongondow Selatan',30),
  (420,'3003','Bolaang Mongondow Timur',30),
  (421,'3004','Bolaang Mongondow Utara',30),
  (422,'3005','Kepulauan Sangihe',30),
  (423,'3006','Kepulauan Siau Tagulandang Biaro',30),
  (424,'3007','Kepulauan Talaud',30),
  (425,'3008','Minahasa',30),
  (426,'3009','Minahasa Selatan',30),
  (427,'3010','Minahasa Tenggara',30),
  (428,'3011','Minahasa Utara',30),
  (429,'3012','Kota Bitung',30),
  (430,'3013','Kota Kotamobagu',30),
  (431,'3014','Kota Manado',30),
  (432,'3015','Kota Tomohon',30),
  (433,'3101','Agam',31),
  (434,'3102','Dharmasraya',31),
  (435,'3103','Kepulauan Mentawai',31),
  (436,'3104','Lima Puluh Kota',31),
  (437,'3105','Padang Pariaman',31),
  (438,'3106','Pasaman',31),
  (439,'3107','Pasaman Barat',31),
  (440,'3108','Pesisir Selatan',31),
  (441,'3109','Sijunjung',31),
  (442,'3110','Solok',31),
  (443,'3111','Solok Selatan',31),
  (444,'3112','Tanah Datar',31),
  (445,'3113','Kota Bukittinggi',31),
  (446,'3114','Kota Padang',31),
  (447,'3115','Kota Padangpanjang',31),
  (448,'3116','Kota Pariaman',31),
  (449,'3117','Kota Payakumbuh',31),
  (450,'3118','Kota Sawahlunto',31),
  (451,'3119','Kota Solok',31),
  (452,'3201','Banyuasin',32),
  (453,'3202','Empat Lawang',32),
  (454,'3203','Lahat',32),
  (455,'3204','Muara Enim',32),
  (456,'3205','Musi Banyuasin',32),
  (457,'3206','Musi Rawas',32),
  (458,'3207','Ogan Ilir',32),
  (459,'3208','Ogan Komering Ilir',32),
  (460,'3209','Ogan Komering Ulu',32),
  (461,'3210','Ogan Komering Ulu Selatan',32),
  (462,'3211','Penukal Abab Lematang Ilir',32),
  (463,'3212','Ogan Komering Ulu Timur',32),
  (464,'3213','Kota Lubuklinggau',32),
  (465,'3214','Kota Pagar Alam',32),
  (466,'3215','Kota Palembang',32),
  (467,'3216','Kota Prabumulih',32),
  (468,'3301','Asahan',33),
  (469,'3302','Batubara',33),
  (470,'3303','Dairi',33),
  (471,'3304','Deli Serdang',33),
  (472,'3305','Humbang Hasundutan',33),
  (473,'3306','Karo',33),
  (474,'3307','Labuhanbatu',33),
  (475,'3308','Labuhanbatu Selatan',33),
  (476,'3309','Labuhanbatu Utara',33),
  (477,'3310','Langkat',33),
  (478,'3311','Mandailing Natal',33),
  (479,'3312','Nias',33),
  (480,'3313','Nias Barat',33),
  (481,'3314','Nias Selatan',33),
  (482,'3315','Nias Utara',33),
  (483,'3316','Padang Lawas',33),
  (484,'3317','Padang Lawas Utara',33),
  (485,'3318','Pakpak Bharat',33),
  (486,'3319','Samosir',33),
  (487,'3320','Serdang Bedagai',33),
  (488,'3321','Simalungun',33),
  (489,'3322','Tapanuli Selatan',33),
  (490,'3323','Tapanuli Tengah',33),
  (491,'3324','Tapanuli Utara',33),
  (492,'3325','Toba Samosir',33),
  (493,'3326','Kota Binjai',33),
  (494,'3327','Kota Gunungsitoli',33),
  (495,'3328','Kota Medan',33),
  (496,'3329','Kota Padangsidempuan',33),
  (497,'3330','Kota Pematangsiantar',33),
  (498,'3331','Kota Sibolga',33),
  (499,'3332','Kota Tanjungbalai',33),
  (500,'3333','Kota Tebing Tinggi',33);
COMMIT;

#
# Data for the `kabupaten` table  (LIMIT 500,500)
#

INSERT INTO `kabupaten` (`idx`, `kode_kabupaten`, `kabupaten`, `idprovinsi`) VALUES 
  (501,'3401','Bantul',35),
  (502,'3402','Gunung Kidul',35),
  (503,'3403','Kulon Progo',35),
  (504,'3404','Sleman',35),
  (505,'3405','Kota Yogyakarta',35);
COMMIT;

#
# Data for the `kategori` table  (LIMIT 0,500)
#

INSERT INTO `kategori` (`idx`, `kategori`, `idparent`, `deskripsi`, `image`, `idbahasa`, `slug`) VALUES 
  (1,'Living room',0,'','',NULL,NULL),
  (2,'Handycraft',1,'','',NULL,NULL),
  (3,'Meja',1,'','jemuran.jpg',NULL,NULL),
  (4,'Sandal',2,'A','',NULL,NULL);
COMMIT;

#
# Data for the `kecamatan` table  (LIMIT 0,500)
#

INSERT INTO `kecamatan` (`idx`, `kode_kecamatan`, `kecamatan`, `idkabupaten`, `idkota`) VALUES 
  (1,'aa','banguntapan',3401,0),
  (2,NULL,'mergangsan',NULL,NULL),
  (3,NULL,'piyungan',3401,NULL),
  (4,'777','mergangsan',0,57);
COMMIT;

#
# Data for the `kelurahan` table  (LIMIT 0,500)
#

INSERT INTO `kelurahan` (`idx`, `kode_kelurahan`, `idkecamatan`, `kelurahan`) VALUES 
  (1,'3',1,'wonocatur'),
  (2,'999',4,'wirogunan');
COMMIT;

#
# Data for the `komponen` table  (LIMIT 0,500)
#

INSERT INTO `komponen` (`idkomponen`, `NmKomponen`, `isshow`) VALUES 
  (1,'Menu View','T'),
  (2,'Menu Admin','T');
COMMIT;

#
# Data for the `kota` table  (LIMIT 0,500)
#

INSERT INTO `kota` (`idx`, `kode_kota`, `kota`, `idprovinsi`) VALUES 
  (1,'0','Kampung Kekatung',NULL),
  (2,'0','Tungkaran Pangeran',NULL),
  (3,'0','Pingaran',NULL),
  (4,'0','Tanah Grogot',NULL),
  (5,'0','Tanah Bumbu',NULL),
  (6,'0','Batulicin',NULL),
  (8,'0','Simpang Empat',NULL),
  (10,'0','Barabai',NULL),
  (12,'0','Martapura',NULL),
  (13,'0','Kotabaru',NULL),
  (14,'0','Panda Sari',NULL),
  (16,'0','Banyuwangi',NULL),
  (18,'0','Pagatan',NULL),
  (19,'0','Banjarmasin',NULL),
  (26,'0','Kersik Putih',NULL),
  (28,'0','Balikpapan',NULL),
  (32,'0','Manunggal',NULL),
  (33,'0','Karang Bintang',NULL),
  (34,'0','Sarimulya',NULL),
  (35,'0','Seruyan',NULL),
  (38,'0','Pematang Ulin',NULL),
  (43,'0','Amuntai',NULL),
  (45,'0','Plowali Mandar',NULL),
  (46,'0','Mantawakan Mulya',NULL),
  (48,'0','Pallameang',NULL),
  (49,'0','Mallandroe',NULL),
  (51,'0','Lokbuntar',NULL),
  (57,'888','Kota Yogyakarta','35');
COMMIT;

#
# Data for the `logdelrecord` table  (LIMIT 0,500)
#

INSERT INTO `logdelrecord` (`idx`, `idxhapus`, `keterangan`, `nmtable`, `tgllog`, `ideksekusi`) VALUES 
  (20,'1',NULL,'page','2018-02-02 23:02:09',1),
  (21,'2',NULL,'page','2018-02-02 23:07:16',1),
  (22,'4',NULL,'page','2018-02-03 06:59:07',1),
  (23,'1',NULL,'event','2018-02-03 08:02:49',1),
  (24,'2',NULL,'event','2018-02-03 09:44:08',1),
  (25,'1',NULL,'event','2018-03-10 22:03:02',1),
  (26,'2',NULL,'event','2018-03-14 22:23:05',1),
  (27,'3',NULL,'event','2018-03-14 22:23:27',1),
  (28,'4',NULL,'artist','2018-03-14 23:17:55',1),
  (29,'5',NULL,'artist','2018-03-14 23:18:44',1),
  (30,'3',NULL,'artist','2018-03-14 23:22:02',1),
  (31,'2',NULL,'artist','2018-03-14 23:23:23',1),
  (32,'6',NULL,'event','2018-03-14 23:38:26',1),
  (33,'2',NULL,'event_artist','2018-03-17 00:35:14',1),
  (34,'2',NULL,'event_artist','2018-03-17 00:40:21',1),
  (35,'2',NULL,'event_artist','2018-03-17 00:43:17',1),
  (36,'2',NULL,'event_artist','2018-03-17 00:45:03',1),
  (37,'2',NULL,'event_artist','2018-03-17 00:48:50',1),
  (38,'2',NULL,'event_artist','2018-03-17 00:49:52',1),
  (39,'2',NULL,'event_artist','2018-03-17 00:50:28',1),
  (40,'2',NULL,'event_artist','2018-03-17 00:50:51',1),
  (41,'1',NULL,'event_artist','2018-03-17 00:51:27',1),
  (42,'1',NULL,'event_artist','2018-03-17 00:52:27',1),
  (43,'3',NULL,'event_artist','2018-03-17 01:09:51',1),
  (44,'2',NULL,'event_artist','2018-03-17 01:10:17',1),
  (45,'5',NULL,'event','2018-03-17 01:12:33',1),
  (46,'5',NULL,'event_artist','2018-03-17 01:12:33',1),
  (47,'3',NULL,'thread_event','2018-03-17 20:25:14',1),
  (48,'3',NULL,'thread_event','2018-03-17 20:27:33',1),
  (49,'3',NULL,'thread_event','2018-03-17 20:30:22',1);
COMMIT;

#
# Data for the `menu` table  (LIMIT 0,500)
#

INSERT INTO `menu` (`idmenu`, `nmmenu`, `tipemenu`, `idkomponen`, `iduser`, `parentmenu`, `urlci`, `urut`, `jmlgambar`, `settingform`, `idaplikasi`, `isumum`) VALUES 
  (2,'Setting Admin Menu ',1,2,0,34,'ctrmenu',1,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',1,'Y'),
  (6,'LOGOUT',1,2,0,0,'webadmindo/logout',21,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',1,'Y'),
  (34,'User Manager',1,2,1,0,'#',4,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',1,'Y'),
  (35,'User Access',1,2,0,34,'ctrusermenu',2,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',1,'Y'),
  (36,'User Group',1,2,0,34,'ctrusergroup',3,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',1,'Y'),
  (322,'User',1,2,0,34,'ctrusersistem',0,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (326,'Setting',1,2,0,0,'#',10,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (328,'Image Manager',2,2,0,326,'ctrimagemanager',2,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (330,'List Event',2,2,0,329,'ctrevent',0,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (331,'Category Event',2,2,0,329,'ctrcategoryevent',2,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (333,'List About',2,2,0,332,'ctrpage',3,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (334,'Category',2,2,0,332,'ctrkategori',0,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (337,'List Artist',2,2,0,329,'ctrartist',1,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (340,'Produk',1,2,0,0,'product_crud',0,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (341,'Tipe Produk',1,2,0,0,'product_type',0,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (342,'Inspirasi',1,2,0,0,'ctrinspirasi',0,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (343,'Post',1,2,0,0,'ctrpostcontent',0,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (344,'Brosolin',1,2,0,0,'ctrbrosolin',0,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (345,'Subscriber',1,2,0,0,'ctrsubscriber',0,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N'),
  (346,'Depo',1,2,0,0,'ctrdepo',0,0,'xbahasa:Bahasa,;xjudul:Judul,;xisi:Isi / Keterangan,kontent;xisiawal:Isi Awal,Isikan Jika Diperlukan;xurut:urutan,urutan saat ditampilkan diweb;xgb1:,Upload Gambar 1;xgb2:,Upload Gambar 2;xgb3:,Upload Gambar 3;',NULL,'N');
COMMIT;

#
# Data for the `metatag` table  (LIMIT 0,500)
#

INSERT INTO `metatag` (`idx`, `metakey`, `value`, `idcontent`) VALUES 
  (1,NULL,'sewage',NULL),
  (2,NULL,'testt',NULL);
COMMIT;

#
# Data for the `page` table  (LIMIT 0,500)
#

INSERT INTO `page` (`idx`, `title`, `description`, `date`, `image`, `istampil`, `keyword`, `idmetatag`, `idkategoripage`, `idbahasa`, `idimage`, `update`, `iduser`) VALUES 
  (3,'sdfsd','<p>sdfsd</p>','2018-02-06','image1 (1).jpg','N','dfsd,fghfg',0,0,2,0,'2018-02-03 07:11:44',1);
COMMIT;

#
# Data for the `provinsi` table  (LIMIT 0,500)
#

INSERT INTO `provinsi` (`idx`, `kode_provinsi`, `provinsi`) VALUES 
  (2,'01','Aceh'),
  (3,'02','Bali'),
  (4,'03','Banten'),
  (5,'04','Bengkulu'),
  (6,'05','Gorontalo'),
  (7,'06','DKI Jakarta'),
  (8,'07','Jambi'),
  (9,'08','Jawa Barat'),
  (10,'09','Jawa Tengah'),
  (11,'10','Jawa Timur'),
  (12,'11','Kalimantan Barat'),
  (13,'12','Kalimantan Selatan'),
  (14,'13','Kalimantan Tengah'),
  (15,'14','Kalimantan Timur'),
  (16,'15','Kalimantan Utara'),
  (17,'16','Kepulauan Bangka Belitung'),
  (18,'17','Kepulauan Riau'),
  (19,'18','Lampung'),
  (20,'19','Maluku'),
  (21,'20','Maluku Utara'),
  (22,'21','Nusa Tenggara Barat'),
  (23,'22','Nusa Tenggara Timur'),
  (24,'23','Papua'),
  (25,'24','Papua Barat'),
  (26,'25','Riau'),
  (27,'26','Sulawesi Barat'),
  (28,'27','Sulawesi Selatan'),
  (29,'28','Sulawesi Tengah'),
  (30,'29','Sulawesi Tenggara'),
  (31,'30','Sulawesi Utara'),
  (32,'31','Sumatera Barat'),
  (33,'32','Sumatera Selatan'),
  (34,'33','Sumatera Utara'),
  (35,'35','DI Yogyakarta');
COMMIT;

#
# Data for the `thread` table  (LIMIT 0,500)
#

INSERT INTO `thread` (`idx`, `title_ind`, `title_eng`, `content_ind`, `content_eng`, `tanggal`) VALUES 
  (1,'Thread 1','Thread eng 1','<p>Isi 1</p>','<p>Isi Eng 1</p>','2018-03-17'),
  (2,'Jd indo 2','Title 2','<p>isi indo 2</p>','<p>Content 2</p>','2018-03-18'),
  (3,'A','B','<p>A</p>','<p>B</p>','2018-03-19'),
  (6,'D','D','<p>D</p>','<p>D</p>','2018-03-06');
COMMIT;

#
# Data for the `thread_event` table  (LIMIT 0,500)
#

INSERT INTO `thread_event` (`idx`, `thread_id`, `event_id`) VALUES 
  (1,1,1),
  (2,1,2),
  (3,1,3),
  (4,1,4),
  (5,1,6),
  (6,1,7),
  (7,2,4),
  (8,2,6),
  (9,2,7),
  (19,3,4),
  (20,3,6),
  (21,3,7),
  (22,6,2);
COMMIT;

#
# Data for the `tipemenu` table  (LIMIT 0,500)
#

INSERT INTO `tipemenu` (`idTipeMenu`, `NmTipeMenu`) VALUES 
  ('1','Singgle'),
  ('2','Berbentuk Daftar');
COMMIT;

#
# Data for the `usergroup` table  (LIMIT 0,500)
#

INSERT INTO `usergroup` (`idx`, `NmUserGroup`) VALUES 
  (1,'All Admin'),
  (2,'Admin'),
  (3,'Marketing');
COMMIT;

#
# Data for the `usermenu` table  (LIMIT 0,500)
#

INSERT INTO `usermenu` (`idx`, `iduser`, `idmenu`, `idaplikasi`) VALUES 
  (7301,0,36,NULL),
  (7337,2,317,NULL),
  (7338,2,316,NULL),
  (7339,2,312,NULL),
  (7340,2,318,NULL),
  (7341,2,6,NULL),
  (7401,1,334,NULL),
  (7402,1,322,NULL),
  (7403,1,330,NULL),
  (7404,1,335,NULL),
  (7405,1,2,NULL),
  (7406,1,327,NULL),
  (7407,1,35,NULL),
  (7408,1,331,NULL),
  (7409,1,328,NULL),
  (7410,1,329,NULL),
  (7411,1,34,NULL),
  (7412,1,36,NULL),
  (7413,1,333,NULL),
  (7414,1,332,NULL),
  (7415,1,325,NULL),
  (7416,1,326,NULL),
  (7417,1,337,NULL),
  (7418,1,6,NULL);
COMMIT;

#
# Data for the `usersistem` table  (LIMIT 0,500)
#

INSERT INTO `usersistem` (`idx`, `npp`, `Nama`, `alamat`, `NoTelpon`, `user`, `password`, `statuspeg`, `photo`, `email`, `ym`, `isaktif`, `idusergroup`, `idkabupaten`, `idpropinsi`, `imehp`) VALUES 
  (1,'undefined','User Demo','0','0274747474','demo','demo',0,'undefined','','','',1,173,12,'860205025197033'),
  (2,'undefined','pengguna lain','0','04532','test','test',0,'undefined','','','',2,3402,35,'');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;