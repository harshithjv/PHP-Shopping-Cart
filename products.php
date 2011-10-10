<?php
    require_once( "templates.inc.php");

    printHtmlTop("XYZ Shopping Cart");

    printDefaultStyles();
?>
<style type="text/css">
    #product-list{
        margin: 0 auto;
        width: 550px;
        border: 1px dotted #000000;
    }
    .product{
        margin: 0 auto;
        width: 535px;
    }
    
</style>
</head>

<body>
<?php
    printContainerTop(true);
    $rows = NULL;
    function getProducts(){
        $con = mysql_connect("localhost","root","");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db("xyz_shopping", $con);
        $sql="SELECT name, description FROM item";
        $result = mysql_query($sql,$con);
            $cnt = 0;
                while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
                    //echo "ID: %s  Name: %s", $row[0], $row[1];
?>
    <div class="product">
        <?php echo $row[0];?>
    </div>
<?php
                }


        mysql_free_result($result);

        return true;
    }
?>
<div id="product-list">
    <?php
    $result=getProducts();

    ?>
    <div class="clear"></div>
</div>
<?php
    printContainerBottom();
?>

<?php
    printHtmlBottom();
?>

