/*
    FLAG REPRESENTA OQUE DEVE SER FEITO NA BASE
        - 1 -> Exclusão de todos registros das tabelas do jogo
        - 2 -> Inserção dos registros para simulação da escalação
        - 3 -> Inserção das informações para simulação do fechamento de período
*/

USE DB_TCC;
DROP PROCEDURE IF EXISTS sp_CreateExample;

CREATE PROCEDURE sp_CreateExample (IN flag INT)
BEGIN
    /* Exclusão de todos registros das tabelas do jogo */
    IF flag = 1 THEN

        DELETE FROM tb_escalacao;
        DELETE FROM tb_resultado_player_partida;
        DELETE FROM rl_periodo_partida;
        DELETE FROM tb_resultado_final;
        DELETE FROM rl_player_organizacao;
        DELETE FROM rl_organizacao_jogo;
        DELETE FROM tb_periodo;
        DELETE FROM tb_campeonato;
        DELETE FROM tb_jogo;
        DELETE FROM tb_player;
        DELETE FROM tb_partida;
        DELETE FROM tb_organizacao;

    /* Inserção dos registros para simulação */
    ELSEIF flag = 2 THEN

        INSERT INTO tb_periodo(per_dataInicial, per_dataFinal)
        VALUES (
            '2016-06-09',
            '2016-06-10'
        );

        INSERT INTO tb_organizacao(org_cod, org_desc, org_pais)
        VALUES
            (1, 'SK', 'Brazil'),
            (2, 'Virtus.pro', 'Kazakhstan'),
            (3, 'Liquid', 'United States'),
            (4, 'fnatic', 'Europe');

        INSERT INTO tb_jogo(jog_codigo, jog_desc, jog_dtLancamento)
        VALUES (
            1,
            'Counter Strike',
            '2012-08-01'
        );

        INSERT INTO tb_campeonato(camp_codigo, camp_desc, camp_jogo)
        VALUES (
            1,
            'ESL One Cologne 2016',
            1
        );

        INSERT INTO tb_player(pro_cod, pro_nickname, pro_dtNasc, pro_nome)
        VALUES
            /* SK */
            (1, 'coldzera', '1994-10-31', 'Marcelo David'),
            (2, 'fer', '1991-10-31', 'Fernando Alvarenga'),
            (3, 'FalleN', '1991-05-30', 'Gabriel Toledo'),
            (4, 'fnx', '1990-01-30', 'Lincoln Lau'),
            (5, 'TACO', '1995-01-24', 'Epitacio de Melo'),
            /* LIQUID */
            (6, 's1ple', '1997-10-02', 'Oleksandr Kostyliev'),
            (7, 'Hiko', '1990-03-06', 'Spencer Martin'),
            (8, 'nitr0', '1995-08-16', 'Nick Cannella'),
            (9, 'jdm64', '1990-05-20', 'Josh Marzano'),
            (10, 'EliGE', '1997-07-16', 'Jonathan Jablonowski'),
            /* fnatic */
            (11, 'flusha', '1993-08-12', 'Robin Rönnquist'),
            (12, 'olofmeister', '1992-01-31', 'Olof Kajbjer'),
            (13, 'JW', '1995-02-23', 'Jesper Wecksell'),
            (14, 'dennis', '1991-01-07', 'Dennis Edman'),
            (15, 'KRIMZ', '1994-04-25', 'Freddy Johansson'),
            /* Virtus.pro */
            (16, 'TaZ', '1986-06-06', 'Wiktor Wojtas'),
            (17, 'pashaBiceps', '1988-04-11', 'Jarosław Jarząbkowski'),
            (18, 'Snax', '1993-07-05', 'Janusz Pogorzelski'),
            (19, 'NEO', '1987-06-15', 'Filip Kubski'),
            (20, 'byali', '1994-04-30', 'Paweł Bieliński');

        INSERT INTO rl_player_organizacao(pro_cod, pro_seq, pro_time)
        VALUES
            /* SK */
            (1, 1, 1),
            (2, 1, 1),
            (3, 1, 1),
            (4, 1, 1),
            (5, 1, 1),
            /* LIQUID */
            (6, 1, 3),
            (7, 1, 3),
            (8, 1, 3),
            (9, 1, 3),
            (10, 1, 3),
            /* Virtus.pro */
            (16, 1, 2),
            (17, 1, 2),
            (18, 1, 2),
            (19, 1, 2),
            (20, 1, 2),
            /* fnatic */
            (11, 1, 4),
            (12, 1, 4),
            (13, 1, 4),
            (14, 1, 4),
            (15, 1, 4);

        INSERT INTO rl_organizacao_jogo(organizacao, jogo)
        VALUES
            (1, 1),
            (2, 1),
            (3, 1),
            (4, 1);
        
        INSERT INTO tb_partida(par_codigo, par_data, par_time1, par_time2)
        VALUES
            (1, '2016-07-09', 2, 1),
            (2, '2016-07-09', 3, 4),
            (3, '2016-07-10', 1, 3);
            
        INSERT INTO tb_resultado_player_partida(resp_player, resp_partida, resp_kills, resp_deaths, resp_saldoKills, resp_adr, resp_kast, resp_rating2)
        VALUES
            /* Partida 1 -> Virtus.pro */
            (16, 1, 59, 67, -8, 79.3, 60, 1.02),
            (17, 1, 52, 62, -10, 69.4, 62.4, 0.94),
            (18, 1, 51, 57, -6, 67.4, 62.4, 0.91),
            (19, 1, 53, 68, -15, 71.9, 62.4, 0.87),
            (20, 1, 46, 65, -19, 64.9, 64.7, 0.85),
            /* Partida 1 -> SK */
            (1, 1, 72, 46, 26, 85.9, 80, 1.28),
            (2, 1, 65, 55, 10, 87.2, 76.5, 1.22),
            (3, 1, 63, 48, 15, 74, 72.9, 1.18),
            (4, 1, 58, 56, 2, 74.4, 74.1, 1.03),
            (5, 1, 58, 56, 2, 72.9, 63.5, 0.97),
            /* Partida 2 -> Liquid */
            (6, 2, 55, 40, 15, 95.4, 77.6, 1.32),
            (10, 2, 44, 38, 6, 86.7, 62.1, 1.2),
            (8, 2, 34, 39, -5, 71.2, 67.2, 0.98),
            (7, 2, 32, 38, -6, 72.5, 69, 0.95),
            (9, 2, 34, 36, -2, 57.6, 67.2, 0.93),
            /* Partida 2 -> fnatic */
            (15, 2, 45, 39, 6, 70.9, 70.7, 1.04),
            (14, 2, 42, 40, 2, 78.3, 69, 1.04),
            (13, 2, 34, 40, -6, 75.8, 67.2, 1),
            (12, 2, 36, 42, -6, 74.6, 60.3, 0.97),
            (11, 2, 33, 39, -6, 70, 62.1, 0.92),
            /* Partida 3 -> SK */
            (1, 3, 44, 20, 24, 96, 88.9, 1.59),
            (5, 3, 42, 26, 16, 99.9, 68.9, 1.46),
            (4, 3, 34, 31, 3, 86.8, 75.6, 1.18),
            (3, 3, 34, 27, 7, 71, 68.9, 1.16),
            (2, 3, 27, 31, -4, 59.4, 71.1, 1.04);

    /* Inserção das informações para simulação do fechamento de período */
    ELSEIF flag = 3 THEN
        SELECT 1;

    /* FLAG UTILIZADA INVÁLIDA */
    ELSE
        SELECT 404;
    END IF;

END