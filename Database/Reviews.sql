CREATE TABLE `reviews`(
`id` CHAR(5) AUTO_INCREMENT PRIMARY KEY,
`user_id` CHAR(5) NOT NULL,
`product_id` INT NOT NULL,
`msg` TEXT NOT NULL,
`score` INT NOT NULL
);