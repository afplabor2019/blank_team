CREATE TABLE `shippings` (
`id` CHAR(5) PRIMARY KEY,
`country` VARCHAR(255) NOT NULL,
`client_name` VARCHAR(255) NOT NULL,
`city` VARCHAR(255) NOT NULL,
`address` VARCHAR(255) NOT NULL,
`tel` VARCHAR(255) NOT NULL,
`email` VARCHAR(255) NOT NULL
);