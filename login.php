<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $form_input = $_POST;
    }elseif($_SERVER['REQUEST_METHOD'] == "GET"){
        $form_input = $_GET;
    }else{
        exit;
    }

    if ($form_input[username]!=NULL and $form_input[password]!=NULL ){
        $con = mysql_connect("localhost","root","");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        else{
            /*select database */
            mysql_select_db("xyz_shopping", $con);
            
            $result = mysql_query("SELECT password, id FROM user where username='".$form_input[username]."'");
            $password = "";
            $user_id=0;
            while($row = mysql_fetch_array($result)){
                $password = $row[0];
                $user_id = $row[1];
            }
            if ($password == $form_input[password]){
                echo "YIPEE!!!";
                $_SESSION['user_id']=$user_id;
                echo $_SESSION['user_id'];
                header("Location: ".$form_input[redirect]);
            }
        }
    }
?>