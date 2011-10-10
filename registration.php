<?php
    require_once( "templates.inc.php");

    printHtmlTop("XYZ Shopping Cart");

    printDefaultStyles();
?>
<style type="text/css">
    #registration-form{
        margin: 0 auto;
        width: 450px;
        margin-top: 30px;
    }
    .textbox{
        width: 47%;
        margin-right: 2%;
        float: right;
    }
    textarea.textbox{
        resize: none;
    }
    
    #registration-form div.clear{
        padding: 5px 0;
    }
</style>
</head>

<body>
<?php
    printContainerTop(false);

function register($form_input){
    if ($form_input != NULL){
        $con = mysql_connect("localhost","root","");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db("xyz_shopping", $con);
        if ($form_input[username]!=NULL and $form_input[password]!=NULL and $form_input[gender]!=NULL and $form_input[address]!=NULL and $form_input[email]!=NULL)
        {
            $sql="INSERT INTO user (username, password, gender, address, email)
                VALUES
                ('$form_input[username]','$form_input[password]','$form_input[gender]','$form_input[address]','$form_input[email]')";

            if (!mysql_query($sql,$con))
            {
                die('Error: ' . mysql_error());
            }
            echo "1 record added", $form_input[username];
        }
        

        mysql_close($con);
    }
    return true;
}



    
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $form_input = $_POST;
    register($form_input);
}elseif($_SERVER['REQUEST_METHOD'] == "GET"){
    $form_input = $_GET;
    register($form_input);
}else{
    exit;
}


?>
<form id="registration-form" action="registration.php" method="post">
    <div class="clear">
        <label for="username">Name: </label>
        <input type="text" name="username" class="textbox">
    </div>
    
    <div class="clear">
        <label for="password">Password: </label>
        <input type="password" name="password" class="textbox">
    </div>
    
    <div class="clear">
        <label for="cpassword">Confirm Password: </label>
        <input type="password" name="cpassword" class="textbox">
    </div>
    
    <div class="clear">
        <label for="gender">Gender: </label>
        <span class="textbox">
            <input type="radio" name="gender" value="m">Male</input>
            <input type="radio" name="gender" value="f">Female</input>
        </span>
    </div>

    <div class="clear">
        <label for="address">Address: </label>
        <textarea cols="15" rows="5"  class="textbox" name="address"></textarea>    
    </div>
    
    <div class="clear">
        <label for="email">Confirm Password: </label>
        <input type="text" name="email" class="textbox">
    </div>

    <div class="clear">
        <input type="submit" value="Register">
        <input type="hidden"  class="textbox">
    </div>
</form>
<?php
    printContainerBottom();
?>

<?php
    printHtmlBottom();
?>

