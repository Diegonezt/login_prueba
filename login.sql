CREATE TABLE usuario(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	Correo VARCHAR(150) NOT NULL unique KEY,
	PASSWORD VARCHAR(150) NOT null
	
);

ALTER TABLE usuario ADD Rut varchar (15) UNIQUE NOT null;

ALTER TABLE usuario CHANGE Correo correo VARCHAR(150);
ALTER TABLE usuario CHANGE PASSWORD password VARCHAR(150);
ALTER TABLE usuario CHANGE Rut rut VARCHAR(150);
