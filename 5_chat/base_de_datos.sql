-- |--------------------------------------------------------------------|
-- |									|
-- |			Creado por: R_A_V_R_				|
-- |									|
-- |--------------------------------------------------------------------|

CREATE DATABASE chat;

USE chat;

CREATE TABLE mensajeria(
idmensajeria BIGINT NOT NULL AUTO_INCREMENT,
usuarios VARCHAR(100) NOT NULL,
mensajes LONGTEXT NOT NULL,
PRIMARY KEY(idmensajeria)
);


DELIMITER //
CREATE PROCEDURE insertar(usuario VARCHAR(100), mensaje LONGTEXT)
BEGIN
	INSERT INTO mensajeria(usuarios, mensajes)
	VALUES(usuario,mensaje);
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE mostrar()
BEGIN
	SELECT usuarios, mensajes FROM mensajeria
	ORDER BY idmensajeria DESC
	LIMIT 0, 5;
END//
DELIMITER ;
