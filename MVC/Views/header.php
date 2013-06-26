<html>
<head>
    <title><?php echo isset($this->title)?$this->title:"Ray";?></title>
    <link rel="stylesheet" href=" http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/sunny/jquery-ui.css"/>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/footer.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="<?php echo URL; ?>public/js/jquery.form.min.js"></script>
    <script src="<?php echo URL; ?>public/js/jquery.validate.min.js"></script>
    <script src="<?php echo URL; ?>public/js/custom.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster" />
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <?php
    if(isset($this->css)){
        foreach($this->css as $css)
        {
            echo ' <link rel="stylesheet" href="'.URL."Views/".$css.'"/>';

        }
    }

        if(isset($this->js)){
            foreach($this->js as $js)
            {
            echo "<script src=".URL."Views/".$js."></script>";

            }
        }
    ?>
</head>

<body>
<?php Session::init()?>
<div id="banner">
    <div id="header_wrapper">
        <div id="header2">

            <ul id="link_menu" class="menu2">
                <li id="home_page" class="menu2">
                    <?php if(Session::get('loggedIn')==false): ?>
                    <a href="<?php echo URL; ?>index" class="menu2">Home</a></li>
                <li id="help_page" class="menu2">
                    <a href="<?php echo URL; ?>Info" class="menu2">Info</a></li>
                <li id="contact_page" class="menu2">
                    <a href="<?php echo URL; ?>Contact" class="menu2">Contact</a></li>
                <?php endif ?>





                <?php if(Session::get('loggedIn')==true): ?>
                    <li id="Dashboard" class="menu2"><a href="<?php echo URL; ?>dashboard" class="menu2">Dashboard</a></li>
                    <li id="note" class="menu2"><a href="<?php echo URL; ?>note" class="menu2">Note</a></li>
                    <li id="CV" class="menu2">
                        <a href="<?php echo URL; ?>CV" class="menu2">CV</a></li>
                    <?php if(Session::get('role')=='owner'): ?>
                        <li id="user_page" class="menu2"><a href="<?php echo URL; ?>user" class="menu2">user</a></li>
                    <?php endif ?>
                    <li id="logout_back" class="menu2"><a href="<?php echo URL; ?>dashboard/logout" class="menu2">Logout</a></li>
                <?php else:?>
                    <li id="login_page" class="menu2"><a href="<?php echo URL; ?>login" class="menu2">Login</a></li>
                <?php endif ?>


            </ul>
        </div>
    </div>
    <div id="header_wrapper2">
        <div id="header">

            <ul id="link_menu" class="menu">
                <li id="home_page" class="menu">
                    <?php if(Session::get('loggedIn')==false): ?>
                    <a href="<?php echo URL; ?>index" class="menu">Home</a></li>
                <li id="help_page" class="menu">
                    <a href="<?php echo URL; ?>Info" class="menu">Info</a></li>
                <li id="contact_page" class="menu">
                    <a href="<?php echo URL; ?>Contact" class="menu">Contact</a></li>

                <?php endif ?>





                <?php if(Session::get('loggedIn')==true): ?>
                    <li id="Dashboard" class="menu"><a href="<?php echo URL; ?>dashboard" class="menu">Dashboard</a></li>
                    <li id="note" class="menu"><a href="<?php echo URL; ?>note" class="menu">Note</a></li>
                    <li id="CV" class="menu">
                        <a href="<?php echo URL; ?>CV" class="menu">Upload</a></li>
                    <?php if(Session::get('role')=='owner'): ?>
                        <li id="user_page" class="menu"><a href="<?php echo URL; ?>user" class="menu">user</a></li>
                    <?php endif ?>
                    <li id="logout_back" class="menu"><a href="<?php echo URL; ?>dashboard/logout" class="menu">Logout</a></li>
                <?php else:?>
                    <li id="login_page" class="menu"><a href="<?php echo URL; ?>login" class="menu">Login</a></li>
                <?php endif ?>


            </ul>
        </div>
    </div>
    <div id="title">
    <h1 id="logo"><a id="logo" href="<?php echo URL; ?>index" >Ray ZR</a></h1>
    <h2 id='subtitle' >Creativity  And Professionalism</h2>
    </div>


</div>


<div id="content">
