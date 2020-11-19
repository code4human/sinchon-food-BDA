SELECT id, user_nickname, store_name, grade, pub_date
FROM Review
	JOIN (SELECT nickname, MAX(point) AS max_point 
		FROM User) AS b
	ON b.nickname = Review.user_nickname
ORDER BY pub_date DESC
LIMIT 1;