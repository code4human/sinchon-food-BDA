CREATE TABLE Menu (
    id INT NOT NULL AUTO_INCREMENT,
    store CHAR(30) NOT NULL,
    name CHAR(30) NOT NULL,
    k_name CHAR(30) NOT NULL,
    price INT NOT NULL,
    detail TEXT,
    image LONGBLOB,
    CONSTRAINT Menu_ID PRIMARY KEY (id),
    CONSTRAINT Menu_Store_Name UNIQUE (store, name),
    CONSTRAINT Menu_FK_Store FOREIGN KEY (store) REFERENCES Store (name) 
        ON DELETE CASCADE ON UPDATE CASCADE
);