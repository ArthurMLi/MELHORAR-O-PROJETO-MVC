create database project_mvc;
use project_mvc;
create table users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(100) NOT NULL
);

create table tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Tarefa VARCHAR(100) NOT NULL,
    Prazo VARCHAR(10) NOT NULL
);

