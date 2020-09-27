CREATE TABLE prices
(
    id                     TINYINT      UNSIGNED NOT NULL AUTO_INCREMENT,
    just_java_endless      DECIMAL(9,2) UNSIGNED NOT NULL,
    cafe_au_lait_single    DECIMAL(9,2) UNSIGNED NOT NULL,
    cafe_au_lait_double    DECIMAL(9,2) UNSIGNED NOT NULL,
    iced_cappuccino_single DECIMAL(9,2) UNSIGNED NOT NULL,
    iced_cappuccino_double DECIMAL(9,2) UNSIGNED NOT NULL,

    PRIMARY KEY (id)
);

CREATE TABLE sales
(
    id                       INT          UNSIGNED           NOT NULL AUTO_INCREMENT,
    just_java_qty            SMALLINT     UNSIGNED DEFAULT 0 NOT NULL,
    just_java_price          DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    just_java_subtotal       DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_qty         SMALLINT     UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_price       DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_subtotal    DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_qty      SMALLINT     UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_price    DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_subtotal DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    total                    DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,

    PRIMARY KEY (id)
);

INSERT INTO prices values
    (1, 2.00, 2.00, 3.00, 4.75, 5.75);
