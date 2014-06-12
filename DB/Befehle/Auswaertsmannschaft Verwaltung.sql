SELECT DISTINCT mannschaft.name AS Mannschaft
	FROM mannschaft
		JOIN mannschaft_turnier_sparte ON mannschaft.m_id = mannschaft_turnier_sparte.m_id
		JOIN turnier ON turnier.tu_id = mannschaft_turnier_sparte.tu_id
		JOIN sparte ON sparte.sparte_id = mannschaft_turnier_sparte.sparte_id
	WHERE IFNULL(turnier.name = NULL,TRUE) and IFNULL(sparte.name = NULL,TRUE) and NOT IFNULL(mannschaft.name =NULL,FALSE)
	ORDER BY Mannschaft;