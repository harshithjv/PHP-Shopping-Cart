<?php
    session_start();
    require_once( "templates.inc.php");

    printHtmlTop("XYZ Shopping Cart");

    printDefaultStyles();
?>
<style type="text/css">
    #product-list{
        margin: 0 auto;
        width: 550px;
        border: 1px dashed #000000;
        margin-top: 30px;

    }
    .product{
        margin: 0 auto;
        width: 525px;
        border: 1px dotted #000000;
        min-height: 50px;
        margin: 5px;
        padding: 5px;
    }
    
    div.description{
        width: 95%;
        min-height: 50px;
        
    }

</style>

<script type="text/javascript">
    $(document).ready(function(){
        <?php displayjQuerySetRedirect(); ?>

        $('.add-item-button').live("click", function(){
        <?php
            if (isset($_SESSION['user_id'])){
        ?>
            var user_id = <?php echo $_SESSION['user_id']; ?>;
        <?php
        }else{?>
            var user_id = 1;
        <?php
        }
        ?>
            var item_id = $(this).parent().attr('product_id');
            var quantity = $(this).parent().find('span.quantity').attr('value');
            var amount = parseFloat($(this).parent().find('span.amount').attr('value'));
            var control = $(this);
            var ajaxData = "user_id=" + user_id + "&item_id=" + item_id + "&total=" + amount;
            $.ajax({
                url: "add-item-to-kart.php",
                type: "GET",
                data: ajaxData,
                dataType: "html",
                success: function(msg){
                    //alert('added to cart');
                }
            });
        });
    });
</script>
</head>

<body>
<?php
    printContainerTop(true);

    function getProducts(){
        $con = mysql_connect("localhost","root","");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db("xyz_shopping", $con);
        $sql="SELECT * FROM item";
        $result = mysql_query($sql,$con);
        $cnt = 0;
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
?>

    <div class="product" product_id="<?php echo $row[0];?>">
        <h4><?php echo $row[1];?></h4>
        <?php if ($row[2] != ""){?><br>
        <div class="description">
            <?php echo $row[2];?>
        </div><br>
        <?php } ?>
        <span class="amount" value="<?php echo $row[3];?>">Price: Rs. <?php echo $row[3];?>/-</span><br>
        <span class="quantity" value="<?php echo $row[4];?>">Quantity: <?php echo $row[4];?> remaining.</span><br>
        <span class="added">Date added: <?php echo $row[6];?></span><br>
        <button class="add-item-button">Add to kart...</button>
    </div>
    <div class="clear"></div>   
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

