<?php

// Upload image
function addPicture(int $userID,string $picture): bool{
    global $connection;
    echo $picture.' '.$userID;
    $query =  "UPDATE users  SET picture = :picture  WHERE user_id = :user_id";
    $statement = $connection->prepare($query);
    $update = [
        ":user_id" => $userID,
        ":picture" => $picture
    ];

    $statement->execute($update);
    return $statement->rowCount() > 0;
}

