CREATE DATABASE IF NOT EXISTS laravel_master;
USE laravel_master;

CREATE TABLE users(
    id              int(255) auto_increment not null,
    role            varchar(20) not null,
    name            varchar(100) not null,
    surname         varchar(100) not null,
    username        varchar(100) not null,
    email           varchar(100) not null,
    password        varchar(255) not null,
    image           varchar(255) not null,
    created_at      datetime,
    updated_at      datetime,
    remember_token  varchar(255),
    CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE images(
    id              int(255) auto_increment not null,
    user_id         int(255) not null,
    image_path      varchar(255) not null,
    description     text,
    created_at      datetime,
    updated_at      datetime,
    CONSTRAINT pk_images PRIMARY KEY(id),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

CREATE TABLE comments(
    id              int(255) auto_increment not null,
    user_id         int(255) not null,
    image_id        int(255) not null,
    content         text,
    created_at      datetime,
    updated_at      datetime,
    CONSTRAINT pk_comments PRIMARY KEY(id),
    CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDb;

CREATE TABLE likes(
    id              int(255) auto_increment not null,
    user_id         int(255) not null,
    image_id        int(255) not null,
    created_at      datetime,
    updated_at      datetime,
    CONSTRAINT pk_likes PRIMARY KEY(id),
    CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDb;