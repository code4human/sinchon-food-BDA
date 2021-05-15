# sinchon-food-BDA

### ♠ The aim of this project
This is a website where you can write and share reviews about restaurants.This service analyzes students' preferences in restaurants around Ewha university using the stores’info and reviewed data. 

### ♠ Images of Website Page
1. Main page
![main_page](./README/page_image/main_page.png "main_page") 
2. Sign up
![signup_page](./README/page_image/signup_page.png "signup_page") 
3. Sign in
![signin_page](./README/page_image/signin_page.png "signin_page") 
4. Search the stores and menus
![search_page](./README/page_image/search_page.png "search_page") 
5. Get one of one of the written reviews
![review_get_page](./README/page_image/review_get_page.png "review_get_page")
6. Analyze of service data
![analysis_page](./README/page_image/analysis_page.png "analysis_page") 

### ♠ E-R Diagram
![E-R Diagram](./README/db_image/erd.png "E-R Diagram") 

### ♠ File Structure
#### Direcory of `php`
![DIR_php](./README/structure_image/DIR_php.png "DIR_php") 

- `config.php` contains the DB settings info.

- In `php` directory, there are the common files for website’s header, main section and footer.

- The functions and template files are organized by each other directory – `user`, `review`, `search`, `analysis`. 

- Files containing role of html are attached the suffix `‘_html’` in the file name.

- Through many `php` files, `INSERT`, `DELETE`, `UPDATE`, `SELECT` in the website are used.

#### Direcory of `sql`, `js`, `css`
![DIR_sql_js_css](./README/structure_image/DIR_sql_js_css.png "DIR_sql_js_css") 

- `DB_initialization.sql` contains the script for creating database and tables. 

- `DB_insertion.sql` is for inserting table data. `DB_temp_insertion.sql` is to insert the temporary data about user and review for presentation.

- Simple and short sql scripts were used directly within the `php` file, only the complex or long ones(`RANK`, `COUNT`, `MAX`, `AVG`, `PARTITION BY`, `GROUP BY`, `JOIN`) were separated into sql files.

- Javascript code is necessary to check the html form data and alert to user before executing sql queries.

- Styles were applied to websites for good usability.

### ♠ File Information
##### Files for DB Configuration (included by many other files)
![0_config_file](./README/file_image/0_config_file.png "0_config_file") 
##### Files for Main Page on the website 'Recent Activity' Tab
![1_mainpage_file](./README/file_image/1_mainpage_file.png "1_mainpage_file") 
##### Files for Signup Page on the website header
![2_user_file1](./README/file_image/2_user_file1.png "2_user_file1") 
##### Files for Signin Page on the website header
![2_user_file2](./README/file_image/2_user_file2.png "2_user_file2") 
##### Files for Modify User Info Page on the website header
![2_user_file3](./README/file_image/2_user_file3.png "2_user_file3") 
##### Files for Write a Review on the website 'Review' Tab
![3_review_file1](./README/file_image/3_review_file1.png "3_review_file1") 
##### Files for List Reviews, Get one Review on the website 'Reviews' Tab
![3_review_file2](./README/file_image/3_review_file2.png "3_review_file2") 
##### Files for Modify and Delete Review on the website 'Reviews' Tab
![3_review_file3](./README/file_image/3_review_file3.png "3_review_file3") 
##### Files for Search on the website 'Search' Tab
![4_search_file](./README/file_image/4_search_file.png "4_search_file") 
##### Files for List Analysis on the website 'Analysis' Tab
![5_analysis_file](./README/file_image/5_analysis_file.png "5_analysis_file") 