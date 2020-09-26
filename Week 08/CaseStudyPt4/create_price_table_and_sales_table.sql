CREATE TABLE prices
(
    id                     TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
    just_java_endless      FLOAT   UNSIGNED NOT NULL,
    cafe_au_lait_single    FLOAT   UNSIGNED NOT NULL,
    cafe_au_lait_double    FLOAT   UNSIGNED NOT NULL,
    iced_cappuccino_single FLOAT   UNSIGNED NOT NULL,
    iced_cappuccino_double FLOAT   UNSIGNED NOT NULL,

    PRIMARY KEY (id)
);

CREATE TABLE sales
(
    id                       INT      UNSIGNED           NOT NULL AUTO_INCREMENT,
    just_java_qty            SMALLINT UNSIGNED DEFAULT 0 NOT NULL,
    just_java_price          FLOAT    UNSIGNED DEFAULT 0 NOT NULL,
    just_java_subtotal       FLOAT    UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_qty         SMALLINT UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_price       FLOAT    UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_subtotal    FLOAT    UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_qty      SMALLINT UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_price    FLOAT    UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_subtotal FLOAT    UNSIGNED DEFAULT 0 NOT NULL,
    total                    FLOAT    UNSIGNED DEFAULT 0 NOT NULL,

    PRIMARY KEY (id)
);

INSERT INTO prices values
    (1, 2.00, 2.00, 3.00, 4.75, 5.75);
