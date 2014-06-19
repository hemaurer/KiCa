<?php

class TrainingModel
{

    function __construct($db) {
        try
		{
            $this->db = $db;
        }
		catch (PDOException $e)
		{
            exit('Database connection could not be established.');
        }
    }
	
	function get_Training($id){
		// Suche Training mit bestimmter ID
        $sql = "SELECT trainingseinheit.tr_id as tr_id, trainingseinheit.name as Name, trainingseinheit.ort as Ort, trainingseinheit.zeit as Uhrzeit, trainingsgruppe.name as Trainingsgruppe, CONCAT (person.name, ', ', person.v_name ) as Trainer 
			FROM trainingseinheit
			JOIN trainingsgruppe ON trainingseinheit.tg_id = trainingsgruppe.tg_id
			JOIN person ON trainingseinheit.trainer = person.p_id
			WHERE trainingseinheit.tr_id = ".$id;
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetch();
	}
}?>