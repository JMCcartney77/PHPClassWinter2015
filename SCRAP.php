<?php
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $errorMessage = "";
        
        //Checking If the email field is filled in
        if (empty($email)) {
            $errorMessage .= '<p>Enter Email!</p><br />';
        }
        //Correct email
        if (filter_var($email, FILTER_VALIDATE_EMAIL) != true) {
            $errorMessage .= '<p>Invalid Email</p><br />';
        }

        if (!empty($errorMessage)) {
            echo $errorMessage;
            include 'display_results.php';
            exit();
        }
        
        
        $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015;port=3306;", "root", "");

        $dbs = $db->prepare('INSERT INTO signup set email = :email, phone = :phone');
        $dbs->bindParam(':email', $email, PDO::PARAM_STR);
        $dbs->bindParam(':phone', $phone, PDO::PARAM_STR);

        if ($dbs->execute() && $dbs->rowCount() > 0) {
            echo '<h1> user ', $email, ' and password was added</h1>';
        } else {
            echo '<h1> user ', $email, ' and password <strong>NOT</strong> added</h1>';
        }
        
        ?>