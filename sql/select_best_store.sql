-- To find the best restaurant(reasonable price, many reviews, high grade)
SELECT Review.store, COUNT(*) AS review_count, AVG(price) AS avg_price, AVG(rate_star) AS avg_rate_star
FROM Review
    JOIN Menu
    ON Review.store = Menu.store
GROUP BY Menu.store
ORDER BY avg_price ASC, review_count DESC, avg_rate_star DESC
LIMIT 1;