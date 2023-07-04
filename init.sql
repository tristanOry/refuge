/*
 ATTENTION : Le mot de passe du script est faible et doit être changé.
 */
CREATE DATABASE IF NOT EXISTS `filemon`;
CREATE USER 'filemon_adm'@'localhost' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON localhost.`filemon` TO 'filemon_adm';