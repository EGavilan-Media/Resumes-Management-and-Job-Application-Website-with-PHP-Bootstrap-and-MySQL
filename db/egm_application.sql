CREATE DATABASE egm_application;

USE egm_application;

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(150) NOT NULL,
  PRIMARY KEY(admin_id)
);

CREATE TABLE `tbl_candidate` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `candidate_firstname` varchar(50) NOT NULL,
  `candidate_lastname` varchar(50) NOT NULL,
  `candidate_email` varchar(50) NOT NULL,
  `candidate_phone` varchar(10) NOT NULL,
  `candidate_address` varchar(100) NOT NULL,
  `candidate_resume` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY(candidate_id)
);

CREATE TABLE `tbl_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) DEFAULT NULL,
  `file_storage_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY(file_id)
);

CREATE TABLE `tbl_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(50) NOT NULL,
  `position_description` varchar(1000) NOT NULL,
  `position_requirement` varchar(1000) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY(position_id)
);

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

INSERT INTO `tbl_candidate` (`candidate_id`, `file_id`, `candidate_firstname`, `candidate_lastname`, `candidate_email`, `candidate_phone`, `candidate_address`, `candidate_resume`, `created_date`) VALUES
(1, 1, 'Romain', 'Bigeard', 'rbgeard@free.fr', '33(0)9 74 ', 'Nord Pas de Calais France', '', '2019-07-23 22:56:01'),
(2, 2, 'Andrea', 'Stocker', 'andrea.stocker@seri.at', '43 1 969 0', 'Garnisongasse 7/27, A-1090 Wien', '', '2019-07-23 22:58:56'),
(3, 3, 'Andreas Marcus', 'Potzner', 'a.potzner.ebs@supplyinstitute.org', '49 (0) 175', '65183 Wiesbaden; Germany', '', '2019-07-23 23:04:48');

INSERT INTO `tbl_file` (`file_id`, `file_name`, `file_storage_path`) VALUES
(1, 'Romain Bigear.pdf', 'files/Romain Bigear.pdf'),
(2, 'Stocker Andrea.pdf', 'files/Stocker Andrea.pdf'),
(3, 'Marcus Potzner.pdf', 'files/Marcus Potzner.pdf');

INSERT INTO `tbl_position` (`position_id`, `position_name`, `position_description`, `position_requirement`, `created_date`) VALUES
(1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus blandit elementum massa, et tincidunt leo efficitur eget. Aenean eu dolor elementum, feugiat erat in, mattis ex. Fusce auctor mi efficitur felis maximus auctor et vitae tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at ultricies est, non fringilla lacus. Donec ut diam id eros eleifend posuere ut a odio. Aenean eget lacinia leo. Nunc facilisis elementum nibh sed pharetra.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus blandit elementum massa, et tincidunt leo efficitur eget. Aenean eu dolor elementum, feugiat erat in, mattis ex. Fusce auctor mi efficitur felis maximus auctor et vitae tellus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at ultricies est, non fringilla lacus. Donec ut diam id eros eleifend posuere ut a odio. Aenean eget lacinia leo. Nunc facilisis elementum nibh sed pharetra.', '2019-07-23 00:52:54');