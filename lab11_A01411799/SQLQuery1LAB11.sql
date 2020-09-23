/*
Materiales(Clave,Descripción,Costo)
Proveedores(RFC,RazonSocial)
Proyectos(Numero,Denominacion)
Entregan(Clave,RFC,Numero,Fecha,Cantidad)
*/

CREATE TABLE Materiales
(
  Clave numeric(5),
  Descripcion varchar(50),
  Costo numeric(8,2)
)

CREATE TABLE Proveedores
(
  RFC char(13),
  razonsocial varchar(50)
)

CREATE TABLE Proyectos
(
  numero numeric(5),
  denominacion varchar(50)
)

CREATE TABLE Entregan
(
  Clave numeric(5),
  RFC char(13),
  numero numeric(5),
  fecha datetime,
  cantidad numeric (8,2)
)

sp_help materiales

drop table Materiales
drop table Proveedores
drop table Proyectos
drop table Entregan

select * from sysobjects where xtype='U'