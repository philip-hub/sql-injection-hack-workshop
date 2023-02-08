-- Create database mhc_bank, and use it.
CREATE DATABASE mhc_bank;
USE mhc_bank;

-- Create table mhc_bank and three text columns named username, password, amount.
CREATE TABLE mhc_bank (
  username TEXT(255),
  password TEXT(255),
  amount TEXT(255)
);

-- Insert data into mhc_bank table.
INSERT INTO mhc_bank (username, password, amount)
VALUES ("alice", "apples123", "500");

INSERT INTO mhc_bank (username, password, amount)
VALUES ("bob", "banana321", "250");

INSERT INTO mhc_bank (username, password, amount)
VALUES ("carol", "coconut231", "750");

-- Showcase data in mhc_bank.
SELECT * FROM mhc_bank;
