create table autos
(
    id       int unsigned auto_increment
        primary key,
    kenteken varchar(255) not null,
    merk     varchar(255) not null,
    type     varchar(255) not null,
    meldcode varchar(4)   not null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('26xljh', 'LandRover', 'RangeRover', '4545');
INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('14pbb4', 'Mini', 'Cooper', '5989');
INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('000000', 'Peugeot', '206', '9999');
INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('787878', 'BMW', '2-serie', '4444');
INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('111111', 'BMW', '1serie', '5555');
INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('555555', 'Mercedes', 'Vito', '9876');
INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('pppppp', 'Mercedes', 'A klasse', '5555');
INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('222222', 'Peugeot', 'dddddd', '4444');
INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('zjrb32', 'BMW', '3 serie', '8888');
INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('444444', 'Mercedes', 'CLA', '4545');
INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('21vrg3', 'Mercedes', 'Vito', '3456');
INSERT INTO apkbrabant_database.autos (kenteken, merk, type, meldcode) VALUES ('707070', 'BMW', '1 serie', '5555');