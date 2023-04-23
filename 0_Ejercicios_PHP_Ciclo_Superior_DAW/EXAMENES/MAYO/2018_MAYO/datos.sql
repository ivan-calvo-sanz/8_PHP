create database correos;
create user correos identified by 'correos';
use correos;
grant all on correos.* to correos;
create table correos (
	correo char(50) primary key
);
insert into correos values ('ab@netscape.net');
insert into correos values ('ac@earthling.net');
insert into correos values ('ad@post.com');
insert into correos values ('ae@yahoo.com');
insert into correos values ('af@lycos.co.uk');
