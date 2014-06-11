SELECT trainingseinheit.name as Name, trainingseinheit.ort as Ort, trainingseinheit.zeit as Uhrzeit, trainingsgruppe.name as Trainingsgruppe, CONCAT (person.name, ', ', person.v_name ) as Trainer 
	FROM trainingseinheit
		JOIN trainingsgruppe ON trainingseinheit.tg_id = trainingsgruppe.tg_id
		JOIN person ON trainingseinheit.trainer = person.p_id