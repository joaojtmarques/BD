SELECT tipo_anomalia, null, null::int4, count(tipo_anomalia) 
FROM f_anomalia GROUP BY tipo_anomalia 
UNION ALL 
	SELECT null, lingua, null::int4, count(lingua) 
	FROM f_anomalia natural join d_lingua GROUP BY lingua 
	UNION ALL 
		SELECT null, null, dia_da_semana, count(dia_da_semana) 
		FROM f_anomalia natural join d_tempo GROUP BY dia_da_semana 
		UNION ALL 
			SELECT tipo_anomalia, lingua, null, count((tipo_anomalia, lingua)) 
			FROM f_anomalia natural join d_lingua GROUP BY tipo_anomalia, lingua 
			UNION ALL 
				SELECT tipo_anomalia, null, dia_da_semana, count((tipo_anomalia, dia_da_semana)) 
				FROM f_anomalia natural join d_tempo GROUP BY tipo_anomalia, dia_da_semana 
				UNION ALL 
				SELECT null, lingua, dia_da_semana, count((lingua, dia_da_semana)) 
				FROM f_anomalia natural join d_tempo, d_lingua GROUP BY lingua, dia_da_semana 
				UNION ALL 
					SELECT tipo_anomalia, lingua, dia_da_semana, count((tipo_anomalia, lingua, dia_da_semana)) 
					FROM f_anomalia natural join d_tempo natural join d_lingua 
					GROUP BY tipo_anomalia, lingua, dia_da_semana;