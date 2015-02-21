<?php
    // get the data from the form
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = htmlspecialchars($email, ENT_COMPAT, 'ISO-8859-1', false);
    $password = htmlspecialchars($password, ENT_COMPAT, 'ISO-8859-1', false);
    $phone = htmlspecialchars($phone, ENT_COMPAT, 'ISO-8859-1', false);
    
    $select_via = filter_input (INPUT_POST, 'contact_via');
    $comments = filter_input (INPUT_POST, 'comments');
    $password = filter_input(INPUT_POST, 'pass');
    // get the rest of the data for the form

    // for the heard_from radio buttons,
    // display a value of 'Unknown' if the user doesn't select a radio button
    $heard_from = filter_input(INPUT_POST, 'heard_from');
            
    if ($heard_from == null || $heard_from == "")
    {
    $heard_from = "unknown";   
    }
    
    
    // for the wants_updates check box,
    // display a value of 'Yes' or 'No'
    $wants_updates = filter_input(INPUT_POST, 'wants_updates');
    
    if ($wants_updates != null && $wants_updates != ""){
                $wants_updates = 'yes';
            }
            else {$wants_updates = 'no';}
    
            /*if (isset ($_POST['wants_updates'])){
                $wants_updates = 'yes';
            }
            else {$wants_updates = 'no';}*/
            
            ///////////////////////////////////////
            $comments = htmlspecialchars($comments, ENT_COMPAT, 'ISO-8859-1', false);
            $comments = nl2br($comments, false);
            
?>              
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo $email; ?></span><br /> 
        
        <label>Password:</label>
        <span><?php echo $password; ?></span><br />

        <label>Phone Number:</label>
        <span><?php echo $phone; ?></span><br />

        <label>Heard From:</label>
        <span><?php echo $heard_from; ?></span><br />

        <label>Send Updates:</label>
        <span><?php echo $wants_updates; ?></span><br />

        <label>Contact Via:</label>
        <span><?php echo $select_via; ?>  </span><br /><br />

        <span>Comments:</span><br />
        <span><?php echo $comments; ?> </span><br />
        
        <p>&nbsp;</p>
    </div>
</body>
</html>