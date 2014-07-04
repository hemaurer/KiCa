SELECT mannschaft.name AS Gewinner
FROM mannschaft
JOIN turnier_sparte ON turnier_sparte.gewinner = mannschaft.m_id
WHERE turnier_sparte.tu_id = ? AND turnier_sparte.sparte_id = ?