create table password_resets
(
    email      varchar(255) not null,
    token      varchar(255) not null,
    created_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create index password_resets_email_index
    on password_resets (email);

INSERT INTO apkbrabant_database.password_resets (email, token, created_at) VALUES ('roy_2000debie@hotmail.com', '$2y$10$RVb6wmLgAqo2YILaa77fr.uemCEvbvUOA6wGjzwyu/yWBhtl3X1D2', '2021-11-16 20:31:53');