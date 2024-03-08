<?php
function CreateEvent($eventName, $eventStart, $eventEnd, $category, $userId): bool
{
    global $connection;
    $query = "INSERT INTO calendar ( event_name, event_start_date, event_end_date, category, user_id)
    VALUES(:event_name, :event_start_date, :event_end_date, :category, :user_id)";
    $STMT = $connection->prepare($query);
    $event = [
        ':event_name' => $eventName,
        ':event_start_date' => $eventStart,
        ':event_end_date' => $eventEnd,
        ':category' => $category,
        ':user_id' => $userId,
    ];
    $STMT->execute($event);
    return $STMT->rowCount() > 0;
}


function events(): array
{
    global $connection;
    $query = "SELECT * FROM calendar";
    $STMT = $connection->prepare($query);
    $STMT->execute();
    return $STMT->fetchAll();
}
