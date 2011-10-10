<?php
    require_once( "templates.inc.php");

    printHtmlTop("XYZ Shopping Cart");

    printDefaultStyles();
?>
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
?>

<?php
    printContainerBottom();
?>

<?php
    printHtmlBottom();
?>

