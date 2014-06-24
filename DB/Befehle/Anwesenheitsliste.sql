SELECT CONCAT(person.v_name, ' ', person.name) AS Teilnehmer
FROM person
JOIN teilnehmer_tg ON teilnehmer_tg.p_id = person.p_id
JOIN trainingseinheit ON teilnehmer_tg.tg_id = trainingseinheit.tg_id
WHERE trainingseinheit.tr_id = ?