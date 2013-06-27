<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($this->title)?$this->title:"Ray";?></title>
    <link rel="stylesheet" href=" http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/sunny/jquery-ui.css"/>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/footer.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
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
<div class="navbar-wrapper">
    <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->

        <?php if(Session::get('loggedIn')==false): ?>
        <div class="navbar navbar-inverse">
            <div class="navbar-inner">
                <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="#">RayZR</a>
                <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
                <div class="nav-collapse collapse">
                    <ul class="nav">

                        <li <?php echoActiveClassIfRequestMatches("index")?> ><a href="<?php echo URL; ?>index">Home</a></li>
                        <li <?php echoActiveClassIfRequestMatches("Info")?>><a href="<?php echo URL; ?>Info">About</a></li>
                        <li <?php echoActiveClassIfRequestMatches("Contact")?>><a href="<?php echo URL; ?>Contact">Contact</a></li>

                        <li id="login_page" <?php echoActiveClassIfRequestMatches("login")?>><a href="<?php echo URL; ?>login" class="menu2">Login</a></li>

                    </ul>
                </div><!--/.nav-collapse -->

        </div><!-- /.navbar -->



<?php endif ?>


    </div> <!-- /.container -->
</div><!-- /.navbar-wrapper -->
<?php if(Session::get('loggedIn')==true): ?>
    <div class="navbar">
    <div class="navbar-inner">
    <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->

    <a class="brand" href="#">RayZR</a>
    <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->

    <ul class="nav">
    <li id="Dashboard" <?php echoActiveClassIfRequestMatches("dashboard")?> ><a href="<?php echo URL; ?>dashboard" class="menu2">Dashboard</a></li>
    <li id="note"<?php echoActiveClassIfRequestMatches("note")?> ><a href="<?php echo URL; ?>note" class="menu2">Note</a></li>
    <li id="displayCustomer" <?php echoActiveClassIfRequestMatches("displayCustomer")?>><a href="<?php echo URL; ?>displayCustomer">Customers</a></li>
    <li id="CV" <?php echoActiveClassIfRequestMatches("CV")?>>
        <a href="<?php echo URL; ?>CV" class="menu2">CV</a></li>
    <?php if(Session::get('role')=='owner'): ?>
        <li id="user_page" <?php echoActiveClassIfRequestMatches("user")?>><a href="<?php echo URL; ?>user" class="menu2">user</a></li>
    <?php endif ?>
    <li id="logout_back"  ><a href="<?php echo URL; ?>dashboard/logout" class="menu2">Logout</a></li>
<?php else:?>


    </ul>
    </div>
    </div>


<?php endif ?>
</div>
</div>

<div id="content">
