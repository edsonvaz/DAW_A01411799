/*
Pel�cula (t�tulo, a�o, duraci�n, encolor, presupuesto, nomestudio, idproductor)
Elenco (t�tulo, a�o, nombre, sueldo)
Actor (nombre, direcci�n, telefono, fechanacimiento, sexo)
Productor (idproductor, nombre, direcci�n, tel�fono)
Estudio (nomestudio, direcci�n)
*/


/*El ingreso total recibido por cada actor, sin importar en cuantas pel�culas haya participado.*/
SELECT nombre, SUM(sueldo) as 'Ingresos totales'
FROM elenco
GROUP BY nombre

/* El monto total destinado a pel�culas por cada Estudio Cinematogr�fico, durante la d�cada de los 80's.*/
SELECT es.nombre, SUM(pel.presupuesto) as 'Monto total destinado a peliculas'
FROM pelicula pel, estudio es
WHERE pel.nomestudio=es.nomestudio AND a�o between 1979 AND 1989
GROUP BY nomestudio

/*Nombre y sueldo promedio de los actores (s�lo hombres) que reciben en promedio un pago superior a 5 millones de dolares por pel�cula.*/
SELECT nombre, AVG(sueldo) as 'Sueldo promedio'
FROM elenco el, actor ac
WHERE el.nombre=ac.nombre AND sueldo >=5,000,000
GROUP BY nombre

/*T�tulo y a�o de producci�n de las pel�culas con menor presupuesto.*/
SELECT p.titulo , p.a�o, MIN(P.presupuesto) as 'Presupuesto Minimo'
FROM Pelicula P
GROUP BY P.titulo, a�o

/*Mostrar el sueldo de la actriz mejor pagada.*/
SELECT MAX(sueldo)
FROM elenco
WHERE sexo='F'