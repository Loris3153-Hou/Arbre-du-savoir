INSERT INTO LIEU VALUES (0, '15 Rue du petit Maitre', 'Vienne', 'Autriche'),
	(0, '250 Avenue de la Grande Arche', 'Lyon', 'France'),
    (0, '27b Boulevard de la Croix', 'Saumur', 'France'),
    (0, '28 Impasse de la Chapelle', 'Dax', 'France'),
    (0, '1 Rue du Marais', 'Séville', 'Espagne'),
    (0, '151 Rue des Lumières', 'Rome', 'Italie'),
    (0, '67 Avenue des Lilas', 'St-Nazaire', 'France'),
    (0, '21 bis Boulevard de la Vie', 'Paris', 'France'),
    (0, '12 Rue des Hirondelles', 'Hamburg', 'Allemagne'),
    (0, '47 ter Avenue de la Côte Ouest', 'La Rochelle', 'France');

INSERT INTO CATEGORIE VALUES (0, 'marketing'),
	(0, 'programation web'),
    (0, 'programation mobile'),
    (0, 'gestion'),
    (0, 'informatique'),
    (0, 'cybersecurité'),
    (0, 'réseaux sociaux'),
    (0, 'science des données'),
    (0, 'éducation'),
    (0, 'art');

INSERT INTO FORMATION VALUES (0,'Marketing Digital Avancé', 'Cette formation couvre les stratégies avancées de marketing en ligne, y compris le référencement, la publicité payante, l analyse des données et la gestion des médias sociaux. Elle est dispensée par des experts de l industrie.', 'pdt1.jpg', 0.0, 'Avancé', 'Diplôme en marketing digital', '2023-09-30', '2024-04-17'),
	(0,'Développement Web Full-Stack', '...', 'pdt2.jpg', 0.0, 'Intermédiaire', 'Certification de niveau 2 en développemt full-stack', '2023-10-12', '2024-06-07'),
    (0,'Leadership et Gestion d''Équipe', '...', 'pdt3.jpg', 0.0, 'Avancé', 'Diplôme de management', '2024-08-30', '2026-07-20'),
    (0,'Développement d''Applications Mobiles', '...', 'pdt4.jpg', 0.0, 'Débutant', 'Certification en développement mobile', '2023-09-04', '2026-06-14'),
    (0,'Marketing des Réseaux Sociaux', '...', 'pdt5.jpg', 0.0, 'Débutant', 'Diplôme de spécialiste marketing des Réseaux Sociaux', '2024-11-15', '2027-08-02'),
    (0,'Cybersécurité et Protection des Données', '...', 'pdt6.jpg', 0.0, 'Avancé', 'Certification de niveau 4 en cybersécurité et protection des données', '2023-09-01', '2026-08-15'),
    (0,'Gestion de Projet Agile', '...', 'pdt7.jpg', 0.0, 'Intermédiaire', 'Certification Agile', '2023-09-07', '2023-11-12'),
    (0,'Leadership Stratégique', '...', 'pdt8.jpg', 0.0, 'Intermédiaire', 'Diplôme en leadership stratégique', '2023-10-15', '2024-05-05'),
    (0,'Programmer en C', '...', 'pdt9.jpg', 0.0, 'Débutant', 'Certification de niveau 1 en programmation en C', '2024-01-03', '2024-02-26');

INSERT INTO FORMATION_LIEU VALUES (1, 1), (1, 4), (1, 2), (2, 1), (2, 3), (3, 5), (3, 10), (3, 9), (4, 4), (4, 6), (4, 1), (5, 8), (5, 6),
	(5, 2), (5, 7), (6, 10), (6, 7), (7, 8), (7, 9), (8, 1), (8, 5), (9, 3), (9, 4);

INSERT INTO FORMATION_CATEGORIE VALUES (1, 1), (1, 5), (2, 2), (2, 5), (3, 1), (4, 3), (4, 5), (5, 1), (5, 7), (6, 5), (6, 6), (6, 8), (7, 4), (8, 1), (9, 5);