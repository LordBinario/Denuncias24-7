DELIMITER $$
CREATE PROCEDURE CONTRASEÑAS
(
	IDUSUARIO INT
)
BEGIN

	SELECT C.CONTRASEÑA FROM contraseñas C WHERE C.ID_USUARIO = IDUSUARIO AND C.ID_TIPO = 2;

END $$;