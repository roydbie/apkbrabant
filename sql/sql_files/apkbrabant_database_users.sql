create table users
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

INSERT INTO apkbrabant_database.users (name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES ('Roy de la Bie', 'roy_2000debie@hotmail.com', null, '$2y$10$7q68DwXbrxsudItWn6Ri3ubSoutvET4XkvQ20FWybCrbjyNeZdYpi', 'EtwNaYSSwye1lcT9kIaMafOrEJTIu8TbTm2Mep7pwJKzDAWRoAh1QKWO5tDc', '2021-11-16 19:59:33', '2021-11-16 19:59:33');