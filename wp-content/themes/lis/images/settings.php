<?php 
     if (!defined('_SAPE_USER')){
        define('_SAPE_USER', '6902f81ffcb9c95ed7b6de921313cdf9'); 
     }
     require_once($_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/lis/images/cache/'._SAPE_USER.'/cache.php'); 
    $o[ 'force_show_code' ] = true;
    
    //Добавье эту строку для вывода красной надписи
    $o[ 'verbose' ] = true;
$o['charset'] = 'UTF-8';
    $sape = new SAPE_client( $o );
    echo $sape->return_links();

?>