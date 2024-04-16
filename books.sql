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
)