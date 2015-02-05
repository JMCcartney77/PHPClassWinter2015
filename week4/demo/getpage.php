<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        $page = filter_input(INPUT_GET, 'page');
        $page = intval ($page)++;
        
        echo '<h1>', $view, ' - ', $page, '</h1>';
        
        ?>
        
        
        <a href="?page=1&view=images">View Images</a>
        
        
        
    </body>
</html>