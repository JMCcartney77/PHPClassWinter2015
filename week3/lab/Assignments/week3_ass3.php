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
        $email = '';
        $phone = '';
        $name = '';
        $zip = '';
        $error = '';

        //Validation

        if (!empty($_POST)) {

            $email = filter_input(INPUT_POST, 'email');
            $phone = filter_input(INPUT_POST, 'phone');
            $name = filter_input(INPUT_POST, 'name');
            $zip = filter_input(INPUT_POST, 'zip');


            if (empty($email) || $email == null) {
                $error .= '<p> invalid email </p>';
            }
            else if ( filter_var($email, FILTER_VALIDATE_EMAIL) == false){
                    $error .= '<p> Incorrect email address </p>';
            }
            if(empty($phone) || $phone == null){
                $error .= '<p> please enter phone number </p>';
                
            }            
            else if(!is_numeric($phone)){
                $error .= '<p> phone must be numeric</p>';
            }
            else if(strlen($phone)!= 10){
                $error .= '<p> phone must be 10 digits</p>';
            }
            
            if(empty($name) || $name == null){
                $error .= '<p> please enter your name </p>';
                
            }

            if(empty($zip) || $zip == null){
                $error .= '<p> please enter zip code </p>';             
                   
            }
            else if(!is_numeric($zip)){
                $error .= '<p> zip must be numeric</p>';
            }
            else if(strlen($zip)!= 5){
                $error .= '<p> zip must be 5 digits</p>';
            }
            
            if(empty($error)){
                $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015;port=3306;","root","");
  
    $dbs = $db->prepare('insert users set fullname = :fullname, email = :email, phone = :phone, zip = :zip');  
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $zip = $_POST['zip'];
    
    $dbs->bindParam(':fullname', $name, PDO::PARAM_STR);
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':phone', $phone, PDO::PARAM_STR);
    $dbs->bindParam(':zip', $zip, PDO::PARAM_STR);
    
    
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
            echo '<h1> User was added.</h1>';
    } else {
    echo '<h1> User <strong>NOT</strong> added.</h1>';}
            }
            
         
        
            echo $error;
        }
        
        ?>

        <form action="#" method="post">  
            email <input type="email" name="email" value="<?php echo $email; ?>" /> <br /> 
            phone <input type="text" name="phone" value="<?php echo $phone; ?>" /> <br />            
            name <input type="text" name="name" value="<?php echo $name; ?>" /> <br />            
            zip <input type="text" name="zip" value="<?php echo $zip; ?>" /> <br />            


            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
