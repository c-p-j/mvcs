CREATE TABLE Apartment
(
  apartment_code VARCHAR(10),
  address VARCHAR(50) NOT NULL,
  PRIMARY KEY (apartment_code)
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
  FOREIGN KEY (model_name) REFERENCES PlantModel(model_name),
  FOREIGN KEY (apartment_code) REFERENCES Apartment(apartment_code),
  KEY(name)
);

CREATE TABLE Installs
(
  dateTime DATETIME NOT NULL,
  plant_id INT NOT NULL,
  operator_id INT NOT NULL,
  PRIMARY KEY (plant_id, operator_id),
  FOREIGN KEY (plant_id) REFERENCES Plant(plant_id),
  FOREIGN KEY (operator_id) REFERENCES Operator(operator_id),
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
  FOREIGN KEY (plant_id) REFERENCES Plant(plant_id),
  FOREIGN KEY (model_name) REFERENCES SensorModel(model_name)
);