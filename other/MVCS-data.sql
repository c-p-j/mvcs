LOAD DATA LOCAL INFILE 'mvcs.apartments.csv' IGNORE
    INTO TABLE apartment
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\n';

LOAD DATA LOCAL INFILE 'mvcs.operators.csv' IGNORE
    INTO TABLE operator
    FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' ESCAPED BY '\\' LINES TERMINATED BY '\n';