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
        include './functions.php';
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        // create eror messages array
        $errorMessage = array();
        // is email empty?
        $errorMessage[0] = emailIsEmpty($email);
        // i is the email valid?
        $errorMessage[1] = emailIsValid($email);
        // is the password empty?
        $errorMessage[2] = passwordIsEmpty($password);
        //Checking If the password is a valid 5 digit pass
        $errorMessage[3] = passwordIsValid($password);  //(strlen($password) < 5);
        

        // If errors exist,display them, show log in form.
        $testArray = array_filter($errorMessage);
        if (!empty($testArray)) {
            foreach ($errorMessage as $emsg) {
                if (!empty($emsg)) {
                    echo $emsg, '<br />';
                }

                include 'Login.php';
                exit();
            }
        }
        $results = checkUserLogin($email, $password);
        echo $results;
        ?>
        <a href="SignUp.php">Return to Sign-up page</a>

    </body>
</html>
