create table artikelen
(
    id           int unsigned auto_increment
        primary key,
    omschrijving varchar(255) not null,
    actief       tinyint(1)   not null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO md597010db575324.artikelen (omschrijving, actief) VALUES ('Oliefilter', 1);
INSERT INTO md597010db575324.artikelen (omschrijving, actief) VALUES ('Luchtfilter', 1);
INSERT INTO md597010db575324.artikelen (omschrijving, actief) VALUES ('Interieurfilter', 1);
INSERT INTO md597010db575324.artikelen (omschrijving, actief) VALUES ('Olie 5W30', 1);
INSERT INTO md597010db575324.artikelen (omschrijving, actief) VALUES ('H1 lampje', 1);create table autos
(
    id       int unsigned auto_increment
        primary key,
    kenteken varchar(255) not null,
    merk     varchar(255) not null,
    type     varchar(255) not null,
    meldcode varchar(4)   not null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('26xljh', 'LandRover', 'RangeRover', '4545');
INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('14pbb4', 'Mini', 'Cooper', '5989');
INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('000000', 'Peugeot', '206', '9999');
INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('787878', 'BMW', '2-serie', '4444');
INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('111111', 'BMW', '1serie', '5555');
INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('555555', 'Mercedes', 'Vito', '9876');
INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('pppppp', 'Mercedes', 'A klasse', '5555');
INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('222222', 'Peugeot', 'dddddd', '4444');
INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('zjrb32', 'BMW', '3 serie', '8888');
INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('444444', 'Mercedes', 'CLA', '4545');
INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('21vrg3', 'Mercedes', 'Vito', '3456');
INSERT INTO md597010db575324.autos (kenteken, merk, type, meldcode) VALUES ('707070', 'BMW', '1 serie', '5555');create table failed_jobs
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       varchar(255)                        not null,
    connection text                                not null,
    queue      text                                not null,
    payload    longtext                            not null,
    exception  longtext                            not null,
    failed_at  timestamp default CURRENT_TIMESTAMP not null,
    constraint failed_jobs_uuid_unique
        unique (uuid)
)
    collate = utf8mb4_unicode_ci;

create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO md597010db575324.migrations (migration, batch) VALUES ('2021_10_14_115701_create_werkzaamheden_table', 3);
INSERT INTO md597010db575324.migrations (migration, batch) VALUES ('2021_10_14_115809_create_werkzaamheden_table', 4);
INSERT INTO md597010db575324.migrations (migration, batch) VALUES ('2014_10_12_000000_create_users_table', 5);
INSERT INTO md597010db575324.migrations (migration, batch) VALUES ('2014_10_12_100000_create_password_resets_table', 5);
INSERT INTO md597010db575324.migrations (migration, batch) VALUES ('2019_08_19_000000_create_failed_jobs_table', 5);
INSERT INTO md597010db575324.migrations (migration, batch) VALUES ('2019_12_14_000001_create_personal_access_tokens_table', 5);
INSERT INTO md597010db575324.migrations (migration, batch) VALUES ('2021_10_13_143020_create_planning_table', 5);
INSERT INTO md597010db575324.migrations (migration, batch) VALUES ('2021_10_14_150054_create_werkzaamheden_table', 6);
INSERT INTO md597010db575324.migrations (migration, batch) VALUES ('2021_10_14_150400_create_artikelen_table', 7);
INSERT INTO md597010db575324.migrations (migration, batch) VALUES ('2021_10_14_194502_create_autos_table', 8);create table password_resets
(
    email      varchar(255) not null,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index password_resets_email_index
    on password_resets (email);

INSERT INTO md597010db575324.password_resets (email, token, created_at) VALUES ('roy_2000debie@hotmail.com', '$2y$10$RVb6wmLgAqo2YILaa77fr.uemCEvbvUOA6wGjzwyu/yWBhtl3X1D2', '2021-11-16 20:31:53');create table personal_access_tokens
(
    id             bigint unsigned auto_increment
        primary key,
    tokenable_type varchar(255)    not null,
    tokenable_id   bigint unsigned not null,
    name           varchar(255)    not null,
    token          varchar(64)     not null,
    abilities      text            null,
    last_used_at   timestamp       null,
    created_at     timestamp       null,
    updated_at     timestamp       null,
    constraint personal_access_tokens_token_unique
        unique (token)
)
    collate = utf8mb4_unicode_ci;

create index personal_access_tokens_tokenable_type_tokenable_id_index
    on personal_access_tokens (tokenable_type, tokenable_id);

create table planning
(
    id             int unsigned auto_increment
        primary key,
    kenteken       varchar(255)  not null,
    meldtijd       time          not null,
    omschrijving   varchar(1000) null,
    kilometerstand int           null,
    status         varchar(50)   null,
    werkzaamheden  varchar(255)  not null,
    ophaaldatum    date          null,
    melddatum      date          not null,
    ophaaltijd     time          null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 189700, 'opgehaald', 'Reparatie', '09:24:00', 'Voorbanden trillen', '2021-11-11', '2021-11-12', '15:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Reparatie', '14:16:00', 'sdfsdfsd', '2021-11-14', '2021-11-11', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Reparatie', '14:52:00', 'dsfdsfsd', '2021-11-11', '2021-11-09', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('444444', 0, 'opgehaald', 'Reparatie', '23:12:00', 'dsfdsfsdds', '2021-11-08', '2021-11-08', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('444444', 0, 'opgehaald', 'Grote beurt', '23:13:00', 'dsafsdd', '2021-11-08', '2021-11-08', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Reparatie', '23:16:00', 'fdsfsd', '2021-11-11', '2021-11-08', '18:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Reparatie', '23:17:00', 'ffffff', '2021-11-11', '2021-11-11', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('14pbb4', 0, 'opgehaald', 'Grote beurt', '23:22:00', 'dsfdsfsdfsdf', '2021-11-11', '2021-11-09', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'APK keuring', '12:20:00', 'fdsfsdfsd', '2021-11-12', '2021-11-12', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('21vrg3', 299000, 'opgehaald', 'APK keuring', '18:35:00', 'APK keuring', '2021-11-12', '2021-11-13', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('szszsz', 0, 'opgehaald', 'Reparatie', '09:44:00', 'Voorbanden trillen', '2021-11-15', '2021-11-16', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Grote beurt', '09:46:00', 'Grote beurt', '2021-11-15', '2021-11-15', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Grote beurt', '09:47:00', 'Grote beurt', '2021-11-16', '2021-11-16', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('787878', 0, 'opgehaald', 'APK keuring', '10:30:00', 'APK keuring', '2021-11-15', '2021-11-15', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('707070', 145709, 'opgehaald', 'Grote beurt', '11:46:00', 'sfdsfdsfsdfs', '2021-11-15', '2021-11-19', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'in afwachting', 'Reparatie', '21:05:00', 'test', '2021-11-16', '2021-11-16', '17:00:00');
INSERT INTO md597010db575324.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('szszsz', 0, 'in afwachting', 'Kleine beurt', '12:01:00', 'Kleine beurt', '2021-11-17', '2021-11-19', '17:00:00');create table users
(
    id                bigint unsigned auto_increment
        primary key,
    name              varchar(255) not null,
    email             varchar(255) not null,
    email_verified_at timestamp    null,
    password          varchar(255) not null,
    remember_token    varchar(100) null,
    created_at        timestamp    null,
    updated_at        timestamp    null,
    constraint users_email_unique
        unique (email)
)
    collate = utf8mb4_unicode_ci;

INSERT INTO md597010db575324.users (name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('Roy de la Bie', 'roy_2000debie@hotmail.com', null, '$2y$10$7q68DwXbrxsudItWn6Ri3ubSoutvET4XkvQ20FWybCrbjyNeZdYpi', 'EtwNaYSSwye1lcT9kIaMafOrEJTIu8TbTm2Mep7pwJKzDAWRoAh1QKWO5tDc', '2021-11-16 19:59:33', '2021-11-16 19:59:33');create table werkorders
(
    id              int auto_increment,
    planning_id     int                         not null,
    omschrijving    varchar(500)                not null,
    aantal          decimal(3, 1)  default 1.0  not null,
    kosten_per_stuk decimal(10, 2) default 0.00 not null,
    kosten_totaal   decimal(10, 2) default 0.00 not null,
    constraint werkorders_id_uindex
        unique (id)
);

alter table werkorders
    add primary key (id);

INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (65, 'Multiriem', 1.0, 24.95, 24.95);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (65, 'Koelvloeistof', 2.5, 7.50, 18.75);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (65, 'Bumper spuiten (zwart)', 1.0, 175.00, 175.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (66, 'Oliefilter', 1.0, 7.50, 7.50);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (66, 'Luchtfilter', 1.0, 19.00, 19.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (66, 'Olie 5W30', 4.5, 10.00, 45.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (66, 'Bougies', 4.0, 3.00, 12.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (68, 'Bougies', 3.0, 7.50, 22.50);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (68, 'Luchtfilter', 1.0, 13.00, 13.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (68, 'Oliefilter', 1.0, 7.50, 7.50);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (68, 'Olie 5W40', 3.0, 13.35, 40.05);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (68, 'Interieurfilter', 1.0, 8.00, 8.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (69, 'Spijker uit band gehaald ', 1.0, 20.00, 20.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (72, 'Oliefilter', 1.0, 10.00, 10.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (74, 'Olie 5w40', 4.0, 13.00, 52.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (74, 'Oliefilter', 1.0, 40.00, 40.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (86, 'Balanceren van voorbanden', 1.0, 15.00, 15.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (86, 'Linksvoor band vervangen', 1.0, 25.00, 25.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (87, 'sdfdsdf', 1.0, 29.00, 29.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (86, 'sfdsdsds', 1.0, 50.00, 50.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (88, 'Voorbanden gebalanceerd', 1.0, 15.00, 15.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (88, 'Rechtsvoor band vervangen', 1.0, 25.00, 25.00);
INSERT INTO md597010db575324.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (98, 'Olie 5w40', 1.0, 13.00, 13.00);