-- To recommend user's taste
-- After finding the most food categories among user-written reviews, 
-- I recommend the restaurant with the most reviews in that category.
-- 회원이 리뷰를 많이 남긴 카테고리(ex.태국식)에서 가장 많은 리뷰를 갖는 가게 추천

SELECT a.store_name FROM

(SELECT * FROM Store 
    JOIN (SELECT store_name, COUNT(*) AS store_count 
        FROM Review 
        GROUP BY store_name) AS b 
        ON b.store_name = Store.name
        ORDER BY store_count DESC) AS a

RIGHT JOIN 

(SELECT DISTINCT Store.category_name, Review.user_nickname, 
    COUNT(Store.category_name) OVER(PARTITION BY Store.category_name ) AS count_category
        FROM Review
	    JOIN Store 
	    ON Review.store_name = Store.name
    WHERE Review.store_name = Store.name AND Review.user_nickname = &&   -- doubled '&' will be converted dynamically to the php variable $id dynamically in list_analysis_html.php
    ORDER BY count_category DESC) AS b

ON a.category_name = b.category_name

LIMIT 1;



