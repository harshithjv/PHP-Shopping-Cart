<?php

function printHtmlTop($page_title){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="" />

	<title><?php echo "$page_title" ?></title>
<?php
}

function printHtmlBottom(){
?>
</body>
</html>
<?php
}

function printDefaultStyles(){
?>
    <style type="text/css">
    body{
	background-color: #736F6E;
    }
    #container{width:960px;margin: 0 auto;border: 1px solid #000000;}
    #header {width: 100%;border: 1px solid #000000;}
    #header_left {width: 40%;float: left;border: 1px solid #000000;min-height: 100px;}
    #header_right {width: 50%;float: right;border: 1px solid #000000;min-height: 100px;}
    #menu_box {width: 100%;min-height: 35px;border: 1px solid #000000;}
    #main {width: 100%;height: 350px;border: 1px solid #000000;}
    #footer{width: 100%;min-height:150px ;border: 1px solid #000000;}
    .clear {clear: both;}
    ul#menu{min-height:15px; margin: 0;padding: 0;margin-top: 5px;} 
    ul#menu li{ list-style-type: none;padding: 0 20px;float: left;min-width: 65px; background: url(images/home_bt.gif) no-repeat;}
    ul#menu li a{ color: #000000; text-decoration: none;}
    ul#menu li a:hover{ color: #000000; text-decoration: underline;}
    ul#menu li a:visited{ color: #000000; text-decoration: none;}
    #login {float: right;width:250px;padding-right: 5px;}
    #login-box .left {width: 40%; float: left;}
    #login-box .text-box {width: 50%; float: right; background: url(); }
    .clear{
        clear: both;
    }
    </style>
<?php
}

function printLoginBox(){
?>
<form id="login" action="." method="get">
<div id="login-box"> 
<span class="left" >User name</span> <input type="text" id="username" class="text-box" name="username"/><br />
<span class="left">Password </span><input type="password" id="password" class="text-box" name="password"/><br />
<input type="submit" value="Login"/>
<a href="registration.php">Register</a>
</div>
</form>
<?php
}

function printContainerTop($display_login_form){
?>
<div id="container"> 

<div id="header">
<div id="header_left">
</div>
<div id="header_right">
<?php
    if ( $display_login_form == true ) {
        printLoginBox();
    }
?>
</div>
<div class="clear"></div>
</div>

<div id="menu_box">
<ul id="menu">
<li><a href="index.php">Home</a></li>
<li><a href="products.php">Products</a></li>
<li><a href="shopping-cart.php">Shopping Cart</a></li>
<li><a href="about-us">About Us</a></li>
</ul>
</div>

<div id="main">
<?php
}

function printContainerBottom(){
?>
</div>

<div id="footer">
</div>

</div>
<?php
}
?>