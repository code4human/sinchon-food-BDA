USE team11;

-- User table data (this is not dynamic user data for presentation)
INSERT INTO User (id, email, pass, nickname, signup_date, point) VALUES
	(1, 'abc@gmail.com', 'abcabc', 'abc', '2020-11-14 20:19:27', 0),
	(2, 'choco@gmail.com', 'chocochoco', 'choco', '2020-11-14 21:19:27', 0),
    (3, 'coke@gmail.com', 'cokecoke', 'coke', '2020-11-15 22:20:27', 0),
    (4, 'hot6@gmail.com', 'hot6hot6', 'hot6', '2020-11-16 13:19:27', 100),
    (5, 'coffee@gmail.com', 'coffeecoffee', 'coffee', '2020-11-17 20:19:27', 100),
    (6, 'bda@gmail.com', 'bdabda', 'bda', '2020-11-18 20:15:27', 100),
    (7, 'bda_love@gmail.com', 'bda_lovebda_love', 'bda_love', '2020-11-18 20:19:27', 200),
    (8, 'phplover@gmail.com', 'phploverphplover', 'phplover', '2020-11-16 14:19:27', 200),
    (9, 'web@gmail.com', 'webweb', 'web', '2020-11-14 20:19:27', 300);


-- Review table data (this is not dynamic user data for presentation)
INSERT INTO Review (id, user_nickname, store_name, menu_id, title, content, image, grade, pub_date, hit) VALUES
	(1, 'hot6', 'Mibundang', 1, 'Goooood', 'Goooood Goooood Goooood', NULL, 5, '2020-11-16 23:19:27', 9 ),
	(2, 'coffee', 'Sio', 4, 'so so', 'so so .....', NULL, 3, '2020-11-16 12:19:27', 20),
    (3, 'bda', 'Hwasang sonmandu', 7, 'It was amazing!', 'It was amazing!!!!', NULL, 5, '2020-11-17 11:19:27', 10),
    (4, 'bda_love', 'Mokran', 9, 'tasty', 'tasty tasty tasty', NULL, 4, '2020-11-18 15:19:27', 4),
    (5, 'bda_love', 'Gikku sushi', 18, "Not bad. That's it.", 'Not bad.', NULL, 2, '2020-11-19 14:11:27', 40),
    (6, 'phplover', 'Mr.Seowangmandu_leedaejeom', 15, 'delicious~', 'delicious~~~~~', NULL, 5, '2020-11-18 05:19:27', 13),
    (7, 'phplover', 'Gikku sushi', 18, 'I like sushi.', 'Sushi is my life', NULL, 5, '2020-11-19 14:19:28', 100),
    (8, 'web', 'Bangkok Express_2nd Store', 21, 'Nice', 'Nice!!!!!', NULL, 4, '2020-11-18 09:19:27', 70),
    (9, 'web', 'Sosinisso', 24, 'wow', 'wow wow so good', NULL, 5, '2020-11-18 20:19:27', 5),
    (10, 'web', 'Sosinisso', 25, 'good!!!!', 'delicious!!!!!', NULL, 5, '2020-11-19 14:19:27', 2);