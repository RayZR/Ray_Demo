<?php echo $this->user['id'] ?>


<form id="edit_user_form" method="post" action="<?php echo URL; ?>user/editSave/<?php echo $this->user['id'] ?>">
    <table>
        <tr><td><label>login</label></td><td><input type="text" name="login" value="<?php echo $this->user['login'] ?>"/></td></tr>
        <tr><td><label>password</label></td><td><input type="password" name="password"/></td></tr>

        <tr><td><label>role</label></td>
            <td>
                <select id="role" name="role">
                    <option value="default" <?php if($this->user['role']=='default') echo 'selected'; ?>>default</option>
                    <option value="admin" <?php if($this->user['role']=='admin') echo 'selected'; ?>>admin</option>
                    <option value="owner" <?php if($this->user['role']=='owner') echo 'selected'; ?>>owner</option>
                </select>
            </td>
        </tr>

        <tr><td><label>&nbsp;</label></td><td><input type="submit"/></td></tr>
    </table>
</form>
