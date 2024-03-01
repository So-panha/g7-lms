<?php
//function for insert request
function insertLeaveRequest(string $type_leave, string $start_leave, string $end_leave, string $checked, string $reason,string $date_request, string $user_id): bool
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

function requestLeave($manager_id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT rl.leave_id, rl.type_leave, rl.start_leave, rl.end_leave, rl.checked, rl.reason, rl.date_request, rl.user_id 
    FROM request_leave rl JOIN users u ON rl.user_id = u.user_id
    WHERE u.manager = :manager_id");
    $statement->bindParam(':manager_id', $manager_id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getHistoryRequest(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM request_leave JOIN users ON users.user_id = request_leave.user_id");
    $statement->execute();
    return $statement->fetchAll();
}

function getTypeRequest() : array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM type_leave");
    $statement->execute([]);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function deletePost(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}

function reactions(string $respond, int $user_id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE request_leave SET checked = :respond where user_id =:id ");
    $statement->execute([
        ':respond' => $respond,
        ':id' => $user_id

    ]);

    return $statement->rowCount() > 0;
}