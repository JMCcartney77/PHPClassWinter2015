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
        $password = filter_input(INPUT_POST, 'pass');         
  
            if ( filter_var($email, FILTER_VALIDATE_EMAIL) != false ) {
                echo '<p>this email is valid</p>';
            } else {
                echo '<p>this email is <strong>NOT</strong> valid</p>';
            }
        ?>
        <form action="#" method="post">  
            email <input type="email" name="email" value="<?php echo $email; ?>" /> <br /> 
            Full name <input type="text" name="fname" value="<?php echo $fname; ?>" /> <br />            
               
                
    <input type="submit" value="Submit" />
</form>
    </body>
</html>
