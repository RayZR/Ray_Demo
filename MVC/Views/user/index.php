

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
    <table class="table table-striped table-bordered table-condensed">
        <tr><th>id</th><th>login</th><th>role</th><th>Operation</th>
<?php
foreach($this->userList as $key=>$value){
    echo '<tr>';
    echo '<td>'.$value['id'].'</td>';
    echo '<td>'.$value['login'].'</td>';
    echo '<td>'.$value['role'].'</td>';
    echo '<td><div class="btn-group"><a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
   <i class="icon-user"></i> User<span class="caret"></span></a><ul class="dropdown-menu"><li><a href="'.URL.'user/edit/'.$value['id'].'">Edit</a></li>
   <li><a href="'.URL.'user/delete/'.$value['id'].'">Delete</a></li></ul></div></td>';

    echo '</tr>';
}
?>
</table>