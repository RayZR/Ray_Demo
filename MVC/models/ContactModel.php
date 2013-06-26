<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 30/05/13
 * Time: 5:33 PM
 * To change this template use File | Settings | File Templates.
 */

class ContactModel extends Model{

    public function sendEmail(){
        session_start();

        if($_SESSION['secure']== $_POST['captcha'])
        {
         try{
          $form=new Form();
            $form->post('name')
            ->val('minLength',2)
            ->post('email')
            ->val('valEmail');
           $form->submit();

                $name=$_POST['name'];
                $emailAddress=$_POST['email'];
                $message=$_POST['message'];
                $recipient='kingofpanda.ray@gmail.com';
                $subject="contact form";

                if(mail($recipient,$subject,$name.$message,$emailAddress)) {
                    echo "Thanks for contacting me";
                    return false;
                }else{
                    echo "failed";
                }



        }catch (Exception $e){
            echo $e->getMessage();
        }
        }else{
            echo "please input the right captcha";
        }




    }

}