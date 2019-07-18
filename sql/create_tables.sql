-- SCRIPT DE CRIAÇÃO DAS TABELAS
-- ter 28 mai 2019
-- Ultima atualização: 14/06/2019
-- Thiago Braga de Melo - tbgdemelo@gmail.com

-- -----------------------------------------------------
-- TABELA COM OS LOGINS NO SISTEMA
-- -----------------------------------------------------
CREATE TABLE logins ( 
	login VARCHAR(50) NOT NULL UNIQUE, 
	senha VARCHAR(50) NOT NULL ,
	PRIMARY KEY (login)
);

-- -----------------------------------------------------
-- TABELA COM AS INFO DOS EQUIPAMENTOS
-- -----------------------------------------------------
CREATE TABLE equipamentos(
	id INT AUTO_INCREMENT NOT NULL,
	cod_barras VARCHAR(14) NOT NULL UNIQUE,
	nome_eqp VARCHAR(50),
	serial_eqp VARCHAR (25) NOT NULL UNIQUE,
	fabricante VARCHAR (30) NOT NULL,
	modelo VARCHAR (20),
	cor VARCHAR (15),
	PRIMARY KEY (id)
);

-- -----------------------------------------------------
-- TABELA COM AS INFO DOS FUNCIONARIOS
-- -----------------------------------------------------
CREATE TABLE funcionarios(
	cod INT AUTO_INCREMENT NOT NULL,
	telefone VARCHAR (11) NOT NULL UNIQUE,
	nome VARCHAR (30) NOT NULL,
	sobrenome VARCHAR (30),
	empresa VARCHAR (50) NOT NULL,
	setor VARCHAR (30),
	funcao VARCHAR (50),
	PRIMARY KEY (cod)
);

-- -----------------------------------------------------------
-- RELACAO DE QUEM PODE SAIR COM QUAIS EQUIPAMENTOS PODE SAIR
-- ----------------------------------------------------------
CREATE TABLE relacao(
	id SERIAL NOT NULL,
	id_eqp INT,
	id_fun INT,
	PRIMARY KEY (id),
	FOREIGN KEY (id_fun) REFERENCES funcionarios (cod)

	ON DELETE CASCADE
	ON UPDATE CASCADE,
	FOREIGN KEY (id_eqp) REFERENCES equipamentos (id)

	ON DELETE CASCADE
	ON UPDATE CASCADE
);

-- -----------------------------------------------------
-- TABELA COM AS SAÍDAS REGISTRADAS DOS EQUIPAMENTOS
-- -----------------------------------------------------
CREATE TABLE saidas(
	id INT,
	data_saida TIMESTAMP,
	PRIMARY KEY (data_saida),
	FOREIGN KEY (id) REFERENCES equipamentos (id)

	ON DELETE CASCADE
	ON UPDATE CASCADE
);
