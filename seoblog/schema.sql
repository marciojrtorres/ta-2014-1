-- MySQL
CREATE DATABASE blog;

USE blog;

CREATE TABLE usuarios (
    id          INTEGER       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome        VARCHAR(50)   NOT NULL,
    usuario     VARCHAR(50)   NOT NULL UNIQUE,
    senha       VARCHAR(50)   NOT NULL
);

INSERT INTO usuarios VALUES (DEFAULT, 'Manoel Antunes', 'farinha', 'farinha');

INSERT INTO usuarios VALUES (DEFAULT, 'Valdemar Silveira', 'pimenta', 'pimenta');

CREATE TABLE posts (
    titulo  VARCHAR(50)  NOT NULL,
    texto   VARCHAR(500) NOT NULL
);