SELECT turnier.name AS Turnier, sparte.name AS Sparte, IFNULL(mannschaft.name,'noch nicht ermittelt') AS Gewinner
	FROM turnier_sparte
	JOIN turnier ON turnier.tu_id = turnier_sparte.tu_id
	JOIN sparte ON sparte.sparte_id = turnier_sparte.sparte_id
	LEFT JOIN mannschaft ON mannschaft.m_id = turnier_sparte.gewinner