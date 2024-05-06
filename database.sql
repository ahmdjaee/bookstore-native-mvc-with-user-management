-- Active: 1711665667615@@127.0.0.1@3306@bookstore-mvc-test
USE bookstore - mvc - test;

CREATE TABLE books (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    genre varchar(255) NOT NULL,
    release_date varchar(255) NOT NULL,
    author_id INT NOT NULL,
    pages INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (author_id) REFERENCES authors(id)
);

ALTER TABLE
    books
ADD
    synopsis TEXT;

ALTER TABLE
    books
ADD
    publisher_id INT NOT NULL,
ADD
    price BIGINT NOT NULL,
ADD
    stock INT NOT NULL;

ALTER TABLE
    books
ADD
    FOREIGN KEY (publisher_id) REFERENCES publishers(id);

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

SELECT
    b.name,
    b.genre,
    b.synopsis,
    b.release_date,
    a.name AS author
FROM
    books AS b
    INNER JOIN authors AS a ON b.author_id = a.id
LIMIT
    2 OFFSET 0;

CREATE TABLE publishers (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    address varchar(255) NOT NULL,
    PRIMARY KEY (id)
) ;
CREATE TABLE genres(
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
)