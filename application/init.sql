set old_passwords=0;
DROP USER IF EXISTS 're1d25_02_001'@'localhost';
CREATE USER 're1d25_02_001'@'localhost' 
    IDENTIFIED BY 'ssT5nusyNr7vMQX3';
GRANT USAGE ON *.* TO 're1d25_02_001'@'localhost'
REQUIRE NONE WITH 
MAX_QUERIES_PER_HOUR 0 
MAX_CONNECTIONS_PER_HOUR 0 
MAX_UPDATES_PER_HOUR 0 
MAX_USER_CONNECTIONS 0;

DROP DATABASE IF EXISTS `re1d25_02_001`;
CREATE DATABASE IF NOT EXISTS `re1d25_02_001`;
GRANT SELECT, INSERT, UPDATE, DELETE 
ON `re1d25_02_001`.* TO 're1d25_02_001'@'localhost';
 
USE `re1d25_02_001`;


CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        CONSTRAINT PK_ci_sessions PRIMARY KEY(id),
        KEY `ci_sessions_timestamp` (`timestamp`)
);

CREATE TABLE employees(
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(250) NOT NULL, 
  ssn CHAR(9) NOT NULL, 
  tin CHAR(10) NOT NULL, 
    
  CONSTRAINT PK_employees PRIMARY KEY(id),
  CONSTRAINT UQ_employees_ssn UNIQUE(ssn), 
  CONSTRAINT UQ_employees_tin UNIQUE(tin)
);

INSERT INTO employees(name, ssn, tin) VALUES ('T1', '012345678','0123456789');
INSERT INTO employees(name, ssn, tin) VALUES ('T1', '012345679','0123456781');

ALTER TABLE employees ADD photo_path VARCHAR(250) NOT NULL AFTER tin;
CREATE TABLE cities(
  id INT NOT NULL AUTO_INCREMENT,
  postal_code CHAR(4) NOT NULL,
  name VARCHAR(250) NOT NULL,
    
  CONSTRAINT PK_cities PRIMARY KEY(id)
);