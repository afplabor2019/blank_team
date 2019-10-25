DROP TABLE `users`;
CREATE TABLE `users` (
`id` CHAR(5) PRIMARY KEY,
`user_name` VARCHAR(255) NOT NULL UNIQUE,
`fullname` VARCHAR(255) NOT NULL,
`email`VARCHAR(255) NOT NULL UNIQUE,
`password` TEXT NOT NULL,
`role` TINYINT(1) NOT NULL,
`shipping_id` CHAR(5),
`birth_date` DATE NOT NULL,
`age` INT NOT NULL,
`del` TINYINT(1)
);
