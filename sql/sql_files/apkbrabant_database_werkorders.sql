create table werkorders
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

INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (65, 'Multiriem', 1.0, 24.95, 24.95);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (65, 'Koelvloeistof', 2.5, 7.50, 18.75);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (65, 'Bumper spuiten (zwart)', 1.0, 175.00, 175.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (66, 'Oliefilter', 1.0, 7.50, 7.50);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (66, 'Luchtfilter', 1.0, 19.00, 19.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (66, 'Olie 5W30', 4.5, 10.00, 45.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (66, 'Bougies', 4.0, 3.00, 12.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (68, 'Bougies', 3.0, 7.50, 22.50);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (68, 'Luchtfilter', 1.0, 13.00, 13.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (68, 'Oliefilter', 1.0, 7.50, 7.50);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (68, 'Olie 5W40', 3.0, 13.35, 40.05);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (68, 'Interieurfilter', 1.0, 8.00, 8.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (69, 'Spijker uit band gehaald ', 1.0, 20.00, 20.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (72, 'Oliefilter', 1.0, 10.00, 10.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (74, 'Olie 5w40', 4.0, 13.00, 52.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (74, 'Oliefilter', 1.0, 40.00, 40.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (86, 'Balanceren van voorbanden', 1.0, 15.00, 15.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (86, 'Linksvoor band vervangen', 1.0, 25.00, 25.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (87, 'sdfdsdf', 1.0, 29.00, 29.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (86, 'sfdsdsds', 1.0, 50.00, 50.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (88, 'Voorbanden gebalanceerd', 1.0, 15.00, 15.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (88, 'Rechtsvoor band vervangen', 1.0, 25.00, 25.00);
INSERT INTO apkbrabant_database.werkorders (planning_id, omschrijving, aantal, kosten_per_stuk, kosten_totaal) VALUES (98, 'Olie 5w40', 1.0, 13.00, 13.00);