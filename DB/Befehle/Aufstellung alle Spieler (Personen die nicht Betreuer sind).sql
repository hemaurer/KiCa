SELECT CONCAT (person.v_name,' ', person.name) AS Spieler, person.p_id AS PersonID
FROM person
WHERE person.betreuer <> 1