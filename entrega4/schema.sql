drop table correcao cascade;
drop table proposta_de_correcao cascade;
drop table incidencia cascade;
drop table utilizador_regular cascade;
drop table utilizador_qualificado cascade;
drop table utilizador cascade;
drop table duplicado cascade;
drop table anomalia_traducao cascade;
drop table anomalia cascade;
drop table item cascade;
drop table local_publico cascade;


drop table if exists d_utilizador cascade;
drop table if exists d_tempo cascade;
drop table if exists d_local cascade;
drop table if exists d_lingua cascade;
drop table if exists f_anomalia cascade;



create table local_publico (
    latitude float not null,
    longitude float not null,
    unique(latitude, longitude),
    nome char(20) not null,
    primary key (latitude, longitude)
);

create table item (
    id serial not null unique,
    descricao text not null,
    localizacao char(14) not null,
    latitude float not null,
    longitude float not null,
    foreign key(latitude, longitude) references local_publico(latitude, longitude) ON DELETE CASCADE ON UPDATE CASCADE,
    primary key(id)
);

create table anomalia (
    id serial not null unique,
    zona char(10) not null,
    imagem char(10) not null, 
    lingua char(12) not null,
    ts timestamp not null,
    descricao text not null,
    tem_anomalia_redacao boolean not null,
    primary key (id)
);

create table anomalia_traducao (
    id serial not null,
    zona2 char(10) not null,
    lingua2 char(12) not null,
    foreign key(id) references anomalia(id) ON DELETE CASCADE ON UPDATE CASCADE,
    primary key (id)
);



CREATE OR REPLACE FUNCTION check_zona_func() RETURNS trigger AS $check_zona$
    BEGIN      

        IF EXISTS(select zona from anomalia where zona = new.zona2)
        THEN
            RAISE EXCEPTION 'Zona da anomalia de traducao não se pode sobrepor a zona da anomalia';
        END IF;

        RETURN NEW;
    END;
$check_zona$ LANGUAGE plpgsql;

CREATE TRIGGER check_zona BEFORE INSERT
    ON anomalia_traducao
    FOR EACH ROW
    EXECUTE PROCEDURE check_zona_func();



create table duplicado (
    item1 serial not null,
    item2 serial not null,
    primary key(item1, item2),
    foreign key(item1) references item(id) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(item2) references item(id) ON DELETE CASCADE ON UPDATE CASCADE,
    unique(item1,item2),
    check (item1 < item2)
);

create table utilizador (
    email char(20) not null unique,
    password char(14) not null,
    primary key(email)
);






create table utilizador_qualificado (
    email char(20) not null unique,
    foreign key(email) references utilizador(email) ON DELETE CASCADE ON UPDATE CASCADE
);

create table utilizador_regular (
    email char(20) not null unique,
    foreign key(email) references utilizador(email) ON DELETE CASCADE ON UPDATE CASCADE
);

create or replace function triggerEmailExistsUtilizadorQualificado() returns trigger as $$
begin
if exists (
     select * from utilizador_qualificado where
    utilizador_qualificado.email = new.email )
then
    raise exception 'O utilzador ja existe em utilizador_qualificado';
end if;
    return new;
end;
$$
language plpgsql;

create trigger checkMailQualificado before insert on utilizador_regular for each row execute procedure triggerEmailExistsUtilizadorQualificado();


create or replace function triggerEmailExistsUtilizadorRegular() returns trigger as $$
begin
if exists (
     select * from utilizador_regular where
    utilizador_regular.email = new.email )
then
    raise exception 'O utilzador ja existe em utilizador_regular';
end if;
    return new;
end;
$$
language plpgsql;

create trigger checkMailRegular before insert on utilizador_qualificado for each row execute procedure triggerEmailExistsUtilizadorRegular();

create or replace function check_email_utilizador() returns trigger as $$
BEGIN
if exists (
    select email from utilizador_qualificado union select email from utilizador_regular where not email = new.email
)
then 
    raise exception 'O email de utilizador nao figura em utilizador_qualificado nem em utilizador_regular';
end if;
    return new;
end;
$$
language plpgsql;

create CONSTRAINT trigger email_utilizador after insert or update on utilizador 
DEFERRABLE INITIALLY DEFERRED 
FOR EACH ROW EXECUTE PROCEDURE check_email_utilizador();




create table incidencia (
    anomalia_id serial not null unique,
    item_id serial not null,
    email char(20) not null,
    foreign key(anomalia_id) references anomalia(id) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(item_id) references item(id) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(email) references utilizador(email) ON DELETE CASCADE ON UPDATE CASCADE,
    primary key(anomalia_id)
);

create table proposta_de_correcao (
    email char(20) not null,
    nro serial not null unique,
    data_hora timestamp not null,
    texto text not null,
    foreign key(email) references utilizador_qualificado(email) ON DELETE CASCADE ON UPDATE CASCADE,
    primary key(email, nro)
);

create table correcao (
    email char(20) not null,
    nro serial not null unique,
    anomalia_id serial not null,
    foreign key(email, nro) references proposta_de_correcao(email, nro) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(anomalia_id) references incidencia(anomalia_id) ON DELETE CASCADE ON UPDATE CASCADE,
    primary key(email, nro, anomalia_id)
 );






create table d_utilizador (
    id_utilizador serial not null,
    email char(20) not null,
    tipo char(20) not null,
    primary key(id_utilizador)
);

create table d_tempo ( 
    id_tempo serial not null,
    dia integer not null,
    dia_da_semana integer not null,
    semana integer not null,
    mes integer not null,
    trimestre integer not null,
    ano integer not null,
    primary key(id_tempo)
);

create table d_local (
    id_local serial not null,
    latitude float not null,
    longitude float not null,
    nome char(20) not null,
    primary key (id_local)
);

create table d_lingua (
    id_lingua serial not null,
    lingua char(12) not null,
    primary key (id_lingua)
);

create table f_anomalia (
    id_utilizador integer,
    id_tempo integer,
    id_local integer,
    id_lingua integer,
    tipo_anomalia char(20),
    com_proposta boolean,
    primary key (id_utilizador, id_tempo, id_local, id_lingua),
    foreign key (id_utilizador) references d_utilizador(id_utilizador) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key (id_tempo) references d_tempo(id_tempo) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key (id_local) references d_local(id_local) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key (id_lingua) references d_lingua(id_lingua) ON DELETE CASCADE ON UPDATE CASCADE
);



