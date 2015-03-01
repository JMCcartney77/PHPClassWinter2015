<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
               
         function displayFormattedText( $text ) {
            echo '<h1>',$text,'</h1>';
        }
            function displayFormattedText2( $text, $text2 ) {
                echo '<h1>',$text,'</h1>';
            }
            
            $txt1 = 'hey hows it going';
            displayFormattedText2($txt1,$txt1);
            
            function hashPassword ( $password ) {                
                return sha1($password);
            }
            
            $passhash = hashPassword($txt1);
            echo $passhash;
            
            function validateEmail( $email ) {
                if ( filter_var($email, FILTER_VALIDATE_EMAIL) != false ) {
                   return true;
                } else {
                    return false;
                }
            }
            
            $email = 'tettet.com';
            if ( validateEmail( $email ) ) {
                 displayFormattedText('email is valid'); 
            } else {
                displayFormattedText('email is NOT valid'); 
            }
            
            
            
        ?>
    </body>
</html>