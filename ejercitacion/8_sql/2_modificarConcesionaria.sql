-- 2) modificar la comision de los vendedores cuando  ganan mas que 1500
UPDATE vendedores SET comision=0.5 WHERE sueldo >= 1500;

-- 3) incrementar el precio de los autos
UPDATE autos SET precio = precio*1.05;

-- 4) seleccionar vendedores que se incorporaron despues del 18/02/2022
SELECT * from vendedores where fecha >= 2022/02/18;
SELECT nombre, apellido, cargo, sueldo from vendedores where fecha >= 2022/02/18;

-- 5) seleccionar nombre de los vendeores y mostrar la cantidad de dias que lleva trabajado
SELECT nombre, DATEDIFF('2022/06/29', fecha) as 'dias' from vendedores;

-- 6) mostrar el dia de la semana en el que ingreso cada empleado
SELECT CONCAT(nombre, ' ', apellido) as 'nombre y apellido', fecha, DAYNAME(fecha) from vendedores;

-- 7) mostrar sueldo y nombre de empledos que sean gerente de sucursal
SELECT nombre, apellido, sueldo from vendedores where cargo = 'gerente de sucursal';

-- 8) mostrar autos cuya marca contenga la letra a
SELECT * from autos where marca LIKE '%a%';

-- 9) mostrar en orden desc segun el sueldo los vendedores del grupo 2
SELECT * from vendedores where grupo_id = 2 ORDER BY sueldo desc;

-- 10) visualizar los ultimos 4 vendedores mas recientes y  ordenarlos por fecha desc
SELECT apellido, fecha, id FROM vendedores ORDER BY fecha DESC LIMIT 4;

-- 11) Visualizar todos lo cargos y la cantidad de vendedoress que hay en cada uno
SELECT cargo, COUNT(id) FROM vendedores GROUP BY cargo;

-- 12) Visualizar la masa salarial del concesionario
SELECT sum(sueldo) as 'Masa Salarial' FROM vendedores;

-- 13) sacar el promedio de los sueldos
SELECT ROUND(AVG(sueldo),2), grupo_id from vendedores GROUP BY grupo_id;

--  14) visualizar la cantidad de autos vendidas, mostrando cada cliente, modelo.
SELECT au.modelo, au.marca as 'auto' , cl.nombre  as 'nombre cliente' ,SUM(e.cantidad) as 'unidades' 
FROM encargos e
INNER JOIN autos au ON au.id = e.auto_id
INNER JOIN clientes cl ON cl.id = e.cliente_id 
GROUP BY e.auto_id;

-- 15) mostrar los clientes que mas pedido han hecho y mostrar cuya cantidad
SELECT cl.nombre, COUNT(cl.id) FROM encargos e
INNER JOIN clientes cl ON cl.id = e.cliente_id
GROUP BY cliente_id ORDER BY 2 DESC LIMIT 2;

-- 16) obtener clientes atindidos por x vendedor
SELECT * FROM clientes WHERE vendedores_id = (SELECT id FROM vendedores WHERE nombre = 'maria');

-- 17) obtener lista de encargo  por x cliente
SELECT au.modelo, au.marca as 'auto' , cl.nombre  as 'nombre cliente' ,SUM(e.cantidad) as 'unidades' 
FROM encargos e
INNER JOIN autos au ON au.id = e.auto_id
INNER JOIN clientes cl ON cl.id = e.cliente_id 
WHERE cliente_id = (SELECT id FROM clientes WHERE nombre = 'cliente 2');

-- 18) listar clientes que han comprado  x auto
SELECT * FROM clientes WHERE id IN (SELECT cliente_id FROM encargos WHERE auto_id IN(SELECT id FROM autos WHERE marca = 'Mercedes Benz'));

-- 19) obtener vendedores con mas de un cliente
SELECT * FROM vendedores WHERE id IN (SELECT vendedores_id FROM clientes GROUP BY vendedores_id HAVING COUNT(id)>= 2);

-- 20) seleccionar el grupo de donde pertenece el vendedor con el sueldo mas alto
SELECT * FROM grupos WHERE id IN (SELECT grupo_id FROM vendedores WHERE sueldo = (SELECT MAX(sueldo) FROM vendedores));

-- 21) mostrar clientes que realizaron mas encargos
SELECT nombre, ciudad FROM clientes WHERE id IN (SELECT cliente_id FROM encargos WHERE cantidad >=3);

-- 22) seleccionar id y nombre de vendedor  y cliente
SELECT c.id, c.nombre as 'nombre clientes', v.id, CONCAT(v.nombre, ' ', v.apellido) as 'nombre vendedores' FROM clientes c, vendedores v WHERE c.vendedores_id = v.id;

-- 23) listar encargos realizados con el marca modelo y nombre del cliente
SELECT e.id, a.marca, a.modelo, c.nombre FROM encargos e
INNER JOIN autos a ON a.id = e.auto_id
INNER JOIN clientes c ON c.id = e.cliente_id;

-- 24) seleccionar clientes de cordoba
SELECT e.id, a.marca, a.modelo, c.nombre, c.ciudad FROM encargos e
INNER JOIN autos a ON a.id = e.auto_id
INNER JOIN clientes c ON c.id = e.cliente_id
WHERE c.ciudad = ' cordoba ';

-- 25) sacar el total del importe de cada cliente
SELECT c.nombre, SUM(e.cantidad * a.precio) as 'total gastado' FROM clientes c  
INNER JOIN encargos e ON c.id = e.cliente_id
INNER JOIN autos a ON a.id = e.auto_id 
GROUP BY c.nombre
ORDER BY 2 asc;

-- 27) visualizar clientes con sus respectivos encargos
SELECT c.nombre, e.cantidad as 'cantidad de pedidos' FROM clientes c 
INNER JOIN encargos e ON c.id = e.cliente_id
ORDER BY c.nombre;

-- 28) mostrar lista de vendedores y su cantidad de clientes 
SELECT CONCAT(v.nombre, ' ', v.apellido) as 'nombre vendedor', COUNT(c.id) as 'cantidad de clientes' FROM vendedores v
LEFT JOIN clientes c ON c.vendedores_id = v.id
GROUP BY v.id;

-- 29) crear una vista con todod los vendedores del grupo A
CREATE VIEW vendedoresA AS 
SELECT * FROM vendedores WHERE grupo_id IN (SELECT id FROM grupos WHERE nombre = 'Grupo A');

-- 30) mostrar el vendedor con mas tiempo
SELECT * FROM vendedores ORDER BY  fecha ASC LIMIT 1;

SELECT * FROM autos WHERE id = (SELECT auto_id FROM encargos ORDER BY cantidad DESC LIMIT 1);