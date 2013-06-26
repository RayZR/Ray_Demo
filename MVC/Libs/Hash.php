<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ray
 * Date: 21/05/13
 * Time: 11:33 PM
 * To change this template use File | Settings | File Templates.
 */

class Hash {

    public static function create($algorithm,$data,$salt){
        $context=hash_init($algorithm,HASH_HMAC,$salt);
        hash_update($context,$data);
        return hash_final($context);
    }

}

?>