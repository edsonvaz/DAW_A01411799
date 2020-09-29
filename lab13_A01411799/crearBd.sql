   /*  drop TABLE entregan
     drop TABLE materiales
     drop TABLE proyectos
     drop TABLE Proveedores
	*/

/*IF EXISTS (SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'Proveedores')

DROP TABLE Proveedores

CREATE TABLE Proveedores
(
  RFC char(13) not null,
  RazonSocial varchar(50)
)
*/

/*IF EXISTS (SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'Proyectos')

DROP TABLE Proyectos

CREATE TABLE Proyectos
(
  Numero numeric(5) not null,
  Denominacion varchar(50)
)
*/

/*
IF EXISTS (SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'Entregan')

DROP TABLE Entregan

CREATE TABLE Entregan
(
  Clave numeric(5) not null,
  RFC char(13) not null,
  Numero numeric(5) not null,
  Fecha DateTime not null,
  Cantidad numeric (8,2)
)
*/

/*BULK INSERT a1411799.a1411799.[Materiales]
   FROM 'e:\wwwroot\rcortese\materiales.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
select * from Materiales
*/

/*BULK INSERT a1411799.a1411799.[Proyectos]
   FROM 'e:\wwwroot\rcortese\proyectos.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
select * from Proyectos
*/

/*BULK INSERT a1411799.a1411799.[Proveedores]
   FROM 'e:\wwwroot\rcortese\proveedores.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
select * from Proveedores
*/

/*
SET DATEFORMAT dmy

BULK INSERT a1411799.a1411799.[Entregan]
   FROM 'e:\wwwroot\rcortese\entregan.csv'
   WITH
      (
         CODEPAGE = 'ACP',
         FIELDTERMINATOR = ',',
         ROWTERMINATOR = '\n'
      )
select * from Entregan
*/

INSERT INTO Materiales values(1000, 'xxx', 1000)
select * from Materiales

Delete from Materiales where Clave = 1000 and Costo = 1000

ALTER TABLE Materiales add constraint llaveMateriales PRIMARY KEY (Clave)

INSERT INTO Materiales values(1000, 'xxx', 1000)

sp_helpconstraint materiales

ALTER TABLE Proveedores add constraint llaveProveedores PRIMARY KEY (RFC)

sp_helpconstraint proveedores

ALTER TABLE Proyectos add constraint llaveProyectos PRIMARY KEY (Numero) /* DEFINIR UNA LLAVE PRIMARIA*/

sp_helpconstraint proyectos

ALTER TABLE Entregan add constraint llaveEntregan PRIMARY KEY (Clave,RFC,Numero,Fecha)

sp_helpconstraint entregan

INSERT INTO entregan values (0, 'xxx', 0, '1-jan-02', 0);

select * from Entregan

Delete from Entregan where Clave = 0

ALTER TABLE entregan add constraint cfentreganclave /*DEFINIR UNA LLAVE FORANEA*/
  foreign key (clave) references materiales(clave);

 ALTER TABLE entregan add constraint cfentreganRFC
 foreign key (RFC) references Proveedores(RFC);

 ALTER TABLE entregan add constraint cfentreganNumero
 foreign key (Numero) references Proyectos(Numero);

 sp_helpconstraint entregan /*CONSULTAR RESTRICCIONES*/

 INSERT INTO entregan values (1000, 'AAAA800101', 5000, GETDATE(), 0);



