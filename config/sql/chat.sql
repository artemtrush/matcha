CREATE TABLE IF NOT EXISTS chat (
    id 			INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    who 		INT(8) NOT NULL,
    whom 		INT(8) NOT NULL,
    message		VARCHAR(300) NOT NULL
)