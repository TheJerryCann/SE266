
CREATE TABLE IF NOT EXISTS games (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        title VARCHAR(100) DEFAULT NULL,
		publisher VARCHAR(50) DEFAULT NULL,
        releaseDate DATE,
        totalAchievements INT,
        earnedAchievements INT,
        rating INT
        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;