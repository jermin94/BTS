CREATE USER 'adminpark'@'localhost' IDENTIFIED BY 'secret';
GRANT SELECT , INSERT ON * . * TO 'adminpark'@'localhost';