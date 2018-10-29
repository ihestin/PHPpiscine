-- Affichez dans une colonne nommée ’ft5’ le MD5 du numéro de telephone du distributeur ayant l’id 84. 
-- Avant le cryptage du numéro il faut lui ajouter le nombre 42 en fin de chaîne puis remplacer les chiffres 7 par des 9.

SELECT MD5(REPLACE(CONCAT(telephone,'42'),'7','9')) AS 'ft5'
	FROM distrib WHERE id_distrib = 84;
