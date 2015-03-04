<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        
        if ( !isset($_SESSION['loggedin']) 
                || $_SESSION['loggedin'] !== true 
            ) {
            header('Location: passcode.php');
            //die('Access not allowed');
        }
        
        include_once './header.php';
        ?>
        
        <h1>Admin Page</h1>
    </body>
</html>