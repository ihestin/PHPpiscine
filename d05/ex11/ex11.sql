SELECT UPPER(P.nom) AS 'NOM', P.prenom, a.prix FROM abonnement AS A, membre AS M, fiche_personne as P
    WHERE a.prix > 42 and A.id_abo = M.id_abo AND M.id_fiche_perso = P.id_perso
    ORDER BY P.nom,P.prenom; 