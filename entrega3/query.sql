

1. 

SELECT nome FROM local_publico 
NATURAL JOIN item 
INNER JOIN incidencia on item.id = incidencia.item_id 
GROUP BY nome 
HAVING count((latitude,longitude)) >= 
ALL( SELECT COUNT((latitude,longitude)) FROM local_publico 
NATURAL JOIN item INNER JOIN incidencia ON item.id = incidencia.item_id GROUP BY nome);	

2.

select email from (anomalia
natural join anomalia_traducao 
inner join incidencia on anomalia.id = incidencia.anomalia_id 
natural join utilizador 
natural join utilizador_regular) 
where extract(month from ts) < '07' and extract(year from ts) = '2019' 
group by email having count(email) >=
ALL(select count(email) from anomalia
natural join anomalia_traducao 
inner join incidencia on anomalia.id = incidencia.anomalia_id
natural join utilizador
natural join utilizador_regular 
where extract(month from ts) < '07' and extract(year from ts) = '2019' group by email);

3.

select email  from (utilizador 
natural join incidencia 
inner join item on item.id = incidencia.item_id 
inner join anomalia on anomalia.id = incidencia.anomalia_id) 
where extract(year from ts) = 2019 and latitude > 39.336775;


4.

select email from 
(select utilizador_qualificado.email from 
(select email from (select count(email) as countp, counti, email  from 
(select * from (select * from (select count(email) as countI, email from incidencia 
natural join utilizador_qualificado group by email) as TempTable natural join incidencia) as TempTable2 
natural join correcao where TempTable2.email = correcao.email and TempTable2.anomalia_id = correcao.anomalia_id) as TempTable3 
group by email, counti) as TempTable4 where counti = countp) as TempTable5 
inner join utilizador_qualificado on TempTable5.email <> utilizador_qualificado.email) as TempTable6 
natural join incidencia inner join item on incidencia.item_id = item.id 
inner join anomalia on anomalia.id = anomalia_id where extract(year from ts) = '2019' and latitude < 39.336775 group by email;