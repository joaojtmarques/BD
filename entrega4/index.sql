create index index_name on proposta_correcao (data_hora);

create index index_name on incidencia(anomalia_id) using hash;

create index index_name on anomalia(ts, tem_anomalia_redacao, language) ;