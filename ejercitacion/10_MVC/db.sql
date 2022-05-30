
CREATE DATABASE notas_master;
use notas_master;

CREATE TABLE usuarios(
    id            int(10) auto_increment not null,            
    nombre        varchar(65)  not null,
    apellido      varchar(55) not null,
    email         varchar(45) not null,
    password      varchar(255) not null,
    fecha          date,

CONSTRAINT pk_entradas PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE (email)
)ENGINE=InnoDB;

CREATE TABLE notas(
    id             int(10) auto_increment not null,            
    usuarios_id    int(10)  not null,
    titulo         varchar(45) not null,
    descripcion    text not null,
    fecha          date,

CONSTRAINT pk_entradas PRIMARY KEY(id),
CONSTRAINT fk_entradas_usuarios FOREIGN KEY(usuarios_id) REFERENCES usuarios(id)
)ENGINE=InnoDB;