-- tablas de ejemplo

-- usuarios(id, nombre, email, ciudad_id)
-- ciudades(id, nombre)

-- pedidos(id, usuario_id, fecha, total)
-- productos(id, nombre, precio)
-- pedido_productos(pedido_id, producto_id, cantidad)


-- JOINs

-- INNER JOIN -> solo los que coinciden
SELECT usuarios.nombre, pedidos.id, pedidos.total
FROM usuarios
INNER JOIN pedidos ON usuarios.id = pedidos.usuario_id;

-- LEFT JOIN -> todos los usuarios aunque no tengan pedidos

SELECT usuarios.nombre, pedidos.id
FROM usuarios
LEFT JOIN pedidos ON usuarios.id = pedidos.usuario_id;

-- pregunta: mostrar usuarios sin pedidos:
SELECT usuarios.nombre
FROM usuarios
LEFT JOIN pedidos ON usuarios.id = pedidos.usuario_id
WHERE pedidos.id IS NULL;


-- RIGHT JOIN -> todos los pedidos aunque el usuario no exista:
SELECT usuarios.nombre, pedidos.id
FROM usuarios
RIGHT JOIN pedidos ON usuarios.id = pedidos.usuario_id;


-- JOIN MÚLTIPLE
-- pedido + nombre de usuario + productos
SELECT u.nombre, p.id, pr.nombre, pp.cantidad
FROM pedidos p
JOIN usuarios u ON u.id = p.usuario_id
JOIN pedido_productos pp ON pp.pedido_id = p.id
JOIN productos pr ON pr.id = pp.producto_id;


-- SUBCONSULTAS

-- En WHERE
-- usuarios que han hecho pedidos
SELECT nombre
FROM usuarios
WHERE id IN (
    SELECT usuario_id
    FROM pedidos
);

-- usuarios que NO han hecho pedidos
SELECT nombre
FROM usuarios
WHERE id NOT IN (
    SELECT usuario_id
    FROM pedidos
);


-- Con funciones agregadas
-- usuario con el pedido más caro
SELECT nombre
FROM usuarios
WHERE id = (
    SELECT usuario_id
    FROM pedidos
    ORDER BY total DESC
    LIMIT 1
);

--productos más caros que la media
SELECT nombre, precio
FROM productos
WHERE precio > (
    SELECT AVG(precio)
    FROM productos
);


-- SUBCONSULTA EN SELECT

-- total gastado por cada usuario
SELECT nombre,
(
    SELECT SUM(total)
    FROM pedidos
    WHERE pedidos.usuario_id = usuarios.id
) AS total_gastado
FROM usuarios;


-- SUBCONSULTA EN FROM
SELECT *
FROM (
    SELECT usuario_id, SUM(total) AS gasto
    FROM pedidos
    GROUP BY usuario_id
) AS resumen
WHERE gasto > 500;


-- JOIN + GROUP BY

-- total gastado por usuario
SELECT u.nombre, SUM(p.total) AS total
FROM usuarios u
JOIN pedidos p ON u.id = p.usuario_id
GROUP BY u.id;


-- numero de pedidos por usuario
SELECT u.nombre, COUNT(p.id) AS num_pedidos
FROM usuarios u
LEFT JOIN pedidos p ON u.id = p.usuario_id
GROUP BY u.id;


-- OTROS EJEMPLOS

-- Usuarios que han gastado más de 500€
SELECT u.nombre, SUM(p.total) AS total
FROM usuarios u
JOIN pedidos p ON u.id = p.usuario_id
GROUP BY u.id
HAVING total > 500;

-- Producto más vendido
SELECT pr.nombre, SUM(pp.cantidad) AS total_vendido
FROM productos pr
JOIN pedido_productos pp ON pr.id = pp.producto_id
GROUP BY pr.id
ORDER BY total_vendido DESC
LIMIT 1;


-- Último pedido de cada usuario
SELECT *
FROM pedidos p
WHERE fecha = (
    SELECT MAX(fecha)
    FROM pedidos
    WHERE usuario_id = p.usuario_id
);


-- Usuarios que han comprado el producto 3
SELECT nombre
FROM usuarios
WHERE id IN (
    SELECT usuario_id
    FROM pedidos
    WHERE id IN (
        SELECT pedido_id
        FROM pedido_productos
        WHERE producto_id = 3
    )
);


-- EXISTS por si acaso

-- usuarios con pedidos
SELECT nombre
FROM usuarios u
WHERE EXISTS (
    SELECT 1
    FROM pedidos p
    WHERE p.usuario_id = u.id
);


