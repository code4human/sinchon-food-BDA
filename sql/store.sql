CREATE TABLE Store (
    id INT NOT NULL AUTO_INCREMENT,
    category INT NOT NULL,
    name CHAR(30) NOT NULL,
    address VARCHAR(200) NOT NULL,
    detail TEXT,
    image LONGBLOB,
    CONSTRAINT Store_ID PRIMARY KEY (id),
    CONSTRAINT Store_Name UNIQUE (name),
    CONSTRAINT Store_FK_Category FOREIGN KEY (category) REFERENCES Category (id) 
        ON DELETE CASCADE ON UPDATE CASCADE
);