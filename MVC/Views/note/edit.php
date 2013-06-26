<?php echo $this->note['noteId'] ?>


<form id="edit_note_form" method="post" action="<?php echo URL; ?>note/editSave/<?php echo $this->note['noteId'] ?>">
    <table>
        <tr><td><label>title</label></td><td><input type="text" name="title" value="<?php echo $this->note['title'] ?>"/></td></tr>

        <tr><td><label>content</label></td>
            <td>
              <textarea name="content"><?php echo $this->note['content'] ?></textarea>
            </td>
        </tr>

        <tr><td><label>&nbsp;</label></td><td><input type="submit"/></td></tr>
    </table>
</form>
