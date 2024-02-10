CREATE TABLE orders(
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(256) NOT NULL,
  order_date TIMESTAMP NOT NULL,
  category ENUM('canal','serie','filme','novela') NOT NULL,
  content TEXT NOT NULL
);