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

-- Create table for admin users
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,  -- Store hashed password
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert 3 admin users (sample plain-text passwords shown as placeholders)
INSERT INTO admin_users (username, email, password) VALUES
('samuelK', 'samk@example.com', '$2y$10$vlbFv5/tnrgdAa4SQzyP8O59ZjcsfyINoKOoqVZSpGo9sqWhFG93O'), -- password: adminpass1
('MiguelD', 'migd@example.com', '$2y$10$/oao5PGilZM..cNCFudP5.KbXT.R/GBUgM8N/5qqeGv45kgA1fCOC'), -- password: adminpass2
('HaoT', 'haot@example.com', '$2y$10$eMDwT0omu7KIksswY1cPN.WBNnZWh9hn2Lhm/4Iqez1cm7FGurxbC'); -- password: adminpass3

ALTER TABLE users ADD COLUMN role ENUM('user', 'admin') DEFAULT 'user';
