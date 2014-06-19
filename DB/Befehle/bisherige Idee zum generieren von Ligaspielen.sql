INSERT INTO spiel(tu_id,sparte_id,heim,auswaerts,ort,stat_id,zeit)
SELECT a.tu_id,a.sparte_id,a.m_id as Heim,b.m_id as Aus,'TEST' as ort,'1' as stat_id, NOW()
FROM mannschaft_turnier_sparte as a
JOIN mannschaft_turnier_sparte as b on a.tu_id = b.tu_id And a.sparte_id=b.sparte_id
JOIN turnier as t on t.tu_id=a.tu_id
WHERE a.tu_id<>5 and t.liga=TRUE and a.m_id <> b.m_id  