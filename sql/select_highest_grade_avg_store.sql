SELECT store_name, AVG(grade) AS grade_avg
FROM Review 
GROUP BY store_name
ORDER BY grade_avg DESC
LIMIT 3;