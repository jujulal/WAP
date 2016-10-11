use imdb;
select * from actors; 
select id, name, year from movies;
select * from roles;

# Multi-talbe query 1: Pi
select role from roles inner join movies on movies.id = roles.movie_id where movies.name='Pi';

# Multi-table query 2: Pi Actor Names
select first_name, last_name, role from actors inner join roles on actors.id = roles.actor_id where roles.movie_id in (select id from movies where name = 'Pi')

# Multi-table query 3: Kill Bill
select first_name, last_name from actors inner join roles on actors.id = roles.actor_id where roles.movie_id in (select id from movies where name like "Kill Bill%")

## ===================================
## simpsons database

use simpsons;
select * from courses;
select * from grades;
select * from students; 
select * from teachers; 

## Excersise : CSE 143 Grades 
select grade from grades inner join courses on grades.course_id = courses.id where courses.name = 'Computer Science 143';

# Excersise : CSE 143 Grades and Name
select students.name, grade from grades inner join students on grades.student_id = students.id where grades.course_id = (select id from courses where courses.name = 'Computer Science 143') and grade < 'B-';

# Excersise: All Grades
select students.name, courses.name, grade from grades inner join students on grades.student_id = students.id inner join courses on  grades.course_id = courses.id where grade <='B-';

create table course1 
(
   course_id varchar(255),
   count int
)
## Excersise: Popular Courses
DROP TABLE IF EXISTS tmpTable;
CREATE TEMPORARY TABLE tmpTable AS
(select course_id, count(course_id) AS noOfStudents from grades group by course_id);
select name from courses INNER JOIN tmpTable ON courses.id = tmpTable.course_id where noOfStudents>=2;
