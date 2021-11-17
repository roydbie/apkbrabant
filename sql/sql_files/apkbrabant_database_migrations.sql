create table migrations
(
    id        int unsigned auto_increment
        primary key,
    migration varchar(255) not null,
    batch     int          not null
)
    collate = utf8mb4_unicode_ci;

INSERT INTO apkbrabant_database.migrations (migration, batch) VALUES ('2021_10_14_115701_create_werkzaamheden_table', 3);
INSERT INTO apkbrabant_database.migrations (migration, batch) VALUES ('2021_10_14_115809_create_werkzaamheden_table', 4);
INSERT INTO apkbrabant_database.migrations (migration, batch) VALUES ('2014_10_12_000000_create_users_table', 5);
INSERT INTO apkbrabant_database.migrations (migration, batch) VALUES ('2014_10_12_100000_create_password_resets_table', 5);
INSERT INTO apkbrabant_database.migrations (migration, batch) VALUES ('2019_08_19_000000_create_failed_jobs_table', 5);
INSERT INTO apkbrabant_database.migrations (migration, batch) VALUES ('2019_12_14_000001_create_personal_access_tokens_table', 5);
INSERT INTO apkbrabant_database.migrations (migration, batch) VALUES ('2021_10_13_143020_create_planning_table', 5);
INSERT INTO apkbrabant_database.migrations (migration, batch) VALUES ('2021_10_14_150054_create_werkzaamheden_table', 6);
INSERT INTO apkbrabant_database.migrations (migration, batch) VALUES ('2021_10_14_150400_create_artikelen_table', 7);
INSERT INTO apkbrabant_database.migrations (migration, batch) VALUES ('2021_10_14_194502_create_autos_table', 8);