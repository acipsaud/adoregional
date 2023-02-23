-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 02:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` varchar(256) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `log` text NOT NULL,
  `id_dataado` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipe` varchar(10) NOT NULL DEFAULT 'MODIFY'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `id_user`, `log`, `id_dataado`, `timestamp`, `tipe`) VALUES
('4a613c0fd2c51067410706061decba110cb43f15', '12', '<hr>perbedaan  : {\"lay_existing_1\":\"-\"}<hr>data old : {\"id\":\"1\",\"witel\":\"SULTENG\",\"datel\":\"PALU\",\"hero\":\"-\",\"sto\":\"PLA\",\"am\":\"NURDJANNAH\",\"segment\":\"DES\",\"nipnas\":\"-\",\"revenue\":\"0\",\"nama_cust\":\"Universitas Alkhairaat\",\"alamat\":\"Jln Dipenegoro\",\"kab\":\"KOTA PALU\",\"kec\":\"PALU BARAT\",\"kel\":\"LERE\",\"kat\":\"UNIVERSITAS\",\"det_kat\":\"Negeri\",\"lat\":\"-0.890338\",\"lng\":\"119.851902\",\"odp\":\"ODP-PLA-FD\\/56\",\"jarak_alpro\":\"0.045487969161256\",\"pelanggan_telkom\":\"YA\",\"lay_existing\":\"ASTINET & HSI\",\"lay_existing_1\":\"OCAAaAAAAAS\",\"lay_existing_2\":\"-\",\"kompetitor\":\"Lintas Arta, Crossnet\",\"prospek_lay\":\"CloudMachine\",\"id_lop\":\"-\"}<hr>data new : {\"id\":\"1\",\"nama_cust\":\"Universitas Alkhairaat\",\"am\":\"NURDJANNAH\",\"kat\":\"UNIVERSITAS\",\"det_kat\":\"Negeri\",\"lat\":\"-0.890338\",\"lng\":\"119.851902\",\"alamat\":\"Jln Dipenegoro\",\"kab\":\"KOTA PALU\",\"kec\":\"PALU BARAT\",\"kel\":\"LERE\",\"witel\":\"SULTENG\",\"datel\":\"PALU\",\"hero\":\"-\",\"sto\":\"PLA\",\"odp\":\"ODP-PLA-FD\\/56\",\"jarak_alpro\":0.04548796916125565,\"pelanggan_telkom\":\"YA\",\"lay_existing\":\"ASTINET & HSI\",\"lay_existing_1\":\"-\",\"lay_existing_2\":\"-\",\"prospek_lay\":\"CloudMachine\",\"kompetitor\":\"Lintas Arta, Crossnet\",\"segment\":\"DES\",\"nipnas\":\"-\",\"id_lop\":\"-\",\"revenue\":\"0\"}', '1', '2023-02-21 23:15:25', 'MODIFY'),
('f87d58660dc8805e3dcfa93306df8cd5283fec2f', '12', '<hr>perbedaan  : []<hr>data old : {\"id\":\"1\",\"witel\":\"SULTENG\",\"datel\":\"PALU\",\"hero\":\"-\",\"sto\":\"PLA\",\"am\":\"NURDJANNAH\",\"segment\":\"DES\",\"nipnas\":\"-\",\"revenue\":\"0\",\"nama_cust\":\"Universitas Alkhairaat\",\"alamat\":\"Jln Dipenegoro\",\"kab\":\"KOTA PALU\",\"kec\":\"PALU BARAT\",\"kel\":\"LERE\",\"kat\":\"UNIVERSITAS\",\"det_kat\":\"Negeri\",\"lat\":\"-0.890338\",\"lng\":\"119.851902\",\"odp\":\"ODP-PLA-FD\\/56\",\"jarak_alpro\":\"0.045487969161256\",\"pelanggan_telkom\":\"YA\",\"lay_existing\":\"ASTINET & HSI\",\"lay_existing_1\":\"-\",\"lay_existing_2\":\"-\",\"kompetitor\":\"Lintas Arta, Crossnet\",\"prospek_lay\":\"CloudMachine\",\"id_lop\":\"-\"}<hr>data new : {\"id\":\"1\",\"nama_cust\":\"Universitas Alkhairaat\",\"am\":\"NURDJANNAH\",\"kat\":\"UNIVERSITAS\",\"det_kat\":\"Negeri\",\"lat\":\"-0.890338\",\"lng\":\"119.851902\",\"alamat\":\"Jln Dipenegoro\",\"kab\":\"KOTA PALU\",\"kec\":\"PALU BARAT\",\"kel\":\"LERE\",\"witel\":\"SULTENG\",\"datel\":\"PALU\",\"hero\":\"-\",\"sto\":\"PLA\",\"odp\":\"ODP-PLA-FD\\/56\",\"jarak_alpro\":0.04548796916125565,\"pelanggan_telkom\":\"YA\",\"lay_existing\":\"ASTINET & HSI\",\"lay_existing_1\":\"-\",\"lay_existing_2\":\"-\",\"prospek_lay\":\"CloudMachine\",\"kompetitor\":\"Lintas Arta, Crossnet\",\"segment\":\"DES\",\"nipnas\":\"-\",\"id_lop\":\"-\",\"revenue\":\"0\"}', '1', '2023-02-21 23:15:25', 'MODIFY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
