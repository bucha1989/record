<?php

/**
 * @author Buchastiy Sergey
 * @copyright 2016
 */

function check_string($var){  //обезвреживание входящих данных
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripcslashes($var);
    $var = trim($var);
    return $connection->real_escape_string($var);
    
}

function array_basis(){          //функция создания массива шаблона
    $basis_value = array('id'=>'','date'=>'','time'=>'',
    'point'=>'','box'=>'','auto'=>'','name'=>'','phone'=>'','storage'=>'','note'=>'');
    for($i=9;$i<19;++$i){ 
    
        if($i==9){$array_basis["0".$i.":00:00"] = $basis_value; continue;} //добавление ведущего нуля к 9.00 :-)
        
        $array_basis[$i.":00:00"] = $basis_value;
    
    }
    return $array_basis;
    
 }
 
function destroySession()   //функция удаления сессии
{

    $_SESSION = array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(),'',time()-2592000,'/');

    session_destroy();
}

?>