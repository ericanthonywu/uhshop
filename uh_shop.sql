/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.0
Source Server Version : 100137
Source Host           : localhost:3306
Source Database       : uh_shop

Target Server Type    : MYSQL
Target Server Version : 100137
File Encoding         : 65001

Date: 2019-01-22 21:07:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for buy
-- ----------------------------
DROP TABLE IF EXISTS `buy`;
CREATE TABLE `buy` (
  `buy_id` int(11) NOT NULL AUTO_INCREMENT,
  `buy_invoice` char(15) NOT NULL,
  `buy_date` date NOT NULL,
  `buy_supplier` char(15) NOT NULL,
  `buy_total_price` char(20) NOT NULL,
  PRIMARY KEY (`buy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of buy
-- ----------------------------

-- ----------------------------
-- Table structure for buy_detail
-- ----------------------------
DROP TABLE IF EXISTS `buy_detail`;
CREATE TABLE `buy_detail` (
  `buy_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `buy_invoice` char(15) NOT NULL,
  `buy_item` char(15) NOT NULL,
  `buy_price` char(20) NOT NULL,
  `buy_quantity` char(20) NOT NULL,
  PRIMARY KEY (`buy_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of buy_detail
-- ----------------------------

-- ----------------------------
-- Table structure for company
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `company_address` text NOT NULL,
  `company_phone` char(15) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `company_email` varchar(150) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('1', 'PT. BB', 'ENDONESA', '0', 'logo.jpeg', 'uh@shop.com');

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` int(11) DEFAULT NULL,
  `pesan` text,
  `created_by` varchar(25) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contact
-- ----------------------------

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_code` char(20) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_phone` char(15) NOT NULL,
  `customer_username` varchar(20) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_password` varchar(100) DEFAULT NULL,
  `customer_verify` char(1) DEFAULT NULL,
  `customer_image` varchar(255) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'PELANGGAN-0001', 'Rizky Ramadhan', '', '081802281628', 'ekyjoesmith', 'ekyjoesmith@gmail.com', 'bU8wcUdPaXlCMHQ5cnNWSEV6MmRtZz09', '1', 'logo.jpeg', '2019-01-19');

-- ----------------------------
-- Table structure for how_to_order
-- ----------------------------
DROP TABLE IF EXISTS `how_to_order`;
CREATE TABLE `how_to_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of how_to_order
-- ----------------------------

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` char(20) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_category` int(11) NOT NULL,
  `item_price` char(20) NOT NULL,
  `item_stock` char(6) NOT NULL,
  `item_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------

-- ----------------------------
-- Table structure for item_type
-- ----------------------------
DROP TABLE IF EXISTS `item_type`;
CREATE TABLE `item_type` (
  `item_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(100) NOT NULL,
  PRIMARY KEY (`item_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item_type
-- ----------------------------

-- ----------------------------
-- Table structure for keranjang
-- ----------------------------
DROP TABLE IF EXISTS `keranjang`;
CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(15) DEFAULT NULL,
  `produk` char(20) DEFAULT NULL,
  `st` char(1) DEFAULT NULL,
  `verify` char(20) DEFAULT NULL,
  `created_by` char(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of keranjang
-- ----------------------------

-- ----------------------------
-- Table structure for konten
-- ----------------------------
DROP TABLE IF EXISTS `konten`;
CREATE TABLE `konten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(20) DEFAULT NULL,
  `halaman` char(20) DEFAULT NULL,
  `konten` text,
  `created_by` char(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of konten
-- ----------------------------

-- ----------------------------
-- Table structure for kota
-- ----------------------------
DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota` (
  `kode_kota` int(4) NOT NULL,
  `nama_kota` varchar(200) NOT NULL,
  PRIMARY KEY (`kode_kota`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kota
-- ----------------------------
INSERT INTO `kota` VALUES ('1101', 'Aceh Selatan');
INSERT INTO `kota` VALUES ('1102', 'Aceh Tenggara');
INSERT INTO `kota` VALUES ('1103', 'Aceh Timur');
INSERT INTO `kota` VALUES ('1104', 'Aceh Tengah');
INSERT INTO `kota` VALUES ('1105', 'Aceh Barat');
INSERT INTO `kota` VALUES ('1106', 'Aceh Besar');
INSERT INTO `kota` VALUES ('1107', 'Pidie');
INSERT INTO `kota` VALUES ('1108', 'Aceh Utara');
INSERT INTO `kota` VALUES ('1109', 'Simeulue');
INSERT INTO `kota` VALUES ('1110', 'Aceh Singkil');
INSERT INTO `kota` VALUES ('1111', 'Aceh Tamiang');
INSERT INTO `kota` VALUES ('1112', 'Gayo Lues');
INSERT INTO `kota` VALUES ('1113', 'Bireuen');
INSERT INTO `kota` VALUES ('1114', 'Aceh Jaya');
INSERT INTO `kota` VALUES ('1115', 'Nagan Raya');
INSERT INTO `kota` VALUES ('1116', 'Aceh Barat Daya');
INSERT INTO `kota` VALUES ('1171', 'Kota Banda Aceh');
INSERT INTO `kota` VALUES ('1172', 'Kota Sabang');
INSERT INTO `kota` VALUES ('1173', 'Kota Langsa');
INSERT INTO `kota` VALUES ('1201', 'Nias');
INSERT INTO `kota` VALUES ('1202', 'Mandailing Natal');
INSERT INTO `kota` VALUES ('1203', 'Tap.Selatan');
INSERT INTO `kota` VALUES ('1204', 'Tap.Tengah');
INSERT INTO `kota` VALUES ('1205', 'Labuhan Batu');
INSERT INTO `kota` VALUES ('1206', 'Asahan');
INSERT INTO `kota` VALUES ('1207', 'Kab. Simalungun');
INSERT INTO `kota` VALUES ('1208', 'Kab. Dairi');
INSERT INTO `kota` VALUES ('1209', 'Kab. Karo');
INSERT INTO `kota` VALUES ('1210', 'Deli Serdang');
INSERT INTO `kota` VALUES ('1211', 'Langkat');
INSERT INTO `kota` VALUES ('1215', 'Toba Samosir');
INSERT INTO `kota` VALUES ('1216', 'Tap.Utara');
INSERT INTO `kota` VALUES ('1271', 'Kodya Sibolga');
INSERT INTO `kota` VALUES ('1272', 'Kota Tanjung Balai');
INSERT INTO `kota` VALUES ('1273', 'Kota Pematang Siantar');
INSERT INTO `kota` VALUES ('1274', 'Tebing Tinggi');
INSERT INTO `kota` VALUES ('1275', 'Kota Medan');
INSERT INTO `kota` VALUES ('1276', 'Binjai');
INSERT INTO `kota` VALUES ('1278', 'Kota Padangsidimpuan');
INSERT INTO `kota` VALUES ('1301', 'Kab. Pesisir Selatan');
INSERT INTO `kota` VALUES ('1302', 'Kabupaten Solok');
INSERT INTO `kota` VALUES ('1303', 'Kab Swl/Sijunjung');
INSERT INTO `kota` VALUES ('1304', 'Kab Tanah Datar');
INSERT INTO `kota` VALUES ('1305', 'Kab. Padang Pariaman');
INSERT INTO `kota` VALUES ('1306', 'Agam');
INSERT INTO `kota` VALUES ('1307', 'Lima Puluh Kota');
INSERT INTO `kota` VALUES ('1308', 'Pasaman');
INSERT INTO `kota` VALUES ('1309', 'Kab. Kepulauan Mentawai');
INSERT INTO `kota` VALUES ('1371', 'Kota Padang');
INSERT INTO `kota` VALUES ('1372', 'Kodya Solok');
INSERT INTO `kota` VALUES ('1373', 'Kotamadya Sawahlunto');
INSERT INTO `kota` VALUES ('1374', 'Kota Padang Panjang');
INSERT INTO `kota` VALUES ('1375', 'Bukit Tinggi');
INSERT INTO `kota` VALUES ('1376', 'Payakumbuh');
INSERT INTO `kota` VALUES ('1377', 'Kota Pariaman');
INSERT INTO `kota` VALUES ('1401', 'Indragiri Hulu');
INSERT INTO `kota` VALUES ('1402', 'Indragiri Hilir');
INSERT INTO `kota` VALUES ('1403', 'Kepulauan Riau');
INSERT INTO `kota` VALUES ('1404', 'Pelalawan');
INSERT INTO `kota` VALUES ('1405', 'Siak');
INSERT INTO `kota` VALUES ('1406', 'Kampar');
INSERT INTO `kota` VALUES ('1407', 'Rokan Hulu');
INSERT INTO `kota` VALUES ('1408', 'Bengkalis');
INSERT INTO `kota` VALUES ('1409', 'Rokan Hilir');
INSERT INTO `kota` VALUES ('1410', 'Karimun');
INSERT INTO `kota` VALUES ('1411', 'Natuna');
INSERT INTO `kota` VALUES ('1412', 'Kuantan Singingi');
INSERT INTO `kota` VALUES ('1471', 'Pekanbaru');
INSERT INTO `kota` VALUES ('1473', 'Kota Batam');
INSERT INTO `kota` VALUES ('1474', 'Tanjungpinang');
INSERT INTO `kota` VALUES ('1475', 'Dumai');
INSERT INTO `kota` VALUES ('1501', 'Kerinci');
INSERT INTO `kota` VALUES ('1502', 'Merangin');
INSERT INTO `kota` VALUES ('1503', 'Sarolangun');
INSERT INTO `kota` VALUES ('1504', 'Kab. Batanghari');
INSERT INTO `kota` VALUES ('1505', 'Kab. Muaro Jambi');
INSERT INTO `kota` VALUES ('1506', 'Kab. Tanjung Jabung Timur');
INSERT INTO `kota` VALUES ('1507', 'Kab. Tanjung Jabung Barat');
INSERT INTO `kota` VALUES ('1508', 'Tebo');
INSERT INTO `kota` VALUES ('1509', 'Bungo');
INSERT INTO `kota` VALUES ('1571', 'Kota Jambi');
INSERT INTO `kota` VALUES ('1601', 'Ogan Kom. Ulu');
INSERT INTO `kota` VALUES ('1602', 'Ogan Komering Ilir');
INSERT INTO `kota` VALUES ('1603', 'Muara Enim');
INSERT INTO `kota` VALUES ('1604', 'Lahat');
INSERT INTO `kota` VALUES ('1605', 'Musi Rawas');
INSERT INTO `kota` VALUES ('1606', 'Musi Banyuasin');
INSERT INTO `kota` VALUES ('1607', 'Banyuasin');
INSERT INTO `kota` VALUES ('1671', 'Palembang');
INSERT INTO `kota` VALUES ('1674', 'Kota Prabumulih');
INSERT INTO `kota` VALUES ('1675', 'Pagar Alam');
INSERT INTO `kota` VALUES ('1676', 'Lubuk Linggau');
INSERT INTO `kota` VALUES ('1701', 'Bengkulu Selatan');
INSERT INTO `kota` VALUES ('1702', 'Rejang Lebong');
INSERT INTO `kota` VALUES ('1703', 'Bengkulu Utara');
INSERT INTO `kota` VALUES ('1771', 'Kota Bengkulu');
INSERT INTO `kota` VALUES ('1801', 'Lampung Selatan');
INSERT INTO `kota` VALUES ('1802', 'Lampung Tengah');
INSERT INTO `kota` VALUES ('1803', 'Lampung Utara');
INSERT INTO `kota` VALUES ('1804', 'Lampung Barat');
INSERT INTO `kota` VALUES ('1805', 'Tulang Bawang');
INSERT INTO `kota` VALUES ('1806', 'Tanggamus');
INSERT INTO `kota` VALUES ('1808', 'Way Kanan');
INSERT INTO `kota` VALUES ('1810', 'Lampung Timur');
INSERT INTO `kota` VALUES ('1811', 'Lampung Tengah');
INSERT INTO `kota` VALUES ('1871', 'Bandar Lampung');
INSERT INTO `kota` VALUES ('1872', 'Metro');
INSERT INTO `kota` VALUES ('1879', 'Metro II');
INSERT INTO `kota` VALUES ('1901', 'Bangka');
INSERT INTO `kota` VALUES ('1902', 'Belitung');
INSERT INTO `kota` VALUES ('1903', 'Bangka Barat');
INSERT INTO `kota` VALUES ('1904', 'Bangka Tengah');
INSERT INTO `kota` VALUES ('1905', 'Bangka Selatan');
INSERT INTO `kota` VALUES ('1906', 'Belitung Timur');
INSERT INTO `kota` VALUES ('1971', 'Pangkalpinang');
INSERT INTO `kota` VALUES ('3171', 'Jakarta Selatan');
INSERT INTO `kota` VALUES ('3172', 'Jakarta Timur');
INSERT INTO `kota` VALUES ('3173', 'Jakarta Pusat');
INSERT INTO `kota` VALUES ('3174', 'Jakarta Barat');
INSERT INTO `kota` VALUES ('3175', 'Jakarta Utara');
INSERT INTO `kota` VALUES ('3176', 'Kepulauan Seribu');
INSERT INTO `kota` VALUES ('3203', 'Bogor');
INSERT INTO `kota` VALUES ('3204', 'Sukabumi');
INSERT INTO `kota` VALUES ('3205', 'Cianjur');
INSERT INTO `kota` VALUES ('3206', 'Kabupaten Bandung');
INSERT INTO `kota` VALUES ('3207', 'Garut');
INSERT INTO `kota` VALUES ('3208', 'Tasikmalaya');
INSERT INTO `kota` VALUES ('3209', 'Ciamis');
INSERT INTO `kota` VALUES ('3210', 'Kuningan');
INSERT INTO `kota` VALUES ('3211', 'Kabupaten Cirebon');
INSERT INTO `kota` VALUES ('3212', 'Majalengka');
INSERT INTO `kota` VALUES ('3213', 'Sumedang');
INSERT INTO `kota` VALUES ('3214', 'Kabupaten Indramayu');
INSERT INTO `kota` VALUES ('3215', 'Subang');
INSERT INTO `kota` VALUES ('3216', 'Purwakarta');
INSERT INTO `kota` VALUES ('3217', 'Karawang');
INSERT INTO `kota` VALUES ('3218', 'Bekasi');
INSERT INTO `kota` VALUES ('3220', 'Karawang (Data Lama)');
INSERT INTO `kota` VALUES ('3271', 'Kota Bogor');
INSERT INTO `kota` VALUES ('3272', 'Kota Sukabumi');
INSERT INTO `kota` VALUES ('3273', 'Kota Bandung');
INSERT INTO `kota` VALUES ('3274', 'Kota Cirebon');
INSERT INTO `kota` VALUES ('3275', 'Kota Bekasi');
INSERT INTO `kota` VALUES ('3276', 'Kodya Bekasi');
INSERT INTO `kota` VALUES ('3277', 'Kota Depok');
INSERT INTO `kota` VALUES ('3278', 'Cilegon');
INSERT INTO `kota` VALUES ('3279', 'Banjar');
INSERT INTO `kota` VALUES ('3280', 'Kota Cimahi');
INSERT INTO `kota` VALUES ('3301', 'Cilacap');
INSERT INTO `kota` VALUES ('3302', 'Banyumas');
INSERT INTO `kota` VALUES ('3303', 'Purbalingga');
INSERT INTO `kota` VALUES ('3304', 'Banjarnegara');
INSERT INTO `kota` VALUES ('3305', 'Kebumen');
INSERT INTO `kota` VALUES ('3306', 'Purworejo');
INSERT INTO `kota` VALUES ('3307', 'Wonosobo');
INSERT INTO `kota` VALUES ('3308', 'Kabupaten Magelang');
INSERT INTO `kota` VALUES ('3309', 'Boyolali');
INSERT INTO `kota` VALUES ('3310', 'Klaten');
INSERT INTO `kota` VALUES ('3311', 'Sukoharjo');
INSERT INTO `kota` VALUES ('3312', 'Wonogiri');
INSERT INTO `kota` VALUES ('3313', 'Karanganyar');
INSERT INTO `kota` VALUES ('3314', 'Sragen');
INSERT INTO `kota` VALUES ('3315', 'Grobogan');
INSERT INTO `kota` VALUES ('3316', 'Blora');
INSERT INTO `kota` VALUES ('3317', 'Rembang');
INSERT INTO `kota` VALUES ('3318', 'Pati');
INSERT INTO `kota` VALUES ('3319', 'Kudus');
INSERT INTO `kota` VALUES ('3320', 'Jepara');
INSERT INTO `kota` VALUES ('3321', 'Demak');
INSERT INTO `kota` VALUES ('3322', 'Semarang');
INSERT INTO `kota` VALUES ('3323', 'Temanggung');
INSERT INTO `kota` VALUES ('3324', 'Kab.Kendal');
INSERT INTO `kota` VALUES ('3325', 'Batang');
INSERT INTO `kota` VALUES ('3326', 'Pekalongan');
INSERT INTO `kota` VALUES ('3327', 'Pemalang');
INSERT INTO `kota` VALUES ('3328', 'Kab Tegal');
INSERT INTO `kota` VALUES ('3329', 'Kab Brebes');
INSERT INTO `kota` VALUES ('3371', 'Kota Magelang');
INSERT INTO `kota` VALUES ('3372', 'Surakarta');
INSERT INTO `kota` VALUES ('3373', 'Kota Salatiga');
INSERT INTO `kota` VALUES ('3375', 'Kota Pekalongan');
INSERT INTO `kota` VALUES ('3376', 'Kota Tegal');
INSERT INTO `kota` VALUES ('3401', 'Kulonprogo');
INSERT INTO `kota` VALUES ('3402', 'Bantul');
INSERT INTO `kota` VALUES ('3403', 'Gunungkidul');
INSERT INTO `kota` VALUES ('3404', 'Sleman');
INSERT INTO `kota` VALUES ('3471', 'Kota Jogjakarta');
INSERT INTO `kota` VALUES ('3501', 'Kab.Pacitan');
INSERT INTO `kota` VALUES ('3502', 'Kab.Ponorogo');
INSERT INTO `kota` VALUES ('3503', 'Trenggalek');
INSERT INTO `kota` VALUES ('3504', 'Tulungagung');
INSERT INTO `kota` VALUES ('3505', 'Blitar');
INSERT INTO `kota` VALUES ('3506', 'Kab. Kediri');
INSERT INTO `kota` VALUES ('3507', 'Kabupaten Malang');
INSERT INTO `kota` VALUES ('3508', 'Lumajang');
INSERT INTO `kota` VALUES ('3509', 'Jember');
INSERT INTO `kota` VALUES ('3510', 'Banyuwangi');
INSERT INTO `kota` VALUES ('3511', 'Bondowoso');
INSERT INTO `kota` VALUES ('3513', 'Kab. Probolinggo');
INSERT INTO `kota` VALUES ('3514', 'Kabupaten Pasuruan');
INSERT INTO `kota` VALUES ('3515', 'Sidoarjo');
INSERT INTO `kota` VALUES ('3516', 'Mojokerto');
INSERT INTO `kota` VALUES ('3517', 'Jombang');
INSERT INTO `kota` VALUES ('3518', 'Kab. Nganjuk');
INSERT INTO `kota` VALUES ('3519', 'Kab.Madiun');
INSERT INTO `kota` VALUES ('3520', 'Magetan');
INSERT INTO `kota` VALUES ('3521', 'Ngawi');
INSERT INTO `kota` VALUES ('3522', 'Bojonegoro');
INSERT INTO `kota` VALUES ('3523', 'Tuban');
INSERT INTO `kota` VALUES ('3524', 'Lamongan');
INSERT INTO `kota` VALUES ('3525', 'Gresik');
INSERT INTO `kota` VALUES ('3526', 'Bangkalan');
INSERT INTO `kota` VALUES ('3527', 'Sampang');
INSERT INTO `kota` VALUES ('3528', 'Pamekasan');
INSERT INTO `kota` VALUES ('3529', 'Sumenep');
INSERT INTO `kota` VALUES ('3571', 'Kota Kediri');
INSERT INTO `kota` VALUES ('3572', 'Kota Blitar');
INSERT INTO `kota` VALUES ('3573', 'Kota Malang');
INSERT INTO `kota` VALUES ('3574', 'Kodya Probolinggo');
INSERT INTO `kota` VALUES ('3575', 'Kodya Pasuruan');
INSERT INTO `kota` VALUES ('3576', 'Kodya Mojokerto');
INSERT INTO `kota` VALUES ('3577', 'Kota Madiun');
INSERT INTO `kota` VALUES ('3578', 'Surabaya');
INSERT INTO `kota` VALUES ('3579', 'Kota Batu');
INSERT INTO `kota` VALUES ('3601', 'Pandeglang');
INSERT INTO `kota` VALUES ('3602', 'Lebak');
INSERT INTO `kota` VALUES ('3604', 'Serang');
INSERT INTO `kota` VALUES ('3619', 'Kab. Tangerang');
INSERT INTO `kota` VALUES ('3672', 'Cilegon');
INSERT INTO `kota` VALUES ('3675', 'Kota Tangerang');
INSERT INTO `kota` VALUES ('5101', 'Jembrana');
INSERT INTO `kota` VALUES ('5102', 'Kab.Tabanan');
INSERT INTO `kota` VALUES ('5103', 'Kab.Badung');
INSERT INTO `kota` VALUES ('5104', 'Kab.Gianyar');
INSERT INTO `kota` VALUES ('5105', 'Kab.Klungkung');
INSERT INTO `kota` VALUES ('5106', 'Kab.Bangli');
INSERT INTO `kota` VALUES ('5107', 'Karangasem');
INSERT INTO `kota` VALUES ('5108', 'Buleleng');
INSERT INTO `kota` VALUES ('5171', 'Kodya Denpasar');
INSERT INTO `kota` VALUES ('5201', 'Lombok Barat');
INSERT INTO `kota` VALUES ('5202', 'Lombok Tengah');
INSERT INTO `kota` VALUES ('5203', 'Lombok Timur');
INSERT INTO `kota` VALUES ('5204', 'Sumbawa');
INSERT INTO `kota` VALUES ('5205', 'Dompu');
INSERT INTO `kota` VALUES ('5206', 'Bima');
INSERT INTO `kota` VALUES ('5271', 'Kota Mataram');
INSERT INTO `kota` VALUES ('5272', 'Kota Bima');
INSERT INTO `kota` VALUES ('5301', 'Sumba Barat');
INSERT INTO `kota` VALUES ('5302', 'Sumba Timur');
INSERT INTO `kota` VALUES ('5303', 'Kupang');
INSERT INTO `kota` VALUES ('5304', 'Timor Tengah Selatan');
INSERT INTO `kota` VALUES ('5305', 'Timor Tengah Utara');
INSERT INTO `kota` VALUES ('5306', 'Belu');
INSERT INTO `kota` VALUES ('5307', 'Alor');
INSERT INTO `kota` VALUES ('5308', 'Flores Timur');
INSERT INTO `kota` VALUES ('5309', 'Sikka');
INSERT INTO `kota` VALUES ('5310', 'Ende');
INSERT INTO `kota` VALUES ('5311', 'Ngada');
INSERT INTO `kota` VALUES ('5312', 'Manggarai');
INSERT INTO `kota` VALUES ('5313', 'Pelabuhan');
INSERT INTO `kota` VALUES ('5314', 'Lembata');
INSERT INTO `kota` VALUES ('5315', 'Rote Ndao');
INSERT INTO `kota` VALUES ('5371', 'Kota Kupang');
INSERT INTO `kota` VALUES ('6101', 'Sambas');
INSERT INTO `kota` VALUES ('6102', 'Kab. Pontianak');
INSERT INTO `kota` VALUES ('6103', 'Kab.Sanggau');
INSERT INTO `kota` VALUES ('6104', 'Kab. Ketapang');
INSERT INTO `kota` VALUES ('6105', 'Sintang');
INSERT INTO `kota` VALUES ('6106', 'Kapuas Hulu');
INSERT INTO `kota` VALUES ('6107', 'Bengkayang');
INSERT INTO `kota` VALUES ('6108', 'Kab. Landak');
INSERT INTO `kota` VALUES ('6171', 'Kota Pontianak');
INSERT INTO `kota` VALUES ('6172', 'Singkawang');
INSERT INTO `kota` VALUES ('6201', 'Kotawaringin Barat');
INSERT INTO `kota` VALUES ('6202', 'Kotawaringin Timur');
INSERT INTO `kota` VALUES ('6203', 'Kapuas');
INSERT INTO `kota` VALUES ('6204', 'Barito Selatan');
INSERT INTO `kota` VALUES ('6205', 'Barito Utara');
INSERT INTO `kota` VALUES ('6206', 'Buntok Bersatu');
INSERT INTO `kota` VALUES ('6207', 'Gunung Mas');
INSERT INTO `kota` VALUES ('6208', 'Lamandau');
INSERT INTO `kota` VALUES ('6209', 'Sukamara');
INSERT INTO `kota` VALUES ('6210', 'Seruyan');
INSERT INTO `kota` VALUES ('6211', 'Katingan');
INSERT INTO `kota` VALUES ('6212', 'Barito Timur');
INSERT INTO `kota` VALUES ('6213', 'Murung Raya');
INSERT INTO `kota` VALUES ('6271', 'Palangka Raya');
INSERT INTO `kota` VALUES ('6301', 'Tanah Laut');
INSERT INTO `kota` VALUES ('6302', 'Kota Baru');
INSERT INTO `kota` VALUES ('6303', 'Banjar');
INSERT INTO `kota` VALUES ('6304', 'Barito Kuala');
INSERT INTO `kota` VALUES ('6305', 'Tapin');
INSERT INTO `kota` VALUES ('6306', 'Hulu Sungai Selatan');
INSERT INTO `kota` VALUES ('6307', 'Hulu Sungai Tengah');
INSERT INTO `kota` VALUES ('6308', 'Hulu Sungai Utara');
INSERT INTO `kota` VALUES ('6309', 'Tabalong');
INSERT INTO `kota` VALUES ('6371', 'Kodya Banjarmasin');
INSERT INTO `kota` VALUES ('6372', 'Banjarbaru');
INSERT INTO `kota` VALUES ('6401', 'Pasir');
INSERT INTO `kota` VALUES ('6402', 'Kutai Kertanegara');
INSERT INTO `kota` VALUES ('6403', 'Berau');
INSERT INTO `kota` VALUES ('6404', 'Bulungan');
INSERT INTO `kota` VALUES ('6405', 'Kutai Barat');
INSERT INTO `kota` VALUES ('6406', 'Kutai Timur');
INSERT INTO `kota` VALUES ('6407', 'Malinau');
INSERT INTO `kota` VALUES ('6408', 'Nunukan');
INSERT INTO `kota` VALUES ('6409', 'Penajam Paser Utara');
INSERT INTO `kota` VALUES ('6471', 'Balikpapan');
INSERT INTO `kota` VALUES ('6472', 'Samarinda');
INSERT INTO `kota` VALUES ('6473', 'Tarakan');
INSERT INTO `kota` VALUES ('6474', 'Bontang');
INSERT INTO `kota` VALUES ('7102', 'Bolaang Mongondow');
INSERT INTO `kota` VALUES ('7103', 'Minahasa');
INSERT INTO `kota` VALUES ('7104', 'Sangihe Talaud');
INSERT INTO `kota` VALUES ('7141', 'Talaud');
INSERT INTO `kota` VALUES ('7172', 'Manado');
INSERT INTO `kota` VALUES ('7173', 'Kodya Bitung');
INSERT INTO `kota` VALUES ('7205', 'Donggala');
INSERT INTO `kota` VALUES ('7206', 'Toli Toli');
INSERT INTO `kota` VALUES ('7207', 'Buol');
INSERT INTO `kota` VALUES ('7208', 'Parigi Moutong');
INSERT INTO `kota` VALUES ('7271', 'Kota Palu');
INSERT INTO `kota` VALUES ('7301', 'Selayar');
INSERT INTO `kota` VALUES ('7302', 'Bulukumba');
INSERT INTO `kota` VALUES ('7303', 'Bantaeng');
INSERT INTO `kota` VALUES ('7304', 'Jeneponto');
INSERT INTO `kota` VALUES ('7305', 'Takalar');
INSERT INTO `kota` VALUES ('7306', 'Gowa');
INSERT INTO `kota` VALUES ('7307', 'Sinjai');
INSERT INTO `kota` VALUES ('7308', 'Maros');
INSERT INTO `kota` VALUES ('7309', 'Pangkep');
INSERT INTO `kota` VALUES ('7310', 'Barru');
INSERT INTO `kota` VALUES ('7311', 'Bone');
INSERT INTO `kota` VALUES ('7312', 'Soppeng');
INSERT INTO `kota` VALUES ('7313', 'Wajo');
INSERT INTO `kota` VALUES ('7314', 'Sidrap');
INSERT INTO `kota` VALUES ('7315', 'Pinrang');
INSERT INTO `kota` VALUES ('7316', 'Enrekang');
INSERT INTO `kota` VALUES ('7317', 'Luwu');
INSERT INTO `kota` VALUES ('7318', 'Tana Toraja');
INSERT INTO `kota` VALUES ('7322', 'Luwu Utara');
INSERT INTO `kota` VALUES ('7371', 'Makassar');
INSERT INTO `kota` VALUES ('7372', 'Parepare');
INSERT INTO `kota` VALUES ('7373', 'Palopo');

-- ----------------------------
-- Table structure for provinsi
-- ----------------------------
DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE `provinsi` (
  `no_provinsi` int(10) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  PRIMARY KEY (`no_provinsi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of provinsi
-- ----------------------------
INSERT INTO `provinsi` VALUES ('11', 'Nanggroe Aceh Darussalam', '4.698925', '96.759114');
INSERT INTO `provinsi` VALUES ('12', 'Sumatera Utara', '3.595143', '98.671445');
INSERT INTO `provinsi` VALUES ('13', 'Sumatera Barat', '-0.946348', '100.415976');
INSERT INTO `provinsi` VALUES ('14', 'Riau', '0.50763', '101.447614');
INSERT INTO `provinsi` VALUES ('15', 'Jambi', '-1.485225', '102.432916');
INSERT INTO `provinsi` VALUES ('16', 'Sumatera Selatan', '-3.316638', '103.890257');
INSERT INTO `provinsi` VALUES ('17', 'Bengkulu', '-3.575222', '102.341395');
INSERT INTO `provinsi` VALUES ('18', 'Lampung', '-4.558185', '105.403826');
INSERT INTO `provinsi` VALUES ('19', 'Kepulauan Bangka Belitung', '-2.132545', '106.11655');
INSERT INTO `provinsi` VALUES ('21', 'Kepulauan Riau', '0.918228', '104.465917');
INSERT INTO `provinsi` VALUES ('31', 'DKI Jakarta', '-6.175484', '106.827113');
INSERT INTO `provinsi` VALUES ('32', 'Jawa Barat', '-6.917478', '107.619149');
INSERT INTO `provinsi` VALUES ('33', 'Jawa Tengah', '-7.005143', '110.438076');
INSERT INTO `provinsi` VALUES ('34', 'Daerah Istimewa Yogyakarta', '-7.81167', '110.356164');
INSERT INTO `provinsi` VALUES ('35', 'Jawa Timur', '-7.258245', '112.75082');
INSERT INTO `provinsi` VALUES ('36', 'Banten', '-6.305828', '106.062321');
INSERT INTO `provinsi` VALUES ('51', 'Bali', '-8.6725072', '115.1542217');
INSERT INTO `provinsi` VALUES ('52', 'Nusa Tenggara Barat', '-8.577348', '116.09909');
INSERT INTO `provinsi` VALUES ('53', 'Nusa Tenggara Timur', '-10.176808', '123.607851');
INSERT INTO `provinsi` VALUES ('61', 'Kalimantan Barat', '-0.026352', '109.342589');
INSERT INTO `provinsi` VALUES ('62', 'Kalimantan Tengah', '-2.216115', '113.913912');
INSERT INTO `provinsi` VALUES ('63', 'Kalimantan Selatan', '-3.318597', '114.594389');
INSERT INTO `provinsi` VALUES ('64', 'Kalimantan Timur', '-0.49481', '117.143606');
INSERT INTO `provinsi` VALUES ('71', 'Sulawesi Utara', '1.474885', '124.841986');
INSERT INTO `provinsi` VALUES ('72', 'Sulawesi Tengah', '-0.900323', '119.878024');
INSERT INTO `provinsi` VALUES ('73', 'Sulawesi Selatan', '-5.147591', '119.432692');
INSERT INTO `provinsi` VALUES ('74', 'Sulawesi Tenggara', '-3.998407', '122.513009');
INSERT INTO `provinsi` VALUES ('75', 'Gorontalo', '0.6763629', '121.2352586');
INSERT INTO `provinsi` VALUES ('76', 'Sulawesi Barat', '-2.744856', '118.9097245');
INSERT INTO `provinsi` VALUES ('81', 'Maluku', '-3.236864', '130.150857');
INSERT INTO `provinsi` VALUES ('82', 'Maluku Utara', '0.7328214', '127.5538115');
INSERT INTO `provinsi` VALUES ('91', 'Papua', '-2.5649646', '140.6109866');
INSERT INTO `provinsi` VALUES ('92', 'Papua Barat', '-0.8641952', '134.0040574');

-- ----------------------------
-- Table structure for report
-- ----------------------------
DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `invoice` char(20) NOT NULL,
  `pemasukan` char(20) NOT NULL,
  `pengeluaran` char(20) NOT NULL,
  `keuntungan` char(20) NOT NULL,
  `customer` char(20) DEFAULT NULL,
  `supplier` char(20) DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of report
-- ----------------------------

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'CEO');
INSERT INTO `role` VALUES ('2', 'Admin');

-- ----------------------------
-- Table structure for sale
-- ----------------------------
DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_invoice` char(15) NOT NULL,
  `sale_date` date NOT NULL,
  `sale_customer` char(15) NOT NULL,
  `sale_total_price` char(20) NOT NULL,
  `sale_paid` char(20) NOT NULL,
  `sale_status` char(1) DEFAULT NULL,
  `sale_image_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sale
-- ----------------------------

-- ----------------------------
-- Table structure for sale_detail
-- ----------------------------
DROP TABLE IF EXISTS `sale_detail`;
CREATE TABLE `sale_detail` (
  `sale_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_invoice` char(15) NOT NULL,
  `sale_item` char(15) NOT NULL,
  `buy_price` char(20) DEFAULT NULL,
  `sale_price` char(20) NOT NULL,
  `sale_quantity` char(20) NOT NULL,
  PRIMARY KEY (`sale_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sale_detail
-- ----------------------------

-- ----------------------------
-- Table structure for session
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_username` varchar(50) NOT NULL,
  `session_password` varchar(100) NOT NULL,
  `session_email` varchar(255) NOT NULL,
  `session_name` varchar(100) NOT NULL,
  `session_role` int(1) NOT NULL,
  `session_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of session
-- ----------------------------
INSERT INTO `session` VALUES ('1', 'ceo', 'TzJaMUlSSzllcDJ3TFBNRzc0WmhzUT09', 'ceo@uhshop.com', 'CEO', '1', 'ekyjoesmith.jpg');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `author` text,
  `description` text,
  `keyword` text,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1', 'Ujung Hiasan Shop', 'Mr. Smith', 'Ujung Hiasan Shop,,', 'Ujung Hiasan Shop', 'logo.jpeg');

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `konten` text,
  `st` char(1) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of slider
-- ----------------------------

-- ----------------------------
-- Table structure for sosial_media
-- ----------------------------
DROP TABLE IF EXISTS `sosial_media`;
CREATE TABLE `sosial_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sosial_media` int(11) DEFAULT NULL,
  `nama` char(50) DEFAULT NULL,
  `link_sm` text,
  `akun_sm` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sosial_media
-- ----------------------------

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_code` char(20) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_address` text NOT NULL,
  `supplier_phone` char(15) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of supplier
-- ----------------------------

-- ----------------------------
-- Table structure for testimonial
-- ----------------------------
DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(30) DEFAULT NULL,
  `review` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of testimonial
-- ----------------------------

-- ----------------------------
-- View structure for v_buy
-- ----------------------------
DROP VIEW IF EXISTS `v_buy`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_buy` AS SELECT
buy.buy_id,
buy.buy_invoice,
buy.buy_date,
buy.buy_supplier,
buy.buy_total_price,
supplier.supplier_name,
supplier.supplier_address,
supplier.supplier_phone
FROM
buy
INNER JOIN supplier ON buy.buy_supplier = supplier.supplier_code ;

-- ----------------------------
-- View structure for v_detail_buy
-- ----------------------------
DROP VIEW IF EXISTS `v_detail_buy`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_detail_buy` AS SELECT
buy_detail.buy_detail_id,
buy_detail.buy_invoice,
buy_detail.buy_price,
buy_detail.buy_quantity,
item.item_id,
item.item_code,
item.item_name,
item.item_price,
item.item_stock,
item_type.item_type
FROM
buy_detail
INNER JOIN item ON buy_detail.buy_item = item.item_code
INNER JOIN item_type ON item.item_category = item_type.item_type_id ;

-- ----------------------------
-- View structure for v_item
-- ----------------------------
DROP VIEW IF EXISTS `v_item`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_item` AS SELECT
item.item_id,
item.item_code,
item.item_name,
item.item_category,
item.item_price,
item.item_stock,
item_type.item_type
FROM
item
INNER JOIN item_type ON item.item_category = item_type.item_type_id ;

-- ----------------------------
-- View structure for v_sale
-- ----------------------------
DROP VIEW IF EXISTS `v_sale`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_sale` AS SELECT
sale.sale_id,
sale.sale_invoice,
sale.sale_date,
sale.sale_total_price,
sale.sale_paid,
sale.sale_status,
customer.customer_id,
customer.customer_code,
customer.customer_name,
customer.customer_address,
customer.customer_phone,
sale.sale_customer,
sale.sale_image_status
FROM
sale
INNER JOIN customer ON sale.sale_customer = customer.customer_code ;

-- ----------------------------
-- View structure for v_sale_detail
-- ----------------------------
DROP VIEW IF EXISTS `v_sale_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_sale_detail` AS SELECT
sale_detail.sale_detail_id,
sale_detail.sale_invoice,
sale_detail.sale_price,
sale_detail.sale_quantity,
item.item_id,
item.item_code,
item.item_name,
item.item_price,
item.item_stock,
item_type.item_type_id,
item_type.item_type
FROM
sale_detail
INNER JOIN item ON sale_detail.sale_item = item.item_code
INNER JOIN item_type ON item.item_category = item_type.item_type_id ;
SET FOREIGN_KEY_CHECKS=1;
