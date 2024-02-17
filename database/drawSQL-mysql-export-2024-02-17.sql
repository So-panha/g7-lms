CREATE TABLE `gender`(
    `gender_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `gender` TINYINT(1) NOT NULL
);
CREATE TABLE `users`(
    `user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `email` VARCHAR(200) NOT NULL,
    `password` VARCHAR(200) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `role` INT NOT NULL,
    `positon_id` INT NOT NULL,
    `country_id` INT NOT NULL,
    `city_id` INT NOT NULL,
    `amount` VARCHAR(30) NOT NULL,
    `gender_id` INT NOT NULL
);
ALTER TABLE
    `users` ADD UNIQUE `users_email_unique`(`email`);
CREATE TABLE `Country`(
    `country_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `country` VARCHAR(100) NOT NULL
);
CREATE TABLE `profile`(
    `profile_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `age` INT NOT NULL,
    `picture` VARCHAR(255) NOT NULL,
    `user_id` INT NOT NULL
);
CREATE TABLE `City`(
    `city_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `city` VARCHAR(50) NOT NULL
);
CREATE TABLE `calendar`(
    `event_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `event_name` VARCHAR(255) NOT NULL,
    `event_start_date` DATE NOT NULL,
    `event_end_date` DATE NOT NULL,
    `user_id` INT NOT NULL
);
CREATE TABLE `reques_leave`(
    `leave_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `tyle_leave` INT NOT NULL,
    `start_leave` DATE NOT NULL,
    `end_leave` DATE NOT NULL,
    `alert` TINYINT(1) NOT NULL,
    `reason` VARCHAR(225) NOT NULL,
    `user_id` INT NOT NULL
);
CREATE TABLE `roles`(
    `role_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `role` VARCHAR(30) NOT NULL
);
CREATE TABLE `position`(
    `position_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `position` VARCHAR(30) NOT NULL
);
ALTER TABLE
    `reques_leave` ADD CONSTRAINT `reques_leave_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE
    `users` ADD CONSTRAINT `users_gender_id_foreign` FOREIGN KEY(`gender_id`) REFERENCES `gender`(`gender_id`);
ALTER TABLE
    `calendar` ADD CONSTRAINT `calendar_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE
    `users` ADD CONSTRAINT `users_positon_id_foreign` FOREIGN KEY(`positon_id`) REFERENCES `position`(`position_id`);
ALTER TABLE
    `users` ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY(`country_id`) REFERENCES `Country`(`country_id`);
ALTER TABLE
    `users` ADD CONSTRAINT `users_role_foreign` FOREIGN KEY(`role`) REFERENCES `roles`(`role_id`);
ALTER TABLE
    `users` ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY(`city_id`) REFERENCES `City`(`city_id`);
ALTER TABLE
    `profile` ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);