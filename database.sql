-- Create database
CREATE DATABASE IF NOT EXISTS restaurant;
USE restaurant;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/*TRUNCATE TABLE users;
ALTER TABLE users AUTO_INCREMENT = 1;
*/
