CREATE TABLE Products(
	id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    description VARCHAR(255),
    quantity INT,
    price INT
);
CREATE TABLE users(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    surname VARCHAR(255),
    email VARCHAR(255),
    pass VARCHAR(255)
)