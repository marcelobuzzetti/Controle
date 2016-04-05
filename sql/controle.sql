
CREATE TABLE abastecimentos (
  id_abastecimento int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nrvale varchar(50) NOT NULL,
  id_motorista int(11) NOT NULL, 
  id_viatura int(11) NOT NULL,
  odometro float NOT NULL,
  id_combustivel int(11) NOT NULL, 
  id_tipo_combustivel int(11) NOT NULL, 
  qnt int(11) NOT NULL,
  hora time DEFAULT NULL, 
  data date DEFAULT NULL,
  id_usuario int(11) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE destinos ( 
  id_destino int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome_destino varchar(100) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE habilitacoes ( 
  id_habilitacao int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  categoria varchar(2)  NOT NULL,
  ordem int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE motoristas (
  id_motorista int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome varchar(50)  NOT NULL,
  id_habilitacao int(11) NOT NULL, 
  id_posto_grad int(11) NOT NULL,
  apelido varchar(20) NOT NULL,
  id_usuario int(11) NOT NULL,
  id_status int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE percursos ( 
  id_percurso int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_viatura int(11) NOT NULL, 
  id_motorista int(11) NOT NULL, 
  id_destino int(11)  NOT NULL,
  odo_saida float NOT NULL,
  acompanhante varchar(100) ,
  data_saida date NOT NULL,
  hora_saida time NOT NULL,
  odo_retorno float DEFAULT NULL,
  data_retorno date DEFAULT NULL,
  hora_retorno time DEFAULT NULL,
  id_usuario int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE perfis ( 
  id_perfil int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  descricao varchar(20)  NOT NULL,
  cod_perfil int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE posto_grad ( 
  id_posto_grad int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  descricao varchar(20) NOT NULL, 
  sigla varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE recibos_combustiveis ( 
  id_recibo_combustivel int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  id_combustivel int(11) NOT NULL, 
  id_tipo_combustivel int(11) NOT NULL, 
  qnt int(11) NOT NULL, 
  motivo varchar(50) NOT NULL, 
  data date NOT NULL, 
  hora time NOT NULL,
  id_usuario int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE situacao (
  id_situacao int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  disponibilidade varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE tipos_combustiveis ( 
  id_tipo_combustivel int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  descricao varchar(50) NOT NULL,
  id_usuario int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE combustiveis (
  id_combustivel int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  descricao varchar(50) NOT NULL,
  id_usuario int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE usuarios (
  id_usuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  login varchar(50)  NOT NULL UNIQUE,
  senha varchar(50)  NOT NULL,
  id_perfil int(11) NOT NULL,
  nome varchar(20) DEFAULT NULL,
  id_status int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE viaturas (
  id_viatura int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_marca int(11)  NOT NULL, 
  id_modelo int(11)  NOT NULL, 
  placa varchar(50)  NOT NULL,
  odometro float NOT NULL, 
  ano int(11) NOT NULL,
  id_tipo_viatura int(11) NOT NULL,
  id_situacao int(11) NOT NULL,
  id_usuario int(11) NOT NULL,
  id_status int(11) NOT NULL,
  id_habilitacao int(11) NOT NULL,
  id_combustivel int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE marcas (
  id_marca int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  descricao varchar(50)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE modelos (
  id_modelo int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_marca int(11) NOT NULL,
  descricao varchar(50)  NOT NULL, 
  cap_tanque int(11) NOT NULL, 
  consumo_padrao int(11) NOT NULL, 
  cap_transp int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE tipos_viaturas (
  id_tipo_viatura int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  descricao varchar(50)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE status (
  id_status int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  status varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE abastecimentos
  ADD CONSTRAINT FK_motorista FOREIGN KEY (id_motorista) REFERENCES motoristas (id_motorista),
  ADD CONSTRAINT FK_viatura FOREIGN KEY (id_viatura) REFERENCES viaturas (id_viatura),
  ADD CONSTRAINT FK_tipo_combustivel FOREIGN KEY (id_tipo_combustivel) REFERENCES tipos_combustiveis (id_tipo_combustivel),
  ADD CONSTRAINT FK_combustivel FOREIGN KEY (id_combustivel) REFERENCES combustiveis (id_combustivel),
  ADD CONSTRAINT FK_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario);

ALTER TABLE motoristas
  ADD CONSTRAINT FK_habilitacao FOREIGN KEY (id_habilitacao) REFERENCES habilitacoes (id_habilitacao),
  ADD CONSTRAINT FK_posto_grad FOREIGN KEY (id_posto_grad) REFERENCES posto_grad (id_posto_grad),
  ADD CONSTRAINT FK_usuario1 FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario),
  ADD CONSTRAINT FK_status FOREIGN KEY (id_status) REFERENCES status (id_status);

ALTER TABLE percursos
  ADD CONSTRAINT FK_motoristas FOREIGN KEY (id_motorista) REFERENCES motoristas (id_motorista),
  ADD CONSTRAINT FK_destino FOREIGN KEY (id_destino) REFERENCES destinos (id_destino),
  ADD CONSTRAINT FK_viaturas FOREIGN KEY (id_viatura) REFERENCES viaturas (id_viatura),
  ADD CONSTRAINT FK_usuario2 FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario);

ALTER TABLE recibos_combustiveis
  ADD CONSTRAINT FK_tipo_combustivel1 FOREIGN KEY (id_tipo_combustivel) REFERENCES tipos_combustiveis (id_tipo_combustivel),
  ADD CONSTRAINT FK_combustivel1 FOREIGN KEY (id_combustivel) REFERENCES combustiveis (id_combustivel),
  ADD CONSTRAINT FK_usuario3 FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario);

ALTER TABLE viaturas
  ADD CONSTRAINT FK_modelo1 FOREIGN KEY (id_modelo) REFERENCES modelos (id_modelo),
  ADD CONSTRAINT FK_tipo_vtr FOREIGN KEY (id_tipo_viatura) REFERENCES tipos_viaturas (id_tipo_viatura),
  ADD CONSTRAINT FK_combustivel2 FOREIGN KEY (id_combustivel) REFERENCES combustiveis (id_combustivel),
  ADD CONSTRAINT FK_situacao FOREIGN KEY (id_situacao) REFERENCES situacao (id_situacao),
  ADD CONSTRAINT FK_marca FOREIGN KEY (id_marca) REFERENCES marcas (id_marca),
  ADD CONSTRAINT FK_usuario5 FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario),
  ADD CONSTRAINT FK_habilitacao1 FOREIGN KEY (id_habilitacao) REFERENCES habilitacoes (id_habilitacao),
  ADD CONSTRAINT FK_status1 FOREIGN KEY (id_status) REFERENCES status (id_status);

ALTER TABLE modelos
  ADD CONSTRAINT FK_marca1 FOREIGN KEY (id_marca) REFERENCES marcas (id_marca);

ALTER TABLE combustiveis
  ADD CONSTRAINT FK_usuario6 FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario);

ALTER TABLE  tipos_combustiveis
  ADD CONSTRAINT FK_usuario7 FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario);

ALTER TABLE  usuarios
  ADD CONSTRAINT FK_status2 FOREIGN KEY (id_status) REFERENCES status (id_status);

INSERT INTO status (id_status, status) VALUES
(1, 'Ativo'),
(2, 'Inativo');

INSERT INTO usuarios (id_usuario, login, senha, id_perfil, nome,id_status) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'ADMINISTRADOR',1);

INSERT INTO perfis (id_perfil, descricao, cod_perfil) VALUES
(1, 'Administrador', 1),
(2, 'Operador', 2),
(3, 'Mantenedor - Garagem', 3),
(4, 'Mantenedor - S4', 4);

INSERT INTO posto_grad (id_posto_grad, descricao, sigla) VALUES
(1, 'Soldado', 'Sd'),
(2, 'Cabo', 'Cb'),
(3, 'Terceiro Sargento', '3º Sgt'),
(4, 'Segundo Sargento','2º Sgt'),
(5, 'Primeiro Sargento', '1º Sgt'),
(6, 'Subtenete', 'S Ten'),
(7, 'Aspirante', 'Asp'),
(8, 'Segundo Tenente', '2º Ten'),
(9, 'Primeiro Tenente', '1º Ten'),
(10, 'Capitão', 'Cap'),
(11, 'Major', 'Maj');

INSERT INTO tipos_viaturas (id_tipo_viatura, descricao) VALUES
(1, 'Operacional'),
(2, 'Administrativa');

INSERT INTO situacao (id_situacao, disponibilidade) VALUES
(1, 'Disponível'),
(2, 'Indisponível');

INSERT INTO tipos_combustiveis (id_tipo_combustivel, descricao,id_usuario) VALUES
(1, 'Operacional',1),
(2, 'Administrativo',1);

INSERT INTO combustiveis (id_combustivel, descricao,id_usuario) VALUES
(1, 'Gasolina',1),
(2, 'Álcool',1),
(3, 'Óleo Diesel',1);

INSERT INTO habilitacoes (id_habilitacao, categoria, ordem) VALUES
(1, 'A', 1),
(2, 'B', 2),
(3, 'C', 4),
(4, 'D', 6),
(5, 'E', 8),
(6, 'AB', 3),
(7, 'AC', 5),
(8, 'AD', 7),
(9, 'AE', 9);