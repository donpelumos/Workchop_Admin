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
    $vendorId = $_GET['vendor_id'];
    $query = $db->prepare("delete from permanent_vendors where vendor_id='$vendorId'");
    $query->execute();

    $query = $db->prepare("delete from user_vendors where vendor_id='$vendorId'");
    $query->execute();

    $query = $db->prepare("delete from vendors_probably_used where vendor_id='$vendorId'");
    $query->execute();
}
catch(Exception $e){

}
?>

