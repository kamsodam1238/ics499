DROP SCHEMA IF EXISTS Catalogue;
CREATE SCHEMA Catalogue;
CREATE TABLE Catalogue.Books
(
    ID int NOT NULL AUTO_INCREMENT,
    title varchar(50),
    format varchar(50), # Hardcover, Softcover
    yearRealeased int,
    countryOfOrigin varchar(50),
    language varchar(20),
    description varchar(250),
    totalQuant int,
    quantInStock int, 
    leadCreative varchar(50), #Author, named this way to keep in line with search
    otherAuthors varchar(250),
    distributor varchar(50), #Publisher, named this way to keep in line with search
    edition varchar(25),
    ISBN varchar(20),
    deweyDecimal varchar(10),
    PRIMARY KEY (ID)
);

CREATE TABLE Catalogue.Movies
(
ID int NOT NULL AUTO_INCREMENT,
    title varchar(50),
    format varchar(50), # Blu-ray, 4k Blu-ray, 3D Blu-ray, DVD
    yearRealeased int,
    countryOfOrigin varchar(50),
    language varchar(20),
    description varchar(250),
    totalQuant int,
    quantInStock int,
    leadCreative varchar(50), #Director, named this way to keep in line with search
    lengthInMins int,
    leadActor varchar(50),
    otherActors varchar(200),
    distributor varchar(50),
    PRIMARY KEY (ID)
);

CREATE TABLE Catalogue.ItemSearch
(
	ID int,
	title varchar(50),
    format varchar(50),
    yearRealeased int,
    leadCreative varchar(50),
    distributor varchar(50),
    PRIMARY KEY (ID)
);

DELIMITER //
CREATE TRIGGER after_books_insert
AFTER INSERT ON Catalogue.Books
FOR EACH ROW
BEGIN
    INSERT INTO Catalogue.ItemSearch (ID, title, format, yearReleased, leadCreative, distributor)
    VALUES (NEW.ID, NEW.title, NEW.format, NEW.yearReleased, NEW.leadCreative, NEW.distributor);
END;
DELIMITER ;

INSERT INTO books(title,format) VALUES
('Brave New World','Softcover'),
('1984','Softcover'),
('The Art of War','Hardcover');

INSERT INTO movies(title,format) VALUES
('Seven Samurai','Blu-ray'),
('Citizen Kane','DVD'),
('Madam Web','4K Blu-ray');

DROP SCHEMA IF EXISTS Users;
CREATE SCHEMA Users;

Create Table Users.logon
(ID int NOT NULL AUTO_INCREMENT,
Username varchar(50),
Pass varchar(50)
);

Create Table Users.Info
(ID int,
streetAddress varchar(50),
city varchar(30),
state varchar(20),
country varchar(20),
balance double);

Insert INTO Users.logon (Username,Pass) values
('Jimothee','passwords!!2'),
('Userneam','aspwrods');

Insert INTO Users.Info (streetAddress, city, state, country, balance) values
('123 Sesame Street','New York City','New York','USA', 2.50),
('2367 Road Street','St Pierre','South Dakota','USA', 0.00);
