--
-- Database: `Products`
--
CREATE DATABASE IF NOT EXISTS `Products`;
USE `Products`;

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
  `ISBN` varchar(20) NOT NULL PRIMARY KEY,
  `publisher` varchar(128) DEFAULT NULL,
  `img` varchar(64) DEFAULT NULL,
  `category` varchar(32) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`title`, `author`, `edition`, `price`, `year`, `ISBN`, `publisher`, `img`, `category`) VALUES
('The Psychology of Judgment and Decision Making', 'Scott Plous', '1st edition', 30, 1993, '978-0070504776', 'McGraw-Hill', '/imgs/BS-1.jpg', 'BS'),
('An Introduction to Women''s Studies: Gender in a Transnational World', 'Inderpal Grewal, Caren Kaplan Associate Professor Women & Gender', '2nd edition', 55, 2005, '978-0072887181', 'McGraw-Hill Education', '/imgs/SS-10.jpg', 'SS'),
('Understanding Human Sexuality', 'Janet Hyde, John DeLamater', '12th edition', 30, 2013, '978-0078035395', 'McGraw-Hill Education', '/imgs/BS-2.jpg', 'BS'),
('Drugs, Brain, and Behavior', 'David M. Grilly, John Salamone', '6th edition', 60, 2011, '978-0205750528', 'Pearson', '/imgs/BS-4.jpg', 'BS'),
('Urban Enclaves: Identity And Place In America', ' Mark Abrahamson, Sabra Scribner, Rod Hernandez', '1st edition', 40, 1996, '978-0312114992', 'St. Martin''s Press', '/imgs/SS-6.jpg', 'SS'),
('Genetic Analysis: An Integrative Approach', 'Mark F. Sanders, John L. Bowman', '1st edition', 15, 2011, '978-0321732507', 'Benjamin Cummings', '/imgs/BS-7.jpg', 'BS'),
('Justice: What''s the Right Thing to Do?', ' Michael J. Sandel', 'Reprint edition', 10, 2010, '978-0374532505', 'Farrar, Straus and Giroux', '/imgs/SS-2.jpg', 'SS'),
('Discover Biology', 'Richard Symanski', '6th edition', 100, 2015, '978-0393601169', 'University of California, Irvine', '/imgs/BS-10.jpg', 'BS'),
('Psychological Science', 'Michael Gazzaniga', '6th edition', 40, 2018, '978-0393640342', 'W. W. Norton & Company', '/imgs/BS-3.jpg', 'BS'),
('Social Entrepreneurship', ' Constant Beugre', '1st Edition', 50, 2016, '978-0415817370', 'Routledge', '/imgs/SS-8.jpg', 'SS'),
('Essential Environmental Science', 'Edward A. Keller, Daniel B. Botkin', '1st edition', 20, 2007, '978-0471704119', 'Wiley', '/imgs/BS-5.jpg', 'BS'),
('Reader for Race and Ethnicity', ' Chuck O''Connell', '3rd edition', 20, 2003, '978-0536706997', 'Pearson', '/imgs/SS-1.jpg', 'SS'),
('Lehninger Principles of Biochemistry', 'David L. Nelson, Michael M. Cox', '4th edition', 45, 2004, '978-0716762652', 'W. H. Freeman', '/imgs/BS-8.jpg', 'BS'),
('The Sociology of Organizations: Classic, Contemporary, and Critical Readings', ' Michael J. Handel', '1st edition', 60, 2002, '978-0761987666', 'SAGE Publications, Inc', '/imgs/SS-7.jpg', 'SS'),
('Introduction to Criminal Justice: A Sociological Perspective', ' Charis E. Kubrin, Thomas Stucky', '1st Edition', 30, 2013, '978-0804762601', 'Stanford Social Sciences', '/imgs/SS-9.jpg', 'SS'),
('Inequality, Power and School Success: Case Studies on Racial Disparity and Opportunity in Education', ' Gilberto Conchas, Michael Gottfried', '1st edition', 55, 2015, '978-1138837881', 'Routledge', '/imgs/SS-4.jpg', 'SS'),
('Biology: Bio 93', 'Campbell, Reece, Urry, Wasserman, Minorsky, Jackson', '5th edition', 5, 2011, '978-1256131359', 'Benjamin Cummings', '/imgs/BS-9.jpg', 'BS'),
('Biological Science Biology 94', 'Allison, Black, Podgorski, Quillin, Monroe, and Taylor Freeman', '5th edition', 70, 2014, '978-1323000984', 'University of California, Irvine', '/imgs/BS-6.jpg', 'BS'),
('Attached: The New Science of Adult Attachment and How It Can Help You Find - and Keep - Love', ' Amir Levine, Rachel Heller', '1st edition', 15, 2012, '978-1585429134', 'TarcherPerigee', '/imgs/SS-3.jpg', 'SS'),
('The Power of Perception: Leadership, Emotional Intelligence, and the Gender Divide', ' Shawn Andrews Ed.D. M.B.A.', '1st edition', 10, 2018, '978-1683505792', 'Morgan James Publishing', '/imgs/SS-5.jpg', 'SS');


CREATE TABLE IF NOT EXISTS `Categories` (
    `cid` VARCHAR(3) PRIMARY KEY,
    `category` VARCHAR(64) NOT NULL
) ENGINE = InnoDB;

INSERT INTO `Categories` (`cid`, `category`) VALUES
('BS', 'Biological Science'),
('SS', 'Social Science');
