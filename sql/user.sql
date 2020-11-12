create table User (
    id int NOT NULL AUTO_INCREMENT,
    email char(80) NOT NULL,
    password char(20) NOT NULL,
    nickname char(30) NOT NULL,
    join_date char(30),
    point int,
    CONSTRAINT User_ID PRIMARY KEY (id),
    CONSTRAINT User_Email UNIQUE (email),
    CONSTRAINT User_Nickname UNIQUE (nickname)
);
