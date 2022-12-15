-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
-- David Papava
-- Host: 127.0.0.1
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opd1`
--

-- --------------------------------------------------------

--
-- Structura tabelei `categories`
--

CREATE TABLE `categories` (
  `categorieId` int(12) NOT NULL,
  `categorieName` varchar(255) NOT NULL,
  `categorieDesc` text NOT NULL,
  `categorieCreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Adaugare date in tabela `categories`
--

INSERT INTO `categories` (`categorieId`, `categorieName`, `categorieDesc`, `categorieCreateDate`) VALUES
(1, 'Samsung', 'Având în spate 10 ani de pionierat și de premiere în domeniu, Galaxy iți aduce următoarea generație de inovații mobile. Următoarea generație de telefoane Galaxy este aici.', '2022-12-12 16:01:20'),
(2, 'Apple', 'Descoperă universul inovator Apple. Cumpără iPhone, iPad, Apple Watch și Mac. Explorează accesoriile, divertismentul și asistența profesională.', '2022-12-12 16:02:49'),
(3, 'Huawei', 'HUAWEI funcționează perfect pentru a crea o viață frumos conectată pentru noi toți. Rapid, sigur și pe măsura așteptărilor. Descoperă produsele noastre de top.', '2022-12-12 16:04:11'),
(4, 'Xiaomi', 'Mi are în prezent numeroase produse în portofoliu, iar oferta este completată în mod constant cu cele mai noi articole Xiaomi, începând cu mai multe produse bugetare și terminând cu produse premium emblematice.', '2022-12-12 16:06:28');




-- --------------------------------------------------------

--
-- Structura tabelei `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `phoneId` int(21) NOT NULL,
  `itemQuantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structura tabelei `orders`
--

CREATE TABLE `orders` (
  `orderId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` int(21) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `amount` int(200) NOT NULL,
  `paymentMode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=plata la livrare, \r\n1= plata online ',
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structura tabelei `phone`
--

CREATE TABLE `phone` (
  `phoneId` int(12) NOT NULL,
  `phoneName` varchar(255) NOT NULL,
  `phonePrice` int(12) NOT NULL,
  `phoneModel` text NOT NULL,
  `phoneSIM` text NOT NULL,
  `phoneDisplay` text NOT NULL,
  `phoneDisplayRes` text NOT NULL,
  `phoneStorage` text NOT NULL,
  `phoneStorageRAM` text NOT NULL,
  `phoneCPUType` text NOT NULL,
  `phoneCPU` text NOT NULL,
  `phoneCPUHz` text NOT NULL,
  `phoneCameraPrincip` text NOT NULL,
  `phoneCameraRes` text NOT NULL,
  `phoneCameraSelfie` text NOT NULL,
  `phoneBatteryFC` text NOT NULL,
  `phoneBatteryWC` text NOT NULL,
  `phoneBatteryCap` text NOT NULL,
  `phoneOther` text NOT NULL,
  `phoneOtherColor` text NOT NULL,
  `phoneOtherWeight` text NOT NULL,
  `phoneQuaranty` text NOT NULL,
  `phoneCategorieId` int(12) NOT NULL,
  `phonePubDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Adaugare date in tabela `phone`
--

INSERT INTO `phone` (`phoneId`, `phoneName`, `phonePrice`, `phoneModel`,`phoneSIM`,`phoneDisplay`,`phoneDisplayRes`,`phoneStorage`, `phoneStorageRAM`, `phoneCPUType`,`phoneCPU`,`phoneCPUHz`,`phoneCameraPrincip`,`phoneCameraRes`,`phoneCameraSelfie`,`phoneBatteryFC`,`phoneBatteryWC`,`phoneBatteryCap`,`phoneOther`,`phoneOtherColor`,`phoneOtherWeight`,`phoneQuaranty`,`phoneCategorieId`, `phonePubDate`) VALUES
(1, 'Telefon SAMSUNG Galaxy A12 4G, 64GB, 4GB RAM, Dual SIM, Nacho Blue', 669, 'GALAXY A12','Dual SIM','6.5','1600 x 720','64', '4', 'Octa Core', 'Exynos 850 (S.LSI 850 Nacho)', '-', 'Cvadrupla', '48MP f2.0 + 5MP f2.2 + 2MP f2.4 + 2MP f2.4', '8MP f2.2', 'Nu', 'Nu', 5000, 'Încărcător, căști', 'Negru', '205', '24', 1, '2022-12-12 21:44:12'),
(2, 'Telefon SAMSUNG Galaxy S21 FE 5G, 256GB, 8GB RAM, Dual SIM, Graphite', 3357, 'GALAXY S21 FAN EDITION','Dual SIM','6.4','2340 x 1080','256', '8', 'Octa Core', 'Qualcomm SM8350 Snapdragon 888 5G (5 nm)', '2.8, 2.4, 1.8', 'Tripla', '12MP (Wide) f/1.8, 26mm, 1/1.76", 1.8µm, Dual Pixel PDAF, OIS + 12MP (Ultra-Wide) f/2.2, 13mm, 123˚, 1/3.0", 1.12µm + 8MP (Telephoto) f/2.4, 76mm, 1/4.5", 1.0µm, PDAF, OIS, 3x optical zoom', '32MP (Wide) f/2.2, 26mm, 1/2.74", 0.8µm', 'Da', 'Da', '4500', 'Încărcător', 'Gri', '177', '24', 1, '2021-03-17 21:03:26'),
(3, 'Telefon SAMSUNG Galaxy A53 5G, 256GB, 8GB RAM, Dual SIM, Awesome Black', 1999, 'GALAXY A53','Dual SIM','6.5','1080 x 2400','256', '8', 'Octa Core', '-', '2.4, 2', 'Cvadrupla', '64MP f1.8 + 12MP f2.4 + 5MP f2.4 + 5MP f2.4 OIS AF', '32MP f2.2', 'Da', 'Nu', '5000', 'Cablu incarcare. Nu contine adaptor priza!', 'Negru', '189', '24', 1, '2021-03-17 21:03:26'),
(4, 'Telefon HUAWEI nova 9 SE, 128GB, 8GB RAM, Dual SIM, Midnight Black', 1099, 'HUAWEI NOVA 9SE','Dual SIM','6.78','2388 x 1080','128', '8', 'Octa Core', 'Qualcomm Snapdragon 680', '-', 'Cvadrupla', '108MP f/1.9 + 8MP (Ultra-Wide Angle) (f/2.2 + 2MP (Depth) f/2.4 + 2MP (Macro) f/2.4 ', '16MP f/2.2, Rezolutie foto pana la 4608 x 3456, Rezolutie video pana la 1920 x 1080', 'Da', 'Nu', '4000', '-', 'Negru', '191', '24', 3, '2021-03-17 21:03:26');


-- --------------------------------------------------------



--
-- Structura tabelei table `users`
--

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Adaugare date in tabela `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`, `joinDate`) VALUES
(1, 'david', 'David', 'Iulian', 'david.iulian@gmail.com', 0712345678, '1', '123456789', '2022-12-12 19:04:02');

-- --------------------------------------------------------

--
-- Structura tabelei `viewcart`
--

CREATE TABLE `viewcart` (
  `cartItemId` int(11) NOT NULL,
  `phoneId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexi pentru tabelele adaugate
--

--
-- Index-uri pentru tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorieId`);
ALTER TABLE `categories` ADD FULLTEXT KEY `categorieName` (`categorieName`,`categorieDesc`);

--
-- Index-uri pentru tabela `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Index-uri pentru tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Index-uri pentru tabela `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`phoneId`);
ALTER TABLE `phone` ADD FULLTEXT KEY `phoneName` (`phoneName`,`phoneModel`);

--
-- Index-uri pentru tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Index-uri pentru tabela `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`cartItemId`);

--
-- AUTO_INCREMENT pentru tabelele adaugate
--

--
-- AUTO_INCREMENT pentru tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `categorieId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;


--
-- AUTO_INCREMENT pentru tabela `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(21) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabela `phone`
--
ALTER TABLE `phone`
  MODIFY `phoneId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pentru tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabela `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
