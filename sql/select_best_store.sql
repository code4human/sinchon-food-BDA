-- To find the best restaurant(reasonable price, many reviews, high grade)
SELECT Review.store_name, COUNT(*) AS review_count, AVG(price) AS avg_price, AVG(grade) AS avg_grade
FROM Review
    JOIN Menu
    ON Review.store_name = Menu.store_name
GROUP BY Menu.store_name
ORDER BY avg_price ASC, review_count DESC, avg_grade DESC
LIMIT 1;