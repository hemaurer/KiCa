SELECT mannschaft.name AS Team, 
(SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id or spiel.auswaerts = mannschaft.m_id) and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1 and spiel.h_tore IS NOT NULL and spiel.a_tore IS NOT NULL) AS Spiele,
(SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id and spiel.h_tore > spiel.a_tore or  spiel.auswaerts = mannschaft.m_id and spiel.h_tore < spiel.a_tore) and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1) AS S,
(SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id or spiel.auswaerts = mannschaft.m_id) and spiel.h_tore = spiel.a_tore and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1) AS U,
(SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id and spiel.h_tore < spiel.a_tore or  spiel.auswaerts = mannschaft.m_id and spiel.h_tore > spiel.a_tore) and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1) AS N,
(SELECT COUNT(*)*3 FROM spiel WHERE (spiel.heim = mannschaft.m_id and spiel.h_tore > spiel.a_tore or  spiel.auswaerts = mannschaft.m_id and spiel.h_tore < spiel.a_tore) and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1) + 
(SELECT COUNT(*) FROM spiel WHERE (spiel.heim = mannschaft.m_id or spiel.auswaerts = mannschaft.m_id) and spiel.h_tore = spiel.a_tore and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1) AS Punkte,
CONCAT((SELECT IFNULL(SUM(spiel.h_tore),0) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1) +  (SELECT IFNULL(SUM(spiel.a_tore),0) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1  and spiel.tu_id = 1 and spiel.sparte_id = 1),':', 
(SELECT IFNULL(SUM(spiel.h_tore),0) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1) +  (SELECT IFNULL(SUM(spiel.a_tore),0) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1)) AS Tore,
(SELECT IFNULL(SUM(spiel.h_tore),0) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1) +  (SELECT IFNULL(SUM(spiel.a_tore),0) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1) -
((SELECT IFNULL(SUM(spiel.h_tore),0) FROM spiel WHERE spiel.auswaerts = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1) + (SELECT IFNULL(SUM(spiel.a_tore),0) FROM spiel WHERE spiel.heim = mannschaft.m_id and spiel.stat_id = 1 and spiel.tu_id = 1 and spiel.sparte_id = 1)) AS TD
FROM mannschaft
JOIN mannschaft_turnier_sparte ON mannschaft.m_id = mannschaft_turnier_sparte.m_id
WHERE mannschaft_turnier_sparte.tu_id = (SELECT  turnier.tu_id
															FROM turnier
															JOIN mannschaft_turnier_sparte ON turnier.tu_id = mannschaft_turnier_sparte.tu_id
															WHERE turnier.liga= TRUE AND mannschaft_turnier_sparte.m_id=1 AND mannschaft_turnier_sparte.sparte_id = 1)
		AND mannschaft_turnier_sparte.sparte_id = 1
ORDER BY Punkte DESC,
			TD DESC