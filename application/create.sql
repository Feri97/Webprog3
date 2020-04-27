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