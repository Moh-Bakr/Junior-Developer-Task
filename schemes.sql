-- postgresql query
CREATE TABLE products (
	id serial PRIMARY KEY,
	sku VARCHAR (255) UNIQUE NOT NULL,
	name VARCHAR (255) NOT NULL,
    price FLOAT NOT NULL,
    type VARCHAR(255) NOT NULL,
    size FLOAT  NULL,
    weight FLOAT  NULL,
    height FLOAT   NULL,
    width FLOAT  NULL,
    length FLOAT  NULL
)


-- sql query
CREATE TABLE IF NOT EXISTS `products`(
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `sku` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `price` FLOAT UNSIGNED NOT NULL,
    `type` VARCHAR(255) NOT NULL,
    `size` FLOAT UNSIGNED DEFAULT NULL,
    `weight` FLOAT UNSIGNED DEFAULT NULL,
    `height` FLOAT UNSIGNED DEFAULT NULL,
    `width` FLOAT UNSIGNED DEFAULT NULL,
    `length` FLOAT UNSIGNED DEFAULT NULL,
    PRIMARY KEY(`id`)
    ) ENGINE = INNODB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;
ALTER TABLE products ADD UNIQUE (sku);

