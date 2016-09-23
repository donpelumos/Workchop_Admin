<?php
/**
 * Created by PhpStorm.
 * User: BALE
 * Date: 19/09/2016
 * Time: 10:45 PM
 */
$database = 'mysql:dbname=workchop_main;host=localhost;';
$user = 'workchop_admin';
$pwd = 'workchop_12345';

try{
    $db = new PDO($database, $user, $pwd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $userId = $_GET['user_id'];
    $query = $db->prepare("delete from permanent_users where user_id='$userId'");
    $query->execute();
}
catch(Exception $e){

}
?>

