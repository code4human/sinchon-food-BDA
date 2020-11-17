-- Fetch point top 5 ranking 

/*
SELECT nickname, point
FROM User 
ORDER BY point DESC 
LIMIT 5;
*/

-- If the point is high equally, the person who recently joined is a more active customer.
SELECT nickname, point,
    RANK() OVER (ORDER BY point DESC) AS rank
FROM User
ORDER BY point DESC, STR_TO_DATE(signup_date, '%Y-%m-%d %H:%i:%s') DESC
LIMIT 5;