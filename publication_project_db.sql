-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2019 at 05:26 PM
-- Server version: 5.7.11-0ubuntu6
-- PHP Version: 7.0.4-7ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publication_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `cid` varchar(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `location` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `other_details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`cid`, `name`, `location`, `date`, `other_details`) VALUES
('0704', 'IEEE TENSYMP', 'Kochi, Kerala', '2017-07-01', ''),
('0717', 'IEEE International Conference on Communications, Network and Satellite', 'Bali, Indonesia', '2012-07-01', ''),
('1457', 'IEEE TENCON', 'Kochi, Kerala', '2019-10-01', ''),
('1668', 'International Conference on Advances in Computing, Communications and Informatics', 'Bangalore, India', '2018-09-01', ''),
('2024', '2016 IEEE Trustcom/BigDataSE/ISPA', 'Tianjin, China', '2016-08-01', ''),
('2114', '6th International Conference on Advances in Computing and Communications', 'Kochi, India', '2016-09-01', ''),
('2592', '8th International Conference on Security of Information and Networks', 'Sochi, Russian Federation', '2015-09-01', ''),
('2803', '8th International Conference on Human Computer Interaction', 'BITS-Pilani, India', '2016-12-27', ''),
('3199', '12th International Conference on Information and Systems Security', 'MNIT-Jaipur, India', '2016-12-01', ''),
('3210', 'VLSI Design Conference', '', '2016-01-01', ''),
('3481', 'VLSI Design Conference', '', '2010-01-01', ''),
('3645', 'IEEE TrustCom 2018', 'New York, USA', '2018-07-01', ''),
('3947', 'IEEE 16th International Conference on BioInformatics and BioEngineering', 'Taichung, Taiwan', '2016-10-01', ''),
('4217', '4th International Conference on Information Assurance and Security', 'Naples, Italy', '2008-07-01', ''),
('4315', '21st IEEE International Conference on Microelectronic Test Structures', 'Edinburgh, Scotland', '2008-03-01', ''),
('4354', '10th International Conference on Information and Systems Security', 'IDRBT, Hyderabad, India', '2014-12-01', ''),
('4369', 'IEEE TechSym', 'Kharagpur, India', '2014-02-01', ''),
('4458', 'International Conference on Embedded Software (EMSOFT)', 'Torino, Italy', '2018-09-01', ''),
('5176', 'Design Automation and Test in Europe', '', '2004-01-01', ''),
('5222', 'IEEE Indicon', 'Kochi, India', '2012-12-01', ''),
('5497', '9th ACM International Conference on Future Energy Systems', 'Karlsruhe, Germany', '2018-06-01', ''),
('5731', '2nd International Conference on Security in Computer Networks and Distributed Systems', 'Thiruvanthapuram, India', '2014-03-01', ''),
('5734', '2nd International Conference on Security of Information and Networks', 'Gazimagusa, North Cyprus', '2009-10-01', ''),
('5883', '24th International Conference on Database and Expert Systems Applications', 'Prague, Czech Republic', '2013-08-01', ''),
('6062', 'IEEE World Congress on Computational Intelligence', 'Rio de Janeiro, Brazil', '2018-07-01', ''),
('6602', 'International Conference on Communication Systems & NetworkS', 'Bengaluru, India', '2018-01-01', ''),
('7193', '17th ACM Conference on Embedded Networked Sensor Systems', 'New York, USA', '2019-11-01', ''),
('7376', '1st International Workshop on Network and Communications Security', 'Chennai, India', '2009-12-01', ''),
('7531', 'Integrated Circuit and System Design. Power and Timing Modeling, Optimization and Simulation', '', '2006-01-01', ''),
('7799', '14th International Conference on Information Systems Security', 'Bengaluru, India', '2018-12-01', ''),
('8556', '14th ACM Symposium on Access Control Models and Technologies', 'Gazimagusa, Stresa, Italy', '2009-07-01', ''),
('8867', '22nd International Conference on Pattern Recognition', 'Stockholm, Sweden', '2014-08-01', ''),
('8932', 'The 32nd International Conference on VLSI Design', 'Delhi, India', '2019-01-01', ''),
('8940', 'VLSI Design and Test Symposium', '', '2015-01-01', ''),
('9172', 'International Conference on Computing: Theory and Applications', '', '2007-01-01', ''),
('9575', '2nd International Symposium on Security in Computing and Communications', 'Greater Noida, India', '2014-09-01', ''),
('9663', '4th International Conference on Information Systems Security', 'Hyderabad, India', '2008-12-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `conf_authors`
--

CREATE TABLE `conf_authors` (
  `centryid` varchar(5) NOT NULL,
  `fid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conf_authors`
--

INSERT INTO `conf_authors` (`centryid`, `fid`) VALUES
('3584', '0323'),
('0153', '1294'),
('0493', '1294'),
('1414', '1294'),
('2088', '1294'),
('2149', '1294'),
('2156', '1294'),
('2239', '1294'),
('2824', '1294'),
('4668', '1294'),
('8451', '1294'),
('9002', '1294'),
('0282', '1658'),
('2257', '1658'),
('3217', '1658'),
('5105', '1658'),
('5151', '1658'),
('5157', '1658'),
('5987', '1658'),
('7221', '1658'),
('7841', '1658'),
('7851', '1658'),
('8356', '1658'),
('9626', '3272'),
('0153', '3511'),
('0282', '3511'),
('0493', '3511'),
('0844', '3511'),
('1414', '3511'),
('1467', '3511'),
('1853', '3511'),
('2088', '3511'),
('2149', '3511'),
('2156', '3511'),
('2239', '3511'),
('2257', '3511'),
('2346', '3511'),
('2824', '3511'),
('3582', '3511'),
('3584', '3511'),
('3855', '3511'),
('3887', '3511'),
('3918', '3511'),
('4027', '3511'),
('4118', '3511'),
('4375', '3511'),
('4668', '3511'),
('5029', '3511'),
('5587', '3511'),
('5987', '3511'),
('6044', '3511'),
('6051', '3511'),
('6176', '3511'),
('6623', '3511'),
('7221', '3511'),
('7657', '3511'),
('7774', '3511'),
('7828', '3511'),
('8356', '3511'),
('8451', '3511'),
('8796', '3511'),
('8955', '3511'),
('9002', '3511'),
('9626', '3511');

-- --------------------------------------------------------

--
-- Table structure for table `conf_pubs`
--

CREATE TABLE `conf_pubs` (
  `centryid` varchar(5) NOT NULL,
  `title` varchar(500) NOT NULL,
  `cid` varchar(5) NOT NULL,
  `authors` varchar(500) NOT NULL,
  `volpp` varchar(50) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `other_details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conf_pubs`
--

INSERT INTO `conf_pubs` (`centryid`, `title`, `cid`, `authors`, `volpp`, `accepted`, `other_details`) VALUES
('0153', 'Fast Implementation of Steady State NSGA-II', '6062', 'Sumit Mishra, Samrat Mondal and Sriparna Saha', 'pp. 3777-3784', 0, ''),
('0282', 'Intelligent Scheduling of Smart Appliances in Energy Efficient Buildings: A Practical Approach', '8932', 'Nilotpal Chakraborty, Arijit Mondal and Samrat Mondal', '', 1, ''),
('0493', 'An Automatic Framework for Entity Matching in Bibliographic Databases', '6062', 'Sumit Mishra, Sriparna Saha and Samrat Mondal', 'pp. 271-278', 0, ''),
('0844', 'Towards Formal Security Analysis of GTRBAC using Timed Automata', '8556', 'Samrat Mondal, Shamik Sural and Vijayalakshmi Atluri', 'pp. 33-42', 0, ''),
('1414', 'MBOS: Modified Best Order Sort Algorithm for Performing Non-dominated Sorting', '6062', 'Sumit Mishra, Sriparna Saha and Samrat Mondal', '', 1, ''),
('1467', 'Few notes towards making honeyword system more secure and usable', '2592', 'Nilesh Chakraborty and Samrat Mondal', 'pp.237-245', 0, ''),
('1853', 'Security Analysis of Temporal-RBAC using Timed Automata', '4217', 'Samrat Mondal and Shamik Sural', 'pp. 37-40', 0, ''),
('2088', 'Entity Matching Technique for Bibliographic Database', '5883', 'Sumit Mishra, Samrat Mondal and Sriparna Saha', 'pp. 34-41', 0, ''),
('2149', 'Unsupervised Method to Ensemble Results of Multiple Clustering Solutions for Bibliographic Data', '6062', 'Sumit Mishra, Sriparna Saha and Samrat Mondal', 'pp. 1459-1466', 0, ''),
('2156', 'Cluster Validation Techniques for Bibliographic Databases', '4369', 'Sumit Mishra, Sriparna Saha and Samrat Mondal', 'pp. 93-98', 0, ''),
('2239', 'Obtaining the upper bound on the number of non-dominated fronts in a Population', '1668', 'Sumit Mishra, Sriparna Saha and Samrat Mondal', '', 1, ''),
('2257', 'Multi-Objective Heuristic Charge Scheduling and Eco-Routing Mechanism for Electric Vehicles', '5497', 'Nilotpal Chakraborty, Arijit Mondal and Samrat Mondal', 'pp. 468-470', 0, ''),
('2346', 'SG-PASS: A Safe Graphical Password Scheme to Resist Shoulder Surfing and Spyware Attack', '2803', 'Suryakanta Panda and Samrat Mondal', 'pp. 27-38', 0, ''),
('2824', 'On Evaluation of Entity Matching Techniques for Bibliographic Database', '1668', 'Sumit Mishra, Sriparna Saha and Samrat Mondal', '', 1, ''),
('3217', 'A framework for estimating peak power in gate level circuits', '7531', 'Diganchal Chakraborty, P. P. Chakrabarti, Arijit Mondal, Pallab Dasgupta', '', 0, ''),
('3582', 'Supporting Negative Authorization in Spatiotemporal Role Based Access Control', '7376', 'Samrat Mondal and Shamik Sural', 'pp. 422-427', 0, ''),
('3584', 'An Unsupervised Heuristic Based Approach for Author Name Disambiguation', '6602', 'KM Pooja, Samrat Mondal and Joydeep Chandra', '', 0, ''),
('3855', 'SGP: A Safe Graphical Password System Resisting Shoulder-Surfing Attack on Smartphones', '7799', 'Suryakanta Panda and Samrat Mondal', '', 1, ''),
('3887', 'On Designing a Questionnaire Based Honeyword Generation Approach for Achieving Flatness', '3645', 'Nilesh Chakraborty, Shreya Singh and Samrat Mondal', 'pp. 444-455', 0, ''),
('3918', 'A Location Sensitive Access Control System', '5222', 'Vasu Devulapalli and Samrat Mondal', 'pp. 379-384', 0, ''),
('4027', 'Tag Digit Based Honeypot to Detect Shoulder Surfing Attack', '9575', 'Nilesh Chakrabory and Samrat Mondal', 'pp.101-110', 0, ''),
('4118', 'CETD: An Efficient Clustering Based Energy Theft Detection Technique in Smart Grid', '0704', 'Aditya Gupta, Nilotpal Chakraborty and Samrat Mondal', '', 0, ''),
('4375', 'On Designing Leakage-Resilient Vibration Based Authentication Techniques', '2024', 'Nilesh Chakraborty, S.Vijay Anand, Gurpinder Randhawa and Samrat Mondal', 'pp. 1875 - 1881', 0, ''),
('4668', 'A Many Objective Optimization Based Entity Matching Framework for Bibliographic Database', '1457', 'Sumit Mishra, Sriparna Saha, and Samrat Mondal', '', 1, ''),
('5029', 'XML -Based Policy Specification Framework for Spatiotemporal Access Control', '5734', 'Samrat Mondal and Shamik Sural', 'pp. 98-103', 0, ''),
('5105', 'A New Approach to Timing Analysis using Event Propagation and Temporal Logic', '5176', 'Arijit Mondal, P. P. Chakrabarti and C. R. Mandal', '', 0, ''),
('5151', 'Performance optimization of real timecontrol systems using variable time period', '8940', 'Jaishree Mayank, Arijit Mondal', '', 0, ''),
('5157', 'Partitioned Fair Round Robin: A Fast andAccurate QoS Aware Scheduler for Embedded Systems', '3210', 'Arnab Sarkar, Arijit Mondal', '', 0, ''),
('5587', 'A Verification Framework for Temporal RBAC with Role Hierarchy', '9663', 'Samrat Mondal and Shamik Sural', 'pp. 140-147', 0, ''),
('5987', 'MinPeak: An Intelligent Scheduler for Non-Preemptive Appliances in Smart Grid', '0704', 'Nilotpal Chakraborty, Arijit Mondal and Samrat Mondal', '', 0, ''),
('6044', 'An Improved Methodology Towards Providing Immunity Against Weak Shoulder Surfing Attack', '4354', 'Nilesh Chakrabory and Samrat Mondal', 'pp. 298-317', 0, ''),
('6051', 'Towards Improving Storage Cost and Security Features of Honeyword Based Approaches', '2114', 'Nilesh Chakraborty and Samrat Mondal', 'Vol: 93, pp. 799-807', 0, ''),
('6176', 'SPOSS: Secure Pin-based-authentication Obviating Shoulder Surng', '3199', 'Ankit Maheshwari and Samrat Mondal', 'pp. 66-86', 0, ''),
('6623', 'SLASS: Secure Login Against Shoulder Surfing', '5731', 'Nilesh Chakraborty and Samrat Mondal', 'pp. 346-357', 0, ''),
('7221', 'Towards Optimal Scheduling of Thermal Comfortability and Smoothening of Load Profile in Energy Efficient Buildings', '4458', 'Nilotpal Chakraborty, Arijit Mondal and Samrat Mondal', '', 1, ''),
('7657', 'Color Pass: An Intelligent User Interface to Resist Shoulder Surfing Attack', '4369', 'Nilesh Chakraborty and Samrat Mondal', 'pp. 13-18', 0, ''),
('7774', 'Detecting Policy Misconfigurations in Temporal Domain Using Object Priority', '0717', 'Madhu Sankeerth Dammati and Samrat Mondal', 'pp. 147-151', 0, ''),
('7828', 'MobSecure: A Shoulder Surng Safe Login Approach Implemented On Mobile Device', '2114', 'Nilesh Chakraborty, Gurpinder Singh Randhawa, Kuntal Das and Samrat Mondal', 'Vol: 93, pp. 854-861', 0, ''),
('7841', 'Accelerating Synchronous Sequential Circuits using an Adaptive Clock', '3481', 'Arijit Mondal, P. P. Chakrabarti and Pallab Dasgupta', '', 0, ''),
('7851', 'Timing analysis of sequential circuits using symbolic event propagation', '9172', 'Arijit Mondal, P. P. Chakrabarti and Pallab Dasgupta', '', 0, ''),
('8356', 'Coordinated Scheduling of Residential Appliances and Heterogeneous Energy Sources in a Smart Microgrid', '7193', 'Pranay Kumar Saha, Nilotpal Chakraborty, Arijit Mondal and Samrat Mondal', '', 1, ''),
('8451', 'On Validation of Clustering Techniques for Bibliographic Databases', '8867', 'Sumit Mishra, Sriparna Saha and Samrat Mondal', 'pp. 3150-3155', 0, ''),
('8796', 'drPass: A Dynamic and Reusable Password Generator Protocol', '7799', 'Suryakanta Panda and Samrat Mondal', '', 1, ''),
('8955', 'A Novel High Speed Automatic Layout System to Place and Route Test Structures for Parametric Test Capability', '4315', 'Andrew J. West, Samrat Mondal, Devjyoti Patra, Kalyan Goswami and Shamik Sural', 'pp. 71-75', 0, ''),
('9002', 'Divide and Conquer Based Non-dominated Sorting for Parallel Environment', '6062', 'Sumit Mishra, Sriparna Saha and Samrat Mondal', 'pp. 4297-4304', 0, ''),
('9626', 'CRDT: Correlation Ratio Based Decision Tree Model for Healthcare Data Mining', '3947', 'Smita Roy, Samrat Mondal, Asif Ekbal and Maunendra Sankar Desarkar', 'pp. 36-43', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` varchar(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `name`, `email`) VALUES
('0323', 'Joydeep Chandra', 'joydeep@iitp.ac.in'),
('1271', 'Pushpak Bhattacharyya', 'pb@iitp.ac.in'),
('1294', 'Sriparna Saha', 'sriparna@iitp.ac.in'),
('1658', 'Arijit Mondal', 'arijit@iitp.ac.in'),
('2094', 'Raju Halder', 'halder@iitp.ac.in'),
('2724', 'Mayank Agarwal', 'mayank265@iitp.ac.in'),
('3272', 'Asif Ekbal', 'asif@iitp.ac.in'),
('3511', 'Samrat Mondal', 'samrat@iitp.ac.in'),
('3577', 'Somanath Tripathy', 'som@iitp.ac.in'),
('5325', 'Suman Kumar Maji', 'smaji@iitp.ac.in'),
('6282', 'Sourav Kumar Dandapat', 'sourav@iitp.ac.in'),
('7715', 'Rajiv Misra', 'rajivm@iitp.ac.in'),
('8037', 'Abyayananda Maiti', 'abyaym@iitp.ac.in'),
('8113', 'Jimson Mathew', 'jimson@iitp.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `jid` varchar(5) NOT NULL,
  `name` varchar(500) NOT NULL,
  `other_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`jid`, `name`, `other_details`) VALUES
('0426', 'Elsevier Applied Soft Computing', ''),
('1654', 'IET Information Security', ''),
('1809', 'IEEE Transactions on Industrial Informatics', ''),
('2353', 'Computers and Security', ''),
('2445', 'IEEE Access Journal', ''),
('3204', 'Journal of Information Assurance and Security (Special issue on Access Control and Protocols)', ''),
('3343', 'Elsevier Computers & Security', ''),
('3478', 'Elsevier Expert Systems with Applications', ''),
('3687', 'IEEE\r\nTransaction on Computer Aided Design of Integrated Circuits and Systems', ''),
('3892', 'IEEE Transactions on Semiconductor Manufacturing', ''),
('4406', 'Wiley Journal of the Association for Information Science and Technology', ''),
('5411', 'Transactions on Computational Science (Special Issue in Security in Computing)', ''),
('5716', 'IEEE Systems Journal', ''),
('6167', 'International Journal of Trust Management in Computing and Communications', ''),
('6286', 'Transactions on Large-Scale Data and Knowledge-Centered Systems', ''),
('6361', 'IET Circuit, Device and Systems', ''),
('6536', 'ACM Transactions on Design Automation of Electronic Systems', ''),
('7833', 'Elsevier Swarm and Evolutionary Computation', ''),
('8694', 'Springer Applied Intelligence', ''),
('9127', 'Fundamenta Informaticae', '');

-- --------------------------------------------------------

--
-- Table structure for table `journal_authors`
--

CREATE TABLE `journal_authors` (
  `jentryid` varchar(5) NOT NULL,
  `fid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_authors`
--

INSERT INTO `journal_authors` (`jentryid`, `fid`) VALUES
('2534', '0323'),
('0796', '1294'),
('1086', '1294'),
('2025', '1294'),
('2121', '1294'),
('3114', '1294'),
('3228', '1294'),
('6613', '1294'),
('7816', '1294'),
('0528', '1658'),
('0645', '1658'),
('3554', '1658'),
('5354', '1658'),
('7148', '1658'),
('7821', '1658'),
('8187', '3272'),
('0528', '3511'),
('0645', '3511'),
('0796', '3511'),
('1086', '3511'),
('1555', '3511'),
('1746', '3511'),
('2025', '3511'),
('2121', '3511'),
('2126', '3511'),
('2534', '3511'),
('3114', '3511'),
('3228', '3511'),
('4905', '3511'),
('5313', '3511'),
('5482', '3511'),
('6385', '3511'),
('6458', '3511'),
('6613', '3511'),
('7148', '3511'),
('7671', '3511'),
('7816', '3511'),
('8187', '3511'),
('8852', '3511');

-- --------------------------------------------------------

--
-- Table structure for table `journal_pubs`
--

CREATE TABLE `journal_pubs` (
  `jentryid` varchar(5) NOT NULL,
  `title` varchar(500) NOT NULL,
  `jid` varchar(5) NOT NULL,
  `authors` varchar(500) NOT NULL,
  `volpp` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `other_details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_pubs`
--

INSERT INTO `journal_pubs` (`jentryid`, `title`, `jid`, `authors`, `volpp`, `date`, `accepted`, `other_details`) VALUES
('0528', 'Intelligent Scheduling of Thermostatic Devices for Efficient Energy Management in Smart Grid', '1809', 'Nilotpal Chakraborty, Arijit Mondal and Samrat Mondal', 'Vol: 13, Issue: 6, pp. 2899-2910', '2017-12-01', 0, ''),
('0645', 'Efficient Scheduling of Non-Preemptive Appliances for Peak Load Optimization in Smart Grid', '1809', 'Nilotpal Chakraborty, Arijit Mondal and Samrat Mondal', 'vol. PP, no. 99, pp. 1-1', '2017-01-01', 0, ''),
('0796', 'Towards Obtaining Upper Bound on Sensitivity Computation Process for Cluster Validity Measures', '9127', 'Sumit Mishra, Samrat Mondal and Sriparna Saha', 'Vol: 163, No: 4, pp:351-374', '2018-08-01', 0, ''),
('1086', 'GBOS: Generalized Best Order Sort Algorithm for Non-dominated Sorting', '7833', 'Sumit Mishra, Samrat Mondal, Sriparna Saha, and Carlos A. Coello Coello', 'Vol: 43,pp: 244-264', '2018-06-01', 0, ''),
('1555', 'Role Based Access Control with Spatiotemporal Context for Mobile Applications', '5411', 'Subhendu Aich, Samrat Mondal, Shamik Sural and Arun Kumar Majumdar', 'Volume: 4, pp. 177-199', '2009-04-01', 0, ''),
('1746', 'I-SLASS : An Improved Login Approach Over SLASS', '6167', 'Nilesh Chakraborty and Samrat Mondal', 'Volume: 2, No. 4, pp. 309-329', '2014-01-01', 0, ''),
('2025', 'Improved Solution to the Non-Domination Level Update Problem', '0426', 'Sumit Mishra, Samrat Mondal and Sriparna Saha', 'Vol: 60, pp: 336-362', '2017-01-01', 0, ''),
('2121', 'Divide-and-Conquer Based Non-dominated Sorting with Reduced Comparisons', '7833', 'Sumit Mishra, Sriparna Saha, Samrat Mondal and Carlos A. Coello Coello', '', '2019-09-01', 1, ''),
('2126', 'On overcoming the identified limitations of a usable PIN entry method', '2445', 'Nilesh Chakraborty, Jianqiang Li, Samrat Mondal and Fei Chen, Yi Pan', '', '2019-08-01', 1, ''),
('2534', 'A Graph Combination with Edge Pruning based Approach for Author Name Disambiguation', '4406', 'KM Pooja, Samrat Mondal, and Joydeep Chandra', '', '2019-01-01', 1, ''),
('3114', 'A Multiobjective Optimization based Entity Matching Technique for Bibliographic Databases', '3478', 'Sumit Mishra, Sriparna Saha and Samrat Mondal', 'Vol: 65, pp. 100-115', '2016-01-01', 0, ''),
('3228', 'GAEMTBD: Genetic Algorithm based Entity Matching Techniques for Bibliographic Databases', '8694', 'Sumit Mishra, Sriparna Saha and Samrat Mondal', 'Vol: 47, No. 1, pp. 197-230', '2017-01-01', 0, ''),
('3554', 'Symbolic Event Propagation Based Minimal Test Set Generation for Robust Path Delay Faults', '6536', 'Arijit Mondal, P. P. Chakrabarti, Pallab Dasgupta', 'Volume 17 Issue 4', '2012-10-04', 0, ''),
('4905', 'Towards Incorporating Honeywords In n-Session Recording Attack Resilient Unaided Authentication Services', '1654', 'Nilesh Chakraborty and Samrat Mondal', 'Vol: 13, Issue 1, pp: 7-18', '2019-01-01', 0, ''),
('5313', 'HoneyString : An Improved Methodology Over Tag Digit Based Honeypot To Detect Shoulder Surng Attack', '6167', 'Nilesh Chakraborty and Samrat Mondal', 'Volume 3, No.2, pp.93 - 114', '2015-01-01', 0, ''),
('5354', 'Statistical static timing analysis using symbolic event propagation', '6361', 'Arijit Mondal, P. P. Chakrabarti, Pallab Dasgupta', 'Vol 1, No 4, pages 283-291', '2007-01-01', 0, ''),
('5482', 'On Designing A Modied-UI Based Honeyword Generation Approach For Overcoming The Existing Limitations', '2353', 'Nilesh Chakraborty and Samrat Mondal', 'Vol: 66, pp. 155-168', '2017-01-01', 0, ''),
('6385', 'Security Analysis of GTRBAC and its Variants using Model Checking', '2353', 'Samrat Mondal, Shamik Sural and Vijayalakshmi Atluri', 'Volume: 30, Issues: 2-3, pp. 128-147', '2011-01-01', 0, ''),
('6458', 'Towards Identifying and Preventing Behavioral Side Channel Attack On Recording Attack Resilient Unaided Authentication Services', '3343', 'Nilesh Chakraborty, Vijay S. Anand and Samrat Mondal', '', '2019-03-01', 1, ''),
('6613', 'Sensitivity- An Important Facet of Cluster Validation Process for Entity Matching Technique', '6286', 'Sumit Mishra, Samrat Mondal and Sriparna Saha', 'Vol: 29, pp. 1-39, 2016', '2016-01-01', 0, ''),
('7148', 'Multi-Objective Optimal Scheduling Framework for HVAC Devices in Energy Efficient Buildings', '5716', 'Nilotpal Chakraborty, Arijit Mondal and Samrat Mondal', '', '2019-08-07', 1, ''),
('7671', 'Integrated Procedure Automating Test Chip Layout, Place and Route, and Test Plan Development for Efficient Parametric Device and Process Designs', '3892', 'Ann Gabrys, Wendy Greig, Andrew J. West, Philipp lindorfer, William French, Samrat Mondal, Devjyoti Patra, Kalyan Goswami, Shamik Sural and Timothy Crandle', 'Volume: 22, Issue: 1, pp. 110-118', '2009-02-01', 0, ''),
('7816', 'A Divide-and-Conquer based Efficient Non-dominated Sorting Approach', '7833', 'Sumit Mishra, Sriparna Saha, Samrat Mondal and Carlos A. Coello Coello', 'Vol: 44,pp: 748-773', '2019-02-01', 0, ''),
('7821', 'Reasoning about timing behavior of digital using symbolic event propagation and temporal logic', '3687', 'Arijit Mondal, P. P. Chakrabarti', 'Vol 25, No. 9, pages 1973-1814', '2006-01-01', 0, ''),
('8187', 'Dispersion Ratio Based Decision Tree Model for Classification', '3478', 'Smita Roy, Samrat Mondal, Asif Ekbal and Maunendra Sankar Desarkar', 'Vol: 116, pp.1-9', '2019-02-01', 0, ''),
('8852', 'Security Analysis of RBAC with Temporal Constraints - A Model Checking Approach', '3204', 'Samrat Mondal and Shamik Sural', 'Volume: 4, Issue: 4, pp. 319-328', '2009-01-01', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pid` varchar(5) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pi` varchar(5) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL COMMENT 'in rupees',
  `duration` int(11) DEFAULT NULL COMMENT 'in months',
  `other_details` varchar(200) NOT NULL,
  `completed` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pid`, `title`, `pi`, `cost`, `duration`, `other_details`, `completed`) VALUES
('3277', 'Design and FPGA prototyping of multicarrier multiple access schemes for variable rate multimedia satellite communication', NULL, NULL, NULL, 'Principal Investigator - Dr. Preetam Kumar and Dr. Kailash Chandra Ray', 0),
('5341', 'Development of an efficient authentication scheme to be used in public domain.', '3511', 1604000, 36, '', 1),
('9376', 'Development of Planning and Designing Tool for Smartly Adopting Electric Vehicles in Indian Cities.', '3511', 5742000, 36, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_co_pi`
--

CREATE TABLE `project_co_pi` (
  `pid` varchar(5) NOT NULL,
  `fid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_co_pi`
--

INSERT INTO `project_co_pi` (`pid`, `fid`) VALUES
('3277', '1658'),
('9376', '1658'),
('9376', '8113');

-- --------------------------------------------------------

--
-- Table structure for table `sponsored_by`
--

CREATE TABLE `sponsored_by` (
  `pid` varchar(5) NOT NULL,
  `sid` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsored_by`
--

INSERT INTO `sponsored_by` (`pid`, `sid`) VALUES
('9376', '0824'),
('5341', '3801'),
('3277', '5168');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sid` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sid`, `name`) VALUES
('0824', 'IMPRINT-2 DST/SERB'),
('3801', 'Science & Engineering Research Board (SERB)'),
('5168', 'DEIT, Delhi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `conf_authors`
--
ALTER TABLE `conf_authors`
  ADD PRIMARY KEY (`centryid`,`fid`),
  ADD KEY `conf_authors_ibfk_2` (`fid`);

--
-- Indexes for table `conf_pubs`
--
ALTER TABLE `conf_pubs`
  ADD PRIMARY KEY (`centryid`),
  ADD KEY `cid_index` (`cid`) USING BTREE;

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`jid`) USING BTREE,
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `journal_authors`
--
ALTER TABLE `journal_authors`
  ADD PRIMARY KEY (`jentryid`,`fid`),
  ADD KEY `journal_authors_ibfk_2` (`fid`);

--
-- Indexes for table `journal_pubs`
--
ALTER TABLE `journal_pubs`
  ADD PRIMARY KEY (`jentryid`),
  ADD KEY `jid_index` (`jid`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `pi_index` (`pi`);

--
-- Indexes for table `project_co_pi`
--
ALTER TABLE `project_co_pi`
  ADD PRIMARY KEY (`pid`,`fid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `sponsored_by`
--
ALTER TABLE `sponsored_by`
  ADD PRIMARY KEY (`pid`,`sid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conf_authors`
--
ALTER TABLE `conf_authors`
  ADD CONSTRAINT `conf_authors_ibfk_1` FOREIGN KEY (`centryid`) REFERENCES `conf_pubs` (`centryid`),
  ADD CONSTRAINT `conf_authors_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `conf_pubs`
--
ALTER TABLE `conf_pubs`
  ADD CONSTRAINT `conf_pubs_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `conferences` (`cid`);

--
-- Constraints for table `journal_authors`
--
ALTER TABLE `journal_authors`
  ADD CONSTRAINT `journal_authors_ibfk_1` FOREIGN KEY (`jentryid`) REFERENCES `journal_pubs` (`jentryid`),
  ADD CONSTRAINT `journal_authors_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `journal_pubs`
--
ALTER TABLE `journal_pubs`
  ADD CONSTRAINT `journal_pubs_ibfk_1` FOREIGN KEY (`jid`) REFERENCES `journals` (`jid`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`pi`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `project_co_pi`
--
ALTER TABLE `project_co_pi`
  ADD CONSTRAINT `project_co_pi_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `projects` (`pid`),
  ADD CONSTRAINT `project_co_pi_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);

--
-- Constraints for table `sponsored_by`
--
ALTER TABLE `sponsored_by`
  ADD CONSTRAINT `sponsored_by_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `projects` (`pid`),
  ADD CONSTRAINT `sponsored_by_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `sponsors` (`sid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
