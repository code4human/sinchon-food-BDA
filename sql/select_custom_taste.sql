-- To recommend user's taste
-- After finding the most food categories among user-written reviews, 
-- I recommend the restaurant with the most reviews in that category.
-- 회원이 리뷰를 많이 남긴 카테고리(ex.태국식)에서 가장 많은 리뷰를 갖는 가게 추천

/*
SELECT DISTINCT Store.category, Review.user, 
	COUNT(Store.category) OVER(PARTITION BY Store.category ) AS count_category
FROM Review
	JOIN Store 
	ON Review.store = Store.name
WHERE Review.store = Store.name AND Review.user = __   -- '__' will be converted to the php variable $id dynamically in list_analysis_html.php
ORDER BY count_category DESC
LIMIT 1;
*/

SELECT name FROM

(SELECT * FROM Store 
    JOIN (SELECT store, COUNT(*) AS store_count 
        FROM Review 
        GROUP BY store ORDER BY store_count DESC LIMIT 1) AS b 
        ON b.store = Store.name) AS a

JOIN 

(SELECT DISTINCT Store.category, Review.user, 
    COUNT(Store.category) OVER(PARTITION BY Store.category ) AS count_category
        FROM Review
	    JOIN Store 
	    ON Review.store = Store.name
    WHERE Review.store = Store.name AND Review.user = &&   -- doubled '&' will be converted dynamically to the php variable $id dynamically in list_analysis_html.php
    ORDER BY count_category DESC LIMIT 1) AS b

ON a.category = b.category;



