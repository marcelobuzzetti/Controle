-- Create
CREATE TABLE abastecimentos (
  abast_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  abast_nrvale varchar(50) NOT NULL,
  abast_motorista int(11) NOT NULL,
  abast_vtr int(11) NOT NULL,
  abast_tipo_comb int(11) NOT NULL,
  abast_tipo int(11) NOT NULL,
  abast_qnt int(11) NOT NULL,
  abast_hora time DEFAULT NULL,
  abast_data date DEFAULT NULL
 );

CREATE TABLE destinos (
  id_destino int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome_destino varchar(100) NOT NULL
);

CREATE TABLE habilitacao (
  id_habilitacao int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  categoria varchar(2)  NOT NULL
);

CREATE TABLE motoristas (
  id_motorista int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome varchar(50)  NOT NULL,
  categoria int(11) NOT NULL,
  posto_grad int(11) NOT NULL,
  apelido varchar(20) NOT NULL
);

CREATE TABLE percursos (
  id_percurso int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  viatura int(11) NOT NULL,
  motorista int(11) NOT NULL,
  destino varchar(50)  NOT NULL,
  odo_saida float NOT NULL,
  ch_vtr varchar(100)  NOT NULL,
  data_saida date NOT NULL,
  hora_saida time NOT NULL,
  odo_retorno float DEFAULT NULL,
  data_retorno date DEFAULT NULL,
  hora_retorno time DEFAULT NULL
);

CREATE TABLE perfil (
  id_perfil int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  descricao varchar(20)  NOT NULL,
  cod_perfil int(11) NOT NULL
);

CREATE TABLE posto_grad (
  id_posto_grad int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  sigla varchar(10) NOT NULL
);

CREATE TABLE rcb_comb (
  rcb_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  rcb_tp_comb int(11) NOT NULL,
  rcb_tp int(11) NOT NULL,
  rcb_qnt int(11) NOT NULL,
  rcb_motivo varchar(50) NOT NULL,
  rcb_data date NOT NULL,
  rcb_hora time NOT NULL
);

CREATE TABLE situacao (
  id_situacao int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  disponibilidade varchar(20) NOT NULL
);

CREATE TABLE tipo (
  tp_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tp_desc varchar(50) NOT NULL
);

CREATE TABLE tipo_comb (
  tp_comb_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tp_comb_desc varchar(50) NOT NULL
);

CREATE TABLE usuarios (
  id_usuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  login varchar(50)  NOT NULL UNIQUE,
  senha varchar(50)  NOT NULL,
  perfil int(11) NOT NULL,
  nome varchar(20) DEFAULT NULL
);

CREATE TABLE viaturas (
  id_viatura int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  viatura varchar(50)  NOT NULL,
  modelo varchar(50)  NOT NULL,
  placa varchar(50)  NOT NULL,
  odometro int(11) NOT NULL,
  cap_tanque int(11) NOT NULL,
  consumo_padrao int(11) NOT NULL,
  cap_transp int(11) NOT NULL,
  habilitacao int(11) NOT NULL,
  situacao int(11) NOT NULL
);

CREATE VIEW viaturasrodando AS select viaturas.viatura AS viatura,motoristas.apelido AS apelido,percursos.destino AS destino,percursos.odo_saida AS odo_saida,percursos.ch_vtr AS ch_vtr,percursos.data_saida AS data_saida,percursos.hora_saida AS hora_saida from ((percursos join viaturas) join motoristas) where (isnull(percursos.data_retorno) and (percursos.motorista = motoristas.id_motorista) and (percursos.viatura = viaturas.id_viatura));

-- Insert
INSERT INTO perfil (id_perfil, descricao, cod_perfil) VALUES
(1, 'Administrador', 1),
(2, 'Operador', 2),
(3, 'Mantenedor - Garagem', 3),
(4, 'Mantenedor - S4', 4);

INSERT INTO posto_grad (id_posto_grad, sigla) VALUES
(1, 'Sd'),
(2, 'Cb'),
(3, '3º Sgt'),
(4, '2º Sgt'),
(5, '1º Sgt'),
(6, 'S Ten'),
(7, 'Asp'),
(8, '2º Ten'),
(9, '1º Ten'),
(10, 'Cap'),
(11, 'Maj');

INSERT INTO situacao (id_situacao, disponibilidade) VALUES
(1, 'Disponivel'),
(2, 'Indisponivel');

INSERT INTO tipo (tp_id, tp_desc) VALUES
(1, 'Operacional'),
(2, 'Administrativo');

INSERT INTO tipo_comb (tp_comb_id, tp_comb_desc) VALUES
(2, 'Gasolina'),
(3, 'Álcool'),
(4, 'Óleo Diesel');

INSERT INTO usuarios (id_usuario, login, senha, perfil, nome) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'ADMINISTRADOR');
-- Usuário padrão admin senha admin

INSERT INTO habilitacao (id_habilitacao, categoria) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'AB'),
(7, 'AC'),
(8, 'AD'),
(9, 'AE');

-- Alter
ALTER TABLE abastecimentos
  ADD CONSTRAINT abastecimentos_ibfk_1 FOREIGN KEY (abast_motorista) REFERENCES motoristas (id_motorista),
  ADD CONSTRAINT abastecimentos_ibfk_2 FOREIGN KEY (abast_vtr) REFERENCES viaturas (id_viatura),
  ADD CONSTRAINT abastecimentos_ibfk_3 FOREIGN KEY (abast_tipo) REFERENCES tipo (tp_id),
  ADD CONSTRAINT fk_tipo_comb FOREIGN KEY (abast_tipo_comb) REFERENCES tipo_comb (tp_comb_id);

ALTER TABLE motoristas
  ADD CONSTRAINT FK_categoria FOREIGN KEY (categoria) REFERENCES habilitacao (id_habilitacao),
  ADD CONSTRAINT FK_posto_grad FOREIGN KEY (posto_grad) REFERENCES posto_grad (id_posto_grad);

ALTER TABLE percursos
  ADD CONSTRAINT fk_motoristas FOREIGN KEY (motorista) REFERENCES motoristas (id_motorista),
  ADD CONSTRAINT fk_viaturas FOREIGN KEY (viatura) REFERENCES viaturas (id_viatura);

ALTER TABLE rcb_comb
  ADD CONSTRAINT rcb_comb_ibfk_1 FOREIGN KEY (rcb_tp_comb) REFERENCES tipo_comb (tp_comb_id),
  ADD CONSTRAINT rcb_comb_ibfk_2 FOREIGN KEY (rcb_tp) REFERENCES tipo (tp_id);

ALTER TABLE usuarios
  ADD CONSTRAINT usuarios_ibfk_1 FOREIGN KEY (perfil) REFERENCES perfil (id_perfil);

ALTER TABLE viaturas
  ADD CONSTRAINT FK_habilitacao FOREIGN KEY (habilitacao) REFERENCES habilitacao (id_habilitacao),
  ADD CONSTRAINT FK_situacao FOREIGN KEY (situacao) REFERENCES situacao (id_situacao);
