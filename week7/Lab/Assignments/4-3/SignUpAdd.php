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
        include 'functions.php';
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

        //create error message array
        $errorMessage = array();
        
        //Checking If the email field is filled in
        //$errorMessage[0] = emailIsEmty($email);

        //Correct email
        $errorMessage[1] = emailIsValid($email);
        
        //check if email exists
        $erroMessage[2] = doesEmailExist($email);

        //Checking If the password is empty
        $errorMessage[3] =  passwordIsEmty($password);
        
        //Checking If the password is a valid 5 digit pass
        $errorMessage[4] =  emailIsEmty($password);
        
        // if errors are present, show them and re-display the signup page
        $testarray = array_filter($errorMessage);
        if (!empty($testarray)) {
            foreach ($errorMessage as $emsg) {
                if (!empty($emsg)) {
                    echo $emsg, '<br />';
                    include '.SignUp.php';
                    exit();
                }
            }
        }
        $results = insertUser($email, $password);
        echo $results;

        ?>
        <a href="signup.php">Return to Sign-up page</a>
    </body>
</html>
