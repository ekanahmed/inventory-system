-- login/registration
CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin', 'user') DEFAULT 'user',
  email VARCHAR(100)
);

-- store product information
CREATE TABLE products (
  product_id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  category VARCHAR(100),
  quantity INT DEFAULT 0,
  price DECIMAL(10, 2),
  reorder_level INT DEFAULT 10
);

-- To store supplier information
CREATE TABLE suppliers (
  supplier_id INT AUTO_INCREMENT PRIMARY KEY,
  supplier_name VARCHAR(255) NOT NULL,
  contact_info VARCHAR(255),
  address VARCHAR(255),
  rating TINYINT(1) DEFAULT 5
);

-- manage orders
CREATE TABLE orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  supplier_id INT,
  order_type ENUM('purchase', 'sales') NOT NULL,
  quantity INT NOT NULL,
  order_date DATE DEFAULT CURRENT_DATE,
  FOREIGN KEY (product_id) REFERENCES products(product_id),
  FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)
);
