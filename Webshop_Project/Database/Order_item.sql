CREATE TABLE `order_item` (
`order_id` CHAR(5),
`item_id` INT ,
`quantity` INT NOT NULL,
`del` TINYINT(1),
PRIMARY KEY(`order_id`,`item_id`)
);