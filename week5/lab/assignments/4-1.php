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
        if (!empty($_POST)) {
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'pass');
            $length = strlen($password);
            $pass = false;
        } else {
            $email = "";
            $password = "";
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) != false) {
            echo '<p>this email is valid</p>';
            $pass = true;
        } else {
            echo '<p>this email is <strong>NOT</strong> valid</p>';
            $pass = false;
        }

        if ($length >= 4) {
            $pass = true;
            echo '<p>this password is valid</p>';
        } else {
            echo '<p>this password is <strong>NOT</strong> valid</p>';
            $pass = false;
        }


        if ($pass == true) {
            $dsn = 'mysql:host=localhost;dbname=phpclasswinter2015';
            $username = $_POST['email'];
            $passwordz = $_POST['pass'];


            try {
                $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015;port=3306;", "root", "");

                // Creating the query
                $query = "INSERT INTO signup (email, password) VALUES ('$email', '$password')";

                // Running the query
                $db->exec($query);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        ?>
        <form action="#" method="post">  
            email <input type="email" name="email" value="<?php echo $email; ?>" /> <br /> 
            password <input type="text" name="pass" value="<?php echo $password; ?>" /> <br />            


            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
