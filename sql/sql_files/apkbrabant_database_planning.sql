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

INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 189700, 'opgehaald', 'Reparatie', '09:24:00', 'Voorbanden trillen', '2021-11-11', '2021-11-12', '15:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Reparatie', '14:16:00', 'sdfsdfsd', '2021-11-14', '2021-11-11', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Reparatie', '14:52:00', 'dsfdsfsd', '2021-11-11', '2021-11-09', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('444444', 0, 'opgehaald', 'Reparatie', '23:12:00', 'dsfdsfsdds', '2021-11-08', '2021-11-08', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('444444', 0, 'opgehaald', 'Grote beurt', '23:13:00', 'dsafsdd', '2021-11-08', '2021-11-08', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Reparatie', '23:16:00', 'fdsfsd', '2021-11-11', '2021-11-08', '18:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Reparatie', '23:17:00', 'ffffff', '2021-11-11', '2021-11-11', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('14pbb4', 0, 'opgehaald', 'Grote beurt', '23:22:00', 'dsfdsfsdfsdf', '2021-11-11', '2021-11-09', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'APK keuring', '12:20:00', 'fdsfsdfsd', '2021-11-12', '2021-11-12', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('21vrg3', 299000, 'opgehaald', 'APK keuring', '18:35:00', 'APK keuring', '2021-11-12', '2021-11-13', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('szszsz', 0, 'opgehaald', 'Reparatie', '09:44:00', 'Voorbanden trillen', '2021-11-15', '2021-11-16', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Grote beurt', '09:46:00', 'Grote beurt', '2021-11-15', '2021-11-15', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'opgehaald', 'Grote beurt', '09:47:00', 'Grote beurt', '2021-11-16', '2021-11-16', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('787878', 0, 'opgehaald', 'APK keuring', '10:30:00', 'APK keuring', '2021-11-15', '2021-11-15', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('707070', 145709, 'opgehaald', 'Grote beurt', '11:46:00', 'sfdsfdsfsdfs', '2021-11-15', '2021-11-19', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('zjrb32', 0, 'in afwachting', 'Reparatie', '21:05:00', 'test', '2021-11-16', '2021-11-16', '17:00:00');
INSERT INTO apkbrabant_database.planning (kenteken, kilometerstand, status, werkzaamheden, meldtijd, omschrijving, melddatum, ophaaldatum, ophaaltijd) VALUES ('szszsz', 0, 'in afwachting', 'Kleine beurt', '12:01:00', 'Kleine beurt', '2021-11-17', '2021-11-19', '17:00:00');