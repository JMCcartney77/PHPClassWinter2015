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
        Sign Up <br /><br />
        <?php
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'pass');
        ?>
         
        <form action="SignUpAdd.php" method="post">  
            email <input type="text" name="email" value="<?php echo $email; ?>" /> <br /> 
            password <input type="password" name="password" value="<?php echo $password; ?>" /> <br />            
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>

