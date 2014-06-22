DELETE FROM aufstellung
WHERE aufstellung.s_id = 1
;
INSERT INTO aufstellung values (aufstellung.s_id, aufstellung.p_id)