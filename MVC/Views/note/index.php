

    <form id="user_form" method="post" action="<?php echo URL; ?>note/create">
        <table>
        <tr><td><label>title</label></td><td><input type="text" name="title"/></td></tr>
            <tr><td><label>note</label></td><td><textarea type="text" name="content"></textarea></td></tr>
        <tr><td><label>&nbsp;</label></td><td><input type="submit"/></td></tr>
        </table>
    </form>

    <hr />
<table>
<?php
foreach($this->noteList as $key=>$value){
    echo '<tr>';
    echo '<td>'.$value['noteId'].'</td>';
    echo '<td>'.$value['title'].'</td>';
    echo '<td>'.$value['content'].'</td>';
    echo '<td>'.$value['userId'].'</td>';
     echo '<td>'.$value['date_edited'].'</td>';
    echo '<td><a href="'.URL.'note/edit/'.$value['noteId'].'">Edit</a>
    <a class="deleteNote" href="'.URL.'note/delete/'.$value['noteId'].'">Delete</a> </td>';

    echo '</tr>';
}
?>
</table>