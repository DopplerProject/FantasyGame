
-- Acesso de administrador ao sistema

USE DB_TCC;
INSERT INTO tb_usuario(usu_nickname, usu_email, usu_celular, usu_senha, usu_money)
VALUES (
    'ADMIN',
    'admin',
    'admin',
    '21232f297a57a5a743894a0e4a801fc3', -- Senha admin criptogafada
    600
);