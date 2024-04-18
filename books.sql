CREATE TABLE IF NOT EXISTS 'book' (
    'book_id' int(10) NOT NULL,
    'book_title' varchar(255) NOT NULL,
    'book_author' varchar(255) NOT NULL,
    'book_description' varchar(1027),
    'book_length' int(5),
    'book_genre' varchar(255),
    'book_image' varchar(1027),
    PRIMARY KEY ('book_id')
);

CREATE TABLE IF NOT EXISTS 'book_issue' (
    'book_id' int(10) NOT NULL,
    'issue_id' int(10) NOT NULL,
    'availibility' BIT NOT NULL,
    'issued_to' varchar(255),
    'issued_time' varchar(255),
    'return_by' varchar(255),
    PRIMARY KEY ('issue_id')
);

INSERT INTO 'book' VALUES
(1, 'A Game Of Thrones', 'George R. R. Martin', 'The first book in A Song of Ice and Fire', 720, 'Fantasy', 'https://m.media-amazon.com/images/I/714ExofeKJL._AC_UF1000,1000_QL80_.jpg'),
(2, 'A Clash of Kings', 'George R. R. Martin', 'The second book in A Song of Ice and Fire', 1040, 'Fantasy', 'https://m.media-amazon.com/images/I/71R9pRtC6AL._AC_UF1000,1000_QL80_.jpg'),
(3, 'A Storm of Swords', 'George R. R. Martin', 'The third book in A Song of Ice and Fire', 1008, 'Fantasy', 'https://m.media-amazon.com/images/I/71hzYSMbvZL._AC_UF1000,1000_QL80_.jpg'),
(4, 'A Feast for Crows', 'George R. R. Martin', 'The fourth book in A Song of Ice and Fire', 1104, 'Fantasy', 'https://m.media-amazon.com/images/I/71wX5JhAkYL._AC_UF1000,1000_QL80_.jpg'),
(5, 'A Dance with Dragons', 'George R. R. Martin', 'The fifth book in A Song of Ice and Fire', 1152, 'Fantasy', 'https://m.media-amazon.com/images/I/71CrMiWhcDL._AC_UF1000,1000_QL80_.jpg'),
(6, 'Dune', 'Frank Herbert', 'The frist book in the Dune series', 896, 'Science Fiction', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJsO6s_O3oX-H6QDpdo5oafiXNvySAZ-z-PdoznbEYZA&s'),
(7, 'Dune Messiah', 'Frank Herbert', 'The second book in the Dune series', 352, 'Science Fiction', 'https://m.media-amazon.com/images/I/817Xh+bqwOL._AC_UF1000,1000_QL80_.jpg'),
(8, 'Children of Dune', 'Frank Herbert', 'The third book in the Dune series', 416, 'Science Fiction', 'https://m.media-amazon.com/images/I/817pAbUYBpL._AC_UF1000,1000_QL80_.jpg'),
(9, 'The Lord of the Rings', 'J. R. R. Tolkien', "The first book in The Lord of the Rings series", 1216, 'Fantasy', 'https://m.media-amazon.com/images/I/7125+5E40JL._AC_UF1000,1000_QL80_.jpg'),
(10, 'The Two Towers', 'J. R. R. Tolkien', "The second book in The Lord of the Rings series", 416, 'Fantasy', 'https://m.media-amazon.com/images/I/61JO1okOIHL._AC_UF1000,1000_QL80_.jpg'),
(11, 'The Return of the King', 'J. R. R. Tolkien', "The third book in The Lord of the Rings series", 512, 'Fantasy', 'https://m.media-amazon.com/images/I/71tDovoHA+L._AC_UF1000,1000_QL80_.jpg'),
(12, 'The Hobbit', 'J. R. R. Tolkien', "A prequel to The Lord of the Rings", 300, 'Fantasy', 'https://m.media-amazon.com/images/I/712cDO7d73L._AC_UF1000,1000_QL80_.jpg'),
(13, 'The Design of Everyday Things', 'Don Norman', 'This book explores the complex interactions between humans and everyday objects', 368, 'Technical', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYD_w4aVsG2IymZQUpYqSsR6KpSScrXQhfh7jTSHAmqg&s'),
(14, "Don't Make Me Think", 'Steve Krug', 'Guide to help understand the principles of intuitive design', 216, 'Technical', 'https://m.media-amazon.com/images/I/51sdCuqMwWL._AC_UF1000,1000_QL80_.jpg');
