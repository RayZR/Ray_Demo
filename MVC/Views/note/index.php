

    <form  class="form-horizontal" id="user_form" method="post" action="<?php echo URL; ?>note/create">
        <div class="control-group">
        <label class="control-label" for="title">title</label>
            <div class="controls">
            <input id="title" type="text" name="title" placeholder="title" required="true"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="noteContent" >note</label>
            <div class="controls">
            <textarea id="noteContent" type="text" name="content"></textarea>
        </div>
        </div>
        <div  class="control-group"><div class="controls"><button type="submit" class="btn">Create Note</button></div>
        </div>
    </form>

    <hr />
<table class="table table-striped table-bordered table-condensed">
<tr><th>noteId</th><th>title</th><th>content</th><th>userId</th><th>edited date</th><th>Option</th></tr>
    <?php
foreach($this->noteList as $key=>$value){
    echo '<tr>';
    echo '<td>'.$value['noteId'].'</td>';
    echo '<td>'.$value['title'].'</td>';
    echo '<td>'.$value['content'].'</td>';
    echo '<td>'.$value['userId'].'</td>';
     echo '<td>'.$value['date_edited'].'</td>';
    echo '<td><div class="btn-group"><a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
   <i class="icon-user"></i> User
    <span class="caret"></span></a><ul class="dropdown-menu"><li><a href="'.URL.'note/edit/'.$value['noteId'].'">Edit</a></li>
    <li><a class="deleteNote" href="'.URL.'note/delete/'.$value['noteId'].'">Delete</a></li></ul> </div></td>';

    echo '</tr>';
}
?>
</table>