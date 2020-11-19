SELECT category_name 
FROM Store 
    JOIN (SELECT store_name, COUNT(*) AS store_count 
            FROM Review 
            GROUP BY store_name 
            ORDER BY store_count DESC LIMIT 3) As b 
    ON b.store_name = Store.name;