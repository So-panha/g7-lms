<?php
//function for insert request
function insertLeaveRequest(string $type_leave, string $start_leave, string $end_leave, string $checked, string $reason, string $date_request, string $user_id): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO request_leave (type_leave, start_leave, end_leave, checked,process, reason,date_request, user_id)
    VALUES (:type_leave, :start_leave, :end_leave, :checked, :process, :reason,:date_request, :user_id)");

    $statement->execute([
        ':type_leave' => $type_leave,
        ':start_leave' => $start_leave,
        ':end_leave' => $end_leave,
        ':checked' => $checked,
        ':process' => "progress",
        ':reason' => $reason,
        ':user_id' => $user_id,
        ':date_request' => $date_request
    ]);

    return $statement->rowCount() > 0;
}

// Cancel leaving
function cancelLeave($leaveID) : bool
{
    global $connection;
    $query = "UPDATE request_leave SET process = :process WHERE leave_id = :id";
    $STMT = $connection->prepare($query);
    $STMT->execute([
        ':id' => $leaveID,
        ':process' => 'cancel'
    ]);

    return $STMT->rowCount() > 0;
}

// Remove day leave when the employees cancel
function removeDayLeave($dayLeave,$dayTaken,$userId) : bool
{
    global $connection;
    $query = 'UPDATE users SET day_can_leave = :day_can_leave, taken = :taken WHERE user_id = :id';
    $STMT = $connection->prepare($query);
    $STMT->execute([
        ':id' => $userId,
        ':day_can_leave' => $dayLeave,
        ':taken' => $dayTaken
    ]);

    return $STMT->rowCount() > 0;
}

// request leave
function requestLeave($manager_id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT rl.leave_id, rl.type_leave, rl.start_leave, rl.end_leave, rl.checked, rl.reason, rl.date_request, rl.user_id, u.fname,u.lname
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

// Get types of request leave
function getTypeRequest(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM type_leave");
    $statement->execute([]);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Delete post
function deletePost(int $id): bool
{
    global $connection;
    $statement = $connection->prepare("delete from posts where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}


// Get alert depend on the employee members    
function alertMessage($manager_id): array
{
    global $connection;

    $query = "SELECT users.user_id, users.fname, users.lname, users.picture, request_leave.start_leave, request_leave.end_leave, request_leave.reason, request_leave.date_request,request_leave.leave_id,request_leave.checked, type_leave.type_leave_name FROM ((request_leave INNER JOIN users)
    INNER JOIN type_leave) WHERE request_leave.user_id = users.user_id AND manager = :manager AND request_leave.type_leave = type_leave.type_leave_id AND request_leave.checked = 'Pending'";

    $STMT = $connection->prepare($query);
    $STMT->execute([
        ":manager" => $manager_id,
    ]);

    return $STMT->fetchAll();
}
function memberRequest($manager_id) : array
{
    global $connection;

    $query = "SELECT users.user_id, users.fname, users.lname, users.picture,users.day_can_leave, request_leave.start_leave, request_leave.end_leave, request_leave.reason, request_leave.date_request,request_leave.leave_id,request_leave.checked, type_leave.type_leave_name FROM ((request_leave INNER JOIN users)
    INNER JOIN type_leave) WHERE request_leave.user_id = users.user_id AND manager = :manager AND request_leave.type_leave = type_leave.type_leave_id";

    $STMT = $connection->prepare($query);
    $STMT->execute([
        ":manager" => $manager_id,
    ]);

    return $STMT->fetchAll();
}

function personalHistoryOfRequest($employeeId)
{
    global $connection;
    $query = "SELECT * from request_leave where user_id = :id";
    $statement = $connection->prepare($query);
    $statement->execute([
        'id' => $employeeId
    ]);

    return $statement->fetchAll();
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
function getUser($id): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users where user_id = $id");
    $statement->execute();
    return $statement->fetch();
}
// get member
function getMember($managerId): array
{
    global $connection;
    $quary = "select * from users where manager = $managerId";
    $statement = $connection->prepare($quary);
    $statement->execute();

    return $statement->fetchAll();
}

// get position of all user to diplay in form diagram
function getpositions(): array
{
    global $connection;
    $query = "SELECT count(users.fname) AS number_positions, position.position_name,position.position_id FROM users INNER JOIN position WHERE users.position_id = position.position_id GROUP BY users.position_id";
    $STMT = $connection->prepare($query);
    $STMT->execute();

    return $STMT->fetchAll();
}
function reactions(string $respond, int $leave_id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE request_leave SET checked = :respond where leave_id =:id ");
    $statement->execute([
        ':respond' => $respond,
        ':id' => $leave_id
    ]);

    return $statement->rowCount() > 0;
}
// days can leave
function days(string $day, int $user_id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE users SET day_can_leave = :day where user_id =:id ");
    $statement->execute([
        ':day' => $day,
        ':id' => $user_id
    ]);

    return $statement->rowCount() > 0;
}
function taken(string $taken, int $user_id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE users SET taken = :taken where user_id =:id ");
    $statement->execute([
        ':taken' => $taken,
        ':id' => $user_id

    ]);

    return $statement->rowCount() > 0;
}
// Catch infor of each member
function inforOfMember($memberId)
{
    global $connection;
    $query = "SELECT users.user_id, users.fname, users.lname, users.gender, users.email, users.place, users.amount,users.password ,users.sendInvite,users.role,users.country,position.position_name FROM users 
    INNER JOIN position WHERE position.position_id = users.position_id AND users.user_id = :id";
    $STMT = $connection->prepare($query);
    $STMT->execute(
        [
            ':id' => $memberId
        ]
    );

    return $STMT->fetch();
}
