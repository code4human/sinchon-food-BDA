USE team11;

-- Category table data 
INSERT INTO Category (id, name, ko_name) VALUES
	(1, 'chicken', '치킨'),
	(2, 'korean', '한식'),
	(3, 'snack', '분식'),
	(4, 'japanese', '일식'),
	(5, 'chinese', '중식'),
	(6, 'italian', '이탈리안'),
	(7, 'thai/vietnamese', '태국/베트남식'),
	(8, 'lunch_box', '도시락'),
	(9, 'fast_food', '패스트푸드'),
	(10, 'pizza', '피자'),
	(11, 'bossam', '보쌈'),
	(12, 'dessert', '디저트');


-- Store table data 
INSERT INTO Store (id, category_name, name, ko_name, address) VALUES
	(1, 'thai/vietnamese', 'Mibundang', '미분당', '서울특별시 서대문구 창천동 72-23'),
  (2, 'japanese', 'Sio', '시오', '서울특별시 서대문구 연희동 190-4'),
  (3, 'chinese', 'Hwasang sonmandu', '화상손만두', '서울특별시 서대문구 연희동 132-28'),
  (4, 'chinese', 'Mokran', '목란', '서울특별시 서대문구 연희동 190-4'),
  (5, 'italian', 'Lagoosikdang', '라구식당', '서울특별시 서대문구 창천동 2-42'),
  (6, 'chinese', 'Mr.Seowangmandu_leedaejeom', '미스터서왕만두 이대점', '서울특별시 서대문구 대현동 27-20'),
  (7, 'japanese', 'Gikku sushi', '기꾸스시', '서울특별시 서대문구 창천동 72-23'),
  (8, 'thai/vietnamese', 'Bangkok Express_2nd Store', '방콕익스프레스 2호점', '서울특별시 서대문구 대현동 104-25'),
  (9, 'korean', 'Sosinisso', '소신이쏘', '서울특별시 서대문구 창천동 57-39'),
  (10, 'dessert', 'Mother In Law Bagel', '마더린러베이글', '서울특별시 서대문구 대현동 56-23');


-- Menu table data 
INSERT INTO Menu (id, store_name, name, ko_name, price) VALUES
  (1, 'Mibundang', 'beef brisket rice noodles', '차돌박이 쌀국수', 8000),
  (2, 'Mibundang', 'beef flank rice noodles', '양지 쌀국수', 8500),
  (3, 'Mibundang', 'beef brisket&flank rice noodles', '차돌 양지 쌀국수', 9500),

  (4, 'Sio', 'tricolor yakidori lunch', '삼색야끼도리 런치', 13000),
  (5, 'Sio', 'Hiyashichu (Japanese cold noodles)', '히야시추(일본냉면)', 13000),
  (6, 'Sio', 'Salmon over rice', '시오연어덮밥', 13000),

  (7, 'Hwasang sonmandu', 'fried dumpling', '튀김만두', 5000),
  (8, 'Hwasang sonmandu', 'assorted dumpling', '모둠만두', 8000),

  (9, 'Mokran', 'steamed pork(small)', '동파육(소)', 45000),
  (10, 'Mokran', 'chili shrimp', '칠리새우', 40000),
  (11, 'Mokran', 'fried shrimp bread(small)', '멘보샤(소)', 35000),

  (12, 'Lagoosikdang', 'pasta', '라구파스타', 13000),
  (13, 'Lagoosikdang', 'lasagna', '라자냐', 14000),
  (14, 'Lagoosikdang', 'bowl salad', '볼 샐러드', 3000),

  (15, 'Mr.Seowangmandu_leedaejeom', 'soup dumpling', '소룡포', 5000),
  (16, 'Mr.Seowangmandu_leedaejeom', 'steamed dumpling', '찐만두', 5000),
  (17, 'Mr.Seowangmandu_leedaejeom', 'fried dumpling', '군만두', 6000),

  (18, 'Gikku sushi', 'Gikku basic sushi', '기꾸초밥', 9000),
  (19, 'Gikku sushi', 'assorted sushi', '모듬초밥', 13000),
  (20, 'Gikku sushi', 'salmon sushi', '연어초밥', 15000),

  (21, 'Bangkok Express_2nd Store', 'fried mud crab curry', '뿌팟퐁커리', 13500),
  (22, 'Bangkok Express_2nd Store', 'chicken green curry', '치킨그린커리', 8500),
  (23, 'Bangkok Express_2nd Store', 'stir-fried minced pork with basil', '원 팟카오무쌈', 9000),

  (24, 'Sosinisso', 'spicy beef ribs for 1 serving', '매운소갈비찜 1인분', 14000),
  (25, 'Sosinisso', 'cream sausage beef ribs for 1 serving', '크림소갈비찜 1인분', 14500),
  (26, 'Sosinisso', 'spicy beef ribs for weekdays lunch', '평일점심 매운소갈비찜', 8500),
  
  (27, 'Mother In Law Bagel', 'italian club bagel', '이탈리안클럽', 6700),
  (28, 'Mother In Law Bagel', 'filly cheese steak sandwich', '필리치즈 스테이크 샌드위치', 6700),
  (29, 'Mother In Law Bagel', 'smoked salmon sandwich', '훈제연어 샌드위치(NOVA)', 7400);