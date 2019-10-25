DROP TABLE `users`;
CREATE TABLE `users` (
`id` CHAR(5) PRIMARY KEY,
`user_name` VARCHAR(255) NOT NULL UNIQUE,
`email`VARCHAR(255) NOT NULL UNIQUE,
`fullname` VARCHAR(255) NOT NULL,
`birth_date` DATE NOT NULL,
`age` INT NOT NULL,
`role` TINYINT(1) NOT NULL,
`registration_date` DATE,
`shipping_id` CHAR(5),
`password` TEXT NOT NULL,
`del` TINYINT(1)
);
