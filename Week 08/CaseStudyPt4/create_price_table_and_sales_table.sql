DROP TABLE IF EXISTS prices;
CREATE TABLE IF NOT EXISTS prices
(
    id                     TINYINT      UNSIGNED NOT NULL AUTO_INCREMENT,
    just_java_endless      DECIMAL(9,2) UNSIGNED NOT NULL,
    cafe_au_lait_single    DECIMAL(9,2) UNSIGNED NOT NULL,
    cafe_au_lait_double    DECIMAL(9,2) UNSIGNED NOT NULL,
    iced_cappuccino_single DECIMAL(9,2) UNSIGNED NOT NULL,
    iced_cappuccino_double DECIMAL(9,2) UNSIGNED NOT NULL,

    PRIMARY KEY (id)
);

DROP TABLE IF EXISTS sales;
CREATE TABLE IF NOT EXISTS sales
(
    id                              INT          UNSIGNED           NOT NULL AUTO_INCREMENT,
    just_java_qty                   SMALLINT     UNSIGNED DEFAULT 0 NOT NULL,
    just_java_price                 DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    just_java_subtotal              DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_single_qty         SMALLINT     UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_single_price       DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_single_subtotal    DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_double_qty         SMALLINT     UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_double_price       DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    cafe_au_lait_double_subtotal    DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_single_qty      SMALLINT     UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_single_price    DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_single_subtotal DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_double_qty      SMALLINT     UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_double_price    DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    iced_cappuccino_double_subtotal DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,
    total                           DECIMAL(9,2) UNSIGNED DEFAULT 0 NOT NULL,

    PRIMARY KEY (id)
);

INSERT INTO prices
	VALUES
		(1, 2.00, 2.00, 3.00, 4.75, 5.75);
