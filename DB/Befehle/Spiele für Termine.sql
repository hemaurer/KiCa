SELECT spiel.s_id, spiel.ort as Ort, heim.name as Heim, auswaerts.name as Auswaerts, spiel.h_tore as Heimtore, spiel.a_tore as Auswaertstore, `status`.`status` as Status, spiel.zeit as Uhrzeit, turnier.name as Turnier , sparte.name AS Sparte
	FROM spiel 
		JOIN mannschaft as heim ON spiel.heim = heim.m_id
		JOIN mannschaft as auswaerts ON spiel.auswaerts = auswaerts.m_id
		JOIN `status` ON spiel.stat_id =`status`.stat_id
		JOIN turnier ON spiel.tu_id = turnier.tu_id
		JOIN sparte ON spiel.sparte_id = sparte.sparte_id
		WHERE CONVERT(spiel.zeit,DATE)>= DATE_ADD(CURRENT_DATE(),INTERVAL -7 DAY)
ORDER BY Uhrzeit ASC