-- 1. Create the database
CREATE DATABASE IF NOT EXISTS user_registration;
USE user_registration;

-- 2. Users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    uname VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    city VARCHAR(100),
    state VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Books table
CREATE TABLE IF NOT EXISTS Books (
    ID INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    format VARCHAR(50),                         -- Hardcover, Softcover, etc.
    yearReleased INT,
    countryOfOrigin VARCHAR(50),
    language VARCHAR(20),
    description TEXT,
    totalQuant INT DEFAULT 0,
    quantInStock INT DEFAULT 0,
    leadCreative VARCHAR(100),
    otherAuthors VARCHAR(255),
    distributor VARCHAR(100),
    edition VARCHAR(25),
    ISBN VARCHAR(20) UNIQUE,
    deweyDecimal VARCHAR(10),
    PRIMARY KEY (ID)
);

