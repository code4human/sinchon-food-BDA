CREATE TABLE Review (
    id INT NOT NULL AUTO_INCREMENT,
    user CHAR(30) NOT NULL,
    store CHAR(30) NOT NULL,
    menu INT,
    title CHAR(30) NOT NULL,
    content TEXT NOT NULL,
    image LONGBLOB,
    rate_star INT NOT NULL,
    pub_date CHAR(30),
    CONSTRAINT Review_ID PRIMARY KEY (id),
    CONSTRAINT Review_User FOREIGN KEY (user) REFERENCES User (nickname),
    CONSTRAINT Review_Store FOREIGN KEY (store) REFERENCES Store (name),
    CONSTRAINT Review_Menu FOREIGN KEY (menu) REFERENCES Menu (id)
);