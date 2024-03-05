CREATE TABLE job_titles (
	id PRIMARY KEY NOT NULL AUTO_INCREMENT,
	title VARCHAR(40) NOT NULL
);



CREATE DATABASE blog_briezis;

USE blog_briezis;

CREATE TABLE posts (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	title VARCHAR(255) NOT NULL
);

INSERT INTO posts
(title)
VALUES
("My First Blog Post"),
("My Second Blog Post");

CREATE TABLE categories (
    id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    PRIMARY KEY (id)
);

INSERT INTO categories (name)
VALUES
('sport'),
('music'),
('food');


ALTER TABLE posts
ADD COLUMN category_id INT,
ADD FOREIGN KEY (category_id) REFERENCES categories(id);


UPDATE posts
SET category_id = (SELECT id FROM categories WHERE name = 'sport')
WHERE id = 1;

UPDATE posts
SET category_id = (SELECT id FROM categories WHERE name = 'food')
WHERE id = 2;

SELECT * FROM posts
JOIN categories
ON posts.category_id = categories.id WHERE NAME = 'sport';