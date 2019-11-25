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

create table local_publico (
    latitude float not null,
    longitude float not null,
    nome char(100) not null,
    primary key (latitude, longitude)
);

create table item (
    id serial not null unique,
    descricao char(200) not null,
    localizacao char(100) not null,
    latitude float not null,
    longitude float not null,
    foreign key(latitude, longitude) references local_publico(latitude, longitude) ON DELETE CASCADE ON UPDATE CASCADE,
    primary key(id)
);

create table anomalia (
    id serial not null unique,
    zona char(50) not null,
    imagem char(100) not null, /*verificar isto*/
    lingua char(50) not null,
    ts timestamp not null,
    descricao text not null,
    tem_anomalia_redacao boolean not null,
    primary key (id)
);

create table anomalia_traducao (
    id serial not null,
    zona2 char(50) not null,
    lingua2 char(50) not null,
    foreign key(id) references anomalia(id) ON DELETE CASCADE ON UPDATE CASCADE

);

/* falta ver se lingua != lingua 2 e zonas*/

create table duplicado (
    item1 serial not null unique,
    item2 serial not null unique,
    primary key(item1, item2),
    foreign key(item1) references item(id) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(item2) references item(id) ON DELETE CASCADE ON UPDATE CASCADE,
    check (item1 < item2)
    /*RI3*/
    
);

create table utilizador (
    email char(50) not null unique,
    password char(50) not null,
    primary key(email)
    /*RI 4*/
);

create table utilizador_qualificado (
    email char(50) not null unique,
    foreign key(email) references utilizador(email) ON DELETE CASCADE ON UPDATE CASCADE
    /*falta ver deste mambo*/
);

create table utilizador_regular (
    email char(50) not null unique,
    foreign key(email) references utilizador(email) ON DELETE CASCADE ON UPDATE CASCADE
    /*falta ver deste mambo*/
);

create table incidencia (
    anomalia_id serial not null unique,
    item_id serial not null unique,
    email char(50) not null unique,
    foreign key(anomalia_id) references anomalia(id) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(item_id) references item(id) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(email) references utilizador(email) ON DELETE CASCADE ON UPDATE CASCADE,
    primary key(anomalia_id)
);

create table proposta_de_correcao (
    email char(50) not null unique,
    nro serial not null unique,
    data_hora timestamp not null,
    texto text not null,
    foreign key(email) references utilizador_qualificado(email) ON DELETE CASCADE ON UPDATE CASCADE,
    primary key(email, nro)
    /*email e nro tem de figurar em correcao, temos de ver deste mambo*/
);

create table correcao (
    email char(50) not null unique,
    nro serial not null unique,
    anomalia_id serial not null unique,
    foreign key(email, nro) references proposta_de_correcao(email, nro) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key(anomalia_id) references incidencia(anomalia_id) ON DELETE CASCADE ON UPDATE CASCADE,
    primary key(email, nro, anomalia_id)
 );