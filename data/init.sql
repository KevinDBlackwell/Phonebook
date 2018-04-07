CREATE DATABASE phonebook;

use phonebook;

CREATE TABLE people (
    id INT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(80) NOT NULL,
    phonenumber INT(10) NOT NULL,
    date TIMESTAMP
);