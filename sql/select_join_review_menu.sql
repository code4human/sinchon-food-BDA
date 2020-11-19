-- [WARNING] This file is made to divide the JOIN sql command in get_review_html.php / modify_review_html.php
-- Why JOIN Operation?
-- I wanna get the name of menu from the Review table, but the Review table has only id of menu.
-- It's because the name in the Menu table is not UK alone, so it is not able to be a FK.
-- The name in the Menu table is just a member of the composite UK with store in the same table.
-- (A store should not have the same name of menu.)
-- So in the Review table, the FK referring to Menu table is the id of Menu table.
-- When a user try to see or modify individual reviews that have already been written, 
-- the php(web page) shows the name of menu by performing JOIN,
-- not to show the id of menu in Review table.

SELECT Menu.name
FROM Menu 
    JOIN Review
    ON Menu.id = Review.menu_id
WHERE Review.id = __;    -- '__' will be converted to the php variable $id dynamically in get_review_html.php / modify_review_html.php