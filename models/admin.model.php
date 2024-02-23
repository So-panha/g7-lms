<?php

function createPost(string $title, string $description): bool
{
    global $connection;
    $statement = $connection->prepare("insert into posts (title, description) values (:title, :description)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description

    ]);

    return $statement->rowCount() > 0;
}

function getPost(int $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from users where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getUsers(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users");
    $statement->execute();
    return $statement->fetchAll();
}
function getpositions(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM position");
    $statement->execute();
    return $statement->fetchAll();
}

function updatePost(string $title, string $description, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("update posts set title = :title, description = :description where id = :id");
    $statement->execute([
        ':title' => $title,
        ':description' => $description,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}

function deleteuser(int $user_id): bool
{
    global $connection;
    $statement = $connection->prepare("DELETE FROM users WHERE user_id = :id");
    $statement->execute([':id' => $user_id]);
    return $statement->rowCount() > 0;
}

function getUser(int $user_id): ?array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE user_id = :id");
    $statement->execute([':id' => $user_id]);
    
    $users = $statement->fetch(PDO::FETCH_ASSOC);
    if ($users) {
        return $users;
    }
    
    return null;
}


function insertEmployee(string $fname, string $lname, string $password, string $email, string $sendInvite, string $gender, string $country, string $role, string $position_id, string $amount, string $place): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO users (fname, lname, password, email, sendInvite, gender, country, role, position_id, amount, place)
    VALUES (:fname, :lname, :password, :email, :sendInvite, :gender, :country, :role, :position_id, :amount, :place)");

    $statement->execute([
        ':fname' => $fname,
        ':lname' => $lname,
        ':password' => $password,
        ':email' => $email,
        ':sendInvite' => $sendInvite,
        ':gender' => $gender,
        ':country' => $country,
        ':role' => $role,
        ':position_id' => $position_id,
        ':amount' => $amount,
        ':place' => $place
    ]);

    return $statement->rowCount() > 0;
}

function updateEmployee(int $user_id, string $fname, string $lname, string $password, string $email, bool $sendInvite, string $gender, string $country, string $role, int $position_id, float $amount, string $place): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE users SET fname = :fname, lname = :lname, password = :password, email = :email, sendInvite = :sendInvite, gender = :gender, country = :country, role = :role, position_id = :position_id, amount = :amount, place = :place WHERE user_id = :id");
    $statement->execute([
        ':fname' => $fname,
        ':lname' => $lname,
        ':password' => $password,
        ':email' => $email,
        ':sendInvite' => $sendInvite,
        ':gender' => $gender,
        ':country' => $country,
        ':role' => $role,
        ':position_id' => $position_id,
        ':amount' => $amount,
        ':place' => $place,
        ':id' => $user_id
    ]);

    return $statement->rowCount() > 0;
}