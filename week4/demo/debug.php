<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        $page = filter_input(INPUT_GET,'page');
        $post = filter_input(INPUT_GET,'email');
       
        $currentPage = '';
        
        
        if ( $page == curentPage  ){
            
            echo 'this is the right page';
            
        }
        
        echo('this is the wrong page');
        
        
        
        
        ?>
    </body>
</html>