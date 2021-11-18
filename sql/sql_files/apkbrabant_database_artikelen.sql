create table artikelen
(
    id           int unsigned auto_increment
        primary key,
    omschrijving varchar(255) not null,
    actief       tinyint(1)   not null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO apkbrabant_database.artikelen (omschrijving, actief) VALUES ('Oliefilter', 1);
INSERT INTO apkbrabant_database.artikelen (omschrijving, actief) VALUES ('Luchtfilter', 1);
INSERT INTO apkbrabant_database.artikelen (omschrijving, actief) VALUES ('Interieurfilter', 1);
INSERT INTO apkbrabant_database.artikelen (omschrijving, actief) VALUES ('Olie 5W30', 1);
INSERT INTO apkbrabant_database.artikelen (omschrijving, actief) VALUES ('H1 lampje', 1);