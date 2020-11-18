SELECT id, user, store, rate_star, pub_date
FROM Review
	JOIN (SELECT nickname, MAX(point) AS max_point 
		FROM User) AS b
	ON b.nickname = Review.user
ORDER BY pub_date DESC
LIMIT 1;