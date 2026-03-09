CREATE DATABASE tienda_php;
USE tienda_php;

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol_id INT NOT NULL,
    FOREIGN KEY (rol_id) REFERENCES roles(id)
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL
);

CREATE TABLE ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    producto_id INT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

INSERT INTO roles (nombre) VALUES ('admin'), ('cliente');

INSERT INTO productos (nombre, precio, stock, imagen) VALUES
('Arroz 1kg', 4500, 50, 'https://images.unsplash.com/photo-1586201375761-83865001e31c?w=600'),
('Frijol cargamanto 1kg', 9800, 40, 'https://images.unsplash.com/photo-1564894809611-1742fc40ed80?w=600'),
('Lentejas 1kg', 5200, 45, 'https://images.unsplash.com/photo-1638378545909-d78bd9b4271c?w=600'),
('Azúcar 1kg', 4800, 60, 'https://images.unsplash.com/photo-1709651808265-977ed7ef78c6?w=600'),
('Sal 500g', 1800, 70, 'https://images.unsplash.com/photo-1646722670581-974d084e0ec0?w=600'),
('Aceite vegetal 1L', 12500, 30, 'https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?w=600'),
('Huevos bandeja x30', 18000, 25, 'https://images.unsplash.com/photo-1587486913049-53fc88980cfc?w=600'),
('Leche entera 1L', 4200, 50, 'https://images.unsplash.com/photo-1563636619-e9143da7973b?w=600'),
('Pan tajado', 5200, 35, 'https://images.unsplash.com/photo-1592029780368-c1fff15bcfd5?w=600'),
('Papa pastusa 1kg', 3200, 70, 'https://images.unsplash.com/photo-1518977676601-b53f82aba655?w=600'),
('Cebolla cabezona 1kg', 4000, 55, 'https://images.unsplash.com/photo-1508747703725-719777637510?w=600'),
('Tomate chonto 1kg', 4200, 50, 'https://images.unsplash.com/photo-1561136594-7f68413baa99?w=600'),
('Zanahoria 1kg', 2800, 65, 'https://images.unsplash.com/photo-1447175008436-054170c2e979?w=600'),
('Plátano maduro unidad', 1500, 80, 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=600'),
('Banano 1kg', 3000, 75, 'https://plus.unsplash.com/premium_photo-1664304188646-47b168d698aa?w=600'),
('Pollo entero 1kg', 10500, 40, 'https://images.unsplash.com/photo-1604503468506-a8da13d82791?w=600'),
('Carne molida 1kg', 21000, 25, 'https://images.unsplash.com/photo-1607623814075-e51df1bdc82f?w=600'),
('Atún en lata', 4800, 60, 'https://images.unsplash.com/photo-1672529276739-c462c62d2113?w=600'),
('Pasta 500g', 2600, 90, 'https://images.unsplash.com/photo-1718043934012-380f4e72a1cf?w=600');
