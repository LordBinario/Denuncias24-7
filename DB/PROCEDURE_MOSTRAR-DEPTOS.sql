DELIMITER $$
CREATE PROCEDURE MOSTRAR_DEPTOS()
BEGIN

	SELECT D.ID_DEPTO, D.DEPTO FROM departamento D;

END $$;