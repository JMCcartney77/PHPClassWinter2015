<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php       

function emailIsEmpty($email) {
    if (empty($email) || !is_string($email)) {
        $error = "Email must be Filled In!";
        return $error;
    }
}
function emailIsValid($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) != true) {
        $error = "The email address is not formatted properly.";
        return $error;
    }
}
function doesEmailExist($email) {
   $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015;port=3306;", "root", "");
    $dbs = $db->prepare('SELECT * FROM signup WHERE email = :email');

    $dbs->bindParam(':email', $email, PDO::PARAM_INT);

    if ($dbs->execute() && $dbs->rowCount() > 0) {
        $error = "This email address already exists in our database.";
        return $error;
    }
}
function passwordIsEmpty($password) {
    if (empty($password) || !is_string($password)) {
        $error = "Password is a required field.";
        return $error;
    }
}
function passwordIsValid($password) {
    if (strlen($password) < 5) {
        $error = "Password must be greater than four charaters long.";
        return $error;
    }
}
function insertUser($email, $password) {

    // Encrypt the password before adding to database.
    $passwordHash = sha1($password);

    $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3306;", "root", "");
    $dbs = $db->prepare('insert into signup set email = :email, password =:password');

    // you must bind the data before you execute
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':password', $passwordHash, PDO::PARAM_STR);

    // When you execute remember that a rowcount means a change was made
    if ($dbs->execute() && $dbs->rowCount() > 0) {
        return 'User info was added<br />';
    } else {
        return 'User info was NOT added  <br />';
    }
}
function checkUserLogin($email, $password) {

    // Encrypt the password before adding to database.
    $passwordHash = sha1($password);

    $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3306;", "root", "");
    $dbs = $db->prepare('SELECT * FROM signup WHERE email = :email and password = :password');

    // you must bind the data before you execute
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':password', $passwordHash, PDO::PARAM_STR);

    // When you execute remember that a rowcount means a change was made
    if ($dbs->execute() && $dbs->rowCount() > 0) {
        return 'Login attempt Successful!<br />';
    } else {
        return 'Login attempt Failed.<br />';
    }
}
        ?>
    </body>
</html>
