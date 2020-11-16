CREATE TABLE User (
    id INT NOT NULL AUTO_INCREMENT,
    email CHAR(80) NOT NULL,
    pass CHAR(20) NOT NULL,
    nickname CHAR(30) NOT NULL,
    signup_date CHAR(30),
    point INT DEFAULT 0,
    CONSTRAINT User_ID PRIMARY KEY (id),
    CONSTRAINT User_Email UNIQUE (email),
    CONSTRAINT User_Nickname UNIQUE (nickname)
);
