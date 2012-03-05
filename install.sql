CREATE TABLE IF NOT EXISTS wcf1_minecraft_usersonline (
  name varchar(32) NOT NULL,
  time datetime DEFAULT NULL,
  time_total time NOT NULL DEFAULT 00:00:00,
  online tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (name)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;