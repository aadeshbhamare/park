CREATE DATABASE IF NOT EXISTS smart_parking;
USE smart_parking;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100),
  password VARCHAR(100)
);

INSERT INTO users (username, password) VALUES ('admin', 'admin123');

CREATE TABLE parking_slots (
  id INT AUTO_INCREMENT PRIMARY KEY,
  location VARCHAR(100),
  street VARCHAR(100),
  slots INT,
  hours INT,
  cost DECIMAL(6,2),
  booking_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status VARCHAR(20)
);

INSERT INTO parking_slots (location, street, slots, hours, cost, status)
VALUES
  ('Area A', 'MG Road', 10, 2, 50.00, 'Available'),
  ('Area B', 'FC Road', 5, 1, 30.00, 'Available'),
  ('Area C', 'Kothrud', 15, 3, 60.00, 'Booked');
