<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 24/05/13
 * Time: 12:53 PM
 * To change this template use File | Settings | File Templates.
 */

require '../Libs/Form.php';
if(isset($_REQUEST['run'])){
try{

$form=new Form();
$form->post('name')
        ->val('minLength',2)
      ->post('age')
        ->val('valInteger')
        ->post('gender');

    $form->submit();
    echo 'form passed';
    $data=$form->fetch();
    print_r($data);
//print_r($form);

}catch(Exception $e){
    echo $e->getMessage();
}
}


?>

<form method="post" action="?run">
   Name<input type="text" name='name'/>
    Age<input type="text" name='age'/>
    Gender<input type="text" name='gender'/>
    <select name="gender"><option value="M">Male</option><option value="F">Female</option></select>
    <input type="submit"/>
</form>