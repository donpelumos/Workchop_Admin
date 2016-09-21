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
    $surname = $_GET['surname'];
    $firstname = $_GET['firstname'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $location = $_GET['location'];
    $query = $db->prepare("update permanent_users set surname='$surname', firstname='$firstname', mobile_number='$phone',email_address='$email', location_index='$location' where user_id='$userId'");
    $query->execute();

    echo "done";
}
catch(Exception $e){

}
?>

