# Translation table structure

CREATE TABLE `Translations` (
  `bundle` varchar(255) NOT NULL DEFAULT 'default' COMMENT 'Bundle key of this translation',
  `locale` varchar(128) NOT NULL DEFAULT '' COMMENT 'Locale of target translation',
  `key` varchar(255) NOT NULL DEFAULT '' COMMENT 'Content identifier',
  `value` text NOT NULL COMMENT 'Translated literal',
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  PRIMARY KEY (`bundle`,`locale`,`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
