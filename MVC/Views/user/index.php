

    <form id="user_form" method="post" action="<?php echo URL; ?>user/create">
        <table>
        <tr><td><label>login</label></td><td><input type="text" name="login"/></td></tr>
        <tr><td><label>password</label></td><td><input type="password" name="password"/></td></tr>

         <tr><td><label>role</label></td>
             <td>
             <select id="role" name="role">
             <option value="default">default</option>
             <option value="admin">admin</option>
             </select>
             </td>
         </tr>

        <tr><td><label>&nbsp;</label></td><td><input type="submit"/></td></tr>
        </table>
    </form>

    <hr />
<table>
<?php
foreach($this->userList as $key=>$value){
    echo '<tr>';
    echo '<td>'.$value['id'].'</td>';
    echo '<td>'.$value['login'].'</td>';
    echo '<td>'.$value['role'].'</td>';
    echo '<td><a href="'.URL.'user/edit/'.$value['id'].'">Edit</a>
    <a href="'.URL.'user/delete/'.$value['id'].'">Delete</a> </td>';

    echo '</tr>';
}
?>
</table>