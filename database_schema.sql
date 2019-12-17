CREATE TABLE IF NOT EXISTS `accounts`(
    `account_id` VARCHAR(255) NOT NULL PRIMARY KEY,
    `username` VARCHAR(20) NOT NULL
);


CREATE TABLE IF NOT EXISTS `users` (
	`user_id` VARCHAR(255) NOT NULL PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE, 
    `password` VARCHAR(150) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `mobile` INT(20) NOT NULL UNIQUE,
    `profile_pic` VARCHAR(500) NOT NULL,
    `lrn` VARCHAR(20) NOT NULL UNIQUE,
    `strand` VARCHAR(20) NOT NULL,
    `firstname` VARCHAR(30) NOT NULL,
    `middlename` VARCHAR(30) NOT NULL,
    `lastname` VARCHAR(30) NOT NULL,
    `address` TEXT NOT NULL,
    `birthday` DATE NOT NULL,
    `age` INT(3) NOT NULL,
    `gender` VARCHAR(20) NOT NULL,
    `civil_status` VARCHAR(20) NOT NULL,
    `employment_status` VARCHAR(20) NOT NULL,
    `graduate_id` VARCHAR(255) NULL UNIQUE,
    `account_id` VARCHAR(255) NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS `admin` (
    `admin_id` VARCHAR(255) NOT NULL PRIMARY KEY,
    `profie_pic` varchar(500) NULL,
    `username` varchar(50) NOT NULL UNIQUE,
    `password` VARCHAR(124) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `mobile` INT(20) NOT NULL UNIQUE,
     `account_id` VARCHAR(255) NULL UNIQUE
);


CREATE TABLE IF NOT EXISTS `graduates` (
    `graduate_id` VARCHAR(255) NOT NULL PRIMARY KEY,
    `profile_pic` VARCHAR(500) NOT NULL,
    `lrn` VARCHAR(20) NOT NULL UNIQUE,
    `strand` VARCHAR(20) NOT NULL,
    `firstname` VARCHAR(30) NOT NULL,
    `middlename` VARCHAR(30) NOT NULL,
    `lastname` VARCHAR(30) NOT NULL,
    `address` TEXT NOT NULL,
    `birthday` DATE NOT NULL,
    `age` INT(3) NOT NULL,
    `gender` VARCHAR(7) NOT NULL,
    `civil_status` VARCHAR(10) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `mobile` INT(20) NOT NULL UNIQUE,
    `employment_status` VARCHAR(20) NOT NULL
);







