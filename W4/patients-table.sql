
CREATE TABLE IF NOT EXISTS patients (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        fname VARCHAR(50) DEFAULT NULL,
        lname VARCHAR(50) DEFAULT NULL,
        married TINYINT(1),
        bday DATE
        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;