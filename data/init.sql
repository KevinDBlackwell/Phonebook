CREATE DATABASE IF NOT EXISTS phonebook;

use phonebook;

CREATE TABLE people (
    id BIGSERIAL PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(80) NOT NULL,
    phonenumber VARCHAR(10) NOT NULL,
    date TIMESTAMP
);