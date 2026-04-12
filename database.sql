-- Database: `db123456`

-- --------------------------------------------------------

-- Table structure for table `evaluation`

CREATE TABLE `evaluation` (
  `licenseNumber` varchar(8) NOT NULL,
  `modelId` int(11) NOT NULL,
  `testDate` datetime NOT NULL,
  `safety` int(11) NOT NULL,
  `driving` int(11) NOT NULL,
  `comfort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `evaluation`

INSERT INTO `evaluation` (`licenseNumber`, `modelId`, `testDate`, `safety`, `driving`, `comfort`) VALUES
('21/12345', 15, '2022-05-23 14:14:56', 5, 5, 5),
('21/12345', 26, '2022-05-23 14:58:30', 5, 5, 5),
('21/12345', 38, '2022-05-23 14:58:30', 5, 5, 5),
('33/44444', 15, '2022-05-23 14:21:19', 5, 5, 5),
('33/44444', 38, '2022-05-23 15:18:13', 5, 5, 5);

-- --------------------------------------------------------

-- Table structure for table `carModel`

CREATE TABLE `carModel` (
  `modelId` int(11) NOT NULL,
  `label` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `carModel`

INSERT INTO `carModel` (`modelId`, `label`) VALUES
(15, 'WALLYS IRIS'),
(26, 'WALLYS 619'),
(38, 'WALLYS 216');

-- --------------------------------------------------------

-- Table structure for table `tester`

CREATE TABLE `tester` (
  `licenseNumber` varchar(8) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `gender` enum('F','M') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `tester`

INSERT INTO `tester` (`licenseNumber`, `lastName`, `firstName`, `gender`) VALUES
('12/12345', 'dsqd', 'dsqds', 'M'),
('21/12345', 'Brini', 'Samir', 'M'),
('33/44444', 'Zaghdane', 'Olfa', 'F'),
('58/98765', 'Krimi', 'Fethi', 'M');

-- --------------------------------------------------------

-- Indexes

ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`licenseNumber`,`modelId`),
  ADD KEY `modelId` (`modelId`);

ALTER TABLE `carModel`
  ADD PRIMARY KEY (`modelId`);

ALTER TABLE `tester`
  ADD PRIMARY KEY (`licenseNumber`);

-- --------------------------------------------------------

-- Constraints

ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_fk1` FOREIGN KEY (`modelId`) REFERENCES `carModel` (`modelId`),
  ADD CONSTRAINT `evaluation_fk2` FOREIGN KEY (`licenseNumber`) REFERENCES `tester` (`licenseNumber`);