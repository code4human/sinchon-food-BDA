/*
SELECT Review.id, user_nickname, store_name, grade, pub_date, MAX(User.point) as max_point FROM Review 
JOIN User ON User.nickname = Review.user_nickname 
ORDER BY point DESC, Review.pub_date DESC LIMIT 1;
*/

SELECT b.user_nickname, a.point, a.rank, b.store_name, b.grade, b.pub_date
FROM (SELECT nickname, point,
    RANK() OVER (ORDER BY point DESC) AS rank
FROM User
ORDER BY point DESC, STR_TO_DATE(signup_date, '%Y-%m-%d %H:%i:%s') DESC
LIMIT 5) as a
JOIN (SELECT Review.id, user_nickname, store_name, grade, pub_date FROM Review) as b
ON a.nickname = b.user_nickname
ORDER BY a.point DESC, b.pub_date DESC LIMIT 1;