<?php
    require_once( "templates.inc.php");

    printHtmlTop("XYZ Shopping Cart");

    printDefaultStyles();
?>
<style type="text/css">
    /*
        Page style over here ....
    */
</style>

<script type="text/javascript">
    $(document).ready(function(){
       //jquery code here ... 
    });
</script>
</head>

<body>
<?php
    printContainerTop(true);
?>
<!--
Main Body here ...
-->
<?php
    printContainerBottom();
?>

<?php
    printHtmlBottom();
?>

