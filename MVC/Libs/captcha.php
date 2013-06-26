<?php
header('Content-type:image/jpg');
require('../utl/captcha.php');
$captcha=new captcha();
$image=$captcha->getImage();
echo $image;

?>




