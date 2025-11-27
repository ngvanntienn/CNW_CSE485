CREATE TABLE Books (
 BookID INT PRIMARY KEY,
 Title VARCHAR(255),
 PublishedYear INT,
 Genre VARCHAR(100)
);
INSERT INTO books (BookID, Title, PublishedYear, Genre)
VALUES
 (1, 'Data Science', 2021, 'Non-Fiction'),
 (2, 'Deep Learning', 2019, 'Non-Fiction'),
 (3, 'Gone with Wind', 1936, 'Fiction');