<?php

function employee(): array
{
    global $connection;
    $query = "SELECT * from users where role != 'Admin'";
    $STMT = $connection->prepare($query);
    $STMT->execute();
    return $STMT->fetchAll();
}
function employees($id): array
{
    global $connection;
    $query = "SELECT * FROM users WHERE role != 'Admin' AND user_id = :id";
    $STMT = $connection->prepare($query);
    $STMT->bindParam(':id', $id);
    $STMT->execute();
    return $STMT->fetch();
}
function employeeLeave($id): array
{
    global $connection;
    $query = "SELECT * FROM request_leave WHERE user_id = :id";
    $statement = $connection->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT); // Assuming you're using PDO
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
function typeLeave(): array
{
    global $connection;
    $query = "SELECT type_leave.type_leave_name,type_leave.type_leave_id
              FROM type_leave 
              ";
    $statement = $connection->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
