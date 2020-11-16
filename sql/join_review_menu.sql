-- This file is made to divide the JOIN sql command in get_review_html.php / modify_review_html.php
-- Why Join?
-- Review 테이블에서 Menu의 name을 가져오려고 하는데,
-- Menu 테이블의 name은 UK가 아니다. 
-- 모든 가게들의 메뉴를 모아둔 테이블이기 때문에 가게별로 같은 이름의 메뉴가 존재하기 때문이다.
-- 따라서 하나의 가게에서 같은 메뉴가 존재하지 않도록 가게와 메뉴 이름을 as composite unique key로 설정해놓았고,
-- 리뷰 테이블에서는 name이 unique하지 않으므로 대신 pk인 id를 외래키로 잡아온다.
-- 만약 이미 작성된 개개의 리뷰를 조회하거나 수정하려고 할 때 웹 페이지에서는 Review테이블의 menu 필드만 select해와서 보여주면 단순한 id만
-- 보여지므로 join을 수행해서 menu의 name을 보여준다.
SELECT name
FROM Menu 
    INNER JOIN Review
    ON Menu.id = Review.menu
WHERE Review.id = __;    -- '__' will be converted to the php variable $id dynamically in get_review_html.php / modify_review_html.php