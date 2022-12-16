CREATE TABLE `product` (
	`product_id` INT NOT NULL AUTO_INCREMENT,
	`sku` varchar(255) NOT NULL,
	`name` varchar(255) NOT NULL,
	`price` FLOAT NOT NULL,
	`type_id` INT NOT NULL,
	PRIMARY KEY (`product_id`)
);

CREATE TABLE `product_types` (
	`type_id` INT NOT NULL AUTO_INCREMENT,
	`product_name` varchar(255) NOT NULL,
	PRIMARY KEY (`type_id`)
);

CREATE TABLE `dvd` (
	`dvd_id` INT NOT NULL AUTO_INCREMENT,
	`size` FLOAT NOT NULL,
	`product_id` INT NOT NULL,
	PRIMARY KEY (`dvd_id`)
);

CREATE TABLE `book` (
	`book_id` INT NOT NULL AUTO_INCREMENT,
	`weight` FLOAT NOT NULL,
	`product_id` INT NOT NULL,
	PRIMARY KEY (`book_id`)
);

CREATE TABLE `furniture` (
	`furniture_id` INT NOT NULL AUTO_INCREMENT,
	`height` FLOAT NOT NULL,
	`width` FLOAT NOT NULL,
	`length` FLOAT NOT NULL,
	`product_id` INT NOT NULL,
	PRIMARY KEY (`furniture_id`)
);

INSERT INTO `product_types` (`type_id`, `product_name`) VALUES (NULL, 'dvd'), (NULL, 'furniture'), (NULL, 'book');

ALTER TABLE `product` ADD CONSTRAINT `product_fk0` FOREIGN KEY (`type_id`) REFERENCES `product_types`(`type_id`) ON DELETE CASCADE;

ALTER TABLE `dvd` ADD CONSTRAINT `dvd_fk0` FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`) ON DELETE CASCADE;

ALTER TABLE `book` ADD CONSTRAINT `book_fk0` FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`) ON DELETE CASCADE;

ALTER TABLE `furniture` ADD CONSTRAINT `furniture_fk0` FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`) ON DELETE CASCADE;
