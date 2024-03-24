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

function updatePost(string $title, string $description, int $uer_id): bool
{
    global $connection;
    $statement = $connection->prepare("update posts set title = :title, description = :description where uer_id = :id");
    $statement->execute([
        ':title' => $title,
        ':description' => $description,
        ':id' => $uer_id

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


function insertEmployee(string $fname, string $lname, string $password, string $email, string $sendInvite, string $gender, string $country, string $role, string $position_id, string $place, string $manager, int $day_can_leave,string $picture): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO users (fname, lname, password, email, sendInvite, gender, country, role, position_id,place , picture, manager, day_can_leave)
    VALUES (:fname, :lname, :password, :email, :sendInvite, :gender, :country, :role, :position_id, :place, :picture, :manager, :day_can_leave)");

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
        ':place' => $place,
        ':picture' => $picture,
        ':manager' => $manager,
        ':day_can_leave' => $day_can_leave,
    ]);

    return $statement->rowCount() > 0;
}

function updateEmployee(int $user_id, string $fname, string $lname, string $password, string $email, bool $sendInvite, string $gender, string $country, string $role, int $position_id, string $place, string $manager): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE users SET fname = :fname, lname = :lname, password = :password, email = :email, sendInvite = :sendInvite, gender = :gender, country = :country, role = :role, position_id = :position_id, place = :place, manager = :manager WHERE user_id = :id");
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
        ':place' => $place,
        ':manager' => $manager,
        ':id' => $user_id
    ]);

    return $statement->rowCount() > 0;
}


// get position of all user to diplay in form diagram
function getPosition(): array
{
    global $connection;
    $query = "SELECT count(users.fname) AS number_positions, position.position_name FROM users INNER JOIN position WHERE users.position_id = position.position_id GROUP BY users.position_id";
    $STMT = $connection->prepare($query);
    $STMT->execute();

    return $STMT->fetchAll();
}

// Get positions
function positions(): array
{
    global $connection;
    $query = "SELECT * FROM position";
    $STMT = $connection->prepare($query);
    $STMT->execute();

    return $STMT->fetchAll();
}

// Get managers
function managers(): array
{
    global $connection;
    $query = "SELECT users.user_id, users.fname, users.lname,users.role, users.picture, position.position_name FROM users INNER JOIN position WHERE users.position_id = position.position_id AND users.role = 'manager'";
    $STMT = $connection->prepare($query);
    $STMT->execute();

    return $STMT->fetchAll();
}

//get type leave today
function typeLeaves(): array
{
    global $connection;
    $query = "SELECT users.user_id, users.fname, users.lname, users.picture, type_leave.type_leave_name, request_leave.start_leave, request_leave.checked
    FROM request_leave
    INNER JOIN type_leave ON request_leave.type_leave = type_leave.type_leave_id
    INNER JOIN users ON users.user_id = request_leave.user_id 
    WHERE request_leave.checked = 'Approved';";

    $statement = $connection->prepare($query);
    $statement->execute();

    return $statement->fetchAll();
}

// Function memebers request
function memberRequest($manager_id): array
{
    global $connection;

    $query = "SELECT users.user_id, users.fname, users.lname, users.picture,users.day_can_leave, request_leave.start_leave, request_leave.end_leave, request_leave.reason, request_leave.date_request,request_leave.leave_id,request_leave.checked, type_leave.type_leave_name FROM ((request_leave INNER JOIN users)
    INNER JOIN type_leave) WHERE request_leave.user_id = users.user_id AND manager = :manager AND request_leave.type_leave = type_leave.type_leave_id AND request_leave.checked = 'Approved'";

    $STMT = $connection->prepare($query);
    $STMT->execute([
        ":manager" => $manager_id,
    ]);

    return $STMT->fetchAll();
}

// Check id
function getChecked($id): array
{
    global $connection;
    $query = "SELECT request_leave.checked, users.day_can_leave,users.taken
              FROM request_leave 
              INNER JOIN users ON request_leave.user_id = users.user_id 
              WHERE users.user_id = :user_id AND request_leave.checked != 'Pending'";
    $STMT = $connection->prepare($query);
    $STMT->execute([":user_id" => $id]);
    return $STMT->fetchAll(PDO::FETCH_ASSOC);
}


// Get team and members
function groupPeople($managerId):array
{
    global $connection;
    $query = 'SELECT users.fname, users.lname,users.picture, users.role, position.position_name FROM users INNER JOIN position WHERE position.position_id = users.position_id AND manager=:manager';
    $STMT = $connection->prepare($query);
    $STMT->execute(
        [
            ':manager' => $managerId
        ]
    );

    return $STMT->fetchAll();
}

function Groupmanager($managerId):array
{
    global $connection;
    $query = 'SELECT users.fname, users.lname,users.picture, users.role, position.position_name FROM users INNER JOIN position WHERE position.position_id = users.position_id AND user_id=:user_id';
    $STMT = $connection->prepare($query);
    $STMT->execute(
        [
            ':user_id' => $managerId
        ]
    );

    return $STMT->fetch();
}

// Get total leave in each month
function totalLeave(){
    global $connection;
    $query = 'SELECT start_leave, checked FROM request_leave';
    $STMT = $connection->prepare($query);
    $STMT->execute();
    return $STMT->fetchAll();
}

// Check account when create a new
function checkAcc(string $email) :bool
{
    global $connection;
    $query = "SELECT user_id FROM users WHERE email = :email";
    $STMT = $connection->prepare($query);
    $STMT->execute(
        [
            ":email" => $email
        ]
        );
    return $STMT->rowCount() > 0;
}