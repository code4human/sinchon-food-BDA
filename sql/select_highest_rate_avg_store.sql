SELECT store, AVG(rate_star) AS rate_avg
FROM Review 
GROUP BY store
ORDER BY rate_avg DESC
LIMIT 3;