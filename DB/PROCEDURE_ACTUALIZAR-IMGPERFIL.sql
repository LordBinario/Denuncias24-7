DELIMITER $$
CREATE PROCEDURE ACTUALIZAR_IMGPERFIL
(
    IDUSUARIO INT,
    IMAGEN_PERFIL TEXT
)
BEGIN

	UPDATE usuario U SET U.IMAGEN_PERFIL = IMAGEN_PERFIL
    WHERE U.ID_USUARIO = IDUSUARIO;

END $$;