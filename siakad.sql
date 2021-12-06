-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 04:51 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `doc_access`
--

CREATE TABLE `doc_access` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `dokumen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_access`
--

INSERT INTO `doc_access` (`id`, `user`, `dokumen`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `pembuat` varchar(255) NOT NULL,
  `link` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `nama`, `jenis`, `pembuat`, `link`) VALUES
(1, 'Hasyiyah', 'Perencanaan', 'Tamam Muhammad', 'https://drive.google.com/file/d/1-ahcZycJs63GDHmO3cB5ba9umlsD6xMm/view?usp=sharing');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(13) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `role` int(2) NOT NULL,
  `dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `telp`, `email`, `password`, `gambar`, `role`, `dibuat`) VALUES
(1, 'Tamam Muhammad', 'Pekalongan', '089688241425', 'maztamam67@gmail.com', '$2y$10$oRlxh14eHHFvzCT9e42IHOyhHiaxE7CAzl6vDM22PtxT.aAv1jCx6', 'tamamuhammad.png', 1, 1587654321),
(2, 'Kuswanto', 'Doro, Pekalongan', '08976567678', 'engkus@gmail.com', '$2y$10$oRlxh14eHHFvzCT9e42IHOyhHiaxE7CAzl6vDM22PtxT.aAv1jCx6', 'default.jpg', 2, 1589877894),
(3, 'Muchammad Rizqi', '', '', 'isanhacker@gmail.com', '$2y$10$jg0iFs7Ijmeg/L42nxQnj.MmJPs4FcxIZr80FpKSsf5PTm50vWCtK', 'default.jpg', 3, 1589090871),
(4, 'smk syafi\'i akrom', '', '', 'smksa@gmail.com', '$2y$10$xuzY.OAkKUw8KnDJODbCUeKub9/lfiZtG0uKziunKyS.gg5Hpx0q2', 'default.jpg', 4, 1589268071),
(5, 'Mujabb', 'Jepara', '086767676767', 'jabb@gmail.com', '$2y$10$t4GlQfEchcqy5dFpPMqEFOuoqfcpvk70MyHdI0nJP5SX2MxoGUAYK', 'default.jpg', 3, 1638672010);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 4),
(6, 1, 3),
(8, 2, 1),
(10, 1, 5),
(11, 1, 4),
(14, 3, 4),
(15, 3, 1),
(16, 4, 4),
(17, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Dashboard'),
(2, 'Admin'),
(3, 'Menu'),
(4, 'Profile');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Kepala atau Wakil Kepala'),
(3, 'Struktural'),
(4, 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `icon` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_submenu`
--

INSERT INTO `user_submenu` (`id`, `menu_id`, `title`, `icon`, `url`, `is_active`) VALUES
(1, 1, 'Dashboard', 'fas fa-tachometer-alt fa-fw', 'dashboard', 1),
(2, 1, 'Daftar Dokumen', 'fas fa-file-invoice', 'dashboard/dokumen', 1),
(4, 2, 'Data Petugas', 'fas fa-user-check', 'admin', 1),
(5, 2, 'Role', 'fas fa-fw fa-user-tie', 'admin/role', 1),
(7, 3, 'Menu Management', 'fas fa-fw fa-bars', 'menu', 1),
(8, 3, 'Submenu Management', 'fab fa-fw fa-elementor', 'menu/submenu', 1),
(9, 4, 'My Profile', 'fas fa-user-circle fa-fw', 'profile', 1),
(10, 4, 'Edit Profile', 'fas fa-fw fa-user-edit', 'profile/edit', 1),
(11, 4, 'Change Password', 'fas fa-fw fa-key', 'profile/changepassword', 1),
(18, 2, 'Register Petugas', 'fas fa-user-plus', 'admin/signup', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doc_access`
--
ALTER TABLE `doc_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doc_access`
--
ALTER TABLE `doc_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
