-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2019 at 08:11 AM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Products`
--

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE IF NOT EXISTS `Books` (
  `title` varchar(255) NOT NULL,
  `author` varchar(64) NOT NULL,
  `edition` varchar(64) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `ISBN` varchar(20) NOT NULL,
  `publisher` varchar(128) DEFAULT NULL,
  `img` varchar(64) DEFAULT NULL,
  `category` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`title`, `author`, `edition`, `price`, `year`, `ISBN`, `publisher`, `img`, `category`) VALUES
('The Psychology of Judgment and Decision Making', 'Scott Plous', '1st edition', 30, 1993, '978-0070504776', 'McGraw-Hill', '/imgs/BS-1.jpg', 'BS'),
('An Introduction to Women''s Studies: Gender in a Transnational World', 'Inderpal Grewal, Caren Kaplan Associate Professor Women & Gender', '2nd edition', 55, 2005, '978-0072887181', 'McGraw-Hill Education', '/imgs/SS-10.jpg', 'SS'),
('Understanding Human Sexuality', 'Janet Hyde, John DeLamater', '12th edition', 30, 2013, '978-0078035395', 'McGraw-Hill Education', '/imgs/BS-2.jpg', 'BS'),
('Computer Networks: A Systems Approach', 'by Larry L. Peterson, Bruce S. Davie', '5th edition', 65, 2011, '978-0123850591', 'Morgan Kaufmann', '/imgs/CS-09.jpg', 'CS'),
('Computer Organization and Design: The Hardware/Software Interface', ' David A. Patterson, John L. Hennessy', '5th edition', 55, 2013, '978-0124077263', 'Morgan Kaufmann', '/imgs/CS-02.jpg', 'CS'),
('Structured Computer Organization', ' by Andrew S Tanenbaum', '6th edition', 20, 2012, '978-0132916523', 'Pearson', '/imgs/CS-08.jpg', 'CS'),
('Java How To Program', ' Paul J. Deitel, Harvey Deitel', '10th Edition', 30, 2014, '978-0133807806', 'Pearson', '/imgs/CS-03.jpg', 'CS'),
('Artificial Intelligence: A Modern Approach', '  Stuart Russell, Peter Norvig ', '3rd edition', 40, 2009, '978-0136042594', 'Pearson', '/imgs/CS-04.jpg', 'CS'),
('Drugs, Brain, and Behavior', 'David M. Grilly, John Salamone', '6th edition', 60, 2011, '978-0205750528', 'Pearson', '/imgs/BS-4.jpg', 'BS'),
('Introduction to Algorithms', ' Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, Cliff', '3rd edition', 55, 2009, '978-0262033848', 'The MIT Press', '/imgs/CS-05.jpg', 'CS'),
('Urban Enclaves: Identity And Place In America', ' Mark Abrahamson, Sabra Scribner, Rod Hernandez', '1st edition', 40, 1996, '978-0312114992', 'St. Martin''s Press', '/imgs/SS-6.jpg', 'SS'),
('The C++ Programming Language', 'Bjarne Stroustrup', '4th Edition', 20, 2013, '978-0321563842', 'Addison-Wesley Professional', '/imgs/CS-01.jpg', 'CS'),
('Genetic Analysis: An Integrative Approach', 'Mark F. Sanders, John L. Bowman', '1st edition', 15, 2011, '978-0321732507', 'Benjamin Cummings', '/imgs/BS-7.jpg', 'BS'),
('Justice: What''s the Right Thing to Do?', ' Michael J. Sandel', 'Reprint edition', 10, 2010, '978-0374532505', 'Farrar, Straus and Giroux', '/imgs/SS-2.jpg', 'SS'),
('Discover Biology', 'Richard Symanski', '6th edition', 100, 2015, '978-0393601169', 'University of California, Irvine', '/imgs/BS-10.jpg', 'BS'),
('Psychological Science', 'Michael Gazzaniga', '6th edition', 40, 2018, '978-0393640342', 'W. W. Norton & Company', '/imgs/BS-3.jpg', 'BS'),
('Social Entrepreneurship', ' Constant Beugre', '1st Edition', 50, 2016, '978-0415817370', 'Routledge', '/imgs/SS-8.jpg', 'SS'),
('Essential Environmental Science', 'Edward A. Keller, Daniel B. Botkin', '1st edition', 20, 2007, '978-0471704119', 'Wiley', '/imgs/BS-5.jpg', 'BS'),
('Reader for Race and Ethnicity', ' Chuck O''Connell', '3rd edition', 20, 2003, '978-0536706997', 'Pearson', '/imgs/SS-1.jpg', 'SS'),
('Lehninger Principles of Biochemistry', 'David L. Nelson, Michael M. Cox', '4th edition', 45, 2004, '978-0716762652', 'W. H. Freeman', '/imgs/BS-8.jpg', 'BS'),
('Mathematical Structures for Computer Science', 'by Judith L. Gersting', '6th edition', 35, 2006, '978-0716768647', 'W. H. Freeman', '/imgs/CS-07.jpg', 'CS'),
('The Sociology of Organizations: Classic, Contemporary, and Critical Readings', ' Michael J. Handel', '1st edition', 60, 2002, '978-0761987666', 'SAGE Publications, Inc', '/imgs/SS-7.jpg', 'SS'),
('Introduction to Criminal Justice: A Sociological Perspective', ' Charis E. Kubrin, Thomas Stucky', '1st Edition', 30, 2013, '978-0804762601', 'Stanford Social Sciences', '/imgs/SS-9.jpg', 'SS'),
('Inequality, Power and School Success: Case Studies on Racial Disparity and Opportunity in Education', ' Gilberto Conchas, Michael Gottfried', '1st edition', 55, 2015, '978-1138837881', 'Routledge', '/imgs/SS-4.jpg', 'SS'),
('Biology: Bio 93', 'Campbell, Reece, Urry, Wasserman, Minorsky, Jackson', '5th edition', 5, 2011, '978-1256131359', 'Benjamin Cummings', '/imgs/BS-9.jpg', 'BS'),
('Foundations Of Algorithms', ' by Richard Neapolitan', '5th edition', 70, 2014, '978-1284049190', 'Jones & Bartlett Learning', '/imgs/CS-06.jpg', 'CS'),
('Management of Information Security', ' by Michael E. Whitman, Herbert J. Mattord ', '5th edition', 55, 2016, '978-1305501256', 'Cengage Learning', '/imgs/CS-10.jpg', 'CS'),
('Biological Science Biology 94', 'Allison, Black, Podgorski, Quillin, Monroe, and Taylor Freeman', '5th edition', 70, 2014, '978-1323000984', 'University of California, Irvine', '/imgs/BS-6.jpg', 'BS'),
('Attached: The New Science of Adult Attachment and How It Can Help You Find - and Keep - Love', ' Amir Levine, Rachel Heller', '1st edition', 15, 2012, '978-1585429134', 'TarcherPerigee', '/imgs/SS-3.jpg', 'SS'),
('The Power of Perception: Leadership, Emotional Intelligence, and the Gender Divide', ' Shawn Andrews Ed.D. M.B.A.', '1st edition', 10, 2018, '978-1683505792', 'Morgan James Publishing', '/imgs/SS-5.jpg', 'SS');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
  `cid` varchar(3) NOT NULL,
  `category` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`cid`, `category`) VALUES
('BS', 'Biological Science'),
('CS', 'Computer Science'),
('SS', 'Social Science');

-- --------------------------------------------------------

--
-- Table structure for table `OrderInfo`
--

CREATE TABLE IF NOT EXISTS `OrderInfo` (
  `ISBN` varchar(20) NOT NULL,
  `order_num` int(11) NOT NULL,
  `firstname` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `ship_method` varchar(32) NOT NULL,
  `ccard_name` varchar(32) NOT NULL,
  `ccard_num` varchar(32) NOT NULL,
  `ccard_date` varchar(8) NOT NULL,
  `ccard_code` int(11) NOT NULL,
  `ccard_zip` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `OrderInfo`
--
ALTER TABLE `OrderInfo`
  ADD PRIMARY KEY (`order_num`),
  ADD KEY `ISBN` (`ISBN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `OrderInfo`
--
ALTER TABLE `OrderInfo`
  MODIFY `order_num` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Books`
--
ALTER TABLE `Books`
  ADD CONSTRAINT `Books_ibfk_1` FOREIGN KEY (`category`) REFERENCES `Categories` (`cid`) ON DELETE SET NULL;

--
-- Constraints for table `OrderInfo`
--
ALTER TABLE `OrderInfo`
  ADD CONSTRAINT `OrderInfo_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `Books` (`ISBN`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
