SELECT titre as 'Titre', resum as 'Resume', annee_prod from film
	INNER JOIN genre ON genre.id_genre = film.id_genre
	WHERE genre.nom = 'erotic'
	ORDER BY annee_prod DESC;