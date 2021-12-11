-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 10:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onevoice_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attID` int(11) DEFAULT NULL,
  `attStatus` enum('present','absent') DEFAULT NULL,
  `meetingday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attID`, `attStatus`, `meetingday`) VALUES
(1, 'present', '2021-01-17'),
(2, 'present', '2021-02-12'),
(3, 'absent', '2021-01-11'),
(4, 'absent', '2021-02-10'),
(5, 'present', '2021-03-13'),
(6, 'absent', '2021-02-14'),
(7, 'absent', '2021-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `attNum` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `middlename` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `contact` varchar(15) NOT NULL,
  `residential_address` varchar(20) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendee`
--

INSERT INTO `attendee` (`attNum`, `fname`, `middlename`, `lastname`, `gender`, `DOB`, `contact`, `residential_address`, `nationality`) VALUES
(1, 'Yaa', ' ', 'Asifo', 'female', '2001-06-02', '233457865898', 'Dansoman 1323', 'Ghanaian'),
(2, 'Kweku', 'osei', 'Asare', 'male', '1998-09-04', '233457465898', 'Santa 1323', 'Ghanaian'),
(3, 'Adwoa', ' ', 'Afriyie', 'female', '1995-06-02', '233457325898', 'Sowutuom 1323', 'Ghanaian'),
(4, 'Akosua', 'Afriyie', 'Ofosu', 'male', '1990-10-03', '233459865898', 'Accra 1323', 'Ghanaian'),
(5, 'Kojo', ' ', 'Appiah', 'male', '1998-12-20', '233453965898', 'Tantra 1323', 'Ghanaian');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptNum` int(11) NOT NULL,
  `deptName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptNum`, `deptName`) VALUES
(1, 'Database'),
(2, 'Prayer'),
(3, 'Protocol'),
(4, 'Paraphernelia'),
(5, 'Protocol'),
(6, 'Database'),
(7, 'Paraphernelia'),
(8, 'Protocol'),
(9, 'Database'),
(10, 'Database'),
(11, 'Protocol'),
(12, 'Protocol'),
(13, 'Database');

-- --------------------------------------------------------

--
-- Table structure for table `departmentperson`
--

CREATE TABLE `departmentperson` (
  `deptpersonID` int(11) DEFAULT NULL,
  `deptNum` int(11) DEFAULT NULL,
  `noofDepartments` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departmentperson`
--

INSERT INTO `departmentperson` (`deptpersonID`, `deptNum`, `noofDepartments`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 4, 2),
(5, 5, 3),
(6, 3, 1),
(7, 2, 2),
(8, 3, 3),
(23, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `developmentproject`
--

CREATE TABLE `developmentproject` (
  `devID` int(11) NOT NULL,
  `projectName` varchar(30) NOT NULL,
  `location` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `developmentproject`
--

INSERT INTO `developmentproject` (`devID`, `projectName`, `location`) VALUES
(1, 'Navrongo Project', 'Navrongo'),
(2, 'Dome Project', 'Dome'),
(3, 'Ashiaman Project', 'Ashiaman'),
(4, 'Jamestown Project', 'Jamestown'),
(5, 'Esujaman Evangelism Project', 'Esujaman'),
(6, 'Navrongo Project', 'Navrongo'),
(7, 'Navrongo Project', 'Navrongo'),
(8, 'Dome Project', 'Dome'),
(9, 'Navrongo Project', 'Navrongo'),
(10, 'Navrongo Project', 'Navrongo'),
(11, 'Navrongo Project', 'Navrongo'),
(12, 'Dome Project', 'Dome');

-- --------------------------------------------------------

--
-- Table structure for table `devprojectmember`
--

CREATE TABLE `devprojectmember` (
  `personID` int(11) DEFAULT NULL,
  `devID` int(11) DEFAULT NULL,
  `noofProjects` int(11) DEFAULT NULL,
  `projectrole` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devprojectmember`
--

INSERT INTO `devprojectmember` (`personID`, `devID`, `noofProjects`, `projectrole`) VALUES
(1, 1, 1, 'Usher'),
(2, 2, 2, 'Prayer'),
(3, 3, 2, 'Media'),
(4, 5, 2, 'Partnership'),
(5, 4, 1, 'Partnership'),
(6, 3, 3, 'Media'),
(7, 2, 2, 'Protocol'),
(8, 1, 3, 'Usher'),
(23, 12, 2, 'Media');

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

CREATE TABLE `dues` (
  `duesID` int(11) NOT NULL,
  `installment` decimal(10,2) DEFAULT NULL,
  `amountpaid` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dues`
--

INSERT INTO `dues` (`duesID`, `installment`, `amountpaid`) VALUES
(1, '2.00', '10.00'),
(2, '0.00', '20.00'),
(3, '2.00', '7.50'),
(4, '3.00', '5.00'),
(5, '0.00', '20.00'),
(6, '0.00', '20.00'),
(7, '3.00', '5.00'),
(8, '5.00', '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `duesmember`
--

CREATE TABLE `duesmember` (
  `memduesID` int(11) DEFAULT NULL,
  `duesID` int(11) DEFAULT NULL,
  `totalamount` decimal(10,2) DEFAULT NULL,
  `paymentdate` datetime DEFAULT NULL,
  `modeofPayment` enum('Mobile Money','Vodafone cash','Tigo cash','ebanking') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duesmember`
--

INSERT INTO `duesmember` (`memduesID`, `duesID`, `totalamount`, `paymentdate`, `modeofPayment`) VALUES
(1, 1, '20.00', '2021-08-12 10:20:50', 'Mobile Money'),
(2, 2, '20.00', '2021-02-12 10:20:50', 'Mobile Money'),
(3, 3, '20.00', '2021-03-12 10:20:50', 'Vodafone cash'),
(4, 4, '20.00', '2021-05-12 10:20:50', 'Tigo cash'),
(5, 5, '20.00', '2021-04-12 10:20:50', 'ebanking'),
(6, 6, '20.00', '2021-04-22 10:20:50', 'Mobile Money'),
(7, 7, '20.00', '2021-07-12 10:20:50', 'Mobile Money'),
(8, 8, '20.00', '2021-02-14 10:20:50', 'Vodafone cash');

-- --------------------------------------------------------

--
-- Table structure for table `eventattendee`
--

CREATE TABLE `eventattendee` (
  `eveattNum` int(11) DEFAULT NULL,
  `eventID` int(11) DEFAULT NULL,
  `dateofticketPurchase` date DEFAULT NULL,
  `priceofTicket` decimal(10,2) DEFAULT NULL,
  `modeofPayment` enum('Mobile Money','Vodafone cash','Tigo cash','ebanking') DEFAULT NULL,
  `amountpaid` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventattendee`
--

INSERT INTO `eventattendee` (`eveattNum`, `eventID`, `dateofticketPurchase`, `priceofTicket`, `modeofPayment`, `amountpaid`) VALUES
(1, 1, '2021-08-22', '10.00', 'Mobile Money', '10.00'),
(2, 2, '2021-02-12', '15.00', 'Vodafone cash', '0.00'),
(3, 3, '2021-05-12', '5.00', 'Mobile Money', '5.00'),
(4, 1, '2021-04-12', '10.00', 'Tigo cash', '5.00'),
(5, 2, '2021-03-20', '5.00', 'Mobile Money', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `eventmember`
--

CREATE TABLE `eventmember` (
  `personID` int(11) DEFAULT NULL,
  `eventID` int(11) DEFAULT NULL,
  `noofEvents` int(11) DEFAULT NULL,
  `eventrole` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventmember`
--

INSERT INTO `eventmember` (`personID`, `eventID`, `noofEvents`, `eventrole`) VALUES
(1, 1, 1, 'Prayer'),
(2, 2, 2, 'Prayer'),
(3, 3, 2, 'Media'),
(5, 5, 2, 'Prayer'),
(5, 4, 1, 'Partnership'),
(6, 2, 3, 'Database'),
(7, 3, 2, 'Protocol'),
(8, 5, 3, 'Prayer'),
(16, 6, 1, 'Protocol'),
(23, 13, 3, 'Media');

-- --------------------------------------------------------

--
-- Table structure for table `eventsponsor`
--

CREATE TABLE `eventsponsor` (
  `eventID` int(11) DEFAULT NULL,
  `spID` int(11) DEFAULT NULL,
  `eventbudget` decimal(10,3) DEFAULT NULL,
  `paymentdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventsponsor`
--

INSERT INTO `eventsponsor` (`eventID`, `spID`, `eventbudget`, `paymentdate`) VALUES
(1, 1, '20000.000', '2021-08-12 10:20:50'),
(2, 2, '15000.000', '2021-05-22 12:30:20'),
(3, 3, '15000.000', '2021-09-02 11:40:40'),
(4, 4, '20000.000', '2021-10-22 10:50:20'),
(5, 5, '15000.000', '2021-12-24 14:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `eventss`
--

CREATE TABLE `eventss` (
  `eventID` int(11) NOT NULL,
  `eventName` varchar(30) NOT NULL,
  `location` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventss`
--

INSERT INTO `eventss` (`eventID`, `eventName`, `location`) VALUES
(1, 'Aloud Mega Praise', 'Action chapel'),
(2, 'Hello Jesus', 'Action chapel'),
(3, 'Intertiary Allnight', 'AGCM'),
(4, 'Jesus Encounter', 'ICGC'),
(5, 'Empowerment Night', 'Action Chapel'),
(6, 'Aloud Mega Praise', 'Spintex'),
(7, 'Aloud Mega Praise', 'Spintex'),
(8, 'Aloud Mega Praise', 'Spintex'),
(9, 'Jesus Encounter', 'ICGC'),
(10, 'Aloud Mega Praise', 'Spintex'),
(11, 'Jesus Encounter', 'ICGC'),
(12, 'Jesus Encounter', 'ICGC'),
(13, 'Jesus Encounter', 'ICGC');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Email`, `Password`) VALUES
('david1@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memID` int(11) DEFAULT NULL,
  `church` varchar(30) DEFAULT NULL,
  `university` varchar(40) DEFAULT NULL,
  `unilevel` enum('100','200','300','400','Completed') DEFAULT NULL,
  `occupation` varchar(30) DEFAULT NULL,
  `hometown` varchar(25) DEFAULT NULL,
  `nameofFather` varchar(40) DEFAULT NULL,
  `contactofFather` varchar(15) DEFAULT NULL,
  `occupationofFather` varchar(20) DEFAULT NULL,
  `nameofMother` varchar(40) DEFAULT NULL,
  `contactofMother` varchar(15) DEFAULT NULL,
  `occupationofMother` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memID`, `church`, `university`, `unilevel`, `occupation`, `hometown`, `nameofFather`, `contactofFather`, `occupationofFather`, `nameofMother`, `contactofMother`, `occupationofMother`) VALUES
(1, 'Action', 'UG-Legon', '100', 'Student', 'Benkum', 'Kweku Asifo', '233542847382', 'IT Specialist', 'Francesse Asifo', '233277628929', 'Business Woman'),
(2, 'Catholic', 'KNUST ', '400', 'Engineer', 'Benkum', 'Kweku Asare', '233542587382', 'Businessman', 'Francesse Asifo', '233203568929', 'Interior Decorator'),
(3, 'Royal House', 'Ashesi', 'Completed', 'Computer Engineer', 'Benkum', 'Kweku Afriyie', '233542878382', 'Engineer', 'Francesse Asifo', '233224538929', 'Seamstress'),
(4, 'AGCM', 'UG-Legon', 'Completed', 'Lawyer', 'Benkum', 'Kweku OFosu', '233352847382', 'Carpenter', 'Francesse Asifo', '233277638929', 'Bank Manager'),
(5, 'Pentecost', 'IPMC', '400', 'Student', 'Benkum', 'Kweku Appiah', '233542844582', 'Painter', 'Francesse Asifo', '233204834569', 'IT Specialist'),
(6, 'The Apostolic Church', 'UG-Legon', '100', 'Student', 'Benkum', 'Kweku Ofosu', 'Bank Manager', 'IT Specialist', 'Francesse Asifo', '233204833429', 'Doctor'),
(7, 'CAC', 'UG-Legon', '100', 'Student', 'Benkum', 'Kweku Ofosu', '233542847682', 'Doctor', 'Francesse Asifo', '233204835729', 'Business Woman'),
(8, 'Presby', 'UG-Legon', '100', 'Student', 'Benkum', 'Kweku Ofosu', '233544647382', 'IT Specialist', 'Francesse Asifo', '233224556929', 'Trader'),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `personID` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `middlename` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `contact` varchar(15) NOT NULL,
  `residential_address` varchar(40) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personID`, `fname`, `middlename`, `lname`, `gender`, `DOB`, `contact`, `residential_address`, `nationality`) VALUES
(1, 'Yaa', 'owusu', 'Asifo', 'female', '2001-06-02', '233547864598', 'Dansoman', 'Ghanaian'),
(2, 'Kweku', 'osei', 'Asare', 'male', '1998-09-04', '233507865898', 'Santa 1323', 'Ghanaian'),
(3, 'Adwoa', 'Amponsah', 'Afriyie', 'female', '1995-06-02', '233245325898', 'Sowutuom 1323', 'Ghanaian'),
(4, 'Akosua', 'Afriyie', 'Ofosu', 'female', '1990-10-03', '233245986498', 'Accra 1323', 'Ghanaian'),
(5, 'Kojo', 'Oppong', 'Appiah', 'male', '1998-12-20', '233503965898', 'Tantra 1323', 'Ghanaian'),
(6, 'Kingsley', 'owusu', 'Ofosu', 'male', '2001-02-02', '233547653398', 'Dansoman 1323', 'Ghanaian'),
(7, 'Kwesi', 'owusu', 'Ofosu', 'male', '2001-03-02', '233543265898', 'Dansoman 1323', 'Ghanaian'),
(8, 'Kwame', 'owusu', 'Ofosu', 'female', '2001-05-02', '233543465898', 'Dansoman 1323', 'Ghanaian'),
(9, 'Kweku', 'owusu', 'Ofosu', 'male', '2001-08-20', '233547678898', 'Dansoman 1323', 'Ghanaian'),
(10, 'Kojo', 'owusu', 'Appiah', 'male', '2001-06-12', '233547655898', 'Dansoman 1323', 'Ghanaian'),
(11, 'Isaac', ' ', 'Addo', 'male', '2001-06-02', '2334507685898', 'Dansoman 1323', 'Ghanaian'),
(12, 'Adwoa', ' ', 'Ofosu', 'female', '2001-07-02', '233507875898', 'Dansoman 1323', 'Ghanaian'),
(13, 'Akosua', 'owusu', 'Osei', 'female', '2001-07-02', '233247868898', 'Dansoman 1323', 'Ghanaian'),
(14, 'Yaa', 'owusu', 'Asare', 'female', '2001-04-06', '233557863478', 'Dansoman 1323', 'Ghanaian'),
(15, 'Emefa', 'owusu', 'Acquah', 'female', '2001-05-02', '233555365898', 'Dansoman 1323', 'Ghanaian'),
(16, 'Kojo', 'Owusu', 'Afriyie', 'male', '2001-02-05', '233542348993', 'University Street', 'ghanaian'),
(23, 'Gerald', 'Addo', 'Tetteh', 'male', '2000-06-05', '233247819028', 'Teshie F4', 'ghanaian');

-- --------------------------------------------------------

--
-- Table structure for table `projectsponsor`
--

CREATE TABLE `projectsponsor` (
  `devID` int(11) DEFAULT NULL,
  `spID` int(11) DEFAULT NULL,
  `projectbudget` decimal(10,3) DEFAULT NULL,
  `paymentdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projectsponsor`
--

INSERT INTO `projectsponsor` (`devID`, `spID`, `projectbudget`, `paymentdate`) VALUES
(1, 1, '20000.000', '2021-08-12 10:20:50'),
(2, 2, '15000.000', '2021-05-22 12:30:20'),
(3, 3, '15000.000', '2021-09-02 11:40:40'),
(4, 4, '20000.000', '2021-10-22 10:50:20'),
(2, 5, '15000.000', '2021-12-24 14:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `rep`
--

CREATE TABLE `rep` (
  `repID` int(11) DEFAULT NULL,
  `eventID` int(11) NOT NULL,
  `seniorhigh` varchar(30) DEFAULT NULL,
  `yearofCompletion` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rep`
--

INSERT INTO `rep` (`repID`, `eventID`, `seniorhigh`, `yearofCompletion`) VALUES
(1, 1, 'Presec-Legon', 2021),
(2, 1, 'Aburi girls', 2021),
(3, 2, 'Holy Child', 2021),
(4, 3, 'Achimota', 2021),
(5, 4, 'Ideal College', 2021),
(6, 5, 'Ideal College', 2021),
(7, 3, 'Ideal College', 2021),
(8, 2, 'Ideal College', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `sheep`
--

CREATE TABLE `sheep` (
  `IDsheep` int(11) DEFAULT NULL,
  `sheepID` int(11) DEFAULT NULL,
  `maturitylevel` enum('tekna','nepios','paidia','hious') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sheep`
--

INSERT INTO `sheep` (`IDsheep`, `sheepID`, `maturitylevel`) VALUES
(1, 4, 'tekna'),
(2, 5, 'nepios'),
(3, 6, 'paidia'),
(1, 7, 'hious'),
(2, 8, 'tekna');

-- --------------------------------------------------------

--
-- Table structure for table `shepherd`
--

CREATE TABLE `shepherd` (
  `IDshep` int(11) NOT NULL,
  `shepID` int(11) DEFAULT NULL,
  `traininglevel` enum('beginner','intermediate','expert') DEFAULT NULL,
  `noofSheep` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shepherd`
--

INSERT INTO `shepherd` (`IDshep`, `shepID`, `traininglevel`, `noofSheep`) VALUES
(1, 1, 'beginner', 1),
(2, 2, 'intermediate', 2),
(3, 3, 'expert', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `spID` int(11) NOT NULL,
  `spName` varchar(30) DEFAULT NULL,
  `typeofSponsorship` enum('bronze','silver','gold') DEFAULT NULL,
  `amountPaid` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`spID`, `spName`, `typeofSponsorship`, `amountPaid`) VALUES
(1, 'Praise Tv', 'gold', '10000.00'),
(2, 'Highschool clique', 'bronze', '1000.00'),
(3, 'Dominion Tv', 'gold', '9000.00'),
(4, 'Sunny Fm', 'silver', '5000.00'),
(5, 'Sweet Melodies', 'silver', '4000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `attID` (`attID`);

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`attNum`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptNum`);

--
-- Indexes for table `departmentperson`
--
ALTER TABLE `departmentperson`
  ADD KEY `deptpersonID` (`deptpersonID`),
  ADD KEY `deptNum` (`deptNum`);

--
-- Indexes for table `developmentproject`
--
ALTER TABLE `developmentproject`
  ADD PRIMARY KEY (`devID`);

--
-- Indexes for table `devprojectmember`
--
ALTER TABLE `devprojectmember`
  ADD KEY `personID` (`personID`),
  ADD KEY `devID` (`devID`);

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`duesID`);

--
-- Indexes for table `duesmember`
--
ALTER TABLE `duesmember`
  ADD KEY `memduesID` (`memduesID`),
  ADD KEY `duesID` (`duesID`);

--
-- Indexes for table `eventattendee`
--
ALTER TABLE `eventattendee`
  ADD KEY `eveattNum` (`eveattNum`),
  ADD KEY `eventID` (`eventID`);

--
-- Indexes for table `eventmember`
--
ALTER TABLE `eventmember`
  ADD KEY `personID` (`personID`),
  ADD KEY `eventID` (`eventID`);

--
-- Indexes for table `eventsponsor`
--
ALTER TABLE `eventsponsor`
  ADD KEY `eventID` (`eventID`),
  ADD KEY `spID` (`spID`);

--
-- Indexes for table `eventss`
--
ALTER TABLE `eventss`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD UNIQUE KEY `contactofFather` (`contactofFather`),
  ADD UNIQUE KEY `contactofMother` (`contactofMother`),
  ADD KEY `memID` (`memID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personID`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `projectsponsor`
--
ALTER TABLE `projectsponsor`
  ADD KEY `devID` (`devID`),
  ADD KEY `spID` (`spID`);

--
-- Indexes for table `rep`
--
ALTER TABLE `rep`
  ADD KEY `repID` (`repID`),
  ADD KEY `eventID` (`eventID`);

--
-- Indexes for table `sheep`
--
ALTER TABLE `sheep`
  ADD KEY `sheepID` (`sheepID`);

--
-- Indexes for table `shepherd`
--
ALTER TABLE `shepherd`
  ADD PRIMARY KEY (`IDshep`),
  ADD KEY `shepID` (`shepID`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`spID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendee`
--
ALTER TABLE `attendee`
  MODIFY `attNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `deptNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `developmentproject`
--
ALTER TABLE `developmentproject`
  MODIFY `devID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `duesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eventss`
--
ALTER TABLE `eventss`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `personID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rep`
--
ALTER TABLE `rep`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shepherd`
--
ALTER TABLE `shepherd`
  MODIFY `IDshep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `spID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`attID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departmentperson`
--
ALTER TABLE `departmentperson`
  ADD CONSTRAINT `departmentperson_ibfk_1` FOREIGN KEY (`deptpersonID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `departmentperson_ibfk_2` FOREIGN KEY (`deptNum`) REFERENCES `department` (`deptNum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `devprojectmember`
--
ALTER TABLE `devprojectmember`
  ADD CONSTRAINT `devprojectmember_ibfk_1` FOREIGN KEY (`personID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `devprojectmember_ibfk_2` FOREIGN KEY (`devID`) REFERENCES `developmentproject` (`devID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `duesmember`
--
ALTER TABLE `duesmember`
  ADD CONSTRAINT `duesmember_ibfk_1` FOREIGN KEY (`memduesID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `duesmember_ibfk_2` FOREIGN KEY (`duesID`) REFERENCES `dues` (`duesID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventattendee`
--
ALTER TABLE `eventattendee`
  ADD CONSTRAINT `eventattendee_ibfk_1` FOREIGN KEY (`eveattNum`) REFERENCES `attendee` (`attNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventattendee_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `eventss` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventmember`
--
ALTER TABLE `eventmember`
  ADD CONSTRAINT `eventmember_ibfk_1` FOREIGN KEY (`personID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventmember_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `eventss` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventsponsor`
--
ALTER TABLE `eventsponsor`
  ADD CONSTRAINT `eventsponsor_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `eventss` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventsponsor_ibfk_2` FOREIGN KEY (`spID`) REFERENCES `sponsor` (`spID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`memID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectsponsor`
--
ALTER TABLE `projectsponsor`
  ADD CONSTRAINT `projectsponsor_ibfk_1` FOREIGN KEY (`devID`) REFERENCES `developmentproject` (`devID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectsponsor_ibfk_2` FOREIGN KEY (`spID`) REFERENCES `sponsor` (`spID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rep`
--
ALTER TABLE `rep`
  ADD CONSTRAINT `rep_ibfk_1` FOREIGN KEY (`repID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rep_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `eventss` (`eventID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sheep`
--
ALTER TABLE `sheep`
  ADD CONSTRAINT `sheep_ibfk_1` FOREIGN KEY (`sheepID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shepherd`
--
ALTER TABLE `shepherd`
  ADD CONSTRAINT `shepherd_ibfk_1` FOREIGN KEY (`shepID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
