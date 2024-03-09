<?php
// Function for creating event in the calendar
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

// Function for calling all data of event
function events(): array
{
    global $connection;
    $query = "SELECT * FROM calendar";
    $STMT = $connection->prepare($query);
    $STMT->execute();
    return $STMT->fetchAll();
}

// Function of deleting event
function deleteEvent(int $id): bool
{
    global $connection;
    $query = 'DELETE FROM calendar WHERE event_id = :id';
    $STMT = $connection->prepare($query);
    $STMT->execute([

        ':id' => $id,
    ]);

    return $STMT->rowCount() > 0;
}

// Function for editing event
function editEvent(int $id, string $event_name):bool
{
    global $connection;
    $query = 'UPDATE calendar SET event_name = :event_name WHERE event_id = :id';
    $STMT = $connection->prepare($query);
    $STMT->execute(
        [
            ':id' => $id,
            ':event_name' => $event_name
        ]
        );
    return $STMT->rowCount()  < 0;
}