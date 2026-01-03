CREATE DATABASE ecommerce_db;
USE ecommerce_db;

CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100),
 email VARCHAR(100),
 password VARCHAR(100)
);

CREATE TABLE products (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100),
 price INT,
 image VARCHAR(100)
);

CREATE TABLE cart (
 id INT AUTO_INCREMENT PRIMARY KEY,
 user_id INT,
 product_id INT
);
