
<form id="uploadFile" action="<?php echo URL; ?>CV/upload" method="post" enctype="multipart/form-data">

    <input type="file" name="uploadFile"/>
    <input type="submit" value="upload">

</form>

<div class="progress">
    <div class="bar"></div >
    <div class="percent">0%</div >
</div>


<div id="upload_status">


</div>
<h3>Existing Files in the directory</h3>
<div id='uploadedFiles'>

</div>

<hr>
<h2>Image caption</h2>
<form id="randomInsert" action="<?php echo URL?>CV/xhrInsert" method="post">
    <input type="text" name="text">
    <input type="submit">

</form>

<div id="listInsert">


</div>