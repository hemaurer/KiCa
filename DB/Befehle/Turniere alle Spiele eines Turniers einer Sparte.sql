SELECT spiel.s_id AS SpielID, heim.name AS Heim, auswaerts.name AS Auswaerts, spiel.h_tore AS Heimtore, spiel.a_tore AS Auswaertstore, `status`.`status` AS Status
FROM spiel
JOIN `status` ON `status`.stat_id=spiel.stat_id
JOIN mannschaft AS heim ON heim.m_id =spiel.heim
JOIN mannschaft AS auswaerts ON auswaerts.m_id = spiel.auswaerts
WHERE spiel.tu_id =? and spiel.sparte_id= ?;