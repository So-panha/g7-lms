<?php
// Check user in database by email
function checkUser(string $email) : array
{
    global $connection;
    $query = "SELECT * FROM users WHERE email=:email";
    $STM = $connection->prepare($query);
    $STM->execute(
        [
            ":email" => $email,
        ]
    );

    // Check is match with table 
    if ($STM->rowCount() > 0) {
        return $STM->fetch();
    } else {
        return [];
    }
}