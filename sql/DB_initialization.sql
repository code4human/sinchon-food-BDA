CREATE DATABASE team11;
USE team11;


CREATE TABLE User (
    id INT NOT NULL AUTO_INCREMENT,
    email CHAR(80) NOT NULL UNIQUE,
    pass CHAR(20) NOT NULL,
    nickname CHAR(30) NOT NULL UNIQUE,
    signup_date CHAR(30),
    point INT DEFAULT 0,
    PRIMARY KEY (id)
);


CREATE TABLE Category (
    id INT NOT NULL AUTO_INCREMENT,
    name CHAR(30) NOT NULL UNIQUE,
    ko_name CHAR(30) NOT NULL UNIQUE,
    PRIMARY KEY (id)
);


CREATE TABLE Store (
    id INT NOT NULL AUTO_INCREMENT,
    category_name CHAR(30) NOT NULL,
    name CHAR(50) NOT NULL UNIQUE,
    ko_name CHAR(50) NOT NULL UNIQUE,
    address VARCHAR(200) NOT NULL,
    detail TEXT,
    image LONGBLOB,
    PRIMARY KEY (id),
    FOREIGN KEY (category_name) REFERENCES Category (name) 
        ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE Menu (
    id INT NOT NULL AUTO_INCREMENT,
    store_name CHAR(50) NOT NULL,
    name CHAR(100) NOT NULL,
    ko_name CHAR(50) NOT NULL,
    price INT NOT NULL,
    detail TEXT,
    image LONGBLOB,
    PRIMARY KEY (id),
    CONSTRAINT Menu_Store_Name UNIQUE (store_name, name),
    FOREIGN KEY (store_name) REFERENCES Store (name) 
        ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE Review (
    id INT NOT NULL AUTO_INCREMENT,
    user_nickname CHAR(30) NOT NULL,
    store_name CHAR(50) NOT NULL,
    menu_id INT,
    title CHAR(30) NOT NULL,
    content TEXT NOT NULL,
    image LONGBLOB,
    grade INT NOT NULL,
    pub_date CHAR(30),
    hit INT DEFAULT 0,
    PRIMARY KEY (id),
    FOREIGN KEY (user_nickname) REFERENCES User (nickname),
    FOREIGN KEY (store_name) REFERENCES Store (name),
    FOREIGN KEY (menu_id) REFERENCES Menu (id)
);