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
        
       $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015;port=3306;","root","");
       
        $dbs = $db->prepare('select * from users');
       
        if ( $dbs->execute() && $dbs->rowCount() > 0 ){
            
            
            $results = $dbs->fetchAll(PDO::FETCH_ASSOC);
            
           echo '<table>';
           echo '<tr>'; 
           echo '<th>'. 'Row Number'. '</th>';
           echo '<th>'. 'Full Name'. '</th>';
           echo '<th>'. 'Email'. '</th>';
           echo '<th>'. 'Zip'. '</th>';
           echo '<th>'. 'Phone Number'. '</th>';
           echo '</tr>';
           $i = 1;
           foreach($results as $value){
               
           echo '<tr>'; 
           echo '<td>'. $i. '</td>';
           echo '<td>'. $value["fullname"]. '</td>';
           echo '<td>'. $value["email"]. '</td>';
           echo '<td>'. $value["zip"]. '</td>';
           echo '<td>'. $value["phone"]. '</td>';
           echo '</tr>';  
           $i++; 
               
    
           }
            
            
        echo'</table>';
        

        }
       
       
        else {
            
            echo 'No Results Found';
        }
       
       
        ?>
    </body>
</html>
