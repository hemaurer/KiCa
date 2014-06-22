SELECT CONCAT (person.v_name,' ', person.name) AS Spieler, aufstellung.p_id AS PersonID
FROM aufstellung
JOIN person On person.p_id = aufstellung.p_id
WHERE aufstellung.s_id = 1