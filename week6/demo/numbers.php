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
        // put your code here
        
        $int = 10;//is numeric($int)        
        $flt = 14.56; //float a integar
        
        $fltint = intval($flt);
        
        $string = 'hello';
        $bool = 'true';
        $bool2 = 'false';
        
        //echo round($flt);
        
        echo intval($flt);
        echo '<br/>';
        echo intval($string);
        echo '<br/>';
        echo intval($bool);
        echo '<br/>';
        echo intval($bool2);
       
        ?>
    </body>
</html>
