CREATE TABLE `users`(
    `user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `fname` VARCHAR(30) NOT NULL,
    `lname` VARCHAR(30) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `sendInvite` VARCHAR(10) NOT NULL,
    `gender` VARCHAR(50) NOT NULL,
    `country` VARCHAR(50) NOT NULL,
    `role` VARCHAR(50) NOT NULL,
    `position` INT NOT NULL,
    `amount` VARCHAR(30) NOT NULL,
    `place` VARCHAR(200) NOT NULL
);
ALTER TABLE
    `users` ADD UNIQUE `users_fname_unique`(`fname`);
CREATE TABLE `profile`(
    `profile_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `age` INT NOT NULL,
    `picture` VARCHAR(255) NOT NULL,
    `user_id` INT NOT NULL
);
CREATE TABLE `calendar`(
    `event_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `event_name` VARCHAR(255) NOT NULL,
    `event_start_date` DATE NOT NULL,
    `event_end_date` DATE NOT NULL,
    `user_id` INT NOT NULL
);
CREATE TABLE `position`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `position` VARCHAR(30) NOT NULL
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
ALTER TABLE
    `reques_leave` ADD CONSTRAINT `reques_leave_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE
    `calendar` ADD CONSTRAINT `calendar_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE
    `users` ADD CONSTRAINT `users_position_foreign` FOREIGN KEY(`position`) REFERENCES `position`(`id`);
ALTER TABLE
    `profile` ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);