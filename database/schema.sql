CREATE DATABASE IF NOT EXISTS tienda_zapatillas;
USE tienda_zapatillas;

CREATE TABLE IF NOT EXISTS productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  marca VARCHAR(50) NOT NULL,
  precio DECIMAL(8,2) NOT NULL
);

CREATE TABLE IF NOT EXISTS pedidos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cliente VARCHAR(100) NOT NULL,
  producto_id INT NOT NULL,
  talla INT NOT NULL,
  cantidad INT NOT NULL,
  total DECIMAL(8,2) NOT NULL,
  FOREIGN KEY (producto_id) REFERENCES productos(id)
);

INSERT INTO productos (nombre, marca, precio) VALUES
('Air Runner', 'Nike', 249.90),
('Street Classic', 'Adidas', 199.90),
('Urban Flex', 'Puma', 179.90);
