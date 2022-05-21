LOAD DATA LOCAL INFILE 'E:\\xampp\\htdocs\\mvcs\\other\\mvcs.apartments.csv' 
    INTO TABLE apartment
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\n';

LOAD DATA LOCAL INFILE 'E:\\xampp\\htdocs\\mvcs\\other\\mvcs.operators.csv' 
    INTO TABLE operator
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\n';
    
LOAD DATA LOCAL INFILE 'E:\\xampp\\htdocs\\mvcs\\other\\mvcs.plantmodels.csv' 
    INTO TABLE plantmodel
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\n';

LOAD DATA LOCAL INFILE 'E:\\xampp\\htdocs\\mvcs\\other\\mvcs.sensormodels.csv' 
    INTO TABLE sensormodel
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\n';

LOAD DATA LOCAL INFILE 'E:\\xampp\\htdocs\\mvcs\\other\\mvcs.plants.csv' 
    INTO TABLE plant
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\n';

LOAD DATA LOCAL INFILE 'E:\\xampp\\htdocs\\mvcs\\other\\mvcs.sensors.csv'
    INTO TABLE sensor
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\n';

LOAD DATA LOCAL INFILE 'E:\\xampp\\htdocs\\mvcs\\other\\mvcs.users.csv'
    INTO TABLE users
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\n';