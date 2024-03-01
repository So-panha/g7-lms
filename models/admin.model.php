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


function insertEmployee(string $fname, string $lname, string $password, string $email, string $sendInvite, string $gender, string $country, string $role, string $position_id, string $amount, string $place, string $manager): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO users (fname, lname, password, email, sendInvite, gender, country, role, position_id, amount, place, picture, manager)
    VALUES (:fname, :lname, :password, :email, :sendInvite, :gender, :country, :role, :position_id, :amount, :place, :picture, :manager)");

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
        ':picture' => '',
        ':manager' => $manager
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

function getAmount()
{
    global $connection;
    $statement = $connection->prepare("SELECT SUM(amount) AS total_amount FROM users;");
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result && isset($result['total_amount'])) {
        return $result['total_amount'];
    } else {
        return 0;
    }
}

// get position of all user to diplay in form diagram
function getPosition(): array {
    global $connection;
    $query = "SELECT count(users.fname) AS number_positions, position.position_name FROM users INNER JOIN position WHERE users.position_id = position.position_id GROUP BY users.position_id";
    $STMT = $connection->prepare($query);
    $STMT->execute();

    return $STMT->fetchAll();

}

// Get positions
function positions(): array{
    global $connection;
    $query = "SELECT * FROM position";
    $STMT = $connection->prepare($query);
    $STMT->execute();

    return $STMT->fetchAll();
}

// Get managers
function managers(): array{
    global $connection;
    $query = "SELECT user_id,fname,lname FROM users WHERE role = 'manager'";
    $STMT = $connection->prepare($query);
    $STMT->execute();

    return $STMT->fetchAll();      
}