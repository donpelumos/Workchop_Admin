<?php
/**
 * Created by PhpStorm.
 * User: BALE
 * Date: 10/09/2016
 * Time: 4:31 AM
 */
    $database = 'mysql:dbname=workchop_main;host=localhost;';
    $user = 'workchop_admin';
    $pwd = 'workchop_12345';

    try{
        $db = new PDO($database, $user, $pwd);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $db->prepare("select count(user_id) from permanent_users");
        $query->execute();
        $result = $query->fetchAll();
        $count = $result[0][0];

        echo number_format($count,0,".",",");
    }
    catch(Exception $e){

    }
?>

