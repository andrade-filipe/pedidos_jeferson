CREATE TABLE status(
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  status ENUM('novo','processamento','postado'),
  orders_id INT UNSIGNED,
  FOREIGN KEY (orders_id) REFERENCES orders(id)
);