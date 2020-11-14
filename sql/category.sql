CREATE TABLE Category (
    id INT NOT NULL AUTO_INCREMENT,
    name CHAR(30) NOT NULL,
    k_name CHAR(30) NOT NULL,
    CONSTRAINT Category_ID PRIMARY KEY (id),
    CONSTRAINT Category_Name UNIQUE (name),
    CONSTRAINT Category_KName UNIQUE (k_name)
);