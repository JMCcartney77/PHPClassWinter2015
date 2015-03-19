<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mailing List Results</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>

        <?php
        include './Classes/Validation.class.php';
        $validate = new Validation();
        $error_message = array();



        if (!empty($_POST)) {

            $email = filter_input(INPUT_POST, 'email');
            $phone = filter_input(INPUT_POST, 'phone');
            $password = filter_input(INPUT_POST, 'pass');
            $heard_from = filter_input(INPUT_POST, 'heard_from');
            $contact_via = filter_input(INPUT_POST, 'contact_via');
            $comments = filter_input(INPUT_POST, 'comments');
        } else {
            $email = '';
            $phone = '';
            $heard_from = '';
            $contact_via = '';
            
        }



        if (!$validate->emailIsValid($email)) {
            $error_message[] = 'Please enter email';
        }
        if ($validate->fieldIsEmpty($contact_via)) {
            $error_message[] = 'Please enter contact via';
        }
        if ($validate->fieldIsEmpty($heard_from)) {
            $error_message[] = 'Please select an option';
        }
        if (!$validate->phoneIsValid($phone)) {
            $error_message[] = 'please enter phone number';
        }

        if (!empty($error_message)) {
            
            echo $heard_from;
            echo $contact_via;
            foreach ($error_message as $value) {
                echo $value;
                echo '<br />';
                
            }
            include 'index.php';
            exit();
        }
        ?>

        <div id="content">
            <h1>Account Information</h1>

            <label>Email Address:</label>
            <span><?php echo $email?></span><br />

            <label>Phone:</label>
            <span><?php echo $phone?></span><br />

            <label>Heard From:</label>
            <span><?php echo $heard_from?></span><br />

            <label>Contact Via:</label>
            <span><?php echo $contact_via?></span><br /><br />

            <span>Comments:</span><br />
            <span><?php echo $comments?></span><br />
            
    <?php  $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015;port=3306;","root","");
  
    $dbs = $db->prepare('insert into account set contact_via = :contact via, email = :email, phone = :phone, comments = :comments, heard_from = :heard');
    
    
   
    $dbs->bindParam(':contact_via', $contact_via, PDO::PARAM_STR);
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':phone', $phone, PDO::PARAM_STR);
    $dbs->bindParam(':heard', $heard_from, PDO::PARAM_STR);
    $dbs->bindParam(':comments', $comments, PDO::PARAM_STR);
    
    
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
            echo '<h1> User was added.</h1>';
    } else {
    echo '<h1> User <strong>NOT</strong> added.</h1>';}
            
            ?>
        </div>
    </body>
</html>
