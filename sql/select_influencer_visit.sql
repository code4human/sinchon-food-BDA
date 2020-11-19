/*
SELECT Review.id, Review.user_nickname, Review.store_name, Review.grade, Review.pub_date
FROM Review
	JOIN (SELECT nickname, MAX(point) AS max_point FROM User) AS b
	ON b.nickname = Review.user_nickname
ORDER BY Review.pub_date DESC
LIMIT 1;
*/

SELECT Review.id, user_nickname, store_name, grade, pub_date, MAX(User.point) as max_point FROM Review 
JOIN User ON User.nickname = Review.user_nickname 
ORDER BY point DESC, Review.pub_date DESC LIMIT 1;