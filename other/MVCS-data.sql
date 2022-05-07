LOAD DATA LOCAL INFILE 'C:\\Users\\ciurdas.patrick\\Desktop\\xampp_7_4_24\\htdocs\\mvcs\\other\\mvcs.apartments.csv' 
    INTO TABLE apartment
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\r\n';

LOAD DATA LOCAL INFILE 'C:\\Users\\ciurdas.patrick\\Desktop\\xampp_7_4_24\\htdocs\\mvcs\\other\\mvcs.operators.csv' 
    INTO TABLE operator
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\r\n';
    
LOAD DATA LOCAL INFILE 'C:\\Users\\ciurdas.patrick\\Desktop\\xampp_7_4_24\\htdocs\\mvcs\\other\\mvcs.plantmodels.csv' 
    INTO TABLE plantmodel
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\r\n';

LOAD DATA LOCAL INFILE 'C:\\Users\\ciurdas.patrick\\Desktop\\xampp_7_4_24\\htdocs\\mvcs\\other\\mvcs.sensormodels.csv' 
    INTO TABLE sensormodel
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\r\n';

LOAD DATA LOCAL INFILE 'C:\\Users\\ciurdas.patrick\\Desktop\\xampp_7_4_24\\htdocs\\mvcs\\other\\mvcs.plants.csv' 
    INTO TABLE plant
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\r\n';

LOAD DATA LOCAL INFILE 'C:\\Users\\ciurdas.patrick\\Desktop\\xampp_7_4_24\\htdocs\\mvcs\\other\\mvcs.sensors.csv'
    INTO TABLE sensor
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\r\n';