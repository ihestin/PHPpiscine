SELECT titre, resum from film
	WHERE titre LIKE '%42%' OR resum LIKE '%42%' ORDER BY duree_min;