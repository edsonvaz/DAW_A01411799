/*
Película (título, año, duración, encolor, presupuesto, nomestudio, idproductor)
Elenco (título, año, nombre, sueldo)
Actor (nombre, dirección, telefono, fechanacimiento, sexo)
Productor (idproductor, nombre, dirección, teléfono)
Estudio (nomestudio, dirección)
*/


/*El ingreso total recibido por cada actor, sin importar en cuantas películas haya participado.*/
SELECT nombre, SUM(sueldo) as 'Ingresos totales'
FROM elenco
GROUP BY nombre

/* El monto total destinado a películas por cada Estudio Cinematográfico, durante la década de los 80's.*/
SELECT es.nombre, SUM(pel.presupuesto) as 'Monto total destinado a peliculas'
FROM pelicula pel, estudio es
WHERE pel.nomestudio=es.nomestudio AND año between 1979 AND 1989
GROUP BY nomestudio

/*Nombre y sueldo promedio de los actores (sólo hombres) que reciben en promedio un pago superior a 5 millones de dolares por película.*/
SELECT nombre, AVG(sueldo) as 'Sueldo promedio'
FROM elenco el, actor ac
WHERE el.nombre=ac.nombre AND sueldo >=5,000,000
GROUP BY nombre

/*Título y año de producción de las películas con menor presupuesto.*/
SELECT p.titulo , p.año, MIN(P.presupuesto) as 'Presupuesto Minimo'
FROM Pelicula P
GROUP BY P.titulo, año

/*Mostrar el sueldo de la actriz mejor pagada.*/
SELECT MAX(sueldo)
FROM elenco
WHERE sexo='F'