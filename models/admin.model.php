<?php

function createPost(string $title, string $description) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into posts (title, description) values (:title, :description)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description

    ]);

    return $statement->rowCount() > 0;
}

function getPost(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getPosts() : array
{
    global $connection;
    $statement = $connection->prepare("select * from posts");
    $statement->execute();
    return $statement->fetchAll();
}

function updatePost(string $title, string $description, int $id) : bool
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

function deletePost(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}
function insertEmployee(string $fname, string $lname, string $password, string $email, string $sendInvite, string $gender, string $country, string $role, string $position, string $amount, string $place): bool {
    global $connection;
    $statement = $connection->prepare("INSERT INTO admin (fname, lname, password, email, send_invite, gender, country, role, position, amount, place)
    VALUES (:fname, :lname, :password, :email, :sendInvite, :gender, :country, :role, :position, :amount, :place)");

    $statement->execute([
        ':fname' => $fname,
        ':lname' => $lname,
        ':password' => $password,
        ':email' => $email,
        ':sendInvite' => $sendInvite,
        ':gender' => $gender,
        ':country' => $country,
        ':role' => $role,
        ':position' => $position,
        ':amount' => $amount,
        ':place' => $place,
    ]);

    return $statement->rowCount() > 0;
}