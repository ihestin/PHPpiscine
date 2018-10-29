-- Affichez tous les films qui ont un id_genre compris entre 4 et 8 inclus. 
-- La requète affichera l’id_genre, le nom du genre, mais aussi l’id du distributeur, le nom du distributeur et le titre du film. 
-- Il faudra donc une colonne ’id_genre’, ’nom genre’, ’id_distrib’, ’nom distrib’ et ’titre film’. 
-- La requête doit afficher l’id_genre, l’id du distributeur et le titre des films,
--  même si on n’arrive pas à récupérer son nom de genre ou le nom du distributeur.

SELECT F.id_genre, G.nom AS 'nom genre', F.id_distrib, D.nom 'nom distrib', F.titre 'titre film'
	FROM film F 
	LEFT JOIN genre G ON F.id_genre = G.id_genre
	LEFT JOIN distrib D ON F.id_distrib = D.id_distrib
	WHERE F.id_genre BETWEEN 4 AND 8;