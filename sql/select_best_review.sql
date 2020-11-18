-- If the number of hits is the same, sort by recent date
SELECT id, user, store, hit, pub_date 
FROM Review 
ORDER BY hit DESC, pub_date DESC
LIMIT 1;