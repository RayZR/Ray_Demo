<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 23/05/13
 * Time: 6:57 PM
 * To change this template use File | Settings | File Templates.
 */

class CV extends Controller{
    function __construct(){
        parent::__construct();
        Auth::checkLoggedIn();
        //echo "we are in help<br/>";
       $this->view->js=array('CV/js/default.js');
        $this->view->css=array('CV/css/default.css');

    }
    function index(){

        $this->view->render("CV/index");

    }
    public function upload(){

        $allowExtension=array('jpg','pdf','png');
        $message=array();

        if(!empty($_FILES))
        {

            $extension=strtolower(end(explode('.',$data['name']=$_FILES['uploadFile']['name'])));
            $return=$this->checkError($message);
            $message=$return[1];
            if(in_array($extension,$allowExtension))
            {
                if($return[0]==0){
                    $this->uploadFile();
                }
            }else{
                   $message[]='Error:The file extension type is not supported';
                  foreach($message as $info)
                  {
                    echo $info."<br>";
                   }
                exit;
            }

        }else{
            $message[]="Error:please choose a valid file";
            foreach($message as $info)
              {
                echo $info."<br>";
              }
           exit;
         }

         }

    private function uploadFile(){
        $data=array();
        $data['name']=$_FILES['uploadFile']['name'];
        $data['type']=$_FILES['uploadFile']['type'];
        $data['tmp_name']=$_FILES['uploadFile']['tmp_name'];
        $data['size']=$_FILES['uploadFile']['size'];
        $this->model->upload($data);
    }

        private function checkError($message){

            $error=$_FILES['uploadFile']['error'];

            switch($error){
                case 1:
                    $message[]="Error:The uploaded file exceeds the upload_max_filesize directive in php.ini";
                    break;
                case 2:
                    $message[]="Error:The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                    break;
                case 3:
                    $message[]="Error:The uploaded file was only partially uploaded";
                    break;
                case 4:
                    $message[] = "Error:No file was uploaded";
                    break;

            }
            return array($error,$message);
        }


        function  listDir(){
            $data=$this->model->listDir();

            echo json_encode($data);


        }

      function deleteFile(){
        $this->model->deleteFile();


        }

    function xhrInsert(){
        $this->model->xhrInsert();
    }

    function xhrGetListing(){
        $this->model->xhrGetListing();
    }

    function xhrDeleteListing(){
        $this->model->xhrDeleteListing();

    }

    }


