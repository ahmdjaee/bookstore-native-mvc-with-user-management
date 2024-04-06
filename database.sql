-- Active: 1711665667615@@127.0.0.1@3306@bookstore-mvc-test
CREATE TABLE books (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    genre varchar(255) NOT NULL,
    release_date varchar(255) NOT NULL,
    author_id INT NOT NULL,
    pages INT NOT NULL,
    PRIMARY KEY (id)
);

DROP TABLE books;

SELECT
    *
FROM
    books
LIMIT
    6 OFFSET 5;

CREATE TABLE authors (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    birthdate DATE NOT NULL,
    place_of_birth varchar(255) NOT NULL,
    PRIMARY KEY (id)
);