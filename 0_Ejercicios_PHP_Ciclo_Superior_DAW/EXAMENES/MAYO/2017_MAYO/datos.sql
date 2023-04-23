create database examenSMayo2017 CHARACTER SET utf8 COLLATE utf8_general_ci;
use examenSMayo2017;

create table usuarios (
	usuario numeric(3,0) primary key,
	clave varchar(255) not null,
	nombre varchar(75),
	fecha date not null
);

create user exmayo identified by 'exmayo';
grant all on examenSMayo2017.* to exmayo;

INSERT INTO usuarios VALUES (1,'$2y$10$012345678901234567890u9rr7OvaJ6NeqiaN6Xq/HKfy4YgDUVhS', 'Rafael Pérez Guerrero', '2016-04-13');
INSERT INTO usuarios VALUES (2,'$2y$10$012345678901234567890u9rr7OvaJ6NeqiaN6Xq/HKfy4YgDUVhS', 'José Antonio Lucas Calvo', '2015-07-12');
INSERT INTO usuarios VALUES (3,'$2y$10$012345678901234567890u9rr7OvaJ6NeqiaN6Xq/HKfy4YgDUVhS','Susana Bueno Atienza', '2015-09-06');
INSERT INTO usuarios VALUES (4,'$2y$10$012345678901234567890u9rr7OvaJ6NeqiaN6Xq/HKfy4YgDUVhS', 'Marta Campos González', '2016-05-03');
INSERT INTO usuarios VALUES (5, '$2y$10$012345678901234567890u9rr7OvaJ6NeqiaN6Xq/HKfy4YgDUVhS','Manuel Pérez Jiménez', '2016-04-30');
INSERT INTO usuarios VALUES (6, '$2y$10$012345678901234567890u9rr7OvaJ6NeqiaN6Xq/HKfy4YgDUVhS','Antonio Ortega Ruiz', '2015-11-11');
INSERT INTO usuarios VALUES (7, '$2y$10$012345678901234567890u9rr7OvaJ6NeqiaN6Xq/HKfy4YgDUVhS','María Ciudad Campos', '2015-02-06');
INSERT INTO usuarios VALUES (8, '$2y$10$012345678901234567890u9rr7OvaJ6NeqiaN6Xq/HKfy4YgDUVhS','Raúl Lora González', '2015-01-31');
INSERT INTO usuarios VALUES (9, '$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS','María Carmen Heredia Huguet', '2016-03-18');
INSERT INTO usuarios VALUES (10,'$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS', 'Laura Sierra García', '2016-04-13');
INSERT INTO usuarios VALUES (11,'$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS','Luis Lorenzo Soler', '2015-02-01');
INSERT INTO usuarios VALUES (12,'$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS', 'Fernando Romero García', '2015-03-24');
INSERT INTO usuarios VALUES (13,'$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS', 'Rosa López García', '2015-11-11');
INSERT INTO usuarios VALUES (14,'$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS', 'Pablo García Castillo', '2017-04-12');
INSERT INTO usuarios VALUES (15,'$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS', 'Catalina Arteaga Muñoz', '2016-09-02');
INSERT INTO usuarios VALUES (16,'$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS', 'Carmen Santana García', '2017-04-29');
INSERT INTO usuarios VALUES (17,'$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS', 'Cristina Ribes Guzmán', '2015-01-04');
INSERT INTO usuarios VALUES (18,'$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS', 'José María Palacios Troncoso', '2015-12-22');
INSERT INTO usuarios VALUES (19,'$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS', 'Juan Prada Perera', '2016-02-19');
INSERT INTO usuarios VALUES (20,'$2y$10$012345678901234567890uyFTgv2XOA0pTlJykEgxZiTOiY/P.HPS', 'Susana Álvarez González', '2015-07-03');

