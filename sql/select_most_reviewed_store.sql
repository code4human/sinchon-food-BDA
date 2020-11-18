SELECT name 
FROM Store 
    JOIN (SELECT store, COUNT(*) AS store_count 
            FROM Review 
            GROUP BY store 
            ORDER BY store_count DESC LIMIT 3) As b 
    ON b.store = Store.name;