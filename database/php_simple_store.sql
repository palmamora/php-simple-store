#crear base de datos
CREATE DATABASE php_simple_store;
#usar base de datos
USE php-php_simple_store;

#crear tabla users
CREATE TABLE users(
    id INTEGER(255) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(11),
    image VARCHAR(255),
    CONSTRAINT PK_user PRIMARY KEY (id),
    CONSTRAINT UC_user UNIQUE(email)
)ENGINE=InnoDb;

#crear tabla categories
CREATE TABLE categories(
    id INTEGER(255) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    CONSTRAINT PK_category PRIMARY KEY (id)
)ENGINE=InnoDb;

#crear tabla products
CREATE TABLE products(
    id INTEGER(255) NOT NULL AUTO_INCREMENT,
    category_id INTEGER(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    description text,
    price float(100,2) NOT NULL,
    stock INTEGER(255) NOT NULL,
    offer VARCHAR(2),
    date DATE NOT NULL,
    image VARCHAR(255),
    CONSTRAINT PK_product PRIMARY KEY (id),
    CONSTRAINT FK_category_product FOREIGN KEY (category_id) REFERENCES categories(id)
)ENGINE=InnoDb;

#crear tabla order
CREATE TABLE orders(
    id INTEGER(255) NOT NULL AUTO_INCREMENT,
    user_id INTEGER(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    total float(200,2) NOT NULL,
    state VARCHAR(255) NOT NULL,
    date DATE,
    time TIME,
    CONSTRAINT PK_order PRIMARY KEY (id),
    CONSTRAINT FK_user_order FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE=InnoDb;

#crear tabla line_order
CREATE TABLE line_orders(
    id INTEGER(255) NOT NULL AUTO_INCREMENT,
    product_id INTEGER(255) NOT NULL,
    order_id INTEGER(255) NOT NULL,
    CONSTRAINT PK_line_order PRIMARY KEY(id),
    CONSTRAINT FK_product_line_order FOREIGN KEY (product_id) REFERENCES products(id),
    CONSTRAINT FK_order_line_order FOREIGN KEY (order_id) REFERENCES orders(id)
)ENGINE=InnoDb;