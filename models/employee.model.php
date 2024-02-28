<?php
//function for insert request
function insertLeaveRequest(string $type_leave, string $start_leave, string $end_leave, string $checked, string $reason, string $user_id): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO request_leave (type_leave, start_leave, end_leave, checked, reason, user_id)
    VALUES (:type_leave, :start_leave, :end_leave, :checked, :reason, :user_id)");

    $statement->execute([
        ':type_leave' => $type_leave,
        ':start_leave' => $start_leave,
        ':end_leave' => $end_leave,
        ':checked' => $checked,
        ':reason' => $reason,
        ':user_id' => $user_id
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