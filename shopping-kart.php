<?php
    require_once( "templates.inc.php");

    printHtmlTop("XYZ Shopping Cart");

    printDefaultStyles();
?>
<style type="text/css">
    #cart-list{
        margin: 0 auto;
        width: 550px;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        <?php displayjQuerySetRedirect(); ?>
       //jquery code here ... 
    });
</script>
</head>

<body>
<?php
    printContainerTop(true);
    session_start();
    function getPurshaseOrder(){
        if (isset($_SESSION['user_id'])){
            $user = $_SESSION['user_id'];
        }else{
            $user = 1;
        }
        $con = mysql_connect("localhost","root","");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db("xyz_shopping", $con);
        $sql="SELECT * FROM purchase_order WHERE user='".$user."'";
        $result = mysql_query($sql,$con);
        $cnt = 0;
        
?>
    <table id="cart-list" cellpadding="0" cellpadding="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
<?php
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            $sql="SELECT name FROM item WHERE id='".$row[2]."'";
            $item_result = mysql_query($sql,$con);
            $item_name = "";
            while ($item_row = mysql_fetch_array($item_result, MYSQL_NUM)){
                $item_name = $item_row[0];
            }
?>
        <tr>
            <td><?php echo $item_name; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
        </tr>
<?php
        }
?>
        </tbody>
    </table>
<?php
    }
    getPurshaseOrder();
?>
<?php
    printContainerBottom();
?>

<?php
    printHtmlBottom();
?>

