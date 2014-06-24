SELECT CONCAT(person.v_name, ' ', person.name) AS Teilnehmer
FROM person
JOIN abwesenheit ON abwesenheit.p_id = person.p_id
JOIN trainingseinheit ON abwesenheit.tr_id = trainingseinheit.tr_id
WHERE trainingseinheit.tr_id = ?