-- creamos la DB
CREATE DATABASE IF NOT EXISTS concesionaria;

-- seleccionamos la DB 
USE concesionaria;

-- creamos las tablas

CREATE TABLE autos (
    id      int(10) auto_increment not null,
    modelo  varchar(60) not null,
    marca   varchar(50) not null,
    precio  int(20) not null,
    stock   int(255) not null,

CONSTRAINT pk_autos PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE grupos(
    id      int(10) auto_increment not null,
    nombre  varchar(45) not null,
    ciudad  varchar(65) ,

CONSTRAINT pk_grupos PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE vendedores(
    id          int(10) auto_increment not null,            
    grupo_id    int(10)  not null,
    jefe        int(10),
    nombre      varchar(45) not null,
    apellido    varchar(45) not null,
    cargo       varchar(60) ,
    fecha       date not null,
    comision    float(20, 2),
    sueldo      float(10, 2),

CONSTRAINT pk_vendedores PRIMARY KEY(id),
CONSTRAINT fk_vendedores_grupo FOREIGN KEY(grupo_id) REFERENCES grupos(id),
CONSTRAINT fk_vendedores_jefe FOREIGN KEY(jefe) REFERENCES vendedores(id)
)ENGINE=InnoDB;

CREATE TABLE clientes(
    id              int(10) auto_increment not null, 
    vendedores_id   int(10),
    nombre          varchar(50) not null,
    ciudad          varchar(65),
    gastado         float(20, 2),
    fecha           date,

CONSTRAINT pk_clientes PRIMARY KEY(id),
CONSTRAINT fk_clientes_vendedor FOREIGN KEY(vendedores_id) REFERENCES vendedores(id)
)ENGINE=InnoDB;

CREATE TABLE encargos(
    id              int(10) auto_increment not null,
    cliente_id      int(10) not null,
    auto_id         int(10) not null,
    cantidad        int(10) not null,
    fecha           date,

CONSTRAINT pk_encargos PRIMARY KEY(id),
CONSTRAINT fk_encargos_cliente FOREIGN KEY(cliente_id) REFERENCES clientes(id),
CONSTRAINT fk_encargos_auto FOREIGN KEY(auto_id) REFERENCES autos(id)
)ENGINE=InnoDB;

-- RELLENAMOS LA DB
-- tabla autos
INSERT INTO  autos VALUES( NULL, 'Q5', 'Audi', 50000, 45);
INSERT INTO  autos VALUES( NULL, 'Clase A A-45', 'Mercedes Benz', 70000, 20);
INSERT INTO  autos VALUES( NULL, 'X6', 'BMW', 75000, 13);
INSERT INTO  autos VALUES( NULL, 'C250', 'Mercedes Benz', 33000, 10);
INSERT INTO  autos VALUES( NULL, 'A4', 'Audi', 30000, 8);

-- tabla grupos
INSERT INTO grupos VALUES(NULL, 'Grupo A', 'Cordoba');
INSERT INTO grupos VALUES(NULL, 'Grupo B', 'Villa Carlos Paz');
INSERT INTO grupos VALUES(NULL, 'Grupo C', 'Buenos Aires');
INSERT INTO grupos VALUES(NULL, 'Grupo D', 'Rosario');

-- tabla vendedores
INSERT INTO vendedores VALUES (NULL, 1, NULL,'juan','pereggi','vendedor',CURDATE(), 800, 2900);
INSERT INTO vendedores VALUES (NULL, 2, NULL,'francesco','dubbio','encargado sucursal',CURDATE(), 670, 1300);
INSERT INTO vendedores VALUES (NULL, 2, NULL,'mario','cardelli','contador',CURDATE(), 700, 1600);
INSERT INTO vendedores VALUES (NULL, 3, NULL,'florencia','maratti','gerente de sucursal',CURDATE(), 650, 4300);
INSERT INTO vendedores VALUES (NULL, 4, NULL,'maria','chiesa','gerente de sucursal',CURDATE(), 0, 5300);

-- tabla clientes
INSERT INTO clientes VALUES (NULL,2,'cliente 1','Cordoba', 50000,CURDATE());
INSERT INTO clientes VALUES (NULL,3,'cliente 2','Villa Carlos Paz', 75000,CURDATE());
INSERT INTO clientes VALUES (NULL,5,'cliente 3','Buenos Aires', 70000,CURDATE());
INSERT INTO clientes VALUES (NULL,5,'cliente 4','Rosario', 30000,CURDATE());

-- tabla encargos
INSERT INTO encargos VALUES (NULL,1, 1, 1,CURDATE());
INSERT INTO encargos VALUES (NULL,2, 3, 2,CURDATE());
INSERT INTO encargos VALUES (NULL,3, 2, 1,CURDATE());
INSERT INTO encargos VALUES (NULL,3, 5, 5,CURDATE());



-- tabla para las entrada del blog_master;
CREATE TABLE entradas(
    id             int(10) auto_increment not null,            
    usuarios_id    int(10)  not null,
    categorias_id  int(10)  not null,
    titulo         varchar(45) not null,
    descripcion    text not null,
    fecha          date,

CONSTRAINT pk_entradas PRIMARY KEY(id),
CONSTRAINT fk_entradas_usuarios FOREIGN KEY(usuarios_id) REFERENCES usuarios(id),
CONSTRAINT fk_entradas_categorias FOREIGN KEY(categorias_id ) REFERENCES categorias(id)
)ENGINE=InnoDB;

SELECT e.*, c.* FROM entradas e 
INNER JOIN categorias c ON e.categorias_id = c.id
ORDER BY e.id DESC LIMIT 5;