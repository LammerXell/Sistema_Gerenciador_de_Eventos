CREATE DATABASE gerenciador_eventos

CREATE TABLE Eventos (
    id INT PRIMARY KEY,
    nome VARCHAR(100),
    data_inicio DATE,
    data_fim DATE,
    local VARCHAR(100),
    descricao TEXT,
    banner VARCHAR(255),
    pdf_informacoes VARCHAR(255)
);
CREATE TABLE Pessoas(
    id INT PRIMARY KEY,
    nome VARCHAR,
    email VARCHAR(100),
    telefone VARCHAR(20)
);
CREATE TABLE Participantes(
    id INT PRIMARY KEY,
    FOREIGN KEY (pessoa_id) REFERENCES Pessoas(id),
    FOREIGN KEY (evento_id) REFERENCES Eventos(id)
);
CREATE TABLE Palestras(
    id INT PRIMARY KEY,
    nome VARCHAR(100),
    descricao TEXT,
    FOREIGN key (evento_id_id) REFERENCES Eventos(id)
);
CREATE TABLE Palestrantes(
    FOREIGN KEY pessoa_id REFERENCES Pessoas(id)
    FOREIGN KEY palestra_id REFERENCES Palestras(id)
);
