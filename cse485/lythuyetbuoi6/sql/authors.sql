CREATE TABLE Authors (
 AuthorID INT PRIMARY KEY,
 Name VARCHAR(255),
 BirthYear INT
);
INSERT INTO authors (AuthorID, Name, BirthYear)
VALUES
 (1, 'John Doe', 1975),
 (2, 'Jane Smith', 1980),
 (3, 'Mark Twain', 1835);
