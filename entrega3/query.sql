

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


4. wtf

select * from utilizador_qualificado natural join utilizador natural join incidencia left join correcao on incidencia.anomalia_id = correcao.anomalia_id where correcao.anomalia_id is NULL;

select email from utilizador_qualificado natural join utilizador natural join incidencia inner join item on incidencia.item_id = item.id inner join anomalia on incidencia.anomalia_id = anomalia.id where extract(year from ts) = '2018' and latitude < 39.336775;


select utilizador.email from (utilizador_qualificado natural join utilizador natural join incidencia left join correcao on (incidencia.anomalia_id = correcao.anomalia_id and incidencia.email = correcao.email)inner join item on incidencia.item_id = item.id inner join anomalia on incidencia.anomalia_id = anomalia.id) where extract(year from ts) = '2018' and latitude < 39.336775 and correcao.anomalia_id is NULL;

select utilizador.email from (utilizador_qualificado natural join utilizador natural join incidencia left join correcao on (incidencia.anomalia_id = correcao.anomalia_id and incidencia.email = correcao.email)inner join item on incidencia.item_id = item.id inner join anomalia on incidencia.anomalia_id = anomalia.id) where extract(year from ts) = '2018' and latitude < 39.336775 and correcao.anomalia_id is NULL;
