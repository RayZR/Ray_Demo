
<div id="contactFormWrapper">
<form id="contactForm" action=""" method="post">
    <table class="contactForm">

        <tr><td><label>Name</label></td><td><input type="text" name="name" id="name"></td></tr>
        <tr><td><label>Email</label></td><td><input type="email" name="email" id="email"></td></tr>
        <tr><td><label>Message</label></td><td><textarea name="message"rows="6" cols="25" id="message"></textarea></td></tr>
        <tr><td><img src="<?php echo URL;?>/Libs/captcha.php"></td><td><input type="number" name='captcha' id="captcha"></td></tr>
        <tr><td></td><td><input type="submit" value="Send"><input type="reset" value="Clear"></td></tr>

    </table>



</form>
    <div id="emailStatus">

    </div>
</div>



<div id="map">

    <button id="get_Home">GetHome</button>

    <button id="get_Location">GetLocation</button>

    <button id="get_Direction">GetDirect</button>
    <button id="watch_Location">Watch</button>
    <button id="clear_Watch">Clear</button>
<div id="googleMap">

</div>
</div>

<?php
$_SESSION['secure']=rand(1000,9999);
?>