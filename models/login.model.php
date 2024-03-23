<?php
// Check user in database by email
function checkUser(string $email): array
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



// Reset password
function checkMail(string $email) : bool
{
    global $connection;
    $query = 'SELECT user_id FROM users WHERE email = :email';
    $STMT = $connection->prepare($query);
    $STMT->execute(
        [
            ':email' => $email,
        ]
    );

    return $STMT->rowCount() > 0;

};


// Set opt
function OPT(string $email, int $OPT) : bool
{
    global $connection;
    $query = "UPDATE users SET otp = :otp WHERE email = :email";
    $STMT = $connection->prepare($query);
    $STMT->execute([
        ':email' => $email,
        ':otp' => $OPT
    ]);

    return $STMT->rowCount() > 0;
}

// Confrim OPT
function confirmOTP($OTP){
    global $connection;
    $query = 'SELECT * FROM users WHERE otp = :otp';
    $STMT = $connection->prepare($query);
    $STMT->execute(
        [
            ':otp' => $OTP,
        ]
    );

    return $STMT->rowCount() > 0;
}

// Change password 
function changePwd(string $newPwd, string $email) :bool
{
    global $connection;
    $query = 'UPDATE users SET password = :password WHERE email = :email';
    $STMT = $connection->prepare($query);
    $STMT->execute(
        [
            ':password' => $newPwd,
            ':email' => $email
        ]
    );

    return $STMT->rowCount() > 0;
}