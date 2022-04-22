DROP DATABASE IF EXISTS mvcsensory;
CREATE DATABASE mvcsensory;
USE mvcsensory;

CREATE TABLE Apartment
(
  apartment_code VARCHAR(10),
  address VARCHAR(50) NOT NULL,
  active_implants INT NOT NULL DEFAULT 0,
  PRIMARY KEY (apartment_code),
  CHECK(ISNULL(active_implants) || active_implants >= 0) 
);

CREATE TABLE Operator
(
  operator_id INT AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  surname VARCHAR(30) NOT NULL,
  PRIMARY KEY (operator_id)
);

CREATE TABLE PlantModel
(
  model_name VARCHAR(50) NOT NULL,
  PRIMARY KEY (model_name)
);

CREATE TABLE SensorModel
(
  model_name VARCHAR(50) NOT NULL,
  PRIMARY KEY (model_name)
);

CREATE TABLE Plant
(
  plant_id INT AUTO_INCREMENT,
  status BOOL NOT NULL,
  name VARCHAR(30) NOT NULL,
  NOR VARCHAR(500),
  model_name VARCHAR(50) NOT NULL,
  apartment_code VARCHAR(30) NOT NULL,
  PRIMARY KEY (plant_id),
  FOREIGN KEY (model_name) REFERENCES PlantModel(model_name) ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY (apartment_code) REFERENCES Apartment(apartment_code) ON UPDATE CASCADE ON DELETE RESTRICT,
  UNIQUE(name)
);

CREATE TABLE Installs
(
  dateTime DATETIME NOT NULL,
  plant_id INT NOT NULL,
  operator_id INT NOT NULL,
  PRIMARY KEY (plant_id, operator_id),
  FOREIGN KEY (plant_id) REFERENCES Plant(plant_id) ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY (operator_id) REFERENCES Operator(operator_id) ON UPDATE CASCADE ON DELETE RESTRICT,
  KEY(dateTime)
);

CREATE TABLE Sensor
(
  sensor_SN VARCHAR(50),
  status BOOL NOT NULL,
  NOR VARCHAR(500),
  plant_id INT NOT NULL,
  model_name VARCHAR(50) NOT NULL,
  PRIMARY KEY (sensor_SN),
  FOREIGN KEY (plant_id) REFERENCES Plant(plant_id) ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY (model_name) REFERENCES SensorModel(model_name) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE OR REPLACE TRIGGER FillActiveImplantsInsert AFTER INSERT  
ON plant FOR EACH ROW    
  UPDATE apartment set active_implants = (SELECT COUNT(*) FROM plant WHERE status = 1 AND apartment_code = new.apartment_code) where apartment_code = new.apartment_code;   

CREATE OR REPLACE TRIGGER FillActiveImplantsDelete AFTER DELETE  
ON plant FOR EACH ROW    
  UPDATE apartment set active_implants = (SELECT COUNT(*) FROM plant WHERE status = 1 AND apartment_code = old.apartment_code) where apartment_code = old.apartment_code;  