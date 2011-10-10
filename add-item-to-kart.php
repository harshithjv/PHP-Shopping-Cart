<?php
    /* function which can be called through AJAX tp add item to user-cart ... */
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $form_input = $_POST;
    }elseif($_SERVER['REQUEST_METHOD'] == "GET"){
        $form_input = $_GET;
    }else{
        exit;
    }
    
    if ($form_input[user_id]!=NULL and $form_input[item_id]!=NULL and $form_input[total]!=NULL){
        $con = mysql_connect("localhost","root","");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        else{
            /*select database */
            mysql_select_db("xyz_shopping", $con);
            
            /* check whether consumer has previously... */
            $cnt = 0;
            $result = mysql_query("SELECT count(*) FROM purchase_order where item='" + $form_input[item_id] +"' and user='" + $form_input[user_id] + "'");
            while($row = mysql_fetch_array($result))
            {
                $cnt = $row[0];
            }
            
            if ( $cnt == 0 ){
                /* insert new purchase order*/
                $sql="INSERT INTO purchase_order (user, item, quantity, total, ordered)
                    VALUES
                    ('$form_input[user_id]','$form_input[item_id]','1','$form_input[total]','1')";

                if (!mysql_query($sql,$con))
                {
                    die('Error: ' . mysql_error());
                }
            
                /* get quantity of the selected item */
                $qty = 0;

                $result = NULL;
                $result = mysql_query("SELECT quantity FROM item WHERE id='". $form_input[item_id] ."'");
                while($row = mysql_fetch_array($result))
                {
                    $qty = $row[0];
                }
                if ( $qty != 0){
                    $result = NULL;
                    /*decrement quantity*/
                    $result = mysql_query("UPDATE item SET quantity='".((int)$qty - 1)."' WHERE id='".$form_input[item_id]."'");
                    if (!mysql_query($result,$con))
                    {
                        die('Error: ' . mysql_error());
                    }
                }
                
            }
            /* close database connection */
            mysql_close($con);
        }
    }

?>