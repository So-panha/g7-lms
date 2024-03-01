<?php
//function for insert request
function insertLeaveRequest(string $type_leave, string $start_leave, string $end_leave, string $checked, string $reason, string $date_request, string $user_id): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO request_leave (type_leave, start_leave, end_leave, checked, reason,date_request, user_id)
    VALUES (:type_leave, :start_leave, :end_leave, :checked, :reason,:date_request, :user_id)");

    $statement->execute([
        ':type_leave' => $type_leave,
        ':start_leave' => $start_leave,
        ':end_leave' => $end_leave,
        ':checked' => $checked,
        ':reason' => $reason,
        ':user_id' => $user_id,
        ':date_request' => $date_request
    ]);

    return $statement->rowCount() > 0;
}

function getPost(int $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getHistoryRequest(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM request_leave JOIN users ON users.user_id = request_leave.user_id");
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

function deletePost(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}


// Get alert depend on the employee members
function alertMessage($manager_id) : array
{
    global $connection;

    $query = "SELECT users.user_id, users.fname, users.lname, users.picture, request_leave.start_leave, request_leave.end_leave, request_leave.reason, request_leave.date_request,request_leave.checked, type_leave.type_leave_name FROM ((request_leave INNER JOIN users)
    INNER JOIN type_leave) WHERE request_leave.user_id = users.user_id AND manager = $manager_id AND request_leave.type_leave = type_leave.type_leave_id";

    $STMT = $connection->prepare($query);
    $STMT->execute();

    return $STMT->fetchAll();
}

// For manager
//all users
function getUsers(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users");
    $statement->execute();
    return $statement->fetchAll();
}
// get member
function getMember($managerId): array
{
    global $connection;
    $quary = "select * from users where manager = $managerId";
    $statement = $connection->prepare($quary);
    $statement -> execute();

    return $statement->fetchAll();
}

// get position of all user to diplay in form diagram
function getpositions(): array {
    global $connection;
    $query = "SELECT count(users.fname) AS number_positions, position.position_name,position.position_id FROM users INNER JOIN position WHERE users.position_id = position.position_id GROUP BY users.position_id";
    $STMT = $connection->prepare($query);
    $STMT->execute();

    return $STMT->fetchAll();

}