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
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $errorMessage = "";
        //Checking If the email field is filled in
        if (empty($email)) {
            $errorMessage .= '<p>Email fieldis required</p><br />';
        }
        //Correct email
        if (filter_var($email, FILTER_VALIDATE_EMAIL) != true) {
            $errorMessage .= '<p>this email is invalid</p><br />';
        }
        //Checking If the password is empty
        if (empty($password)) {
            $errorMessage .= '<p>Enter a password</p><br />';
        }

        //Checking If the password is a valid 5 digit pass
        if (strlen($password) < 5) {
            $errorMessage .= '<p>password is invalid</p><br />';
        }

        if (!empty($errorMessage)) {
            echo $errorMessage;
            include 'SignUp.php';
            exit();
        }
        // Hashing the password using "SHA1"
        $password = sha1($password);
        $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015;port=3306;", "root", "");

        $dbs = $db->prepare('SELECT * FROM signup WHERE email = :email and password = :password');
        $dbs->bindParam(':email', $email, PDO::PARAM_STR);
        $dbs->bindParam(':password', $password, PDO::PARAM_STR);

        if ($dbs->execute() && $dbs->rowCount() > 0) {
            echo '<h1> user ', $email, $password, ' was authenticated </h1>';
        } else {
            echo '<h1> user ', $email, $password, ' not authenticated </h1>';
        }
        ?>
    </body>
</html>
