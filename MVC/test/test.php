<img src="../Libs/captcha.php">
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 1/06/13
 * Time: 8:36 PM
 * To change this template use File | Settings | File Templates.
 */
session_start();
$_SESSION['secure']=rand(1000,9999);
echo $_SESSION['secure'];