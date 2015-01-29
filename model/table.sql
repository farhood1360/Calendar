CREATE DATABASE 'calendar';

CREATE TABLE 'event' (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `event` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date_picked` date NOT NULL,
  `time_picked` time NOT NULL,
  PRIMARY KEY (`id`)
);
