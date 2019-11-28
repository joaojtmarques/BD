SELECT local_publico.nome,
       COUNT(*) 
FROM anomalia 
    LEFT JOIN incidencia ON anomalia.id = incidencia.anomalia_id 
    LEFT JOIN item ON item.id = incidencia.item_id 
GROUP BY latitude,
         longitude 
HAVING COUNT(*) >= (
    SELECT COUNT(*) 
    FROM anomalia 
        LEFT JOIN incidencia ON anomalia.id = incidencia.anomalia_id 
        LEFT JOIN item ON item.id = incidencia.item_id 
    GROUP BY latitude,longitude 
    ORDER BY COUNT(*) DESC LIMIT 1
);