-- https://datasus.saude.gov.br/mad-norma-de-padronizacao-de-nomenclatura/

DROP DATABASE DB_TCC;
CREATE DATABASE DB_TCC;
USE DB_TCC;


CREATE TABLE tb_usuario(
        usu_cod INTEGER NOT NULL AUTO_INCREMENT,
        usu_nickname VARCHAR(50),
        usu_email VARCHAR(100),
        usu_celular CHAR(11),
        usu_senha VARCHAR(250),
        usu_money FLOAT,
        PRIMARY KEY(usu_cod),
        INDEX(usu_nickname),
        INDEX(usu_email),
        INDEX(usu_celular)
    );
    CREATE TABLE tb_escalacao(
        esc_codigo INTEGER NOT NULL AUTO_INCREMENT,
        esc_sequencia INTEGER,
        esc_usuario INTEGER,
        esc_playerEscalado INTEGER,
        esc_multiplicador FLOAT,
        esc_periodo INT,
        PRIMARY KEY(esc_codigo)
    );
    CREATE TABLE tb_periodo(
        per_cod INTEGER NOT NULL AUTO_INCREMENT,
        per_dataInicial DATE,
        per_dataFinal DATE,
        PRIMARY KEY(per_cod)
    );
    CREATE TABLE rl_periodo_partida(
        periodo INTEGER,
        partida INTEGER,
        PRIMARY KEY(periodo, partida)
    );
    CREATE TABLE tb_partida(
        par_codigo INTEGER NOT NULL AUTO_INCREMENT,
        par_data DATE,
        par_time1 INTEGER,
        par_time2 INTEGER,
        PRIMARY KEY(par_codigo)
    );
    CREATE TABLE tb_resultado_player_partida(
        resp_codigo INTEGER NOT NULL AUTO_INCREMENT,
        resp_partida INTEGER,
        resp_player INTEGER,
        resp_kills INT,
        resp_deaths INT,
        resp_saldoKills INTEGER,
        resp_adr FLOAT,
        resp_kast FLOAT,
        resp_rating2 FLOAT,
        PRIMARY KEY(resp_codigo)
    );
    CREATE TABLE tb_campeonato(
        camp_codigo INTEGER NOT NULL AUTO_INCREMENT,
        camp_desc VARCHAR(100),
        camp_jogo INTEGER,
        PRIMARY KEY(camp_codigo)
    );
    CREATE TABLE tb_resultado_final(
        resF_campeonato INTEGER NOT NULL AUTO_INCREMENT,
        resF_time_campeao VARCHAR(100),
        resF_mvp INTEGER,
        PRIMARY KEY(resF_campeonato)
    );
    CREATE TABLE tb_jogo(
        jog_codigo INTEGER NOT NULL AUTO_INCREMENT,
        jog_desc VARCHAR(100),
        jog_dtLancamento DATE,
        PRIMARY KEY(jog_codigo)
    );
    CREATE TABLE rl_organizacao_jogo(
        organizacao INTEGER,
        jogo INTEGER
    );
    CREATE TABLE tb_organizacao(
        org_cod INTEGER NOT NULL AUTO_INCREMENT,
        org_desc VARCHAR(100),
        org_pais VARCHAR(100),
        PRIMARY KEY(org_cod)
    );
    CREATE TABLE rl_player_organizacao(
        pro_cod INTEGER,
        pro_seq INTEGER,
        pro_time INTEGER,
        PRIMARY KEY(pro_cod, pro_seq)
    );
    CREATE TABLE tb_player(
        pro_cod INTEGER NOT NULL AUTO_INCREMENT,
        pro_nickname VARCHAR(100),
        pro_dtNasc DATE,
        pro_nome VARCHAR(100),
        PRIMARY KEY(pro_cod)
    );

ALTER TABLE rl_player_organizacao
    ADD CONSTRAINT fk_proplayer FOREIGN KEY(pro_cod) REFERENCES tb_player(pro_cod);
ALTER TABLE rl_organizacao_jogo
    ADD CONSTRAINT uk_organizacaojogo_jogo FOREIGN KEY(jogo) REFERENCES tb_jogo(jog_codigo);
ALTER TABLE rl_organizacao_jogo
    ADD CONSTRAINT uk_organizacaojogo_organizacao FOREIGN KEY(organizacao) REFERENCES tb_organizacao(org_cod);
ALTER TABLE tb_partida
    ADD CONSTRAINT fk_time1 FOREIGN KEY(par_time1) REFERENCES tb_organizacao(org_cod);
ALTER TABLE tb_partida
    ADD CONSTRAINT fk_time2 FOREIGN KEY(par_time2) REFERENCES tb_organizacao(org_cod);
ALTER TABLE tb_resultado_player_partida
    ADD CONSTRAINT fk_partida FOREIGN KEY(resp_partida) REFERENCES tb_partida(par_codigo);
ALTER TABLE tb_escalacao
    ADD CONSTRAINT fk_periodo FOREIGN KEY(esc_periodo) REFERENCES tb_periodo(per_cod);