CREATE TABLE 'event' (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `event` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date_picked` datetime NOT NULL,
  PRIMARY KEY (`id`)
);
