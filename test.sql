-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 02:30 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `fotolar`
--

CREATE TABLE `fotolar` (
  `id` int(11) NOT NULL,
  `foto_dosya` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `foto_isim` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori_ismi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_okunma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori_ismi`, `kategori_okunma`) VALUES
(1, 'Bilim kurgu', 0),
(8, 'fsafdsf', 0),
(9, 'dasdas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `kitap_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `yayin_tarihi` date NOT NULL,
  `yayinevi_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kitap_gecmisi`
--

CREATE TABLE `kitap_gecmisi` (
  `id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL,
  `okur_id` int(11) NOT NULL,
  `alim_tarihi` date NOT NULL DEFAULT current_timestamp(),
  `teslim_tarihi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `okurlar`
--

CREATE TABLE `okurlar` (
  `id` int(11) NOT NULL,
  `okur_ismi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `okur_gorevi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `okur_birim` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `okur_sifre` varchar(300) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `okurlar`
--

INSERT INTO `okurlar` (`id`, `okur_ismi`, `okur_gorevi`, `okur_birim`, `okur_sifre`) VALUES
(1000, 'admin', 'Admin', 'Yönetici', '$2y$10$I7Y..quoX2VWKLGMTZ8d9.d6Y/uqWcMhgrd0j9GPpGLrlu0Hlp8wu');

-- --------------------------------------------------------

--
-- Table structure for table `yayin_evleri`
--

CREATE TABLE `yayin_evleri` (
  `id` int(11) NOT NULL,
  `yayinev_ismi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `okunma_sayisi` int(11) NOT NULL,
  `kitap_sayisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `yayin_evleri`
--

INSERT INTO `yayin_evleri` (`id`, `yayinev_ismi`, `okunma_sayisi`, `kitap_sayisi`) VALUES
(1, 'Uğur Yayınevi', 0, 1),
(2, 'Furkan Yayınevi', 0, 2),
(3, 'Hilal Yayınevi', 0, 2),
(4, 'Sinop yayınevi', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `yazarlar`
--

CREATE TABLE `yazarlar` (
  `id` int(11) NOT NULL,
  `yazar_ismi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `okunma_sayisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `yazarlar`
--

INSERT INTO `yazarlar` (`id`, `yazar_ismi`, `okunma_sayisi`) VALUES
(1, 'Ömer SEYFETTİN', 0),
(3, 'Tess GERRITSEN', 0),
(5, 'uğur YAVAŞ', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotolar`
--
ALTER TABLE `fotolar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `foto_isim` (`foto_isim`) USING HASH;

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_ismi` (`kategori_ismi`);

--
-- Indexes for table `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kitap_gecmisi`
--
ALTER TABLE `kitap_gecmisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `okurlar`
--
ALTER TABLE `okurlar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yayin_evleri`
--
ALTER TABLE `yayin_evleri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `yayinev_ismi` (`yayinev_ismi`);

--
-- Indexes for table `yazarlar`
--
ALTER TABLE `yazarlar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `yazar_ismi` (`yazar_ismi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotolar`
--
ALTER TABLE `fotolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kitap_gecmisi`
--
ALTER TABLE `kitap_gecmisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `okurlar`
--
ALTER TABLE `okurlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `yayin_evleri`
--
ALTER TABLE `yayin_evleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yazarlar`
--
ALTER TABLE `yazarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
