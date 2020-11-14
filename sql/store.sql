CREATE TABLE Store (
    id INT NOT NULL AUTO_INCREMENT,
    category CHAR(30) NOT NULL,
    name CHAR(30) NOT NULL,
    k_name CHAR(30) NOT NULL,
    address VARCHAR(200) NOT NULL,
    detail TEXT,
    image LONGBLOB,
    CONSTRAINT Store_ID PRIMARY KEY (id),
    CONSTRAINT Store_Name UNIQUE (name),
    CONSTRAINT Store_KName UNIQUE (k_name),
    CONSTRAINT Store_FK_Category FOREIGN KEY (category) REFERENCES Category (name) 
        ON DELETE CASCADE ON UPDATE CASCADE
);