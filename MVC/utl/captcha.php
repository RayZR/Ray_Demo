<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 1/06/13
 * Time: 5:41 PM
 * To change this template use File | Settings | File Templates.
 */

class captcha {

    private $_Image=null;


    function __construct(){
        $this->_Image=$this->generateRandom();
    }

    private   function generateRandom(){
        session_start();

        $text=$_SESSION['secure'];
        $fontSize=30;
        $imageWidth=100;
        $imageHeight=40;
        $image=imagecreate($imageWidth,$imageHeight);
        imagecolorallocate($image,255,255,255);
        $text_color=imagecolorallocate($image,0,0,0);

        for($count=0;$count<20;$count++){
            $x1=rand(1,100);
            $y1=rand(1,100);
            $x2=rand(1,100);
            $y2=rand(1,100);
            imageline($image,$x1,$y1,$x2,$y2,$text_color);
        }


        imagettftext($image,$fontSize,0,15,30,$text_color,'../public/resource/webWindsong/windsong-webfont.ttf',$text);
        imagejpeg($image);
        return $image;
    }

    public function getImage(){
            return $this->_Image;
        }

}