CREATE TABLE Book_Authors (
 BookID INT,
 AuthorID INT,
 FOREIGN KEY (BookID) REFERENCES Books(BookID),
 FOREIGN KEY (AuthorID) REFERENCES Authors(AuthorID)
);
INSERT INTO book_authors (BookID, AuthorID)
VALUES
 (1, 1),
 (1, 2),
 (2, 1),
 (3, 3);