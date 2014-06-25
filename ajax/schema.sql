--schema.sql
DROP DATABASE IF EXISTS ajax;

CREATE DATABASE ajax;

USE ajax;

DROP TABLE IF EXISTS estados;

CREATE TABLE estados (
    id   INTEGER PRIMARY KEY AUTO_INCREMENT,
    uf   VARCHAR(2) NOT NULL,
    nome VARCHAR(50) NOT NULL
);

DROP TABLE IF EXISTS cidades;

CREATE TABLE cidades (
    id   INTEGER PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    id_estado INTEGER REFERENCES estados (id)
);

INSERT INTO estados VALUES
(DEFAULT, 'RS', 'Rio Grande do Sul'),
(DEFAULT, 'SC', 'Santa Catarina');

INSERT INTO cidades VALUES
(DEFAULT, 'Rio Grande', 1),
(DEFAULT, 'Pelotas', 1),
(DEFAULT, 'Camaqua', 1);